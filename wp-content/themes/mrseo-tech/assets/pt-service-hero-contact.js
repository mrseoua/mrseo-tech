/* Portugal-only mobile: keep the global contact bar clear of the service diagram.
 * A visible primary contact CTA remains in the hero; restore bar after diagram. */
(() => {
  const activate=()=>{
    const scene=document.querySelector('.pt-svc .pl-svc-scene');
    const bar=document.querySelector('.mrseo-mobile-contact-bar');
    if(!scene||!bar||typeof IntersectionObserver!=='function')return;
    const observer=new IntersectionObserver(entries=>{
      document.documentElement.classList.toggle('mrseo-pt-scene-visible',Boolean(entries[0]?.isIntersecting));
    },{threshold:0.01,rootMargin:'0px 0px -68px 0px'});
    observer.observe(scene);
  };
  if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',activate,{once:true});
  else activate();
})();
