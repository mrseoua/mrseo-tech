import { chromium } from 'playwright';
import fs from 'node:fs';
import path from 'node:path';

const root = 'https://mrseo.tech';
const widths = {
  desktop: { width: 1440, height: 900 },
  mobile: { width: 390, height: 844 },
  narrow: { width: 360, height: 800 }
};
const routes = [
  ['/', 'home'],
  ['/ru/', 'home'],
  ['/en/', 'home'],
  ['/pl/', 'home'],
  ['/de/', 'home'],
  ['/seo/', 'core'],
  ['/google-ads/', 'core'],
  ['/horoshop/', 'core'],
  ['/service-websites/', 'core'],
  ['/web-development/', 'core'],
  ['/ru/seo/', 'core'],
  ['/ru/google-ads/', 'core'],
  ['/ru/merchant-center/', 'core'],
  ['/en/seo/', 'core'],
  ['/en/website-design/', 'core'],
  ['/en/online-shop-development/', 'core'],
  ['/en/google-ads-audit/', 'core'],
  ['/en/merchant-center-help/', 'core'],
  ['/en/contact/', 'core'],
  ['/pl/seo/', 'core'],
  ['/pl/tworzenie-stron-internetowych/', 'core'],
  ['/pl/tworzenie-sklepow-internetowych/', 'core'],
  ['/pl/problemy-merchant-center/', 'core'],
  ['/pl/contact/', 'core'],
  ['/de/seo/', 'core'],
  ['/de/web-development/', 'core'],
  ['/de/contact/', 'core'],
  ['/contact/', 'core']
];

