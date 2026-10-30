/* Lit, high-DPI Earth. A static texture remains visible if WebGL is unavailable. */
(async()=>{'use strict';
const root=document.querySelector('.orbit-lab'),core=root?.querySelector('.lab-core');if(!core)return;
const reduced=matchMedia('(prefers-reduced-motion: reduce)');
// Software sphere is also available in browsers that disable WebGL.
async function renderCanvasEarth(){
 const image=new Image();image.src=new URL('./earth-day.jpg',import.meta.url).href;
 try{await image.decode()}catch{return}
 const map=document.createElement('canvas');map.width=image.width;map.height=image.height;
 const mapContext=map.getContext('2d',{willReadFrequently:true});mapContext.drawImage(image,0,0);
 const pixels=mapContext.getImageData(0,0,map.width,map.height).data;
 const canvas=document.createElement('canvas');canvas.className='lab-webgl-canvas';canvas.setAttribute('aria-hidden','true');
 const context=canvas.getContext('2d');if(!context)return;
 core.prepend(canvas);
 let size=0,points=[],frameData,angle=0.15,raf=0,last=0,visible=true;
 function resize(){
  size=Math.max(160,Math.min(480,Math.round(core.clientWidth*Math.min(devicePixelRatio||1,2))));
  canvas.width=canvas.height=size;frameData=context.createImageData(size,size);points=[];
  const radius=size*.4464;
  for(let y=0;y<size;y++)for(let x=0;x<size;x++){
   const nx=(x+.5-size/2)/radius,ny=-(y+.5-size/2)/radius,rr=nx*nx+ny*ny;if(rr>1)continue;
   const z=Math.sqrt(1-rr),latitude=Math.asin(ny),longitude=Math.atan2(nx,z);
   const light=Math.max(0,nx*-.48+ny*.38+z*.79);
   points.push({offset:(y*size+x)*4,u:longitude/(2*Math.PI)+.5,v:(.5-latitude/Math.PI)*(map.height-1),light:.27+.87*light,rim:Math.pow(1-z,4),alpha:Math.min(1,(1-Math.sqrt(rr))*radius)*255});
  }
  draw();
 }
 function draw(){
  const out=frameData.data;
  for(const p of points){
   const u=((p.u+angle/(2*Math.PI))%1+1)%1*(map.width-1),x=Math.floor(u),y=Math.floor(p.v),fx=u-x,fy=p.v-y;
   const a=(y*map.width+x)*4,b=(y*map.width+Math.min(x+1,map.width-1))*4,c=(Math.min(y+1,map.height-1)*map.width+x)*4,d=(Math.min(y+1,map.height-1)*map.width+Math.min(x+1,map.width-1))*4;
   for(let channel=0;channel<3;channel++){
    const color=(pixels[a+channel]*(1-fx)+pixels[b+channel]*fx)*(1-fy)+(pixels[c+channel]*(1-fx)+pixels[d+channel]*fx)*fy;
    out[p.offset+channel]=Math.min(255,color*p.light+p.rim*[12,48,85][channel]);
   }
   out[p.offset+3]=p.alpha;
  }
  context.putImageData(frameData,0,0);
 }
 function frame(now){raf=0;if(document.hidden||!visible)return;if(!last||now-last>=100){const dt=last?Math.min((now-last)/1000,.2):0;last=now;angle+=dt*.065;draw()}if(!reduced.matches&&!root.classList.contains('lab-paused'))raf=requestAnimationFrame(frame)}
 function start(){if(!raf&&visible&&!document.hidden){last=0;raf=requestAnimationFrame(frame)}}
 function stop(){cancelAnimationFrame(raf);raf=0;last=0}
 new ResizeObserver(resize).observe(core);
 new IntersectionObserver(entries=>{visible=entries[0].isIntersecting;if(visible)start();else stop()}).observe(core);
 document.addEventListener('visibilitychange',()=>document.hidden?stop():start());
 new MutationObserver(()=>{stop();start()}).observe(root,{attributes:true,attributeFilter:['class']});
 reduced.addEventListener('change',()=>{stop();start()});
 resize();root.classList.add('lab-webgl-ready');start();
}
let THREE,renderer;
try{
 THREE=await import('https://cdn.jsdelivr.net/npm/three@0.160.1/build/three.module.js');
 renderer=new THREE.WebGLRenderer({alpha:true,antialias:true,powerPreference:'low-power'});
}catch(error){console.warn('Earth: using Canvas fallback',error);renderCanvasEarth();return}
renderer.setPixelRatio(Math.min(devicePixelRatio||1,2));renderer.setClearColor(0,0);renderer.outputColorSpace=THREE.SRGBColorSpace;
const scene=new THREE.Scene(),camera=new THREE.OrthographicCamera(-1.12,1.12,1.12,-1.12,.1,20);camera.position.z=4;
scene.add(new THREE.AmbientLight(0x9ec5ed,1.15));
const sun=new THREE.DirectionalLight(0xfff5e6,2.2);sun.position.set(-3,2.5,4);scene.add(sun);
const fill=new THREE.DirectionalLight(0x4499dd,.35);fill.position.set(3,-1,1);scene.add(fill);
let texture;
try{texture=await new THREE.TextureLoader().loadAsync(new URL('./earth-day.jpg',import.meta.url).href)}catch(error){renderer.dispose();console.warn('Earth: retaining static fallback',error);return}
texture.colorSpace=THREE.SRGBColorSpace;texture.anisotropy=Math.min(8,renderer.capabilities.getMaxAnisotropy());
const material=new THREE.MeshStandardMaterial({map:texture,roughness:1,metalness:0,emissive:new THREE.Color(0xffffff),emissiveMap:texture,emissiveIntensity:.43});
const earth=new THREE.Mesh(new THREE.SphereGeometry(1,96,64),material);earth.rotation.set(.06,3.04,.1);scene.add(earth);
// View-space normals and positions must be in the same space for a clean limb glow.
const atmosphere=new THREE.Mesh(new THREE.SphereGeometry(1.035,64,48),new THREE.ShaderMaterial({transparent:true,side:THREE.BackSide,depthWrite:false,blending:THREE.AdditiveBlending,
 vertexShader:'varying vec3 normalView;varying vec3 positionView;void main(){vec4 p=modelViewMatrix*vec4(position,1.0);positionView=p.xyz;normalView=normalize(normalMatrix*normal);gl_Position=projectionMatrix*p;}',
 fragmentShader:'varying vec3 normalView;varying vec3 positionView;void main(){float rim=pow(1.0-abs(dot(normalize(normalView),normalize(-positionView))),3.0);gl_FragColor=vec4(0.18,0.58,1.0,rim*0.48);}'
}));scene.add(atmosphere);
const canvas=renderer.domElement;canvas.className='lab-webgl-canvas';canvas.setAttribute('aria-hidden','true');core.prepend(canvas);
let raf=0,last=0,inView=true,lost=false;
function render(){if(!lost)renderer.render(scene,camera)}
function resize(){const w=core.clientWidth,h=core.clientHeight;if(!w||!h)return;renderer.setPixelRatio(Math.min(devicePixelRatio||1,2));renderer.setSize(w,h,false);const aspect=w/h;camera.left=-1.12*aspect;camera.right=1.12*aspect;camera.updateProjectionMatrix();render()}
function frame(now){raf=0;if(!inView||document.hidden||lost)return;const dt=last?Math.min((now-last)/1000,.05):0;last=now;if(!reduced.matches&&!root.classList.contains('lab-paused'))earth.rotation.y+=dt*.065;render();if(!reduced.matches&&!root.classList.contains('lab-paused'))raf=requestAnimationFrame(frame)}
function start(){if(!raf&&inView&&!document.hidden&&!lost){last=0;raf=requestAnimationFrame(frame)}}
function stop(){cancelAnimationFrame(raf);raf=0;last=0}
new ResizeObserver(resize).observe(core);
new IntersectionObserver(entries=>{inView=entries[0].isIntersecting;if(inView)start();else stop()},{rootMargin:'100px'}).observe(core);
document.addEventListener('visibilitychange',()=>document.hidden?stop():start());
new MutationObserver(()=>{stop();start()}).observe(root,{attributes:true,attributeFilter:['class']});
reduced.addEventListener('change',()=>{stop();start()});
canvas.addEventListener('webglcontextlost',event=>{event.preventDefault();lost=true;stop();root.classList.remove('lab-webgl-ready')});
canvas.addEventListener('webglcontextrestored',()=>{lost=false;resize();root.classList.add('lab-webgl-ready');start()});
resize();root.classList.add('lab-webgl-ready');start();
})();
