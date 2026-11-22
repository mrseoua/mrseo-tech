/* Horoshop premium scenes: three-step interactive motion + lightweight scroll reveal. */
(()=>{'use strict';
const root=document.querySelector('.hs-premium[data-hs-premium]');
if(!root)return;
const visual=root.querySelector('.hs-premium-visual');
const stages=[...root.querySelectorAll('.hs-premium-stage-button[data-hs-stage]')];
const description=root.querySelector('[data-hs-stage-description]');
const reduced=window.matchMedia('(prefers-reduced-motion: reduce)');
if(!visual||stages.length!==3||!description)return;
let messages=[];
try{messages=JSON.parse(description.dataset.hsStageText||'[]');}catch(e){return;}
if(messages.length!==3)return;
let active=0,visible=false,interval=null,manualUntil=0;
function stop(){if(interval!==null){window.clearInterval(interval);interval=null;}}
function show(index){
 active=(index+3)%3;
 visual.dataset.hsActiveStage=String(active);
 stages.forEach((button,i)=>{
  const on=i===active;
  button.classList.toggle('is-active',on);
  button.setAttribute('aria-pressed',String(on));
 });
 description.textContent=messages[active];
}
function tick(){
 if(!visible||reduced.matches||document.hidden)return;
 if(Date.now()<manualUntil||root.contains(document.activeElement))return;
 show(active+1);
}
function sync(){
 stop();
 const playing=visible&&!reduced.matches&&!document.hidden;
 visual.dataset.hsMotionPaused=String(!playing);
 const svg=visual.querySelector('svg');
 if(playing)svg?.unpauseAnimations?.();
 else svg?.pauseAnimations?.();
 if(playing)interval=window.setInterval(tick,4300);
}
stages.forEach((button,i)=>{
 button.addEventListener('click',()=>{manualUntil=Date.now()+18000;show(i);});
 button.addEventListener('keydown',e=>{
  const target=e.key==='ArrowRight'||e.key==='ArrowDown'?i+1:e.key==='ArrowLeft'||e.key==='ArrowUp'?i-1:e.key==='Home'?0:e.key==='End'?2:null;
  if(target===null)return;
  e.preventDefault();
  const next=(target+3)%3;
  manualUntil=Date.now()+18000;show(next);stages[next].focus();
 });
});
reduced.addEventListener?.('change',sync);
document.addEventListener('visibilitychange',sync);
visual.addEventListener('focusin',stop);
visual.addEventListener('focusout',()=>sync());
if('IntersectionObserver' in window){
 new IntersectionObserver(entries=>{visible=entries.some(x=>x.isIntersecting);sync();},{threshold:.15}).observe(visual);
}else{visible=true;sync();}
const targets=[...root.querySelectorAll('.hs-premium-head,.hs-premium-step,.hs-premium-outcome-grid,.hs-premium-faq-grid,.hs-premium-related-grid,.hs-premium-final .hs-premium-wrap')];
if('IntersectionObserver' in window&&!reduced.matches){
 const observer=new IntersectionObserver(entries=>{
  entries.forEach(entry=>{if(!entry.isIntersecting)return;entry.target.classList.add('hs-premium-in-view');observer.unobserve(entry.target);});
 },{threshold:.08,rootMargin:'0px 0px 45px 0px'});
 targets.forEach(node=>{node.classList.add('hs-premium-reveal');observer.observe(node);});
}else{targets.forEach(node=>node.classList.add('hs-premium-in-view'));}
show(0);
})();