fs.mkdirSync('visual-report/screenshots', {recursive:true});
const records=[], critical=[];
const browser=await chromium.launch({headless:true, args:['--no-sandbox']});
for(const [route,kind] of routes){
  const viewports=kind==='home'?['desktop','mobile','narrow']:['desktop','mobile'];
  for(const viewport of viewports){
    const page=await browser.newPage({viewport:widths[viewport],deviceScaleFactor:1,reducedMotion:'reduce',userAgent:'MrSeoInternationalPrelaunchAudit/1.0',extraHTTPHeaders:{Accept:'text/html,application/xml;q=0.9,*/*;q=0.8'}});
    const record={route,viewport,status:0,errors:[],requests:[],issues:[],checks:{}};
    page.on('pageerror',error=>record.errors.push(String(error.message).slice(0,170)));
    page.on('requestfailed',request=>{
      if(request.url().startsWith(root))record.requests.push(request.url().slice(root.length,180));
    });
    try{
      const response=await page.goto(root+route,{waitUntil:'domcontentloaded',timeout:28000});
      record.status=response?.status()??0;
      await page.waitForTimeout(500);
      record.checks=await page.evaluate(()=>{
        const rectOK=el=>{
          const r=el.getBoundingClientRect(),s=getComputedStyle(el);
          return s.display!=='none'&&s.visibility!=='hidden'&&Number(s.opacity)>.01&&r.width>1&&r.height>1;
        };
        const h1s=[...document.querySelectorAll('h1')].filter(rectOK);
        const doc=document.documentElement, viewport=innerWidth;
        const right=[...document.querySelectorAll('header a,header button,header summary,main h1,main h2,main p,main a,main button,main input,main textarea,footer a')].filter(rectOK).filter(el=>{
          const r=el.getBoundingClientRect();
          return r.right>viewport+3 || r.left< -3;
        }).slice(0,12).map(el=>({
          tag:el.tagName.toLowerCase(),
          className:String(el.className).slice(0,70),
          text:(el.innerText||el.getAttribute('aria-label')||'').slice(0,55),
          right:Math.round(el.getBoundingClientRect().right)
        }));
        const imgs=[...document.querySelectorAll('img')].filter(rectOK);
        const badImages=imgs.filter(img=>img.complete&&img.naturalWidth===0).slice(0,8).map(img=>img.currentSrc||img.src);
        const cssWidths=[...document.querySelectorAll('header a,header button,header summary, main a,main button')].filter(rectOK)
          .filter(el=>parseFloat(getComputedStyle(el).fontSize)<12).slice(0,10)
          .map(el=>({text:(el.innerText||'').slice(0,35),size:getComputedStyle(el).fontSize}));
        return {
          documentWidth:doc.scrollWidth, viewportWidth:viewport,
          h1Count:h1s.length,h1:h1s[0]?.textContent?.trim().replace(/\s+/g,' ').slice(0,180)||'',
          mains:document.querySelectorAll('main').length,
          rightOverflow:right,
          brokenImages:badImages,
          smallInteractiveText:cssWidths,
          formCount:document.querySelectorAll('form').length,
          contactForm:!!document.querySelector('form[action*="admin-post.php"]'),
          canonical:document.querySelectorAll('link[rel="canonical"]').length,
          hreflangs:document.querySelectorAll('link[rel="alternate"][hreflang]').length,
          htmlLang:document.documentElement.lang,
          noindex:document.querySelector('meta[name="robots"]')?.content||'',
          links:document.querySelectorAll('a[href]').length
        };
      });
      if(record.status!==200)record.issues.push('HTTP '+record.status);
      if(record.checks.documentWidth>record.checks.viewportWidth+3)
         record.issues.push('HORIZONTAL OVERFLOW '+record.checks.documentWidth+'/'+record.checks.viewportWidth);
      if(record.checks.h1Count!==1)record.issues.push('Visible H1 count '+record.checks.h1Count);
      if(record.checks.mains!==1)record.issues.push('MAIN LANDMARK count '+record.checks.mains);
      if(record.checks.canonical!==1)record.issues.push('Canonical count '+record.checks.canonical);
      if(record.checks.rightOverflow.length)
         record.issues.push('Visible text/controls outside viewport '+JSON.stringify(record.checks.rightOverflow.slice(0,3)));
      if(record.checks.brokenImages.length)record.issues.push('Broken images '+record.checks.brokenImages.slice(0,2));
      if(record.errors.length)record.issues.push('JS errors '+record.errors.slice(0,3));
      if(viewport!=='desktop'){
        const menu=page.locator('header .mrseo-language-dropdown summary').first();
        if(await menu.count()){
          await menu.click({timeout:5000});
          const drop=await page.locator('header .mrseo-language-options').first().evaluate(el=>{
            const r=el.getBoundingClientRect();
            return {left:Math.round(r.left),right:Math.round(r.right),width:Math.round(r.width),viewport:innerWidth,
            displayed:getComputedStyle(el).display};
          });
          record.checks.langDropdown=drop;
          if(drop.right>drop.viewport+2||drop.left< -2)record.issues.push('LANGUAGE DROPDOWN overflows viewport '+JSON.stringify(drop));
        }
      }
      if(kind==='home'||['/en/website-design/','/pl/tworzenie-stron-internetowych/','/de/seo/','/horoshop/','/ru/seo/'].includes(route)){
        const clean=route.replaceAll('/','-')||'root';
        const target=path.join('visual-report','screenshots',(clean==='-'?'home':clean)+'-'+viewport+'.png');
        await page.screenshot({path:target,fullPage:false,timeout:16000});
      }
    }catch(error){
      record.issues.push('AUDIT ERROR '+String(error?.message||error).slice(0,260));
    }finally{
      records.push(record);
      console.log((record.issues.length?'WARN':'PASS')+' '+viewport.padEnd(7)+' '+route.padEnd(37)+' HTTP '+record.status+' H1 '+(record.checks.h1Count??'?')+' doc '+(record.checks.documentWidth??'?')+'/'+(record.checks.viewportWidth??'?')+(record.issues.length?' | '+record.issues.join(' | ').slice(0,500):''));
      await page.close();
    }
  }
}
await browser.close();
fs.writeFileSync('visual-report/results.json',JSON.stringify(records,null,2));
const failing=records.filter(x=>x.issues.length);
const pages=routes.length;
const lines=['# MrSeo.tech read-only responsive audit',
'','**Main source:** Public WordPress website (no site changes or form submissions).',
'','**Pages:** '+pages+'; **viewport checks:** '+records.length+'; **checks with warnings:** '+failing.length,
'','| Route | Viewport | HTTP | H1 | Width | Findings |',
'|---|---|---|---|---|---|'];
for(const r of records){
  lines.push('| '+r.route+' | '+r.viewport+' | '+r.status+' | '+(r.checks.h1Count??'?')+
    ' | '+(r.checks.documentWidth??'?')+'/'+(r.checks.viewportWidth??'?')+' | '+r.issues.join('; ').replaceAll('|','/').slice(0,300)+' |');
}
fs.writeFileSync('visual-report/README.md',lines.join('\n')+'\n');
console.log('AUDIT TOTAL: routes='+pages+' viewport_checks='+records.length+' warnings='+failing.length+' screenshots='+fs.readdirSync('visual-report/screenshots').length);
if(failing.length)console.log('Review visual-report/results.json; no production files were modified.');
