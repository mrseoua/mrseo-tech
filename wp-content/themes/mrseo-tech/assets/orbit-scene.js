/* One layout owner: satellite positions and connector endpoints update together. */
(()=>{'use strict';
const root=document.querySelector('.orbit-lab');if(!root)return;
const visual=root.querySelector('.lab-visual'),core=root.querySelector('.lab-core');
const nodes=[...root.querySelectorAll('.lab-node')],svg=root.querySelector('.lab-connectors'),group=root.querySelector('#lab-spokes');
if(!visual||!core||!svg||!group||!nodes.length)return;
const reduced=matchMedia('(prefers-reduced-motion: reduce)'),desktop=matchMedia('(min-width:651px)');
const palette=['#ff985a','#72d3e4','#a7e4a0','#d8b1ff','#ffca74','#ff849c','#80d7bd'];
let selected=0,angle=-Math.PI/2,raf=0,last=0,inView=true,hovered=false,focused=false,tour=null;
const paths=nodes.map((node,i)=>{const ns='http://www.w3.org/2000/svg',path=document.createElementNS(ns,'path'),flow=document.createElementNS(ns,'path'),end=document.createElementNS(ns,'circle');path.classList.add('lab-spoke');flow.classList.add('lab-spoke-flow');end.classList.add('lab-spoke-end');for(const element of [path,flow,end])element.style.setProperty('--spoke',palette[i%palette.length]);flow.setAttribute('aria-hidden','true');end.setAttribute('r','3');group.append(path,flow,end);return {path,flow,end}});
function layout(){
 const w=visual.clientWidth,h=visual.clientHeight;
 svg.setAttribute('viewBox',`0 0 ${w} ${h}`);
 if(desktop.matches){
  const cardW=Math.max(...nodes.map(n=>n.offsetWidth)),cardH=Math.max(...nodes.map(n=>n.offsetHeight));
  const rx=(w-cardW)/2-6,ry=(h-cardH)/2-8;
  nodes.forEach((node,i)=>{const a=angle+i*Math.PI*2/nodes.length;node.style.transform=`translate3d(${w/2+Math.cos(a)*rx-node.offsetWidth/2}px,${h/2+Math.sin(a)*ry-node.offsetHeight/2}px,0)`});
 }else nodes.forEach(node=>node.style.removeProperty('transform'));
 const v=visual.getBoundingClientRect(),c=core.getBoundingClientRect();
 const cx=c.left+c.width/2-v.left,cy=c.top+c.height/2-v.top,r=c.width*.46;
 nodes.forEach((node,i)=>{
  const b=node.getBoundingClientRect(),nx=b.left+b.width/2-v.left,ny=b.top+b.height/2-v.top;
  let d,ex,ey;
  if(desktop.matches){
   const dx=nx-cx,dy=ny-cy,dist=Math.hypot(dx,dy)||1,ux=dx/dist,uy=dy/dist;
   const edge=Math.min(b.width/2/Math.max(Math.abs(ux),.0001),b.height/2/Math.max(Math.abs(uy),.0001));
   ex=nx-ux*(edge+3);ey=ny-uy*(edge+3);
   d=`M ${cx+ux*r} ${cy+uy*r} L ${ex} ${ey}`;
  }else{
   // Seven separate lanes in the centre gutter keep connections clear of labels.
   const lane=cx+(i-(nodes.length-1)/2)*3;
   const sy=cy+Math.sqrt(Math.max(0,r*r-(lane-cx)**2));
   const full=b.width>w*.75;
   ex=full?lane:(nx<cx?b.right-v.left+2:b.left-v.left-2);ey=full?b.top-v.top-3:ny;
   d=`M ${lane} ${sy} L ${lane} ${ey} L ${ex} ${ey}`;
  }
  paths[i].path.setAttribute('d',d);paths[i].flow.setAttribute('d',d);paths[i].end.setAttribute('cx',ex);paths[i].end.setAttribute('cy',ey);
 });
}
function select(i){selected=i;nodes.forEach((node,j)=>{const active=i===j;node.classList.toggle('active',active);paths[j].path.classList.toggle('active',active);paths[j].flow.classList.toggle('active',active);paths[j].end.classList.toggle('active',active)});}
function hoverLink(i,on){const item=paths[i];if(!item)return;nodes[i].classList.toggle('is-link-hovered',on);item.path.classList.toggle('is-link-hovered',on);item.flow.classList.toggle('is-link-hovered',on);item.end.classList.toggle('is-link-hovered',on);}
function animate(now){raf=0;if(document.hidden||!inView)return;const dt=last?Math.min((now-last)/1000,.05):0;last=now;
 if(desktop.matches&&!reduced.matches&&!root.classList.contains('lab-paused')&&!hovered&&!focused)angle+=dt*.025;
 layout();if(desktop.matches&&!reduced.matches&&!root.classList.contains('lab-paused'))raf=requestAnimationFrame(animate);
}
function start(){layout();if(!raf&&!document.hidden&&inView){last=0;raf=requestAnimationFrame(animate)}}
function stop(){cancelAnimationFrame(raf);raf=0;last=0}
function stopTour(){clearInterval(tour);tour=null;root.querySelector('#lab-autoplay')?.setAttribute('aria-pressed','false')}
nodes.forEach((node,i)=>{node.removeAttribute('aria-pressed');node.addEventListener('pointerenter',()=>{select(i);hoverLink(i,true)});node.addEventListener('pointerleave',()=>hoverLink(i,false));node.addEventListener('focus',()=>{stopTour();select(i);hoverLink(i,true)});node.addEventListener('blur',()=>hoverLink(i,false))});
visual.addEventListener('pointerenter',()=>{hovered=true});visual.addEventListener('pointerleave',()=>{hovered=false});
visual.addEventListener('focusin',()=>{focused=true});visual.addEventListener('focusout',e=>{focused=visual.contains(e.relatedTarget)});
root.querySelector('#lab-motion')?.addEventListener('click',e=>{const paused=root.classList.toggle('lab-paused');e.currentTarget.setAttribute('aria-pressed',String(paused));stopTour();stop();start()});
root.querySelector('#lab-autoplay')?.addEventListener('click',e=>{if(tour){stopTour();return}select((selected+1)%nodes.length);tour=setInterval(()=>select((selected+1)%nodes.length),2600);e.currentTarget.setAttribute('aria-pressed','true')});
new ResizeObserver(start).observe(visual);nodes.forEach(node=>new ResizeObserver(start).observe(node));
new IntersectionObserver(entries=>{inView=entries[0].isIntersecting;if(inView)start();else stop()},{rootMargin:'100px'}).observe(visual);
document.addEventListener('visibilitychange',()=>{if(document.hidden){stop();stopTour()}else start()});
for(const query of [desktop,reduced])query.addEventListener('change',()=>{stop();angle=-Math.PI/2;start()});
document.fonts?.ready.then(start);select(0);start();
})();
