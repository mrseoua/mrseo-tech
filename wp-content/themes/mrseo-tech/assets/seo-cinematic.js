/* Cinematic SEO: respect motion preferences across hero and retained lower SVG scenes. */
(()=>{'use strict';
const root=document.querySelector('.pti-page[data-pti-service="seo"]');if(!root)return;
const hero=root.querySelector('.seo-cine-art'),heroButton=hero?.querySelector('.seo-cine-motion');
if(!hero||!heroButton)return;
const reduced=window.matchMedia('(prefers-reduced-motion: reduce)');
const lower=[...root.querySelectorAll('svg.pti-lower-motion')];
const lowerButtons=[...root.querySelectorAll('.pti-lower-pause')];
let paused=false,heroVisible=true,frame=0;
const visible=e=>{const r=e.getBoundingClientRect();return r.width>0&&r.height>0&&r.bottom>0&&r.top<innerHeight&&r.right>0&&r.left<innerWidth};
const smil=(el,run)=>{if(!el||typeof el.pauseAnimations!=='function')return;try{if(run)el.unpauseAnimations();else el.pauseAnimations()}catch(_){}};
function sync(){
 const allowed=!paused&&!reduced.matches&&!document.hidden;
 root.classList.toggle('seo-cine-paused',!allowed||!heroVisible);
 heroButton.disabled=reduced.matches;
 heroButton.setAttribute('aria-pressed',String(paused));
 heroButton.setAttribute('aria-label',allowed?'Зупинити декоративну анімацію':'Відновити декоративну анімацію');
 heroButton.textContent=allowed?'Ⅱ':'▶';
 lowerButtons.forEach(btn=>{btn.disabled=reduced.matches;btn.setAttribute('aria-pressed',String(paused));btn.textContent=paused||reduced.matches?'Увімкнути рух':'Призупинити рух'});
 lower.forEach(svg=>smil(svg,allowed&&visible(svg)));
}
function schedule(){if(frame)return;frame=requestAnimationFrame(()=>{frame=0;sync()})}
function toggle(){paused=!paused;sync()}
heroButton.addEventListener('click',toggle);
lowerButtons.forEach(btn=>btn.addEventListener('click',toggle));
document.addEventListener('visibilitychange',sync);
window.addEventListener('scroll',schedule,{passive:true});
window.addEventListener('resize',schedule,{passive:true});
if(reduced.addEventListener)reduced.addEventListener('change',sync);else reduced.addListener(sync);
if('IntersectionObserver' in window){const io=new IntersectionObserver(entries=>{for(const entry of entries)if(entry.target===hero)heroVisible=entry.isIntersecting;schedule()},{threshold:0});io.observe(hero);lower.forEach(svg=>io.observe(svg))}
sync();
})();
