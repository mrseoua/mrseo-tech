/* UA hybrid menu: progressive enhancement, real links are never fetched on demand. */
(()=>{'use strict';
 const narrow=matchMedia('(max-width:950px)');
 document.querySelectorAll('[data-ua-hybrid]').forEach(root=>{
  const groups=[...root.querySelectorAll('[data-hybrid-group]')],panels=[...root.querySelectorAll('[data-hybrid-panel]')];
  const modeButtons=[...root.querySelectorAll('[data-hybrid-mode]')],views=[...root.querySelectorAll('[data-hybrid-view]')];
  const extras=[...root.querySelectorAll('[data-hybrid-extra]')],extraPanels=[...root.querySelectorAll('[data-hybrid-extra-panel]')];
  const trigger=root.closest('.nav-dropdown,.intl-dropdown')?.querySelector('.services-menu-toggle');
  const scrollParent=()=>narrow.matches?root.closest('.nav-links'):root.closest('.nav-submenu');
  let selected=root.dataset.initialGroup||'seo',mode='services',drill=false;
  function render(){
   root.dataset.hybridDrill=String(drill);
   groups.forEach(b=>b.setAttribute('aria-pressed',String(b.dataset.hybridGroup===selected)));
   panels.forEach(p=>p.hidden=p.dataset.hybridPanel!==selected||(narrow.matches&&!drill));
   modeButtons.forEach(b=>{if(b.hasAttribute('aria-pressed'))b.setAttribute('aria-pressed',String(b.dataset.hybridMode===mode));});
   views.forEach(v=>v.hidden=v.dataset.hybridView!==mode);
  }
  function select(key,focus=false){
   if(!panels.some(p=>p.dataset.hybridPanel===key))return;
   selected=key;drill=narrow.matches;render();
   if(drill){scrollParent()?.scrollTo({top:0});if(focus)root.querySelector('[data-hybrid-back]')?.focus();}
  }
  groups.forEach(b=>b.addEventListener('click',()=>select(b.dataset.hybridGroup,true)));
  modeButtons.forEach(b=>b.addEventListener('click',()=>{
   mode=b.dataset.hybridMode;drill=false;render();scrollParent()?.scrollTo({top:0});
   if(!b.hasAttribute('aria-pressed'))root.querySelector('.mrseo-hybrid-modes [data-hybrid-mode="problems"]')?.focus();
  }));
  root.querySelector('[data-hybrid-back]')?.addEventListener('click',()=>{drill=false;render();scrollParent()?.scrollTo({top:0});groups.find(b=>b.dataset.hybridGroup===selected)?.focus();});
  root.querySelector('[data-hybrid-close]')?.addEventListener('click',()=>{if(trigger){trigger.click();trigger.focus();}});
  extras.forEach(b=>b.addEventListener('click',()=>{
   const opening=b.getAttribute('aria-expanded')!=='true';
   extras.forEach(x=>{const active=x===b&&opening;x.setAttribute('aria-expanded',String(active));x.lastElementChild.textContent=active?'−':'+';});
   extraPanels.forEach(p=>p.hidden=!(opening&&p.dataset.hybridExtraPanel===b.dataset.hybridExtra));
  }));
  extraPanels.forEach(p=>p.hidden=true);
  const reset=()=>{mode='services';drill=false;selected=root.dataset.initialGroup||'seo';extras.forEach(b=>{b.setAttribute('aria-expanded','false');b.lastElementChild.textContent='+';});extraPanels.forEach(p=>p.hidden=true);render();};
  narrow.addEventListener('change',()=>{drill=false;render();});
  if(trigger){new MutationObserver(()=>{if(trigger.getAttribute('aria-expanded')==='true'){reset();scrollParent()?.scrollTo({top:0});}}).observe(trigger,{attributes:true,attributeFilter:['aria-expanded']});}
  root.classList.add('is-enhanced');render();
 });
})();
