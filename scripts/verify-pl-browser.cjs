#!/usr/bin/env node
// Full Poland-only browser regression: 25 distinct live WordPress routes.
const { chromium } = require('playwright');
const fs=require('node:fs');
const path=require('node:path');
const assert=require('node:assert/strict');
const ORIGIN=process.env.MRSEO_TEST_ORIGIN||'http://127.0.0.1:8080';
const shard=Number(process.env.MRSEO_LOCALE_SHARD||0);
const slugs=[
 'local-seo','ecommerce-seo','service-business-seo','international-seo','seo-audit',
 'google-ads','google-shopping','local-google-ads','audyt-google-ads','problemy-merchant-center',
 'tworzenie-sklepow-internetowych','sklepy-woocommerce-shopify','store-conversion','catalog-automation','store-migration',
 'tworzenie-stron-internetowych','service-websites','landing-pages','corporate-websites','website-redesign',
 'opieka-wordpress','api-integrations','website-speed-security','web-development','web-applications'
];
const shared=new Set(['ecommerce-seo','seo-audit','google-ads','web-development']);
const custom=new Set(['local-seo','service-business-seo','landing-pages','catalog-automation','api-integrations','international-seo','local-google-ads','sklepy-woocommerce-shopify','store-conversion','store-migration','service-websites','corporate-websites','website-redesign','website-speed-security','web-applications']);
const selected=slugs.filter((_,i)=>i%4===shard);
const shots=path.resolve('shots');fs.mkdirSync(shots,{recursive:true});
const reports=[];
async function run(){
 const browser=await chromium.launch({headless:true,args:['--no-sandbox']});
 try{
  for(const slug of selected){
   for(const width of [360,390,1440]){
    const page=await browser.newPage({viewport:{width,height:900},deviceScaleFactor:1,reducedMotion:'reduce'});
    const url=ORIGIN+'/pl/'+slug+'/';
    let response;
    try{
     response=await page.goto(url,{waitUntil:'domcontentloaded',timeout:30000});
     assert(response && response.status()===200,`HTTP ${response?.status()} ${url}`);
     const result=await page.evaluate(()=>{
       const body=document.body, root=document.documentElement;
       return {
        h1:document.querySelectorAll('h1').length,
        h1Text:document.querySelector('h1')?.textContent?.trim()||'',
        title:document.title,
        canonical:document.querySelector('link[rel="canonical"]')?.href||'',
        lang:root.lang,
        robots:document.querySelector('meta[name="robots"]')?.content||'',
        outer:Math.max(root.scrollWidth,body.scrollWidth),
        inner:window.innerWidth,
        problems:document.querySelectorAll('.pl-svc-need').length,
        faq:document.querySelectorAll('.pl-svc-faq-items details').length,
        scene:document.querySelectorAll('.pl-svc-scene').length,
        uniqueScene:document.querySelectorAll('.pl-art').length,
        sceneVariant:document.querySelector('.pl-art')?.className||'',
        cta:document.querySelectorAll('.pl-svc-hero-actions .intl-button').length,
        menus:[...document.querySelectorAll('a[href*="/pl/"]')].map(a=>a.getAttribute('href'))
       };
     });
     assert.equal(result.h1,1,`Invalid H1 count: ${url}`);
     assert(result.h1Text.length>15,`Empty/short Polish H1: ${url}`);
     assert(result.title.length>12,`Missing title: ${url}`);
     assert(result.canonical.endsWith('/pl/'+slug+'/'),`Missing self canonical: ${url}, got ${result.canonical}`);
     assert(/pl/i.test(result.lang),`Missing Polish document language: ${url}, got ${result.lang}`);
     assert(/noindex/i.test(result.robots)||/noindex/i.test(response.headers()['x-robots-tag']||''),`Missing staging noindex: ${url}`);
     assert(result.outer<=result.inner+5,`Horizontal overflow ${url}: ${result.outer} > ${result.inner}`);
     if(!shared.has(slug)){
       assert(result.problems===3,`Missing three client problems on ${url}`);
       assert(result.faq>=3,`Missing three FAQs on ${url}`);
       assert(result.scene===1,`Missing themed scene on ${url}`);
       if(custom.has(slug))assert(result.uniqueScene===1,`Missing original service-specific visual on ${url}`);
       assert(result.cta===1,`Missing contact CTA on ${url}`);
     }
     // Regression for the screenshot bug: the live PL mega-menu once rendered
     // missing destinations as inert <span> nodes. Check the actual rendered DOM.
     if(slug==='local-seo' && (width===1440 || width===390)){
       const mega=page.locator('.mrseo-mega--trial').first();
       assert(await mega.count()===1,`Missing premium PL mega-menu: ${url}`);
       const rendered=await mega.evaluate(node=>({
         links:[...node.querySelectorAll('.mrseo-mega-items a.mrseo-mega-item')].map(a=>({label:a.textContent.trim(),href:a.getAttribute('href')})),
         placeholders:[...node.querySelectorAll('.mrseo-mega-item--planned')].map(a=>a.textContent.trim())
       }));
       assert.equal(rendered.placeholders.length,0,`PL menu has inert service labels: ${rendered.placeholders.join(', ')}`);
       assert.equal(rendered.links.length,25,`PL mega-menu has ${rendered.links.length} working links rather than 25`);
       const expected=slugs.map(s=>'/pl/'+s+'/');
       const destinations=rendered.links.map(item=>new URL(item.href,ORIGIN).pathname);
       assert.equal(new Set(destinations).size,25,'Polish menu has duplicated destinations');
       assert.deepEqual([...destinations].sort(),[...expected].sort(),'Polish menu destinations do not match the 25 completed pages');
       if(width===1440){
         // Click the real dropdown and then a previously inert item.
         const toggle=page.locator('.services-menu-toggle').first();
         await toggle.click();
         const target=mega.locator('a.mrseo-mega-item[href$="/pl/international-seo/"]');
         assert(await target.isVisible(),'Polish mega menu link is not visible after opening Services');
         await target.click();
         await page.waitForURL(u=>u.pathname==='/pl/international-seo/');
         assert.equal(await page.locator('h1').count(),1,'Clicked Polish menu link did not open a proper page');
         await page.goto(url,{waitUntil:'domcontentloaded'});
       }
     }
     if(width===390 && ['local-seo','landing-pages','api-integrations','sklepy-woocommerce-shopify','store-migration','website-redesign','web-applications'].includes(slug)){
       await page.screenshot({path:path.join(shots,`pl-${slug}-390.jpg`),fullPage:true,type:'jpeg',quality:75});
     }
     if(width===1440 && ['local-seo','store-migration','web-applications'].includes(slug)){
       await page.screenshot({path:path.join(shots,`pl-${slug}-1440.jpg`),fullPage:true,type:'jpeg',quality:75});
     }
     reports.push({slug,width,status:response.status(),...result});
    }catch(err){throw Error(`${url} width=${width}: ${err.message}`);}
    finally{await page.close();}
   }
  }
 }finally{await browser.close();}
 fs.writeFileSync(path.join(shots,`pl-diagnostics-${shard}.json`),JSON.stringify(reports,null,2));
 console.log(`Polish WordPress browser PASS: shard ${shard}: ${selected.length} URLs × 3 viewports. All 25 routes covered across 4 shards.`);
}
run().catch(e=>{console.error(e.stack||e);process.exitCode=1;});
