/* Preview-only: genuine Three.js 3D, progressive SVG fallback. */
const root=document.querySelector('#dev-tech-lab');
if(root){
 const stage=root.querySelector('.dt-stage'), buttons=[...root.querySelectorAll('.dt-tabs button')], detail=root.querySelector('.dt-detail');
 const copy=[['Інтерфейс продукту','Сайти, вебзастосунки й особисті кабінети, через які клієнти взаємодіють із бізнесом.'],['Керування бізнесом','CRM об’єднує заявки, замовлення та завдання команди в одному робочому просторі.'],['Інтеграція систем','API пов’язує сайт, CRM, оплату, склад та зовнішні сервіси.'],['Інфраструктура та дані','Бази даних, серверна логіка, резервне відновлення та контроль помилок.']];
 let selected=0, onSelect=()=>{};
 buttons.forEach((button,i)=>button.addEventListener('click',()=>{
  selected=i;buttons.forEach((b,j)=>b.setAttribute('aria-pressed',String(i===j)));
  detail.querySelector('strong').textContent=copy[i][0];detail.querySelector('p').textContent=copy[i][1];
  root.querySelectorAll('.dt-fallback-layer').forEach(g=>g.classList.toggle('active',Number(g.dataset.layer)===i));onSelect();
 }));
 const reduced=matchMedia('(prefers-reduced-motion: reduce)');
 async function init(){
  let renderer;
  try{
   const T=await import('https://cdn.jsdelivr.net/npm/three@0.160.1/build/three.module.js');
   renderer=new T.WebGLRenderer({alpha:true,antialias:true,powerPreference:'low-power'});
   renderer.setPixelRatio(Math.min(devicePixelRatio||1,1.5));renderer.setClearColor(0x000000,0);
   renderer.outputColorSpace=T.SRGBColorSpace;renderer.toneMapping=T.ACESFilmicToneMapping;renderer.toneMappingExposure=1.25;
   const scene=new T.Scene(), camera=new T.PerspectiveCamera(34,1,.1,100);
   camera.position.set(8.7,7.1,10.5);camera.lookAt(0,0,0);
   scene.add(new T.HemisphereLight(0xfffaf0,0x8d8578,2.5));
   const key=new T.DirectionalLight(0xfff4e4,3.2);key.position.set(-5,9,6);scene.add(key);
   const fill=new T.DirectionalLight(0xdbe7ff,1.4);fill.position.set(5,2,-7);scene.add(fill);
   const model=new T.Group();scene.add(model);
   const cream=new T.MeshPhysicalMaterial({color:0xeee6d8,metalness:.18,roughness:.29,clearcoat:.8,clearcoatRoughness:.27});
   const metal=new T.MeshStandardMaterial({color:0xb4ab9e,metalness:.67,roughness:.35});
   const dark=new T.MeshStandardMaterial({color:0x383a35,metalness:.35,roughness:.42});
   const red=new T.MeshStandardMaterial({color:0xa73e32,metalness:.2,roughness:.3,emissive:0x4e1008,emissiveIntensity:.12});
   const light=new T.MeshStandardMaterial({color:0xfff8ec,metalness:.05,roughness:.38});
   const lineMat=new T.LineBasicMaterial({color:0x9a8b79,transparent:true,opacity:.72});
   const layers=[], rims=[], baseY=[2.05,.68,-.69,-2.06];
   function box(parent,w,h,d,x,y,z,mat){const m=new T.Mesh(new T.BoxGeometry(w,h,d),mat);m.position.set(x,y,z);parent.add(m);return m}
   function edge(parent,w,h,d,x,y,z,mat=lineMat){const geo=new T.BoxGeometry(w,h,d);const e=new T.LineSegments(new T.EdgesGeometry(geo),mat);geo.dispose();e.position.set(x,y,z);parent.add(e);return e}
   function tube(parent,a,b,r,mat){const v=new T.Vector3().subVectors(b,a);const m=new T.Mesh(new T.CylinderGeometry(r,r,v.length(),12),mat);m.position.copy(a).add(b).multiplyScalar(.5);m.quaternion.setFromUnitVectors(new T.Vector3(0,1,0),v.normalize());parent.add(m);return m}
   function sphere(parent,x,y,z,r,mat){const m=new T.Mesh(new T.SphereGeometry(r,14,10),mat);m.position.set(x,y,z);parent.add(m);return m}
   for(let i=0;i<4;i++){
    const g=new T.Group();g.position.y=baseY[i];model.add(g);layers.push(g);
    box(g,3.75,.15,2.8,0,0,0,metal);box(g,3.68,.09,2.73,0,.10,0,cream);
    const rim=new T.LineBasicMaterial({color:0x9a8b79,transparent:true,opacity:.8});rims.push(rim);edge(g,3.76,.25,2.81,0,.045,0,rim);
    for(const x of [-1.65,1.65])for(const z of [-1.18,1.18])sphere(g,x,.17,z,.045,metal);
    if(i===0){
     box(g,2.65,.11,1.95,0,.23,0,dark);box(g,2.55,.035,1.85,0,.30,0,light);
     box(g,2.35,.02,.24,0,.327,-.66,metal);box(g,.76,.025,.96,-.73,.33,.13,red);
     for(let j=0;j<4;j++)box(g,.95,.023,.07,.54,.33,-.25+j*.21,j===0?dark:metal);
     box(g,.68,.026,.18,.45,.33,.65,red);
    }else if(i===1){
     for(let j=0;j<3;j++){const x=-1.05+j*1.05;box(g,.86,.42,1.48,x,.39,0,j===1?dark:cream);edge(g,.87,.43,1.49,x,.39,0);box(g,.58,.018,.10,x,.614,-.40,j===1?red:dark);for(let k=0;k<3;k++)box(g,.55,.018,.055,x,.614,-.12+k*.21,j===1?light:metal);}
    }else if(i===2){
     const nodes=[[-1.15,-.67],[1.15,-.67],[-1.15,.67],[1.15,.67],[0,0]];
     for(let j=0;j<4;j++){const [x,z]=nodes[j];tube(g,new T.Vector3(x,.23,z),new T.Vector3(0,.23,0),.025,red);box(g,.48,.20,.48,x,.26,z,cream);edge(g,.49,.21,.49,x,.26,z);sphere(g,x,.39,z,.065,red);}
     box(g,.74,.30,.74,0,.32,0,dark);box(g,.33,.035,.33,0,.49,0,red);
    }else{
     for(let j=0;j<3;j++){box(g,1.92,.22,1.32,0,.26+j*.25,0,j===2?cream:dark);edge(g,1.93,.23,1.33,0,.26+j*.25,0);box(g,1.25,.035,.025,-.15,.27+j*.25,.674,metal);sphere(g,.76,.27+j*.25,.681,.045,red);}
    }
   }
   const particles=[];
   for(let i=0;i<3;i++)for(const x of [-1.48,1.48]){
    const a=new T.Vector3(x,baseY[i]-.12,.9),b=new T.Vector3(x,baseY[i+1]+.15,.9);
    tube(model,a,b,.012,metal);const p=sphere(model,x,a.y,.9,.052,red);particles.push({p,a,b,offset:i*.31+(x>0?.5:0)});
   }
   // Broad soft contact shadow without expensive real-time shadow maps.
   const shadowCanvas=document.createElement('canvas');shadowCanvas.width=shadowCanvas.height=128;const ctx=shadowCanvas.getContext('2d');
   const grad=ctx.createRadialGradient(64,64,5,64,64,62);grad.addColorStop(0,'rgba(67,52,35,.25)');grad.addColorStop(1,'rgba(67,52,35,0)');ctx.fillStyle=grad;ctx.fillRect(0,0,128,128);
   const shadow=new T.Mesh(new T.PlaneGeometry(7,7),new T.MeshBasicMaterial({map:new T.CanvasTexture(shadowCanvas),transparent:true,depthWrite:false}));shadow.rotation.x=-Math.PI/2;shadow.position.y=-2.32;scene.add(shadow);
   renderer.domElement.setAttribute('aria-hidden','true');stage.append(renderer.domElement);
   let visible=true,raf=0,px=0,py=0,last=0,failed=false;
   function resize(){const w=stage.clientWidth,h=stage.clientHeight;if(!w||!h)return;renderer.setSize(w,h,false);camera.aspect=w/h;camera.fov=w/h<1.1?40:34;camera.updateProjectionMatrix();draw(performance.now(),true);}
   function draw(t,force=false){if(failed||(!visible&&!force))return;
    const time=t*.001;for(let i=0;i<4;i++){const target=baseY[i]+(i===selected?.16:0);layers[i].position.y=reduced.matches?target:layers[i].position.y+(target-layers[i].position.y)*.13;rims[i].color.set(i===selected?0xa73e32:0x9a8b79);rims[i].opacity=i===selected?1:.55;}
    model.rotation.y=reduced.matches?0:model.rotation.y+(px*.22-model.rotation.y)*.07;model.rotation.x=reduced.matches?0:model.rotation.x+(py*.12-model.rotation.x)*.07;
    for(const o of particles){const k=reduced.matches?.5:(time*.55+o.offset)%1;o.p.position.lerpVectors(o.a,o.b,k);}
    renderer.render(scene,camera);
   }
   function loop(t){raf=0;if(failed||!visible||document.hidden||reduced.matches)return;if(t-last>32){draw(t);last=t;}raf=requestAnimationFrame(loop);}
   function start(){if(!failed&&!raf&&visible&&!document.hidden&&!reduced.matches)raf=requestAnimationFrame(loop);}
   onSelect=()=>{draw(performance.now(),true);start();};
   stage.addEventListener('pointermove',e=>{if(e.pointerType!=='mouse'||reduced.matches)return;const r=stage.getBoundingClientRect();px=(e.clientX-r.left)/r.width*2-1;py=(e.clientY-r.top)/r.height*2-1;});
   stage.addEventListener('pointerleave',()=>{px=py=0;});
   new ResizeObserver(resize).observe(stage);
   new IntersectionObserver(entries=>{visible=entries[0].isIntersecting;if(visible){draw(performance.now(),true);start();}else if(raf){cancelAnimationFrame(raf);raf=0;}},{rootMargin:'40px'}).observe(stage);
   document.addEventListener('visibilitychange',()=>{if(document.hidden&&raf){cancelAnimationFrame(raf);raf=0;}else start();});
   reduced.addEventListener('change',()=>{if(raf){cancelAnimationFrame(raf);raf=0;}draw(performance.now(),true);start();});
   renderer.domElement.addEventListener('webglcontextlost',e=>{e.preventDefault();failed=true;if(raf)cancelAnimationFrame(raf);renderer.domElement.remove();stage.removeAttribute('data-webgl');});
   resize();stage.dataset.webgl='true';start();
  }catch(e){if(renderer){renderer.domElement.remove();renderer.dispose();}stage.removeAttribute('data-webgl');}
 }
 init();
}
