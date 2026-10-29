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
</style>
<main class="orbit-lab"><div class="lab-grid" aria-hidden="true"></div><div class="lab-shell"><div class="lab-copy"><div class="lab-label">MRSEO.TECH / EXPERIMENT 01</div><h1><?php echo wp_kses_post(mrseo_t('Ваш бізнес.<br><em>Нова орбіта</em> зростання.','Ваш бизнес.<br><em>Новая орбита</em> роста.','Your business.<br><em>A new orbit</em> of growth.'));?></h1><p class="lab-lead"><?php echo esc_html(mrseo_t('SEO, реклама й аналітика не повинні працювати окремо. Ми поєднуємо технології та маркетинг в одну систему, яка допомагає вирішувати бізнес-завдання.','SEO, реклама и аналитика не должны работать по отдельности. Мы объединяем технологии и маркетинг в систему для решения бизнес-задач.','SEO, paid media and analytics work best as one connected system. We align technology and marketing around business problems.'));?></p><div class="lab-actions"><a class="lab-action" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html(mrseo_t('Обговорити проєкт','Обсудить проект','Discuss a project'));?> <span>↗</span></a><a class="lab-action lab-action-quiet" href="<?php echo esc_url(mrseo_url());?>"><?php echo esc_html(mrseo_t('На головну','На главную','Back to homepage'));?></a></div><div class="lab-status"><div><span>DESIGN DIRECTION</span><strong>Orbital Growth System</strong></div><div><span>EXPERIMENT STATUS</span><strong>Private concept / 01</strong></div></div></div><div class="lab-visual" aria-label="<?php echo esc_attr(mrseo_t('Інтерактивна схема маркетингових напрямів','Интерактивная схема маркетинговых направлений','Interactive marketing service map'));?>"><div class="lab-orbit lab-orbit-one"></div><div class="lab-orbit lab-orbit-two"></div><div class="lab-orbit lab-orbit-three"></div><div class="lab-core"><small>CONNECTED SYSTEM</small><strong>MRSEO<br>GROWTH</strong><div class="lab-core-signal"></div></div>
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
(()=>{const root=document.querySelector('.orbit-lab');if(!root)return;const nodes=[...root.querySelectorAll('.lab-node')];const title=root.querySelector('#lab-selected');const detail=root.querySelector('#lab-selected-detail');const pick=(node)=>{nodes.forEach(n=>{let active=n===node;n.classList.toggle('active',active);n.setAttribute('aria-pressed',String(active))});title.textContent=String(nodes.indexOf(node)+1).padStart(2,'0')+' / '+node.dataset.labTitle;detail.textContent=node.dataset.labDetail};nodes.forEach(n=>{n.addEventListener('click',()=>pick(n));n.addEventListener('mouseenter',()=>pick(n))})})();
</script>
<?php get_footer();?>