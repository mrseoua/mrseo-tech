/* Dedicated UA release audit. Read the real route registries, no fabricated URLs or form submissions. */
'use strict';
const fs=require('node:fs');
const fsp=require('node:fs/promises');
const path=require('node:path');
const {chromium}=require('playwright');
const root=path.resolve(__dirname,'../wp-content/themes/mrseo-tech');
const origin=(process.env.MRSEO_TEST_ORIGIN||'https://mrseo.tech').replace(/\/$/,'');
const read=(name,marker)=>JSON.parse(fs.readFileSync(path.join(root,name),'utf8').split("<<<'"+marker+"'\n",1+1)[1].split('\n'+marker,1)[0]);
// Prevent repeated pictures disguised by scene identifiers, labels or timing.
const authoredArt=Object.assign({},...[1,2,3,4,5,6].map(n=>read('inc/premium-ua-commercial-art-'+n+'.php',n===6?'MRSEO_PUC_EXPANSION_ART':'MRSEO_PUC_ART')));
const visualSignature=(id,svg)=>svg.replaceAll(id,'SCENE').replace(/<text\b[^>]*>[\s\S]*?<\/text>/g,'').replace(/ dur="[^"]+"/g,'').replace(/ begin="[^"]+"/g,'').replace(/<title>.*?<\/title>/g,'');
const seenArt=new Map();
for(const [id,svg] of Object.entries(authoredArt)){
 const signature=visualSignature(id,svg);
 if(seenArt.has(signature))throw Error('Duplicate commercial illustration geometry: '+seenArt.get(signature)+' / '+id);
 seenArt.set(signature,id);
}
const semantic=read('inc/ua-semantic-map.php','MRSEO_UA_SEMANTIC_MAP');
const hs=read('inc/horoshop-premium-routes.php','MRSEO_HS_PAGES');
const dev=read('inc/ua-dev-new-pages.php','MRSEO_UA_DEV_CONTENT');
const retired=JSON.parse(fs.readFileSync(path.join(root,'inc/ua-retired-services.json'),'utf8'));
const routes=[...new Set([...Object.keys(semantic),...Object.keys(hs).map(k=>'horoshop/'+k),...Object.keys(dev)])].filter(slug=>!Object.hasOwn(retired,slug));
const commercial=Object.assign({},read('inc/premium-ua-commercial-routes.php','MRSEO_PUC_ROUTES'),read('inc/premium-ua-commercial-routes.php','MRSEO_PUC_EXPANSION_ROUTES'));
const campaign=new Set(['google-search-ads','performance-max','google-shopping','local-google-ads','google-remarketing']);
const paired=new Set([...Object.keys(commercial).filter(k=>!campaign.has(k)),...Object.keys(hs).map(k=>'horoshop/'+k),...Object.keys(dev),'horoshop']);
const referenceSelectors={'seo':'.seo-problem-answer p','google-ads':'.service-problem-answer p'};
for(const k of ['local-seo','ecommerce-seo','service-business-seo','international-seo','seo-audit'])referenceSelectors[k]='.local-ref-answer p';
for(const k of campaign)referenceSelectors[k]='.ads-problem-fix p';
const editorial=new Set(['','about','portfolio','contact','privacy','pricing']);
const coverage=new Set([...paired,'web-development',...Object.keys(referenceSelectors),...editorial]);
if(routes.some(k=>!coverage.has(k))||[...coverage].filter(k=>!Object.hasOwn(retired,k)).length!==routes.length)throw Error('Missing UA acceptance coverage');
const viewports=[{width:1440,height:900},{width:390,height:844},{width:360,height:800}];
const selected=new Set(['local-seo','google-ads','google-ads-audit','merchant-center','horoshop','horoshop/seo','service-websites','web-development','mobile-app-development','analytics','store-conversion','api-integrations','horoshop/audit','about','contact','privacy','pricing']);
const out=process.env.MRSEO_UA_QA_DIR||'shots/ua-unified';
const urlFor=slug=>origin+'/'+(slug?slug+'/':'');
const local=['127.0.0.1','localhost'].includes(new URL(origin).hostname);
const pause=ms=>new Promise(resolve=>setTimeout(resolve,ms));
let blocked=0;
async function navigate(page,slug){
 for(let attempt=0;attempt<(local?1:2);attempt++){
  if(!local)await pause(1800);
  const response=await page.goto(urlFor(slug),{waitUntil:'domcontentloaded',timeout:25000});
  const status=response?.status();
  if(![429,503].includes(status)||local||attempt===1)return response;
  const retry=response.headers()['retry-after'];
  let wait=retry&&/^\d+$/.test(retry)?Number(retry)*1000:retry?Date.parse(retry)-Date.now():8000;
  if(!Number.isFinite(wait)||wait<0)wait=8000;
  if(wait>60000)return response;
  await pause(Math.max(8000,wait));
 }
}
(async()=>{
 await fsp.mkdir(out,{recursive:true});
 const browser=await chromium.launch({headless:true});
 const reports=[];
 try{
  const checkViewport=async viewport=>{
   const ctx=await browser.newContext({viewport,reducedMotion:'reduce'});
   const page=await ctx.newPage();
   let runtime=[];page.on('pageerror',e=>runtime.push(String(e)));
   for(const slug of routes){
    if(!local&&blocked>=3)break;
    const errors=[];runtime=[];
    const result={slug,viewport:viewport.width,errors};reports.push(result);
    try{
     const response=await navigate(page,slug);
     result.status=response?.status();
     if(!response||response.status()!==200){
      errors.push('HTTP '+response?.status()+' — no page assertions performed');
      if([429,503].includes(response?.status()))blocked++;
      console.log('FAIL '+viewport.width+' /'+slug+' '+errors.join(' | '));
      continue;
     }
     blocked=0;
     await page.evaluate(()=>document.fonts.ready);
     const data=await page.evaluate(referenceSelector=>{
      const shown=e=>!!e.getClientRects().length&&getComputedStyle(e).visibility!=='hidden';
      const main=document.querySelector('.pti-page,.hs-premium,.ukseo--horoshop,.about-page,.mrseo-privacy-page');
      const headings=[...document.querySelectorAll('h1')];
      const approach=document.querySelector('[data-ua-stage="approach"]');
      const approachHeading=approach?.querySelector('h2')?.textContent.replace(/\s+/g,' ').trim()||'';
      const approachCopy=approach?.textContent.replace(/\s+/g,' ').trim()||'';
      const devPictures=[...document.querySelectorAll('.pti-page[data-pti-service="web-development"] .category-catalog .ct-premium-scene img')].map(e=>e.getAttribute('src'));
      const stages=[...document.querySelectorAll('[data-ua-stage]')].map(e=>({key:e.dataset.uaStage,visible:shown(e),text:e.textContent.trim().length,top:e.getBoundingClientRect().top,catalog:e.dataset.uaStage==='catalog'?[...e.querySelectorAll('a[href]')].map(a=>new URL(a.href).pathname):[]}));
      const pairs=[...document.querySelectorAll('[data-ua-problem-pair]')];
      const completePairs=pairs.filter(e=>{const answer=e.querySelector('.ua-paired-answer');const p=answer?.querySelector('p');return answer&&p&&shown(p)&&p.textContent.trim().length>20&&!!e.querySelector('h3')?.textContent.trim();}).length;
      const referenceAnswers=referenceSelector?[...document.querySelectorAll(referenceSelector)].filter(e=>shown(e)&&e.textContent.trim().length>20).length:0;
      const devHubOpen=[...document.querySelectorAll('.pti-page[data-pti-service="web-development"] #problems .pti-solution.ua-paired-answer > p')].filter(shown).length;
      const problemSection=document.querySelector('[data-ua-stage="problems"]');
      const readablePairs=[...problemSection?.querySelectorAll('[data-ua-problem-pair], [data-api-pair], .local-ref-row, .ads-problem-row, .service-problem-list > .pti-card')||[]].map(row=>{
       const pain=row.querySelector('.ua-paired-problem,.local-ref-pain,.ads-problem-copy,.service-problem-copy,.ua-api-problem');
       const answer=row.querySelector('.ua-paired-answer,.local-ref-answer,.ads-problem-fix,.service-problem-answer,.seo-problem-answer');
       const paragraph=answer?.querySelector('p'),title=pain?.querySelector('h3');
       if(!pain||!answer||!paragraph||!title)return {valid:false};
       const p=pain.getBoundingClientRect(),a=answer.getBoundingClientRect(),style=getComputedStyle(paragraph);
       const mobile=innerWidth<=600;
       return {valid:shown(title)&&shown(paragraph)&&paragraph.textContent.trim().length>20&&!!title.textContent.trim(),
        layout:mobile?a.top>=p.bottom-4:a.left>=p.right-4,
        font:parseFloat(style.fontSize),line:parseFloat(style.lineHeight),title:title.textContent.trim(),
        answer:paragraph.textContent.replace(/\s+/g,' ').trim(),bounds:[p.left,p.right,a.left,a.right]};
      });
      const problemDetails=problemSection?.querySelectorAll('details:not([open])').length||0;

      const rootFont=e=>parseFloat(getComputedStyle(e).fontSize);
      const sample=[...document.querySelectorAll('.pti-page.puc-page:not(.ads-v2) .pti-card p,.pti-page[data-pti-service="web-development"] .pti-card p,.udv-card p,.udv-step p,.hs-premium-step p,.hs-premium-faq-list p')].filter(shown);
      const bounds=[...document.querySelectorAll('.pti-hero-copy,.pti-page .pti-wrap,.udv-section>.container,.hs-premium-wrap,.about-hero-copy,.mrseo-privacy-container')].filter(shown).map(e=>({class:e.className,left:e.getBoundingClientRect().left,right:e.getBoundingClientRect().right}));
      const cta=document.querySelector('.category-compact-cta a.pti-pill,.category-hub-cta a.category-cta-button');
      const luminance=color=>{const channels=(color.match(/[0-9.]+/g)||[]).slice(0,3).map(v=>{const x=Number(v)/255;return x<=.04045?x/12.92:((x+.055)/1.055)**2.4});return channels.length===3?.2126*channels[0]+.7152*channels[1]+.0722*channels[2]:0;};
      const ctaStyle=cta?getComputedStyle(cta):null;const ctaContrast=ctaStyle?((Math.max(luminance(ctaStyle.color),luminance(ctaStyle.backgroundColor))+.05)/(Math.min(luminance(ctaStyle.color),luminance(ctaStyle.backgroundColor))+.05)):0;
      const ctaVisible=!!cta&&shown(cta)&&!!cta.textContent.trim()&&cta.getBoundingClientRect().height>=44;
      const menuGroups=Object.fromEntries([...document.querySelectorAll('[data-catalog-group]')].map(g=>[g.dataset.catalogGroup,[...g.querySelectorAll('.mrseo-catalog-link')].map(a=>[new URL(a.href).pathname,a.textContent.trim()])]));
      const satelliteLinks=[...document.querySelectorAll('.category-home .pt-node')].map(a=>[new URL(a.href).pathname,a.querySelector('.pt-node-label')?.textContent.trim()]);
      const cardLinks=[...document.querySelectorAll('.category-catalog .category-tile')].map(a=>[new URL(a.querySelector('a[href]').href).pathname,a.querySelector('h3')?.textContent.trim()]);
      return {menuGroups,satelliteLinks,cardLinks,ctaVisible,ctaContrast,stages,readablePairs,problemDetails,approachHeading,approachCopy,devPictureCount:devPictures.length,devPictureUnique:new Set(devPictures).size,pairs:pairs.length,completePairs,devHubOpen,referenceAnswers,lang:document.documentElement.lang,h1:headings.length,h1Text:headings[0]?.textContent.trim(),title:document.title,titleCount:document.querySelectorAll('head title').length,descriptionCount:document.querySelectorAll('head meta[name="description"]').length,description:document.querySelector('meta[name="description"]')?.content,canonical:document.querySelector('link[rel="canonical"]')?.href,robots:document.querySelector('meta[name="robots"]')?.content||'',width:innerWidth,scrollWidth:document.documentElement.scrollWidth,css:[...document.querySelectorAll('link[rel="stylesheet"]')].some(e=>e.href.includes('/assets/ua-unified-style.css')),styleH1:headings[0]?rootFont(headings[0]):null,main:main?.className||null,minCopy:sample.length?Math.min(...sample.map(rootFont)):null,bounds:bounds.filter(x=>x.left<-3||x.right>innerWidth+3),menu:[...document.querySelectorAll('.mrseo-catalog-link[href]')].map(a=>new URL(a.href).pathname),parents:document.querySelectorAll('.mrseo-catalog-parent').length};
     },referenceSelectors[slug]||null);
     result.data=data;result.status=response?.status();
     if(viewport.width===1440){result.content=await page.evaluate(()=>{const main=document.querySelector('main')||document.querySelector('#main');return main?{heading:main.querySelector('h1')?.textContent.trim()||'',paragraphs:[...main.querySelectorAll('p')].filter(p=>p.getClientRects().length&&!p.closest('[aria-hidden="true"],.category-catalog,.pt-orbit-bottom')).map(p=>p.textContent.replace(/\s+/g,' ').trim()).filter(p=>p.length>=45)}:null;});}
     if(data.lang!=='uk-UA')errors.push('Language '+data.lang);
     if(data.h1!==1||!data.h1Text)errors.push('Expected one nonempty H1');
     if(!data.title||!data.description||data.titleCount!==1||data.descriptionCount!==1)errors.push('Missing or duplicate title/description elements');
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
     if(['seo','google-ads','horoshop','service-websites','web-development'].includes(slug)&&(!data.ctaVisible||data.ctaContrast<4.5))errors.push('Category CTA label invisible or low contrast');
     if(slug==='web-development'&&data.devHubOpen!==3)errors.push('WebDev hub solutions are not visible');
     const groupKey={'seo':'seo','google-ads':'ads','horoshop':'horoshop','service-websites':'sites','web-development':'dev'}[slug];
     if(groupKey){const expected=JSON.stringify(data.menuGroups[groupKey]);if(JSON.stringify(data.satelliteLinks)!==expected||JSON.stringify(data.cardLinks)!==expected)errors.push('Category links/labels differ from visible menu');}
     if(slug==='web-development'&&(data.devPictureCount!==14||data.devPictureUnique!==14))errors.push('WebDev repeated or missing capability picture');
     if(slug==='portfolio'){
      const exp=await page.evaluate(()=>({root:!!document.querySelector('[data-experience="uk"]'),cards:document.querySelectorAll('.client-directory-card,.eu-project-card').length,values:document.querySelectorAll('.mx-value').length,menu:!!document.querySelector('header a[href$="/portfolio/"][aria-current="page"]'),cta:!!document.querySelector('.mx-cta a[href$="/contact/"]')}));
      if(!exp.root||exp.cards!==0||exp.values!==4||!exp.menu||!exp.cta)errors.push('Confidential experience inventory '+JSON.stringify(exp));
     }
     if(slug==='pricing'){
      const prices=await page.evaluate(()=>({groups:document.querySelectorAll('.mp-card[data-pricing-group]').length,rows:document.querySelectorAll('.mp-rate').length,cta:!!document.querySelector('.mp-final a[href$="/contact/"]'),menu:!!document.querySelector('header .nav-links a[href$="/pricing/"]')}));
      if(prices.groups!==5||prices.rows!==12||!prices.cta||!prices.menu)errors.push('Pricing page inventory '+JSON.stringify(prices));
     }
     if(!editorial.has(slug)){
      if(!data.approachHeading)errors.push('Missing specific approach heading');
      if(data.problemDetails||data.readablePairs.length!==3||data.readablePairs.some(p=>!p.valid||!p.layout||p.font<17.9||p.line<p.font*1.45||p.bounds[0]<-3||p.bounds[3]>data.width+3)){
       errors.push('API reference readability: '+JSON.stringify(data.readablePairs));
      }
      if(slug!=='local-seo'&&/Без пафосу\.\s*Без переплат\./i.test(data.approachCopy))errors.push('Repeated manifesto slogan');
      const hubs=['seo','google-ads','horoshop','service-websites','web-development','analytics','online-store-development'];
      const expected=['hero','problems','approach',...(hubs.includes(slug)?['catalog']:[]),'work','result','terms','faq','cta'];
      const actual=data.stages.map(e=>e.key);
      if(JSON.stringify(actual)!==JSON.stringify(expected)||data.stages.some(e=>!e.visible||e.text<20))errors.push('UA v2 stage order '+JSON.stringify({expected,actual}));
      if(data.stages.some((e,i)=>i&&e.top<data.stages[i-1].top-4))errors.push('UA v2 visual stage order '+JSON.stringify(data.stages.map(e=>[e.key,e.top])));
      if(hubs.includes(slug)&&!(data.stages.find(e=>e.key==='catalog')?.catalog.length>=4))errors.push('UA v2 category catalogue missing or incomplete');
     }else if(data.stages.length)errors.push('UA v2 stages leaked onto editorial route');
     if(runtime.length)errors.push(...runtime.map(e=>'JS: '+e));
     // Capture actual hero and a representative lower content block, including any failing URL.
     if(viewport.width<=390||selected.has(slug)||errors.length){
      const name=(slug||'home').replaceAll('/','-')+'-'+viewport.width;
      await page.screenshot({path:path.join(out,name+'.jpg'),type:'jpeg',quality:78,animations:'disabled',timeout:15000});
      const section=page.locator('[data-ua-stage="problems"]').first();
      if(await section.count()){await section.scrollIntoViewIfNeeded({timeout:5000});await page.screenshot({path:path.join(out,name+'-content.jpg'),type:'jpeg',quality:78,animations:'disabled',timeout:15000});}
     }
    }catch(e){errors.push(String(e));}
    console.log((errors.length?'FAIL':'PASS')+' '+viewport.width+' /'+slug+' '+errors.join(' | '));
   }
   await ctx.close();
  };
  if(local)await Promise.all(viewports.map(checkViewport));
  else for(const viewport of viewports){if(blocked>=3)break;await checkViewport(viewport);}
 }finally{await browser.close();}
 // Compare actual rendered headings across all commercial pages at each width.
 for(const viewport of viewports){
  const headings=new Map();
  for(const report of reports.filter(r=>r.viewport===viewport.width&&!editorial.has(r.slug)&&r.data?.approachHeading)){
   const key=report.data.approachHeading.toLocaleLowerCase('uk');
   if(headings.has(key))report.errors.push('Duplicate approach heading also used on /'+headings.get(key)+'/');
   else headings.set(key,report.slug);
  }
 }
 // Exact rendered metadata duplicates.
 for(const field of ['title','description']){
  const seen=new Map();
  for(const r of reports.filter(r=>r.viewport===1440&&r.status===200&&r.data?.[field])){
   const key=r.data[field].normalize('NFKC').toLocaleLowerCase('uk').replace(/\s+/g,' ').trim();
   if(seen.has(key))r.errors.push('Duplicate '+field+' also on /'+seen.get(key)+'/');
   else seen.set(key,r.slug);
  }
 }
 const failures=reports.filter(r=>r.errors.length);
 const incomplete=routes.length*viewports.length-reports.length;
 const solutions=reports.filter(r=>r.viewport===1440&&!editorial.has(r.slug)).flatMap(r=>(r.data?.readablePairs||[]).map(p=>({slug:r.slug,title:p.title,answer:p.answer})));
 const exactSolutionGroups=Object.values(solutions.reduce((m,p)=>{if(p.answer)(m[p.answer]??=[]).push(p.slug);return m;},Object.create(null))).filter(g=>new Set(g).size>1);
 // Text similarity screening: compare content rather than shared header/menu/card labels.
 const pages=reports.filter(r=>r.viewport===1440&&r.content);
 const normalize=s=>s.toLocaleLowerCase('uk').normalize('NFKC').replace(/[^\p{L}\p{N}\s]/gu,' ').replace(/\s+/g,' ').trim();
 const paragraphs=new Map();
 for(const r of pages)for(const p of new Set(r.content.paragraphs.map(normalize))){if(!paragraphs.has(p))paragraphs.set(p,[]);paragraphs.get(p).push(r.slug);}
 const duplicateParagraphs=[...paragraphs].filter(([p,slugs])=>slugs.length>1).map(([text,slugs])=>({text,slugs}));
 const shingles=r=>{const w=normalize(r.content.paragraphs.join(' ')).split(' '),s=new Set();for(let i=0;i+2<w.length;i++)s.add(w.slice(i,i+3).join(' '));return s;};
 const sets=pages.map(shingles),nearDuplicatePairs=[];
 for(let i=0;i<pages.length;i++)for(let j=i+1;j<pages.length;j++){const a=sets[i],b=sets[j];if(!a.size||!b.size)continue;let overlap=0;for(const v of a)if(b.has(v))overlap++;const similarity=overlap/(a.size+b.size-overlap);if(similarity>=.25)nearDuplicatePairs.push({a:pages[i].slug,b:pages[j].slug,similarity:Math.round(similarity*1000)/1000});}
 nearDuplicatePairs.sort((a,b)=>b.similarity-a.similarity);
 const summary={routes:routes.length,views:reports.length,failed:failures.length,incomplete,solutionCount:solutions.length,exactSolutionGroups,duplicateParagraphs,nearDuplicatePairs,failures,reports};
 await fsp.writeFile(path.join(out,'report.json'),JSON.stringify(summary,null,2));
 console.log('UA QA: '+routes.length+' routes, '+reports.length+' views, '+failures.length+' failed');
 if(incomplete)console.error('Coverage incomplete: '+incomplete+' views not attempted after repeated server blocks');
 if(failures.length||incomplete)process.exitCode=1;
})().catch(e=>{console.error(e);process.exitCode=1;});
