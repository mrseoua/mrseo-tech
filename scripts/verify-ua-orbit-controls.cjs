/* Targeted local browser regression: actual pointer clicks, no forced clicks. */
'use strict';
const assert=require('node:assert/strict');
const {chromium}=require('playwright');
const origin=process.env.MRSEO_TEST_ORIGIN;
assert.equal(new URL(origin).origin,'http://127.0.0.1:8080');
(async()=>{
 const browser=await chromium.launch({headless:true});
 try{
  for(const width of [1440,1920,390,360]){
   const ctx=await browser.newContext({viewport:{width,height:900},reducedMotion:'no-preference'});
   try{
    const page=await ctx.newPage();
    for(const slug of ['seo','google-ads','horoshop','service-websites','web-development']){
     const r=await page.goto(origin+'/'+slug+'/',{waitUntil:'load'});
     assert.equal(r.status(),200);
     const button=page.locator('.category-home .pt-rotate');
     const detail=page.locator('.category-home .pt-orbit-detail');
     await button.scrollIntoViewIfNeeded();
     const b=await button.boundingBox(),d=await detail.boundingBox();
     assert.ok(b&&d&&b.x>=-1&&b.x+b.width<=width+1&&b.height>=43,slug+' '+width+' button geometry');
     assert.ok(b.x>=d.x+d.width-1||d.x>=b.x+b.width-1||b.y>=d.y+d.height-1||d.y>=b.y+b.height-1,slug+' '+width+' detail/button overlap');
     await button.click({timeout:6000});
     assert.equal(await button.getAttribute('aria-pressed'),'true');
     await button.click({timeout:6000});
     assert.equal(await button.getAttribute('aria-pressed'),'false');
     await page.emulateMedia({reducedMotion:'reduce'});
     await page.waitForFunction(()=>document.querySelector('.category-home .pt-rotate')?.disabled===true);
     await page.emulateMedia({reducedMotion:'no-preference'});
     console.log('PASS orbit pause/resume/reduced motion '+slug+' '+width);
    }
   }finally{await ctx.close();}
  }
 }finally{await browser.close();}
})().catch(e=>{console.error(e);process.exitCode=1;});
