/* Verify the approved button-free category orbit: actual motion, timed stop and reduced motion. */
'use strict';
const assert=require('node:assert/strict');
const {chromium}=require('playwright');
const origin=process.env.MRSEO_TEST_ORIGIN;
assert.equal(new URL(origin).origin,'http://127.0.0.1:8080');
(async()=>{
 const browser=await chromium.launch({headless:true});
 try{
  for(const width of [1440,1920,390,360]){
   const ctx=await browser.newContext({viewport:{width,height:900},reducedMotion:'reduce'});
   try{
    const page=await ctx.newPage();
    const errors=[];page.on('pageerror',e=>errors.push(String(e)));
    for(const slug of ['seo','google-ads','horoshop','service-websites','web-development']){
     errors.length=0;
     await page.emulateMedia({reducedMotion:'reduce'});
     const r=await page.goto(origin+'/'+slug+'/',{waitUntil:'domcontentloaded'});
     assert.equal(r.status(),200);
     const stage=page.locator('.category-home .pt-orbit');
     await stage.scrollIntoViewIfNeeded();
     assert.equal(await page.locator('.category-home .pt-rotate').count(),0);
     await page.waitForFunction(()=>document.querySelector('.category-home .pt-orbit')?.dataset.orbitMotion==='reduced');
     const transform=()=>stage.evaluate(s=>{const n=s.classList.contains('pt-orbit-moving')?s.querySelector('.pt-node'):s.querySelector('.pt-mobile-sat');return n?.style.transform||'';});
     const initial=await transform();assert.ok(initial,slug+' missing satellite position');
     await page.waitForTimeout(180);assert.equal(await transform(),initial);
     await page.emulateMedia({reducedMotion:'no-preference'});
     await page.waitForFunction(()=>document.querySelector('.category-home .pt-orbit')?.dataset.orbitMotion==='running');
     await page.waitForFunction(before=>{const s=document.querySelector('.category-home .pt-orbit');const n=s.classList.contains('pt-orbit-moving')?s.querySelector('.pt-node'):s.querySelector('.pt-mobile-sat');return n?.style.transform&&n.style.transform!==before;},initial,{timeout:3500});
     await page.waitForFunction(()=>document.querySelector('.category-home .pt-orbit')?.dataset.orbitMotion==='stopped',undefined,{timeout:7000});
     const stopped=await transform();await page.waitForTimeout(200);assert.equal(await transform(),stopped);
     assert.equal(errors.length,0,errors.join('; '));
     console.log('PASS button-free orbit motion/auto-stop/reduced motion '+slug+' '+width);
    }
   }finally{await ctx.close();}
  }
 }finally{await browser.close();}
})().catch(e=>{console.error(e);process.exitCode=1;});
