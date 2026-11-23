/* Unified MrSeo.tech premium WebDev animations: same interaction language as
   /business-automation/, unique three-card SVG story for each of seven services.
   Visibility-aware animation, manual tabs, keyboard-operable pause, reduced motion. */
(function(){
 'use strict';
 const hero=document.querySelector('.udv-page .udv-visual-wrap[data-udv-scene]');
 if(!hero)return;
 const buttons=[...hero.querySelectorAll('.udv-story-step[data-udv-stage]')];
 const svg=hero.querySelector('svg.udv-kinetic-svg');
 const pause=hero.querySelector('.udv-motion-toggle');
 const caption=hero.querySelector('[data-udv-caption-text]');
 const index=hero.querySelector('[data-udv-index]');
 if(buttons.length!==3||!pause||!svg||!caption||!index)return;
 const reduce=window.matchMedia('(prefers-reduced-motion: reduce)');
 const conn=navigator.connection||navigator.mozConnection||navigator.webkitConnection;
 let step=0,timer=null,visible=false,manualPause=false;
 const motionRestricted=()=>reduce.matches||Boolean(conn&&conn.saveData);
 const stopped=()=>manualPause||motionRestricted()||!visible||document.hidden;
 function select(next){
  step=(next+buttons.length)%buttons.length;
  hero.dataset.udvStep=String(step);
  buttons.forEach((button,i)=>{
   button.setAttribute('aria-pressed',String(i===step));
   button.classList.toggle('is-current',i===step);
  });
  index.textContent=String(step+1).padStart(2,'0')+' / 03';
  caption.textContent=buttons[step].dataset.udvCaption||'';
 }
 function sync(){
  const shouldStop=stopped();
  if(shouldStop&&timer!==null){window.clearInterval(timer);timer=null;}
  else if(!shouldStop&&timer===null)timer=window.setInterval(()=>select(step+1),4200);
  if(typeof svg.pauseAnimations==='function'&&typeof svg.unpauseAnimations==='function'){
   if(shouldStop)svg.pauseAnimations();
   else svg.unpauseAnimations();
  }
  hero.dataset.udvPaused=String(shouldStop);
  pause.setAttribute('aria-pressed',String(manualPause));
  pause.disabled=motionRestricted();
  pause.textContent=motionRestricted()?'Рух вимкнено':(manualPause?'Увімкнути рух':'Призупинити рух');
 }
 buttons.forEach((button,i)=>{
  button.addEventListener('click',()=>{
   select(i);
   // Clicking a stage keeps the illustration focused on the chosen explanation.
   manualPause=true;
   sync();
  });
 });
 pause.addEventListener('click',()=>{manualPause=!manualPause;sync();});
 const observer='IntersectionObserver' in window?
  new IntersectionObserver(entries=>{
   visible=entries.some(entry=>entry.isIntersecting);
   sync();
  },{threshold:.12}):null;
 if(observer)observer.observe(hero);else visible=true;
 document.addEventListener('visibilitychange',sync,{passive:true});
 if(typeof reduce.addEventListener==='function')reduce.addEventListener('change',sync);
 else if(typeof reduce.addListener==='function')reduce.addListener(sync);
 if(conn&&typeof conn.addEventListener==='function')conn.addEventListener('change',sync);
 window.addEventListener('pagehide',()=>{
  visible=false;sync();if(observer)observer.disconnect();
 },{once:true});
 const root=document.querySelector('.udv-page');
 if(root&&!motionRestricted()&&'IntersectionObserver' in window){
  const items=[...root.querySelectorAll('.udv-card,.udv-step,.udv-result,.udv-faq-list details')];
  items.forEach(item=>item.classList.add('udv-reveal'));
  const reveal=new IntersectionObserver(entries=>{
   entries.forEach(entry=>{
    if(entry.isIntersecting){
     entry.target.classList.add('udv-inview');
     reveal.unobserve(entry.target);
    }
   });
  },{threshold:.12,rootMargin:'0px 0px -20px 0px'});
  items.forEach(item=>reveal.observe(item));
 }
 select(0);sync();
})();
