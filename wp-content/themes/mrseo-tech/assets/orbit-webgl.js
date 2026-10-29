/* Orbit Lab WebGL planet — isolated, progressive enhancement, no external dependencies. */
(()=>{'use strict';
const root=document.querySelector('.orbit-lab'),core=root?.querySelector('.lab-core'),visual=root?.querySelector('.lab-visual');
if(!root||!core||!visual||window.matchMedia('(prefers-reduced-motion: reduce)').matches)return;
const canvas=document.createElement('canvas');canvas.className='lab-webgl-canvas';canvas.setAttribute('aria-hidden','true');
const gl=canvas.getContext('webgl',{alpha:true,antialias:true,powerPreference:'low-power',premultipliedAlpha:true});
if(!gl)return;
const vs='attribute vec2 a; varying vec2 v; void main(){v=a;gl_Position=vec4(a,0.,1.);}';
const fs=`precision highp float;
varying vec2 v;
uniform vec2 u_pointer;
uniform float u_time;
uniform sampler2D u_earth;
uniform float u_has_texture;
float hash(vec3 p){p=fract(p*.3183099+.1);p*=17.;return fract(p.x*p.y*p.z*(p.x+p.y+p.z));}
float noise(vec3 p){vec3 i=floor(p),f=fract(p);f=f*f*(3.-2.*f);return mix(mix(mix(hash(i),hash(i+vec3(1,0,0)),f.x),mix(hash(i+vec3(0,1,0)),hash(i+vec3(1,1,0)),f.x),f.y),mix(mix(hash(i+vec3(0,0,1)),hash(i+vec3(1,0,1)),f.x),mix(hash(i+vec3(0,1,1)),hash(i+vec3(1,1,1)),f.x),f.y),f.z);}
void main(){
 vec2 p=v*1.025;float r2=dot(p,p);if(r2>1.)discard;
 vec3 n=normalize(vec3(p,sqrt(max(0.,1.-r2))));
 float a=u_time*.20+u_pointer.x*.28+1.2;
 mat3 ry=mat3(cos(a),0.,sin(a),0.,1.,0.,-sin(a),0.,cos(a));
 vec3 q=ry*n;
 float tilt=u_pointer.y*.14;
 q.yz=mat2(cos(tilt),-sin(tilt),sin(tilt),cos(tilt))*q.yz;
 float lon=atan(q.z,q.x);
 float lat=asin(clamp(q.y,-1.,1.));
 vec2 uv=vec2(fract(lon/6.2831853+.5),.5-lat/3.14159265);
 vec3 tex=texture2D(u_earth,uv).rgb;
 float continents=noise(q*3.8)+noise(q*8.1)*.3;
 vec3 fallback=mix(vec3(.025,.13,.32),vec3(.14,.35,.18),smoothstep(.46,.61,continents));
 vec3 earth=mix(fallback,tex,clamp(u_has_texture,0.,1.));
 vec3 light=normalize(vec3(-.52,.64,.82));
 float diffuse=max(dot(n,light),0.);
 float terminator=smoothstep(-.34,.18,dot(n,light));
 earth*=.23+1.05*diffuse;
 earth+=vec3(.015,.045,.10)*(1.-terminator);
 /* The photographic Earth texture includes clouds; synthetic noise made it look blotchy. */
 float atm=pow(1.-max(n.z,0.),4.5);
 earth+=vec3(.10,.28,.60)*atm*.41;
 float spec=pow(max(dot(reflect(-light,n),vec3(0.,0.,1.)),0.),36.);
 earth+=vec3(.5,.7,1.)*spec*.14;
 gl_FragColor=vec4(earth,1.-smoothstep(.99,1.003,length(p)));
}`;

function compile(kind,src){const sh=gl.createShader(kind);gl.shaderSource(sh,src);gl.compileShader(sh);if(!gl.getShaderParameter(sh,gl.COMPILE_STATUS)){gl.deleteShader(sh);throw Error('WebGL shader compile failed')}return sh}
let program;
try{program=gl.createProgram();gl.attachShader(program,compile(gl.VERTEX_SHADER,vs));gl.attachShader(program,compile(gl.FRAGMENT_SHADER,fs));gl.linkProgram(program);if(!gl.getProgramParameter(program,gl.LINK_STATUS))throw Error('WebGL link failed')}catch{return}
gl.useProgram(program);
const buf=gl.createBuffer();gl.bindBuffer(gl.ARRAY_BUFFER,buf);gl.bufferData(gl.ARRAY_BUFFER,new Float32Array([-1,-1,1,-1,-1,1,1,1]),gl.STATIC_DRAW);
const loc=gl.getAttribLocation(program,'a');gl.enableVertexAttribArray(loc);gl.vertexAttribPointer(loc,2,gl.FLOAT,false,0,0);
const tm=gl.getUniformLocation(program,'u_time'),pointer=gl.getUniformLocation(program,'u_pointer');
const earthSampler=gl.getUniformLocation(program,'u_earth'),hasTex=gl.getUniformLocation(program,'u_has_texture');
const tex=gl.createTexture();gl.activeTexture(gl.TEXTURE0);gl.bindTexture(gl.TEXTURE_2D,tex);
gl.texImage2D(gl.TEXTURE_2D,0,gl.RGBA,1,1,0,gl.RGBA,gl.UNSIGNED_BYTE,new Uint8Array([20,56,108,255]));
gl.texParameteri(gl.TEXTURE_2D,gl.TEXTURE_WRAP_S,gl.CLAMP_TO_EDGE);gl.texParameteri(gl.TEXTURE_2D,gl.TEXTURE_WRAP_T,gl.CLAMP_TO_EDGE);
gl.texParameteri(gl.TEXTURE_2D,gl.TEXTURE_MIN_FILTER,gl.LINEAR);gl.texParameteri(gl.TEXTURE_2D,gl.TEXTURE_MAG_FILTER,gl.LINEAR);
gl.uniform1i(earthSampler,0);let textured=0;
// Try CORS-friendly, equirectangular Earth textures in priority order.
const candidates=[
 'https://threejs.org/examples/textures/planets/earth_atmos_2048.jpg',
 'https://raw.githubusercontent.com/MaxwellLee/physics-lab/main/assets/textures/earth_2048.jpg',
 'https://assets.science.nasa.gov/content/dam/science/esd/eo/images/bmng/bmng-base/july/world.200407.3x5400x2700.jpg'
];
let current=0;
function loadEarth(){
 if(current>=candidates.length){root.classList.remove('lab-webgl-ready');active=false;stop();return}
 const img=new Image();img.crossOrigin='anonymous';
 img.onload=()=>{if(!active)return;try{
 gl.activeTexture(gl.TEXTURE0);gl.bindTexture(gl.TEXTURE_2D,tex);
 gl.pixelStorei(gl.UNPACK_FLIP_Y_WEBGL,false);
 gl.texImage2D(gl.TEXTURE_2D,0,gl.RGBA,gl.RGBA,gl.UNSIGNED_BYTE,img);
 textured=1;root.classList.add('lab-webgl-ready');start();
 }catch(e){current++;loadEarth()}};
 img.onerror=()=>{current++;loadEarth()};
 img.src=candidates[current];
}


core.prepend(canvas);
let active=true,visible=true,frame=0,time=0,last=0,targetX=0,targetY=0,smoothX=0,smoothY=0;
function resize(){const r=core.getBoundingClientRect(),dpr=Math.min(window.devicePixelRatio||1,2);const size=Math.max(256,Math.min(1200,Math.round(Math.max(r.width,r.height)*dpr)));if(canvas.width!==size){canvas.width=size;canvas.height=size;gl.viewport(0,0,size,size)}}
function draw(now){frame=0;if(!active||!visible||root.classList.contains('lab-paused'))return;
if(last)time+=Math.min((now-last)/1000,.05);last=now;resize();smoothX+=(targetX-smoothX)*.08;smoothY+=(targetY-smoothY)*.08;
gl.uniform1f(tm,time);gl.uniform2f(pointer,smoothX,smoothY);gl.uniform1f(hasTex,textured);gl.clearColor(0,0,0,0);gl.clear(gl.COLOR_BUFFER_BIT);gl.drawArrays(gl.TRIANGLE_STRIP,0,4);frame=requestAnimationFrame(draw)}
function start(){last=0;if(!frame&&active&&visible&&!root.classList.contains('lab-paused'))frame=requestAnimationFrame(draw)}
function stop(){if(frame)cancelAnimationFrame(frame);frame=0}
visual.addEventListener('pointermove',e=>{const r=visual.getBoundingClientRect();targetX=(e.clientX-r.left)/r.width*2.-1.;targetY=(e.clientY-r.top)/r.height*2.-1.},{passive:true});
visual.addEventListener('pointerleave',()=>{targetX=0;targetY=0});
document.addEventListener('visibilitychange',()=>{visible=!document.hidden;if(visible)start();else stop()});
const obs=new IntersectionObserver(es=>{visible=es[0].isIntersecting&&!document.hidden;if(visible)start();else stop()},{threshold:0});obs.observe(visual);
const mo=new MutationObserver(()=>{if(root.classList.contains('lab-paused'))stop();else start()});mo.observe(root,{attributes:true,attributeFilter:['class']});
canvas.addEventListener('webglcontextlost',e=>{e.preventDefault();active=false;stop();root.classList.remove('lab-webgl-ready')});
window.addEventListener('resize',resize,{passive:true});loadEarth();start();
})();
