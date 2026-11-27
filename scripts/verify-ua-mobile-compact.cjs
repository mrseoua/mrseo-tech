/* Local preview: measure mobile before/after and verify no desktop drift.
 * Existing UA unified browser audit separately tests 42 routes at 1440/390/360.
 */
'use strict';
const fs=require('node:fs');
const path=require('node:path');
const assert=require('node:assert/strict');
const {chromium}=require('playwright');
const origin=process.env.MRSEO_TEST_ORIGIN;
assert.equal(origin,'http://127.0.0.1:8080');
const root=path.resolve(__dirname,'../wp-content/themes/mrseo-tech/inc');
const read=(name,marker)=>JSON.parse(fs.readFileSync(path.join(root,name),'utf8').split("<<<'"+marker+"'\n")[1].split('\n'+marker)[0]);
const retired=JSON.parse(fs.readFileSync(path.join(root,'ua-retired-services.json'),'utf8'));
const routes=[...new Set([...Object.keys(read('ua-semantic-map.php','MRSEO_UA_SEMANTIC_MAP')),...Object.keys(read('horoshop-premium-routes.php','MRSEO_HS_PAGES')).map(k=>'horoshop/'+k),...Object.keys(read('ua-dev-new-pages.php','MRSEO_UA_DEV_CONTENT'))])].filter(s=>!Object.hasOwn(retired,s));
assert.equal(routes.length,42);
const shotDir='shots/ua-mobile-compact';
const measure=page=>page.evaluate(()=>{
 const visible=e=>!!e.getClientRects().length&&getComputedStyle(e).visibility!=='hidden';
 const metadata=[document.title,...Array.from(document.querySelectorAll('head meta[name="description"],head meta[name="robots"],head link[rel="canonical"],head link[rel="alternate"][hreflang]')).map(e=>e.outerHTML)];
 const planet=document.querySelector('.pt-ua-home:not(.category-home) .pt-home');
 const box=e=>{const r=e.getBoundingClientRect();return [Math.round(r.width),Math.round(r.height)];};
 return {height:document.documentElement.scrollHeight,width:innerWidth,scrollWidth:document.documentElement.scrollWidth,metadata,h1:[...document.querySelectorAll('h1')].map(e=>e.textContent),links:[...document.querySelectorAll('a[href]')].map(e=>e.getAttribute('href')).sort(),answers:[...document.querySelectorAll('[data-ua-stage="problems"] :is(.ua-paired-answer,.local-ref-answer,.ads-problem-fix,.seo-problem-answer,.service-problem-answer) p')].map(e=>({text:e.textContent,visible:visible(e)})),planet:planet?box(planet):null,satellites:[...document.querySelectorAll('.pt-orbit>.pt-node')].map(e=>({href:e.getAttribute('href'),visible:visible(e)})),controls:[...document.querySelectorAll('form :is(input,textarea,select,button)')].map(e=>[e.tagName,e.getAttribute('name'),e.getAttribute('type')]),prices:[...document.querySelectorAll('.mp-rate')].map(e=>e.textContent),toggleCount:document.querySelectorAll('.ua-mobile-detail-toggle').length,asset:!!document.querySelector('link[href*="/ua-mobile-compact.css"]'),bodyText:document.body.textContent.replace(/\s+/g,' ').trim()};
});
(async()=>{
 fs.mkdirSync(shotDir,{recursive:true});
 const browser=await chromium.launch({headless:true});
 const before=await browser.newContext({viewport:{width:390,height:844},reducedMotion:'reduce'});
 const after=await browser.newContext({viewport:{width:390,height:844},reducedMotion:'reduce'});
 await before.route(/\/ua-mobile-compact\.(css|js)(\?|$)/,r=>r.fulfill({status:200,contentType:r.request().url().includes('.css')?'text/css':'application/javascript',body:''}));
 const a=await before.newPage(),b=await after.newPage();const results=[];
 try{
  for(const slug of routes){
   const item={slug,errors:[]};results.push(item);
   try{
    const url=origin+'/'+(slug?slug+'/':'');
    const load=async(page,width)=>{
     await page.setViewportSize({width,height:844});
     const resp=await page.goto(url,{waitUntil:'load',timeout:25000});
     assert.equal(resp.status(),200);
     await page.evaluate(()=>document.fonts.ready);
     return measure(page);
    };
    const old=await load(a,390),now=await load(b,390);
    item.before=old.height;item.after=now.height;item.reduction=Math.round((1-now.height/old.height)*1000)/10;item.toggles=now.toggleCount;
    assert.equal(now.asset,slug!=='seo','Missing phone stylesheet or modified approved SEO pilot');
    assert.deepEqual(now.metadata,old.metadata,'Metadata drift');
    assert.deepEqual(now.h1,old.h1,'H1 drift');
    assert.deepEqual(now.links,old.links,'Link inventory drift');
    assert.deepEqual(now.answers,old.answers,'Visible problem solutions changed');
    assert.deepEqual(now.satellites,old.satellites,'Satellite links or visibility changed');
    assert.deepEqual(now.planet,old.planet,'Protected homepage hero dimensions changed');
    assert.deepEqual(now.prices,old.prices,'Price drift');
    assert.deepEqual(now.controls,old.controls,'Form controls changed');
    assert.ok(now.scrollWidth<=now.width+3,'Mobile overflow');
    assert.ok(now.height<=old.height+40,'Mobile page grew unexpectedly');
    for(const toggle of await b.locator('.ua-mobile-detail-toggle').all()){
     const id=await toggle.getAttribute('aria-controls');const p=b.locator('#'+id);
     const full=await p.textContent();assert.ok(full.trim());assert.equal(await p.isVisible(),false);
     await toggle.click();assert.equal(await toggle.getAttribute('aria-expanded'),'true');assert.ok(await p.isVisible());
     await toggle.click();assert.equal(await p.isVisible(),false);
    }
    // Verify the single message action and its menu on narrow phones.
    for(const width of [390,360,320]){
     await b.setViewportSize({width,height:844});
     const bar=b.locator('.mrseo-mobile-contact-bar');
     const summary=bar.locator('summary');
     assert.equal(await bar.locator('.mrseo-mobile-call').isVisible(),false);
     const button=await summary.boundingBox();
     assert.ok(button&&button.x>=8&&button.x+button.width<=width-8&&button.height>=44&&button.width<=160,'Message button out of bounds');
     await summary.click();
     const panel=bar.locator('.mrseo-contact-ui-panel');
     assert.ok(await panel.isVisible(),'Contact messenger menu hidden');
     const rect=await panel.boundingBox();
     assert.ok(rect.x>=-1&&rect.x+rect.width<=width+1&&rect.y>=0&&rect.y+rect.height<=844,'Messenger menu off-screen: '+JSON.stringify(rect));
     assert.equal(await panel.locator('a:visible').count(),3);
     assert.deepEqual(await panel.locator('a span:first-child').allTextContents(),['Telegram','Viber','WhatsApp']);
     await summary.click();
     assert.equal(await panel.isVisible(),false);
    }
    await b.setViewportSize({width:390,height:844});
    const name=slug.replaceAll('/','-')||'home';
    await b.evaluate(()=>scrollTo(0,0));
    await b.screenshot({path:path.join(shotDir,name+'-390.jpg'),type:'jpeg',quality:78,animations:'disabled'});
    const desktopOld=await load(a,1440),desktopNow=await load(b,1440);
    assert.equal(desktopNow.toggleCount,0,'Disclosure leaked into desktop');
    assert.equal(desktopNow.height,desktopOld.height,'Desktop height changed');
    assert.deepEqual(desktopNow.metadata,desktopOld.metadata);
    assert.deepEqual(desktopNow.h1,desktopOld.h1);
    assert.deepEqual(desktopNow.links,desktopOld.links);
    assert.equal(desktopNow.bodyText,desktopOld.bodyText,'Desktop text changed');
   }catch(err){item.errors.push(String(err));}
   console.log(JSON.stringify(item));
  }
  await b.goto(origin+'/en/',{waitUntil:'load'});
  assert.equal(await b.locator('link[href*="ua-mobile-compact.css"]').count(),0);
  await b.setViewportSize({width:390,height:844});
  assert.ok(await b.locator('.mrseo-mobile-contact-bar .mrseo-mobile-call').isVisible(),'Foreign locale phone action unexpectedly removed');
 }finally{await browser.close();}
 const failed=results.filter(r=>r.errors.length);
 fs.writeFileSync(path.join(shotDir,'report.json'),JSON.stringify({routes:results.length,failed:failed.length,results},null,2));
 console.log('UA mobile comparison: '+results.length+' pages; '+failed.length+' failed; '+results.filter(r=>r.reduction>0).length+' shorter pages.');
 if(failed.length)process.exitCode=1;
})().catch(e=>{console.error(e);process.exitCode=1;});
