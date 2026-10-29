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
float hash(vec3 p){p=fract(p*.3183099+.1);p*=17.;return fract(p.x*p.y*p.z*(p.x+p.y+p.z));}
float noise(vec3 p){vec3 i=floor(p),f=fract(p);f=f*f*(3.-2.*f);return mix(mix(mix(hash(i),hash(i+vec3(1,0,0)),f.x),mix(hash(i+vec3(0,1,0)),hash(i+vec3(1,1,0)),f.x),f.y),mix(mix(hash(i+vec3(0,0,1)),hash(i+vec3(1,0,1)),f.x),mix(hash(i+vec3(0,1,1)),hash(i+vec3(1,1,1)),f.x),f.y),f.z);}
float fbm(vec3 p){float f=0.,a=.5;for(int k=0;k<5;k++){f+=noise(p)*a;p=p*2.03+2.1;a*=.5;}return f;}
void main(){
vec2 p=v*1.035;float r2=dot(p,p);if(r2>1.)discard;
vec3 n=normalize(vec3(p,sqrt(max(0.,1.-r2))));
float t=u_time*.065;
float a=t+u_pointer.x*.34;
mat3 ry=mat3(cos(a),0.,sin(a),0.,1.,0.,-sin(a),0.,cos(a));
vec3 q=ry*n;
q.yz=mat2(cos(u_pointer.y*.18),-sin(u_pointer.y*.18),sin(u_pointer.y*.18),cos(u_pointer.y*.18))*q.yz;
float tect=fbm(q*3.2+vec3(.7,1.8,4.1));
float detail=fbm(q*13.+vec3(3.2,4.,1.));
float ridges=abs(sin(tect*18.+detail*4.));
float land=smoothstep(.42,.67,tect+detail*.16);
vec3 deep=vec3(.022,.072,.074);
vec3 stone=mix(vec3(.18,.19,.17),vec3(.54,.39,.29),detail);
vec3 base=mix(deep,stone,land);
float fault=pow(1.-ridges,10.)*land;
float lava=fault*smoothstep(.44,.74,tect+detail*.14);
base+=vec3(1.25,.24,.035)*lava;
vec3 light=normalize(vec3(-.55,.68,1.));
float lit=max(dot(n,light),0.);
base*=.2+1.13*lit;
float rim=pow(1.-max(n.z,0.),3.);
base+=vec3(1.,.31,.10)*rim*.8;
base+=vec3(.16,.5,.4)*pow(max(dot(n,normalize(vec3(.5,-.5,1.))),0.),9.)*.19;
float spec=pow(max(dot(reflect(-light,n),vec3(0,0,1)),0.),19.)*.2;
base+=spec*vec3(1.,.78,.48);
float alpha=1.-smoothstep(.985,1.005,length(p));
gl_FragColor=vec4(base,alpha);
}`;
function compile(kind,src){const sh=gl.createShader(kind);gl.shaderSource(sh,src);gl.compileShader(sh);if(!gl.getShaderParameter(sh,gl.COMPILE_STATUS)){gl.deleteShader(sh);throw Error('WebGL shader compile failed')}return sh}
let program;
try{program=gl.createProgram();gl.attachShader(program,compile(gl.VERTEX_SHADER,vs));gl.attachShader(program,compile(gl.FRAGMENT_SHADER,fs));gl.linkProgram(program);if(!gl.getProgramParameter(program,gl.LINK_STATUS))throw Error('WebGL link failed')}catch{return}
gl.useProgram(program);
const buf=gl.createBuffer();gl.bindBuffer(gl.ARRAY_BUFFER,buf);gl.bufferData(gl.ARRAY_BUFFER,new Float32Array([-1,-1,1,-1,-1,1,1,1]),gl.STATIC_DRAW);
const loc=gl.getAttribLocation(program,'a');gl.enableVertexAttribArray(loc);gl.vertexAttribPointer(loc,2,gl.FLOAT,false,0,0);
const tm=gl.getUniformLocation(program,'u_time'),pointer=gl.getUniformLocation(program,'u_pointer');
core.prepend(canvas);root.classList.add('lab-webgl-ready');
let active=true,visible=true,frame=0,time=0,last=0,targetX=0,targetY=0,smoothX=0,smoothY=0;
function resize(){const r=core.getBoundingClientRect(),dpr=Math.min(window.devicePixelRatio||1,1.6);const size=Math.max(160,Math.min(900,Math.round(Math.max(r.width,r.height)*dpr)));if(canvas.width!==size){canvas.width=size;canvas.height=size;gl.viewport(0,0,size,size)}}
function draw(now){frame=0;if(!active||!visible||root.classList.contains('lab-paused'))return;
if(last)time+=Math.min((now-last)/1000,.05);last=now;resize();smoothX+=(targetX-smoothX)*.08;smoothY+=(targetY-smoothY)*.08;
gl.uniform1f(tm,time);gl.uniform2f(pointer,smoothX,smoothY);gl.clearColor(0,0,0,0);gl.clear(gl.COLOR_BUFFER_BIT);gl.drawArrays(gl.TRIANGLE_STRIP,0,4);frame=requestAnimationFrame(draw)}
function start(){last=0;if(!frame&&active&&visible&&!root.classList.contains('lab-paused'))frame=requestAnimationFrame(draw)}
function stop(){if(frame)cancelAnimationFrame(frame);frame=0}
visual.addEventListener('pointermove',e=>{const r=visual.getBoundingClientRect();targetX=(e.clientX-r.left)/r.width*2.-1.;targetY=(e.clientY-r.top)/r.height*2.-1.},{passive:true});
visual.addEventListener('pointerleave',()=>{targetX=0;targetY=0});
document.addEventListener('visibilitychange',()=>{visible=!document.hidden;if(visible)start();else stop()});
const obs=new IntersectionObserver(es=>{visible=es[0].isIntersecting&&!document.hidden;if(visible)start();else stop()},{threshold:0});obs.observe(visual);
const mo=new MutationObserver(()=>{if(root.classList.contains('lab-paused'))stop();else start()});mo.observe(root,{attributes:true,attributeFilter:['class']});
canvas.addEventListener('webglcontextlost',e=>{e.preventDefault();active=false;stop();root.classList.remove('lab-webgl-ready')});
window.addEventListener('resize',resize,{passive:true});start();
})();
