'use strict';
const { chromium } = require('playwright');
const fs = require('node:fs/promises');
const base = process.env.MRSEO_TEST_ORIGIN || 'http://127.0.0.1:8080';
const slugs = ['client-portals','data-parsing','payment-integration','mobile-app-development','ecommerce-mobile-apps','corporate-mobile-apps','pwa-development'];
const sizes = [{name:'desktop',width:1440,height:900},{name:'mobile',width:390,height:844},{name:'narrow',width:360,height:780}];
(async()=>{
 await fs.mkdir('shots/ua-webdev',{recursive:true});
 const browser=await chromium.launch({headless:true,args:['--no-sandbox']});
 const diagnostics=[];
 try {
  for (const size of sizes) {
   const context=await browser.newContext({viewport:{width:size.width,height:size.height},reducedMotion:'reduce'});
   const page=await context.newPage();
   for (const slug of slugs) {
    const problems=[];
    const url=base+'/'+slug+'/';
    try {
     const response=await page.goto(url,{waitUntil:'networkidle',timeout:35000});
     if(response?.status()!==200)problems.push('HTTP '+response?.status());
     const data=await page.evaluate(async()=>{
      const hero=document.querySelector('.udv-premium-hero-image');
      const lower=[...document.querySelectorAll('.udv-premium-detail-image')];
      if(hero)try{await hero.decode()}catch{}
      return {
       h1:document.querySelectorAll('h1').length,
       robots:document.querySelector('meta[name=robots]')?.content||'',
       canonical:document.querySelector('link[rel=canonical]')?.href||'',
       hero:!!hero&&hero.naturalWidth>=1000,
       lower:lower.length===2&&lower.every(img=>img.getAttribute('src')?.includes('ua-dev-premium-')),
       scene:document.querySelector('.udv-premium-scene')?.dataset.udvPremiumScene||'',
       overflow:document.documentElement.scrollWidth>innerWidth+4,
       stages:document.querySelectorAll('.udv-story-step[data-udv-stage]').length,
       pause:!!document.querySelector('.udv-motion-toggle'),
       imgSrc:hero?.getAttribute('src')||''
      };
     });
     if(data.h1!==1||!data.hero||!data.lower||data.stages!==3||!data.pause||data.overflow||!/noindex/i.test(data.robots)||data.canonical!==url||!data.imgSrc.includes('ua-dev-premium-'))problems.push('render/SEO '+JSON.stringify(data));
     await page.locator('.udv-premium-scene').scrollIntoViewIfNeeded();
     await page.screenshot({path:'shots/ua-webdev/'+slug+'-'+size.name+'-hero.png',fullPage:false,animations:'disabled'});
     for(const part of ['problem','solution']){
      const graphic=page.locator('[data-udv-lower="'+part+'"]').first();
      await graphic.scrollIntoViewIfNeeded();
      const lowerReady=await graphic.locator('img.udv-premium-detail-image').evaluate(async img=>{try{await img.decode()}catch{}return img.naturalWidth>=1000;});
      if(!lowerReady)problems.push('Lower '+part+' WebP failed to decode');
      await page.screenshot({path:'shots/ua-webdev/'+slug+'-'+size.name+'-'+part+'.png',fullPage:false,animations:'disabled'});
     }
     const buttons=page.locator('.udv-story-step[data-udv-stage]');
     await buttons.nth(2).click();
     if(await page.locator('.udv-visual-wrap').first().getAttribute('data-udv-step')!=='2')problems.push('stage selector');
     const toggle=page.locator('.udv-motion-toggle').first();
     await toggle.click();
     if(await toggle.getAttribute('aria-pressed')!=='true')problems.push('pause');
    } catch(error){problems.push(String(error).slice(0,400))}
    diagnostics.push({slug,viewport:size.name,problems});
    console.log((problems.length?'FAIL':'PASS')+' UA WebDev '+slug+' '+size.name+' '+problems.join('; '));
   }
   await context.close();
  }
 } finally {await browser.close()}
 await fs.writeFile('shots/ua-webdev/diagnostics.json',JSON.stringify(diagnostics,null,2));
 const failed=diagnostics.filter(x=>x.problems.length);
 console.log('UA WEBDEV: '+(diagnostics.length-failed.length)+'/'+diagnostics.length+' passed; screenshots '+diagnostics.length*3);
 if(failed.length)process.exitCode=1;
})().catch(e=>{console.error(e);process.exitCode=1});
