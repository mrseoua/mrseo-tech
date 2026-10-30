/* Horoshop interactive SEO explainer — scoped to two localized Horoshop pages. */
(()=>{'use strict';
const root=document.querySelector('.special-hero-horoshop .hs-visual');
if(!root)return;
const buttons=[...root.querySelectorAll('[data-hs-step]')];
const title=root.querySelector('[data-hs-detail-title]');
const detail=root.querySelector('[data-hs-detail]');
const browserTitle=root.querySelector('[data-hs-browser-title]');
const browserAddress=root.querySelector('[data-hs-address]:not(button)');
const orbitLabel=root.querySelector('[data-hs-stage-label]');
const zone=root.querySelector('.hs-browser-zone');
if(buttons.length!==3||!title||!detail||!browserTitle||!browserAddress||!orbitLabel||!zone)return;
const motion=window.matchMedia('(prefers-reduced-motion: reduce)');
let active=0, timer=null, paused=false;
function select(index){
  if(index<0||index>=buttons.length)return;
  active=index;
  const btn=buttons[index];
  buttons.forEach((button,i)=>{const yes=i===index;button.classList.toggle('is-active',yes);button.setAttribute('aria-pressed',String(yes))});
  title.textContent=btn.dataset.hsTitle||'';
  detail.textContent=btn.dataset.hsDescription||'';
  browserTitle.textContent=btn.dataset.hsBrowser||'';
  browserAddress.textContent=btn.dataset.hsAddress||'';
  orbitLabel.textContent=btn.dataset.hsOrbit||'';
  zone.dataset.hsScenario=String(index);
}
function stop(){if(timer!==null){clearInterval(timer);timer=null}}
function play(){
  stop();
  if(paused||motion.matches||document.hidden)return;
  timer=setInterval(()=>{if(!document.hidden&&!paused)select((active+1)%buttons.length)},5500);
}
buttons.forEach((button,i)=>{
  button.addEventListener('click',()=>{paused=true;stop();select(i)});
  button.addEventListener('focus',()=>{paused=true;stop()});
});
root.addEventListener('pointerenter',()=>{paused=true;stop()});
root.addEventListener('pointerleave',()=>{if(!root.contains(document.activeElement)){paused=false;play()}});
root.addEventListener('focusin',()=>{paused=true;stop()});
root.addEventListener('focusout',event=>{if(!root.contains(event.relatedTarget)){paused=false;play()}});
motion.addEventListener?.('change',()=>{if(motion.matches)stop();else play()});
document.addEventListener('visibilitychange',()=>{if(document.hidden)stop();else play()});
if('IntersectionObserver' in window){
  const observer=new IntersectionObserver(entries=>{if(!entries[0].isIntersecting)stop();else play()},{threshold:.16});
  observer.observe(root);
}
select(0);play();
})();