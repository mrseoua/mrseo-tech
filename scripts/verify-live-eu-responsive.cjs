/* Browser QA for fifteen staged EU market locales after deployment. No form submits, no indexing changes. */
'use strict';
const fs=require('node:fs/promises');
const {chromium}=require('playwright');
const HOST=(process.env.MRSEO_TEST_ORIGIN||'https://mrseo.tech').replace(/\/$/,'');
const allLocales=['fr','it','es','nl','ro','cs','pt','sv','da','fi','hu','sk','el','bg','hr'];
const shard=process.env.MRSEO_LOCALE_SHARD===undefined?-1:Number(process.env.MRSEO_LOCALE_SHARD);
const coreShard=shard===3;
const locales=coreShard?['uk','ru','en','pl','de']:allLocales.filter((_,index)=>shard<0||index%3===shard);
if(!Number.isInteger(shard)||shard>3)throw Error('Invalid locale shard');
const quick=process.env.MRSEO_AUDIT_QUICK==='1';
// A full live crawl is 435+ browser views; isolated PR preview checks the critical
// homepage/service/contact/privacy paths in all 15 markets before publication.
const slugs=coreShard?['','seo','google-ads','web-development','privacy']:(quick?['','seo','contact','privacy']:['','seo','seo-audit','ecommerce-seo','google-ads','analytics','web-development','website-design','online-shop-development','about','portfolio','contact','privacy']);
const uaFourSlugs=['ecommerce-seo','analytics','service-websites','horoshop'];
const uaFinalSlugs=['seo-audit','performance-max','about','portfolio','contact'];
const sceneSlugs=['seo','seo-audit','ecommerce-seo','google-ads','analytics','web-development','website-design','online-shop-development'];
const sizes=[{name:'desktop',width:1440,height:900},{name:'wide',width:1920,height:1080},{name:'mobile',width:390,height:844},{name:'narrow',width:360,height:780}];
const results=[];
const urlOf=(l,s)=>HOST+'/'+(l==='uk'?'':l+'/')+(s?s+'/':'');
async function audit(browser,viewport,lang,slug){
 const url=urlOf(lang,slug);
 const mobile=viewport.name!=='desktop';
 const browserUA=mobile
  ? 'Mozilla/5.0 (Linux; Android 15; Pixel 8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36'
  : 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36';
 const context=await browser.newContext({
  viewport:{width:viewport.width,height:viewport.height},
  deviceScaleFactor:mobile?2:1,
  isMobile:mobile,hasTouch:mobile,
  userAgent:browserUA,locale:({uk:'uk-UA',ru:'ru-RU',en:'en-GB',pl:'pl-PL',de:'de-DE',fr:'fr-FR',it:'it-IT',es:'es-ES',nl:'nl-NL',ro:'ro-RO',cs:'cs-CZ',pt:'pt-PT',sv:'sv-SE',da:'da-DK',fi:'fi-FI',hu:'hu-HU',sk:'sk-SK',el:'el-GR',bg:'bg-BG',hr:'hr-HR'})[lang],
  ignoreHTTPSErrors:false
 });
 const page=await context.newPage();
 const item={lang,slug:slug||'home',viewport:viewport.name,url,errors:[],warnings:[],stage:'navigate'};
 page.on('pageerror',e=>item.errors.push('JS: '+String(e.message).slice(0,175)));
 let response;
 try{
  response=await page.goto(url,{waitUntil:'domcontentloaded',timeout:30000});
  item.status=response?.status()||null;
  if(item.status!==200){
   item.errors.push('HTTP '+item.status);
   item.errors.push('Content type '+(response?.headers()['content-type']||'unknown'));
   await page.screenshot({path:'shots/eu-'+lang+'-'+(slug||'home')+'-'+viewport.name+'-error.jpg',type:'jpeg',quality:68,fullPage:false}).catch(()=>{});
   results.push(item);
   console.log('FAIL '+viewport.name+' '+lang+'/'+slug+' HTTP '+item.status);
   return;
  }
  // page.goto(waitUntil: 'domcontentloaded') has already established the body;
  // an extra body visibility wait can stall behind software-WebGL rendering.
  try{await page.evaluate(()=>document.fonts.ready)}catch(_){}
  await page.waitForTimeout(slug===''?1400:250);
  item.check=await page.evaluate(({lang,slug,width,coreShard})=>{
   const canonical=[...document.querySelectorAll('link[rel=canonical]')].map(x=>x.href);
   const body=document.body;
   const node=slug===''?document.querySelector('.orbit-lab .lab-visual'):document.querySelector('.eu-orbit-scene');
   const earth=slug===''?node?.querySelector('.lab-core'):node?.querySelector('.eu-earth-core');
   const links=[...document.querySelectorAll('header.site-header .mrseo-language-options a')].map(a=>({href:a.href,lang:a.lang}));
   return {
    title:document.title,
    htmlLang:document.documentElement.lang,
    h1:document.querySelectorAll('h1').length,
    robots:document.querySelector('meta[name=robots]')?.getAttribute('content')||'',
    canonical,
    internalWidth:document.documentElement.scrollWidth,
    clientWidth:document.documentElement.clientWidth,
    viewport:innerWidth,
    hero:!!document.querySelector(slug===''?'.orbit-lab .lab-shell':coreShard?'.ukseo-hero,.special-hero,.about-hero,.portfolio-hero,.seo-hero,.intl-hero,.dev-hero,.pl-svc-hero,.inner-hero,.sp-hero':'.eu-hero'),
    sharedHeader:!!document.querySelector('header.site-header .nav-dropdown .services-menu-toggle'),
    sharedFooter:!!document.querySelector('footer.mrseo-footer'),
    orbitMaster:!!document.querySelector('.orbit-lab .lab-shell .lab-visual'),
    heroEdge:(()=>{
      const el=document.querySelector('#main > .orbit-lab');
      if(!el)return null;
      const rect=el.getBoundingClientRect();
      return {left:Math.round(rect.left),right:Math.round(rect.right),width:Math.round(rect.width)};
    })(),
    heroPanel:(()=>{
      const el=document.querySelector('#main > .orbit-lab > .lab-shell');
      if(!el)return null;
      const computed=getComputedStyle(el);
      return {background:computed.backgroundColor,radius:computed.borderTopLeftRadius,
        overflow:computed.overflowX,shadow:computed.boxShadow};
    })(),
    orbitStylesheet:!!document.querySelector('link[href*="orbit-scene.css"]'),
    legacyEuStylesheet:!!document.querySelector('link[href*="eu-expansion.css"]'),
    sharedHomepageVisual:!!document.querySelector('.orbit-lab .lab-shell .lab-visual .lab-core')&&!!document.querySelector('.orbit-lab .lab-connectors #lab-spokes'),
    orbitCanvas:!!document.querySelector('.orbit-lab canvas.lab-webgl-canvas'),
    orbitStaticTexture:earth?getComputedStyle(earth,'::before').backgroundImage.includes('earth-day.jpg'):false,
    clientBand:!!document.querySelector('.client-band-home'),
    marketOffers:document.querySelectorAll('.eu-offer-card').length,
    form:document.querySelector('form[action*="admin-post.php"]')?.querySelector('input[name=mrseo_lang]')?.value||null,
    contactHeroForm:!!document.querySelector('.eu-hero-contact form[action*="admin-post.php"]'),
    contactPrivacyNotice:!!document.querySelector('.eu-hero-contact .mrseo-privacy-notice'),
    contactDecorativeScene:!!document.querySelector('.eu-service-scene-contact'),
    bespokeHeroArt:!!document.querySelector('.eu-service-scene .eu-viz--'+slug),
    bespokeHeroStyles:!!document.querySelector('link[href*="eu-service-scenes.css"]'),
    uaFinalScenes:(()=>{
      const target=lang==='uk'&&['seo-audit','performance-max','about','portfolio','contact'].includes(slug);
      const services=['seo-audit','performance-max'].includes(slug);
      const sections=services?[...document.querySelectorAll('.ua4-section')]:
        [...document.querySelectorAll('.uaf-story,.uaf-contact-guide')];
      const stylesheet=!!document.querySelector('link[href*="ua-final-interiors.css"]');
      const serviceStyles=!!document.querySelector('link[href*="ua-four-service-visuals.css"]');
      const boxRects=sections.map(el=>{const r=el.getBoundingClientRect();return {w:r.width,left:r.left,right:r.right}});
      return {target,stylesheet,serviceStyles,count:sections.length,
        headings:sections.map(el=>el.querySelector('h2[id]')?.textContent.trim()||''),
        cards:services?sections[0]?.querySelectorAll('.ua4-journey-card').length||0:0,
        planSteps:services?sections[1]?.querySelectorAll('.ua4-plan-step').length||0:0,
        ordered:sections.length===2&&!!(sections[0].compareDocumentPosition(sections[1])&Node.DOCUMENT_POSITION_FOLLOWING),
        geometry:boxRects.length>0&&boxRects.every(r=>r.w>250&&r.left>=-2&&r.right<=innerWidth+2),
        formIntact:slug==='contact'?!!document.querySelector('form[action*="admin-post.php"] input[name="mrseo_nonce"]')&&
            !!document.querySelector('form[action*="admin-post.php"] textarea[name="contact_message"]'):true,
        noLeak:!target&&!stylesheet&&sections.length===0};
    })(),
    uaFourScenes:(()=>{
      const target=lang==='uk'&&['ecommerce-seo','analytics','service-websites','horoshop'].includes(slug);
      const sections=[...document.querySelectorAll('.ua4-section')];
      const style=!!document.querySelector('link[href*="ua-four-service-visuals.css"]');
      const rects=sections.map(el=>{const r=el.getBoundingClientRect();
        return {left:Math.round(r.left),right:Math.round(r.right),width:Math.round(r.width)}});
      const headings=sections.map(el=>el.querySelector('h2')?.textContent.trim()||'');
      const journeys=sections[0]?.querySelectorAll('.ua4-journey>li').length||0;
      const planSteps=sections[1]?.querySelectorAll('.ua4-plan-step').length||0;
      return {style,count:sections.length,headings,journeys,planSteps,
        correctOrder:sections.length===2&&!!(sections[0].compareDocumentPosition(sections[1])&Node.DOCUMENT_POSITION_FOLLOWING),
        geometry:rects.every(r=>r.left>=-2&&r.right<=innerWidth+2&&r.width>250),
        leak:!target&&(sections.length>0||style)};
    })(),
    uaCommercialVisuals:(()=>{
      const target=lang==='uk'&&['google-ads','web-development'].includes(slug);
      const sections=target?[...document.querySelectorAll('.ua-sv')]:[];
      const style=!!document.querySelector('link[href*="ua-commercial-visuals.css"]');
      const expected=lang==='uk'&&slug==='google-ads'?1:2;
      const roots=sections.map(e=>({id:e.querySelector('h2')?.id||'',width:Math.round(e.getBoundingClientRect().width),
        left:Math.round(e.getBoundingClientRect().left),right:Math.round(e.getBoundingClientRect().right)}));
      return {style,sections:sections.length,roots,headings:[...document.querySelectorAll('.ua-sv h2')].map(x=>x.textContent.trim()),
        properOrder:sections.length===expected&&(expected===1||!!(sections[0].compareDocumentPosition(sections[1])&Node.DOCUMENT_POSITION_FOLLOWING)),
        hiddenOnForeign:lang!=='uk'&&!document.querySelector('.ua-sv'),
        goodGeometry:roots.length===expected&&roots.every(r=>r.left>=-2&&r.right<=innerWidth+2&&r.width>250)};
    })(),
    uaAdsPricing:(()=>{
      const target=lang==='uk'&&slug==='google-ads';
      const root=document.querySelector('#ukads-pricing');
      const cards=[...document.querySelectorAll('.ukads-price-card')];
      const css=!!document.querySelector('link[href*="ua-google-ads-pricing.css"]');
      const flow=document.querySelector('.ukads-flow-plate');
      const stages=flow?.querySelectorAll('.ukads-flow-node').length||0;
      const boxes=[root,flow,...cards].filter(Boolean).map(el=>{
        const a=el.getBoundingClientRect();
        return {left:Math.round(a.left),right:Math.round(a.right),width:Math.round(a.width)};
      });
      const text=cards.map(el=>el.textContent.replace(/\s+/g,' ').trim());
      const heading=root?.querySelector('h2')?.textContent.trim()||'';
      const hero=document.querySelector('.ukseo--ads .ukseo-hero-copy h1');
      const letterSpace=hero?parseFloat(getComputedStyle(hero).letterSpacing):NaN;
      const heroTrackingOK=!target||(Number.isFinite(letterSpace)&&letterSpace>-3&&letterSpace<=0);
      return {target,css,count:cards.length,stages,heading,
        heroTrackingOK,pricesCorrect:text.length===2&&text[0].includes('5 000')&&text[1].includes('10 000')&&text.every(s=>s.includes('Разове налаштування')),
        geometry:boxes.length===3&&boxes.every(b=>b.width>250&&b.left>=-2&&b.right<=innerWidth+2),
        noLeak:!target&&!css&&!root&&cards.length===0&&!flow};
    })(),
    uaSeoVisuals:(()=>{
      if(lang!=='uk'||slug!=='seo')return null;
      const journey=document.querySelector('#ukseo-journey-title');
      const priorities=document.querySelector('#ukseo-priorities-title');
      const stages=document.querySelectorAll('.ukseo-visual-journey > li');
      const board=document.querySelector('.ukseo-visual-priority-board');
      const css=!!document.querySelector('link[href*="ua-seo-visuals.css"]');
      const rects=[journey,priorities,board].filter(Boolean).map(el=>el.getBoundingClientRect());
      return {css,stageCount:stages.length,journey:!!journey,priorities:!!priorities,board:!!board,
        boundariesOK:rects.length===3&&rects.every(r=>r.width>0&&r.left>=-2&&r.right<=innerWidth+2),
        properOrder:!!journey&&!!priorities&&journey.compareDocumentPosition(priorities)&Node.DOCUMENT_POSITION_FOLLOWING};
    })(),
    nonce:!!document.querySelector('input[name=mrseo_nonce]'),
    menuItems:links.length,
    serviceMenuItems:document.querySelectorAll('.mrseo-mega .mrseo-mega-item[href]').length,
    portfolioCards:document.querySelectorAll('.eu-project-card,.client-directory-card').length,
    core:!!earth,
    coreDimensions:earth?{w:Math.round(earth.getBoundingClientRect().width),h:Math.round(earth.getBoundingClientRect().height)}:null,
    satellites:node?.querySelectorAll(slug===''?'.lab-node':'.eu-satellite').length||0,
    portfolio:!!document.querySelector('a[href$="/'+(lang==='uk'?'':lang+'/')+'portfolio/"]'),
    privacyLink:!!document.querySelector('a[href$="/'+(lang==='uk'?'':lang+'/')+'privacy/"]'),
    contactBarText:document.querySelector('.mrseo-mobile-contact-bar')?.textContent||'',
    bodyClass:body.className
   };
  },{lang,slug,width:viewport.width,coreShard});
  const c=item.check;
  const exactPath=url;
  if(!c.title||c.title.length<(coreShard?8:12))item.errors.push('Missing document title');
  if(c.htmlLang.toLowerCase().split('-')[0]!==lang)item.errors.push('Wrong html lang '+c.htmlLang);
  if(c.h1!==1)item.errors.push('H1 count '+c.h1);
  if(c.canonical.length!==1||c.canonical[0]!==exactPath)item.errors.push('Canonical '+JSON.stringify(c.canonical));
  if(!c.robots.toLowerCase().includes('noindex')&&!String(response.headers()['x-robots-tag']).includes('noindex'))item.errors.push('Staging noindex missing');
  if(c.internalWidth>c.clientWidth+4)item.errors.push('Horizontal overflow '+c.internalWidth+' > '+c.clientWidth);
  if(c.menuItems!==20)item.errors.push('Header language options '+c.menuItems);
  if(lang!=='uk'&&/Написати|Зателефонувати/.test(c.contactBarText))item.errors.push('Ukrainian contact controls leaked into '+lang+' locale');
  if(coreShard?(c.serviceMenuItems<4):(c.serviceMenuItems!==8))item.errors.push('Shared mega menu links: '+c.serviceMenuItems);
  if(!c.sharedHeader||!c.sharedFooter)item.errors.push('Global header or footer missing');
  if(!c.privacyLink)item.errors.push('Privacy link missing');
  if(slug!=='privacy'&&!c.hero)item.errors.push('Hero missing');
  if(slug===''&&(!c.orbitMaster||!c.core||(coreShard?(c.satellites<6||c.satellites>8):(c.satellites!==7))||!c.coreDimensions?.w))item.errors.push('Shared orbit master/satellites missing');
  if(slug===''&&!c.orbitCanvas&&!c.orbitStaticTexture)item.errors.push('No real 3D globe or Earth texture fallback');
  if(slug===''){
    // Regression guard: all 20 locale homepages must physically reach both
    // viewport edges, not merely use the same template within a narrow wrapper.
    const edge=c.heroEdge;
    if(!edge||Math.abs(edge.left)>2||edge.right<c.viewport-2||edge.width<c.viewport-3)
      item.errors.push('Homepage has visible side gutters: '+JSON.stringify(edge)+' viewport='+c.viewport);
    const panel=c.heroPanel;
    if(!panel||!['transparent','rgba(0, 0, 0, 0)'].includes(panel.background)||
       panel.radius!=='0px'||panel.shadow!=='none'||panel.overflow!=='visible')
      item.errors.push('Homepage has inherited dark rounded 1700px panel: '+JSON.stringify(panel));
  }
  if(slug===''&&(!c.orbitStylesheet||!c.sharedHomepageVisual))item.errors.push('Not using the exact approved shared 3D homepage visual');
  if(slug===''&&!coreShard&&c.legacyEuStylesheet)item.errors.push('EU landing stylesheet leaked onto unified homepage');
  if(slug!==''&&!coreShard&&slug!=='privacy'&&!c.legacyEuStylesheet)item.errors.push('EU interior page styling missing');
  if(slug===''&&!c.clientBand)item.errors.push('Homepage public client band missing');
  if(!coreShard&&['seo','google-ads','web-development'].includes(slug)&&c.marketOffers!==3)item.errors.push('Market offer cards '+c.marketOffers);
  if(!coreShard&&sceneSlugs.includes(slug)&&(!c.bespokeHeroArt||!c.bespokeHeroStyles))item.errors.push('Service-specific illustration or stylesheet missing: '+slug);
  if(slug==='portfolio'&&c.portfolioCards<5)item.errors.push('Public portfolio cards '+c.portfolioCards);
  if(lang==='uk'&&uaFinalSlugs.includes(slug)){
    const v=c.uaFinalScenes;
    const services=['seo-audit','performance-max'].includes(slug);
    if(!v||!v.stylesheet||v.count!==(services?2:1)||v.headings.some(h=>!h)||
        !v.geometry||!v.formIntact||(services&&(!v.serviceStyles||v.cards!==3||v.planSteps!==3||!v.ordered)))
      item.errors.push('UA final interiors missing/inaccessible/out of viewport: '+JSON.stringify(v));
  }
  if(lang!=='uk'&&!c.uaFinalScenes.noLeak)
    item.errors.push('UA final interior assets or content leaked into '+lang);
  if(lang==='uk'&&uaFourSlugs.includes(slug)){
    const v=c.uaFourScenes;
    if(!v||!v.style||v.count!==2||v.journeys!==3||v.planSteps!==3||
        !v.correctOrder||!v.geometry||v.headings.some(h=>!h))
      item.errors.push('UA four-service illustrated section missing/overflows: '+JSON.stringify(v));
  }
  if(lang!=='uk'&&c.uaFourScenes.leak)
    item.errors.push('UA-only four-service scenes leaked into '+lang);
  if(lang==='uk'&&['google-ads','web-development'].includes(slug)){
    const v=c.uaCommercialVisuals;
    if(!v||!v.style||v.sections!==(slug==='google-ads'?1:2)||!v.properOrder||!v.goodGeometry||v.headings.length!==(slug==='google-ads'?1:2))
      item.errors.push('UA commercial story missing or out of viewport: '+JSON.stringify(v));
  }
  if(lang!=='uk'&&['google-ads','web-development'].includes(slug)&&
     (!c.uaCommercialVisuals.hiddenOnForeign||c.uaCommercialVisuals.style))
    item.errors.push('UA-only illustrations leaked onto foreign market page');
  if(lang==='uk'&&slug==='google-ads'){
    const p=c.uaAdsPricing;
    if(!p||!p.css||p.count!==2||p.stages!==0||!p.pricesCorrect||!p.geometry||!p.heading||!p.heroTrackingOK)
      item.errors.push('UA Google Ads prices/visuals missing or overflow: '+JSON.stringify(p));
  }
  if(!(lang==='uk'&&slug==='google-ads')&&!c.uaAdsPricing.noLeak)
    item.errors.push('Ukrainian Google Ads pricing leaked onto other pages');
  if(lang==='uk'&&slug==='seo'){
    const v=c.uaSeoVisuals;
    if(!v||!v.css||!v.journey||!v.priorities||!v.board||v.stageCount!==3||!v.boundariesOK||!v.properOrder)
      item.errors.push('Ukrainian SEO visual story or responsive geometry missing: '+JSON.stringify(v));
  }
  if(!coreShard&&slug==='contact'&&(c.form!==lang||!c.nonce))item.errors.push('Contact form language or nonce missing');
  if(!coreShard&&slug==='contact'&&(!c.contactHeroForm||!c.contactPrivacyNotice||c.contactDecorativeScene))
    item.errors.push('Shared first-screen contact form/privacy notice or absent decorative scene regression');
  if(slug!=='privacy'&&!c.portfolio)item.errors.push('Proof/portfolio link missing');
  if((lang==='uk'&&['seo','google-ads','web-development',...uaFourSlugs,...uaFinalSlugs].includes(slug)) || (viewport.name==='wide'&&slug==='') || viewport.name==='mobile' || (viewport.name==='narrow'&&['','contact'].includes(slug))){
   await page.screenshot({path:'shots/eu-'+lang+'-'+(slug||'home')+'-'+viewport.name+'.jpg',type:'jpeg',quality:75,fullPage:lang==='uk'&&['seo','google-ads','web-development',...uaFourSlugs,'seo-audit','performance-max','about','contact'].includes(slug)});
  }
  if(lang==='uk'&&slug==='portfolio'){
    await page.locator('.uaf-story--portfolio').screenshot({path:'shots/ua-portfolio-visual-'+viewport.name+'.jpg',type:'jpeg',quality:76}).catch(e=>item.errors.push('Portfolio illustration screenshot failed: '+e.message));
  }
  if(slug===''&&viewport.name==='narrow'){
   // Shared UA/RU mobile menu must be usable in every new language.
   const menu=page.locator('header.site-header .menu-toggle');
   item.stage='open main menu';
   await menu.click({timeout:4000});
   if(await menu.getAttribute('aria-expanded')!=='true')
      item.errors.push('Global mobile menu cannot open');
   const services=page.locator('header.site-header .services-menu-toggle');
   item.stage='open service menu';
   await services.click({timeout:4000});
   if(await services.getAttribute('aria-expanded')!=='true')
      item.errors.push('Shared service dropdown cannot open');
   const good=await page.locator('.mrseo-mega-grid').evaluate(el=>{
      const r=el.getBoundingClientRect();
      return r.width>200&&r.left>=-6&&r.right<=innerWidth+6;
   });
   if(!good)item.errors.push('Premium services menu overflows 360px viewport');
   await page.screenshot({path:'shots/eu-'+lang+'-shared-mobile-menu.jpg',type:'jpeg',quality:75,fullPage:false});
   item.stage='close service/menu';
   await page.keyboard.press('Escape');
   await menu.click({timeout:4000});
   item.stage='language dropdown';
   const sel=page.locator('header.site-header .mrseo-language-trigger');
   await sel.focus();
   await page.keyboard.press('Enter');
   await page.waitForTimeout(150);
   const visible=await page.locator('header.site-header .mrseo-language-options').evaluate(x=>{
    const r=x.getBoundingClientRect();return r.width>180&&r.left>=-2&&r.right<=innerWidth+2&&r.top<innerHeight;
   });
   if(!visible)item.errors.push('Language selector not visible in 360px');
   await page.screenshot({path:'shots/eu-'+lang+'-language-menu.jpg',type:'jpeg',quality:75,fullPage:false});
  }
 }catch(e){
   item.errors.push('Browser stage='+item.stage+' '+String(e).slice(0,1100));
   if(slug===''&&viewport.name==='narrow')await page.screenshot({path:'shots/eu-'+lang+'-failed-mobile-nav.jpg',type:'jpeg',quality:70,fullPage:false}).catch(()=>{});
 }
 finally{await context.close()}
 results.push(item);
 console.log((item.errors.length?'FAIL':'PASS')+' '+viewport.name+' '+lang+'/'+(slug||'')+' '+(item.errors.join(' | ')||''));
}
(async()=>{
 await fs.mkdir('shots',{recursive:true});
 const launchOptions={headless:true,args:['--disable-dev-shm-usage','--enable-webgl','--use-gl=angle','--use-angle=swiftshader','--enable-unsafe-swiftshader']};
 // Reset Chromium (including its software WebGL state) between locales/viewport
 // profiles. A single long-lived browser can accumulate GPU load over 165 views
 // and produce sporadic interaction timeouts unrelated to the actual page.
 for(const viewport of sizes){
  for(const lang of locales){
   const browser=await chromium.launch(launchOptions);
   try{
    const selectedSlugs=coreShard&&lang==='uk'?[...slugs,...uaFourSlugs,...uaFinalSlugs]:(coreShard&&lang==='pl'?[...slugs,'tworzenie-stron-internetowych']:(quick&&!coreShard&&lang==='fr'?['','seo',...sceneSlugs.filter(x=>x!=='seo'),'contact','privacy']:slugs));
    for(const slug of selectedSlugs){
     if(viewport.name==='wide'&&slug!==''&&!(lang==='uk'&&['seo','google-ads','web-development',...uaFourSlugs,...uaFinalSlugs].includes(slug)))continue;
     if(viewport.name==='narrow'&&!['','seo','contact'].includes(slug)&&!(lang==='uk'&&['google-ads','web-development',...uaFourSlugs,...uaFinalSlugs].includes(slug)))continue;
     await audit(browser,viewport,lang,slug);
    }
   }finally{await browser.close()}
  }
 }
 const errors=results.filter(x=>x.errors.length);
 const summary={checked:results.length,failed:errors.length,success:results.length-errors.length,errors:errors.map(x=>({url:x.url,viewport:x.viewport,errors:x.errors})),results};
 await fs.writeFile('shots/eu-diagnostics.json',JSON.stringify(summary,null,2));
 console.log('EU AUDIT TOTAL shard '+shard+': '+summary.checked+' views; failures='+summary.failed);
 if(errors.length)process.exitCode=1;
})().catch(e=>{console.error(e);process.exitCode=1});
