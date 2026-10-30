/* Horoshop-only animated product showcase: three simple, accessible scenarios. */
(()=>{'use strict';
const root=document.querySelector('.special-hero-horoshop .hs-showcase');
if(!root)return;
const buttons=[...root.querySelectorAll('.hs-switch[data-hs-step]')];
const demo=root.querySelector('.hs-demo');
const problem=root.querySelector('.hs-demo-message [data-hs-problem]');
const solution=root.querySelector('.hs-demo-message [data-hs-solution]');
if(buttons.length!==3||!demo||!problem||!solution)return;
const reduced=window.matchMedia('(prefers-reduced-motion: reduce)');
let active=0,interval=null,resume=null,visible=true;
function select(index){
 if(index<0||index>=buttons.length)return;
 active=index;
 const item=buttons[index];
 buttons.forEach((button,i)=>{
  const on=i===index;
  button.classList.toggle('is-active',on);
  button.setAttribute('aria-pressed',String(on));
 });
 problem.textContent=item.dataset.hsProblem||'';
 solution.textContent=item.dataset.hsSolution||'';
 demo.dataset.hsScene=String(index);
}
function stop(){if(interval!==null){clearInterval(interval);interval=null}}
function play(){
 stop();
 if(!visible||document.hidden||reduced.matches||resume!==null)return;
 interval=setInterval(()=>select((active+1)%buttons.length),4600);
}
function manual(index){
 stop();
 if(resume!==null){clearTimeout(resume);resume=null}
 select(index);
 // Let the visitor read their chosen solution before the illustration resumes.
 resume=setTimeout(()=>{resume=null;play()},16000);
}
buttons.forEach((button,i)=>{
 button.addEventListener('click',()=>manual(i));
 button.addEventListener('keydown',e=>{
  const next=e.key==='ArrowRight'||e.key==='ArrowDown'?i+1:e.key==='ArrowLeft'||e.key==='ArrowUp'?i-1:e.key==='Home'?0:e.key==='End'?buttons.length-1:null;
  if(next===null)return;
  e.preventDefault();
  const target=(next+buttons.length)%buttons.length;
  manual(target);buttons[target].focus();
 });
});
root.addEventListener('focusin',stop);
root.addEventListener('focusout',event=>{if(!root.contains(event.relatedTarget))play()});
reduced.addEventListener?.('change',play);
document.addEventListener('visibilitychange',play);
if('IntersectionObserver' in window){
 new IntersectionObserver(entries=>{visible=entries[0].isIntersecting;play()},{threshold:.15}).observe(root);
}
select(0);play();
})();