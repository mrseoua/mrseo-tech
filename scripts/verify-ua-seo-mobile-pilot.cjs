/* Verify mobile-only progressive disclosure on the isolated UA hub. */
'use strict';
const assert=require('node:assert/strict');
const {chromium}=require('playwright');
const origin=process.env.MRSEO_TEST_ORIGIN;
if(origin!=='http://127.0.0.1:8080')throw Error('Local preview only');
(async()=>{
 const browser=await chromium.launch({headless:true});
 try{
  const page=await browser.newPage({viewport:{width:1440,height:900},reducedMotion:'reduce'});
  const root=page.locator('.seo-hub');
  await page.goto(origin+'/seo/',{waitUntil:'load'});
  const lead=root.locator('.category-home .pt-home-lead');
  const original=await lead.textContent();
  const metadata=await page.evaluate(()=>[document.title,document.querySelector('meta[name="description"]')?.content,document.querySelector('link[rel="canonical"]')?.href]);
  const desktopH=await root.locator('h1').textContent();
  const desktopProblems=await root.locator('.seo-problem h3').allTextContents();
  const desktopAnswers=await root.locator('.seo-problem-answer p').allTextContents();
  const desktopCta=await root.locator('.pt-home-cta').textContent();
  assert.equal(await root.locator('.seo-mobile-disclosure').count(),0);
  assert.ok(await lead.isVisible());
  for(const width of [390,360]){
   await page.setViewportSize({width,height:844});
   const details=root.locator('.seo-mobile-disclosure');
   await details.waitFor();
   assert.match(await root.locator('h1').textContent(),/SEO-просування сайтів\..*Більше клієнтів\./);
   assert.equal(await root.locator('.pt-home-cta').textContent(),'Обговорити SEO ↗');
   assert.equal(await root.locator('.seo-mobile-brief:visible').count(),3);
   for(let i=0;i<3;i++){
    const pair=root.locator('.seo-problem').nth(i);
    const toggle=pair.locator('.seo-mobile-pair-more');
    const full=pair.locator('.seo-problem-answer p:not(.seo-mobile-brief)');
    assert.equal(await full.textContent(),desktopAnswers[i]);
    assert.equal(await full.isVisible(),false);
    await toggle.click();
    assert.ok(await full.isVisible());
    await toggle.click();
    assert.equal(await full.isVisible(),false);
   }
   const contact=page.locator('.mrseo-mobile-contact-bar');
   assert.ok((await contact.boundingBox()).width<width-30);
   await contact.locator('summary').click();
   assert.equal(await contact.locator('.mrseo-contact-ui-links a:visible').count(),3);
   await contact.locator('summary').click();
   assert.equal(await lead.textContent(),original);
   assert.equal(await lead.isVisible(),false);
   await details.locator('summary').click();
   assert.ok(await lead.isVisible());
   await details.locator('summary').click();
   const more=root.locator('.seo-mobile-more');
   assert.equal(await more.getAttribute('aria-expanded'),'false');
   await more.click();
   assert.equal(await root.locator('.seo-plan-step>p:visible').count(),3);
   await more.click();
   assert.equal(await root.locator('.seo-plan-step>p:visible').count(),0);
   assert.deepEqual(await page.evaluate(()=>[document.title,document.querySelector('meta[name="description"]')?.content,document.querySelector('link[rel="canonical"]')?.href]),metadata);
   assert.ok(await page.evaluate(()=>document.documentElement.scrollWidth<=innerWidth+3));
   await page.setViewportSize({width:1440,height:900});
   await details.waitFor({state:'detached'});
   assert.equal(await root.locator('h1').textContent(),desktopH);
   assert.equal(await root.locator('.pt-home-cta').textContent(),desktopCta);
   assert.deepEqual(await root.locator('.seo-problem h3').allTextContents(),desktopProblems);
   assert.deepEqual(await root.locator('.seo-problem-answer p').allTextContents(),desktopAnswers);
   assert.equal(await root.locator('.seo-mobile-brief,.seo-mobile-pair-more').count(),0);
   assert.ok(await lead.isVisible());
   assert.equal(await root.locator('.seo-plan-step>p:visible').count(),3);
  }
  await page.goto(origin+'/',{waitUntil:'load'});
  assert.equal(await page.locator('.seo-mobile-disclosure,.seo-mobile-more').count(),0);
  console.log('PASS: mobile SEO disclosure, original text and desktop restoration, metadata, overflow and homepage isolation.');
 }finally{await browser.close();}
})().catch(error=>{console.error(error);process.exitCode=1;});
