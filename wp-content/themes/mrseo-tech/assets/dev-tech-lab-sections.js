/* Preview-only motion: pause decorative SVG motion outside viewport. */
(() => {
 const root=document.querySelector('.dev-scope.dt-preview');if(!root)return;
 const scenes=[...root.querySelectorAll('.dtm-art')];
 if('IntersectionObserver' in window){const io=new IntersectionObserver(entries=>entries.forEach(e=>e.target.classList.toggle('dtm-inview',e.isIntersecting)),{rootMargin:'20px'});scenes.forEach(s=>io.observe(s));}
 const flow=root.querySelector('[data-flow]');if(!flow)return;
 const button=flow.querySelector('.dtm-play'),nodes=[...flow.querySelectorAll('[data-node]')],status=flow.querySelector('.dtm-flow-status p');
 const steps=['Заявку створено на сайті. Дані передаються до інтеграції.','Інтеграція перевіряє дані та передає їх до CRM.','CRM отримує заявку. Менеджер бачить її без ручного перенесення.'];
 const reduced=matchMedia('(prefers-reduced-motion: reduce)');let timer=0,step=-1;
 function finish(){clearTimeout(timer);timer=0;button.setAttribute('aria-pressed','false');button.textContent='Повторити приклад ↗';}
 function show(i){step=i;flow.dataset.step=String(i);nodes.forEach((n,j)=>n.dataset.active=String(i===j));status.textContent=steps[i];if(i===2){finish();return;}if(reduced.matches){button.textContent='Наступний крок ↗';button.setAttribute('aria-pressed','false');return;}timer=setTimeout(()=>show(i+1),1500);}
 button.addEventListener('click',()=>{if(timer){clearTimeout(timer);timer=0;button.setAttribute('aria-pressed','false');button.textContent='Продовжити ↗';return;}button.setAttribute('aria-pressed',String(!reduced.matches));button.textContent='Пауза';show(step>=0&&step<2?step+1:0);});
 document.addEventListener('visibilitychange',()=>{if(document.hidden&&timer){clearTimeout(timer);timer=0;button.setAttribute('aria-pressed','false');button.textContent='Продовжити ↗';}});
 reduced.addEventListener('change',()=>{if(reduced.matches&&timer){clearTimeout(timer);timer=0;button.setAttribute('aria-pressed','false');button.textContent='Наступний крок ↗';}});
})();
