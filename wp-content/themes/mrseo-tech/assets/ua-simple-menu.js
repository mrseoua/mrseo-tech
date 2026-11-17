/* Ukrainian premium compact service menu. Native links, no content fetching. */
(()=>{'use strict';
 const mobile=window.matchMedia('(max-width:950px)');
 document.querySelectorAll('[data-simple-nav]').forEach(root=>{
  const cards=root.querySelector('[data-simple-cards]');
  const details=root.querySelector('[data-simple-details]');
  const panels=[...root.querySelectorAll('[data-simple-panel]')];
  const buttons=[...root.querySelectorAll('[data-simple-category]')];
  const back=root.querySelector('[data-simple-back]');
  const trigger=root.closest('.nav-dropdown,.intl-dropdown')?.querySelector('.services-menu-toggle');
  const scrollArea=()=>mobile.matches?root.closest('.nav-links'):root.closest('.nav-submenu');
  let active=null;
  function select(key,focus=false){
   active=panels.some(p=>p.dataset.simplePanel===key)?key:null;
   cards.hidden=active!==null;details.hidden=active===null;
   panels.forEach(p=>p.hidden=p.dataset.simplePanel!==active);
   buttons.forEach(b=>b.setAttribute('aria-expanded',String(b.dataset.simpleCategory===active)));
   scrollArea()?.scrollTo({top:0});
   if(focus)(active?back:buttons.find(b=>b.dataset.simpleCategory===key)||buttons[0])?.focus({preventScroll:true});
  }
  buttons.forEach(b=>b.addEventListener('click',()=>select(b.dataset.simpleCategory,true)));
  back.addEventListener('click',()=>{const previous=active;select(null);buttons.find(b=>b.dataset.simpleCategory===previous)?.focus({preventScroll:true});});
  root.querySelector('[data-simple-close]')?.addEventListener('click',()=>{
   if(trigger){trigger.click();trigger.focus({preventScroll:true});}
  });
  if(trigger){
   trigger.addEventListener('keydown',event=>{
    if(event.key!=='ArrowDown')return;
    event.preventDefault();event.stopImmediatePropagation();
    if(trigger.getAttribute('aria-expanded')!=='true')trigger.click();
    queueMicrotask(()=>buttons[0]?.focus({preventScroll:true}));
   },true);
   new MutationObserver(()=>{
    if(trigger.getAttribute('aria-expanded')==='true'){
     select(null);
     if(mobile.matches)buttons[0]?.focus({preventScroll:true});
    }
   }).observe(trigger,{attributes:true,attributeFilter:['aria-expanded']});
  }
  // Enhance only after links and controls are wired. No JS: show direct directory links.
  root.classList.add('is-ready');select(null);
 });
})();
