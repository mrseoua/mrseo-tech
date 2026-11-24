/* Cinematic SEO hero: optional decorative motion, safe on keyboard and reduced motion. */
(()=>{'use strict';const root=document.querySelector('.pti-page[data-pti-service="seo"]');if(!root)return;const art=root.querySelector('.seo-cine-art'),button=art?.querySelector('.seo-cine-motion');if(!art||!button)return;const reduced=window.matchMedia('(prefers-reduced-motion: reduce)');let manualPause=false;let visible=true;
function sync(){const off=manualPause||reduced.matches||document.hidden||!visible;root.classList.toggle('seo-cine-paused',off);button.disabled=reduced.matches;button.setAttribute('aria-pressed',String(manualPause));button.setAttribute('aria-label',off?'Відновити декоративну анімацію':'Зупинити декоративну анімацію');button.textContent=off?'▶':'Ⅱ';}
button.addEventListener('click',()=>{manualPause=!manualPause;sync()});document.addEventListener('visibilitychange',sync);if(reduced.addEventListener)reduced.addEventListener('change',sync);else reduced.addListener(sync);
if('IntersectionObserver' in window){new IntersectionObserver(entries=>{visible=entries[0]?.isIntersecting??true;sync()},{threshold:0}).observe(art)}
sync();})();
