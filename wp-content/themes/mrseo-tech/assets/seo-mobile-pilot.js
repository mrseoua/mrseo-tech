/* Progressive disclosure: original text remains in HTML and accessible.
 * No changes on desktop; restore original DOM if the viewport becomes wider.
 */
(()=>{
 'use strict';
 const root=document.querySelector('html[lang="uk-UA"] .pti-page[data-pti-service="seo"] .seo-hub');
 if(!root)return;
 const media=window.matchMedia('(max-width: 680px)');
 const lead=root.querySelector('.category-home .pt-home-lead');
 const board=root.querySelector('.seo-plan-board');
 const steps=Array.from(root.querySelectorAll('.seo-plan-step>p'));
 if(!lead||!board||steps.length!==3)return;
 let intro,details,more,anchor;
 const original=steps.map(p=>({p,id:p.getAttribute('id'),hidden:p.hidden}));
 function compact(){
  if(details)return;
  anchor=document.createComment('original SEO lead');
  lead.before(anchor);
  intro=document.createElement('p');
  intro.className='seo-mobile-intro';
  intro.textContent='Допоможемо клієнтам знаходити ваш сайт у Google. Почнемо з перевірки сайту та пошукового попиту.';
  details=document.createElement('details');
  details.className='seo-mobile-disclosure';
  const summary=document.createElement('summary');
  summary.textContent='Докладніше про SEO';
  details.append(summary);
  anchor.after(intro,details);
  details.append(lead);
  more=document.createElement('button');
  more.type='button';
  more.className='seo-mobile-more';
  more.textContent='Докладніше про етапи роботи +';
  more.setAttribute('aria-expanded','false');
  const ids=original.map(({p},i)=>{
   if(!p.id)p.id='seo-mobile-step-detail-'+(i+1);
   p.hidden=true;
   return p.id;
  });
  more.setAttribute('aria-controls',ids.join(' '));
  board.querySelector('.seo-plan-steps').after(more);
  more.addEventListener('click',()=>{
   const open=more.getAttribute('aria-expanded')!=='true';
   more.setAttribute('aria-expanded',String(open));
   more.textContent=open?'Згорнути деталі −':'Докладніше про етапи роботи +';
   steps.forEach(p=>{p.hidden=!open;});
  });
 }
 function restore(){
  if(!details)return;
  anchor.after(lead);
  anchor.remove();intro.remove();details.remove();more.remove();
  original.forEach(({p,id,hidden})=>{
   p.hidden=hidden;
   if(id===null)p.removeAttribute('id');else p.id=id;
  });
  intro=details=more=anchor=null;
 }
 const apply=()=>media.matches?compact():restore();
 if(media.addEventListener)media.addEventListener('change',apply);else media.addListener(apply);
 apply();
})();
