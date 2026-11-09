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
       assert(result.cta===1,`Missing contact CTA on ${url}`);
     }
     if(width===390 && ['local-seo','sklepy-woocommerce-shopify','website-redesign','web-applications'].includes(slug)){
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
