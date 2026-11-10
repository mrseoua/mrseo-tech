#!/usr/bin/env node
// Isolated WordPress regression: all 25 French service links and mobile layouts.
const { chromium }=require('playwright');
const fs=require('node:fs'); const path=require('node:path');const assert=require('node:assert/strict');
const origin=process.env.MRSEO_TEST_ORIGIN||'http://127.0.0.1:8080';
const shard=Number(process.env.MRSEO_LOCALE_SHARD||0);
const slugs=["local-seo","ecommerce-seo","service-business-seo","international-seo","seo-audit","google-ads","google-shopping","local-google-ads","google-ads-audit","merchant-center-help","online-shop-development","woocommerce-shopify-stores","store-conversion","catalog-automation","store-migration","website-design","service-websites","landing-pages","corporate-websites","website-redesign","wordpress-care","api-integrations","website-speed-security","web-development","web-applications"];
const shared=new Set(['ecommerce-seo','seo-audit','google-ads','web-development','online-shop-development','website-design']);
const out=path.resolve('shots');fs.mkdirSync(out,{recursive:true});const results=[];
async function run(){
 const browser=await chromium.launch({headless:true,args:['--no-sandbox']});
 try{
  for(const [i,slug] of slugs.entries()){
   if(i%4!==shard)continue;
   for(const width of [360,390,1440]){
    const page=await browser.newPage({viewport:{width,height:900},deviceScaleFactor:1,reducedMotion:'reduce'});
    const url=origin+'/fr/'+slug+'/';
    try{
     const response=await page.goto(url,{waitUntil:'domcontentloaded',timeout:30000});
     assert(response&&response.status()===200,`HTTP ${response?.status()} ${url}`);
     const r=await page.evaluate(()=>({
      h1:document.querySelectorAll('h1').length,h1Text:document.querySelector('h1')?.textContent?.trim()||'',
      title:document.title,lang:document.documentElement.lang,
      canonical:document.querySelector('link[rel="canonical"]')?.href||'',
      robots:document.querySelector('meta[name="robots"]')?.content||'',
      scroll:Math.max(document.body.scrollWidth,document.documentElement.scrollWidth),vw:innerWidth,
      problems:document.querySelectorAll('.pl-svc-need').length,faq:document.querySelectorAll('.pl-svc-faq-items details').length,
      scene:document.querySelectorAll('.pl-art').length,cta:document.querySelectorAll('.pl-svc-hero-actions .intl-button').length
     }));
     assert.equal(r.h1,1,`H1 ${slug}`);
     assert(r.h1Text.length>12,`short H1 ${slug}`);
     assert(r.title.length>12,`short title ${slug}`);
     assert(/fr/i.test(r.lang),`wrong html language ${slug}: ${r.lang}`);
     assert(r.canonical.endsWith('/fr/'+slug+'/'),`wrong canonical ${slug}: ${r.canonical}`);
     assert(/noindex/i.test(r.robots)||/noindex/i.test(response.headers()['x-robots-tag']||''),`index enabled ${slug}`);
     if(r.scroll>r.vw+5){
      const offenders=await page.evaluate(()=>[...document.querySelectorAll('body *')].map(el=>({el,rect:el.getBoundingClientRect()})).filter(x=>x.rect.right>innerWidth+5||x.rect.left< -5).slice(0,10).map(x=>({tag:x.el.tagName,cls:String(x.el.className).slice(0,90),text:(x.el.textContent||'').trim().slice(0,55),left:Math.round(x.rect.left),right:Math.round(x.rect.right)})));
      throw Error(`horizontal overflow ${slug}: ${r.scroll} vs ${r.vw}; offenders=${JSON.stringify(offenders)}`);
     }
     if(!shared.has(slug)){
      assert.equal(r.problems,3,`problems ${slug}`);
      assert(r.faq>=3,`FAQ ${slug}`);
      assert.equal(r.scene,1,`original scene ${slug}`);
      assert.equal(r.cta,1,`contact CTA ${slug}`);
     }
     if(slug==='local-seo' && [390,1440].includes(width)){
      const mega=page.locator('.mrseo-mega--trial').first();
      assert.equal(await mega.count(),1,'French mega-menu missing');
      const nav=await mega.evaluate(el=>({links:[...el.querySelectorAll('.mrseo-mega-items a.mrseo-mega-item')].map(a=>new URL(a.href).pathname),inert:[...el.querySelectorAll('.mrseo-mega-item--planned')].map(x=>x.textContent.trim())}));
      assert.equal(nav.inert.length,0,`inert French services ${nav.inert}`);
      assert.equal(nav.links.length,25,'French menu must have 25 links');
      assert.deepEqual(nav.links.slice().sort(),slugs.map(s=>'/fr/'+s+'/').sort(),'French menu destinations differ');
      if(width===1440){
       await page.locator('.services-menu-toggle').first().click();
       const target=mega.locator('a.mrseo-mega-item[href$="/fr/international-seo/"]');
       assert(await target.isVisible(),'French service link hidden');
       await target.click();await page.waitForURL(u=>u.pathname==='/fr/international-seo/');
       assert.equal(await page.locator('h1').count(),1,'French menu click failed');
       await page.goto(url,{waitUntil:'domcontentloaded'});
      }
     }
     if((width===390||width===1440)&&['local-seo','woocommerce-shopify-stores','landing-pages','api-integrations','web-applications'].includes(slug))
      await page.screenshot({path:path.join(out,`fr-${slug}-${width}.jpg`),fullPage:true,type:'jpeg',quality:74});
     results.push({slug,width,...r});
    }catch(e){throw Error(`${url}, width=${width}: ${e.message}`)}finally{await page.close()}
   }
  }
 }finally{await browser.close()}
 fs.writeFileSync(path.join(out,`fr-diagnostics-${shard}.json`),JSON.stringify(results,null,2));
 console.log(`French browser PASS: shard ${shard}, ${results.length} viewports, 25 service URLs across 4 shards`);
}
run().catch(e=>{console.error(e.stack||e);process.exitCode=1});
