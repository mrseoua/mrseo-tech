#!/usr/bin/env node
// Isolated WordPress regression: all 25 Romanian service links and mobile layouts.
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
    const url=origin+'/ro/'+slug+'/';
    try{
     const response=await page.goto(url,{waitUntil:'domcontentloaded',timeout:30000});
     assert(response&&response.status()===200,`HTTP ${response?.status()} ${url}`);
     const r=await page.evaluate(()=>({
      h1:document.querySelectorAll('h1').length,h1Text:document.querySelector('h1')?.textContent?.trim()||'',
      title:document.title,lang:document.documentElement.lang,
      canonical:document.querySelector('link[rel="canonical"]')?.href||'',
      robots:document.querySelector('meta[name="robots"]')?.content||'',
      descriptions:[...document.querySelectorAll('meta[name="description"]')].map(e=>e.content),
      alternates:[...document.querySelectorAll('link[rel="alternate"][hreflang="ro-RO"]')].map(e=>e.href),
      scroll:Math.max(document.body.scrollWidth,document.documentElement.scrollWidth),vw:innerWidth,
      problems:document.querySelectorAll('.pl-svc-need').length,faq:document.querySelectorAll('.pl-svc-faq-items details').length,
      scene:document.querySelectorAll('.pl-art').length,cta:document.querySelectorAll('.pl-svc-hero-actions .intl-button').length,
      styledScene:document.querySelector('.pl-svc-scene')?getComputedStyle(document.querySelector('.pl-svc-scene')).display:'',
      styledGrid:document.querySelector('.pl-svc-hero-grid')?getComputedStyle(document.querySelector('.pl-svc-hero-grid')).display:'',
      styledCards:document.querySelector('.pl-svc-need-grid')?getComputedStyle(document.querySelector('.pl-svc-need-grid')).display:'',
      heroContact:document.querySelector('.pl-svc-hero-actions .intl-button')?.getAttribute('href')||''
     }));
     assert.equal(r.h1,1,`H1 ${slug}`);
     assert(r.h1Text.length>12,`short H1 ${slug}`);
     assert(r.title.length>12,`short title ${slug}`);
     assert(/ro/i.test(r.lang),`wrong html language ${slug}: ${r.lang}`);
     assert(r.canonical.endsWith('/ro/'+slug+'/'),`wrong canonical ${slug}: ${r.canonical}`);
     assert.equal(r.descriptions.length,1,`duplicate or missing description ${slug}`);
     assert(r.descriptions[0].length>70,`short description ${slug}`);
     assert.equal(r.alternates.length,1,`missing or duplicate Romanian hreflang ${slug}`);
     assert.equal(r.alternates[0],r.canonical,`wrong self hreflang ${slug}`);
     assert(/noindex/i.test(r.robots)||/noindex/i.test(response.headers()['x-robots-tag']||''),`index enabled ${slug}`);
     if(r.scroll>r.vw+5){
      const offenders=await page.evaluate(()=>[...document.querySelectorAll('body *')].map(el=>({el,rect:el.getBoundingClientRect()})).filter(x=>x.rect.right>innerWidth+5||x.rect.left< -5).slice(0,10).map(x=>({tag:x.el.tagName,cls:String(x.el.className).slice(0,90),text:(x.el.textContent||'').trim().slice(0,55),left:Math.round(x.rect.left),right:Math.round(x.rect.right)})));
      throw Error(`horizontal overflow ${slug}: ${r.scroll} vs ${r.vw}; offenders=${JSON.stringify(offenders)}`);
     }
     if(!shared.has(slug)){
      assert.equal(r.problems,3,`problems ${slug}`);
      assert(r.faq>=3,`FAQ ${slug}`);
      assert.equal(r.scene,1,`original scene ${slug}`);
      const nodes=await page.locator('.pl-art-node strong').evaluateAll(els=>els.map(el=>({text:el.textContent.trim(),width:el.clientWidth,scroll:el.scrollWidth})));
      assert.equal(nodes.length,3,`Romanian scene stages ${slug}`);
      assert(nodes.every(x=>x.text.length<=8&&x.scroll<=x.width+2),`Romanian scene label overflow ${slug}: ${JSON.stringify(nodes)}`);
      assert.equal(r.styledScene,'flex',`Premium service CSS missing on ${slug}`);
      assert.equal(r.styledGrid,'grid',`Romanian hero grid not styled on ${slug}`);
      assert.equal(r.styledCards,'grid',`Romanian problem cards not styled on ${slug}`);
      assert.equal(r.cta,1,`contact CTA ${slug}`);
      assert(new URL(r.heroContact,origin).pathname==='/ro/contact/',`Romanian CTA must link to real /ro/contact/ ${slug}`);
     }
     if(slug==='local-seo' && [390,1440].includes(width)){
      const mega=page.locator('.mrseo-mega--trial').first();
      assert.equal(await mega.count(),1,'Romanian mega-menu missing');
      const nav=await mega.evaluate(el=>({links:[...el.querySelectorAll('.mrseo-mega-items a.mrseo-mega-item')].map(a=>new URL(a.href).pathname),inert:[...el.querySelectorAll('.mrseo-mega-item--planned')].map(x=>x.textContent.trim())}));
      assert.equal(nav.inert.length,0,`inert Romanian services ${nav.inert}`);
      assert.equal(nav.links.length,25,'Romanian menu must have 25 links');
      assert.deepEqual(nav.links.slice().sort(),slugs.map(s=>'/ro/'+s+'/').sort(),'Romanian menu destinations differ');
      if(width===1440){
       await page.locator('.services-menu-toggle').first().click();
       const target=mega.locator('a.mrseo-mega-item[href$="/ro/international-seo/"]');
       assert(await target.isVisible(),'Romanian service link hidden');
       await target.click();await page.waitForURL(u=>u.pathname==='/ro/international-seo/');
       assert.equal(await page.locator('h1').count(),1,'Romanian menu click failed');
       await page.goto(url,{waitUntil:'domcontentloaded'});
      }
     }
     if((width===390||width===1440)&&['local-seo','woocommerce-shopify-stores','landing-pages','api-integrations','web-applications'].includes(slug))
      await page.screenshot({path:path.join(out,`ro-${slug}-${width}.jpg`),fullPage:true,type:'jpeg',quality:74});
     if(slug==='local-seo' && width===390){
      const scene=page.locator('.pl-svc-scene');
      const bar=page.locator('.mrseo-mobile-contact-bar');
      assert.equal(await bar.count(),1,'Shared mobile contact bar missing');
      await scene.scrollIntoViewIfNeeded();
      await page.waitForFunction(()=>document.documentElement.classList.contains('mrseo-ro-scene-visible'),null,{timeout:8000});
      assert.equal(await bar.evaluate(el=>getComputedStyle(el).visibility),'hidden','Mobile bar must not cover Romanian semantic diagram');
      await page.evaluate(()=>window.scrollTo(0,document.documentElement.scrollHeight));
      await page.waitForFunction(()=>!document.documentElement.classList.contains('mrseo-ro-scene-visible'),null,{timeout:8000});
      assert.equal(await bar.evaluate(el=>getComputedStyle(el).visibility),'visible','Contact bar must reappear below the hero');
     }
     results.push({slug,width,...r});
    }catch(e){throw Error(`${url}, width=${width}: ${e.message}`)}finally{await page.close()}
   }
  }
  if(shard===0){
   const contact=await browser.newPage({viewport:{width:390,height:850}});
   const resp=await contact.goto(origin+'/ro/contact/',{waitUntil:'domcontentloaded',timeout:30000});
   assert(resp&&resp.status()===200,'Romanian contact route must return HTTP 200');
   const form=contact.locator('form[action*="admin-post.php"]');
   assert.equal(await form.count(),1,'Romanian contact form missing');
   assert.equal(await form.locator('input[name="mrseo_lang"]').inputValue(),'ro','Contact form must submit Romanian locale');
   assert.equal(await form.locator('input[name="contact_email"]').count(),1,'Romanian email input missing');
   assert.equal(await form.locator('textarea[name="contact_message"]').count(),1,'Romanian message textarea missing');
   assert.equal(await contact.locator('.mrseo-privacy-notice a[href*="/ro/privacy/"]').count(),1,'Romanian privacy notice link missing');
   await contact.close();
  }
 }finally{await browser.close()}
 fs.writeFileSync(path.join(out,`ro-diagnostics-${shard}.json`),JSON.stringify(results,null,2));
 console.log(`Romanian browser PASS: shard ${shard}, ${results.length} viewports, 25 service URLs across 4 shards`);
}
run().catch(e=>{console.error(e.stack||e);process.exitCode=1});
