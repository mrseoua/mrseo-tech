/* Cinematic Services 02 — progressive enhancement; 5 server-rendered service panels remain accessible without JS. */
(()=>{'use strict';
 const root=document.querySelector('[data-cs-showcase]');if(!root)return;
 const tabs=[...root.querySelectorAll('[data-cs-select]')],panels=[...root.querySelectorAll('[data-cs-panel]')];
 const counter=root.querySelector('[data-cs-current]'),progress=root.querySelector('[data-cs-progress]');
 const prev=root.querySelector('[data-cs-previous]'),next=root.querySelector('[data-cs-next]');
 const reduce=window.matchMedia('(prefers-reduced-motion: reduce)');
 if(tabs.length!==5||panels.length!==5||!counter||!progress||!prev||!next)return;
 let active=0;
 function select(index,focus=false){
  active=(index+tabs.length)%tabs.length;
  tabs.forEach((tab,i)=>{
   const on=i===active;
   tab.classList.toggle('is-active',on);
   tab.setAttribute('aria-pressed',String(on));
   tab.setAttribute('aria-expanded',String(on));
   tab.setAttribute('tabindex',on?'0':'-1');
  });
  panels.forEach((panel,i)=>{
   const on=i===active;panel.classList.toggle('is-active',on);
   panel.hidden=!on;
   panel.setAttribute('aria-hidden',String(!on));
  });
  counter.textContent=String(active+1).padStart(2,'0');
  progress.style.width=((active+1)/tabs.length*100)+'%';
  if(focus)tabs[active].focus({preventScroll:true});
 }
 tabs.forEach((tab,i)=>{
  tab.addEventListener('click',()=>select(i));
  tab.addEventListener('keydown',e=>{
   let target=null;
   if(e.key==='ArrowDown'||e.key==='ArrowRight')target=i+1;
   else if(e.key==='ArrowUp'||e.key==='ArrowLeft')target=i-1;
   else if(e.key==='Home')target=0;
   else if(e.key==='End')target=tabs.length-1;
   if(target!==null){e.preventDefault();select(target,true)}
  });
 });
 prev.addEventListener('click',()=>select(active-1));
 next.addEventListener('click',()=>select(active+1));
 // Disable visual motion outside viewport, in background tabs, and for reduced-motion preference.
 const syncMotion=()=>{
  const visible=root.dataset.csVisible!=='false'&&!document.hidden&&!reduce.matches;
  root.classList.toggle('cs-motion-off',!visible);
 };
 if('IntersectionObserver'in window){
  new IntersectionObserver(entries=>{root.dataset.csVisible=entries[0].isIntersecting?'true':'false';syncMotion()},{threshold:.05}).observe(root);
 }
 document.addEventListener('visibilitychange',syncMotion);
 if(reduce.addEventListener)reduce.addEventListener('change',syncMotion);
 select(0);
 root.classList.add('cs-enhanced');
 syncMotion();
})();