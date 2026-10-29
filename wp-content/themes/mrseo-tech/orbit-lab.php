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

/* Cinematic Orbit Concept 03: living visual layers, no bitmap of an entire website */
.orbit-lab{background:#070b0b;min-height:920px}
.orbit-lab:before{background:radial-gradient(ellipse at 75% 41%,#0a544863,transparent 40%),radial-gradient(ellipse at 78% 72%,#b144202e,transparent 52%),linear-gradient(#060b0c,#13110f 88%,#20130e)}
.orbit-lab .lab-grid{opacity:.065}
.orbit-lab .lab-shell{max-width:1620px;grid-template-columns:minmax(375px,.8fr) minmax(600px,1.2fr);min-height:880px;padding-top:80px;padding-bottom:155px}
.orbit-lab .lab-copy h1{font-size:clamp(67px,6.1vw,112px);letter-spacing:-.075em;max-width:640px}
.orbit-lab .lab-copy h1 em{color:#ff6850}
.orbit-lab .lab-visual{max-width:850px;transform:scale(1.06);margin-top:2px}
.orbit-lab .lab-visual:before{width:96%;height:96%;background:radial-gradient(circle,#c766463d,transparent 63%);filter:blur(36px)}
.orbit-lab .lab-core{width:44%;background:radial-gradient(circle at 27% 19%,#d8b998 0%,#66534b 15%,#183934 37%,#0e1819 62%,#090c0e 88%);box-shadow:inset -30px -30px 51px #020707ec,inset 15px 13px 42px #ffa776a1,0 0 22px #f98d6282,0 0 95px #fa643641;overflow:hidden}
.orbit-lab .lab-core:before{content:"";position:absolute;inset:0;border-radius:50%;background:repeating-radial-gradient(ellipse at 63% 49%,transparent 0 8px,#f5a17322 10px,transparent 15px),linear-gradient(40deg,transparent 28%,#f078483f 42%,transparent 61%),linear-gradient(158deg,transparent 23%,#f3b37d6e 52%,transparent 62%);mix-blend-mode:screen;animation:lab-surface-drift 24s linear infinite}
@keyframes lab-surface-drift{50%{transform:rotate(21deg) scale(1.09)}}
.orbit-lab .lab-core:after{inset:8px;border-color:#f8a0746e;box-shadow:inset 0 0 30px #ff7f4c33}
.orbit-lab .lab-core strong{font-family:Georgia,serif;font-size:clamp(25px,2.6vw,41px);font-weight:500}
.orbit-lab .lab-core small{color:#f6bd9c}
.orbit-lab .lab-core .lab-core-signal{background:#ff774b;box-shadow:0 0 15px #ff774b}
.orbit-lab .lab-orbit-one{width:72%;height:53%;border-color:#ff9e6585}
.orbit-lab .lab-orbit-two{width:94%;height:72%;border-color:#f69a6673}
.orbit-lab .lab-orbit-three{width:110%;height:91%;border-color:#8caaa059}
.orbit-lab .lab-orbit:after{content:"";position:absolute;top:11%;left:12%;width:9px;height:9px;background:#ffb173;border-radius:50%;box-shadow:0 0 8px 3px #ff7544,0 0 24px 12px #ff76414a}
.orbit-lab .lab-node{background:linear-gradient(135deg,#33221ddc,#12221edf);border:1px solid #b77d616e;backdrop-filter:blur(16px);padding:16px 19px;box-shadow:0 11px 40px #000b,0 0 24px #d76a3324;min-width:170px}
.orbit-lab .lab-node:hover,.orbit-lab .lab-node.active{border-color:#ff9663;background:linear-gradient(135deg,#65392adf,#18362bdc);box-shadow:0 10px 44px #f7784252}
.orbit-lab .lab-node i{background:#ff8353;box-shadow:0 0 12px #f78352}
.orbit-lab .lab-node-1{top:10%;left:2%}.orbit-lab .lab-node-2{top:24%;right:-7%}.orbit-lab .lab-node-3{bottom:27%;right:-9%}.orbit-lab .lab-node-4{bottom:12%;left:28%}.orbit-lab .lab-node-5{bottom:31%;left:-9%}.orbit-lab .lab-node-6{top:10%;right:9%}
.orbit-lab .lab-detail{bottom:-1%;background:#1b201eea;border-color:#b67b617e;box-shadow:0 16px 38px #0009}
.orbit-lab .lab-nebula{position:absolute;inset:-10%;pointer-events:none;background:radial-gradient(ellipse at 83% 48%,#fa74371d,transparent 32%),radial-gradient(ellipse at 26% 46%,#00967921,transparent 34%);filter:blur(24px);animation:lab-nebula-breathe 9s ease-in-out infinite alternate}
@keyframes lab-nebula-breathe{to{opacity:.45;transform:scale(1.06)}}
.orbit-lab .lab-stars{position:absolute;inset:0;pointer-events:none;background-image:radial-gradient(circle,#f9a674 1px,transparent 1.8px),radial-gradient(circle,#81bead 1px,transparent 1.7px);background-size:113px 149px,181px 173px;background-position:16px 26px,48px 62px;opacity:.48;mask-image:radial-gradient(ellipse at 69% 46%,black 3%,transparent 75%);animation:lab-stars-float 35s linear infinite}
@keyframes lab-stars-float{to{background-position:129px 175px,-133px -111px}}
.orbit-lab .lab-landscape{position:absolute;bottom:0;left:0;width:100%;height:30%;z-index:0;pointer-events:none}
.orbit-lab .lab-landscape:after{content:"";position:absolute;bottom:0;inset-inline:0;height:70%;background:linear-gradient(transparent,#140e0a 91%)}
.orbit-lab .lab-landscape svg{width:100%;height:100%}
.orbit-lab .lab-data{position:absolute;z-index:4;pointer-events:none;display:flex;gap:10px;align-items:center;padding:11px 14px;border:1px solid #689b8578;border-radius:10px;background:#091713c9;box-shadow:0 8px 30px #0008;backdrop-filter:blur(10px);animation:lab-data-float 6s ease-in-out infinite}
.orbit-lab .lab-data svg{width:69px;height:35px;overflow:visible}.orbit-lab .lab-data path{stroke:#8af5bc;fill:none;stroke-width:2.4;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:120;animation:lab-chart 5s ease-in-out infinite alternate}
.orbit-lab .lab-data small{font-size:10px;color:#a6bfb0;line-height:1.4}.orbit-lab .lab-data b{display:block;font-size:12px;color:#daffdf;margin-bottom:3px}
.orbit-lab .lab-data-a{left:9%;bottom:12%}.orbit-lab .lab-data-b{right:3%;top:6%;animation-delay:-3s}
@keyframes lab-chart{from{stroke-dashoffset:120}to{stroke-dashoffset:0}}@keyframes lab-data-float{50%{transform:translateY(-12px)}}
.orbit-lab .lab-control{border-color:#93664b;background:#241a16}.orbit-lab .lab-control:hover{background:#503024}
.orbit-lab .lab-footer-line{position:absolute;bottom:34px;left:clamp(22px,5vw,75px);right:clamp(22px,5vw,75px);z-index:3;display:flex;align-items:center;justify-content:space-between;gap:20px;border-top:1px solid #ab79555b;padding-top:18px;font-size:10px;font-weight:750;letter-spacing:.14em;color:#c8a38f;text-transform:uppercase}
@media(max-width:1120px){.orbit-lab .lab-shell{grid-template-columns:1fr;gap:50px}.orbit-lab .lab-visual{transform:none;max-width:750px}.orbit-lab .lab-node-2,.orbit-lab .lab-node-3{right:0}.orbit-lab .lab-node-5{left:0}}
@media(max-width:650px){.orbit-lab .lab-shell{padding-bottom:155px;min-height:0}.orbit-lab .lab-copy h1{font-size:clamp(52px,12vw,73px)}.orbit-lab .lab-visual{max-width:100%}.orbit-lab .lab-core{width:45%}.orbit-lab .lab-core strong{font-size:20px}.orbit-lab .lab-node{min-width:0;max-width:132px;padding:9px 11px}.orbit-lab .lab-node-1{left:3%;top:7%}.orbit-lab .lab-node-2{right:0;top:23%}.orbit-lab .lab-node-3{right:0;bottom:25%}.orbit-lab .lab-node-4{left:23%;bottom:10%}.orbit-lab .lab-node-5{left:0;bottom:32%}.orbit-lab .lab-node-6{right:5%;top:4%}.orbit-lab .lab-data{display:none}.orbit-lab .lab-footer-line{bottom:18px;font-size:8px;flex-wrap:wrap}}
@media(prefers-reduced-motion:reduce){.orbit-lab .lab-core:before,.orbit-lab .lab-nebula,.orbit-lab .lab-stars,.orbit-lab .lab-data,.orbit-lab .lab-data path{animation:none!important}}
</style>
<main class="orbit-lab"><div class="lab-nebula" aria-hidden="true"></div><div class="lab-stars" aria-hidden="true"></div><div class="lab-landscape" aria-hidden="true"><svg viewBox="0 0 1500 300" preserveAspectRatio="none"><defs><linearGradient id="lab-ground" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#76331e"/><stop offset=".65" stop-color="#180d0b"/><stop offset="1" stop-color="#08090a"/></linearGradient></defs><path d="M0 210 75 166 130 188 240 90 332 198 422 132 500 216 592 172 715 225 812 143 910 227 1000 100 1100 196 1178 123 1280 211 1400 160 1500 216V300H0Z" fill="url(#lab-ground)"/><path d="M0 254Q360 208 720 261T1500 246V300H0Z" fill="#120e0c"/><path d="M530 254Q720 237 915 260" stroke="#f4763a" stroke-width="2" opacity=".68" fill="none"/></svg></div><div class="lab-grid" aria-hidden="true"></div><div class="lab-shell"><div class="lab-copy"><div class="lab-label">MRSEO.TECH / EXPERIMENT 01</div><h1><?php echo wp_kses_post(mrseo_t('Ваш бізнес.<br><em>Нова орбіта</em> зростання.','Ваш бизнес.<br><em>Новая орбита</em> роста.','Your business.<br><em>A new orbit</em> of growth.'));?></h1><p class="lab-lead"><?php echo esc_html(mrseo_t('SEO, реклама й аналітика не повинні працювати окремо. Ми поєднуємо технології та маркетинг в одну систему, яка допомагає вирішувати бізнес-завдання.','SEO, реклама и аналитика не должны работать по отдельности. Мы объединяем технологии и маркетинг в систему для решения бизнес-задач.','SEO, paid media and analytics work best as one connected system. We align technology and marketing around business problems.'));?></p><div class="lab-actions"><a class="lab-action" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html(mrseo_t('Обговорити проєкт','Обсудить проект','Discuss a project'));?> <span>↗</span></a><a class="lab-action lab-action-quiet" href="<?php echo esc_url(mrseo_url());?>"><?php echo esc_html(mrseo_t('На головну','На главную','Back to homepage'));?></a></div><div class="lab-controls"><button type="button" class="lab-control" id="lab-autoplay" aria-pressed="false">▶ <?php echo esc_html(mrseo_t("Автоогляд","Автообзор","Auto tour"));?></button><button type="button" class="lab-control" id="lab-motion" aria-pressed="false">Ⅱ <?php echo esc_html(mrseo_t("Зупинити рух","Остановить движение","Pause motion"));?></button><span class="lab-controls-note"><?php echo esc_html(mrseo_t("Наведіть курсор на орбіту або оберіть напрям","Наведите курсор на орбиту или выберите направление","Move your pointer or select a service"));?></span></div><div class="lab-status"><div><span>DESIGN DIRECTION</span><strong>Orbital Growth System</strong></div><div><span>EXPERIMENT STATUS</span><strong>Private concept / 01</strong></div></div></div><div class="lab-visual" aria-label="<?php echo esc_attr(mrseo_t('Інтерактивна схема маркетингових напрямів','Интерактивная схема маркетинговых направлений','Interactive marketing service map'));?>"><svg class="lab-connectors" aria-hidden="true"><line id="lab-link" x1="50%" y1="50%" x2="50%" y2="50%"></line><circle id="lab-link-point" cx="50%" cy="50%" r="4"></circle></svg><div class="lab-orbit lab-orbit-one"></div><div class="lab-data lab-data-a"><svg viewBox="0 0 70 35"><path d="M1 30L13 26L25 28L37 15L46 20L55 9L68 3"/></svg><span><b>SEARCH / ORGANIC</b><small><?php echo esc_html(mrseo_t("Тренди попиту","Тренды спроса","Demand trends"));?></small></span></div><div class="lab-data lab-data-b"><svg viewBox="0 0 70 35"><path d="M1 29L13 21L24 25L35 14L45 17L55 8L68 3"/></svg><span><b>ANALYTICS / LIVE</b><small><?php echo esc_html(mrseo_t("Сигнали зростання","Сигналы роста","Growth signals"));?></small></span></div><div class="lab-orbit lab-orbit-two"></div><div class="lab-orbit lab-orbit-three"></div><div class="lab-core"><small>CONNECTED SYSTEM</small><strong>MRSEO<br>GROWTH</strong><div class="lab-core-signal"></div></div>
<?php
$nodes=array(
array('SEO',mrseo_t('Органічний попит і видимість','Органический спрос и видимость','Organic demand & visibility')),
array('Google Ads',mrseo_t('Керований платний трафік','Управляемый платный трафик','Intent-driven paid acquisition')),
array('Analytics',mrseo_t('Дані для точних рішень','Данные для точных решений','Data-driven decisions')),
array('E-commerce',mrseo_t('Зростання каталогу та продажів','Рост каталога и продаж','Catalog architecture & growth')),
array('Technical SEO',mrseo_t('Технічна якість сайту','Техническое качество сайта','Technical foundations')),
array('Web Development',mrseo_t('Сайти, які працюють на бізнес','Сайты, которые работают на бизнес','Websites built for business'))
);
foreach($nodes as $i=>$node):?><button type="button" class="lab-node lab-node-<?php echo $i+1;?><?php echo $i===0?' active':'';?>" data-lab-title="<?php echo esc_attr($node[0]);?>" data-lab-detail="<?php echo esc_attr($node[1]);?>" aria-pressed="<?php echo $i===0?'true':'false';?>"><i aria-hidden="true"></i><?php echo esc_html($node[0]);?></button><?php endforeach;?><div class="lab-detail" aria-live="polite"><span id="lab-selected">01 / SEO</span><strong id="lab-selected-detail"><?php echo esc_html($nodes[0][1]);?></strong></div></div><span class="lab-intro-note">INTERACTIVE STRATEGY MODEL / 2026</span></div><div class="lab-footer-line"><span>MRSEO.TECH / CONNECTED GROWTH SYSTEM</span><span>SEO · GOOGLE ADS · ANALYTICS · WEB</span><span>INTERACTIVE CONCEPT 03</span></div></main>
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