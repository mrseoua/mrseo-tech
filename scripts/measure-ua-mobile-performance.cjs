/* Read-only mobile lab audit. LCP/CLS are synthetic; INP requires real user field data. */
'use strict';
const fs=require('node:fs');
const fsp=require('node:fs/promises');
const path=require('node:path');
const {chromium,devices}=require('playwright');
const root=path.resolve(__dirname,'../wp-content/themes/mrseo-tech/inc');
const read=(name,marker)=>JSON.parse(fs.readFileSync(path.join(root,name),'utf8').split("<<<'"+marker+"'\n")[1].split('\n'+marker)[0]);
const retired=JSON.parse(fs.readFileSync(path.join(root,'ua-retired-services.json'),'utf8'));
const routes=[...new Set([...Object.keys(read('ua-semantic-map.php','MRSEO_UA_SEMANTIC_MAP')),...Object.keys(read('horoshop-premium-routes.php','MRSEO_HS_PAGES')).map(k=>'horoshop/'+k),...Object.keys(read('ua-dev-new-pages.php','MRSEO_UA_DEV_CONTENT'))])].filter(slug=>!Object.hasOwn(retired,slug));
const origin=(process.env.MRSEO_TEST_ORIGIN||'https://mrseo.tech').replace(/\/$/,'');
const shard=Number(process.env.MRSEO_PERF_SHARD||0),shards=Number(process.env.MRSEO_PERF_SHARDS||1);
const selected=routes.filter((_,i)=>i%shards===shard);
const out=process.env.MRSEO_UA_QA_DIR||'shots/ua-performance';
(async()=>{
 await fsp.mkdir(out,{recursive:true});
 const browser=await chromium.launch({headless:true});const reports=[];
 try{
 for(const slug of selected){
  const ctx=await browser.newContext({...devices['Pixel 5'],viewport:{width:390,height:844},reducedMotion:'no-preference',serviceWorkers:'block'});
  const page=await ctx.newPage();const cdp=await ctx.newCDPSession(page);const r={slug,errors:[]};reports.push(r);let transferBytes=0;
  page.on('pageerror',e=>r.errors.push(String(e)));
  await page.addInitScript(()=>{
   const m=window.__uaLab={lcp:null,cls:0,maxSession:0,sessionValue:0,sessionStart:0,lastShift:0,longTasks:0,tbt:0};
   const observe=(type,cb)=>{try{new PerformanceObserver(list=>list.getEntries().forEach(cb)).observe({type,buffered:true});}catch{}};
   observe('largest-contentful-paint',e=>{m.lcp=e.startTime;});
   observe('layout-shift',e=>{if(e.hadRecentInput)return;if(e.startTime-m.lastShift>1000||e.startTime-m.sessionStart>5000){m.sessionStart=e.startTime;m.sessionValue=0;}m.sessionValue+=e.value;m.lastShift=e.startTime;m.maxSession=Math.max(m.maxSession,m.sessionValue);m.cls=m.maxSession;});
   observe('longtask',e=>{m.longTasks++;m.tbt+=Math.max(0,e.duration-50);});
  });
  try{
   await cdp.send('Network.enable');await cdp.send('Network.setCacheDisabled',{cacheDisabled:true});
   await cdp.send('Network.emulateNetworkConditions',{offline:false,latency:150,downloadThroughput:1600000/8,uploadThroughput:750000/8});
   await cdp.send('Emulation.setCPUThrottlingRate',{rate:4});
   cdp.on('Network.loadingFinished',e=>{transferBytes+=e.encodedDataLength||0;});
   const url=origin+'/'+(slug?slug+'/':'');
   const response=await page.goto(url,{waitUntil:'load',timeout:45000});
   if(response?.status()!==200)r.errors.push('HTTP '+response?.status());
   await page.waitForTimeout(3500);
   Object.assign(r,await page.evaluate(()=>{const n=performance.getEntriesByType('navigation')[0];return {...window.__uaLab,ttfb:n?.responseStart,load:n?.loadEventEnd,resources:performance.getEntriesByType('resource').length,width:innerWidth,scrollWidth:document.documentElement.scrollWidth};}));
   r.transferBytes=transferBytes;r.lcpPass=r.lcp!==null&&r.lcp<=2500;r.clsPass=r.cls<=.1;
   if(r.scrollWidth>r.width+3)r.errors.push('Horizontal overflow');
   const broken=await page.evaluate(()=>[...document.images].filter(i=>i.complete&&i.naturalWidth===0&&i.getClientRects().length).map(i=>i.currentSrc||i.src));
   if(broken.length)r.errors.push('Broken images: '+broken.join(', '));
   await page.screenshot({path:path.join(out,(slug||'home').replaceAll('/','-')+'.jpg'),type:'jpeg',quality:75,timeout:15000});
  }catch(e){r.errors.push(String(e));}finally{await ctx.close();}
  console.log(JSON.stringify(r));
 }
 }finally{await browser.close();}
 const summary={method:'Cold mobile lab: Chromium Pixel 5, 4x CPU, 150ms latency, 1.6 Mbps download; one run per route; LCP and CLS estimates, long-task excess is not INP.',routes:reports.length,lcpGood:reports.filter(r=>r.lcpPass).length,clsGood:reports.filter(r=>r.clsPass).length,errors:reports.filter(r=>r.errors.length).length,reports};
 await fsp.writeFile(path.join(out,'report-'+shard+'.json'),JSON.stringify(summary,null,2));
 console.log('UA mobile lab: '+JSON.stringify({...summary,reports:undefined}));
 if(summary.errors)process.exitCode=1;
})().catch(e=>{console.error(e);process.exitCode=1;});
