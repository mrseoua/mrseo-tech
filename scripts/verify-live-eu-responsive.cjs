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
const uaNewSlugs=['local-business-websites','landing-pages','corporate-websites','website-redesign','local-seo','service-business-seo','international-seo','local-google-ads','google-ads-audit','store-conversion','store-migration','website-maintenance','website-speed-security'];
// All existing compact RU services: core 8 plus 12 genuinely routed specialist pages.
const ruCoreSlugs=['seo','seo-audit','ecommerce-seo','google-ads','performance-max','analytics','service-websites','horoshop'];
const ruSpecialistSlugs=['website-audit','traffic-recovery','google-shopping','merchant-center','online-store-development','catalog-automation','web-applications','api-integrations','custom-functionality','ga4-conversions','business-dashboards','reporting-automation'];
const ruPilotSlugs=[...ruCoreSlugs,...ruSpecialistSlugs];
const ruNewSlugs=uaNewSlugs;
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
    footerLabels:[...document.querySelectorAll('footer.mrseo-footer .mrseo-footer-col a')].map(a=>a.textContent.trim()),
    ruNewStyles:!!document.querySelector('link[href*="ru-website-scenes.css"]'),
    ruNewCall:!!document.querySelector('.uws-page a[href$="/ru/contact/"]'),
    ruSceneRussian:!!document.querySelector('.uws-page .uws-demo-foot')&&
      /Иллюстрация принципа/.test(document.querySelector('.uws-page .uws-demo-foot')?.textContent||''),
    ruCompact:(()=>{
      const root=document.querySelector('.ru-premium,.ns-page--compact');
      const core=!!root?.classList.contains('ru-premium');
      return {
        core, micro:!!root&&!core,
        css:!!document.querySelector('link[href*="ru-services-compact.css"]'),
        problems:root?.querySelectorAll('.ukseo-cases .ukseo-problem-card').length||0,
        outcomes:root?.querySelectorAll('.ukseo-delivery-list>div').length||0,
        faq:root?.querySelectorAll('.ukseo-faq-items details').length||0,
        scenes:root?.querySelectorAll(core?'.ms-scene':'.ns-scene').length||0,
        redundant:root?.querySelectorAll('.ukseo-decision,.ukseo-work,.ukseo-proof,.ns-related').length||0,
        contact:!!root?.querySelector('a[href$="/ru/contact/"]')
      };
    })(),
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
      const compactAudit=lang==='uk'&&['seo-audit','performance-max'].includes(slug);
      const sections=services?[...document.querySelectorAll('.ua4-section')]:
        [...document.querySelectorAll('.uaf-story,.uaf-contact-guide')];
      const stylesheet=!!document.querySelector('link[href*="ua-final-interiors.css"]');
      const serviceStyles=!!document.querySelector('link[href*="ua-four-service-visuals.css"]');
      const boxRects=sections.map(el=>{const r=el.getBoundingClientRect();return {w:r.width,left:r.left,right:r.right}});
      return {target,stylesheet,serviceStyles,count:sections.length,
        headings:sections.map(el=>el.querySelector('h2[id]')?.textContent.trim()||''),
        cards:services&&!compactAudit?sections[0]?.querySelectorAll('.ua4-journey-card').length||0:0,
        planSteps:services?(compactAudit?sections[0]:sections[1])?.querySelectorAll('.ua4-plan-step').length||0:0,
        ordered:sections.length===1||(sections.length===2&&!!(sections[0].compareDocumentPosition(sections[1])&Node.DOCUMENT_POSITION_FOLLOWING)),
        geometry:boxRects.length>0&&boxRects.every(r=>r.w>250&&r.left>=-2&&r.right<=innerWidth+2),
        formIntact:slug==='contact'?!!document.querySelector('form[action*="admin-post.php"] input[name="mrseo_nonce"]')&&
            !!document.querySelector('form[action*="admin-post.php"] textarea[name="contact_message"]'):true,
        noLeak:!target&&!stylesheet&&sections.length===0};
    })(),
    uaFourScenes:(()=>{
      const target=lang==='uk'&&['analytics','service-websites'].includes(slug);
      const sections=[...document.querySelectorAll('.ua4-section')];
      const style=!!document.querySelector('link[href*="ua-four-service-visuals.css"]');
      const rects=sections.map(el=>{const r=el.getBoundingClientRect();
        return {left:Math.round(r.left),right:Math.round(r.right),width:Math.round(r.width)}});
      const headings=sections.map(el=>el.querySelector('h2')?.textContent.trim()||'');
      const journeys=sections[0]?.querySelectorAll('.ua4-journey>li').length||0;
      const planSteps=sections[0]?.querySelectorAll('.ua4-plan-step').length||0;
      return {style,count:sections.length,headings,journeys,planSteps,
        correctOrder:sections.length===1,
        geometry:rects.every(r=>r.left>=-2&&r.right<=innerWidth+2&&r.width>250),
        leak:!target&&(sections.length>0||style)};
    })(),
    uaCommercialVisuals:(()=>{
      const target=lang==='uk'&&['google-ads','web-development'].includes(slug);
      const sections=target?[...document.querySelectorAll('.ua-sv')]:[];
      const style=!!document.querySelector('link[href*="ua-commercial-visuals.css"]');
      const expected=lang==='uk'?1:2;
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
      const rects=[priorities,board].filter(Boolean).map(el=>el.getBoundingClientRect());
      return {css,stageCount:stages.length,journey:!!journey,priorities:!!priorities,board:!!board,
        boundariesOK:rects.length===2&&rects.every(r=>r.width>0&&r.left>=-2&&r.right<=innerWidth+2),
        properOrder:!!journey&&!!priorities&&journey.compareDocumentPosition(priorities)&Node.DOCUMENT_POSITION_FOLLOWING};
    })(),
    nonce:!!document.querySelector('input[name=mrseo_nonce]'),
    menuItems:links.length,
    serviceMenuItems:document.querySelectorAll('.mrseo-mega .mrseo-mega-item[href]').length,
    uaNewPages:(()=>{
      const root=document.querySelector('.uws-page');
      const scene=root?.querySelector('.uws-demo');
      const rect=scene?.getBoundingClientRect();
      return {page:!!root,scene:!!scene,css:!!document.querySelector('link[href*="ua-websites.css"]'),
        pains:root?.querySelectorAll('.uws-pains .ukseo-problem-card').length||0,
        faq:root?.querySelectorAll('.uws-faq details').length||0,
        unwantedRelated:root?.querySelectorAll('.uws-related,.ns-related').length||0,
        geometry:!!rect&&rect.width>240&&rect.left>=-2&&rect.right<=innerWidth+2};
    })(),
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
  if(c.serviceMenuItems<(['uk','ru'].includes(lang)?25:4))
    item.errors.push('Shared mega menu has too few real working links: '+c.serviceMenuItems);
  if(lang==='uk'&&uaNewSlugs.includes(slug)){
    const u=c.uaNewPages;
    if(!u.page||!u.scene||!u.css||u.pains!==3||u.faq!==3||u.unwantedRelated!==0||!u.geometry)
      item.errors.push('Ukrainian new service route/geometry missing: '+JSON.stringify(u));
  }
  if(lang==='ru'&&ruNewSlugs.includes(slug)){
    const u=c.uaNewPages;
    if(!u.page||!u.scene||!u.css||!c.ruNewStyles||!c.ruSceneRussian||!c.ruNewCall||
       u.pains!==3||u.faq!==3||u.unwantedRelated!==0||!u.geometry)
      item.errors.push('Russian scene/copy/geometry failed '+slug+': '+JSON.stringify(u));
  }
  if(!['uk','ru'].includes(lang)&&(c.uaNewPages.page||c.uaNewPages.css))
    item.errors.push('UA/RU-only new service page leaked to '+lang);
  if(lang!=='ru'&&c.ruNewStyles)
    item.errors.push('Russian scene stylesheet leaked to '+lang);
  if(lang==='uk'&&['merchant-center'].includes(slug)){
    const unrelated=await page.locator('.ns-related').count();
    if(unrelated!==0)item.errors.push('Redundant Ukrainian related-services panel still visible');

    const compact=await page.locator('.ns-page--compact').count();
    const issues=await page.locator('.ns-page--compact .ukseo-problem-card').count();
    const outcomes=await page.locator('.ns-page--compact .ukseo-delivery-list>div').count();
    const repeated=await page.locator('.ns-page--compact .ukseo-decision,.ns-page--compact .ukseo-work,.ns-page--compact .ukseo-proof').count();
    const compactStyle=await page.locator('link[href*="ua-services-compact.css"]').count();
    if(compact!==1||issues!==3||outcomes!==3||repeated!==0||compactStyle!==1)
      item.errors.push('UA compact existing service regression: '+JSON.stringify({compact,issues,outcomes,repeated,compactStyle}));
  }
  if(!c.sharedHeader||!c.sharedFooter)item.errors.push('Global header or footer missing');
  if(lang==='ru'&&ruPilotSlugs.includes(slug)){
    const q=c.ruCompact;
    if(!q||!q.css||q.core!==ruCoreSlugs.includes(slug)||q.micro!==ruSpecialistSlugs.includes(slug)||
       q.problems!==3||q.outcomes!==3||q.faq<2||q.scenes!==1||q.redundant!==0||!q.contact)
      item.errors.push('RU compact service regression '+slug+': '+JSON.stringify(q));
    if(!c.footerLabels.includes('Аналитика')||!c.footerLabels.includes('SEO-аудит')||
       c.footerLabels.includes('Analytics')||c.footerLabels.includes('Technical SEO'))
      item.errors.push('RU footer navigation has untranslated service labels');
  }
  if(lang!=='ru'&&c.ruCompact.css)
    item.errors.push('RU compact CSS leaked to '+lang);
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
    if(!v||!v.stylesheet||v.count!==1||v.headings.some(h=>!h)||
        !v.geometry||!v.formIntact||(services&&(!v.serviceStyles||v.cards!==0||v.planSteps!==3||!v.ordered)))
      item.errors.push('UA final interiors missing/inaccessible/out of viewport: '+JSON.stringify(v));
  }
  if(lang!=='uk'&&!c.uaFinalScenes.noLeak)
    item.errors.push('UA final interior assets or content leaked into '+lang);
  if(lang==='uk'&&['analytics','service-websites'].includes(slug)){
    const v=c.uaFourScenes;
    if(!v||!v.style||v.count!==1||v.journeys!==0||v.planSteps!==3||
        !v.correctOrder||!v.geometry||v.headings.some(h=>!h))
      item.errors.push('UA four-service illustrated section missing/overflows: '+JSON.stringify(v));
  }
  if(lang!=='uk'&&c.uaFourScenes.leak)
    item.errors.push('UA-only four-service scenes leaked into '+lang);
  if(lang==='uk'&&['google-ads','web-development'].includes(slug)){
    const v=c.uaCommercialVisuals;
    if(!v||!v.style||v.sections!==1||!v.properOrder||!v.goodGeometry||v.headings.length!==1)
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
  if(lang==='uk'&&slug==='horoshop'){
    const partner=await page.locator('.hs-authentic-logo img,.hs-official-badge').count();
    const switchers=await page.locator('.hs-switcher button').count();
    if(partner!==2||switchers!==3||c.uaFourScenes.count!==0||c.uaFourScenes.style)
      item.errors.push('Horoshop official interactive hero or compact layout failed');
  }
  if(lang==='uk'&&slug==='ecommerce-seo'){
    const lab=await page.locator('#ukcommerce-lab .ec-tabs button').count();
    if(lab!==3||c.uaFourScenes.count!==0||c.uaFourScenes.style)
      item.errors.push('Compact ecommerce catalog lab or redundant scenes failed: tabs='+lab);
  }
  if(lang==='uk'&&slug==='seo'){
    const v=c.uaSeoVisuals;
    if(!v||!v.css||v.journey||!v.priorities||!v.board||v.stageCount!==0||!v.boundariesOK)
      item.errors.push('Ukrainian SEO visual story or responsive geometry missing: '+JSON.stringify(v));
  }
  if(!coreShard&&slug==='contact'&&(c.form!==lang||!c.nonce))item.errors.push('Contact form language or nonce missing');
  if(!coreShard&&slug==='contact'&&(!c.contactHeroForm||!c.contactPrivacyNotice||c.contactDecorativeScene))
    item.errors.push('Shared first-screen contact form/privacy notice or absent decorative scene regression');
  if(slug!=='privacy'&&!c.portfolio)item.errors.push('Proof/portfolio link missing');
  if((lang==='uk'&&['seo','google-ads','web-development',...uaFourSlugs,...uaFinalSlugs,'local-seo','landing-pages','store-conversion','website-speed-security'].includes(slug)) || (lang==='ru'&&ruNewSlugs.includes(slug)) || (viewport.name==='wide'&&slug==='') || viewport.name==='mobile' || (viewport.name==='narrow'&&['','contact'].includes(slug))){
   await page.screenshot({path:'shots/eu-'+lang+'-'+(slug||'home')+'-'+viewport.name+'.jpg',type:'jpeg',quality:75,fullPage:lang==='uk'&&['seo','google-ads','web-development',...uaFourSlugs,'seo-audit','performance-max','about','contact','local-seo','landing-pages','store-conversion','website-speed-security'].includes(slug)});
  }
  // Independent screenshots of middle and footer; Chromium fullPage can repeat
  // the top on long pages. Cover five distinct RU service scene families.
  if(lang==='ru'&&ruNewSlugs.includes(slug)&&viewport.name==='mobile'&&
     ['landing-pages','local-seo','google-ads-audit','store-conversion','website-maintenance'].includes(slug)){
    const h=await page.evaluate(()=>Math.max(document.body.scrollHeight,document.documentElement.scrollHeight));
    const maxY=Math.max(0,h-viewport.height);
    const positions=[Math.round(maxY*.56),maxY];
    let prior=-1;
    for(let i=0;i<positions.length;i++){
      const y=positions[i];
      if(y===prior)continue;
      prior=y;
      await page.evaluate(pos=>window.scrollTo(0,pos),y);
      await page.waitForTimeout(130);
      await page.screenshot({path:'shots/ru-'+slug+'-mobile-section-'+(i+1)+'.jpg',type:'jpeg',quality:76,fullPage:false});
    }
    await page.evaluate(()=>window.scrollTo(0,0));
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
    const selectedSlugs=coreShard&&lang==='uk'?[...slugs,...uaFourSlugs,...uaFinalSlugs,'merchant-center',...uaNewSlugs]:(coreShard&&lang==='ru'?[...new Set([...slugs,...ruPilotSlugs,...ruNewSlugs])]:(coreShard&&lang==='pl'?[...slugs,'tworzenie-stron-internetowych']:(quick&&!coreShard&&lang==='fr'?['','seo',...sceneSlugs.filter(x=>x!=='seo'),'contact','privacy']:slugs)));
    for(const slug of selectedSlugs){
     if(viewport.name==='wide'&&slug!==''&&!(lang==='uk'&&['seo','google-ads','web-development',...uaFourSlugs,...uaFinalSlugs,'local-seo','landing-pages','store-conversion','website-speed-security'].includes(slug))&&!(lang==='ru'&&['seo','google-ads','analytics','service-websites','horoshop','landing-pages','google-ads-audit','website-maintenance'].includes(slug)))continue;
     if(viewport.name==='narrow'&&!['','seo','contact'].includes(slug)&&!(lang==='uk'&&['google-ads','web-development','merchant-center',...uaFourSlugs,...uaFinalSlugs,...uaNewSlugs].includes(slug))&&!(lang==='ru'&&[...ruPilotSlugs,...ruNewSlugs].includes(slug)))continue;
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
