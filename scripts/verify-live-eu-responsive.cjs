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
const premiumCommercialFamilies={"performance-max":["performance-max-hero","performance-max-problem-1","performance-max-problem-2","performance-max-problem-3","performance-max-plan","performance-max-solution","performance-max-next"],"local-google-ads":["local-google-ads-hero","local-google-ads-problem-1","local-google-ads-problem-2","local-google-ads-problem-3","local-google-ads-solution","local-google-ads-next"],"google-ads-audit":["google-ads-audit-hero","google-ads-audit-problem-1","google-ads-audit-problem-2","google-ads-audit-problem-3","google-ads-audit-solution","google-ads-audit-next"],"merchant-center":["merchant-center-hero","merchant-center-problem-1","merchant-center-problem-2","merchant-center-problem-3","merchant-center-solution","merchant-center-next"],"google-shopping":["google-shopping-hero","google-shopping-problem-1","google-shopping-problem-2","google-shopping-problem-3","google-shopping-solution","google-shopping-next"],"analytics":["analytics-hero","analytics-problem-1","analytics-problem-2","analytics-problem-3","analytics-plan","analytics-solution","analytics-next"],"ga4-conversions":["ga4-conversions-hero","ga4-conversions-problem-1","ga4-conversions-problem-2","ga4-conversions-problem-3","ga4-conversions-solution","ga4-conversions-next"],"business-dashboards":["business-dashboards-hero","business-dashboards-problem-1","business-dashboards-problem-2","business-dashboards-problem-3","business-dashboards-solution","business-dashboards-next"],"reporting-automation":["reporting-automation-hero","reporting-automation-problem-1","reporting-automation-problem-2","reporting-automation-problem-3","reporting-automation-solution","reporting-automation-next"],"online-store-development":["online-store-development-hero","online-store-development-problem-1","online-store-development-problem-2","online-store-development-problem-3","online-store-development-solution","online-store-development-next"],"catalog-automation":["catalog-automation-hero","catalog-automation-problem-1","catalog-automation-problem-2","catalog-automation-problem-3","catalog-automation-solution","catalog-automation-next"],"store-conversion":["store-conversion-hero","store-conversion-problem-1","store-conversion-problem-2","store-conversion-problem-3","store-conversion-solution","store-conversion-next"],"store-migration":["store-migration-hero","store-migration-problem-1","store-migration-problem-2","store-migration-problem-3","store-migration-solution","store-migration-next"],"local-business-websites":["local-business-websites-hero","local-business-websites-problem-1","local-business-websites-problem-2","local-business-websites-problem-3","local-business-websites-solution","local-business-websites-next"],"service-websites":["service-websites-hero","service-websites-problem-1","service-websites-problem-2","service-websites-problem-3","service-websites-plan","service-websites-solution","service-websites-next"],"landing-pages":["landing-pages-hero","landing-pages-problem-1","landing-pages-problem-2","landing-pages-problem-3","landing-pages-solution","landing-pages-next"],"corporate-websites":["corporate-websites-hero","corporate-websites-problem-1","corporate-websites-problem-2","corporate-websites-problem-3","corporate-websites-solution","corporate-websites-next"],"website-redesign":["website-redesign-hero","website-redesign-problem-1","website-redesign-problem-2","website-redesign-problem-3","website-redesign-solution","website-redesign-next"],"website-maintenance":["website-maintenance-hero","website-maintenance-problem-1","website-maintenance-problem-2","website-maintenance-problem-3","website-maintenance-solution","website-maintenance-next"],"website-speed-security":["website-speed-security-hero","website-speed-security-problem-1","website-speed-security-problem-2","website-speed-security-problem-3","website-speed-security-solution","website-speed-security-next"],"api-integrations":["api-integrations-hero","api-integrations-problem-1","api-integrations-problem-2","api-integrations-problem-3","api-integrations-solution","api-integrations-next"],"web-applications":["web-applications-hero","web-applications-problem-1","web-applications-problem-2","web-applications-problem-3","web-applications-solution","web-applications-next"],"custom-functionality":["custom-functionality-hero","custom-functionality-problem-1","custom-functionality-problem-2","custom-functionality-problem-3","custom-functionality-solution","custom-functionality-next"],"website-audit":["website-audit-hero","website-audit-problem-1","website-audit-problem-2","website-audit-problem-3","website-audit-solution","website-audit-next"],"traffic-recovery":["traffic-recovery-hero","traffic-recovery-problem-1","traffic-recovery-problem-2","traffic-recovery-problem-3","traffic-recovery-solution","traffic-recovery-next"]};
Object.assign(premiumCommercialFamilies,{"semantic-core":["semantic-core-hero","semantic-core-problem-1","semantic-core-problem-2","semantic-core-problem-3","semantic-core-solution","semantic-core-next"],"seo-content":["seo-content-hero","seo-content-problem-1","seo-content-problem-2","seo-content-problem-3","seo-content-solution","seo-content-next"],"google-search-ads":["google-search-ads-hero","google-search-ads-problem-1","google-search-ads-problem-2","google-search-ads-problem-3","google-search-ads-solution","google-search-ads-next"],"google-remarketing":["google-remarketing-hero","google-remarketing-problem-1","google-remarketing-problem-2","google-remarketing-problem-3","google-remarketing-solution","google-remarketing-next"],"consent-mode":["consent-mode-hero","consent-mode-problem-1","consent-mode-problem-2","consent-mode-problem-3","consent-mode-solution","consent-mode-next"],"competitor-price-monitoring":["competitor-price-monitoring-hero","competitor-price-monitoring-problem-1","competitor-price-monitoring-problem-2","competitor-price-monitoring-problem-3","competitor-price-monitoring-solution","competitor-price-monitoring-next"],"wordpress-development":["wordpress-development-hero","wordpress-development-problem-1","wordpress-development-problem-2","wordpress-development-problem-3","wordpress-development-solution","wordpress-development-next"],"business-automation":["business-automation-hero","business-automation-problem-1","business-automation-problem-2","business-automation-problem-3","business-automation-solution","business-automation-next"],"crm-development":["crm-development-hero","crm-development-problem-1","crm-development-problem-2","crm-development-problem-3","crm-development-solution","crm-development-next"],"ai-agents":["ai-agents-hero","ai-agents-problem-1","ai-agents-problem-2","ai-agents-problem-3","ai-agents-solution","ai-agents-next"],"chatbot-development":["chatbot-development-hero","chatbot-development-problem-1","chatbot-development-problem-2","chatbot-development-problem-3","chatbot-development-solution","chatbot-development-next"],"indexing-fixes":["indexing-fixes-hero","indexing-fixes-problem-1","indexing-fixes-problem-2","indexing-fixes-problem-3","indexing-fixes-solution","indexing-fixes-next"],"metadata-optimization":["metadata-optimization-hero","metadata-optimization-problem-1","metadata-optimization-problem-2","metadata-optimization-problem-3","metadata-optimization-solution","metadata-optimization-next"],"internal-linking":["internal-linking-hero","internal-linking-problem-1","internal-linking-problem-2","internal-linking-problem-3","internal-linking-solution","internal-linking-next"],"competitor-seo-analysis":["competitor-seo-analysis-hero","competitor-seo-analysis-problem-1","competitor-seo-analysis-problem-2","competitor-seo-analysis-problem-3","competitor-seo-analysis-solution","competitor-seo-analysis-next"],"search-console-setup":["search-console-setup-hero","search-console-setup-problem-1","search-console-setup-problem-2","search-console-setup-problem-3","search-console-setup-solution","search-console-setup-next"],"crawl-configuration":["crawl-configuration-hero","crawl-configuration-problem-1","crawl-configuration-problem-2","crawl-configuration-problem-3","crawl-configuration-solution","crawl-configuration-next"],"seo-redirects":["seo-redirects-hero","seo-redirects-problem-1","seo-redirects-problem-2","seo-redirects-problem-3","seo-redirects-solution","seo-redirects-next"],"structured-data":["structured-data-hero","structured-data-problem-1","structured-data-problem-2","structured-data-problem-3","structured-data-solution","structured-data-next"],"ai-search-optimization":["ai-search-optimization-hero","ai-search-optimization-problem-1","ai-search-optimization-problem-2","ai-search-optimization-problem-3","ai-search-optimization-solution","ai-search-optimization-next"]});
const premiumCommercialSlugs=Object.keys(premiumCommercialFamilies);
const uaExpansionSlugs=["semantic-core","seo-content","google-search-ads","google-remarketing","consent-mode","competitor-price-monitoring","wordpress-development","business-automation","crm-development","ai-agents","chatbot-development","indexing-fixes","metadata-optimization","internal-linking","competitor-seo-analysis","search-console-setup","crawl-configuration","seo-redirects","structured-data","ai-search-optimization"];
const commercialTwoFaq=["merchant-center","google-shopping","ga4-conversions","business-dashboards","reporting-automation","online-store-development","catalog-automation","api-integrations","web-applications","custom-functionality","website-audit","traffic-recovery"];
const premiumEditorialFamilies={"horoshop":["hs-categories","hs-filters","hs-feed","hs-store-process","hs-next"],"about":["about-experience","about-listen","about-investigate","about-solve","about-network","about-fit-store","about-fit-service","about-fit-ads","about-next"],"portfolio":["portfolio-count","portfolio-seo","portfolio-ads","portfolio-data","portfolio-web","portfolio-sectors","portfolio-lock","portfolio-next"],"contact":["contact-describe","contact-address","contact-next"],"privacy":[]};
const premiumEditorialSlugs=Object.keys(premiumEditorialFamilies);
const premiumSeoSlugs=['local-seo','ecommerce-seo','service-business-seo','international-seo','seo-audit'];
const allUaPremiumSlugs=['','seo','google-ads','web-development',...premiumSeoSlugs,...premiumCommercialSlugs,...premiumEditorialSlugs];
// The actual WordPress SEO inventory, not menu labels, defines completion.
async function assertUaInventory(){
 const response=await fetch(HOST+'/mrseo-locales-sitemap.xml');
 if(!response.ok)throw Error('UA inventory sitemap HTTP '+response.status);
 const xml=await response.text();
 const published=[...xml.matchAll(/<loc>([^<]+)<\/loc>/g)].map(m=>new URL(m[1].replace(/&amp;/g,'&')).pathname.replace(/^\/+|\/+$/g,''));
 const foreign=new Set(['ru','en','pl','de',...allLocales]);
 const ua=published.filter(path=>!foreign.has(path.split('/')[0]));
 const expected=new Set(allUaPremiumSlugs),actual=new Set(ua);
 const missing=[...actual].filter(path=>!expected.has(path)),extra=[...expected].filter(path=>!actual.has(path));
 if(expected.size!==59||ua.length!==actual.size||missing.length||extra.length)throw Error('UA Premium inventory mismatch '+JSON.stringify({expected:expected.size,actual:actual.size,missing,extra,duplicates:ua.length-actual.size}));
 console.log('UA Premium route coverage: '+actual.size+' canonical routes');
}
async function auditUaScenePlayback(page,selector,item){
 const scenes=page.locator(selector);
 for(let i=0;i<await scenes.count();i++){
  const scene=scenes.nth(i);
  await scene.scrollIntoViewIfNeeded();
  const state=await scene.evaluate(s=>({id:s.getAttribute('data-puc-scene')||s.getAttribute('data-pue-scene')||s.id||String(s.className.baseVal),animated:!!s.querySelector('animate,animateMotion,animateTransform')}));
  try{await scene.evaluate(s=>new Promise((resolve,reject)=>{const start=performance.now();let previous=null;function sample(){const t=s.getCurrentTime();if(!s.animationsPaused()){if(previous===null)previous=t;if(t>previous+.035){resolve();return;}}else previous=null;if(performance.now()-start>3000){reject(Error('no timeline progress'));return;}requestAnimationFrame(sample);}sample();}));}catch(e){item.errors.push('UA scene not moving: '+state.id+' '+e.message);}
  if(!state.animated)item.errors.push('UA static scene: '+state.id);
 }
}
const uaFourSlugs=['ecommerce-seo','analytics','service-websites','horoshop'];
const uaFinalSlugs=['seo-audit','performance-max','about','portfolio','contact'];
const uaNewSlugs=['local-business-websites','landing-pages','corporate-websites','website-redesign','local-seo','service-business-seo','international-seo','local-google-ads','google-ads-audit','store-conversion','store-migration','website-maintenance','website-speed-security'];
// All existing compact RU services: core 8 plus 12 genuinely routed specialist pages.
const ruCoreSlugs=['seo','seo-audit','ecommerce-seo','google-ads','performance-max','analytics','service-websites','horoshop'];
const ruSpecialistSlugs=['website-audit','traffic-recovery','google-shopping','merchant-center','online-store-development','catalog-automation','web-applications','api-integrations','custom-functionality','ga4-conversions','business-dashboards','reporting-automation'];
const ruPilotSlugs=[...ruCoreSlugs,...ruSpecialistSlugs];
const ruNewSlugs=uaNewSlugs;
const enGbNewSlugs=['local-business-websites','landing-pages','corporate-websites','website-redesign',
 'local-seo','service-business-seo','international-seo','local-google-ads',
 'store-conversion','store-migration','website-speed-security','woocommerce-shopify-stores',
 'catalog-automation','api-integrations','web-applications','ga4-conversions'];
