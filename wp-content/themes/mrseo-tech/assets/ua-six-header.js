/* Progressive-enhanced native UA header disclosure. */
(()=>{'use strict';const menus=[...document.querySelectorAll('.mrseo-ua-six-item')];if(!menus.length)return;
document.addEventListener('pointerdown',e=>menus.forEach(d=>{if(d.open&&!d.contains(e.target))d.open=false;}));
document.addEventListener('keydown',e=>{if(e.key!=='Escape')return;const open=menus.filter(d=>d.open);if(!open.length)return;e.preventDefault();open.forEach(d=>{d.open=false;d.querySelector('summary')?.focus();});});
document.querySelector('.menu-toggle')?.addEventListener('click',()=>{if(!document.querySelector('.nav-links')?.classList.contains('open'))menus.forEach(d=>d.open=false);});
})();
