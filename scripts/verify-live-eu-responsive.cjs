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
const slugs=coreShard?['']:(quick?['','seo','contact','privacy']:['','seo','seo-audit','ecommerce-seo','google-ads','analytics','web-development','website-design','online-shop-development','about','portfolio','contact','privacy']);
const sizes=[{name:'desktop',width:1440,height:900},{name:'mobile',width:390,height:844},{name:'narrow',width:360,height:780}];
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
  await page.locator('body').waitFor({timeout:8000});
  try{await page.evaluate(()=>document.fonts.ready)}catch(_){}
  await page.waitForTimeout(slug===''?1400:250);
  item.check=await page.evaluate(({lang,slug,width})=>{
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
    hero:!!document.querySelector(slug===''?'.orbit-lab .lab-shell':'.eu-hero'),
    sharedHeader:!!document.querySelector('header.site-header .nav-dropdown .services-menu-toggle'),
    sharedFooter:!!document.querySelector('footer.mrseo-footer'),
    orbitMaster:!!document.querySelector('.orbit-lab .lab-shell .lab-visual'),
    orbitCanvas:!!document.querySelector('.orbit-lab canvas.lab-webgl-canvas'),
    orbitStaticTexture:earth?getComputedStyle(earth,'::before').backgroundImage.includes('earth-day.jpg'):false,
    clientBand:!!document.querySelector('.client-band-home'),
    marketOffers:document.querySelectorAll('.eu-offer-card').length,
    form:document.querySelector('form[action*="admin-post.php"]')?.querySelector('input[name=mrseo_lang]')?.value||null,
    contactHeroForm:!!document.querySelector('.eu-hero-contact form[action*="admin-post.php"]'),
    contactPrivacyNotice:!!document.querySelector('.eu-hero-contact .mrseo-privacy-notice'),
    contactDecorativeScene:!!document.querySelector('.eu-service-scene-contact'),
    nonce:!!document.querySelector('input[name=mrseo_nonce]'),
    menuItems:links.length,
    serviceMenuItems:document.querySelectorAll('.mrseo-mega .mrseo-mega-item[href]').length,
    portfolioCards:document.querySelectorAll('.eu-project-card').length,
    core:!!earth,
    coreDimensions:earth?{w:Math.round(earth.getBoundingClientRect().width),h:Math.round(earth.getBoundingClientRect().height)}:null,
    satellites:node?.querySelectorAll(slug===''?'.lab-node':'.eu-satellite').length||0,
    portfolio:!!document.querySelector('a[href$="/'+(lang==='uk'?'':lang+'/')+'portfolio/"]'),
    privacyLink:!!document.querySelector('a[href$="/'+(lang==='uk'?'':lang+'/')+'privacy/"]'),
    contactBarText:document.querySelector('.mrseo-mobile-contact-bar')?.textContent||'',
    bodyClass:body.className
   };
  },{lang,slug,width:viewport.width});
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
  if(slug===''&&!c.clientBand)item.errors.push('Homepage public client band missing');
  if(!coreShard&&!['','contact','privacy'].includes(slug)&&c.marketOffers!==3)item.errors.push('Market offer cards '+c.marketOffers);
  if(slug==='portfolio'&&c.portfolioCards<5)item.errors.push('Public portfolio cards '+c.portfolioCards);
  if(slug==='contact'&&(c.form!==lang||!c.nonce))item.errors.push('Contact form language or nonce missing');
  if(slug==='contact'&&(!c.contactHeroForm||!c.contactPrivacyNotice||c.contactDecorativeScene))
    item.errors.push('Shared first-screen contact form/privacy notice or absent decorative scene regression');
  if(slug!=='privacy'&&!c.portfolio)item.errors.push('Proof/portfolio link missing');
  if(viewport.name==='mobile' || (viewport.name==='narrow'&&['','contact'].includes(slug))){
   await page.screenshot({path:'shots/eu-'+lang+'-'+(slug||'home')+'-'+viewport.name+'.jpg',type:'jpeg',quality:75,fullPage:false});
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
    for(const slug of slugs){
     if(viewport.name==='narrow'&&!['','seo','contact'].includes(slug))continue;
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
