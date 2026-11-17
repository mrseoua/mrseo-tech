/* UA direct services navigation: only close/focus enhancement, all links work without JS. */
(()=>{'use strict';
 document.querySelectorAll('[data-simple-nav]').forEach(root=>{
  const trigger=root.closest('.nav-dropdown,.intl-dropdown')?.querySelector('.services-menu-toggle');
  const first=root.querySelector('.mrseo-simple-card');
  root.querySelector('[data-simple-close]')?.addEventListener('click',()=>{
   if(trigger){trigger.click();trigger.focus({preventScroll:true});}
  });
  if(trigger){
   trigger.addEventListener('keydown',event=>{
    if(event.key!=='ArrowDown')return;
    event.preventDefault();event.stopImmediatePropagation();
    if(trigger.getAttribute('aria-expanded')!=='true')trigger.click();
    queueMicrotask(()=>first?.focus({preventScroll:true}));
   },true);
   const narrow=matchMedia('(max-width:950px)');
   new MutationObserver(()=>{
    if(trigger.getAttribute('aria-expanded')==='true'&&narrow.matches)first?.focus({preventScroll:true});
   }).observe(trigger,{attributes:true,attributeFilter:['aria-expanded']});
  }
  root.classList.add('is-ready');
 });
})();
