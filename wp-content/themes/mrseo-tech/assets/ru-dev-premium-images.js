/* Lightweight image-based stage motion. No canvas, no WebGL, no network requests. */
(function(){
 'use strict';
 const root=document.querySelector('.udv-page');
 const hero=root?.querySelector('.udv-visual-wrap[data-udv-scene]');
 if(!hero)return;
 const tabs=[...hero.querySelectorAll('.udv-story-step[data-udv-stage]')];
 const pause=hero.querySelector('.udv-motion-toggle');
 const caption=hero.querySelector('[data-udv-caption-text]');
 const index=hero.querySelector('[data-udv-index]');
 const detail=[...root.querySelectorAll('.udv-lower-graphic[data-udv-lower]')];
 if(tabs.length!==3||!pause||!caption||!index)return;
 const motionPreference=window.matchMedia('(prefers-reduced-motion: reduce)');
 const network=navigator.connection||navigator.mozConnection||navigator.webkitConnection;
 let step=0,interval=null,visible=false,paused=false;
 const visibleDetail=new Set();
 const limitMotion=()=>motionPreference.matches||Boolean(network&&network.saveData);
 const stop=()=>paused||limitMotion()||!visible||document.hidden;
 function select(value){
  step=(value+tabs.length)%tabs.length;
  hero.dataset.udvStep=String(step);
  tabs.forEach((button,i)=>{
   button.setAttribute('aria-pressed',String(i===step));
   button.classList.toggle('is-current',i===step);
  });
  index.textContent=String(step+1).padStart(2,'0')+' / 03';
  caption.textContent=tabs[step].dataset.udvCaption||'';
 }
 function sync(){
  if(stop()&&interval!==null){clearInterval(interval);interval=null;}
  if(!stop()&&interval===null)interval=setInterval(()=>select(step+1),4500);
  hero.dataset.udvPaused=String(stop());
  pause.disabled=limitMotion();
  pause.setAttribute('aria-pressed',String(paused));
  pause.textContent=limitMotion()?'Анимация отключена':(paused?'Возобновить анимацию':'Приостановить анимацию');
  detail.forEach(card=>{
   const isVisible=visibleDetail.has(card);
   card.dataset.udvLowerVisible=String(isVisible);
   card.dataset.udvLowerPaused=String(paused||limitMotion()||document.hidden||!isVisible);
  });
 }
 tabs.forEach((tab,i)=>tab.addEventListener('click',()=>{select(i);paused=true;sync();}));
 pause.addEventListener('click',()=>{paused=!paused;sync();});
 const io='IntersectionObserver' in window?new IntersectionObserver(items=>{
  visible=items.some(i=>i.isIntersecting);sync();
 },{threshold:.12}):null;
 if(io)io.observe(hero);else visible=true;
 const lowerIo='IntersectionObserver' in window?new IntersectionObserver(items=>{
  items.forEach(item=>{
   if(item.isIntersecting)visibleDetail.add(item.target);
   else visibleDetail.delete(item.target);
  });sync();
 },{threshold:.10}):null;
 if(lowerIo)detail.forEach(card=>lowerIo.observe(card));else detail.forEach(card=>visibleDetail.add(card));
 document.addEventListener('visibilitychange',sync,{passive:true});
 if(typeof motionPreference.addEventListener==='function')motionPreference.addEventListener('change',sync);
 else if(typeof motionPreference.addListener==='function')motionPreference.addListener(sync);
 if(network&&typeof network.addEventListener==='function')network.addEventListener('change',sync);
 window.addEventListener('pagehide',()=>{
  visible=false;sync();io?.disconnect();lowerIo?.disconnect();
 },{once:true});
 if(!limitMotion()&&'IntersectionObserver' in window){
  const cards=[...root.querySelectorAll('.udv-card,.udv-step,.udv-result,.udv-faq-list details')];
  cards.forEach(card=>card.classList.add('udv-reveal'));
  const reveal=new IntersectionObserver(entries=>{
   entries.forEach(entry=>{if(entry.isIntersecting){entry.target.classList.add('udv-inview');reveal.unobserve(entry.target);}});
  },{threshold:.12,rootMargin:'0px 0px -20px 0px'});
  cards.forEach(card=>reveal.observe(card));
 }
 select(0);sync();
})();
