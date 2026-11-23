/* UA homepage micro-motion. Earth/other locales untouched. */
(()=>{'use strict';
 const root=document.querySelector('.pt-ua-home .hsix');
 if(!root)return;
 const reduce=window.matchMedia('(prefers-reduced-motion: reduce)');
 let visible=false;
 const sync=()=>root.classList.toggle('hsix-motion-off',reduce.matches||!visible||document.hidden);
 if('IntersectionObserver' in window){
  const observer=new IntersectionObserver(entries=>{visible=entries.some(e=>e.isIntersecting);sync();},{threshold:.04});
  observer.observe(root);
 }else{visible=true}
 document.addEventListener('visibilitychange',sync,{passive:true});
 if(reduce.addEventListener)reduce.addEventListener('change',sync);
 else if(reduce.addListener)reduce.addListener(sync);
 sync();
})();
