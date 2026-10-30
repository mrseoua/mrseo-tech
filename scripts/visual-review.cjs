/* Public staging screenshot capture; no WordPress login or credentials. */
'use strict';
const fs = require('node:fs/promises');
const {chromium} = require('playwright');
const output = 'shots';
const url = process.env.TARGET_URL || 'https://mrseo.tech/';
const sleep = ms => new Promise(resolve => setTimeout(resolve, ms));
const result = {target:url, capturedAt:new Date().toISOString(), profiles:[], notes:[]};

async function snapshot(page, label, options) {
  const jpeg = await page.screenshot({type:'jpeg',quality:82,fullPage:false, ...(options||{})});
  await fs.writeFile(output+'/'+label+'.jpg',jpeg);
  await fs.writeFile(output+'/'+label+'.b64',jpeg.toString('base64'),'utf8');
  return jpeg.length;
}
async function capture(browser, name, viewport, mobile) {
  const context = await browser.newContext({
    viewport, deviceScaleFactor:mobile?2:1, isMobile:mobile, hasTouch:mobile,
    locale:'uk-UA', colorScheme:'dark',
    userAgent: mobile ?
      'Mozilla/5.0 (Linux; Android 15; Pixel 8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36' :
      'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36'
  });
  const page = await context.newPage();
  const profile = {name, viewport, errors:[], failedRequests:[]};
  result.profiles.push(profile);
  page.on('pageerror',e=>profile.errors.push(String(e.message).slice(0,250)));
  page.on('console',m=>{if(m.type()==='error') profile.errors.push(m.text().slice(0,250))});
  page.on('requestfailed',r=>profile.failedRequests.push({url:r.url().slice(0,200),error:r.failure()?.errorText}));
  try{
    const response = await page.goto(url,{waitUntil:'domcontentloaded',timeout:45000});
    profile.httpStatus = response ? response.status() : null;
    profile.responseRobots = response ? response.headers()['x-robots-tag']||null : null;
    try{await page.evaluate(()=>document.fonts.ready)}catch(_){}
    await sleep(4500);
    try{await page.waitForFunction(()=>document.querySelector('.orbit-lab.lab-webgl-ready'),null,{timeout:12000})}catch(_){}
    await sleep(1300);
    profile.page = await page.evaluate(()=>{
      const r=document.querySelector('.orbit-lab'),c=document.querySelector('.lab-core');
      const n=[...document.querySelectorAll('.lab-node')];
      const spokes=[...document.querySelectorAll('.lab-spoke')];
      return {
        title:document.title, href:location.href, width:document.documentElement.scrollWidth,
        viewport:innerWidth, hasHero:!!r, webglReady:!!r?.classList.contains('lab-webgl-ready'),
        earthCanvas:!!document.querySelector('.lab-core canvas.lab-webgl-canvas'),
        satellites:n.length,
        services:n.map(e=>({title:(e.innerText||'').trim().slice(0,90),href:e.getAttribute('href'),rect:Math.round(e.getBoundingClientRect().width)})),
        connections:spokes.length,
        connectedLines:spokes.filter(e=>{try{return e.getTotalLength()>15}catch(_){return false}}).length,
        linesVisible:getComputedStyle(document.querySelector('.lab-connectors')).display!=='none',
        noIndexMeta:document.querySelector('meta[name=robots]')?.content||null,
        globeRect:c?.getBoundingClientRect().toJSON()||null
      };
    });
    profile.screenshotBytes = await snapshot(page,name);
    if(!mobile){
      const globe=page.locator('.lab-visual');
      if(await globe.count()) {
        try{
          const jpg=await globe.screenshot({type:'jpeg',quality:84,timeout:10000});
          await fs.writeFile(output+'/globe.jpg',jpg);
          await fs.writeFile(output+'/globe.b64',jpg.toString('base64'),'utf8');
        }catch(e){profile.errors.push('Globe crop: '+e.message.slice(0,160))}
      }
    }else{
      const node=page.locator('.lab-visual');
      if(await node.count()){
        try{
          await node.scrollIntoViewIfNeeded({timeout:7000});
          await sleep(500);
          profile.servicesScreenshotBytes=await snapshot(page,'mobile-services');
        }catch(e){profile.errors.push('Mobile services crop: '+e.message.slice(0,160))}
      }
    }
  }catch(e){
    profile.errors.push('Capture error: '+String(e).slice(0,500));
    try{profile.screenshotBytes=await snapshot(page,name)}catch(_){}
  }finally{
    await context.close();
  }
}
(async()=>{
 await fs.mkdir(output,{recursive:true});
 let browser;
 try{
   browser=await chromium.launch({headless:true,args:[
     '--enable-webgl','--use-gl=angle','--use-angle=swiftshader',
     '--enable-unsafe-swiftshader','--disable-dev-shm-usage'
   ]});
   await capture(browser,'desktop',{width:1600,height:920},false);
   await capture(browser,'mobile',{width:390,height:844},true);
 }catch(e){result.notes.push('Browser launch/capture: '+String(e).slice(0,700))}
 finally{
   if(browser)await browser.close();
   await fs.writeFile(output+'/diagnostics.json',JSON.stringify(result,null,2),'utf8');
   console.log(JSON.stringify({target:url,profiles:result.profiles.map(x=>({
      name:x.name,status:x.httpStatus,webgl:x.page?.webglReady,
      satellites:x.page?.satellites,connections:x.page?.connectedLines,
      errorCount:x.errors.length,failedRequests:x.failedRequests.length
   })),notes:result.notes},null,2));
 }
 if(!result.profiles.some(p=>p.screenshotBytes))process.exitCode=1;
})().catch(e=>{console.error(e);process.exitCode=1});