const enGbExisting=['seo','seo-audit','ecommerce-seo','google-ads','performance-max','analytics',
 'service-websites','website-design','online-shop-development','google-ads-audit',
 'merchant-center-help','google-shopping','wordpress-care'];
const sceneSlugs=['seo','seo-audit','ecommerce-seo','google-ads','analytics','web-development','website-design','online-shop-development'];
const sizes=[{name:'desktop',width:1440,height:900},{name:'wide',width:1920,height:1080},{name:'mobile',width:390,height:844},{name:'narrow',width:360,height:780}];
const results=[];
const urlOf=(l,s)=>HOST+'/'+(l==='uk'?'':l+'/')+(s?s+'/':'');
async function audit(browser,viewport,lang,slug){
 const url=urlOf(lang,slug);
 const mobile=viewport.width<=390;
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
   const uaHome=lang==='uk'&&slug==='';
   const node=slug===''?document.querySelector(uaHome?'.pt-ua-home .pt-orbit':'.orbit-lab .lab-visual'):document.querySelector('.eu-orbit-scene');
   const earth=slug===''?node?.querySelector(uaHome?'.pt-globe':'.lab-core'):node?.querySelector('.eu-earth-core');
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
    hero:!!document.querySelector(slug===''?(uaHome?'.pt-ua-home .pt-home':'.orbit-lab .lab-shell'):coreShard?'.pti-page .pti-hero,.ukseo-hero,.special-hero,.about-hero,.portfolio-hero,.seo-hero,.intl-hero,.dev-hero,.pl-svc-hero,.inner-hero,.sp-hero':'.eu-hero'),
    sharedHeader:!!document.querySelector('header.site-header .nav-dropdown .services-menu-toggle'),
    sharedFooter:!!document.querySelector('footer.mrseo-footer'),
    footerLabels:[...document.querySelectorAll('footer.mrseo-footer .mrseo-footer-col a')].map(a=>a.textContent.trim()),
    enGbStyles:!!document.querySelector('link[href*="en-gb-interiors.css"]'),
    enGbScenesCss:!!document.querySelector('link[href*="en-gb-scenes.css"]'),
    enGbPages:(()=>{
      const old=document.querySelector('.pl-svc--en-gb-compact');
      const newer=document.querySelector('.uws-page');
      const scene=newer?.querySelector('.uws-demo');
      const rect=scene?.getBoundingClientRect();
      return {
        existing:!!old,newPage:!!newer,
        oldScene:!!old?.querySelector('.pl-svc-scene'),
        pains:old?.querySelectorAll('.pl-svc-need').length||newer?.querySelectorAll('.uws-pains .ukseo-problem-card').length||0,
        outcomes:old?.querySelectorAll('.pl-svc-outcome-list>div').length||newer?.querySelectorAll('.uws-solution-list>div').length||0,
        faq:old?.querySelectorAll('.pl-svc-faq-items details').length||newer?.querySelectorAll('.uws-faq details').length||0,
        unnecessary:old?.querySelectorAll('.pl-svc-process,.pl-svc-example,.pl-svc-limits,.pl-svc-related').length||0,
        actualUK:!!newer&&!(/[А-Яа-яІіЇїЄєҐґ]/.test(scene?.textContent||'')),
        heroGeometry:!!newer?!!rect&&rect.width>240&&rect.left>=-2&&rect.right<=innerWidth+2:true,
        contact:!!document.querySelector('a[href$="/en/contact/"]')
      };
    })(),
    ruNewStyles:!!document.querySelector('link[href*="ru-website-scenes.css"]'),
    ruMotionStyles:!!document.querySelector('link[href*="ru-premium-motion.css"]'),
    ruAnalyticsPanel:document.querySelector('.ms-scene-analytics .ms-data-head')?.textContent.trim()||'',
    ruAnalyticsCheck:document.querySelector('.ms-scene-analytics .ms-data-check')?.textContent.trim()||'',
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
    orbitMaster:!!document.querySelector(uaHome?'.pt-ua-home .pt-orbit':'.orbit-lab .lab-shell .lab-visual'),
    uaPremiumHome:!!document.querySelector('.pt-ua-home'),
    premiumCommercial:(()=>{
      const root=document.querySelector('.puc-page'),hero=root?.querySelector('.psc-hero-stage'),scenes=[...root?.querySelectorAll('svg.puc-motion')||[]];
      return {route:root?.dataset.pucRoute||'',css:!!document.querySelector('link[href*="premium-ua-commercial.css"]'),hero:!!hero,
        heroWidth:hero?.getBoundingClientRect().width||0,heroParts:hero?.querySelectorAll('[data-puc-part]').length||0,
        geometry:scenes.every(el=>{const r=el.getBoundingClientRect();return r.width>0&&r.height>0&&r.left>=-2&&r.right<=innerWidth+2}),
        families:scenes.map(el=>el.dataset.pucScene),animations:scenes.every(el=>!!el.querySelector('animate,animateMotion,animateTransform')),
        tabs:root?.querySelectorAll('[data-puc-tab]').length||0,pause:root?.querySelectorAll('.psc-pause').length||0,
        problems:root?.querySelectorAll('.psc-problem-card').length||0,delivery:root?.querySelectorAll('.psc-delivery .pti-step').length||0,
        faq:root?.querySelectorAll('.psc-faq-section details').length||0,plan:root?.querySelectorAll('.puc-plan .pti-step').length||0,
        result:!!root?.querySelector('.psc-result p'),final:!!root?.querySelector('.psc-final a[href$="/contact/"]'),
        oldRelated:root?.querySelectorAll('.ns-related,.uws-related').length||0};
    })(),
    premiumEditorial:(()=>{
      const marker=document.querySelector('.pue-marker'),scenes=[...document.querySelectorAll('svg.pue-motion')];
      return {route:marker?.dataset.pueRoute||'',css:!!document.querySelector('link[href*="premium-ua-editorial.css"]'),
        families:scenes.map(el=>el.dataset.pueScene),geometry:scenes.every(el=>{const r=el.getBoundingClientRect();return r.width>0&&r.height>0&&r.left>=-2&&r.right<=innerWidth+2}),
        animations:scenes.every(el=>!!el.querySelector('animate,animateMotion,animateTransform')),pause:document.querySelectorAll('.pue-pause').length,
        privacy:!!document.querySelector('.mrseo-privacy-page'),contactForm:!!document.querySelector('form[action*="admin-post.php"] input[name="mrseo_nonce"]')&&!!document.querySelector('form textarea[name="contact_message"]')&&!!document.querySelector('form .mrseo-privacy-notice'),
        partner:document.querySelectorAll('.hs-authentic-logo img,.hs-official-badge').length,
        portfolioCards:document.querySelectorAll('.client-directory-card').length,
        experience:document.querySelector('.about-experience-number')?.textContent.trim()||''};
    })(),
    premiumSeoCluster:(()=>{
      const root=document.querySelector('.psc-page'),hero=root?.querySelector('.psc-hero-stage'),scenes=[...root?.querySelectorAll('svg.psc-motion')||[]];
      return {route:root?.dataset.pscRoute||'',css:!!document.querySelector('link[href*="premium-seo-cluster.css"]'),hero:!!hero,geometry:scenes.every(el=>{const r=el.getBoundingClientRect();return r.width>0&&r.height>0&&r.left>=-2&&r.right<=innerWidth+2}),
       families:scenes.map(el=>el.dataset.pscScene),animations:scenes.every(el=>!!el.querySelector('animate,animateMotion,animateTransform')),
       heroWidth:hero?.getBoundingClientRect().width||0,tabs:root?.querySelectorAll('[data-psc-tab]').length||0,pause:root?.querySelectorAll('.psc-pause').length||0,
       problems:root?.querySelectorAll('.psc-problem-card').length||0,delivery:root?.querySelectorAll('.psc-delivery .pti-step').length||0,
       faq:root?.querySelectorAll('.psc-faq-section details').length||0,lab:root?.querySelectorAll('[data-psc-lab-tab]').length||0,
       audit:root?.querySelectorAll('.psc-audit-plan .pti-step').length||0,proof:!!root?.querySelector('.psc-proof a[href$="/portfolio/"]'),
       final:!!root?.querySelector('.psc-final a[href$="/contact/"]'),result:!!root?.querySelector('.psc-result p')};
    })(),
    premiumInterior:(()=>{
      const root=document.querySelector('.pti-page'),stage=root?.querySelector('.pti-stage'),scene=root?.querySelector('.pti-scene');
      const rect=stage?.getBoundingClientRect(),story=root?.querySelector('[data-pti-story]');
      const imgs=[...root?.querySelectorAll('img')||[]];
      return {route:root?.dataset.ptiService||'',style:!!document.querySelector('link[href*="premium-ua-interiors.css"]'),
        geometry:!!rect&&rect.width>240&&rect.left>=-2&&rect.right<=innerWidth+2,
        scene:!!scene,sceneSvg:!!stage?.querySelector('svg.pti-scene-svg'),sceneMotion:stage?.querySelectorAll('animate,animateMotion,animateTransform').length||0,
        images:imgs.length,realImages:imgs.every(x=>x.getAttribute('src')?.startsWith('data:image/webp;base64,')),
        heroImage:!!stage?.querySelector('img')?.naturalWidth,story:story?.dataset.ptiStory||'',
        problems:root?.querySelectorAll('section[id$="problems"] article.pti-card,#ukseo-cases article.pti-card').length||0,
        steps:story?.querySelectorAll('.pti-step').length||0,faq:root?.querySelectorAll('.pti-faq details').length||0,
        caps:root?.querySelectorAll('#dev-capabilities .pti-card-art svg').length||0,
        capMotion:root?.querySelectorAll('#dev-capabilities .pti-card-art animate,#dev-capabilities .pti-card-art animateMotion,#dev-capabilities .pti-card-art animateTransform').length||0,
        solutions:root?.querySelectorAll('.pti-solution').length||0,
        lowerFamilies:[...root?.querySelectorAll('svg.pti-lower-motion')||[]].map(s=>s.dataset.ptiMotion),
        lowerStory:story?.querySelector('.pti-story-art svg.pti-lower-motion')?.dataset.ptiMotion||'',
        lowerGeometry:[...root?.querySelectorAll('svg.pti-lower-motion')||[]].every(s=>{const r=s.getBoundingClientRect();return r.width>0&&r.height>0&&r.left>=-2&&r.right<=innerWidth+2}),
        lowerPause:!!root?.querySelector('.pti-lower-pause'),
        lowerAnimations:[...root?.querySelectorAll('svg.pti-lower-motion')||[]].every(s=>!!s.querySelector('animate,animateMotion,animateTransform')),
        tabs:root?.querySelectorAll('[data-phase]').length||0,pause:!!root?.querySelector('.pti-pause'),
        final:!!root?.querySelector('.pti-final a[href$="/contact/"]')};
    })(),
    uaPremiumStyles:!!document.querySelector('link[href*="home-uk-premium.css"]'),
    uaPremiumCards:document.querySelectorAll('.pt-ua-home .ph-service').length,
    uaPremiumImages:[...document.querySelectorAll('.pt-ua-home .ph-art img')].every(img=>!!img.getAttribute('src')&&img.getAttribute('src').startsWith('data:image/webp;base64,')),
    uaPremiumMotions:document.querySelectorAll('.pt-ua-home .ph-motion').length,
    uaPremiumLinks:document.querySelectorAll('.pt-ua-home a.ph-card-link[href]').length,
    uaPremiumImageLinks:[...document.querySelectorAll('.pt-ua-home .ph-art img')].filter(img=>img.closest('a.ph-card-link[href]')).length,
    uaPremiumMenuGroups:document.querySelectorAll('header.site-header .mrseo-simple-nav .mrseo-simple-card').length,
    uaPremiumMenuParents:document.querySelectorAll('header.site-header .mrseo-simple-nav a.mrseo-simple-card[href]').length,
    uaPremiumHeaderPhone:!!document.querySelector('header.site-header a[href^="tel:"]'),
    uaPremiumMenuFont:parseFloat(getComputedStyle(document.querySelector('header.site-header .services-menu-toggle')||document.body).fontSize),
    uaPremiumControls:!!document.querySelector('.pt-ua-home .pt-rotate')&&!!document.querySelector('.pt-ua-home .ph-pause'),
    uaPremiumResolution:!!document.querySelector('.pt-ua-home .ph-resolution a[href$="/contact/"]'),
    heroEdge:(()=>{
      const el=document.querySelector(uaHome?'#main > .pt-ua-home > .pt-home':'#main > .orbit-lab');
      if(!el)return null;
      const rect=el.getBoundingClientRect();
      return {left:Math.round(rect.left),right:Math.round(rect.right),width:Math.round(rect.width)};
    })(),
    heroPanel:(()=>{
      const el=document.querySelector(uaHome?'#main > .pt-ua-home > .pt-home':'#main > .orbit-lab > .lab-shell');
      if(!el)return null;
      const computed=getComputedStyle(el);
      return {background:computed.backgroundColor,radius:computed.borderTopLeftRadius,
        overflow:computed.overflowX,shadow:computed.boxShadow};
    })(),
    orbitStylesheet:!!document.querySelector(uaHome?'link[href*="home-uk-premium.css"]':'link[href*="orbit-scene.css"]'),
    legacyEuStylesheet:!!document.querySelector('link[href*="eu-expansion.css"]'),
    sharedHomepageVisual:uaHome?!!document.querySelector('.pt-ua-home .pt-globe')&&document.querySelectorAll('.pt-ua-home .pt-orbit-lines path').length===8:!!document.querySelector('.orbit-lab .lab-shell .lab-visual .lab-core')&&!!document.querySelector('.orbit-lab .lab-connectors #lab-spokes'),
    orbitCanvas:!!document.querySelector(uaHome?'.pt-globe.pt-globe-ready canvas':'.orbit-lab canvas.lab-webgl-canvas'),
    orbitStaticTexture:uaHome?!!earth?.querySelector('img[src^="data:image/"]')&&earth.querySelector('img').naturalWidth>0:earth?getComputedStyle(earth,'::before').backgroundImage.includes('earth-day.jpg'):false,
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
      const sections=target?[...document.querySelectorAll('.pti-page [data-pti-story],.ua-sv')]:[];
      const style=!!document.querySelector('link[href*="ua-commercial-visuals.css"],.pti-page')&&!!document.querySelector('link[href*="premium-ua-interiors.css"],link[href*="ua-commercial-visuals.css"]');
      const expected=lang==='uk'?1:2;
      const roots=sections.map(e=>({id:e.querySelector('h2')?.id||'',width:Math.round(e.getBoundingClientRect().width),
        left:Math.round(e.getBoundingClientRect().left),right:Math.round(e.getBoundingClientRect().right)}));
      return {style,sections:sections.length,roots,headings:[...document.querySelectorAll('.pti-page [data-pti-story] h2,.ua-sv h2')].map(x=>x.textContent.trim()),
        properOrder:sections.length===expected&&(expected===1||!!(sections[0].compareDocumentPosition(sections[1])&Node.DOCUMENT_POSITION_FOLLOWING)),
        hiddenOnForeign:lang!=='uk'&&!document.querySelector('.ua-sv'),
        goodGeometry:roots.length===expected&&roots.every(r=>r.left>=-2&&r.right<=innerWidth+2&&r.width>250)};
    })(),
    uaAdsPricing:(()=>{
      const target=lang==='uk'&&slug==='google-ads';
      const root=document.querySelector('#ukads-pricing');
      const cards=[...document.querySelectorAll('.ukads-price-card,.pti-price-card')];
      const css=!!document.querySelector('link[href*="ua-google-ads-pricing.css"]')||(target&&!!document.querySelector('link[href*="premium-ua-interiors.css"]'));
      const flow=document.querySelector('.ukads-flow-plate');
      const stages=flow?.querySelectorAll('.ukads-flow-node').length||0;
      const boxes=[root,flow,...cards].filter(Boolean).map(el=>{
        const a=el.getBoundingClientRect();
        return {left:Math.round(a.left),right:Math.round(a.right),width:Math.round(a.width)};
      });
      const text=cards.map(el=>el.textContent.replace(/\s+/g,' ').trim());
      const heading=root?.querySelector('h2')?.textContent.trim()||'';
      const hero=document.querySelector('.ukseo--ads .ukseo-hero-copy h1,.pti-page[data-pti-service="google-ads"] .pti-hero h1');
      const letterSpace=hero?parseFloat(getComputedStyle(hero).letterSpacing):NaN;
      const heroTrackingOK=!target||(Number.isFinite(letterSpace)&&letterSpace>-5&&letterSpace<=0);
      return {target,css,count:cards.length,stages,heading,
        heroTrackingOK,pricesCorrect:text.length===2&&text[0].includes('5 000')&&text[0].includes('5 900')&&text[1].includes('10 000')&&text[1].includes('9 500')&&text.every(s=>s.includes('Разове налаштування')&&s.includes('₴/міс.')),
        geometry:boxes.length===3&&boxes.every(b=>b.width>250&&b.left>=-2&&b.right<=innerWidth+2),
        noLeak:!target&&!css&&!root&&cards.length===0&&!flow};
    })(),
    uaSeoVisuals:(()=>{
      if(lang!=='uk'||slug!=='seo')return null;
      const journey=document.querySelector('#ukseo-journey-title');
      const priorities=document.querySelector('#ukseo-priorities-title');
      const stages=document.querySelectorAll('.ukseo-visual-journey > li');
      const board=document.querySelector('.ukseo-visual-priority-board,.pti-page [data-pti-story="seo"]');
      const css=!!document.querySelector('link[href*="ua-seo-visuals.css"],link[href*="premium-ua-interiors.css"]');
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
    satellites:node?.querySelectorAll(slug===''?(uaHome?'.pt-node':'.lab-node'):'.eu-satellite').length||0,
    portfolio:!!document.querySelector('a[href$="/'+(lang==='uk'?'':lang+'/')+'portfolio/"]'),
    privacyLink:!!document.querySelector('a[href$="/'+(lang==='uk'?'':lang+'/')+'privacy/"]'),
    contactBarText:document.querySelector('.mrseo-mobile-contact-bar')?.textContent||'',
    bodyClass:body.className
   };
  },{lang,slug,width:viewport.width,coreShard});
  const c=item.check;
  // Compare computed colors, not merely CSS presence. Covers all 38 UA
  // interiors at each existing tested viewport; no asset leak to home/RU.
  const accent=await page.evaluate(()=>{
   const loaded=!!document.querySelector('link[href*="ua-brand-accents.css"]');
   const headings=[...document.querySelectorAll('.pti-page :is(h1,h2,h3) em,body:has([data-pue-route="horoshop"]) :is(.special-hero-horoshop,.ukseo--horoshop) :is(h1,h2,h3) em,body:has(.pue-marker) :is(.uaf-heading,.uaf-contact-guide-top,.uaf-capability-copy) :is(h1,h2,h3) em')];
   const labels=[...document.querySelectorAll('.pti-page .pti-kicker,body:has([data-pue-route="horoshop"]) :is(.special-hero-horoshop .eyebrow,.ukseo--horoshop .ukseo-kicker,.hs-demo-kicker),body:has([data-pue-route="about"]) .about-page .eyebrow,body:has([data-pue-route="portfolio"]) :is(.portfolio-hero,.portfolio-heading,.inner-final-cta) .eyebrow,body:has([data-pue-route="contact"]) :is(.contact-cinematic-hero .eyebrow,.contact-brief-kicker),body:has([data-pue-route="privacy"]) .mrseo-privacy-kicker,body:has(.pue-marker) .uaf-eyebrow')];
   const dark=[...document.querySelectorAll('body:has([data-pue-route="portfolio"]) .client-confidential .eyebrow')];
   const verify=(nodes,color)=>nodes.filter(n=>getComputedStyle(n).color!==color||Number(getComputedStyle(n).opacity)<.99).map(n=>({text:n.textContent.trim().slice(0,100),color:getComputedStyle(n).color,opacity:getComputedStyle(n).opacity}));
   return {loaded,headings:headings.length,labels:labels.length,dark:dark.length,wrong:[...verify(headings,'rgb(172, 70, 52)'),...verify(labels,'rgb(140, 57, 42)'),...verify(dark,'rgb(242, 163, 140)')]};
  });
  if(lang==='uk'&&slug!==''){
   const needsHeading=slug!=='privacy';
   if(!accent.loaded||accent.labels<1||(needsHeading&&accent.headings<1)||(slug==='horoshop'&&accent.headings!==4)||(slug==='portfolio'&&accent.dark!==1)||accent.wrong.length)item.errors.push('UA brand accent regression '+JSON.stringify(accent));
   item.brandAccent=accent;
   // Verify that editorial labels are not merely the correct computed
   // color: each must be truly visible in its own scrolled viewport.
   if(['about','portfolio'].includes(slug)){
    const labels=page.locator(slug==='about'?'.about-page .eyebrow, .uaf-eyebrow':'.portfolio-hero .eyebrow,.portfolio-heading .eyebrow,.inner-final-cta .eyebrow,.client-confidential .eyebrow,.uaf-eyebrow');
    for(let i=0;i<await labels.count();i++){
     const label=labels.nth(i);await label.scrollIntoViewIfNeeded();
     try{await label.evaluate(el=>new Promise((resolve,reject)=>{const start=performance.now();function sample(){let opacity=1,visible=true;for(let n=el;n;n=n.parentElement){const c=getComputedStyle(n);opacity*=Number(c.opacity);if(c.display==='none'||c.visibility==='hidden')visible=false;}const r=el.getBoundingClientRect();if(visible&&opacity>=.99&&r.width>0&&r.height>0&&r.bottom>0&&r.top<innerHeight){resolve();return;}if(performance.now()-start>4000){reject(Error('not visible: '+el.textContent.trim()+' opacity='+opacity));return;}requestAnimationFrame(sample);}sample();}));}catch(e){item.errors.push('UA editorial accent not readable after scroll: '+e.message);}
    }
    await page.evaluate(()=>window.scrollTo({top:0,behavior:'instant'}));
   }
  }else if(accent.loaded)item.errors.push('UA brand accent stylesheet leaked to '+lang+'/'+slug);
  // Copy quality: the 30 structured UA service pages must have actual
  // service-specific introductory text, not old generic template fallbacks.
  if(lang==='uk'&&await page.locator('.puc-page,.psc-page').count()){
   const intro=await page.evaluate(()=>{const root=document.querySelector('.puc-page,.psc-page');if(!root)return null;return {foot:root.querySelector('.pti-hero-copy .pti-footnote')?.textContent.trim()||'',heading:root.querySelector('.psc-problems #psc-problem-title')?.textContent.trim()||'',lead:root.querySelector('.psc-problems .pti-section-head>p')?.textContent.trim()||''};});
   const forbidden=["Спочатку підтверджуємо причину. Потім пропонуємо рішення.","Спочатку перевіряємо причину, потім погоджуємо зміни.","Що заважає отримувати результат?","Перевіряємо конкретні ситуації вашого бізнесу."];
   if(!intro||Object.values(intro).some(v=>!v||forbidden.includes(v)))item.errors.push('UA service introduction missing or generic: '+JSON.stringify(intro));
  }
  const exactPath=url;
  if(lang==='uk'){
   const expectedMeta={"":["Агентство інтернет-маркетингу, SEO та веброзробка | MrSeo.tech","SEO, контекстна реклама Google Ads, створення сайтів і автоматизація бізнесу. 🎯 Знаходимо причини слабких продажів і пропонуємо рішення. 🚀"],"seo":["SEO-просування сайтів у Google — послуги SEO | MrSeo.tech","SEO-просування сайтів: пошуковий попит, структура, 🔍 індексація та технічна оптимізація. Погоджуємо план робіт і перевіряємо результат. 📈"],"local-seo":["Локальне SEO та просування в Google Maps | MrSeo.tech","Локальне SEO для бізнесу: Google Карти, профіль компанії, 📍 сайт і місцеві запити. Допомагаємо клієнтам знайти адресу, телефон і послуги. 🗺️"],"ecommerce-seo":["SEO-просування інтернет-магазину в Google | MrSeo.tech","SEO для інтернет-магазинів: категорії, фільтри, товарні сторінки, 🛒 пошуковий попит та індексація. План розвитку каталогу. 📈"],"service-business-seo":["SEO сайтів послуг — просування бізнесу в Google | MrSeo.tech","Просування готових сайтів послуг: пошукові запити, комерційні сторінки, 🔍 заголовки й внутрішні посилання. Створення нового сайту — окремо. 🎯"],"international-seo":["Міжнародне SEO та просування сайтів за кордоном | MrSeo.tech","Міжнародне SEO: пошуковий попит у різних країнах, мовні версії, 🌍 hreflang і структура. Допомагаємо знаходити клієнтів на цільових ринках. 📈"],"seo-audit":["Технічний SEO-аудит сайту — перевірка індексації | MrSeo.tech","SEO-аудит сайту: індексація, дублікати, технічні URL, 🔎 швидкість і структура. Звіт із доказами та пріоритетами виправлень. 📋"],"website-audit":["Комплексний аудит сайту — заявки та конверсія | MrSeo.tech","Комплексний аудит сайту: пошук, мобільні екрани, форми, 🔍 шлях до замовлення та аналітика. Звіт із пріоритетними виправленнями. 📋"],"traffic-recovery":["Відновлення органічного трафіку та позицій сайту | MrSeo.tech","Впали переходи з Google? Аналізуємо дату падіння, запити, 📉 сторінки, міграції та індексацію. Погоджуємо план відновлення. 📈"],"google-ads":["Контекстна реклама Google Ads — налаштування та ведення | MrSeo.tech","Налаштування та ведення Google Ads для бізнесу й магазинів. 🎯 Пошукові й товарні кампанії, контроль витрат, заявок та продажів. 📊"],"performance-max":["Performance Max — налаштування та ведення кампаній | MrSeo.tech","Налаштування Performance Max для інтернет-магазинів: товари, фід, 📊 конверсії, витрати та маржа. Контролюємо економіку кампаній. 🎯"],"google-shopping":["Google Shopping — налаштування товарної реклами | MrSeo.tech","Налаштування Google Shopping: товарні оголошення, фід Merchant Center, 🛍️ ціни та вимірювання покупок. Оцінка витрат і замовлень. 📊"],"merchant-center":["Google Merchant Center — налаштування та виправлення помилок | MrSeo.tech","Налаштування Google Merchant Center, перевірка товарного фіда, 🛒 відхилень і блокувань. Виправлення причин та підготовка до повторного розгляду. 🔧"],"local-google-ads":["Google Ads для локального бізнесу — реклама послуг | MrSeo.tech","Локальна реклама Google Ads: географія, запити, оголошення, 📍 дзвінки й заявки для клінік, салонів, майстерень та інших послуг. 📞"],"google-ads-audit":["Аудит Google Ads — перевірка контекстної реклами | MrSeo.tech","Разовий аудит Google Ads: запити, витрати, кампанії й конверсії. 🔎 Звіт із проблемами та пріоритетами; ведення реклами окремо. 📋"],"analytics":["Маркетингова та наскрізна аналітика для бізнесу | MrSeo.tech","Маркетингова аналітика: зводимо витрати Google Ads, заявки й продажі, 📊 оцінюємо канали та пояснюємо розбіжності. Налаштування GA4 окремо. 💡"],"ga4-conversions":["Налаштування GA4, Google Tag Manager і конверсій | MrSeo.tech","Налаштування Google Analytics 4 та Google Tag Manager: події, 🏷️ покупки, заявки, конверсії Google Ads, перевірка дублювань. 📊"],"business-dashboards":["Розробка дашбордів для бізнесу — аналітичні панелі | MrSeo.tech","Розробка дашбордів: реклама, замовлення, продажі та товари в одній панелі. 📊 Джерела даних, BigQuery, Looker Studio за потреби. 📈"],"reporting-automation":["Автоматизація звітності та регулярних звітів | MrSeo.tech","Автоматизація звітності: регулярне завантаження даних, перевірка, ⚙️ доставка звітів і повідомлення про помилки без ручного копіювання. 📑"],"online-store-development":["Розробка інтернет-магазинів — створення під ключ | MrSeo.tech","Створення інтернет-магазину під потреби бізнесу: каталог, кошик, оплата, 🛒 доставка й інтеграції. Підбираємо платформу та перевіряємо замовлення. 📦"],"catalog-automation":["Автоматизація каталогу — оновлення цін і залишків | MrSeo.tech","Автоматизація каталогу товарів: прайси постачальників, 🔄 синхронізація цін і залишків, контроль аномалій та помилок. 📦"],"store-conversion":["Підвищення конверсії інтернет-магазину | MrSeo.tech","Оптимізація конверсії магазину: картка товару, мобільний каталог, 🛒 кошик, доставка й оплата. Знаходимо перешкоди на шляху до покупки. 🎯"],"store-migration":["Перенесення інтернет-магазину — міграція каталогу та SEO | MrSeo.tech","Перенесення інтернет-магазину: товари, адреси сторінок, 🔄 дані та інтеграції. План міграції з перевіркою замовлень і SEO. 📦"],"service-websites":["Розробка сайтів для бізнесу — створення під ключ | MrSeo.tech","Створення сайтів для бізнесу послуг: структура, адаптивний дизайн, 💻 контакти й форми заявок. Базова SEO-готовність; просування окремо. 🎯"],"local-business-websites":["Створення сайту для малого та локального бізнесу | MrSeo.tech","Сайт для малого бізнесу: послуги, адреса, графік, 📍 контакти й адаптивна версія. Створюємо зручний шлях до дзвінка або запису. 📱"],"landing-pages":["Розробка лендінгу — посадкова сторінка для реклами | MrSeo.tech","Створення лендінгу для реклами: одна зрозуміла пропозиція, 🎯 мобільний дизайн, умови та робоча форма заявки. 📩"],"corporate-websites":["Розробка корпоративного сайту для компанії | MrSeo.tech","Створення корпоративного сайту: напрями роботи, послуги, 🏢 досвід, команда, контакти та мовні версії за потреби. 💻"],"website-redesign":["Редизайн сайту — оновлення дизайну та навігації | MrSeo.tech","Редизайн сайту: оновлюємо важливі екрани, мобільну версію й форми, 🎨 зберігаємо робочі URL та перевіряємо SEO. 💻"],"website-maintenance":["Технічна підтримка та супровід сайтів | MrSeo.tech","Технічна підтримка сайтів: виправлення помилок, оновлення, 🔧 форми, кошик і доопрацювання WordPress. Погоджуємо обсяг робіт. 🛠️"],"website-speed-security":["Оптимізація швидкості та безпеки сайту | MrSeo.tech","Оптимізація швидкості сайту, базова безпека й доступність. ⚡ Перевіряємо завантаження, оновлення, резервні копії та мобільні сценарії. 🛡️"],"web-development":["Веброзробка та програмне забезпечення для бізнесу | MrSeo.tech","Індивідуальна веброзробка: CRM, вебзастосунки, особисті кабінети, 💻 API та автоматизація. Підбираємо рішення під процес бізнесу. ⚙️"],"web-applications":["Розробка вебзастосунків та особистих кабінетів | MrSeo.tech","Розробка вебзастосунків, особистих кабінетів і внутрішніх онлайн-сервісів. 💻 Ролі, сценарії, доступи та перевірка роботи. 🔐"],"api-integrations":["API-інтеграції — обмін даними між системами | MrSeo.tech","API-інтеграції сайту, CRM, платежів та сервісів: 🔗 передача замовлень, статусів, контроль збоїв і дублів. 🔄"],"custom-functionality":["Розробка функціоналу сайту та онлайн-калькуляторів | MrSeo.tech","Розробка індивідуального функціоналу: онлайн-калькулятори, 🧩 конфігуратори й модулі за правилами бізнесу. Перевіряємо сценарії. ⚙️"],"horoshop":["Створення та SEO-просування магазинів на Хорошоп | MrSeo.tech","Створення інтернет-магазинів на Хорошоп, SEO, категорії, фільтри, 🛒 фіди та Google Ads. Допомога з запуском і розвитком магазину. 📈"],"about":["Про MrSeo.tech — команда SEO, реклами та розробки | MrSeo.tech","Невелика команда MrSeo.tech із 10-річним досвідом у SEO, Google Ads, 🤝 аналітиці та створенні сайтів. Дізнайтеся про наш підхід. 💡"],"portfolio":["Портфоліо MrSeo.tech — клієнти та проєкти | MrSeo.tech","Клієнти та проєкти MrSeo.tech у SEO, Google Ads, аналітиці й розробці. 📁 Реальні компанії, з якими працювали; конфіденційність результатів. 🤝"],"contact":["Контакти MrSeo.tech — обговорити ваш проєкт | MrSeo.tech","Зв’яжіться з MrSeo.tech щодо SEO, Google Ads, створення сайтів або автоматизації. ✉️ Опишіть задачу та залиште адресу сайту для обговорення. 🤝"],"privacy":["Приватність і обробка звернень | MrSeo.tech","Як MrSeo.tech обробляє дані, 🔒 які ви добровільно надсилаєте через контактну форму. 🛡️"],"semantic-core":["Збір семантичного ядра та SEO-структура сайту | MrSeo.tech","Збір семантичного ядра та кластеризація запитів. Карта сторінок, 🔍 SEO-структура сайту й пріоритети для категорій та послуг. 🗂️"],"seo-content":["SEO-копірайтинг — тексти для категорій і послуг | MrSeo.tech","SEO-копірайтинг: тексти категорій, товарів і послуг, заголовки, ✍️ метатеги та FAQ. Пишемо для покупців із природною пошуковою семантикою. 📝"],"google-search-ads":["Пошукова реклама Google Ads — налаштування кампаній | MrSeo.tech","Налаштування пошукової реклами Google Ads: ключові слова, оголошення, 🔎 мінус-слова, бюджет і відстеження заявок. Ведення за погодженим обсягом. 🎯"],"google-remarketing":["Ремаркетинг Google Ads — динамічна реклама | MrSeo.tech","Налаштування ремаркетингу Google Ads і динамічного ремаркетингу для магазину. 🔄 Аудиторії, товарні ID, виключення та контроль витрат. 🎯"],"consent-mode":["Налаштування Google Consent Mode v2 та тегів | MrSeo.tech","Налаштування Google Consent Mode v2, банера згоди, Google Tag Manager, 🔐 GA4 та Google Ads. Технічна перевірка вибору користувача й тегів. 🛡️"],"competitor-price-monitoring":["Моніторинг цін конкурентів для інтернет-магазинів | MrSeo.tech","Моніторинг цін конкурентів для інтернет-магазину. Зіставлення товарів, 📊 регулярні дані, контроль відхилень і звіт із урахуванням маржі. 🏷️"],"wordpress-development":["Розробка сайтів на WordPress — створення під ключ | MrSeo.tech","Розробка сайтів на WordPress: індивідуальна тема, мобільний дизайн, 💻 форми, контент і базова SEO-готовність. Створення сайтів для бізнесу. ⚙️"],"business-automation":["Автоматизація бізнес-процесів та маркетингу | MrSeo.tech","Автоматизація бізнес-процесів: замовлення, обмін даними, маркетинг, ⚙️ сповіщення та звіти. Індивідуальні рішення з перевіркою й контролем помилок. 🔄"],"crm-development":["Розробка та впровадження CRM для бізнесу | MrSeo.tech","Розробка та впровадження CRM для бізнесу й інтернет-магазинів. 👥 Інтеграція із сайтом, заявки, замовлення, статуси та ролі. 🔗"],"ai-agents":["Розробка AI-агентів для бізнесу — пілотні рішення | MrSeo.tech","Розробка AI-агентів для бізнесу: пілоти для SEO, реклами, 🤖 даних і звітності. Погодження дій, перевірка якості та журналювання. 🛡️"],"chatbot-development":["Розробка чат-ботів та Telegram-ботів для бізнесу | MrSeo.tech","Розробка чат-ботів і Telegram-ботів для бізнесу. Пілот, 💬 типові відповіді, збір заявок, передавання в CRM та підтримка менеджера. 🤖"],"indexing-fixes":["Виправлення індексації сайту в Google | MrSeo.tech","Сторінки не з’являються в Google? 🔎 Перевіряємо Search Console, canonical, noindex та відповіді сервера. Виправляємо причини й контролюємо статус. 🛠️"],"metadata-optimization":["Оптимізація метатегів Title і Description | MrSeo.tech","Підготуємо унікальні Title та Description для сторінок сайту. ✍️ Семантика, пошуковий намір, комерційна пропозиція й перевірка після впровадження. 🔎"],"internal-linking":["Внутрішня перелінковка сайту — SEO-посилання | MrSeo.tech","Внутрішня перелінковка для категорій, товарів і послуг. 🔗 Знаходимо ізольовані сторінки, зайві переходи та хибні посилання. Будуємо логічну структуру. 🗂️"],"competitor-seo-analysis":["SEO-аналіз конкурентів сайту — пошук можливостей | MrSeo.tech","SEO-аналіз конкурентів: порівняння пошукових запитів, 🔎 сторінок, структури та видимості. Знаходимо можливості зростання й готуємо план робіт. 📋"],"search-console-setup":["Налаштування Google Search Console для сайту | MrSeo.tech","Підключення Google Search Console: підтвердження власності, 🔎 sitemap, індексація, звіти запитів і перевірка URL. Налаштуємо доступи та контроль. 📊"],"crawl-configuration":["Налаштування Sitemap.xml та robots.txt для SEO | MrSeo.tech","Перевіримо й налаштуємо sitemap.xml та robots.txt: 🗂️ потрібні URL, правила обходу, службові сторінки та статус у Search Console. 🔎"],"seo-redirects":["Налаштування 301-редиректів та перенаправлень | MrSeo.tech","Налаштуємо 301-редиректи після зміни адрес, переїзду сайту чи видалення сторінок. 🔗 Карта URL, перевірка ланцюжків і коректних цілей. 🛠️"],"structured-data":["Мікророзмітка Schema.org — структуровані дані | MrSeo.tech","Впровадження мікророзмітки Schema.org: 🧩 товари, компанія, навігація та інші підтримувані типи. JSON-LD, перевірка даних і помилок. 🔎"],"ai-search-optimization":["GEO та оптимізація сайту для AI-пошуку | MrSeo.tech","GEO й видимість в AI-пошуку: 🔎 технічна доступність, корисні експертні матеріали, факти про бізнес та контроль згадок. Без гарантій цитування. ✨"]};
   const expectedLead={"seo":"SEO-просування сайту допомагає клієнтам знаходити ваші послуги в Google. Перевіримо пошуковий попит, структуру й технічні проблеми, погодимо пріоритети SEO-оптимізації та перевіримо результат.","local-seo":"Локальне SEO допомагає клієнтам знайти ваш бізнес у Google та на Картах. Перевіримо профіль компанії Google, місцеві запити й сайт, щоб людям було легко зателефонувати, записатися або прокласти маршрут.","ecommerce-seo":"SEO-просування інтернет-магазину починаємо з попиту на ваші товари. Перевіримо категорії, фільтри, картки товарів та індексацію, знайдемо відсутні сторінки й підготуємо план розвитку каталогу.","service-business-seo":"SEO для сайтів послуг допомагає залучати людей, які шукають саме вашу пропозицію. Покращуємо сторінки, заголовки й внутрішні посилання готового сайту; розробку нового погоджуємо окремо.","international-seo":"Міжнародне SEO допомагає клієнтам з інших країн знайти потрібну версію сайту. Перевіримо попит на кожному ринку, мовні сторінки, їхні адреси та зв’язки, щоб Google показував відповідний зміст.","seo-audit":"Технічний SEO-аудит сайту потрібен, коли важливі сторінки зникають із Google або не індексуються. Перевіримо конкретні адреси, налаштування й зміни та підготуємо звіт із пріоритетами виправлень.","website-audit":"Комплексний аудит сайту допоможе знайти, чому відвідувачі не стають клієнтами. Перевіримо пошук, мобільні екрани, форми та аналітику. Ви отримаєте список проблем і пріоритетів, а впровадження погодимо окремо.","traffic-recovery":"Відновлення органічного трафіку починаємо з аналізу падіння: визначаємо дату змін, запити й сторінки, які втратили видимість. Перевіряємо міграцію, індексацію, зміни сайту й попиту, щоб знайти обґрунтоване рішення.","google-ads":"Налаштовуємо та ведемо контекстну рекламу Google Ads для бізнесу й інтернет-магазинів. Перевіряємо покупки та заявки, визначаємо пріоритети кампаній і контролюємо витрати. Разовий аудит можливий без подальшого ведення.","performance-max":"Налаштування Performance Max починаємо з товарних даних і коректного обліку покупок. Перевіримо витрати, фід — файл із даними товарів — і маржу, щоб зрозуміти, які товари доцільно рекламувати.","google-shopping":"Налаштовуємо товарну рекламу Google Shopping для інтернет-магазинів. Перевіряємо ціни, товарні дані, сторінки та вимірювання покупок. Оцінюємо оголошення за замовленнями й економікою магазину.","merchant-center":"Google Merchant Center — сервіс, через який дані ваших товарів потрапляють у Google Shopping. Допомагаємо з налаштуванням, відхиленнями товарів і блокуванням: перевіримо повідомлення Google, фід та можливість оформити замовлення.","local-google-ads":"Налаштовуємо Google Ads для локального бізнесу, якому потрібні клієнти з конкретного міста. Перевіряємо географію показів, пошукові фрази й облік дзвінків та заявок, щоб бюджет працював на потрібний район.","google-ads-audit":"Проводимо разовий аудит Google Ads: перевіряємо пошукові запити, витрати, кампанії та облік заявок. Ви отримуєте звіт із проблемами й пріоритетами. Налаштування та ведення реклами погоджуємо окремо.","analytics":"Маркетингова аналітика допомагає зрозуміти, які канали приносять продажі. Зводимо витрати Google Ads, заявки й замовлення у звіт; за доступних даних будуємо наскрізну аналітику. Налаштування подій GA4 — окрема послуга.","ga4-conversions":"Налаштування Google Analytics 4 (GA4) і Google Tag Manager допомагає коректно враховувати покупки та заявки. Перевіримо теги, виправимо умови спрацювання й звіримо тестові події із замовленнями. Маркетингові звіти — окремо.","business-dashboards":"Розробка дашбордів для бізнесу об’єднує дані про рекламу, замовлення й товари в зрозумілій панелі. Погоджуємо показники, джерела й формат відображення, щоб керівник міг перевірити цифри та ухвалити рішення.","reporting-automation":"Автоматизація звітності звільняє команду від повторного збирання таблиць. Налаштуємо регулярне завантаження, перевірку й доставку звітів; якщо дані не надійшли, система повідомить про збій.","online-store-development":"Розробка інтернет-магазину починається зі сценарію покупця: знайти товар, оплатити й отримати замовлення. Створюємо каталог, кошик та потрібні інтеграції, а платформу обираємо за асортиментом і вартістю підтримки.","catalog-automation":"Автоматизація каталогу товарів допомагає оновлювати ціни й залишки без ручного копіювання прайсів. Налаштуємо правила синхронізації та контроль аномалій, щоб помилкові дані не потрапили до покупця.","store-conversion":"Підвищення конверсії інтернет-магазину починаємо з пошуку причин, чому покупці не завершують замовлення. Пройдемо шлях із телефона — від вибору товару до доставки й оплати — та погодимо конкретні зміни.","store-migration":"Перенесення інтернет-магазину потрібне, якщо стара платформа обмежує каталог, замовлення чи функції. Спочатку перевіримо альтернативи переїзду, а за потреби погодимо міграцію даних, адрес сторінок та інтеграцій.","service-websites":"Розробка сайтів для бізнесу послуг: створюємо зрозумілі сторінки, мобільний дизайн і робочі форми заявок. Базову технічну готовність до Google закладаємо під час створення сайту, а SEO-просування погоджуємо окремо.","local-business-websites":"Створюємо сайти для малого та локального бізнесу, щоб клієнт за кілька секунд знайшов послуги, адресу, графік і телефон. Підбираємо компактну структуру, яку легко відкрити на смартфоні.","landing-pages":"Розробка лендінгу потрібна, коли реклама веде людей на сторінку, де вони не розуміють пропозицію. Створимо одну посадкову сторінку під вашу послугу з чіткими умовами та помітною кнопкою заявки.","corporate-websites":"Створення корпоративного сайту допомагає представити компанію клієнтам і партнерам. Розробимо чіткі розділи послуг, інформацію про досвід, команду й контакти, щоб відвідувач швидко зрозумів вашу пропозицію.","website-redesign":"Редизайн сайту допомагає оновити застарілий вигляд і поліпшити навігацію. Переробимо найважливіші екрани, мобільну версію та форми, не змінюючи без потреби робочі адреси сторінок.","website-maintenance":"Технічна підтримка сайтів потрібна, коли після оновлення WordPress не працює форма, кошик або потрібний блок. Знайдемо причину, погодимо виправлення й перевіримо, щоб важлива дія знову працювала.","website-speed-security":"Оптимізація швидкості сайту починається з вимірювання завантаження й пошуку причин затримок. Перевіримо також типові ризики безпеки та зручність кнопок і форм на телефоні; погодимо потрібні зміни.","web-development":"Розробка програмного забезпечення для бізнесу: вебзастосунки, особисті кабінети, CRM та інтеграції. Якщо команда переносить дані вручну або готовий сервіс не підходить, розберемо процес і підберемо потрібне рішення.","web-applications":"Розробка вебзастосунків і особистих кабінетів допомагає клієнтам та команді бачити потрібні дані без зайвих дзвінків і таблиць. Проєктуємо внутрішні сервіси, ролі й сценарії під реальний процес.","api-integrations":"API-інтеграція з’єднує сайт, CRM та інші сервіси для автоматичного обміну даними. Налаштовуємо передачу замовлень і статусів між дозволеними системами з контролем помилок та повторних надсилань.","custom-functionality":"Розробка функціоналу сайту допоможе замінити ручний розрахунок або незручну операцію. Створимо онлайн-калькулятор, конфігуратор чи інший модуль під ваші правила — на чинному сайті або окремо.","indexing-fixes":"Виправлення індексації сайту потрібне, коли Google не додає важливі категорії, товари або послуги до пошуку. Перевіримо конкретні URL у Search Console, знайдемо технічну причину й погодимо зміни, щоб потрібні сторінки стали доступними для індексації.","metadata-optimization":"Оптимізація метатегів Title і Description допомагає пояснити Google та покупцю, що саме є на сторінці. Підготуємо окремі метатеги для категорій, товарів або послуг, врахуємо пошуковий намір і перевіримо їх після впровадження.","internal-linking":"Внутрішня перелінковка сайту допомагає відвідувачам і Google знаходити важливі сторінки через навігацію та контекстні посилання. Перевіримо структуру, ізольовані URL і зайві переходи та підготуємо зміни для категорій, товарів і послуг.","competitor-seo-analysis":"SEO-аналіз конкурентів показує, за якими запитами й сторінками інші сайти залучають пошуковий попит. Порівняємо ваш сайт із реальними конкурентами у видачі Google, знайдемо прогалини в структурі й контенті та підготуємо пріоритети розвитку.","search-console-setup":"Налаштування Google Search Console дає власнику сайту доступ до даних про пошукові покази, кліки, індексацію та технічні повідомлення Google. Підтвердимо потрібний ресурс, перевіримо sitemap і доступи та покажемо, як користуватися звітами для SEO.","crawl-configuration":"Налаштування sitemap.xml і robots.txt допомагає пошуковим роботам знаходити потрібні сторінки та керувати обходом службових розділів. Перевіримо чинні файли, узгодимо набір канонічних URL і налаштуємо правила з урахуванням структури сайту.","seo-redirects":"Налаштування 301-редиректів потрібне, коли сторінки назавжди змінюють адреси, об’єднуються або сайт переїжджає. Підготуємо карту відповідностей, налаштуємо погоджені перенаправлення й перевіримо, що старі URL ведуть до релевантних нових сторінок.","structured-data":"Мікророзмітка Schema.org допомагає пошуковим системам розуміти структуровані дані про товари, компанію, навігацію та інші сутності. Визначимо доречні типи, підготуємо JSON-LD відповідно до видимого вмісту й перевіримо його після впровадження.","ai-search-optimization":"GEO — оптимізація для генеративного пошуку — допомагає працювати над видимістю бізнесу в середовищах, які формують відповіді за джерелами. Перевіримо технічну доступність, унікальність і доказовість контенту, зрозумілість інформації про компанію та можливість вимірювати видимість."};
   const actualMeta=await page.evaluate(()=>({title:document.title,descs:[...document.querySelectorAll('meta[name="description"]')].map(x=>x.content),keywords:document.querySelectorAll('meta[name="keywords"]').length,lead:document.querySelector('.pti-hero-copy .pti-lead')?.textContent.trim()||''}));
   const expected=expectedMeta[slug];
   if(!expected||actualMeta.title!==expected[0]||JSON.stringify(actualMeta.descs)!==JSON.stringify([expected[1]])||actualMeta.keywords!==0)item.errors.push('UA semantic metadata mismatch '+JSON.stringify(actualMeta));
   if(expectedLead[slug]&&actualMeta.lead!==expectedLead[slug])item.errors.push('UA semantic visible lead mismatch '+slug);
  }
  const commercialTarget=lang==='uk'&&premiumCommercialSlugs.includes(slug);
  const editorialTarget=lang==='uk'&&premiumEditorialSlugs.includes(slug);
  const commercial=c.premiumCommercial,ed=c.premiumEditorial;
  if(commercialTarget){
    if(uaExpansionSlugs.includes(slug)){
     const meta=await page.evaluate(()=>({desc:[...document.querySelectorAll('meta[name="description"]')].map(x=>x.content),canonical:document.querySelector('link[rel="canonical"]')?.href,alternates:[...document.querySelectorAll('link[rel="alternate"][hreflang]')].map(x=>x.hreflang),h1:document.querySelectorAll('h1').length}));
     if(meta.desc.length!==1||!meta.desc[0]||meta.h1!==1||meta.canonical!==HOST+'/'+slug+'/'||JSON.stringify(meta.alternates)!==JSON.stringify(['uk-UA']))item.errors.push('UA expansion SEO metadata regression '+JSON.stringify(meta));
    }
    const hasPlan=['performance-max','analytics','service-websites'].includes(slug);
    if(commercial.route!==slug||!commercial.css||!commercial.hero||commercial.heroWidth<240||commercial.heroParts!==3||!commercial.geometry||
       !commercial.animations||JSON.stringify(commercial.families)!==JSON.stringify(premiumCommercialFamilies[slug])||commercial.tabs!==3||commercial.pause!==2||
       commercial.problems!==3||commercial.delivery!==3||commercial.faq!==(commercialTwoFaq.includes(slug)?2:3)||commercial.plan!==(hasPlan?3:0)||!commercial.result||!commercial.final||commercial.oldRelated!==0)
      item.errors.push('UA commercial premium content or visual regression: '+JSON.stringify(commercial));
    if(c.serviceMenuItems!==4||c.menuItems!==20||c.uaPremiumMenuGroups!==7||c.uaPremiumMenuParents!==7||!c.uaPremiumHeaderPhone)
      item.errors.push('UA commercial full navigation/contacts missing');
    if(commercial.hero&&commercial.tabs===3&&commercial.pause===2){
      const scene=page.locator('.puc-page .psc-hero-scene'),tabs=scene.locator('[data-puc-tab]'),button=scene.locator('.psc-pause');
      await tabs.nth(2).click();
      if(await scene.getAttribute('data-puc-phase')!=='2'||await tabs.nth(2).getAttribute('aria-pressed')!=='true'||(await scene.locator('[data-puc-index]').textContent()).trim()!=='03 / 03'||(await scene.locator('[data-puc-caption-text]').textContent()).trim()!==(await tabs.nth(2).getAttribute('data-puc-caption')))item.errors.push('UA commercial phase control failed');
      const lower=page.locator('.puc-page .psc-delivery svg.puc-motion'),lowerButton=page.locator('.puc-page .psc-lower-pause');
      await lower.scrollIntoViewIfNeeded();
      try{await page.waitForFunction(()=>{const s=document.querySelector('.puc-page .psc-delivery svg.puc-motion');return s&&!s.animationsPaused()},{},{timeout:5000})}catch(_){item.errors.push('UA commercial lower scene not playing')}
      if(viewport.name==='mobile'){
        const integrated=await lower.evaluate(s=>{const wrapper=s.closest('.psc-story-visual'),a=getComputedStyle(wrapper),b=getComputedStyle(s);return [a,b].every(x=>x.backgroundImage==='none'&&(x.backgroundColor==='rgba(0, 0, 0, 0)'||x.backgroundColor==='transparent'));});
        if(!integrated)item.errors.push('UA lower illustration has a separate background');
        await lower.screenshot({path:'shots/ua-'+slug+'-solution-mobile.jpg',type:'jpeg',quality:76});
        await auditUaScenePlayback(page,'.puc-page svg.puc-motion',item);
        await lower.scrollIntoViewIfNeeded();
      }
      const t=await lower.evaluate(s=>s.getCurrentTime());await page.waitForTimeout(180);
      if(await lower.evaluate(s=>s.getCurrentTime())<=t)item.errors.push('UA commercial lower timeline stationary');
      await lowerButton.click();
      if(await lowerButton.getAttribute('aria-pressed')!=='true'||await button.getAttribute('aria-pressed')!=='true'||!(await lower.evaluate(s=>s.animationsPaused())))item.errors.push('UA commercial page pause failed');
      await lowerButton.click();await page.emulateMedia({reducedMotion:'reduce'});
      try{await page.waitForFunction(()=>{const p=document.querySelector('.puc-page');return matchMedia('(prefers-reduced-motion: reduce)').matches&&[...p.querySelectorAll('svg.puc-motion')].every(s=>s.animationsPaused())&&[...p.querySelectorAll('.psc-pause')].every(b=>b.disabled)},{},{timeout:5000})}catch(_){item.errors.push('UA commercial reduced motion failed')}
      await page.emulateMedia({reducedMotion:'no-preference'});
      await page.evaluate(()=>window.scrollTo(0,0));
    }
  }else if(commercial.route||commercial.css)item.errors.push('UA commercial redesign leaked to '+lang+'/'+slug);
  if(editorialTarget){
    if(ed.route!==slug||!ed.css||JSON.stringify(ed.families)!==JSON.stringify(premiumEditorialFamilies[slug])||!ed.geometry||!ed.animations||ed.pause!==(slug==='privacy'?0:1)||(slug==='privacy'&&!ed.privacy)||(slug==='contact'&&!ed.contactForm)||(slug==='horoshop'&&ed.partner!==2)||(slug==='about'&&ed.experience!=='10')||(slug==='portfolio'&&ed.portfolioCards<5))
      item.errors.push('UA editorial native content or motion missing: '+JSON.stringify(ed));
    if(c.serviceMenuItems!==4||c.menuItems!==20||!c.uaPremiumHeaderPhone)item.errors.push('UA editorial menu/contacts missing');
    if(slug!=='privacy'&&ed.pause===1&&ed.families.length){
      const svg=page.locator('svg.pue-motion').last(),pause=page.locator('.pue-pause');
      await svg.scrollIntoViewIfNeeded();
      try{await page.waitForFunction(()=>{const s=[...document.querySelectorAll('svg.pue-motion')].at(-1);return s&&!s.animationsPaused()},{},{timeout:5000})}catch(_){item.errors.push('UA editorial lower motion not playing')}
      if(viewport.name==='mobile'){
        await svg.screenshot({path:'shots/ua-'+slug+'-lower-mobile.jpg',type:'jpeg',quality:76});
        await auditUaScenePlayback(page,'svg.pue-motion',item);
        await svg.scrollIntoViewIfNeeded();
      }
      const t=await svg.evaluate(s=>s.getCurrentTime());await page.waitForTimeout(180);
      if(await svg.evaluate(s=>s.getCurrentTime())<=t)item.errors.push('UA editorial timeline stationary');
      await pause.click();
      if(await pause.getAttribute('aria-pressed')!=='true'||!(await page.locator('svg.pue-motion').evaluateAll(ss=>ss.every(s=>s.animationsPaused()))))item.errors.push('UA editorial global pause failed');
      await pause.click();await page.emulateMedia({reducedMotion:'reduce'});
      try{await page.waitForFunction(()=>matchMedia('(prefers-reduced-motion: reduce)').matches&&[...document.querySelectorAll('svg.pue-motion')].every(s=>s.animationsPaused())&&document.querySelector('.pue-pause')?.disabled,{},{timeout:5000})}catch(_){item.errors.push('UA editorial reduced motion failed')}
      await page.emulateMedia({reducedMotion:'no-preference'});await page.evaluate(()=>window.scrollTo(0,0));
    }
  }else if(ed.route||ed.css||ed.families.length)item.errors.push('UA editorial redesign leaked to '+lang+'/'+slug);
  const clusterTarget=lang==='uk'&&premiumSeoSlugs.includes(slug);
  const cluster=c.premiumSeoCluster;
  if(clusterTarget){
    const families={
     'local-seo':['local-map','local-radius','local-profile','local-call','local-contact-path','local-address'],
     'ecommerce-seo':['commerce-shelves','commerce-depth','commerce-duplicates','commerce-product','commerce-filter-lab','commerce-canonical','commerce-catalog-scale','commerce-discovery'],
     'service-business-seo':['service-intent','service-missing-page','service-match','service-enquiry','service-page-anatomy','service-lead'],
     'international-seo':['intl-market-network','intl-wrong-market','intl-reciprocal','intl-language','intl-url-mapping','intl-market-check'],
     'seo-audit':['audit-crawler','audit-traffic','audit-index','audit-parameters','audit-priority','audit-report','audit-handoff','audit-verified']
    }[slug];
    if(cluster.route!==slug||!cluster.css||!cluster.hero||cluster.heroWidth<240||!cluster.geometry||
       !cluster.animations||JSON.stringify(cluster.families)!==JSON.stringify(families)||cluster.tabs!==3||cluster.pause!==2||
       cluster.problems!==3||cluster.delivery!==3||cluster.faq!==3||!cluster.result||!cluster.final||
       (slug==='ecommerce-seo'&&(cluster.lab!==3||!cluster.proof))||(slug==='seo-audit'&&(cluster.audit!==3||!cluster.proof)))
       item.errors.push('UA premium SEO cluster missing content or scene: '+JSON.stringify(cluster));
    if(c.serviceMenuItems!==4||c.menuItems!==20||c.uaPremiumMenuGroups!==7||c.uaPremiumMenuParents!==7||!c.uaPremiumHeaderPhone)
       item.errors.push('SEO cluster native menu/contacts incomplete');
    if(cluster.hero&&cluster.tabs===3&&cluster.pause===2){
      const hero=page.locator('.psc-hero-scene'),heroSvg=page.locator('.psc-hero-stage svg.psc-motion'),button=hero.locator('.psc-pause');
      await heroSvg.scrollIntoViewIfNeeded();
      await hero.locator('[data-psc-tab="2"]').click();
      if(await hero.getAttribute('data-psc-phase')!=='2'||await hero.locator('[data-psc-tab="2"]').getAttribute('aria-pressed')!=='true'||(await hero.locator('[data-psc-index]').textContent()).trim()!=='03 / 03')
        item.errors.push('SEO cluster hero phase failed');
      const lower=page.locator('.psc-delivery .psc-story-visual svg.psc-motion'),lowerButton=page.locator('.psc-lower-pause');
      await lower.scrollIntoViewIfNeeded();
      try{await page.waitForFunction(()=>{const s=document.querySelector('.psc-delivery svg.psc-motion');return s&&!s.animationsPaused()},{},{timeout:5000})}catch(_){item.errors.push('SEO cluster lower viewport motion failed')}
      const t=await lower.evaluate(s=>s.getCurrentTime());await page.waitForTimeout(200);
      if(await lower.evaluate(s=>s.getCurrentTime())<=t)item.errors.push('SEO cluster lower timeline stationary');
      await lowerButton.click();
      if(await lowerButton.getAttribute('aria-pressed')!=='true'||await button.getAttribute('aria-pressed')!=='true'||!(await lower.evaluate(s=>s.animationsPaused())))item.errors.push('SEO cluster pause sync failed');
      await lowerButton.click();
      await page.emulateMedia({reducedMotion:'reduce'});
      try{await page.waitForFunction(()=>{const p=document.querySelector('.psc-page');return matchMedia('(prefers-reduced-motion: reduce)').matches&&[...p.querySelectorAll('svg.psc-motion')].every(s=>s.animationsPaused())&&[...p.querySelectorAll('.psc-pause')].every(b=>b.disabled)},{},{timeout:5000})}catch(_){item.errors.push('SEO cluster reduced motion failed')}
      await page.emulateMedia({reducedMotion:'no-preference'});
      if(slug==='ecommerce-seo'&&cluster.lab===3){const tabs=page.locator('[data-psc-lab-tab]');const initial=await tabs.allTextContents();for(const i of [1,2,0]){const tab=tabs.nth(i);await tab.click();if(await tab.getAttribute('aria-pressed')!=='true'||(await page.locator('[data-psc-lab-result-caption]').textContent()).trim()!==(await tab.getAttribute('data-psc-lab-caption'))||(await page.locator('[data-psc-lab-result-title]').textContent()).trim()!==(await tab.getAttribute('data-psc-lab-title'))||JSON.stringify(await tabs.allTextContents())!==JSON.stringify(initial))item.errors.push('SEO cluster catalog lab failed at phase '+i)}}
      await page.evaluate(()=>window.scrollTo(0,0));
    }
  }else if(cluster.route||cluster.css)item.errors.push('UA premium SEO cluster leaked to '+lang+'/'+slug);
  const premiumTarget=lang==='uk'&&['seo','google-ads','web-development'].includes(slug);
  const pi=c.premiumInterior;
  if(premiumTarget){
    const expectedStory=slug==='seo'?'seo':slug==='google-ads'?'ads':'dev';
    if(pi.route!==slug||!pi.style||!pi.geometry||!pi.scene||!pi.sceneSvg||pi.sceneMotion<1||
       pi.images!==(slug==='web-development'?8:2)||!pi.realImages||!pi.heroImage||pi.story!==expectedStory||
       pi.problems!==3||pi.steps!==3||pi.faq<3||pi.tabs!==3||!pi.pause||!pi.final||
       (slug==='web-development'&&(pi.caps!==6||pi.capMotion!==34||pi.solutions!==3)))
      item.errors.push('UA Premium interior mismatch: '+JSON.stringify(pi));
    const expectedLower={
      seo:['seo-index','seo-cluster','seo-conversion','seo-diagnostic','seo-next'],
      'google-ads':['ads-waste','ads-event','ads-budget','ads-allocation','ads-search-plan','ads-shopping-plan','ads-next'],
      'web-development':['dev-sync','dev-crm','dev-module','dev-routing','dev-plan','dev-delivery','dev-support','dev-next']
    }[slug];
    const expectedLowerStory={seo:'seo-diagnostic','google-ads':'ads-allocation','web-development':'dev-routing'}[slug];
    if(JSON.stringify(pi.lowerFamilies)!==JSON.stringify(expectedLower)||pi.lowerStory!==expectedLowerStory||!pi.lowerGeometry||!pi.lowerPause||!pi.lowerAnimations)
      item.errors.push('Unique lower-section scenes missing or overflowing: '+JSON.stringify(pi));
    if(c.serviceMenuItems!==4||c.menuItems!==20||c.uaPremiumMenuGroups!==7||c.uaPremiumMenuParents!==7||!c.uaPremiumHeaderPhone)
      item.errors.push('Native full menu or contacts missing from premium interior');
    if(pi.scene&&pi.tabs===3&&pi.pause){
      const stage=page.locator('.pti-page .pti-stage');const scene=page.locator('.pti-page .pti-scene');
      const button=page.locator('.pti-page .pti-pause');
      await stage.scrollIntoViewIfNeeded();
      await page.locator('.pti-page [data-phase="2"]').click();
      if(await scene.getAttribute('data-step')!=='2'||await page.locator('.pti-page [data-phase="2"]').getAttribute('aria-pressed')!=='true'||(await page.locator('.pti-page [data-scene-index]').textContent()).trim()!=='03 / 03')
        item.errors.push('Premium scene phase switch broken');
      await button.click();
      if(await button.getAttribute('aria-pressed')!=='true'||await scene.evaluate(e=>e.classList.contains('pti-live')))
        item.errors.push('Premium pause broken');
      await page.locator('.pti-page [data-phase="0"]').click();await button.click();
      if(pi.lowerPause&&pi.lowerStory){
        const lower=page.locator('.pti-page .pti-story-art svg.pti-lower-motion');
        const lowerButton=page.locator('.pti-page .pti-lower-pause');
        await lower.scrollIntoViewIfNeeded();
        if(slug==='seo'){
          const diagnostic=await lower.evaluate(svg=>{const art=svg.parentElement,im=art.querySelector('img');const cs=getComputedStyle(art),is=getComputedStyle(im);return {transparent:cs.backgroundImage==='none'&&cs.backgroundColor==='rgba(0, 0, 0, 0)',clip:is.clipPath.includes('pti-seo-object'),transforms:svg.querySelectorAll('animateTransform[type="rotate"]').length,gear:!!svg.querySelector('image'),scan:!!svg.querySelector('animate[attributeName="y"]')}});
          if(!diagnostic.transparent||!diagnostic.clip||diagnostic.transforms!==2||!diagnostic.gear||!diagnostic.scan)item.errors.push('SEO diagnostic object not fully integrated: '+JSON.stringify(diagnostic));
        }
        // Require actual continuous progress, not a fixed wall-clock sample
        // taken before observer/scroll reconciliation has run.
        try{await lower.evaluate(s=>new Promise((resolve,reject)=>{
          const start=performance.now();let first=null;
          function sample(){const r=s.getBoundingClientRect(),visible=r.width>0&&r.height>0&&r.bottom>0&&r.top<innerHeight&&r.right>0&&r.left<innerWidth;
            if(visible&&!s.animationsPaused()){const t=s.getCurrentTime();if(first===null)first=t;if(t>first+.12){resolve();return;}}else first=null;
            if(performance.now()-start>5000){reject(Error('no visible timeline progress; paused='+s.animationsPaused()+' rect='+JSON.stringify(r.toJSON())));return;}requestAnimationFrame(sample);
          }sample();
        }));}catch(e){item.errors.push('Lower scene does not animate in viewport: '+e.message);}
        await lowerButton.click();
        if(await lowerButton.getAttribute('aria-pressed')!=='true'||await button.getAttribute('aria-pressed')!=='true'||!(await lower.evaluate(s=>s.animationsPaused())))
          item.errors.push('Lower and hero pause controls not synchronized');
        await lowerButton.click();
        await page.emulateMedia({reducedMotion:'reduce'});
        try{await page.waitForFunction(()=>{const s=document.querySelector('.pti-story-art svg.pti-lower-motion');const b=document.querySelector('.pti-lower-pause');return matchMedia('(prefers-reduced-motion: reduce)').matches&&s?.animationsPaused()&&b?.disabled},{},{timeout:5000});}catch(_){item.errors.push('Lower reduced-motion preference not respected');}
        await page.emulateMedia({reducedMotion:'no-preference'});
        await page.evaluate(()=>window.scrollTo({top:0,behavior:'instant'}));
        // Explicitly require offscreen pause after returning to the hero.
        try{await page.waitForFunction(()=>{const s=document.querySelector('.pti-story-art svg.pti-lower-motion');if(!s)return false;const r=s.getBoundingClientRect();return r.top>=innerHeight&&s.animationsPaused()},{},{timeout:5000});}catch(_){item.errors.push('Lower scene did not pause offscreen');}
        // Resume once more: catches stale visibility after repeated jumps.
        await lower.scrollIntoViewIfNeeded();
        try{await page.waitForFunction(()=>{const s=document.querySelector('.pti-story-art svg.pti-lower-motion');return s&&!s.animationsPaused()},{},{timeout:5000});}catch(_){item.errors.push('Lower scene did not resume on second entry');}
      }
      await page.evaluate(()=>window.scrollTo(0,0));
    }
  }else if(!clusterTarget&&!commercialTarget&&(pi.route||pi.style))item.errors.push('Premium UA interior leaked onto '+lang+'/'+slug);
  if(!c.title||c.title.length<(coreShard?8:12))item.errors.push('Missing document title');
  if(c.htmlLang.toLowerCase().split('-')[0]!==lang)item.errors.push('Wrong html lang '+c.htmlLang);
  if(c.h1!==1)item.errors.push('H1 count '+c.h1);
  if(c.canonical.length!==1||c.canonical[0]!==exactPath)item.errors.push('Canonical '+JSON.stringify(c.canonical));
  if(!c.robots.toLowerCase().includes('noindex')&&!String(response.headers()['x-robots-tag']).includes('noindex'))item.errors.push('Staging noindex missing');
  if(c.internalWidth>c.clientWidth+4)item.errors.push('Horizontal overflow '+c.internalWidth+' > '+c.clientWidth);
  if(c.menuItems!==20)item.errors.push('Header language options '+c.menuItems);
  if(lang!=='uk'&&/Написати|Зателефонувати/.test(c.contactBarText))item.errors.push('Ukrainian contact controls leaked into '+lang+' locale');
  if(c.serviceMenuItems<(lang==='uk'?4:(['ru','en'].includes(lang)?25:4)))
    item.errors.push('Shared mega menu has too few real working links: '+c.serviceMenuItems);
  if(lang==='uk'&&uaNewSlugs.includes(slug)&&!clusterTarget&&!commercialTarget){
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
  if(!['uk','ru','en'].includes(lang)&&(c.uaNewPages.page||c.uaNewPages.css))
    item.errors.push('UA/RU/UK-only new service page leaked to '+lang);
  if(lang==='en'&&slug!==''&&slug!=='privacy'&&!c.enGbStyles)
    item.errors.push('UK premium interior stylesheet missing');
  if(lang!=='en'&&(c.enGbStyles||c.enGbScenesCss))
    item.errors.push('UK-only interior stylesheet leaked to '+lang);
  if(lang==='en'&&enGbNewSlugs.includes(slug)){
    const u=c.enGbPages;
    if(!u.newPage||!u.actualUK||!u.heroGeometry||!u.contact||!c.enGbScenesCss||
       u.pains!==3||u.outcomes!==3||u.faq!==3)
      item.errors.push('UK service/scene/copy failed '+slug+': '+JSON.stringify(u));
  }
  if(lang==='en'&&enGbExisting.includes(slug)){
    const u=c.enGbPages;
    if(!u.existing||!u.oldScene||!u.contact||u.unnecessary!==0||
       u.pains!==3||u.outcomes!==3||u.faq!==3)
      item.errors.push('UK compact commercial page failed '+slug+': '+JSON.stringify(u));
  }
  if(lang!=='ru'&&c.ruNewStyles)
    item.errors.push('Russian scene stylesheet leaked to '+lang);
  if(lang==='ru' && slug!=='' && slug!=='privacy' && !c.ruMotionStyles)
    item.errors.push('RU premium motion stylesheet absent on interior: '+slug);
  if(lang!=='ru' && c.ruMotionStyles)
    item.errors.push('RU premium motion stylesheet leaked to '+lang);
  if(lang==='ru' && slug==='analytics' &&
    (!c.ruAnalyticsPanel.includes('РАСХОДЫ')||!c.ruAnalyticsCheck.includes('Заказы')||
      c.ruAnalyticsPanel.includes('GA4')))
    item.errors.push('RU marketing analytics illustration still shows technical-only GA4 flow');
  if(lang==='uk'&&['merchant-center'].includes(slug)&&!commercialTarget){
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
  if(slug===''&&(!c.orbitMaster||!c.core||(lang==='uk'?c.satellites!==8:coreShard?(c.satellites<6||c.satellites>8):(c.satellites!==7))||!c.coreDimensions?.w))item.errors.push('Shared orbit master/satellites missing');
  if(slug===''&&!c.orbitCanvas&&!c.orbitStaticTexture)item.errors.push('No real 3D globe or Earth texture fallback');
  if(slug===''){
    // Regression guard: all 20 locale homepages must physically reach both
    // viewport edges, not merely use the same template within a narrow wrapper.
    const edge=c.heroEdge;
    if(!edge||Math.abs(edge.left)>2||edge.right<c.viewport-2||edge.width<c.viewport-3)
      item.errors.push('Homepage has visible side gutters: '+JSON.stringify(edge)+' viewport='+c.viewport);
    const panel=c.heroPanel;
    if(!panel||!['transparent','rgba(0, 0, 0, 0)'].includes(panel.background)||
       panel.radius!=='0px'||panel.shadow!=='none'||(lang!=='uk'&&panel.overflow!=='visible'))
      item.errors.push('Homepage has inherited dark rounded 1700px panel: '+JSON.stringify(panel));
  }
  if(slug===''&&(!c.orbitStylesheet||!c.sharedHomepageVisual))item.errors.push('Not using the exact approved shared 3D homepage visual');
  if(slug===''&&!coreShard&&c.legacyEuStylesheet)item.errors.push('EU landing stylesheet leaked onto unified homepage');
  if(slug!==''&&!coreShard&&slug!=='privacy'&&!c.legacyEuStylesheet)item.errors.push('EU interior page styling missing');
  if(slug===''&&lang!=='uk'&&!c.clientBand)item.errors.push('Homepage public client band missing');
  if(lang==='uk'&&slug===''){
    if(c.clientBand||!c.uaPremiumHome||!c.uaPremiumStyles||c.uaPremiumCards!==8||c.uaPremiumMotions!==8||c.uaPremiumLinks!==8||c.uaPremiumImageLinks!==8||c.uaPremiumMenuGroups!==7||c.uaPremiumMenuParents!==7||c.serviceMenuItems!==4||!c.uaPremiumHeaderPhone||c.uaPremiumMenuFont<15||!c.uaPremiumImages||!c.uaPremiumControls||!c.uaPremiumResolution)
      item.errors.push('Approved UA Premium home regression: '+JSON.stringify(c));
  }else if(c.uaPremiumHome||c.uaPremiumStyles)item.errors.push('UA premium homepage leaked into '+lang+'/'+slug);
  if(!coreShard&&['seo','google-ads','web-development'].includes(slug)&&c.marketOffers!==3)item.errors.push('Market offer cards '+c.marketOffers);
  if(!coreShard&&sceneSlugs.includes(slug)&&(!c.bespokeHeroArt||!c.bespokeHeroStyles))item.errors.push('Service-specific illustration or stylesheet missing: '+slug);
  if(slug==='portfolio'&&c.portfolioCards<5)item.errors.push('Public portfolio cards '+c.portfolioCards);
  if(lang==='uk'&&uaFinalSlugs.includes(slug)&&!clusterTarget&&!commercialTarget){
    const v=c.uaFinalScenes;
    const services=['seo-audit','performance-max'].includes(slug);
    if(!v||!v.stylesheet||v.count!==1||v.headings.some(h=>!h)||
        !v.geometry||!v.formIntact||(services&&(!v.serviceStyles||v.cards!==0||v.planSteps!==3||!v.ordered)))
      item.errors.push('UA final interiors missing/inaccessible/out of viewport: '+JSON.stringify(v));
  }
  if(lang!=='uk'&&!c.uaFinalScenes.noLeak)
    item.errors.push('UA final interior assets or content leaked into '+lang);
  if(lang==='uk'&&['analytics','service-websites'].includes(slug)&&!commercialTarget){
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
  if((lang==='uk'&&['seo','google-ads','web-development',...premiumSeoSlugs,...premiumCommercialSlugs,...premiumEditorialSlugs,...uaFourSlugs,...uaFinalSlugs,'local-seo','landing-pages','store-conversion','website-speed-security'].includes(slug)) || (lang==='ru'&&ruNewSlugs.includes(slug)) || (lang==='en'&&enGbNewSlugs.includes(slug)) || (viewport.name==='wide'&&slug==='') || viewport.name==='mobile' || (viewport.name==='narrow'&&['','contact'].includes(slug))){
   await page.screenshot({path:'shots/eu-'+lang+'-'+(slug||'home')+'-'+viewport.name+'.jpg',type:'jpeg',quality:75,fullPage:lang==='uk'&&['seo','google-ads','web-development',...premiumSeoSlugs,...premiumCommercialSlugs,...premiumEditorialSlugs,...uaFourSlugs,'seo-audit','performance-max','about','contact','local-seo','landing-pages','store-conversion','website-speed-security'].includes(slug)});
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
  if(lang==='uk'){
   const nav=await page.evaluate(()=>{
    const root=document.querySelector('header.site-header .mrseo-simple-nav--direct');
    if(!root)return null;
    return {cards:[...root.querySelectorAll('a.mrseo-simple-card[href]')].map(a=>new URL(a.href).pathname).sort(),
      chips:[...root.querySelectorAll('a.mrseo-simple-chip[href]')].map(a=>new URL(a.href).pathname).sort(),
      details:root.querySelectorAll('[data-simple-panel],[data-simple-back],[data-simple-details]').length,
      scripts:!!document.querySelector('script[src*="ua-simple-menu.js"]'),
      style:!!document.querySelector('link[href*="ua-simple-menu.css"]'),
      badLinks:[...root.querySelectorAll('a[href]')].filter(a=>new URL(a.href).origin!==location.origin).length
    };
   });
   if(!nav||JSON.stringify(nav.cards)!==JSON.stringify(["/analytics/","/google-ads/","/horoshop/","/online-store-development/","/seo/","/service-websites/","/web-development/"])||JSON.stringify(nav.chips)!==JSON.stringify(["/ecommerce-seo/","/performance-max/","/seo-audit/","/wordpress-development/"])||nav.details||!nav.scripts||!nav.style||nav.badLinks)item.errors.push('UA direct card navigation coverage '+JSON.stringify(nav));
  }
  if(lang==='uk'&&slug==='seo'){
   const hub=await page.evaluate(()=>{const el=document.querySelector('#ukseo-services');if(!el)return null;const links=[...el.querySelectorAll('nav a[href]')];return {groups:el.querySelectorAll('article').length,links:links.map(a=>new URL(a.href).pathname).sort(),geometry:links.every(a=>{const r=a.getBoundingClientRect();return r.left>=-2&&r.right<=innerWidth+2&&r.width>0&&r.height>0;})};});
   const expectedHub=["/ai-search-optimization/","/competitor-seo-analysis/","/crawl-configuration/","/ecommerce-seo/","/indexing-fixes/","/internal-linking/","/international-seo/","/local-seo/","/metadata-optimization/","/search-console-setup/","/semantic-core/","/seo-audit/","/seo-content/","/seo-redirects/","/service-business-seo/","/structured-data/","/traffic-recovery/","/website-audit/"];
   if(!hub||hub.groups!==5||JSON.stringify(hub.links)!==JSON.stringify(expectedHub)||!hub.geometry)item.errors.push('UA SEO hub service coverage or geometry '+JSON.stringify(hub));
  }
  if(lang==='uk'){
   const six=await page.evaluate(()=>{
    const desktop=document.querySelector('.mrseo-ua-six--desktop'),mobile=document.querySelector('.mrseo-ua-six--mobile');
    return {desktop:desktop?.querySelectorAll('details').length,mobile:mobile?.querySelectorAll('details').length,
      names:[...desktop?.querySelectorAll('summary')||[]].map(x=>x.textContent.trim().replace('⌄','').trim()),
      hrefs:[...desktop?.querySelectorAll('.mrseo-ua-six-primary')||[]].map(x=>new URL(x.href).pathname).sort(),
      assets:!!document.querySelector('link[href*="ua-six-header.css"]')&&!!document.querySelector('script[src*="ua-six-header.js"]')};
   });
   if(six.desktop!==6||six.mobile!==6||JSON.stringify(six.names)!==JSON.stringify(['SEO-просування','Google Ads','Інтернет-магазини','Хорошоп','Створення сайтів','Веброзробка'])||JSON.stringify(six.hrefs)!==JSON.stringify(['/seo/','/google-ads/','/online-store-development/','/horoshop/','/service-websites/','/web-development/'].sort())||!six.assets)item.errors.push('UA six-header structure '+JSON.stringify(six));
  }
  if(lang==='uk'&&slug===''&&viewport.name==='wide'){
   const groups=page.locator('.mrseo-ua-six--desktop details');
   for(let i=0;i<6;i++){
    await groups.nth(i).locator('summary').click();
    if(await groups.nth(i).getAttribute('open')===null||!await groups.nth(i).locator('a').first().isVisible()||await groups.nth(i).locator('a').count()!==[5,5,4,1,5,5][i])item.errors.push('UA six-header desktop item '+i);
   }
   await page.keyboard.press('Escape');
   if(await groups.last().getAttribute('open')!==null)item.errors.push('UA six-header desktop Escape');
   await page.screenshot({path:'shots/ua-six-header-wide.jpg',type:'jpeg',quality:80,fullPage:false});
  }
  if(slug===''&&viewport.name==='narrow'){
   // Shared UA/RU mobile menu must be usable in every new language.
   const menu=page.locator('header.site-header .menu-toggle');
   item.stage='open main menu';
   await menu.click({timeout:4000});
   if(await menu.getAttribute('aria-expanded')!=='true')
      item.errors.push('Global mobile menu cannot open');
   if(lang==='uk'){
    item.stage='UA six-header mobile';
    const six=page.locator('.mrseo-ua-six--mobile details');
    for(let i=0;i<6;i++){await six.nth(i).locator('summary').click();if(await six.nth(i).getAttribute('open')===null||await six.nth(i).locator('a').count()!==[5,5,4,1,5,5][i])item.errors.push('UA six mobile item '+i);}
    await page.keyboard.press('Escape');
    if(await six.last().getAttribute('open')!==null)item.errors.push('UA mobile Escape');
    const box=await page.locator('.mrseo-ua-six--mobile').evaluate(el=>{const r=el.getBoundingClientRect();return {left:r.left,right:r.right}});
    if(box.left<-6||box.right>innerWidth+6)item.errors.push('UA mobile nav overflow '+JSON.stringify(box));
   }else{
    const services=page.locator('header.site-header .services-menu-toggle');
    item.stage='open service menu';await services.click({timeout:4000});
    if(await services.getAttribute('aria-expanded')!=='true')item.errors.push('Shared service dropdown cannot open');
    const good=await page.locator('.mrseo-mega-grid').evaluate(el=>{const r=el.getBoundingClientRect();return r.width>200&&r.left>=-6&&r.right<=innerWidth+6;});
    if(!good)item.errors.push('Premium services menu overflows 360px viewport');
   }
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
 if(coreShard)await assertUaInventory();
 const launchOptions={headless:true,args:['--disable-dev-shm-usage','--enable-webgl','--use-gl=angle','--use-angle=swiftshader','--enable-unsafe-swiftshader']};
 // Reset Chromium (including its software WebGL state) between locales/viewport
 // profiles. A single long-lived browser can accumulate GPU load over 165 views
 // and produce sporadic interaction timeouts unrelated to the actual page.
 for(const viewport of sizes){
  for(const lang of locales){
   const browser=await chromium.launch(launchOptions);
   try{
    const selectedSlugs=coreShard&&lang==='uk'?allUaPremiumSlugs:(coreShard&&lang==='ru'?[...new Set([...slugs,...ruPilotSlugs,...ruNewSlugs])]:(coreShard&&lang==='en'?[...new Set([...slugs,...enGbExisting,...enGbNewSlugs,'about','portfolio','contact'])]:(coreShard&&lang==='pl'?[...slugs,'tworzenie-stron-internetowych']:(quick&&!coreShard&&lang==='fr'?['','seo',...sceneSlugs.filter(x=>x!=='seo'),'contact','privacy']:slugs))));
    for(const slug of selectedSlugs){
     if(viewport.name==='wide'&&slug!==''&&!(lang==='uk'&&['seo','google-ads','web-development',...premiumSeoSlugs,...premiumCommercialSlugs,...premiumEditorialSlugs,...uaFourSlugs,...uaFinalSlugs,'local-seo','landing-pages','store-conversion','website-speed-security'].includes(slug))&&!(lang==='ru'&&['seo','google-ads','analytics','service-websites','horoshop','landing-pages','google-ads-audit','website-maintenance'].includes(slug))&&!(lang==='en'&&['seo','analytics','service-websites','website-design','landing-pages','store-conversion','api-integrations'].includes(slug)))continue;
     if(viewport.name==='narrow'&&!['','seo','contact'].includes(slug)&&!(lang==='uk'&&['google-ads','web-development','merchant-center',...premiumCommercialSlugs,...premiumEditorialSlugs,...uaFourSlugs,...uaFinalSlugs,...uaNewSlugs].includes(slug))&&!(lang==='ru'&&[...ruPilotSlugs,...ruNewSlugs].includes(slug))&&!(lang==='en'&&[...enGbExisting,...enGbNewSlugs].includes(slug)))continue;
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
