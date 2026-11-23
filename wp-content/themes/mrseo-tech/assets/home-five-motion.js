/* UA homepage: run interface demos while visible; respect reduced motion.
   Layout, submenu links and globe controls are intentionally untouched. */
(()=>{'use strict';
 const root=document.querySelector('.pt-ua-home .hsix');
 if(!root)return;
 const reduce=window.matchMedia('(prefers-reduced-motion: reduce)');
 let onscreen=false;
 const sync=()=>{
   root.classList.toggle('hsix-motion-off',reduce.matches||document.hidden||!onscreen);
 };
 // A low intersection threshold is crucial for the tall 3x2 card grid on phones.
 // An offscreen element may initially be outside the viewport by several screens.
 if('IntersectionObserver' in window){
   const observer=new IntersectionObserver(entries=>{
     for(const entry of entries)if(entry.target===root)onscreen=entry.isIntersecting;
     sync();
   },{threshold:0,rootMargin:'60px 0px 60px 0px'});
   observer.observe(root);
 }else{onscreen=true}
 document.addEventListener('visibilitychange',sync);
 window.addEventListener('pageshow',sync);
 if(reduce.addEventListener)reduce.addEventListener('change',sync);
 else if(reduce.addListener)reduce.addListener(sync);
 sync();
})();
