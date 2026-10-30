<?php if(!defined('ABSPATH'))exit;$mrseo_is_home=mrseo_slug()==='';get_header();?>
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

/* WebGL-enhanced planet: native 3D shading over a resilient CSS fallback */
.orbit-lab .lab-webgl-canvas{display:block;position:absolute;inset:0;width:100%;height:100%;border-radius:50%;z-index:1;pointer-events:none;opacity:0;transition:opacity .8s}
.orbit-lab.lab-webgl-ready .lab-webgl-canvas{opacity:1}
.orbit-lab.lab-webgl-ready .lab-core{background:#08100f;overflow:hidden}
.orbit-lab.lab-webgl-ready .lab-core:before{opacity:0}
.orbit-lab.lab-webgl-ready .lab-core:after{z-index:3;pointer-events:none}
.orbit-lab.lab-webgl-ready .lab-core small,.orbit-lab.lab-webgl-ready .lab-core strong,.orbit-lab.lab-webgl-ready .lab-core .lab-core-signal{position:relative;z-index:4}
@media(prefers-reduced-motion:reduce){.orbit-lab .lab-webgl-canvas{display:none}}

/* Concept 04: color-coded service constellation with permanent visible links */
.orbit-lab .lab-visual{--active-signal:#ff9b53}
.orbit-lab .lab-connectors{z-index:3;overflow:visible}
.orbit-lab .lab-connectors .lab-spoke{stroke:var(--spoke);stroke-width:2;stroke-opacity:.48;fill:none;filter:drop-shadow(0 0 5px var(--spoke))}
.orbit-lab .lab-connectors .lab-spoke-end{fill:var(--spoke);stroke:#fff5;stroke-width:1;filter:drop-shadow(0 0 7px var(--spoke))}
.orbit-lab .lab-connectors .lab-spoke.active{stroke-width:3.5;stroke-opacity:1;filter:drop-shadow(0 0 9px var(--spoke));stroke-dasharray:10 7;animation:lab-flow 2.3s linear infinite}
.orbit-lab .lab-connectors .lab-spoke-end.active{r:6}
@keyframes lab-flow{to{stroke-dashoffset:-68}}
.orbit-lab .lab-connectors #lab-link,.orbit-lab .lab-connectors #lab-link-point{display:none}
.orbit-lab .lab-node{--service-color:#ff9b53;border-color:color-mix(in srgb,var(--service-color),transparent 25%);background:linear-gradient(130deg,color-mix(in srgb,var(--service-color),#161c19 83%),#0b1919e8);box-shadow:0 10px 35px #0009,inset 3px 0 0 var(--service-color);z-index:7}
.orbit-lab .lab-node i{background:var(--service-color);box-shadow:0 0 12px var(--service-color)}
.orbit-lab .lab-node.active,.orbit-lab .lab-node:hover{border-color:var(--service-color);box-shadow:0 0 28px color-mix(in srgb,var(--service-color),transparent 46%),inset 4px 0 0 var(--service-color);background:linear-gradient(130deg,color-mix(in srgb,var(--service-color),#19201c 70%),#15201df4)}
.orbit-lab .lab-node-1{--service-color:#ff985a}.orbit-lab .lab-node-2{--service-color:#72d3e4}.orbit-lab .lab-node-3{--service-color:#a7e4a0}.orbit-lab .lab-node-4{--service-color:#d8b1ff}.orbit-lab .lab-node-5{--service-color:#ffca74}.orbit-lab .lab-node-6{--service-color:#ff849c}
.orbit-lab .lab-detail{border-color:var(--active-signal);box-shadow:0 0 24px color-mix(in srgb,var(--active-signal),transparent 78%),0 12px 30px #0009}
.orbit-lab .lab-detail>span{color:var(--active-signal)}
@media(prefers-reduced-motion:reduce){.orbit-lab .lab-connectors .lab-spoke.active{animation:none}}

/* Earth Edition — a legible, consistent client-facing constellation */
.orbit-lab{--lab-accent:#ff705b;background:#071115}
.orbit-lab:before{background:radial-gradient(ellipse at 75% 45%,#0d526450,transparent 47%),radial-gradient(ellipse at 80% 75%,#18415c32,transparent 54%),linear-gradient(#061014,#0c151c 81%,#111a1e)}
.orbit-lab .lab-core{background:radial-gradient(circle at 29% 25%,#92dbff 0%,#1479ad 18%,#0b3462 40%,#08284a 65%,#040f20 88%);box-shadow:inset -28px -27px 54px #030b1ceb,inset 15px 14px 43px #76d9ff76,0 0 21px #61bafa7b,0 0 85px #198ec84f}
.orbit-lab .lab-core:before{background:radial-gradient(ellipse at 32% 29%,#4b9e64 0 18%,transparent 23%),radial-gradient(ellipse at 64% 54%,#638d59 0 13%,transparent 20%),radial-gradient(ellipse at 40% 73%,#5b995b 0 15%,transparent 20%);animation:lab-surface-drift 30s linear infinite;mix-blend-mode:normal}
.orbit-lab .lab-core:after{border-color:#68baff87;box-shadow:inset 0 0 22px #5ad0ff3f}
.orbit-lab .lab-orbit-one{border-color:#83c9ee96}.orbit-lab .lab-orbit-two{border-color:#64b4de82}.orbit-lab .lab-orbit-three{border-color:#4a9db574}
.orbit-lab .lab-orbit:after{background:#a8ecff;box-shadow:0 0 8px 3px #7cdeff,0 0 23px 9px #4dafff5a}
.orbit-lab .lab-visual:before{background:radial-gradient(circle,#4ac4ff42,transparent 65%)}
.orbit-lab .lab-node{width:205px!important;min-width:205px!important;max-width:205px!important;min-height:65px!important;padding:13px 17px!important;justify-content:flex-start;white-space:normal;font-size:14px!important;line-height:1.25}
.orbit-lab .lab-node i{width:9px;height:9px;flex:0 0 9px}
.orbit-lab .lab-node-1{top:10%;left:0}.orbit-lab .lab-node-2{top:25%;right:-3%}.orbit-lab .lab-node-3{bottom:25%;right:-3%}.orbit-lab .lab-node-4{bottom:10%;left:28%}.orbit-lab .lab-node-5{bottom:30%;left:-5%}.orbit-lab .lab-node-6{top:7%;right:5%}
.orbit-lab .lab-connectors .lab-spoke{stroke-opacity:.65}
.orbit-lab .lab-copy h1{font-size:clamp(68px,6.7vw,115px);max-width:650px}
.orbit-lab .lab-copy h1 em{color:#ff765e}
@media(max-width:650px){.orbit-lab .lab-node{min-width:0!important;max-width:128px!important;width:128px!important;min-height:43px!important;font-size:10px!important;padding:8px 10px!important}.orbit-lab .lab-node-1{left:0;top:8%}.orbit-lab .lab-node-2{right:0;top:24%}.orbit-lab .lab-node-3{right:0;bottom:26%}.orbit-lab .lab-node-4{left:21%;bottom:10%}.orbit-lab .lab-node-5{left:0;bottom:31%}.orbit-lab .lab-node-6{right:4%;top:3%}}

/* Orbit Lab — clear, equal-size premium service cards */
.orbit-lab .lab-node{width:235px!important;min-width:235px!important;max-width:235px!important;height:100px!important;min-height:100px!important;padding:16px!important;display:flex;align-items:center;gap:12px;white-space:normal;overflow:hidden;border-radius:17px;transform-origin:center center;box-shadow:0 17px 40px #000a,inset 0 0 0 1px #ffffff12,0 0 18px color-mix(in srgb,var(--service-color),transparent 83%);background:linear-gradient(125deg,#1e2b2df2,#111a1eea);backdrop-filter:blur(16px)}
.orbit-lab .lab-node-glyph{display:grid;place-items:center;flex:0 0 40px;width:40px;height:40px;border-radius:11px;background:color-mix(in srgb,var(--service-color),#131f22 81%);color:var(--service-color);font-size:25px;font-weight:700;box-shadow:inset 0 0 0 1px color-mix(in srgb,var(--service-color),transparent 65%)}
.orbit-lab .lab-node-content{display:flex;flex-direction:column;min-width:0;flex:1;gap:5px;text-align:left}
.orbit-lab .lab-node-content strong{font:750 14px/1.2 system-ui,sans-serif;color:#fff;letter-spacing:-.015em}
.orbit-lab .lab-node-content small{font:400 11px/1.35 system-ui,sans-serif;color:#bac6c5;letter-spacing:0}
.orbit-lab .lab-node-arrow{flex:0 0 17px;color:var(--service-color);font-size:18px;align-self:flex-start}
.orbit-lab .lab-node.active,.orbit-lab .lab-node:hover{transform:translateY(-4px);background:linear-gradient(125deg,#30413ff5,#132328f5)}
.orbit-lab .lab-node-1{top:12%;left:-9%}.orbit-lab .lab-node-2{top:22%;right:-12%}.orbit-lab .lab-node-3{bottom:20%;right:-12%}.orbit-lab .lab-node-4{bottom:5%;left:22%}.orbit-lab .lab-node-5{bottom:25%;left:-12%}.orbit-lab .lab-node-6{top:0;right:2%}
.orbit-lab .lab-visual{max-width:900px}
.orbit-lab .lab-core strong{font-size:clamp(17px,1.7vw,25px)!important;text-shadow:0 2px 8px #00121c}
.orbit-lab .lab-core small{font-size:9px}
.orbit-lab.lab-webgl-ready .lab-core{box-shadow:0 0 35px #2675a143,0 0 75px #2570a72b,inset 0 0 9px #001321}
@media(max-width:1170px){.orbit-lab .lab-node{width:210px!important;min-width:210px!important;max-width:210px!important;height:88px!important;min-height:88px!important}.orbit-lab .lab-node-1,.orbit-lab .lab-node-5{left:0}.orbit-lab .lab-node-2,.orbit-lab .lab-node-3{right:0}}
@media(max-width:650px){.orbit-lab .lab-node{width:140px!important;min-width:140px!important;max-width:140px!important;height:63px!important;min-height:63px!important;padding:7px!important;gap:6px;border-radius:10px}.orbit-lab .lab-node-glyph{flex-basis:23px;width:23px;height:23px;border-radius:6px;font-size:15px}.orbit-lab .lab-node-content{gap:3px}.orbit-lab .lab-node-content strong{font-size:10px}.orbit-lab .lab-node-content small{font-size:8px;line-height:1.2}.orbit-lab .lab-node-arrow{display:none}.orbit-lab .lab-node-1{top:8%;left:0}.orbit-lab .lab-node-2{top:24%;right:0}.orbit-lab .lab-node-3{bottom:24%;right:0}.orbit-lab .lab-node-4{bottom:8%;left:20%}.orbit-lab .lab-node-5{bottom:29%;left:0}.orbit-lab .lab-node-6{top:0;right:1%}}

/* Earth + equal professional service tiles — concept 05 */
.orbit-lab .lab-core:before{background-image:url('https://svs.gsfc.nasa.gov/vis/a000000/a002900/a002915/bluemarble-2048.png')!important;background-size:210% 104%!important;background-position:67% 50%!important;opacity:1!important;mix-blend-mode:normal!important;animation:none!important;filter:brightness(.7) saturate(1.12)}
.orbit-lab.lab-webgl-ready .lab-core:before{opacity:0!important}
.orbit-lab .lab-core{box-shadow:inset -24px -19px 55px #000c,inset 17px 17px 30px #bde9ff42,0 0 34px #55a6e96b}
.orbit-lab .lab-shell{grid-template-columns:minmax(360px,.85fr) minmax(640px,1.15fr);gap:10px;max-width:1650px}
.orbit-lab .lab-visual{max-width:830px;transform:none!important}
.orbit-lab .lab-node{width:213px!important;max-width:213px!important;min-width:213px!important;height:98px!important;min-height:98px!important;z-index:9!important}
.orbit-lab .lab-node-glyph{flex-basis:44px!important;width:44px!important;height:44px!important}
.orbit-lab .lab-node-1{top:12%!important;left:0!important;right:auto!important;bottom:auto!important}
.orbit-lab .lab-node-5{top:42%!important;left:0!important;right:auto!important;bottom:auto!important}
.orbit-lab .lab-node-4{top:72%!important;left:0!important;right:auto!important;bottom:auto!important}
.orbit-lab .lab-node-6{top:12%!important;right:0!important;left:auto!important;bottom:auto!important}
.orbit-lab .lab-node-2{top:42%!important;right:0!important;left:auto!important;bottom:auto!important}
.orbit-lab .lab-node-3{top:72%!important;right:0!important;left:auto!important;bottom:auto!important}
.orbit-lab .lab-node-content strong{font-size:14px!important;line-height:1.2}
.orbit-lab .lab-node-content small{font-size:11px!important;line-height:1.3}
.orbit-lab .lab-node-glyph svg{display:block}
.orbit-lab .lab-core{width:40%!important}
.orbit-lab .lab-data{opacity:.75;transform:scale(.84);pointer-events:none;z-index:3}
.orbit-lab .lab-data-a{left:13%!important;bottom:1%!important}
.orbit-lab .lab-data-b{right:8%!important;top:0!important}
.orbit-lab .lab-detail{bottom:-7%!important}
@media(max-width:1100px){.orbit-lab .lab-shell{grid-template-columns:1fr}.orbit-lab .lab-visual{max-width:780px}}
@media(max-width:650px){.orbit-lab .lab-visual{margin-bottom:45px}.orbit-lab .lab-node{width:132px!important;max-width:132px!important;min-width:132px!important;height:62px!important;min-height:62px!important;padding:8px!important}.orbit-lab .lab-node-glyph{flex-basis:23px!important;width:23px!important;height:23px!important}.orbit-lab .lab-node-glyph svg{width:20px;height:20px}.orbit-lab .lab-node-content strong{font-size:10px!important}.orbit-lab .lab-node-content small{font-size:8px!important}.orbit-lab .lab-node-1,.orbit-lab .lab-node-6{top:10%!important}.orbit-lab .lab-node-5,.orbit-lab .lab-node-2{top:40%!important}.orbit-lab .lab-node-4,.orbit-lab .lab-node-3{top:70%!important}.orbit-lab .lab-detail{bottom:-14%!important}}

/* Earth v5 — clear, unobstructed animated sphere */
.orbit-lab .lab-core .lab-core-signal,.orbit-lab .lab-core>small,.orbit-lab .lab-core>strong{display:none!important}
.orbit-lab .lab-core:before{background-size:200% 100%!important;animation:lab-earth-backup-spin 48s linear infinite!important;filter:saturate(1.14) contrast(1.11) brightness(.82)}
@keyframes lab-earth-backup-spin{from{background-position:0% 50%}to{background-position:100% 50%}}
.orbit-lab.lab-webgl-ready .lab-core:before{animation:none!important;opacity:0!important}
.orbit-lab .lab-core:after{border:1px solid #7cc4f344;box-shadow:inset -12px -10px 30px #010c1a99,0 0 17px #58c6ff29}
@media(prefers-reduced-motion:reduce){.orbit-lab .lab-core:before{animation:none!important}}

/* Orbit cards follow six evenly spaced elliptical tracks while staying upright.
   All other pages remain untouched. */
@media(min-width:1101px) and (prefers-reduced-motion:no-preference){
 .orbit-lab .lab-node.lab-orbiting{top:0!important;left:0!important;right:auto!important;bottom:auto!important;will-change:transform;transition:border-color .3s,background .3s,box-shadow .3s!important}
 .orbit-lab .lab-node.lab-orbiting:hover,.orbit-lab .lab-node.lab-orbiting.active{filter:brightness(1.07)}
}

<?php if($mrseo_is_home):?>
.orbit-lab .lab-controls,.orbit-lab .lab-status,.orbit-lab .lab-footer-line,.orbit-lab .lab-intro-note,.orbit-lab .lab-action-quiet{display:none!important}
.orbit-lab .lab-shell{padding-bottom:75px;min-height:780px}
.orbit-lab .lab-copy{padding-bottom:35px}
.orbit-lab .lab-label{letter-spacing:.16em}
.orbit-lab .lab-detail{bottom:-2%!important}
@media(max-width:650px){.orbit-lab .lab-shell{padding-bottom:95px}}
<?php endif;?>
.mrseo-home-editorial{background:#f5f2ec;color:#191c1a;padding:100px clamp(22px,6vw,96px)}
.mrseo-home-editorial .mhe-inner{max-width:1250px;margin:auto}
.mrseo-home-editorial .mhe-kicker{font-size:11px;letter-spacing:.19em;text-transform:uppercase;color:#bc4934;font-weight:800}
.mrseo-home-editorial h2{font-size:clamp(35px,4.5vw,65px);line-height:1.06;letter-spacing:-.055em;max-width:870px;margin:18px 0 25px}
.mrseo-home-editorial .mhe-intro{font-size:clamp(17px,1.6vw,21px);line-height:1.65;color:#555e59;max-width:820px}
.mrseo-home-editorial .mhe-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:1px;background:#d9d4cc;border:1px solid #d9d4cc;margin:52px 0}
.mrseo-home-editorial .mhe-item{background:#f5f2ec;padding:34px 28px;display:flex;flex-direction:column;gap:15px}
.mrseo-home-editorial .mhe-item span{font-size:12px;color:#bf523f;font-weight:800;letter-spacing:.1em}
.mrseo-home-editorial .mhe-item h3{font-size:24px;line-height:1.15;letter-spacing:-.04em;margin:0}
.mrseo-home-editorial .mhe-item p{font-size:15px;line-height:1.65;color:#5b625d;margin:0;flex:1}
.mrseo-home-editorial .mhe-item a{color:#242b28;font-weight:750;text-decoration:none;border-bottom:1px solid #b9aaa0;align-self:flex-start;padding-bottom:5px}
.mrseo-home-editorial .mhe-bottom{display:flex;align-items:center;justify-content:space-between;gap:25px;border-top:1px solid #d9d4cc;padding-top:38px}
.mrseo-home-editorial .mhe-bottom p{font-size:18px;line-height:1.5;max-width:610px;margin:0}
.mrseo-home-editorial .mhe-bottom a{background:#171b19;color:white;padding:17px 26px;border-radius:50px;text-decoration:none;font-size:14px;font-weight:750;white-space:nowrap}
@media(max-width:850px){.mrseo-home-editorial{padding:75px 22px}.mrseo-home-editorial .mhe-grid{grid-template-columns:1fr}.mrseo-home-editorial .mhe-bottom{flex-direction:column;align-items:flex-start}}

/* Full-bleed responsive homepage hero, with dark cinematic intro / light editorial. */
<?php if($mrseo_is_home):?>
.orbit-lab{width:100%;max-width:none;margin:0;border-radius:0!important;min-height:calc(100svh - 76px)}
.orbit-lab .lab-shell{box-sizing:border-box;width:100%;max-width:1920px;min-height:clamp(710px,calc(100svh - 76px),1100px);padding:clamp(55px,6vh,95px) clamp(26px,5.2vw,110px) 75px;grid-template-columns:minmax(350px,.83fr) minmax(600px,1.17fr);gap:clamp(35px,4vw,85px)}
.orbit-lab .lab-visual{width:100%;max-width:900px;min-width:0}
.orbit-lab .lab-copy h1{font-size:clamp(67px,6.2vw,120px);line-height:.97;max-width:700px}
.orbit-lab .lab-lead{max-width:555px}
.orbit-lab .lab-label{font-size:11px}
.orbit-lab .lab-node{width:clamp(160px,12.3vw,230px)!important;max-width:230px!important;min-width:160px!important}
@media(min-width:1800px){.orbit-lab .lab-shell{max-width:2200px}.orbit-lab .lab-visual{max-width:1060px}}
@media(max-width:1250px){.orbit-lab .lab-shell{grid-template-columns:minmax(300px,.85fr) minmax(520px,1.15fr);gap:14px;padding-left:3.5vw;padding-right:3.5vw}.orbit-lab .lab-copy h1{font-size:clamp(58px,6.3vw,85px)}.orbit-lab .lab-node{min-width:155px!important;width:190px!important}}
@media(max-width:1100px){.orbit-lab .lab-shell{display:flex;flex-direction:column;align-items:stretch;gap:10px;min-height:auto;padding:78px clamp(24px,6vw,70px) 100px}.orbit-lab .lab-copy{max-width:780px}.orbit-lab .lab-copy h1{font-size:clamp(63px,8vw,100px)}.orbit-lab .lab-visual{max-width:760px;align-self:center}.orbit-lab .lab-node{width:195px!important;min-width:195px!important;max-width:195px!important}}
@media(max-width:650px){.orbit-lab .lab-shell{padding:60px 16px 90px;gap:20px}.orbit-lab .lab-copy h1{font-size:clamp(52px,11.7vw,79px)}.orbit-lab .lab-lead{font-size:16px;line-height:1.6}.orbit-lab .lab-visual{width:100%;max-width:100%}.orbit-lab .lab-node{width:clamp(108px,31vw,140px)!important;min-width:108px!important;max-width:140px!important}.orbit-lab .lab-core{width:44%!important}}
<?php endif;?>

/* Final orbital layout: links are navigational, satellite labels never collide with telemetry. */
.orbit-lab .lab-node{text-decoration:none!important;cursor:pointer}
.orbit-lab .lab-node:focus-visible{outline:2px solid #fff;outline-offset:4px}
.orbit-lab .lab-data,.orbit-lab .lab-detail{display:none!important}
.orbit-lab .lab-core{pointer-events:auto}
@media(min-width:1101px) and (prefers-reduced-motion:no-preference){
.orbit-lab .lab-node.lab-orbiting{position:absolute!important;left:0!important;top:0!important;right:auto!important;bottom:auto!important;margin:0!important;transition:background .25s,border-color .25s,box-shadow .25s!important}
.orbit-lab .lab-node.lab-orbiting:hover{filter:brightness(1.2)}
}

/* Animated service micro-demos — illustration, never fabricated performance data. */
.mrseo-home-editorial .mhe-item{position:relative;transition:background .3s;overflow:hidden}
.mrseo-home-editorial .mhe-item:hover{background:#fffcf6}
.mrseo-home-editorial .mhe-item>a:after{content:"";position:absolute;inset:0;z-index:5}
.mrseo-home-editorial .mhe-item:focus-within{outline:2px solid #c35b47;outline-offset:-2px}
.mrseo-home-editorial .mhe-preview{height:205px;flex:none;border:1px solid #d7dcd8;border-radius:13px;overflow:hidden;position:relative;background:#fdfdfc;margin:9px 0 5px;box-shadow:0 12px 26px #1e302010}
.mhe-preview .mhe-preview-top{height:27px;display:flex;align-items:center;gap:5px;padding:0 12px;background:#edf1ee;border-bottom:1px solid #dfe4df}
.mhe-preview .mhe-dot{width:6px;height:6px;border-radius:50%;background:#c1c9c2}
.mhe-preview .mhe-preview-top small{margin-left:auto;font-size:8px;letter-spacing:.12em;font-weight:800;color:#66736d}
.mhe-seo .mhe-searchbar{height:34px;border:1px solid #d7e0dc;border-radius:20px;margin:12px 13px 9px;padding:0 12px;display:flex;gap:9px;align-items:center;color:#879089}
.mhe-seo .mhe-searchbar b{font-size:10px;color:#65766d;font-weight:500}.mhe-seo .mhe-searchbar span{margin-left:auto;font-size:12px}
.mhe-seo .mhe-result{margin:9px 18px;display:flex;flex-direction:column;gap:5px;animation:mhe-result-shift 8s ease-in-out infinite}
.mhe-seo .mhe-result-url{font-size:9px;color:#16825f}
.mhe-seo .mhe-result-title{height:9px;width:75%;border-radius:5px;background:#3165b7}
.mhe-seo .mhe-result-text{height:5px;width:93%;border-radius:4px;background:#cbd2cf}
.mhe-seo .mhe-result-text.short{width:60%}
.mhe-seo .mhe-result.second{animation-delay:-4s;opacity:.55}
.mhe-seo .mhe-scan{position:absolute;inset:55px 0 auto;height:2px;background:linear-gradient(90deg,transparent,#2abf91,transparent);box-shadow:0 0 18px #2abf9166;animation:mhe-scan 6s ease-in-out infinite}
.mhe-ads .mhe-ads-bar{height:40px;display:flex;align-items:center;gap:12px;padding:0 15px}
.mhe-ads .mhe-ads-bar b{font-size:10px;color:#33423e}.mhe-ads .mhe-status-dot{margin-left:auto;width:7px;height:7px;border-radius:50%;background:#27b67c;box-shadow:0 0 0 4px #27b67c22;animation:mhe-blink 2s infinite}
.mhe-ads-logo{position:relative;width:20px;height:21px;display:block}
.mhe-ads-logo i{position:absolute;display:block;width:8px;height:20px;border-radius:5px;transform:rotate(-28deg);background:#4385f4;left:9px}
.mhe-ads-logo i:nth-child(2){transform:rotate(28deg);background:#34a853;left:4px}
.mhe-ads-logo i:nth-child(3){width:7px;height:7px;background:#fbbc04;left:1px;bottom:0}
.mhe-chart{height:85px;margin:1px 14px;position:relative;background:repeating-linear-gradient(to bottom,transparent 0 27px,#e8eee9 28px)}
.mhe-chart svg{width:100%;height:100%}
.mhe-chart-fill{fill:#46a9b11d}.mhe-chart-line{fill:none;stroke:#2889a6;stroke-width:2.7;stroke-linecap:round;stroke-dasharray:400;stroke-dashoffset:400;animation:mhe-line 6s ease-in-out infinite}
.mhe-chart-cursor{position:absolute;top:15px;left:10%;width:7px;height:7px;background:#2c97b6;border:2px solid #fff;box-shadow:0 0 0 2px #2c97b688;border-radius:50%;animation:mhe-cursor 6s ease-in-out infinite}
.mhe-products{display:flex;gap:8px;padding:7px 16px}.mhe-products i{flex:1;height:25px;border-radius:5px;background:linear-gradient(135deg,#eef1ed,#dbe7e0);animation:mhe-product 4s ease-in-out infinite}.mhe-products i:nth-child(2){animation-delay:.6s}.mhe-products i:nth-child(3){animation-delay:1.2s}.mhe-products i:nth-child(4){animation-delay:1.8s}
.mhe-dev .mhe-dev-window{display:grid;grid-template-columns:1fr 1fr;height:calc(100% - 27px);background:#131b20}
.mhe-dev .mhe-code{display:flex;flex-direction:column;gap:9px;padding:22px 7px 8px 12px;font:9px/1.2 ui-monospace,SFMono-Regular,monospace;color:#a8c8be;white-space:nowrap;overflow:hidden}
.mhe-code span{animation:mhe-code-in 6s steps(10,end) infinite;overflow:hidden}.mhe-code span:nth-child(2){animation-delay:.2s}.mhe-code span:nth-child(3){animation-delay:.4s}.mhe-code b{color:#8aa5fd}.mhe-code em{color:#e6b97a}.mhe-caret{display:inline-block;width:4px;height:9px;background:#92e1c5;animation:mhe-blink 1s steps(1) infinite}
.mhe-dev .mhe-app{margin:17px 12px 18px 0;background:#f6f8f5;border-radius:7px;display:flex;flex-direction:column;padding:10px;gap:8px;overflow:hidden;transform-origin:center;animation:mhe-app-pop 6s ease-in-out infinite}
.mhe-app-nav{width:39%;height:5px;background:#8795a7;border-radius:3px}.mhe-app-title{height:9px;width:85%;background:#263d42;border-radius:3px;margin-top:9px}.mhe-app-sub{height:5px;width:66%;background:#cbd2cc;border-radius:3px}.mhe-app-button{height:12px;width:40%;background:#f2735b;border-radius:6px}.mhe-app-panels{display:flex;gap:5px;margin-top:auto}.mhe-app-panels i{height:30px;flex:1;border-radius:4px;background:#dfe8e2}
@keyframes mhe-scan{0%,12%{transform:translateY(0);opacity:0}24%{opacity:1}74%{transform:translateY(116px);opacity:1}85%,100%{transform:translateY(116px);opacity:0}}
@keyframes mhe-result-shift{0%,100%{transform:translateY(3px)}45%,65%{transform:translateY(-4px)}}
@keyframes mhe-line{0%{stroke-dashoffset:400}55%,90%,100%{stroke-dashoffset:0}}
@keyframes mhe-cursor{0%{left:0%;opacity:0}35%{opacity:1}70%,100%{left:96%;opacity:0}}
@keyframes mhe-product{0%,100%{background:#dfe8e2}50%{background:#b8d6cd}}
@keyframes mhe-code-in{0%{max-width:0}28%,100%{max-width:100%}}
@keyframes mhe-app-pop{0%,15%{transform:scale(.91);opacity:.5}42%,85%{transform:scale(1);opacity:1}100%{transform:scale(.91);opacity:.5}}
@keyframes mhe-blink{50%{opacity:.4}}
@media(prefers-reduced-motion:reduce){.mrseo-home-editorial .mhe-preview *{animation:none!important}.mhe-chart-line{stroke-dashoffset:0}.mhe-code span{max-width:100%}}

/* Six service demos in the exact orbit navigation order. */
.mrseo-home-editorial .mhe-grid{grid-template-columns:repeat(3,minmax(0,1fr))}
.mrseo-home-editorial .mhe-item{min-width:0}
.mhe-analytics .mhe-an-head,.mhe-commerce .mhe-cm-toolbar{display:flex;justify-content:space-between;align-items:center;margin:13px 16px 10px;font-size:10px;font-weight:750;color:#4c5b56}
.mhe-an-head .mhe-live{font-size:8px;color:#199c69;animation:mhe-blink 2s infinite}
.mhe-an-bars{height:82px;margin:8px 18px 12px;border-bottom:1px solid #dbe6e0;display:flex;gap:9px;align-items:end}
.mhe-an-bars i{flex:1;height:calc(23% + var(--an-h,30%));background:linear-gradient(0deg,#d7a16e,#f0bd74);border-radius:3px 3px 0 0;animation:mhe-bar-grow 3.8s ease-in-out infinite alternate;transform-origin:bottom}
.mhe-an-bars i:nth-child(2){--an-h:46%;animation-delay:-1s}.mhe-an-bars i:nth-child(3){--an-h:20%;animation-delay:-2s}.mhe-an-bars i:nth-child(4){--an-h:65%;animation-delay:-.5s}.mhe-an-bars i:nth-child(5){--an-h:33%;animation-delay:-2.4s}.mhe-an-bars i:nth-child(6){--an-h:58%;animation-delay:-3s}.mhe-an-bars i:nth-child(7){--an-h:26%;animation-delay:-1.5s}.mhe-an-bars i:nth-child(8){--an-h:49%;animation-delay:-2.8s}.mhe-an-bars i:nth-child(9){--an-h:39%;animation-delay:-.8s}
.mhe-an-events{display:flex;gap:5px;margin:0 12px;justify-content:space-between}
.mhe-an-events span{font-size:8px;background:#eef5ef;color:#56816c;border-radius:5px;padding:7px 5px;animation:mhe-product 4s infinite}.mhe-an-events span:nth-child(2){animation-delay:-1.4s}.mhe-an-events span:nth-child(3){animation-delay:-2.8s}
.mhe-commerce .mhe-cm-toolbar b{font-size:9px;color:#1a9b79;animation:mhe-blink 2s infinite}
.mhe-cm-row{margin:6px 14px;display:flex;gap:12px;padding:6px;background:#f0f5f1;border-radius:6px;align-items:center;animation:mhe-cm-flash 5s infinite}
.mhe-cm-row:nth-child(4){animation-delay:-1.6s}.mhe-cm-row:nth-child(5){animation-delay:-3.2s}
.mhe-cm-row>i{width:30px;height:28px;background:linear-gradient(135deg,#c2d6cd,#e8eee8);border-radius:4px}
.mhe-cm-row>div{flex:1;display:flex;flex-direction:column;gap:6px}.mhe-cm-row>div b{width:74%;height:6px;background:#a4b3aa;border-radius:3px}.mhe-cm-row>div small{width:50%;height:5px;background:#ced8d0;border-radius:3px}
.mhe-cm-row>em{color:#22a574;font-size:18px;font-style:normal;font-weight:800}
.mhe-technical .mhe-tech-browser{margin:14px;background:#16252b;border-radius:8px;overflow:hidden;height:142px;position:relative}
.mhe-tech-url{padding:12px;background:#23353c;color:#a0cebe;font:10px ui-monospace,monospace}
.mhe-tech-list{display:flex;flex-direction:column;gap:9px;padding:10px 15px;color:#cad9d0;font:10px ui-monospace,monospace}
.mhe-tech-list span{animation:mhe-tech-highlight 5s infinite}.mhe-tech-list span:nth-child(2){animation-delay:-1s}.mhe-tech-list span:nth-child(3){animation-delay:-2s}.mhe-tech-list span:nth-child(4){animation-delay:-3s}
.mhe-tech-list i{color:#69dda1;font-style:normal;padding-right:9px}
.mhe-tech-sweep{height:2px;position:absolute;top:39px;left:0;right:0;background:linear-gradient(90deg,transparent,#6effbd,transparent);box-shadow:0 0 14px #6effbd;animation:mhe-scan 5s infinite}
@keyframes mhe-bar-grow{0%{transform:scaleY(.5)}100%{transform:scaleY(1)}}@keyframes mhe-cm-flash{0%,70%,100%{background:#f0f5f1}80%{background:#d7f1e3}}@keyframes mhe-tech-highlight{0%,85%,100%{color:#cad9d0}40%{color:#74f2b6}}
@media(max-width:1000px){.mrseo-home-editorial .mhe-grid{grid-template-columns:repeat(2,minmax(0,1fr))}}
@media(max-width:600px){.mrseo-home-editorial .mhe-grid{grid-template-columns:1fr}}
@media(prefers-reduced-motion:reduce){.mhe-analytics *, .mhe-commerce *, .mhe-technical *{animation:none!important}}

/* Seventh orbit satellite: websites, distinguished from custom web development. */
.orbit-lab .lab-node-7{--service-color:#80d7bd;top:53%;right:0;left:auto;bottom:auto}
.orbit-lab .lab-node-7 .lab-node-glyph{color:#80d7bd}
.mhe-website .mhe-ws-tabs{display:flex;gap:8px;margin:14px 15px 10px}
.mhe-website .mhe-ws-tabs i{width:27px;height:6px;background:#cad5d0;border-radius:3px}
.mhe-website .mhe-ws-tabs i:first-child{background:#f47f68;width:44px}
.mhe-website .mhe-ws-layout{background:#f0f5f2;border-radius:8px;margin:0 15px;padding:12px;display:flex;flex-direction:column;gap:11px;min-height:106px}
.mhe-website .mhe-ws-display{display:flex;flex-direction:column;gap:7px;position:relative}
.mhe-website .mhe-ws-display b{width:52%;height:11px;background:#2d4648;border-radius:3px;animation:mhe-ws-appear 5s ease-in-out infinite}
.mhe-website .mhe-ws-display span{width:84%;height:5px;background:#b4c7be;border-radius:3px}
.mhe-website .mhe-ws-display span:nth-child(3){width:60%}
.mhe-website .mhe-ws-display em{position:absolute;right:7px;top:0;width:47px;height:44px;border-radius:7px;background:linear-gradient(135deg,#8bd6bb,#3e8fa4);animation:mhe-ws-appear 5s ease-in-out infinite reverse}
.mhe-website .mhe-ws-tiles{display:flex;gap:7px}
.mhe-website .mhe-ws-tiles i{flex:1;height:22px;background:#d5e6db;border-radius:4px;animation:mhe-product 4s infinite}
.mhe-website .mhe-ws-tiles i:nth-child(2){animation-delay:-1.3s}.mhe-website .mhe-ws-tiles i:nth-child(3){animation-delay:-2.6s}
.mhe-website .mhe-ws-progress{height:3px;background:#dce7e1;margin:9px 15px;overflow:hidden;border-radius:3px}
.mhe-website .mhe-ws-progress i{display:block;width:100%;height:100%;background:#32b39a;transform-origin:left;animation:mhe-ws-load 5s ease-in-out infinite}
@keyframes mhe-ws-appear{0%,10%{opacity:.4;transform:translateY(5px)}30%,85%{opacity:1;transform:none}100%{opacity:.4;transform:translateY(5px)}}
@keyframes mhe-ws-load{0%{transform:scaleX(0)}70%,100%{transform:scaleX(1)}}
@media(max-width:650px){.orbit-lab .lab-node-7{top:83%!important;left:calc(50% - 66px)!important;right:auto!important}.orbit-lab .lab-visual{margin-bottom:70px}}
@media(prefers-reduced-motion:reduce){.mhe-website *{animation:none!important}}

/* The seventh-card row closes with a two-column business challenge statement. */
.mrseo-home-editorial .mhe-resolution{grid-column:span 2;position:relative;isolation:isolate;overflow:hidden;min-height:480px;background:linear-gradient(115deg,#141d1d,#253230);color:#f6f3ec;padding:clamp(28px,4vw,58px);display:flex;flex-direction:column;align-items:flex-start;justify-content:center;gap:18px}
.mhe-resolution-top{display:flex;align-items:center;gap:12px;position:relative;z-index:2;font:750 10px/1.5 system-ui,sans-serif;letter-spacing:.12em;color:#e6a596}
.mhe-resolution-symbol{width:31px;height:31px;display:grid;place-items:center;border:1px solid #e887716e;border-radius:50%;font-size:17px}
.mrseo-home-editorial .mhe-resolution h3{position:relative;z-index:2;font-size:clamp(36px,4vw,63px);line-height:1.04;letter-spacing:-.065em;margin:7px 0 0;max-width:620px}
.mhe-resolution h3 em{font-style:normal;color:#ff886f}
.mrseo-home-editorial .mhe-resolution p{position:relative;z-index:2;color:#bac6c0;max-width:490px;font-size:16px;line-height:1.65;margin:0}
.mhe-resolution>a{position:relative;z-index:2;display:inline-flex;align-items:center;gap:40px;border:1px solid #f7f0e56b;border-radius:30px;padding:15px 22px;color:#fff!important;text-decoration:none!important;font-size:13px;font-weight:800;transition:background .25s,transform .25s}
.mhe-resolution>a:hover{background:#f47d65;color:#111!important;transform:translateY(-2px)}
.mhe-resolution-orbit{position:absolute;width:400px;height:400px;border:1px solid #76c4b51f;border-radius:50%;right:-165px;top:18px;pointer-events:none}
.mhe-resolution-orbit:before,.mhe-resolution-orbit:after{content:"";position:absolute;inset:54px;border:1px solid #79c3b527;border-radius:50%;transform:rotate(-28deg) scaleX(.7)}
.mhe-resolution-orbit:after{inset:100px;border-color:#ff88702e;transform:rotate(35deg) scaleX(1.6)}
.mhe-resolution-orbit i{position:absolute;width:5px;height:5px;border-radius:50%;background:#ff9377;box-shadow:0 0 14px #ff9277;top:40px;left:46%;animation:mhe-orbital-pulse 5s ease-in-out infinite}
.mhe-resolution-orbit i:nth-child(2){top:70%;left:7%;animation-delay:1.4s;background:#80dfcc}
.mhe-resolution-orbit i:nth-child(3){top:47%;left:96%;animation-delay:2.8s}
@keyframes mhe-orbital-pulse{50%{transform:scale(2);opacity:.35}}
@media(max-width:1000px){.mrseo-home-editorial .mhe-resolution{grid-column:span 2;min-height:420px}}
@media(max-width:600px){.mrseo-home-editorial .mhe-resolution{grid-column:span 1;min-height:440px}.mrseo-home-editorial .mhe-resolution h3{font-size:clamp(35px,9vw,52px)}}
@media(prefers-reduced-motion:reduce){.mhe-resolution-orbit i{animation:none}}

/* Mobile homepage cleanup: remove prototype remnants and prevent satellite collisions. */
<?php if($mrseo_is_home):?>
.orbit-lab .lab-controls,.orbit-lab .lab-status,.orbit-lab .lab-footer-line,.orbit-lab .lab-intro-note,.orbit-lab .lab-action-quiet{display:none!important}
<?php endif;?>
@media(max-width:650px){
 .orbit-lab .lab-shell{padding:48px 16px 55px!important;gap:30px!important}
 .orbit-lab .lab-copy{width:100%;padding:0!important}
 .orbit-lab .lab-copy h1{font-size:clamp(45px,11vw,65px)!important;line-height:1.02!important;overflow-wrap:normal}
 .orbit-lab .lab-visual{display:grid!important;grid-template-columns:repeat(2,minmax(0,1fr))!important;align-items:stretch!important;justify-items:stretch!important;gap:10px!important;aspect-ratio:auto!important;width:100%!important;margin:0!important;padding:0 0 5px!important;transform:none!important;min-height:0!important}
 .orbit-lab .lab-visual>.lab-core{position:relative!important;grid-column:1/-1;grid-row:1;justify-self:center!important;align-self:center!important;width:clamp(185px,58vw,270px)!important;min-width:0!important;margin:12px auto 20px!important;inset:auto!important;transform:none!important}
 .orbit-lab .lab-visual>.lab-node{position:relative!important;top:auto!important;right:auto!important;bottom:auto!important;left:auto!important;transform:none!important;margin:0!important;width:100%!important;min-width:0!important;max-width:none!important;height:auto!important;min-height:81px!important;padding:12px 9px!important;justify-self:stretch!important;box-sizing:border-box;overflow:hidden}
 .orbit-lab .lab-visual>.lab-node:last-of-type{grid-column:1/-1;max-width:100%!important}
 .orbit-lab .lab-node-glyph{width:28px!important;height:28px!important;flex-basis:28px!important}
 .orbit-lab .lab-node-content strong{font-size:11px!important}
 .orbit-lab .lab-node-content small{font-size:9px!important;line-height:1.3}
 .orbit-lab .lab-orbit,.orbit-lab .lab-connectors,.orbit-lab .lab-data,.orbit-lab .lab-detail,.orbit-lab .lab-visual:before{display:none!important}
 .orbit-lab .lab-nebula,.orbit-lab .lab-landscape{pointer-events:none}
}

/* Orbital flagship: cinematic technical art direction, not a static hero image. */
<?php if($mrseo_is_home):?>
.orbit-lab{background:#030b12!important}
.orbit-lab:before{background:radial-gradient(ellipse 53% 63% at 77% 51%,#164e7c6b,transparent 72%),radial-gradient(ellipse 43% 50% at 50% 86%,#0e5e9866,transparent 85%),radial-gradient(ellipse 80% 60% at 66% 18%,#0f233c99,transparent 76%),linear-gradient(112deg,#030810 0%,#06131e 55%,#020810 100%)!important}
.orbit-lab .lab-stars{opacity:.95!important;background-image:radial-gradient(circle,#dff9ff 0 1px,transparent 1.8px),radial-gradient(circle,#66bffc 0 .8px,transparent 1.5px),radial-gradient(circle,#ffbb92 0 .7px,transparent 1.5px)!important;background-size:97px 117px,157px 131px,241px 173px!important;background-position:7px 14px,35px 45px,19px 92px!important}
.orbit-lab .lab-nebula{opacity:.8!important;filter:saturate(1.45)}
.orbit-lab .lab-grid{opacity:.055!important}
.orbit-lab .lab-landscape{opacity:.45!important;filter:hue-rotate(170deg) saturate(1.6)}
.orbit-lab .lab-copy{z-index:8}
.orbit-lab .lab-copy h1{font-weight:830!important;letter-spacing:-.075em!important;text-shadow:0 6px 35px #0009}
.orbit-lab .lab-copy h1 em{color:#ff7562!important;text-shadow:0 0 43px #f3634524}
.orbit-lab .lab-label{color:#b2c6d2!important}
.orbit-lab .lab-lead{color:#c0d0d5!important}
.orbit-lab .lab-action:not(.lab-action-quiet){background:#fbf7ef!important;border:1px solid #f59a81!important;box-shadow:0 0 0 5px #fe765915,0 0 40px #f6754e67,0 8px 35px #0008!important}
.orbit-lab .lab-action:not(.lab-action-quiet):hover{background:#ffcfb8!important;box-shadow:0 0 35px #ff856e9c!important}
.orbit-lab .lab-visual{isolation:isolate;filter:drop-shadow(0 0 20px #1b9bde35)}
.orbit-lab .lab-visual:before{width:90%!important;height:90%!important;background:radial-gradient(circle,#136dc265 0%,#0d69b838 30%,#00b8ff08 62%,transparent 74%)!important;filter:blur(28px)!important}
.orbit-lab .lab-core{z-index:4!important;box-shadow:0 0 0 3px #5de3ff48,0 0 24px 6px #30b9ff8c,0 0 65px 16px #007bd65c,0 0 150px 25px #006bb529!important}
.orbit-lab .lab-core:after{inset:-6px!important;border:2px solid #91f3ff9c!important;box-shadow:0 0 19px #57d8ffb8,inset 0 0 17px #42b9fc87!important;pointer-events:none}
.orbit-lab .lab-orbit-one{border:1px dashed #80ccff95!important;box-shadow:0 0 12px #15aaf439}
.orbit-lab .lab-orbit-two{border:1px solid #ff9a7759!important}
.orbit-lab .lab-orbit-three{border:1px solid #65bbf078!important}
.orbit-lab .lab-orbit:after{width:7px!important;height:7px!important;background:#b9f5ff!important;box-shadow:0 0 8px 3px #7ce0ff,0 0 28px 6px #23baff88!important}
.orbit-lab .lab-node{background:linear-gradient(135deg,#132536f5,#0b1825f5)!important;border-color:color-mix(in srgb,var(--service-color,#74cced) 78%,#ffffff 22%)!important;box-shadow:inset 3px 0 0 var(--service-color,#77dbee),0 18px 39px #000b,0 0 19px color-mix(in srgb,var(--service-color,#74cced) 38%,transparent)!important;backdrop-filter:blur(18px)}
.orbit-lab .lab-node:hover,.orbit-lab .lab-node.active{background:linear-gradient(130deg,#213648f7,#122537f7)!important;box-shadow:inset 4px 0 0 var(--service-color,#ff866c),0 0 26px color-mix(in srgb,var(--service-color,#ff866c) 60%,transparent),0 20px 45px #000b!important}
.orbit-lab .lab-node-content strong{font-size:14px!important;color:#fff!important}
.orbit-lab .lab-node-content small{color:#c1d0da!important}
.orbit-lab .lab-connectors{filter:drop-shadow(0 0 3px #4cbce9b3);opacity:.92}
.orbit-lab .lab-spoke{stroke-width:1.6!important;stroke-dasharray:4 8!important}
.orbit-lab .lab-spoke.active{stroke-width:2.4!important;stroke-dasharray:8 6!important}
.orbit-lab .lab-visual:after{content:"";position:absolute;width:67%;height:67%;border-radius:50%;pointer-events:none;border:1px dotted #91dcff55;animation:lab-orbit-turn 80s linear infinite}
@media(max-width:1100px){.orbit-lab .lab-visual:after{display:none}}
@media(max-width:650px){.orbit-lab .lab-core{box-shadow:0 0 16px #36acff70,0 0 36px #147bdf45!important}.orbit-lab .lab-visual{filter:none}.orbit-lab .lab-node{box-shadow:inset 2px 0 0 var(--service-color,#77dbee),0 8px 18px #0008!important}}
@media(prefers-reduced-motion:reduce){.orbit-lab .lab-visual:after{animation:none}}
<?php endif;?>

/* Three.js Earth: true alpha edges and undistorted render plane. */
.orbit-lab.lab-webgl-ready .lab-core{background:transparent!important;overflow:visible!important;border-color:transparent!important}
.orbit-lab.lab-webgl-ready .lab-core:after{inset:-9px!important;border:1px solid #59c9fd77!important;box-shadow:0 0 19px #3bbaf4a1!important}
.orbit-lab.lab-webgl-ready .lab-webgl-canvas{position:absolute;inset:0;width:100%;height:100%;border-radius:0!important;z-index:1;opacity:1}
.orbit-lab.lab-webgl-ready .lab-core:before{opacity:0!important}

/* Cinematic reference pass 2026-10-30: actual HTML interaction over original SVG cosmos. */
<?php if($mrseo_is_home):?>
.orbit-lab{background:#020b13 url('<?php echo esc_url(get_template_directory_uri().'/assets/orbit-cosmos.svg?v=1');?>') center center/cover no-repeat!important}
.orbit-lab:before{background:linear-gradient(90deg,#02070dec 0%,#020c16b0 28%,transparent 60%)!important;opacity:.7}
.orbit-lab .lab-landscape{display:none!important}
.orbit-lab .lab-grid{display:none!important}
.orbit-lab .lab-stars{opacity:.24!important}
.orbit-lab .lab-shell{max-width:1840px!important;grid-template-columns:minmax(360px,.77fr) minmax(620px,1.23fr)!important;padding-top:50px!important;padding-bottom:65px!important}
.orbit-lab .lab-visual{width:100%!important;max-width:980px!important}
.orbit-lab .lab-core{width:47%!important;box-shadow:0 0 12px 3px #7bd7ff98,0 0 55px 17px #037ec075!important}
.orbit-lab.lab-webgl-ready .lab-core:after{border:1px solid #b8efff9e!important;box-shadow:0 0 13px #77dcff,0 0 36px #4aafff91!important}
.orbit-lab .lab-copy h1{font-size:clamp(65px,6.6vw,125px)!important}
.orbit-lab .lab-node{min-height:105px!important;height:105px!important;width:clamp(195px,13.5vw,247px)!important;max-width:247px!important;padding:15px 16px!important;border-radius:15px!important}
.orbit-lab .lab-node-content strong{font-size:15px!important}
.orbit-lab .lab-node-content small{font-size:11px!important}
.orbit-lab .lab-node-glyph{width:45px!important;height:45px!important;flex-basis:45px!important}
.orbit-lab .lab-node-arrow{font-size:19px!important}
.orbit-lab .lab-orbit-one{border-color:#58cafaab!important}
.orbit-lab .lab-orbit-two{border-color:#ff9b73a1!important}
.orbit-lab .lab-orbit-three{border-color:#56c7f9af!important}
@media(max-width:1100px){.orbit-lab .lab-shell{display:flex!important;flex-direction:column!important;gap:12px!important;align-items:stretch!important}.orbit-lab .lab-visual{max-width:820px!important}.orbit-lab .lab-core{width:42%!important}}
@media(max-width:650px){.orbit-lab{background-position:58% center!important}.orbit-lab .lab-shell{padding:45px 16px 55px!important}.orbit-lab .lab-copy h1{font-size:clamp(46px,11vw,64px)!important}.orbit-lab .lab-visual>.lab-core{width:clamp(185px,58vw,260px)!important}.orbit-lab .lab-visual>.lab-node{height:auto!important;min-height:80px!important;width:100%!important;min-width:0!important;max-width:none!important}.orbit-lab .lab-node-glyph{width:28px!important;height:28px!important;flex-basis:28px!important}}
<?php endif;?>

/* Clean edge-to-edge hero: no decorative planet horizon or side imagery. */
<?php if($mrseo_is_home):?>
html,body{overflow-x:clip}
.orbit-lab{background:#121a1d!important;background-image:none!important;width:100%!important;max-width:none!important;margin:0!important;border-radius:0!important}
.orbit-lab:before{background:radial-gradient(ellipse at 73% 51%,#133448 0%,#111d23 42%,#121a1d 75%)!important;opacity:1!important}
.orbit-lab .lab-nebula,.orbit-lab .lab-stars,.orbit-lab .lab-landscape{display:none!important}
.orbit-lab .lab-visual{filter:none!important}
.orbit-lab .lab-core{box-shadow:0 0 22px #1b8ac674,0 0 60px #1687c341!important}
.orbit-lab.lab-webgl-ready .lab-core:after{box-shadow:0 0 12px #4bbdfb6e!important}
<?php endif;?>

/* Make all seven active connections visible against the clean hero. */
@media(min-width:651px){
.orbit-lab .lab-connectors{display:block!important;opacity:1!important;z-index:3!important;overflow:visible!important;pointer-events:none}
.orbit-lab .lab-spoke{stroke:var(--spoke,#75c9ed)!important;stroke-opacity:.85!important;stroke-width:2.1!important;stroke-dasharray:6 7!important;filter:drop-shadow(0 0 4px var(--spoke,#75c9ed))}
.orbit-lab .lab-spoke-end{fill:var(--spoke,#75c9ed)!important;opacity:1!important;filter:drop-shadow(0 0 5px var(--spoke,#75c9ed))}
.orbit-lab .lab-spoke.active{stroke-width:2.8!important;stroke-opacity:1!important}
}
</style>
<main class="orbit-lab"><div class="lab-nebula" aria-hidden="true"></div><div class="lab-stars" aria-hidden="true"></div><div class="lab-landscape" aria-hidden="true"><svg viewBox="0 0 1500 300" preserveAspectRatio="none"><defs><linearGradient id="lab-ground" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#76331e"/><stop offset=".65" stop-color="#180d0b"/><stop offset="1" stop-color="#08090a"/></linearGradient></defs><path d="M0 210 75 166 130 188 240 90 332 198 422 132 500 216 592 172 715 225 812 143 910 227 1000 100 1100 196 1178 123 1280 211 1400 160 1500 216V300H0Z" fill="url(#lab-ground)"/><path d="M0 254Q360 208 720 261T1500 246V300H0Z" fill="#120e0c"/><path d="M530 254Q720 237 915 260" stroke="#f4763a" stroke-width="2" opacity=".68" fill="none"/></svg></div><div class="lab-grid" aria-hidden="true"></div><div class="lab-shell"><div class="lab-copy"><div class="lab-label"><?php echo esc_html($mrseo_is_home?mrseo_t('СТРАТЕГІЯ · ТЕХНОЛОГІЇ · ЗРОСТАННЯ','СТРАТЕГИЯ · ТЕХНОЛОГИИ · РОСТ','STRATEGY · TECHNOLOGY · GROWTH'):'MRSEO.TECH / EXPERIMENT 01');?></div><h1><?php echo wp_kses_post(mrseo_t('Сайт є.<br><em>А клієнти?</em>','Сайт есть.<br><em>А клиенты?</em>','You have a website.<br><em>Where are the customers?</em>'));?></h1><p class="lab-lead"><?php echo esc_html(mrseo_t('SEO, реклама й аналітика не повинні працювати окремо. Ми поєднуємо технології та маркетинг в одну систему, яка допомагає вирішувати бізнес-завдання.','SEO, реклама и аналитика не должны работать по отдельности. Мы объединяем технологии и маркетинг в систему для решения бизнес-задач.','SEO, paid media and analytics work best as one connected system. We align technology and marketing around business problems.'));?></p><div class="lab-actions"><a class="lab-action" href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html(mrseo_t('Обговорити проєкт','Обсудить проект','Discuss a project'));?> <span>↗</span></a><a class="lab-action lab-action-quiet" href="<?php echo esc_url(mrseo_url());?>"><?php echo esc_html(mrseo_t('На головну','На главную','Back to homepage'));?></a></div><div class="lab-controls"><button type="button" class="lab-control" id="lab-autoplay" aria-pressed="false">▶ <?php echo esc_html(mrseo_t("Автоогляд","Автообзор","Auto tour"));?></button><button type="button" class="lab-control" id="lab-motion" aria-pressed="false">Ⅱ <?php echo esc_html(mrseo_t("Зупинити рух","Остановить движение","Pause motion"));?></button><span class="lab-controls-note"><?php echo esc_html(mrseo_t("Наведіть курсор на орбіту або оберіть напрям","Наведите курсор на орбиту или выберите направление","Move your pointer or select a service"));?></span></div><div class="lab-status"><div><span>DESIGN DIRECTION</span><strong>Orbital Growth System</strong></div><div><span>EXPERIMENT STATUS</span><strong>Private concept / 01</strong></div></div></div><div class="lab-visual" aria-label="<?php echo esc_attr(mrseo_t('Інтерактивна схема маркетингових напрямів','Интерактивная схема маркетинговых направлений','Interactive marketing service map'));?>"><svg class="lab-connectors" aria-hidden="true"><g id="lab-spokes"></g><line id="lab-link" x1="50%" y1="50%" x2="50%" y2="50%"></line><circle id="lab-link-point" cx="50%" cy="50%" r="4"></circle></svg><div class="lab-orbit lab-orbit-one"></div><div class="lab-data lab-data-a"><svg viewBox="0 0 70 35"><path d="M1 30L13 26L25 28L37 15L46 20L55 9L68 3"/></svg><span><b>SEARCH / ORGANIC</b><small><?php echo esc_html(mrseo_t("Тренди попиту","Тренды спроса","Demand trends"));?></small></span></div><div class="lab-data lab-data-b"><svg viewBox="0 0 70 35"><path d="M1 29L13 21L24 25L35 14L45 17L55 8L68 3"/></svg><span><b>ANALYTICS / LIVE</b><small><?php echo esc_html(mrseo_t("Сигнали зростання","Сигналы роста","Growth signals"));?></small></span></div><div class="lab-orbit lab-orbit-two"></div><div class="lab-orbit lab-orbit-three"></div><div class="lab-core"><small>CONNECTED SYSTEM</small><strong>MRSEO<br>GROWTH</strong><div class="lab-core-signal"></div></div>
<?php
$nodes=array(
array('SEO',mrseo_t('Органічний попит і видимість','Органический спрос и видимость','Organic demand & visibility')),
array('Google Ads',mrseo_t('Керований платний трафік','Управляемый платный трафик','Intent-driven paid acquisition')),
array('Analytics',mrseo_t('Дані для точних рішень','Данные для точных решений','Data-driven decisions')),
array('E-commerce',mrseo_t('Зростання каталогу та продажів','Рост каталога и продаж','Catalog architecture & growth')),
array('Technical SEO',mrseo_t('Технічна якість сайту','Техническое качество сайта','Technical foundations')),
array('Web Development',mrseo_t('Розробка та технічні рішення для бізнесу','Разработка и технические решения для бизнеса','Development and technical solutions for business')),
array(mrseo_t('Створення сайтів','Создание сайтов','Website Creation'),mrseo_t('Сайти для бізнесу та інтернет-магазини','Сайты для бизнеса и интернет-магазины','Business websites and online stores'))
);
$service_urls=array('seo','google-ads','analytics','horoshop','seo-audit','service-websites','service-websites');
foreach($nodes as $i=>$node):?><a href="<?php echo esc_url(mrseo_url($service_urls[$i]));?>" class="lab-node lab-node-<?php echo $i+1;?><?php echo $i===0?' active':'';?>" data-lab-title="<?php echo esc_attr($node[0]);?>" data-lab-detail="<?php echo esc_attr($node[1]);?>" aria-pressed="<?php echo $i===0?'true':'false';?>"><span class="lab-node-glyph" aria-hidden="true"><?php if($i===1):?><svg viewBox="0 0 36 36" aria-hidden="true" width="30" height="30"><path d="M19.4 4.7c2.4-1.4 5.4-.6 6.8 1.9l9 15.7c1.3 2.4.5 5.3-1.9 6.7-2.4 1.3-5.3.6-6.7-1.9l-9-15.7c-1.4-2.4-.6-5.4 1.8-6.7Z" fill="#4285F4"/><path d="M18.8 5c-2.3-1.4-5.3-.6-6.7 1.9L1.6 25.4c-1.4 2.4-.6 5.4 1.8 6.8 2.4 1.4 5.4.6 6.8-1.8L20.6 11.8c1.4-2.4.6-5.4-1.8-6.8Z" fill="#34A853"/><circle cx="6" cy="28.2" r="5.4" fill="#FBBC04"/></svg><?php elseif($i===2):?><svg viewBox="0 0 36 36" aria-hidden="true" width="30" height="30"><path d="M25 4a5 5 0 0 1 5 5v21a5 5 0 0 1-10 0V9a5 5 0 0 1 5-5Z" fill="#F9AB00"/><path d="M16 14a5 5 0 0 1 5 5v11a5 5 0 0 1-10 0V19a5 5 0 0 1 5-5Z" fill="#E37400"/><circle cx="6" cy="30" r="5" fill="#E37400"/></svg><?php else:echo esc_html(array("↗","", "", "◇","⚙","▣","▤")[$i]);endif;?></span><span class="lab-node-content"><strong><?php echo esc_html($node[0]);?></strong><small><?php echo esc_html($node[1]);?></small></span><span class="lab-node-arrow" aria-hidden="true">↗</span></a><?php endforeach;?><div class="lab-detail" aria-live="polite"><span id="lab-selected">01 / SEO</span><strong id="lab-selected-detail"><?php echo esc_html($nodes[0][1]);?></strong></div></div><span class="lab-intro-note">INTERACTIVE STRATEGY MODEL / 2026</span></div><div class="lab-footer-line"><span>MRSEO.TECH / CONNECTED GROWTH SYSTEM</span><span>SEO · GOOGLE ADS · ANALYTICS · WEB</span><span>INTERACTIVE CONCEPT 03</span></div></main>
<script>
(()=>{'use strict';
const root=document.querySelector('.orbit-lab');if(!root)return;
const visual=root.querySelector('.lab-visual'),core=root.querySelector('.lab-core');
const nodes=[...root.querySelectorAll('.lab-node')],title=root.querySelector('#lab-selected'),detail=root.querySelector('#lab-selected-detail'),box=root.querySelector('.lab-detail');
const line=root.querySelector('#lab-link'),dot=root.querySelector('#lab-link-point'),auto=root.querySelector('#lab-autoplay'),motion=root.querySelector('#lab-motion');
const reduced=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
let selected=0,tour=null,flash=null,raf=0;
const palette=['#ff985a','#72d3e4','#a7e4a0','#d8b1ff','#ffca74','#ff849c','#80d7bd'];const spokes=root.querySelector('#lab-spokes');
const paths=nodes.map((n,i)=>{const color=palette[i],ns='http://www.w3.org/2000/svg';const link=document.createElementNS(ns,'line'),end=document.createElementNS(ns,'circle');link.setAttribute('class','lab-spoke');end.setAttribute('class','lab-spoke-end');link.style.setProperty('--spoke',color);end.style.setProperty('--spoke',color);end.setAttribute('r','4');spokes.append(link,end);return {link,end};});
function connect(){
 const v=visual.getBoundingClientRect(),n=nodes[selected].getBoundingClientRect(),c=core.getBoundingClientRect();
 const x1=c.left+c.width/2-v.left,y1=c.top+c.height/2-v.top,x2=n.left+n.width/2-v.left,y2=n.top+n.height/2-v.top;
 line.setAttribute('x1',x1);line.setAttribute('y1',y1);line.setAttribute('x2',x2);line.setAttribute('y2',y2);
 dot.setAttribute('cx',x2);dot.setAttribute('cy',y2);
 nodes.forEach((node,i)=>{const rect=node.getBoundingClientRect();const tx=rect.left+rect.width/2-v.left,ty=rect.top+rect.height/2-v.top;const angle=Math.atan2(ty-y1,tx-x1);const rr=Math.min(c.width,c.height)*.50;const sx=x1+Math.cos(angle)*rr,sy=y1+Math.sin(angle)*rr;const {link,end}=paths[i];link.setAttribute('x1',sx);link.setAttribute('y1',sy);link.setAttribute('x2',tx);link.setAttribute('y2',ty);end.setAttribute('cx',tx);end.setAttribute('cy',ty);link.classList.toggle('active',i===selected);end.classList.toggle('active',i===selected)});
}
function pick(index){
 selected=(index+nodes.length)%nodes.length;visual.style.setProperty('--active-signal',palette[selected]);
 nodes.forEach((n,i)=>{const active=i===selected;n.classList.toggle('active',active);n.setAttribute('aria-pressed',String(active))});
 title.textContent=String(selected+1).padStart(2,'0')+' / '+nodes[selected].dataset.labTitle;
 detail.textContent=nodes[selected].dataset.labDetail;
 box.classList.remove('lab-flash');void box.offsetWidth;box.classList.add('lab-flash');
 if(flash)clearTimeout(flash);flash=setTimeout(()=>box.classList.remove('lab-flash'),550);
 connect();
}
function stopTour(){if(tour)clearInterval(tour);tour=null;auto.setAttribute('aria-pressed','false')}
nodes.forEach((n,i)=>{n.addEventListener('mouseenter',()=>{if(!tour)pick(i)});n.addEventListener('focus',()=>{stopTour();pick(i)})});
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

/* Six linked satellites travel on one circle, never on independent paths. */
if(!reduced&&window.matchMedia('(min-width:1101px)').matches){
 let orbitalFrame=0,lastOrbit=0,angle=-Math.PI/2,hovering=false,enabled=true;
 const orbitSpeed=.055;
 function moveOrbit(now){
  if(!enabled)return;
  if(lastOrbit&&!hovering&&!root.classList.contains('lab-paused'))angle+=Math.min((now-lastOrbit)/1000,.05)*orbitSpeed;
  lastOrbit=now;
  const w=visual.clientWidth,h=visual.clientHeight;
  const cardW=nodes[0].offsetWidth,cardH=nodes[0].offsetHeight;
  const radius=Math.max(0,Math.min(w*.37,h*.37,(w-cardW)/2-12,(h-cardH)/2-12));
  nodes.forEach((n,i)=>{
   const a=angle+(i*Math.PI*2/nodes.length);
   const x=w*.5+Math.cos(a)*radius-n.offsetWidth*.5;
   const y=h*.5+Math.sin(a)*radius-n.offsetHeight*.5;
   n.style.transform='translate3d('+x.toFixed(1)+'px,'+y.toFixed(1)+'px,0)';
   n.classList.add('lab-orbiting');
  });
  connect();
  orbitalFrame=requestAnimationFrame(moveOrbit);
 }
 nodes.forEach(n=>{n.addEventListener('pointerenter',()=>{hovering=true});n.addEventListener('pointerleave',()=>{hovering=false})});
 visual.addEventListener('focusin',()=>{hovering=true});visual.addEventListener('focusout',e=>{if(!visual.contains(e.relatedTarget))hovering=false});
 const visibility=()=>{if(document.hidden){enabled=false;cancelAnimationFrame(orbitalFrame)}else if(!enabled){enabled=true;lastOrbit=0;orbitalFrame=requestAnimationFrame(moveOrbit)}};
 document.addEventListener('visibilitychange',visibility);
 orbitalFrame=requestAnimationFrame(moveOrbit);
}

requestAnimationFrame(connect);
})();
</script>
<script type="module" src="<?php echo esc_url(get_template_directory_uri().'/assets/orbit-earth-three.js?v=2');?>"></script>

<?php if($mrseo_is_home):?>
<section class="mrseo-home-editorial" aria-label="<?php echo esc_attr(mrseo_t('Наш підхід до розвитку бізнесу','Наш подход к развитию бизнеса','Our business growth approach'));?>">
<div class="mhe-inner">
<div class="mhe-kicker"><?php echo esc_html(mrseo_t('ВІД ПРОБЛЕМИ ДО РІШЕННЯ','ОТ ПРОБЛЕМЫ К РЕШЕНИЮ','FROM CHALLENGE TO SOLUTION'));?></div>
<h2><?php echo esc_html(mrseo_t('Сайт має працювати на бізнес, а не просто існувати.','Сайт должен работать на бизнес, а не просто существовать.','Your website should drive business, not just exist.'));?></h2>
<p class="mhe-intro"><?php echo esc_html(mrseo_t('Коли сайт не приносить достатньо звернень, причина може бути в структурі, пошуковій видимості, рекламі або вимірюванні результатів. Ми знаходимо обмеження та формуємо послідовний план змін — від технічної основи до залучення клієнтів.','Когда сайт не приносит достаточно заявок, причина может быть в структуре, поисковой видимости, рекламе или измерении результатов. Мы находим ограничения и выстраиваем план улучшений — от технической основы до привлечения клиентов.','When a website struggles to generate enquiries, the bottleneck may be site architecture, organic visibility, paid acquisition or measurement. We diagnose constraints and prioritize improvements that support business goals.'));?></p>
<div class="mhe-grid">
<article class="mhe-item"><span>01 / SEARCH</span><h3><?php echo esc_html(mrseo_t('SEO та технічна оптимізація','SEO и техническая оптимизация','SEO & technical foundations'));?></h3><div class="mhe-preview mhe-seo" aria-hidden="true"><div class="mhe-preview-top"><span class="mhe-dot"></span><span class="mhe-dot"></span><span class="mhe-dot"></span><small>SEARCH / VISIBILITY</small></div><div class="mhe-searchbar"><i>⌕</i><b>seo / website / growth</b><span>↵</span></div><div class="mhe-result"><div class="mhe-result-url">example.com / services</div><div class="mhe-result-title"></div><div class="mhe-result-text"></div><div class="mhe-result-text short"></div></div><div class="mhe-result second"><div class="mhe-result-url">example.com / solutions</div><div class="mhe-result-title"></div><div class="mhe-result-text"></div></div><span class="mhe-scan"></span></div><p><?php echo esc_html(mrseo_t('Аналізуємо пошуковий попит, структуру сторінок, індексацію та технічні бар’єри. Працюємо над тим, щоб потенційні клієнти знаходили релевантні сторінки.','Анализируем поисковый спрос, структуру страниц, индексацию и технические ограничения. Помогаем потенциальным клиентам находить нужные страницы.','We review search demand, landing-page structure, indexing and technical obstacles so relevant pages can be discovered.'));?></p><a href="<?php echo esc_url(mrseo_url('seo'));?>"><?php echo esc_html(mrseo_t('Про SEO','О SEO','Explore SEO'));?> ↗</a></article>
<article class="mhe-item"><span>02 / GOOGLE ADS</span><h3><?php echo esc_html(mrseo_t('Google Ads','Google Ads','Google Ads'));?></h3><div class="mhe-preview mhe-ads" aria-hidden="true"><div class="mhe-preview-top"><span class="mhe-dot"></span><span class="mhe-dot"></span><span class="mhe-dot"></span><small>ADS / COMMERCE</small></div><div class="mhe-ads-bar"><span class="mhe-ads-logo"><i></i><i></i><i></i></span><b>Campaign overview</b><span class="mhe-status-dot"></span></div><div class="mhe-chart"><svg viewBox="0 0 300 86" preserveAspectRatio="none"><path class="mhe-chart-fill" d="M0 72 C35 60 45 68 75 47 S132 58 162 29 S212 43 240 15 S276 23 300 5 L300 86 L0 86Z"/><path class="mhe-chart-line" d="M0 72 C35 60 45 68 75 47 S132 58 162 29 S212 43 240 15 S276 23 300 5"/></svg><span class="mhe-chart-cursor"></span></div><div class="mhe-products"><i></i><i></i><i></i><i></i></div></div><p><?php echo esc_html(mrseo_t('Налаштовуємо рекламні кампанії та працюємо з товарними каталогами, фідами й аналітикою конверсій, щоб рішення спиралися на дані.','Настраиваем рекламные кампании и работаем с каталогами, фидами и аналитикой конверсий, чтобы решения опирались на данные.','We connect campaign structure, product data and conversion tracking to make advertising decisions more informed.'));?></p><a href="<?php echo esc_url(mrseo_url('google-ads'));?>"><?php echo esc_html(mrseo_t('Про Google Ads','О Google Ads','Explore Google Ads'));?> ↗</a></article>
<article class="mhe-item"><span>03 / ANALYTICS</span><h3>Analytics</h3><div class="mhe-preview mhe-analytics" aria-hidden="true"><div class="mhe-preview-top"><span class="mhe-dot"></span><span class="mhe-dot"></span><span class="mhe-dot"></span><small>DATA / INSIGHTS</small></div><div class="mhe-an-head"><span>GA4 / EVENTS</span><b class="mhe-live">● LIVE</b></div><div class="mhe-an-bars"><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div><div class="mhe-an-events"><span>page_view</span><span>add_to_cart</span><span>purchase</span></div></div><p><?php echo esc_html(mrseo_t('Налаштовуємо GA4, події та відстеження конверсій. Допомагаємо бачити шлях клієнта й ухвалювати рішення на основі коректних даних.','Настраиваем GA4, события и отслеживание конверсий. Помогаем понимать путь клиента и принимать решения на основе данных.','We set up GA4, events and conversion tracking to make customer journeys measurable and decisions clearer.'));?></p><a href="<?php echo esc_url(mrseo_url('analytics'));?>"><?php echo esc_html(mrseo_t('Про аналітику','Об аналитике','Explore Analytics'));?> ↗</a></article>
<article class="mhe-item"><span>04 / E-COMMERCE</span><h3>E-commerce</h3><div class="mhe-preview mhe-commerce" aria-hidden="true"><div class="mhe-preview-top"><span class="mhe-dot"></span><span class="mhe-dot"></span><span class="mhe-dot"></span><small>PRODUCT / CATALOG</small></div><div class="mhe-cm-toolbar"><span>Product feed</span><b>↻ SYNC</b></div><div class="mhe-cm-row"><i></i><div><b></b><small></small></div><em>✓</em></div><div class="mhe-cm-row"><i></i><div><b></b><small></small></div><em>✓</em></div><div class="mhe-cm-row"><i></i><div><b></b><small></small></div><em>✓</em></div></div><p><?php echo esc_html(mrseo_t('Оптимізуємо структуру інтернет-магазину, категорії, товари та фіди. Працюємо з Horoshop і завданнями органічного та рекламного зростання.','Оптимизируем структуру интернет-магазина, категории, товары и фиды. Работаем с Horoshop и задачами роста органического и платного трафика.','We improve store structure, category pages, product data and feeds, including Horoshop projects.'));?></p><a href="<?php echo esc_url(mrseo_url('horoshop'));?>"><?php echo esc_html(mrseo_t('Про e-commerce','Об e-commerce','Explore E-commerce'));?> ↗</a></article>
<article class="mhe-item"><span>05 / TECHNICAL SEO</span><h3>Technical SEO</h3><div class="mhe-preview mhe-technical" aria-hidden="true"><div class="mhe-preview-top"><span class="mhe-dot"></span><span class="mhe-dot"></span><span class="mhe-dot"></span><small>CRAWL / INDEX</small></div><div class="mhe-tech-browser"><div class="mhe-tech-url">https://example.com/category/</div><div class="mhe-tech-list"><span><i>✓</i> status: 200 OK</span><span><i>✓</i> canonical: valid</span><span><i>✓</i> indexability: allowed</span><span><i>✓</i> structured data</span></div><div class="mhe-tech-sweep"></div></div></div><p><?php echo esc_html(mrseo_t('Знаходимо технічні помилки індексації, дублікати, проблеми canonical, швидкості та структури. Формуємо пріоритетний план виправлень.','Находим ошибки индексации, дубли, проблемы canonical, скорости и структуры. Определяем приоритеты исправлений.','We identify crawling, indexing, canonical, performance and structural issues and prioritize fixes.'));?></p><a href="<?php echo esc_url(mrseo_url('seo-audit'));?>"><?php echo esc_html(mrseo_t('Про технічне SEO','О техническом SEO','Explore Technical SEO'));?> ↗</a></article>
<article class="mhe-item"><span>06 / DEVELOPMENT</span><h3>Web Development</h3><div class="mhe-preview mhe-dev" aria-hidden="true"><div class="mhe-preview-top"><span class="mhe-dot"></span><span class="mhe-dot"></span><span class="mhe-dot"></span><small>FULL-STACK / BUILD</small></div><div class="mhe-dev-window"><div class="mhe-code"><span><b>const</b> website = {</span><span>&nbsp; design: <em>'premium'</em>,</span><span>&nbsp; speed: <em>'fast'</em>,</span><span>&nbsp; growth: <em>true</em></span><span>}; <i class="mhe-caret"></i></span></div><div class="mhe-app"><div class="mhe-app-nav"></div><div class="mhe-app-title"></div><div class="mhe-app-sub"></div><div class="mhe-app-button"></div><div class="mhe-app-panels"><i></i><i></i><i></i></div></div></div></div><p><?php echo esc_html(mrseo_t('Розробка та технічні рішення для бізнесу. Поєднуємо маркетингове бачення з можливістю технічного впровадження разом із Full-Stack розробником у команді.','Разработка и технические решения для бизнеса. Совмещаем маркетинговые задачи с возможностью технической реализации вместе с Full-Stack разработчиком в команде.','Development and technical solutions for business. Our team includes a full-stack developer, connecting marketing priorities with implementation.'));?></p><a href="<?php echo esc_url(mrseo_url('service-websites'));?>"><?php echo esc_html(mrseo_t('Сайти для бізнесу','Сайты для бизнеса','Business websites'));?> ↗</a></article>
<article class="mhe-item"><span>07 / WEBSITES</span><h3><?php echo esc_html(mrseo_t('Створення сайтів','Создание сайтов','Website Creation'));?></h3><div class="mhe-preview mhe-website" aria-hidden="true"><div class="mhe-preview-top"><span class="mhe-dot"></span><span class="mhe-dot"></span><span class="mhe-dot"></span><small>WEBSITE / LAUNCH</small></div><div class="mhe-ws-tabs"><i></i><i></i><i></i></div><div class="mhe-ws-layout"><div class="mhe-ws-display"><b></b><span></span><span></span><em></em></div><div class="mhe-ws-tiles"><i></i><i></i><i></i></div></div><div class="mhe-ws-progress"><i></i></div></div><p><?php echo esc_html(mrseo_t('Створюємо сайти для послуг, компаній та інтернет-магазинів. Продумуємо структуру, зручність для відвідувачів і готовність до SEO та реклами.','Создаём сайты для услуг, компаний и интернет-магазинов. Продумываем структуру, удобство посетителей и подготовку к SEO и рекламе.','We create service websites, company sites and online stores with thoughtful structure, usability and foundations for SEO and ads.'));?></p><a href="<?php echo esc_url(mrseo_url('service-websites'));?>"><?php echo esc_html(mrseo_t('Про створення сайтів','О создании сайтов','Explore Website Creation'));?> ↗</a></article>
<div class="mhe-resolution" role="group" aria-label="<?php echo esc_attr(mrseo_t('Вирішуємо завдання бізнесу','Решаем задачи бизнеса','Solving business challenges'));?>">
<div class="mhe-resolution-top"><span class="mhe-resolution-symbol">↗</span><span><?php echo esc_html(mrseo_t('НЕ НАБІР ПОСЛУГ. РІШЕННЯ ВАШОЇ ЗАДАЧІ.','НЕ НАБОР УСЛУГ. РЕШЕНИЕ ВАШЕЙ ЗАДАЧИ.','NOT A LIST OF SERVICES. A SOLUTION TO YOUR CHALLENGE.'));?></span></div>
<h3><?php echo wp_kses_post(mrseo_t('Є проблема?<br><em>Знайдемо рішення.</em>','Есть проблема?<br><em>Найдём решение.</em>','Have a challenge?<br><em>Let’s solve it.</em>'));?></h3>
<p><?php echo esc_html(mrseo_t('Мало заявок, не працює реклама, сайт не видно в Google чи потрібен новий продукт? Починаємо з причини, а не з продажу послуги.','Мало заявок, реклама не работает, сайт не видно в Google или нужен новый продукт? Начинаем с причины, а не с продажи услуги.','Too few leads, underperforming ads, low search visibility or a new website to build? We start with the cause, not a sales pitch.'));?></p>
<a href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html(mrseo_t('Розповісти про задачу','Рассказать о задаче','Tell us your challenge'));?> <span>↗</span></a>
<div class="mhe-resolution-orbit" aria-hidden="true"><i></i><i></i><i></i></div>
</div>
</div>
<div class="mhe-bottom"><p><?php echo esc_html(mrseo_t('Почнемо з вашої задачі: обговоримо сайт, цілі та пріоритети, перш ніж пропонувати послугу.','Начнём с вашей задачи: обсудим сайт, цели и приоритеты, прежде чем предлагать услугу.','Start with your challenge: let’s discuss your website, goals and priorities before proposing a service.'));?></p><a href="<?php echo esc_url(mrseo_url('contact'));?>"><?php echo esc_html(mrseo_t('Обговорити проєкт','Обсудить проект','Discuss a project'));?> ↗</a></div>
</div></section>
<?php endif;?>
<?php get_footer();?>