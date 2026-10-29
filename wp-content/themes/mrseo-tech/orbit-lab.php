<?php if(!defined('ABSPATH'))exit;get_header();?>
<style>
.orbit-lab{--lab-ink:#eeeae2;--lab-accent:#ff6c51;--lab-muted:#9fa69e;background:#101614;color:var(--lab-ink);min-height:calc(100svh - 80px);position:relative;overflow:hidden;isolation:isolate}
.orbit-lab:before{content:"";position:absolute;inset:0;background:radial-gradient(ellipse at 77% 45%,#24433a70,transparent 47%),linear-gradient(100deg,#121916 0%,#101614 65%);pointer-events:none}
.orbit-lab .lab-grid{position:absolute;inset:0;opacity:.16;background-image:linear-gradient(#a2c7b319 1px,transparent 1px),linear-gradient(90deg,#a2c7b319 1px,transparent 1px);background-size:55px 55px;mask-image:linear-gradient(90deg,transparent 0%,black 60%)}
.orbit-lab .lab-shell{max-width:1440px;min-height:780px;margin:auto;padding:100px clamp(22px,5vw,75px) 90px;display:grid;grid-template-columns:minmax(340px,.85fr) minmax(500px,1.15fr);align-items:center;gap:20px;position:relative}
.orbit-lab .lab-label{display:inline-flex;align-items:center;gap:12px;color:#a6afa8;font:700 11px/1.3 inherit;letter-spacing:.18em;text-transform:uppercase}.orbit-lab .lab-label:before{content:"";width:26px;height:1px;background:var(--lab-accent)}
.orbit-lab .lab-copy{position:relative;z-index:4}
.orbit-lab .lab-copy h1{font-size:clamp(55px,6.1vw,103px);line-height:.95;letter-spacing:-.09em;margin:30px 0 28px;font-weight:700;color:#f2f0e9}
.orbit-lab .lab-copy h1 em{font-style:normal;color:var(--lab-accent)}
.orbit-lab .lab-lead{max-width:460px;color:#adb8b1;font-size:clamp(16px,1.42vw,19px);line-height:1.8;margin:0 0 36px}
.orbit-lab .lab-actions{display:flex;gap:15px;flex-wrap:wrap;align-items:center}
.orbit-lab .lab-action{display:inline-flex;align-items:center;justify-content:space-between;gap:30px;border-radius:100px;padding:17px 23px;text-decoration:none!important;background:#eeeae1;color:#17201b;font-size:14px;font-weight:800;transition:transform .25s,background .25s}
.orbit-lab .lab-action:hover{transform:translateY(-3px);background:#ff9277}
.orbit-lab .lab-action-quiet{border:1px solid #607168;background:transparent;color:#f3f0e8}
.orbit-lab .lab-action-quiet:hover{background:#22342c;color:#fff}
.orbit-lab .lab-status{margin-top:55px;display:grid;grid-template-columns:1fr 1fr;gap:20px;max-width:465px;border-top:1px solid #4e5b52;padding-top:21px}
.orbit-lab .lab-status span{display:block;color:#7b8a81;font-size:10px;letter-spacing:.17em;text-transform:uppercase;margin-bottom:8px}
.orbit-lab .lab-status strong{font-size:14px;color:#e7eae5;font-weight:600}
.orbit-lab .lab-visual{position:relative;aspect-ratio:1;min-width:0;width:100%;max-width:760px;margin:0 auto;display:grid;place-items:center}
.orbit-lab .lab-visual:before{content:"";position:absolute;width:84%;height:84%;border-radius:50%;background:radial-gradient(circle,#6b9a7933,transparent 64%);filter:blur(20px)}
.orbit-lab .lab-orbit{position:absolute;border:1px solid #8eaea84d;border-radius:50%;transform:rotate(-27deg);pointer-events:none}
.orbit-lab .lab-orbit-one{width:56%;height:56%;border-style:dashed;animation:lab-orbit-turn 60s linear infinite}
.orbit-lab .lab-orbit-two{width:82%;height:82%;border-color:#9db5a34d;animation:lab-orbit-turn 90s linear infinite reverse}
.orbit-lab .lab-orbit-three{width:99%;height:99%;border-color:#6b827340;animation:lab-orbit-turn 110s linear infinite}
.orbit-lab .lab-core{position:absolute;width:39%;aspect-ratio:1;border-radius:50%;display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;z-index:2;background:radial-gradient(circle at 28% 22%,#79988a 0%,#34564a 28%,#182c27 62%,#0b1915 90%);border:1px solid #749c8990;box-shadow:inset -17px -22px 35px #040d0aaf,inset 12px 15px 35px #bedac220,0 0 40px #9ad2b01b,0 0 100px #6eb88b17;transition:box-shadow .5s,transform .5s}
.orbit-lab .lab-core:hover{transform:scale(1.035);box-shadow:inset -17px -22px 35px #040d0aaf,0 0 80px #c0dcca45}
.orbit-lab .lab-core:after{content:"";inset:12px;position:absolute;border:1px solid #b6dec72b;border-radius:50%}
.orbit-lab .lab-core small{font-size:10px;color:#b4d2c2;letter-spacing:.2em;text-transform:uppercase;z-index:2}
.orbit-lab .lab-core strong{color:#fff;font-size:clamp(21px,2.2vw,32px);letter-spacing:-.05em;line-height:1.1;margin:11px 0;z-index:2}
.orbit-lab .lab-core .lab-core-signal{width:35px;height:3px;background:var(--lab-accent);border-radius:8px;z-index:2}
.orbit-lab .lab-node{position:absolute;z-index:5;background:#1a2520e8;border:1px solid #6f87766b;color:#f3f1ea;border-radius:100px;display:flex;align-items:center;gap:10px;padding:13px 16px;cursor:pointer;font-size:13px;letter-spacing:.005em;font-weight:650;box-shadow:0 15px 35px #050e0a77;transition:transform .3s,border-color .3s,background .3s,box-shadow .3s;white-space:nowrap}
.orbit-lab .lab-node i{width:7px;height:7px;border-radius:50%;background:#719584;box-shadow:0 0 0 4px #71958418;display:block}
.orbit-lab .lab-node:hover,.orbit-lab .lab-node.active{border-color:var(--lab-accent);background:#304339;transform:translateY(-5px) scale(1.04);box-shadow:0 0 32px #d9694c33}
.orbit-lab .lab-node.active i{background:var(--lab-accent)}
.orbit-lab .lab-node-1{top:13%;left:29%}.orbit-lab .lab-node-2{top:29%;right:0}.orbit-lab .lab-node-3{bottom:23%;right:0}.orbit-lab .lab-node-4{bottom:9%;left:31%}.orbit-lab .lab-node-5{bottom:31%;left:-4%}.orbit-lab .lab-node-6{top:24%;left:0}
.orbit-lab .lab-detail{position:absolute;bottom:0;left:50%;transform:translateX(-50%);width:min(420px,90%);z-index:6;padding:15px 22px;border:1px solid #56726677;background:#18261fdd;backdrop-filter:blur(14px);border-radius:14px;display:flex;gap:15px;align-items:center}
.orbit-lab .lab-detail span{font-size:10px;letter-spacing:.12em;color:var(--lab-accent);font-weight:700}.orbit-lab .lab-detail strong{font-size:13px;font-weight:500;color:#e1e9e2}
.orbit-lab .lab-intro-note{position:absolute;right:6%;top:30px;color:#71857b;letter-spacing:.16em;font-size:10px;text-transform:uppercase}
@keyframes lab-orbit-turn{to{transform:rotate(333deg)}}
@media(max-width:1050px){.orbit-lab .lab-shell{grid-template-columns:1fr;gap:50px;padding-top:75px}.orbit-lab .lab-copy{max-width:720px}.orbit-lab .lab-visual{max-width:650px}.orbit-lab .lab-copy h1{font-size:clamp(55px,8vw,94px)}}
@media(max-width:620px){.orbit-lab .lab-shell{padding:65px 18px 75px;min-height:0}.orbit-lab .lab-copy h1{font-size:clamp(47px,12vw,75px)}.orbit-lab .lab-visual{width:100%;aspect-ratio:1.1;margin-top:15px}.orbit-lab .lab-node{font-size:10px;padding:9px 10px;gap:6px}.orbit-lab .lab-node-2,.orbit-lab .lab-node-3{right:-3px}.orbit-lab .lab-node-5{left:0}.orbit-lab .lab-core{width:44%}.orbit-lab .lab-core strong{font-size:19px}.orbit-lab .lab-intro-note{display:none}.orbit-lab .lab-detail{bottom:-32px;padding:12px 14px}.orbit-lab .lab-detail strong{font-size:11px}}
@media(prefers-reduced-motion:reduce){.orbit-lab .lab-orbit{animation:none}.orbit-lab *{scroll-behavior:auto!important}}

/* Interactive concept 02 — orbital controls */
.orbit-lab .lab-visual{--lab-x:0px;--lab-y:0px;--lab-tilt-x:0deg;--lab-tilt-y:0deg}
.orbit-lab .lab-core{transform:translate3d(calc(var(--lab-x)*.36),calc(var(--lab-y)*.36),0) perspective(650px) rotateX(var(--lab-tilt-x)) rotateY(var(--lab-tilt-y));transition:transform .22s ease-out,box-shadow .4s}
.orbit-lab .lab-core:hover{transform:translate3d(calc(var(--lab-x)*.36),calc(var(--lab-y)*.36),0) perspective(650px) rotateX(var(--lab-tilt-x)) rotateY(var(--lab-tilt-y)) scale(1.04)}
.orbit-lab .lab-orbit-one{translate:calc(var(--lab-x)*.1) calc(var(--lab-y)*.1)}
.orbit-lab .lab-orbit-two{translate:calc(var(--lab-x)*.2) calc(var(--lab-y)*.2)}
.orbit-lab .lab-orbit-three{translate:calc(var(--lab-x)*.3) calc(var(--lab-y)*.3)}
.orbit-lab .lab-connectors{position:absolute;inset:0;width:100%;height:100%;pointer-events:none;z-index:1;overflow:visible}
.orbit-lab .lab-connectors line{stroke:#ff8465;stroke-width:1.5;stroke-dasharray:6 7;filter:drop-shadow(0 0 6px #ff765b);transition:x2 .45s,y2 .45s;animation:lab-pulse 2.4s ease-in-out infinite}
.orbit-lab .lab-connectors circle{fill:#ff8465;filter:drop-shadow(0 0 8px #ff765b)}
@keyframes lab-pulse{50%{opacity:.36;stroke-dashoffset:32}}
.orbit-lab .lab-controls{display:flex;align-items:center;gap:9px;flex-wrap:wrap;margin-top:23px}
.orbit-lab .lab-control{background:#182720;color:#e3ede5;border:1px solid #496254;border-radius:100px;padding:10px 15px;font-size:12px;font-weight:750;cursor:pointer;transition:background .25s,border-color .25s}
.orbit-lab .lab-control:hover,.orbit-lab .lab-control[aria-pressed=true]{background:#355644;border-color:#fb765f}
.orbit-lab .lab-controls-note{font-size:11px;color:#899d8f;letter-spacing:.02em}
.orbit-lab .lab-node:focus-visible,.orbit-lab .lab-control:focus-visible{outline:2px solid #ff987c;outline-offset:4px}
.orbit-lab.lab-paused .lab-orbit,.orbit-lab.lab-paused .lab-connectors line{animation-play-state:paused}
.orbit-lab .lab-detail{transition:border-color .3s,box-shadow .3s}
.orbit-lab .lab-detail.lab-flash{border-color:#fa8b6f;box-shadow:0 0 32px #ff80532a}
@media(max-width:620px){.orbit-lab .lab-controls{margin-top:18px}.orbit-lab .lab-controls-note{width:100%}}
@media(prefers-reduced-motion:reduce){.orbit-lab .lab-core{transform:none!important}.orbit-lab .lab-connectors line{animation:none}}
</style>
<main class="orbit-lab"><div class="lab-grid" aria-hidden="true"></div><div class="lab-shell"><div class="lab-copy"><div class="lab-label">MRSEO.TECH / EXPERIMENT 01</div><h1><?php echo wp_kses_post(mrseo_t('Ваш бізнес.<br><em>Нова орбіта</em> зростання.','Ваш бизнес.<br><em>Новая орбита</em> роста.','Your business.<br><em>A new orbit</em> of growth.'));?></h1><p class="lab-lead"><?php echo esc_html(mrseo_t('SEO, реклама й аналітика не повинні працювати окремо. Ми поєднуємо технології та маркетинг в одну систему, яка допомагає вирішувати бізнес-завдання.','SEO, реклама и аналитика не должны работать по отдельности. Мы объединяем технологии и маркетинг в систему для решения бизнес-задач.','SEO, paid media and analytics work best as one connected system. We align technology and marketing around business problems.'));?></p><div class="lab-actions"><a class="lab-action" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html(mrseo_t('Обговорити проєкт','Обсудить проект','Discuss a project'));?> <span>↗</span></a><a class="lab-action lab-action-quiet" href="<?php echo esc_url(mrseo_url());?>"><?php echo esc_html(mrseo_t('На головну','На главную','Back to homepage'));?></a></div><div class="lab-controls"><button type="button" class="lab-control" id="lab-autoplay" aria-pressed="false">▶ <?php echo esc_html(mrseo_t("Автоогляд","Автообзор","Auto tour"));?></button><button type="button" class="lab-control" id="lab-motion" aria-pressed="false">Ⅱ <?php echo esc_html(mrseo_t("Зупинити рух","Остановить движение","Pause motion"));?></button><span class="lab-controls-note"><?php echo esc_html(mrseo_t("Наведіть курсор на орбіту або оберіть напрям","Наведите курсор на орбиту или выберите направление","Move your pointer or select a service"));?></span></div><div class="lab-status"><div><span>DESIGN DIRECTION</span><strong>Orbital Growth System</strong></div><div><span>EXPERIMENT STATUS</span><strong>Private concept / 01</strong></div></div></div><div class="lab-visual" aria-label="<?php echo esc_attr(mrseo_t('Інтерактивна схема маркетингових напрямів','Интерактивная схема маркетинговых направлений','Interactive marketing service map'));?>"><svg class="lab-connectors" aria-hidden="true"><line id="lab-link" x1="50%" y1="50%" x2="50%" y2="50%"></line><circle id="lab-link-point" cx="50%" cy="50%" r="4"></circle></svg><div class="lab-orbit lab-orbit-one"></div><div class="lab-orbit lab-orbit-two"></div><div class="lab-orbit lab-orbit-three"></div><div class="lab-core"><small>CONNECTED SYSTEM</small><strong>MRSEO<br>GROWTH</strong><div class="lab-core-signal"></div></div>
<?php
$nodes=array(
array('SEO',mrseo_t('Органічний попит і видимість','Органический спрос и видимость','Organic demand & visibility')),
array('Google Ads',mrseo_t('Керований платний трафік','Управляемый платный трафик','Intent-driven paid acquisition')),
array('Analytics',mrseo_t('Дані для точних рішень','Данные для точных решений','Data-driven decisions')),
array('E-commerce',mrseo_t('Зростання каталогу та продажів','Рост каталога и продаж','Catalog architecture & growth')),
array('Technical SEO',mrseo_t('Технічна якість сайту','Техническое качество сайта','Technical foundations')),
array('Web Development',mrseo_t('Сайти, які працюють на бізнес','Сайты, которые работают на бизнес','Websites built for business'))
);
foreach($nodes as $i=>$node):?><button type="button" class="lab-node lab-node-<?php echo $i+1;?><?php echo $i===0?' active':'';?>" data-lab-title="<?php echo esc_attr($node[0]);?>" data-lab-detail="<?php echo esc_attr($node[1]);?>" aria-pressed="<?php echo $i===0?'true':'false';?>"><i aria-hidden="true"></i><?php echo esc_html($node[0]);?></button><?php endforeach;?><div class="lab-detail" aria-live="polite"><span id="lab-selected">01 / SEO</span><strong id="lab-selected-detail"><?php echo esc_html($nodes[0][1]);?></strong></div></div><span class="lab-intro-note">INTERACTIVE STRATEGY MODEL / 2026</span></div></main>
<script>
(()=>{'use strict';
const root=document.querySelector('.orbit-lab');if(!root)return;
const visual=root.querySelector('.lab-visual'),core=root.querySelector('.lab-core');
const nodes=[...root.querySelectorAll('.lab-node')],title=root.querySelector('#lab-selected'),detail=root.querySelector('#lab-selected-detail'),box=root.querySelector('.lab-detail');
const line=root.querySelector('#lab-link'),dot=root.querySelector('#lab-link-point'),auto=root.querySelector('#lab-autoplay'),motion=root.querySelector('#lab-motion');
const reduced=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
let selected=0,tour=null,flash=null,raf=0;
function connect(){
 const v=visual.getBoundingClientRect(),n=nodes[selected].getBoundingClientRect(),c=core.getBoundingClientRect();
 const x1=c.left+c.width/2-v.left,y1=c.top+c.height/2-v.top,x2=n.left+n.width/2-v.left,y2=n.top+n.height/2-v.top;
 line.setAttribute('x1',x1);line.setAttribute('y1',y1);line.setAttribute('x2',x2);line.setAttribute('y2',y2);
 dot.setAttribute('cx',x2);dot.setAttribute('cy',y2);
}
function pick(index){
 selected=(index+nodes.length)%nodes.length;
 nodes.forEach((n,i)=>{const active=i===selected;n.classList.toggle('active',active);n.setAttribute('aria-pressed',String(active))});
 title.textContent=String(selected+1).padStart(2,'0')+' / '+nodes[selected].dataset.labTitle;
 detail.textContent=nodes[selected].dataset.labDetail;
 box.classList.remove('lab-flash');void box.offsetWidth;box.classList.add('lab-flash');
 if(flash)clearTimeout(flash);flash=setTimeout(()=>box.classList.remove('lab-flash'),550);
 connect();
}
function stopTour(){if(tour)clearInterval(tour);tour=null;auto.setAttribute('aria-pressed','false')}
nodes.forEach((n,i)=>{n.addEventListener('click',()=>{stopTour();pick(i)});n.addEventListener('mouseenter',()=>{if(!tour)pick(i)});n.addEventListener('focus',()=>{stopTour();pick(i)})});
auto.addEventListener('click',()=>{if(tour){stopTour();return}pick((selected+1)%nodes.length);tour=setInterval(()=>pick((selected+1)%nodes.length),2600);auto.setAttribute('aria-pressed','true')});
motion.addEventListener('click',()=>{const paused=root.classList.toggle('lab-paused');motion.setAttribute('aria-pressed',String(paused));if(paused){stopTour();visual.style.setProperty('--lab-x','0px');visual.style.setProperty('--lab-y','0px');visual.style.setProperty('--lab-tilt-x','0deg');visual.style.setProperty('--lab-tilt-y','0deg')}});
if(!reduced&&window.matchMedia('(pointer:fine)').matches){
 visual.addEventListener('pointermove',e=>{if(root.classList.contains('lab-paused'))return;const r=visual.getBoundingClientRect(),x=(e.clientX-r.left)/r.width-.5,y=(e.clientY-r.top)/r.height-.5;
 visual.style.setProperty('--lab-x',(x*22).toFixed(1)+'px');visual.style.setProperty('--lab-y',(y*22).toFixed(1)+'px');
 visual.style.setProperty('--lab-tilt-x',(-y*12).toFixed(1)+'deg');visual.style.setProperty('--lab-tilt-y',(x*12).toFixed(1)+'deg');
 if(!raf)raf=requestAnimationFrame(()=>{connect();raf=0});
 },{passive:true});
 visual.addEventListener('pointerleave',()=>{visual.style.setProperty('--lab-x','0px');visual.style.setProperty('--lab-y','0px');visual.style.setProperty('--lab-tilt-x','0deg');visual.style.setProperty('--lab-tilt-y','0deg');requestAnimationFrame(connect)});
}
window.addEventListener('resize',connect,{passive:true});window.addEventListener('load',connect,{once:true});
if('ResizeObserver' in window)new ResizeObserver(connect).observe(visual);
if(reduced){root.classList.add('lab-paused');motion.setAttribute('aria-pressed','true')}
requestAnimationFrame(connect);
})();
</script>
<?php get_footer();?>