/* Compact Horoshop SEO demo: three genuinely interactive scenarios, UA/RU only. */
(()=>{'use strict';
const root=document.querySelector('.special-hero-horoshop .hs-showcase');
if(!root)return;
const buttons=[...root.querySelectorAll('[data-hs-step]')];
const demo=root.querySelector('.hs-demo');
const problem=root.querySelector('[data-hs-problem]');
const source=root.querySelector('[data-hs-source]');
const target=root.querySelector('[data-hs-target]');
const solution=root.querySelector('[data-hs-solution]');
const count=root.querySelector('[data-hs-count]');
if(!demo||!problem||!source||!target||!solution||!count||buttons.length!==3)return;
const reduce=window.matchMedia('(prefers-reduced-motion: reduce)');
let active=0,timer=null,manual=false,visible=true,hover=false,focus=false;
function select(i){
 if(i<0||i>=buttons.length)return;
 active=i;
 const button=buttons[i];
 buttons.forEach((el,index)=>{const selected=index===i;el.classList.toggle('is-active',selected);el.setAttribute('aria-pressed',String(selected))});
 problem.textContent=button.dataset.hsProblem||'';
 source.textContent=button.dataset.hsSource||'';
 target.textContent=button.dataset.hsTarget||'';
 solution.textContent=button.dataset.hsSolution||'';
 count.textContent=String(i+1).padStart(2,'0')+' / 03';
 demo.dataset.hsScene=String(i);
}
function stop(){if(timer!==null){window.clearInterval(timer);timer=null}}
function start(){
 stop();
 if(manual||hover||focus||!visible||reduce.matches||document.hidden)return;
 timer=window.setInterval(()=>select((active+1)%buttons.length),6500);
}
buttons.forEach((button,i)=>{
 button.addEventListener('click',()=>{manual=true;stop();select(i)});
 button.addEventListener('keydown',e=>{
  const next=e.key==='ArrowRight'||e.key==='ArrowDown'?i+1:e.key==='ArrowLeft'||e.key==='ArrowUp'?i-1:e.key==='Home'?0:e.key==='End'?buttons.length-1:null;
  if(next===null)return;
  e.preventDefault();manual=true;stop();
  const newIndex=(next+buttons.length)%buttons.length;
  select(newIndex);buttons[newIndex].focus();
 });
});
root.addEventListener('pointerenter',()=>{hover=true;stop()});
root.addEventListener('pointerleave',()=>{hover=false;start()});
root.addEventListener('focusin',()=>{focus=true;stop()});
root.addEventListener('focusout',event=>{if(!root.contains(event.relatedTarget)){focus=false;start()}});
reduce.addEventListener?.('change',start);
document.addEventListener('visibilitychange',start);
if('IntersectionObserver' in window){
 const observer=new IntersectionObserver(entries=>{visible=entries[0].isIntersecting;if(visible)start();else stop()},{threshold:.2});
 observer.observe(root);
}
select(0);start();
})();
