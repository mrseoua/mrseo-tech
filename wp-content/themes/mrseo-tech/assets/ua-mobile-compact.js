/* Progressive disclosure only for explanatory paragraphs, never for solutions,
   prices, conditions, legal text, form fields or the homepage's protected hero.
   Full original HTML stays available without JavaScript and on desktop. */
(()=>{
 'use strict';
 if(document.documentElement.lang!=='uk-UA')return;
 const media=matchMedia('(max-width: 680px)');
 const records=[];
 let serial=0;
 function disclose(p,summary,label){
  if(!p||p.hidden||p.childElementCount||p.closest('details,[aria-hidden="true"],.seo-hub'))return;
  const original=p.textContent.trim();
  if(!original)return;
  const rect=p.getBoundingClientRect();
  // Don't add a toggle that takes more space than the original content.
  if(rect.height<82||getComputedStyle(p).display==='none')return;
  const id=p.getAttribute('id'),hidden=p.hidden;
  if(!p.id)p.id='mrseo-mobile-detail-'+(++serial);
  let brief=null;
  if(summary){
   brief=document.createElement('p');
   brief.className='ua-mobile-summary';
   brief.textContent=summary;
   p.before(brief);
  }
  const btn=document.createElement('button');
  btn.type='button';btn.className='ua-mobile-detail-toggle';
  btn.textContent=label+' +';
  btn.setAttribute('aria-controls',p.id);
  btn.setAttribute('aria-expanded','false');
  p.after(btn);
  p.classList.add('ua-mobile-optional');p.hidden=true;
  btn.addEventListener('click',()=>{
   const open=btn.getAttribute('aria-expanded')!=='true';
   btn.setAttribute('aria-expanded',String(open));
   btn.textContent=open?'Згорнути −':label+' +';
   p.hidden=!open;if(brief)brief.hidden=open;
  });
  records.push({p,btn,brief,id,hidden});
 }
 function compact(){
  if(records.length)return;
  // Keep each problem heading and its complete solution visible.
  const pains=document.querySelectorAll('[data-ua-stage="problems"] :is(.ua-paired-problem,.ua-api-problem,.local-ref-pain,.ads-problem-copy,.service-problem-copy)>p');
  pains.forEach(p=>disclose(p,null,'Деталі проблеми'));
  // Exact complete first sentence of a long service introduction, no generated claims.
  // Only collapse when the rest is substantial. Original text is one click away.
  const leads=document.querySelectorAll('[data-ua-stage="hero"] :is(.pti-hero-copy>.pti-lead,.pt-home-copy>.pt-home-lead,.hs-premium-lead)');
  leads.forEach(p=>{
   const text=p.textContent.trim();
   if(text.length<190||typeof Intl.Segmenter!=='function')return;
   const first=Array.from(new Intl.Segmenter('uk',{granularity:'sentence'}).segment(text))[0]?.segment.trim();
   if(first&&first.length>=35&&first.length<=125&&text.length-first.length>=100)disclose(p,first,'Докладніше');
  });
 }
 function restore(){
  records.splice(0).forEach(({p,btn,brief,id,hidden})=>{
   p.hidden=hidden;p.classList.remove('ua-mobile-optional');
   if(id===null)p.removeAttribute('id');else p.id=id;
   btn.remove();if(brief)brief.remove();
  });
 }
 const apply=()=>media.matches?compact():restore();
 if(media.addEventListener)media.addEventListener('change',apply);else media.addListener(apply);
 // Measure with loaded fonts and styles; avoid folding short lines prematurely.
 if(document.readyState==='complete')apply();else window.addEventListener('load',apply,{once:true});
})();
