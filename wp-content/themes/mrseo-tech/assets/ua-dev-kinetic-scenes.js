/* MrSeo.tech UA-only WebDev storyboards: 3 business-process stages per scene.
   One light timer while visible; no canvas/WebGL, no external requests. */
(function(){
 'use strict';
 const visual=document.querySelector('.udv-visual[data-udv-scene]');
 if(!visual)return;
 const stages=[...visual.querySelectorAll('[data-udv-stage]')];
 const button=visual.querySelector('.udv-motion-toggle');
 if(stages.length!==3||!button)return;
 const reduced=window.matchMedia('(prefers-reduced-motion: reduce)');
 const conn=navigator.connection||navigator.mozConnection||navigator.webkitConnection;
 let step=0,interval=null,visible=false,manualPause=false;
 function setStep(next){
  step=next%stages.length;
  visual.dataset.udvStep=String(step);
  stages.forEach((item,i)=>item.classList.toggle('is-current',i===step));
 }
 function stopped(){
  return manualPause||reduced.matches||Boolean(conn&&conn.saveData)||!visible||document.hidden;
 }
 function sync(){
  const paused=stopped();
  if(paused&&interval!==null){window.clearInterval(interval);interval=null;}
  if(!paused&&interval===null)interval=window.setInterval(()=>setStep(step+1),3300);
  visual.dataset.udvPaused=String(paused);
  button.setAttribute('aria-pressed',String(manualPause));
  button.setAttribute('aria-label',manualPause?'Відновити демонстрацію':'Призупинити демонстрацію');
  button.innerHTML=manualPause?'Відтворити <span aria-hidden="true">▶</span>':'Пауза <span aria-hidden="true">Ⅱ</span>';
 }
 button.addEventListener('click',()=>{manualPause=!manualPause;sync();});
 const observer=('IntersectionObserver' in window)?new IntersectionObserver(entries=>{
  visible=entries.some(e=>e.isIntersecting);
  sync();
 },{rootMargin:'0px',threshold:.12}):null;
 if(observer)observer.observe(visual);
 else {visible=true;sync();}
 document.addEventListener('visibilitychange',sync,{passive:true});
 if(typeof reduced.addEventListener==='function')reduced.addEventListener('change',()=>{
  if(reduced.matches)setStep(0);
  sync();
 });
 else if(typeof reduced.addListener==='function')reduced.addListener(()=>{if(reduced.matches)setStep(0);sync();});
 if(conn&&typeof conn.addEventListener==='function')conn.addEventListener('change',sync);
 window.addEventListener('pagehide',()=>{visible=false;sync();if(observer)observer.disconnect();},{once:true});
 // Below-the-fold narrative enters once; existing content stays visible without JS.
 // IntersectionObserver only animates transform/opacity, never page geometry.
 const root=document.querySelector('.udv-page');
 if(root&&!reduced.matches&&!(conn&&conn.saveData)&&'IntersectionObserver' in window){
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
 setStep(0);
 sync();
})();
