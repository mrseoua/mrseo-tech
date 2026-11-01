/* MrSeo service motion — three genuine UI states, animated without synthetic performance metrics. */
(()=>{'use strict';
const scenes=[...document.querySelectorAll('.ms-scene[data-ms-scene]')];
if(!scenes.length)return;
const reduced=window.matchMedia('(prefers-reduced-motion: reduce)');
scenes.forEach(root=>{
 const buttons=[...root.querySelectorAll('[data-ms-tab]')];
 const caption=root.querySelector('[data-ms-description]');
 const index=root.querySelector('[data-ms-index]');
 if(buttons.length!==3||!caption||!index)return;
 const initial=caption.textContent;
 let current=0,timer=null,pauseUntil=0,visible=true,interacting=false;
 function select(n,manual=false){
  current=(n+3)%3;
  root.dataset.msActive=String(current);
  buttons.forEach((button,i)=>{
   const chosen=i===current;
   button.classList.toggle('is-active',chosen);
   button.setAttribute('aria-pressed',String(chosen));
  });
  index.textContent='0'+(current+1)+' / 03';
  caption.textContent=manual||current>0?buttons[current].dataset.msCaption||initial:initial;
  if(manual)pauseUntil=Date.now()+18000;
 }
 function stop(){if(timer!==null){clearInterval(timer);timer=null}}
 function maybePlay(){
  stop();
  if(document.hidden||!visible||reduced.matches||interacting)return;
  timer=setInterval(()=>{
   if(Date.now()<pauseUntil)return;
   select(current+1);
  },5400);
 }
 buttons.forEach((button,i)=>{
  button.addEventListener('click',()=>{select(i,true);maybePlay()});
  button.addEventListener('keydown',e=>{
   let next=e.key==='ArrowRight'||e.key==='ArrowDown'?i+1:e.key==='ArrowLeft'||e.key==='ArrowUp'?i-1:e.key==='Home'?0:e.key==='End'?2:null;
   if(next===null)return;
   e.preventDefault();
   next=(next+3)%3;
   select(next,true);
   buttons[next].focus();
  });
 });
 root.addEventListener('mouseenter',()=>{interacting=true;stop()});
 root.addEventListener('mouseleave',()=>{interacting=false;maybePlay()});
 root.addEventListener('focusin',()=>{interacting=true;stop()});
 root.addEventListener('focusout',e=>{if(!root.contains(e.relatedTarget)){interacting=false;maybePlay()}});
 if('IntersectionObserver' in window)new IntersectionObserver(entries=>{visible=!!entries[0]?.isIntersecting;maybePlay()},{threshold:.15}).observe(root);
 document.addEventListener('visibilitychange',maybePlay);
 reduced.addEventListener?.('change',maybePlay);
 select(0);maybePlay();
});
})();
