/* Dedicated UA release audit. Read the real route registries, no fabricated URLs or form submissions. */
'use strict';
const fs=require('node:fs');
const fsp=require('node:fs/promises');
const path=require('node:path');
const {chromium}=require('playwright');
const root=path.resolve(__dirname,'../wp-content/themes/mrseo-tech');
const origin=(process.env.MRSEO_TEST_ORIGIN||'https://mrseo.tech').replace(/\/$/,'');
const read=(name,marker)=>JSON.parse(fs.readFileSync(path.join(root,name),'utf8').split("<<<'"+marker+"'\n",1+1)[1].split('\n'+marker,1)[0]);
const semantic=read('inc/ua-semantic-map.php','MRSEO_UA_SEMANTIC_MAP');
const hs=read('inc/horoshop-premium-routes.php','MRSEO_HS_PAGES');
const dev=read('inc/ua-dev-new-pages.php','MRSEO_UA_DEV_CONTENT');
const routes=[...new Set([...Object.keys(semantic),...Object.keys(hs).map(k=>'horoshop/'+k),...Object.keys(dev)])];
const commercial=Object.assign({},read('inc/premium-ua-commercial-routes.php','MRSEO_PUC_ROUTES'),read('inc/premium-ua-commercial-routes.php','MRSEO_PUC_EXPANSION_ROUTES'));
const campaign=new Set(['google-search-ads','performance-max','google-shopping','local-google-ads','google-remarketing']);
const paired=new Set([...Object.keys(commercial).filter(k=>!campaign.has(k)),...Object.keys(hs).map(k=>'horoshop/'+k),...Object.keys(dev),'horoshop']);
const referenceSelectors={'seo':'.seo-problem-answer p','google-ads':'.service-problem-answer p'};
for(const k of ['local-seo','ecommerce-seo','service-business-seo','international-seo','seo-audit'])referenceSelectors[k]='.local-ref-answer p';
for(const k of campaign)referenceSelectors[k]='.ads-problem-fix p';
const editorial=new Set(['','about','portfolio','contact','privacy']);
const coverage=new Set([...paired,'web-development',...Object.keys(referenceSelectors),...editorial]);
if(routes.some(k=>!coverage.has(k))||coverage.size!==routes.length)throw Error('Missing UA acceptance coverage');
const viewports=[{width:1440,height:900},{width:390,height:844},{width:360,height:800}];
const selected=new Set(['local-seo','google-ads','google-ads-audit','merchant-center','horoshop','horoshop/seo','service-websites','web-development','mobile-app-development','about','contact','privacy']);
const out=process.env.MRSEO_UA_QA_DIR||'shots/ua-unified';
const urlFor=slug=>origin+'/'+(slug?slug+'/':'');
(async()=>{
 await fsp.mkdir(out,{recursive:true});
 const browser=await chromium.launch({headless:true});
 const reports=[];
 try{
  await Promise.all(viewports.map(async viewport=>{
   const ctx=await browser.newContext({viewport,reducedMotion:'reduce'});
   const page=await ctx.newPage();
   let runtime=[];page.on('pageerror',e=>runtime.push(String(e)));
   for(const slug of routes){
    const errors=[];runtime=[];
    const result={slug,viewport:viewport.width,errors};reports.push(result);
    try{
     const response=await page.goto(urlFor(slug),{waitUntil:'domcontentloaded',timeout:25000});
     if(!response||response.status()!==200)errors.push('HTTP '+response?.status());
     const data=await page.evaluate(referenceSelector=>{
      const shown=e=>!!e.getClientRects().length&&getComputedStyle(e).visibility!=='hidden';
      const main=document.querySelector('.pti-page,.hs-premium,.ukseo--horoshop,.about-page,.mrseo-privacy-page');
      const headings=[...document.querySelectorAll('h1')];
      const pairs=[...document.querySelectorAll('[data-ua-problem-pair]')];
      const completePairs=pairs.filter(e=>{const answer=e.querySelector('.ua-paired-answer');const p=answer?.querySelector('p');return answer&&p&&shown(p)&&p.textContent.trim().length>20&&!!e.querySelector('h3')?.textContent.trim();}).length;
      const referenceAnswers=referenceSelector?[...document.querySelectorAll(referenceSelector)].filter(e=>shown(e)&&e.textContent.trim().length>20).length:0;
      const devHubOpen=[...document.querySelectorAll('.pti-page[data-pti-service="web-development"] #problems .pti-solution[open]')].filter(shown).length;

      const rootFont=e=>parseFloat(getComputedStyle(e).fontSize);
      const sample=[...document.querySelectorAll('.pti-page.puc-page:not(.ads-v2) .pti-card p,.pti-page[data-pti-service="web-development"] .pti-card p,.udv-card p,.udv-step p,.hs-premium-step p,.hs-premium-faq-list p')].filter(shown);
      const bounds=[...document.querySelectorAll('.pti-hero-copy,.pti-page .pti-wrap,.udv-section>.container,.hs-premium-wrap,.about-hero-copy,.mrseo-privacy-container')].filter(shown).map(e=>({class:e.className,left:e.getBoundingClientRect().left,right:e.getBoundingClientRect().right}));
      return {pairs:pairs.length,completePairs,devHubOpen,referenceAnswers,lang:document.documentElement.lang,h1:headings.length,h1Text:headings[0]?.textContent.trim(),title:document.title,description:document.querySelector('meta[name="description"]')?.content,canonical:document.querySelector('link[rel="canonical"]')?.href,robots:document.querySelector('meta[name="robots"]')?.content||'',width:innerWidth,scrollWidth:document.documentElement.scrollWidth,css:[...document.querySelectorAll('link[rel="stylesheet"]')].some(e=>e.href.includes('/assets/ua-unified-style.css')),styleH1:headings[0]?rootFont(headings[0]):null,main:main?.className||null,minCopy:sample.length?Math.min(...sample.map(rootFont)):null,bounds:bounds.filter(x=>x.left<-3||x.right>innerWidth+3),menu:[...document.querySelectorAll('.mrseo-catalog-link[href]')].map(a=>new URL(a.href).pathname),parents:document.querySelectorAll('.mrseo-catalog-parent').length};
     },referenceSelectors[slug]||null);
     result.data=data;result.status=response?.status();
     if(data.lang!=='uk-UA')errors.push('Language '+data.lang);
     if(data.h1!==1||!data.h1Text)errors.push('Expected one nonempty H1');
     if(!data.title||!data.description)errors.push('Missing title or description');
     if(!data.canonical||new URL(data.canonical).pathname!==new URL(urlFor(slug)).pathname)errors.push('Canonical mismatch '+data.canonical);
     if(!/noindex/i.test((response?.headers()['x-robots-tag']||'')+' '+data.robots))errors.push('Noindex absent');
     if(new URL(page.url()).pathname!==new URL(urlFor(slug)).pathname)errors.push('Unexpected redirect '+page.url());
     if(data.scrollWidth>data.width+3||data.bounds.length)errors.push('Horizontal overflow '+JSON.stringify(data.bounds));
     if(data.css!==!!slug)errors.push('UA stylesheet not isolated from homepage or missing');
     if(slug&&data.minCopy!==null&&data.minCopy<17)errors.push('Main copy below 17px: '+data.minCopy);
     if(data.parents!==5||data.menu.length!==31||data.menu.some(p=>['/google-remarketing/','/horoshop/ga4/','/website-redesign/'].includes(p)))errors.push('Unexpected approved menu inventory');
     if(!['/mobile-app-development/','/ecommerce-mobile-apps/','/corporate-mobile-apps/','/pwa-development/'].every(p=>data.menu.includes(p)))errors.push('Missing mobile service link');
     if(paired.has(slug)&&(data.pairs!==3||data.completePairs!==3))errors.push('Missing visible problem-to-solution pairs: '+data.completePairs+'/'+data.pairs);
     if(referenceSelectors[slug]&&data.referenceAnswers!==3)errors.push('Missing reference-layout solutions: '+data.referenceAnswers);
     if(slug==='web-development'&&data.devHubOpen!==3)errors.push('WebDev hub solutions are not visible');
     if(runtime.length)errors.push(...runtime.map(e=>'JS: '+e));
     // Capture actual hero and a representative lower content block, including any failing URL.
     if(selected.has(slug)||errors.length){
      const name=(slug||'home').replaceAll('/','-')+'-'+viewport.width;
      await page.screenshot({path:path.join(out,name+'.jpg'),type:'jpeg',quality:78,animations:'disabled',timeout:15000});
      const section=page.locator('.local-ref-problems,.ads-diagnosis,.psc-problems,.udv-section--problems,.hs-premium-problems,.pti-section').first();
      if(await section.count()){await section.scrollIntoViewIfNeeded({timeout:5000});await page.screenshot({path:path.join(out,name+'-content.jpg'),type:'jpeg',quality:78,animations:'disabled',timeout:15000});}
     }
    }catch(e){errors.push(String(e));}
    console.log((errors.length?'FAIL':'PASS')+' '+viewport.width+' /'+slug+' '+errors.join(' | '));
   }
   await ctx.close();
  }));
 }finally{await browser.close();}
 const failures=reports.filter(r=>r.errors.length);
 const summary={routes:routes.length,views:reports.length,failed:failures.length,failures,reports};
 await fsp.writeFile(path.join(out,'report.json'),JSON.stringify(summary,null,2));
 console.log('UA QA: '+routes.length+' routes, '+reports.length+' views, '+failures.length+' failed');
 if(failures.length)process.exitCode=1;
})().catch(e=>{console.error(e);process.exitCode=1;});
