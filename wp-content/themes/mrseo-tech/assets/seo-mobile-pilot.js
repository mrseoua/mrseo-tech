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
 const accent=root.querySelector('.pt-home-title em');
 const cta=root.querySelector('.pt-home-cta');
 const caption=root.querySelector('.pt-home-caption');
 const originalAccent=accent.textContent, originalCta=cta.textContent;
 const captionText=Array.from(caption.childNodes).find(n=>n.nodeType===3&&n.textContent.trim());
 const originalCaption=captionText?.textContent;
 const copies=[
  ['Сайт не видно в Google','Знаходимо та виправляємо перешкоди для показу сторінок у пошуку.'],
  ['Бракує потрібних сторінок','Створюємо категорії та сторінки послуг під реальні запити клієнтів.'],
  ['Є переходи, немає заявок','Перевіряємо сторінки та спрощуємо шлях від пошуку до звернення.']
 ];
 const pairs=Array.from(root.querySelectorAll('.seo-problem-list .seo-problem')).map((row,i)=>{
  const heading=row.querySelector('.ua-api-problem h3');
  const pain=row.querySelector('.ua-api-problem p');
  const answer=row.querySelector('.seo-problem-answer p');
  return {row,heading,pain,answer,originalHeading:heading.textContent,painHidden:pain.hidden,answerHidden:answer.hidden,copy:copies[i]};
 });
 let intro,details,more,anchor;
 let compactPairs=[];
 function compactProblem(pair,i){
  const {heading,pain,answer,copy}=pair;
  heading.textContent=copy[0];
  const brief=document.createElement('p');
  brief.className='seo-mobile-brief';
  brief.textContent=copy[1];
  answer.before(brief);
  const painId=pain.getAttribute('id'),answerId=answer.getAttribute('id');
  if(!pain.id)pain.id='seo-mobile-pain-'+i;
  if(!answer.id)answer.id='seo-mobile-answer-'+i;
  const button=document.createElement('button');
  button.type='button';
  button.className='seo-mobile-pair-more';
  button.setAttribute('aria-expanded','false');
  button.setAttribute('aria-controls',pain.id+' '+answer.id);
  button.setAttribute('aria-label','Деталі: '+copy[0]);
  button.textContent='Деталі +';
  answer.after(button);
  pain.hidden=answer.hidden=true;
  button.addEventListener('click',()=>{
   const open=button.getAttribute('aria-expanded')!=='true';
   button.setAttribute('aria-expanded',String(open));
   button.textContent=open?'Згорнути −':'Деталі +';
   button.setAttribute('aria-label',(open?'Згорнути: ':'Деталі: ')+copy[0]);
   pain.hidden=answer.hidden=!open;
   brief.hidden=open;
  });
  return {pair,brief,button,painId,answerId};
 }
 function restoreProblems(){
  compactPairs.forEach(({pair,brief,button,painId,answerId})=>{
   const {heading,pain,answer,originalHeading,painHidden,answerHidden}=pair;
   heading.textContent=originalHeading;
   pain.hidden=painHidden;answer.hidden=answerHidden;
   if(painId===null)pain.removeAttribute('id');else pain.id=painId;
   if(answerId===null)answer.removeAttribute('id');else answer.id=answerId;
   brief.remove();button.remove();
  });
  compactPairs=[];
 }
 const original=steps.map(p=>({p,id:p.getAttribute('id'),hidden:p.hidden}));
 function compact(){
  if(details)return;
  accent.textContent='Більше клієнтів.';
  cta.textContent='Обговорити SEO ↗';
  if(captionText)captionText.textContent='Оберіть напрям SEO.';
  compactPairs=pairs.map(compactProblem);
  anchor=document.createComment('original SEO lead');
  lead.before(anchor);
  intro=document.createElement('p');
  intro.className='seo-mobile-intro';
  intro.textContent='Знаходимо, чому ваш сайт не видно в Google, і допомагаємо це виправити.';
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
  accent.textContent=originalAccent;
  cta.textContent=originalCta;
  if(captionText)captionText.textContent=originalCaption;
  restoreProblems();
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
