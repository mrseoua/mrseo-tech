'use strict';
const fs=require('node:fs');
const fsp=require('node:fs/promises');
const path=require('node:path');
const {chromium}=require('playwright');
const root=path.resolve(__dirname,'../wp-content/themes/mrseo-tech');
const read=(name,marker)=>JSON.parse(fs.readFileSync(path.join(root,name),'utf8').split("<<<'"+marker+"'\n")[1].split('\n'+marker,1)[0]);
const semantic=read('inc/ua-semantic-map.php','MRSEO_UA_SEMANTIC_MAP');
const hs=read('inc/horoshop-premium-routes.php','MRSEO_HS_PAGES');
const dev=read('inc/ua-dev-new-pages.php','MRSEO_UA_DEV_CONTENT');
const retired=JSON.parse(fs.readFileSync(path.join(root,'inc/ua-retired-services.json'),'utf8'));
const routes=[...new Set([...Object.keys(semantic),...Object.keys(hs).map(k=>'horoshop/'+k),...Object.keys(dev)])].filter(k=>!Object.hasOwn(retired,k));
if(routes.length!==42)throw Error('Expected 42 active UA baseline routes, got '+routes.length);
const origin=(process.env.MRSEO_TEST_ORIGIN||'http://127.0.0.1:8080').replace(/\/$/,'');
const out='shots/ru-parity';
const hubs=new Set(['seo','google-ads','horoshop','service-websites','web-development']);
const widths=[1440,390,360];
(async()=>{
 await fsp.mkdir(out,{recursive:true});
 const browser=await chromium.launch({headless:true});
 const reports=[];
 try{
  for(const slug of routes)for(const width of widths){
   const page=await browser.newPage({viewport:{width,height:900},reducedMotion:'reduce'});
   const issues=[];page.on('pageerror',e=>issues.push('JS: '+e.message));
   const route='/ru/'+(slug?slug+'/':'');
   try{
    const response=await page.goto(origin+route,{waitUntil:'domcontentloaded',timeout:25000});
    if(response?.status()!==200)issues.push('HTTP '+response?.status());
    await page.evaluate(()=>document.fonts.ready);
    const data=await page.evaluate(()=>{
     const select=s=>Array.from(document.querySelectorAll(s));
     return {lang:document.documentElement.lang,h1:select('main h1, h1').map(x=>x.textContent.trim()),title:document.title,desc:select('meta[name="description"]').map(x=>x.content),canonical:select('link[rel="canonical"]').map(x=>x.href),ua:select('link[rel="alternate"][hreflang="uk-UA"]').map(x=>x.href),robots:select('meta[name="robots"]').map(x=>x.content),overflow:document.documentElement.scrollWidth-innerWidth,orbits:select('.ru-category-orbit,.ru-orbit,.pt-orbit').length,pause:select('.pt-rotate').length};
    });
    if(data.lang!=='ru')issues.push('lang '+data.lang);
    if(data.h1.length!==1||!data.h1[0])issues.push('H1 '+JSON.stringify(data.h1));
    if(!data.title||data.desc.length!==1||!data.desc[0])issues.push('Missing/duplicate title or description');
    if(data.canonical.length!==1||new URL(data.canonical[0]).pathname!==route)issues.push('Canonical '+JSON.stringify(data.canonical));
    const uaPath='/'+(slug?slug+'/':'');
    if(data.ua.length!==1||new URL(data.ua[0]).pathname!==uaPath)issues.push('UA alternate '+JSON.stringify(data.ua));
    if(!data.robots.some(x=>x.includes('noindex')))issues.push('Missing noindex');
    if(data.overflow>2)issues.push('Horizontal overflow '+data.overflow);
    if(/[іїєґ]/i.test(data.h1.join(' ')))issues.push('UA letters in RU H1');
    if(hubs.has(slug)&&data.pause)issues.push('Unexpected category pause control');
    reports.push({slug,width,...data,issues});
    if(width===1440||width===390)await page.screenshot({path:path.join(out,(slug||'home').replaceAll('/','-')+'-'+width+'.png'),fullPage:true,timeout:15000});
   }catch(e){reports.push({slug,width,issues:[...issues,e.message]});}
   finally{await page.close();}
  }
 }finally{await browser.close();await fsp.writeFile(path.join(out,'report.json'),JSON.stringify(reports,null,2));}
 const failed=reports.filter(r=>r.issues.length);console.log(JSON.stringify({checks:reports.length,failed:failed.length,issues:failed.map(({slug,width,issues})=>({slug,width,issues}))},null,2));
 if(reports.length!==126||failed.length)process.exitCode=1;
})().catch(e=>{console.error(e);process.exitCode=1});
