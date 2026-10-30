/* MrSeo 3D Earth — Three.js. Progressive enhancement, never blocks content. */
(async()=>{'use strict';
const root=document.querySelector('.orbit-lab'),core=root?.querySelector('.lab-core'),visual=root?.querySelector('.lab-visual');
if(!root||!core||!visual)return;
const reduced=matchMedia('(prefers-reduced-motion: reduce)').matches;
if(reduced)return;
let THREE;
try{THREE=await import('https://cdn.jsdelivr.net/npm/three@0.160.1/build/three.module.js')}catch(e){console.warn('3D Earth unavailable; retaining fallback',e);return}
let renderer;
try{renderer=new THREE.WebGLRenderer({alpha:true,antialias:true,powerPreference:'high-performance',premultipliedAlpha:false})}catch(e){console.warn('WebGL unavailable',e);return}
const canvas=renderer.domElement;canvas.className='lab-webgl-canvas';canvas.setAttribute('aria-hidden','true');canvas.style.display='block';
renderer.setPixelRatio(Math.min(devicePixelRatio||1,2));renderer.setClearColor(0x000000,0);
renderer.outputColorSpace=THREE.SRGBColorSpace;
const scene=new THREE.Scene(),camera=new THREE.PerspectiveCamera(40,1,.1,100);camera.position.set(0,0,4.5);
scene.add(new THREE.AmbientLight(0xb4d5ff,.65));
const sunlight=new THREE.DirectionalLight(0xfff5e9,3.0);sunlight.position.set(-3.5,2.5,5);scene.add(sunlight);
const fill=new THREE.DirectionalLight(0x4baaff,.6);fill.position.set(3,-1,-2);scene.add(fill);
const globe=new THREE.Group();scene.add(globe);
const geometry=new THREE.SphereGeometry(1.2,96,64);
const loader=new THREE.TextureLoader();loader.setCrossOrigin('anonymous');
const texBase='https://threejs.org/examples/textures/planets/';
const load=(name)=>new Promise((resolve,reject)=>loader.load(texBase+name,resolve,undefined,reject));
let day,night,normal,clouds;
try{[day,night,normal,clouds]=await Promise.all([load('earth_atmos_2048.jpg'),load('earth_lights_2048.png'),load('earth_normal_2048.jpg'),load('earth_clouds_1024.png')])}
catch(e){console.warn('Earth texture unavailable; keeping CSS globe',e);renderer.dispose();return}
for(const t of [day,night,clouds])t.colorSpace=THREE.SRGBColorSpace;
const earthMaterial=new THREE.MeshPhongMaterial({
 map:day,normalMap:normal,normalScale:new THREE.Vector2(.09,.09),
 specular:new THREE.Color(0x517b9c),shininess:18,
 emissive:new THREE.Color(0xffad71),emissiveMap:night,emissiveIntensity:.22
});
const earth=new THREE.Mesh(geometry,earthMaterial);globe.add(earth);
const cloudMaterial=new THREE.MeshPhongMaterial({map:clouds,transparent:true,opacity:.23,depthWrite:false,blending:THREE.NormalBlending,side:THREE.FrontSide});
const cloudShell=new THREE.Mesh(new THREE.SphereGeometry(1.212,96,64),cloudMaterial);globe.add(cloudShell);
const atmosphereMaterial=new THREE.ShaderMaterial({
 transparent:true,side:THREE.BackSide,depthWrite:false,blending:THREE.AdditiveBlending,
 uniforms:{glowColor:{value:new THREE.Color(0x49bfff)},intensity:{value:.48}},
 vertexShader:`varying vec3 vNormal;varying vec3 vWorldPosition;void main(){vNormal=normalize(normalMatrix*normal);vec4 world=modelMatrix*vec4(position,1.);vWorldPosition=world.xyz;gl_Position=projectionMatrix*viewMatrix*world;}`,
 fragmentShader:`varying vec3 vNormal;varying vec3 vWorldPosition;uniform vec3 glowColor;uniform float intensity;void main(){vec3 viewDir=normalize(cameraPosition-vWorldPosition);float rim=pow(1.-abs(dot(normalize(vNormal),viewDir)),3.2);gl_FragColor=vec4(glowColor,rim*intensity);}`
});
const atmosphere=new THREE.Mesh(new THREE.SphereGeometry(1.30,96,64),atmosphereMaterial);scene.add(atmosphere);
globe.rotation.z=.10;globe.rotation.y=-.65;
core.prepend(canvas);
let visible=true,raf=0,last=0,dx=0,dy=0,tx=0,ty=0;
function resize(){const w=Math.max(150,core.clientWidth),h=Math.max(150,core.clientHeight);renderer.setSize(w,h,false);camera.aspect=w/h;camera.updateProjectionMatrix()}
function frame(now){
 raf=0;if(!visible||root.classList.contains('lab-paused'))return;
 const dt=last?Math.min(.06,(now-last)/1000):0;last=now;
 globe.rotation.y+=dt*.085;cloudShell.rotation.y+=dt*.018;
 dx+=(tx-dx)*.035;dy+=(ty-dy)*.035;globe.rotation.x=dy*.075;globe.rotation.z=.10+dx*.05;
 renderer.render(scene,camera);raf=requestAnimationFrame(frame)
}
function start(){if(!raf&&visible){last=0;raf=requestAnimationFrame(frame)}}
function stop(){if(raf)cancelAnimationFrame(raf);raf=0}
visual.addEventListener('pointermove',e=>{const b=visual.getBoundingClientRect();tx=(e.clientX-b.left)/b.width*2-1;ty=(e.clientY-b.top)/b.height*2-1},{passive:true});
visual.addEventListener('pointerleave',()=>{tx=0;ty=0});
const observer=new IntersectionObserver(e=>{visible=e[0].isIntersecting&&!document.hidden;if(visible)start();else stop()});observer.observe(core);
document.addEventListener('visibilitychange',()=>{visible=!document.hidden&&observer.takeRecords().length===0;if(document.hidden)stop();else start()});
new MutationObserver(()=>{if(root.classList.contains('lab-paused'))stop();else start()}).observe(root,{attributes:true,attributeFilter:['class']});
window.addEventListener('resize',resize,{passive:true});
canvas.addEventListener('webglcontextlost',e=>{e.preventDefault();stop();root.classList.remove('lab-webgl-ready')});
resize();renderer.render(scene,camera);root.classList.add('lab-webgl-ready');start();
})();