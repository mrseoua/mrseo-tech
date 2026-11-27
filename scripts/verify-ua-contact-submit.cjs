/* Real HTTP form submission to isolated WordPress; intercepted mail only. */
'use strict';
const fs=require('node:fs');
const assert=require('node:assert/strict');
const {chromium}=require('playwright');
const origin=process.env.MRSEO_TEST_ORIGIN;
const capture=process.env.MRSEO_MAIL_CAPTURE;
assert.equal(new URL(origin).origin,'http://127.0.0.1:8080');
assert.equal(capture,'/tmp/mrseo-ci-mail.json');
const read=()=>fs.existsSync(capture)?JSON.parse(fs.readFileSync(capture,'utf8')):[];
(async()=>{
 const browser=await chromium.launch({headless:true});
 try{
  const ctx=await browser.newContext();
  const page=await ctx.newPage();
  const response=await page.goto(origin+'/contact/',{waitUntil:'domcontentloaded'});
  assert.equal(response.status(),200);
  const form=page.locator('form').filter({has:page.locator('input[name="action"][value="mrseo_contact"]')});
  assert.equal(await form.count(),1);
  const action=await form.getAttribute('action');
  const endpoint=new URL(action,origin);
  assert.equal(endpoint.origin,origin);
  assert.equal(endpoint.pathname,'/wp-admin/admin-post.php');
  const nonce=await form.locator('[name="mrseo_nonce"]').inputValue();
  assert.ok(nonce);
  const payload={action:'mrseo_contact',mrseo_nonce:nonce,mrseo_lang:'uk',contact_name:'CI test',contact_email:'qa@example.invalid',contact_site:'https://example.invalid/',contact_message:'CI contact validation, no real mail delivery.',contact_company_extra:''};
  const send=async(overrides={})=>{
   const r=await ctx.request.post(endpoint.href,{form:{...payload,...overrides},maxRedirects:0});
   assert.ok([302,303].includes(r.status()),'Unexpected form status '+r.status());
   const dest=new URL(r.headers().location,origin);
   assert.equal(dest.origin,origin);
   assert.equal(dest.pathname,'/contact/');
   return dest.searchParams.get('message_status');
  };
  assert.equal(await send({mrseo_nonce:'invalid'}),'invalid');
  assert.equal(await send({contact_email:'not-an-email'}),'invalid');
  assert.equal(await send({contact_company_extra:'bot'}),null);
  assert.equal(read().length,0,'Invalid/honeypot submission reached wp_mail');
  assert.equal(await send(),'sent');
  const records=read();
  assert.equal(records.length,1);
  const mail=records[0];
  assert.ok([].concat(mail.to).includes('hello@mrseo.tech'));
  assert.ok(mail.subject.includes('[UK]'));
  assert.ok(mail.message.includes(payload.contact_message));
  assert.ok([].concat(mail.headers).join('\n').includes('Reply-To: '+payload.contact_email));
  assert.equal(await send(),'error','Rate limiting failed');
  assert.equal(read().length,1);
  console.log('PASS: actual local form POST, nonce, invalid email, honeypot, mail payload and rate limiting. External delivery NOT tested.');
 }finally{await browser.close();}
})().catch(e=>{console.error(e);process.exitCode=1;});
