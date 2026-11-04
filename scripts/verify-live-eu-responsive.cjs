/* Browser QA for six staged EU languages after deployment. No form submits, no indexing changes. */
'use strict';
const fs=require('node:fs/promises');
const {chromium}=require('playwright');
const HOST=(process.env.MRSEO_TEST_ORIGIN||'https://mrseo.tech').replace(/\/$/,'');
const locales=['fr','it','es','nl','ro','cs'];
const slugs=['','seo','seo-audit','ecommerce-seo','google-ads','analytics','web-development','website-design','online-shop-development','about','portfolio','contact','privacy'];
const sizes=[{name:'desktop',width:1440,height:900},{name:'mobile',width:390,height:844},{name:'narrow',width:360,height:780}];
const results=[];
const urlOf=(l,s)=>HOST+'/'+l+'/'+(s?s+'/':'');
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
  userAgent:browserUA,locale:({fr:'fr-FR',it:'it-IT',es:'es-ES',nl:'nl-NL',ro:'ro-RO',cs:'cs-CZ'})[lang],
  ignoreHTTPSErrors:false
 });
 const page=await context.newPage();
 const item={lang,slug:slug||'home',viewport:viewport.name,url,errors:[],warnings:[]};
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
   const node=document.querySelector('.eu-orbit-scene');
   const earth=node?.querySelector('.eu-earth-core');
   const links=[...document.querySelectorAll('.mrseo-language-options a')].map(a=>({href:a.href,lang:a.lang}));
   return {
    title:document.title,
    htmlLang:document.documentElement.lang,
    h1:document.querySelectorAll('h1').length,
    robots:document.querySelector('meta[name=robots]')?.getAttribute('content')||'',
    canonical,
    internalWidth:document.documentElement.scrollWidth,
    clientWidth:document.documentElement.clientWidth,
    viewport:innerWidth,
    hero:!!document.querySelector('.eu-hero'),
    marketOffers:document.querySelectorAll('.eu-offer-card').length,
    form:document.querySelector('form[action*="admin-post.php"]')?.querySelector('input[name=mrseo_lang]')?.value||null,
    nonce:!!document.querySelector('input[name=mrseo_nonce]'),
    menuItems:links.length,
    serviceMenuItems:document.querySelectorAll('.eu-nav-services-panel a').length,
    portfolioCards:document.querySelectorAll('.eu-project-card').length,
    core:!!earth,
    coreDimensions:earth?{w:Math.round(earth.getBoundingClientRect().width),h:Math.round(earth.getBoundingClientRect().height)}:null,
    satellites:node?.querySelectorAll('.eu-satellite').length||0,
    satelliteDestinations:[...node?.querySelectorAll('.eu-satellite')||[]].map(a=>new URL(a.href).pathname),
    earthCanvasReady:!!(node?.classList.contains('lab-webgl-ready')&&earth?.querySelector('.lab-webgl-canvas')),
    earthStaticTexture:!!earth&&getComputedStyle(earth).backgroundImage.includes('earth-day.jpg'),
    ownLanguageLinks:[...document.querySelectorAll('a[href]')].map(a=>{
      try{const u=new URL(a.href);return u.origin===location.origin&&u.pathname.startsWith('/'+lang+'/')?u.pathname:null}catch{return null}
    }).filter(Boolean),
    formAction:document.querySelector('form[action*="admin-post.php"]')?.action||null,
    formMethod:document.querySelector('form[action*="admin-post.php"]')?.method||null,
    formActionName:document.querySelector('input[name="action"]')?.value||null,
    hasPrivacyNotice:!!document.querySelector('.mrseo-privacy-notice'),
    nonceValue:document.querySelector('input[name="mrseo_nonce"]')?.value||'',
    portfolio:!!document.querySelector('a[href$="/'+lang+'/portfolio/"]'),
    privacyLink:!!document.querySelector('a[href*="/'+lang+'/privacy/"]'),
    bodyClass:body.className
   };
  },{lang,slug,width:viewport.width});
  const c=item.check;
  const exactPath=url;
  if(!c.title||c.title.length<12)item.errors.push('Missing document title');
  if(!c.htmlLang.toLowerCase().startsWith(lang+'-'))item.errors.push('Wrong html lang '+c.htmlLang);
  if(c.h1!==1)item.errors.push('H1 count '+c.h1);
  if(c.canonical.length!==1||c.canonical[0]!==exactPath)item.errors.push('Canonical '+JSON.stringify(c.canonical));
  if(!c.robots.toLowerCase().includes('noindex')&&!String(response.headers()['x-robots-tag']).includes('noindex'))item.errors.push('Staging noindex missing');
  if(c.internalWidth>c.clientWidth+4)item.errors.push('Horizontal overflow '+c.internalWidth+' > '+c.clientWidth);
  if(c.menuItems!==11)item.errors.push('Language options '+c.menuItems);
  if(c.serviceMenuItems!==11)item.errors.push('Services dropdown '+c.serviceMenuItems);
  if(!c.privacyLink)item.errors.push('Privacy link missing');
  if(slug!=='privacy'&&!c.hero)item.errors.push('Hero missing');
  if(slug===''&&(!c.core||c.satellites!==6||!c.coreDimensions?.w))item.errors.push('Earth core or satellites missing');
  if(slug===''){
    const required=['seo','ecommerce-seo','google-ads','analytics','web-development','website-design'].map(s=>'/'+lang+'/'+s+'/');
    if(required.some(s=>!c.satelliteDestinations.includes(s)))item.errors.push('Satellite link missing or not localized');
    if(!c.earthCanvasReady&&!c.earthStaticTexture)item.errors.push('Neither WebGL/Canvas Earth nor Earth texture fallback is visible');
    if(!c.earthCanvasReady&&c.earthStaticTexture)item.warnings.push('Canvas Earth unavailable, textured fallback active');
  }
  const allowedPaths=new Set(slugs.map(s=>'/'+lang+'/'+(s?s+'/':'')));
  const badLinks=c.ownLanguageLinks.filter(path=>!allowedPaths.has(path));
  if(badLinks.length)item.errors.push('Broken localized internal links: '+JSON.stringify([...new Set(badLinks)].slice(0,5)));
  if(slug===''){
    const missing=[...allowedPaths].filter(p=>!c.ownLanguageLinks.includes(p)&&p!==('/'+lang+'/'));
    if(missing.length)item.errors.push('EU homepage does not link to all 13 services/sections: '+missing.join(', '));
  }
  if(!['contact','privacy'].includes(slug)&&c.marketOffers!==3)item.errors.push('Market offer cards '+c.marketOffers);
  if(slug==='portfolio'&&c.portfolioCards<5)item.errors.push('Public portfolio cards '+c.portfolioCards);
  if(slug==='contact'&&(c.form!==lang||!c.nonce||!c.nonceValue))item.errors.push('Contact form language or nonce missing');
  if(slug==='contact'&&(!c.formAction?.endsWith('/wp-admin/admin-post.php')||c.formMethod!=='post'||c.formActionName!=='mrseo_contact'||!c.hasPrivacyNotice)){
    item.errors.push('Contact form action or privacy notice invalid');
  }
  if(slug!=='privacy'&&!c.portfolio)item.errors.push('Proof/portfolio link missing');
  // Six invalid-input POSTs are safe: validation rejects malformed emails before wp_mail.
  // This checks the actual handler and the language-specific error redirect without sending messages.
  if(slug==='contact'&&viewport.name==='desktop'&&process.env.MRSEO_TEST_INVALID_FORMS==='1'&&c.nonceValue){
    try{
      const response=await page.request.post(HOST+'/wp-admin/admin-post.php',{
        maxRedirects:0,
        form:{action:'mrseo_contact',mrseo_lang:lang,mrseo_nonce:c.nonceValue,
          contact_name:'EU QA Invalid Check',contact_email:'invalid-email',
          contact_message:'This is deliberately invalid and must not be emailed'}
      });
      const expected=HOST+'/'+lang+'/contact/?message_status=invalid';
      const destination=response.headers()['location']||'';
      if(![301,302,303].includes(response.status())||destination!==expected)
        item.errors.push('Invalid-input form handler: HTTP '+response.status()+' -> '+destination);
    }catch(e){item.errors.push('Invalid-input handler request failed: '+String(e).slice(0,200))}
  }
  if(viewport.name==='mobile' || (viewport.name==='narrow'&&['','contact'].includes(slug))){
   await page.screenshot({path:'shots/eu-'+lang+'-'+(slug||'home')+'-'+viewport.name+'.jpg',type:'jpeg',quality:75,fullPage:false});
  }
  if(slug===''&&viewport.name==='narrow'){
   const sel=page.locator('.mrseo-language-trigger');
   await sel.focus();
   await page.keyboard.press('Enter');
   await page.waitForTimeout(150);
   const visible=await page.locator('.mrseo-language-options').evaluate(x=>{
    const r=x.getBoundingClientRect();return r.width>180&&r.left>=-2&&r.right<=innerWidth+2&&r.top<innerHeight;
   });
   if(!visible)item.errors.push('Language selector not visible in 360px');
   await page.screenshot({path:'shots/eu-'+lang+'-language-menu.jpg',type:'jpeg',quality:75,fullPage:false});
  }
 }catch(e){item.errors.push('Browser '+String(e).slice(0,350))}
 finally{await context.close()}
 results.push(item);
 console.log((item.errors.length?'FAIL':'PASS')+' '+viewport.name+' '+lang+'/'+(slug||'')+' '+(item.errors.join(' | ')||''));
}
(async()=>{
 await fs.mkdir('shots',{recursive:true});
 const browser=await chromium.launch({headless:true,args:['--disable-dev-shm-usage','--enable-webgl','--use-gl=angle','--use-angle=swiftshader','--enable-unsafe-swiftshader']});
 try{
  for(const viewport of sizes){
   for(const lang of locales){
    for(const slug of slugs){
     if(viewport.name==='narrow'&&!['','seo','contact'].includes(slug))continue;
     if(process.env.MRSEO_QA_FOCUSED==='1'&&!['','contact','privacy'].includes(slug))continue;
     await audit(browser,viewport,lang,slug);
    }
   }
  }
 }finally{await browser.close()}
 const errors=results.filter(x=>x.errors.length);
 const summary={checked:results.length,failed:errors.length,success:results.length-errors.length,errors:errors.map(x=>({url:x.url,viewport:x.viewport,errors:x.errors})),results};
 await fs.writeFile('shots/eu-diagnostics.json',JSON.stringify(summary,null,2));
 console.log('EU AUDIT TOTAL: '+summary.checked+' views; failures='+summary.failed);
 if(errors.length)process.exitCode=1;
})().catch(e=>{console.error(e);process.exitCode=1});
