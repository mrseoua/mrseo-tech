<?php
if (!defined('ABSPATH')) exit;
?>
<style>
.dev-tech-lab{min-width:0;width:100%;position:relative;isolation:isolate;color:#292a27;background:radial-gradient(ellipse at 46% 36%,#fffdf8 0%,#eee8df 58%,#e0d9ce 100%);border:1px solid #d7cfc3;border-radius:22px;overflow:hidden;box-shadow:0 24px 65px #4b392317;padding:20px}
.dev-tech-lab .dt-head{display:flex;justify-content:space-between;gap:10px;align-items:center;color:#655e55;font-size:12px;font-weight:700;letter-spacing:.08em}
.dev-tech-lab .dt-head b{color:#9b3d32;letter-spacing:.05em}
.dev-tech-lab .dt-stage{position:relative;aspect-ratio:1.2;min-height:280px;display:grid;place-items:center;overflow:hidden;touch-action:pan-y}
.dev-tech-lab .dt-stage:before{content:"";position:absolute;inset:12% 8%;border:1px solid #b9aa9560;border-radius:50%;transform:rotate(-19deg);pointer-events:none}
.dev-tech-lab .dt-stage canvas,.dev-tech-lab .dt-stage svg{position:absolute;inset:0;width:100%;height:100%;display:block}
.dev-tech-lab .dt-stage[data-webgl="true"] svg{visibility:hidden}
.dev-tech-lab .dt-tabs{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:6px}
.dev-tech-lab .dt-tabs button{font:inherit;font-size:13px;font-weight:750;line-height:1.25;min-height:44px;padding:8px 3px;border:1px solid #c9c0b4;color:#403c36;background:#faf7f0;border-radius:7px;cursor:pointer;transition:background .2s,color .2s}
.dev-tech-lab .dt-tabs button[aria-pressed="true"]{background:#292b27;color:#fff;border-color:#292b27}
.dev-tech-lab .dt-tabs button:focus-visible,.dev-tech-lab .dt-original:focus-visible{outline:2px solid #a13b31;outline-offset:3px}
.dev-tech-lab .dt-detail{min-height:100px;padding:15px 2px 8px}
.dev-tech-lab .dt-detail strong{display:block;font-size:19px;letter-spacing:-.025em;line-height:1.25;margin-bottom:7px}
.dev-tech-lab .dt-detail p{margin:0;font-size:15px;line-height:1.5;color:#57524c}
.dev-tech-lab .dt-foot{display:flex;justify-content:space-between;align-items:center;gap:8px;border-top:1px solid #d7cfc3;padding-top:12px;font-size:12px;color:#655e55}
.dev-tech-lab .dt-original{color:#8e352b;text-decoration:underline}
.dev-tech-lab .dt-fallback-layer{transition:opacity .25s}
.dev-tech-lab .dt-fallback-layer:not(.active){opacity:.65}
.dev-tech-lab .dt-fallback-layer.active{opacity:1}
@media(max-width:560px){.dev-tech-lab{padding:13px;border-radius:14px}.dev-tech-lab .dt-stage{min-height:250px;aspect-ratio:1}.dev-tech-lab .dt-head{font-size:11px;letter-spacing:0}.dev-tech-lab .dt-tabs button{font-size:12px}.dev-tech-lab .dt-detail{min-height:120px}.dev-tech-lab .dt-foot{flex-wrap:wrap}}
@media(prefers-reduced-motion:reduce){.dev-tech-lab *{transition:none!important}}
</style>
<div class="dev-tech-lab" id="dev-tech-lab" aria-label="Інтерактивна модель веброзробки">
 <div class="dt-head"><b>MRSEO.TECH / DESIGN LAB</b><span>АРХІТЕКТУРА ПРОДУКТУ</span></div>
 <div class="dt-stage" aria-hidden="true">
 <svg viewBox="0 0 520 450" xmlns="http://www.w3.org/2000/svg">
 <defs><linearGradient id="dt-surface" x1="0" y1="0" x2="1" y2="1"><stop stop-color="#fffefa"/><stop offset="1" stop-color="#d9d1c4"/></linearGradient><linearGradient id="dt-edge"><stop stop-color="#a9a093"/><stop offset="1" stop-color="#e6dfd2"/></linearGradient><filter id="dt-shadow" x="-30%" y="-40%" width="160%" height="200%"><feDropShadow dx="0" dy="9" stdDeviation="9" flood-color="#4e3b24" flood-opacity=".17"/></filter></defs>
 <?php foreach(array(3,2,1,0) as $dt_i): ?>
 <g class="dt-fallback-layer<?php echo $dt_i===0?' active':'';?>" data-layer="<?php echo (int)$dt_i;?>" transform="translate(0 <?php echo (int)($dt_i*92);?>)">
 <path d="M104 72 260 142 416 72 416 83 260 153 104 83Z" fill="url(#dt-edge)" stroke="#a99e8e"/>
 <path d="M260 2 416 72 260 142 104 72Z" fill="url(#dt-surface)" stroke="#b7ab9a" filter="url(#dt-shadow)"/>
 <?php if($dt_i===0):?><path d="M171 64 260 24 349 64 260 104Z" fill="#fdfbf5" stroke="#a99e8e"/><path d="M188 64 260 32 332 64 260 96Z" fill="#e7dfd3"/><path d="M202 64 260 38 286 50 228 76Z" fill="#b94f40"/><path d="M247 79 304 53M260 85 317 59" stroke="#81796e" stroke-width="3"/>
 <?php elseif($dt_i===1):?><?php for($dt_k=0;$dt_k<3;$dt_k++):?><g transform="translate(<?php echo (int)($dt_k*37);?> <?php echo (int)($dt_k*15);?>)"><path d="M176 57 205 44 234 57 205 70Z" fill="#fffdf8" stroke="#9c9284"/><path d="M176 57V70L205 83V70Z" fill="#c0b5a6"/><path d="M205 70 234 57V70L205 83Z" fill="#a89c8a"/></g><?php endfor;?>
 <?php elseif($dt_i===2):?><path d="M183 72 260 37 337 72 260 107Z" fill="none" stroke="#b94f40" stroke-width="2" stroke-dasharray="5 4"/><g fill="#b94f40" stroke="#fffdf8" stroke-width="3"><circle cx="183" cy="72" r="8"/><circle cx="260" cy="37" r="8"/><circle cx="337" cy="72" r="8"/><circle cx="260" cy="107" r="8"/><circle cx="260" cy="72" r="11"/></g>
 <?php else:?><path d="M215 56 260 36 305 56 260 76Z" fill="#d4cbbd" stroke="#9c9284"/><path d="M215 56V85L260 105V76Z" fill="#aaa092"/><path d="M260 76 305 56V85L260 105Z" fill="#bfb4a4"/><path d="M222 66 252 80M222 75 252 89" stroke="#fffdf8" stroke-width="3"/><circle cx="294" cy="75" r="4" fill="#a83f33"/><?php endif;?>
 </g><?php endforeach;?>
 </svg></div>
 <div class="dt-tabs" role="group" aria-label="Рівні архітектури">
 <button type="button" data-layer="0" aria-pressed="true">Сайт / UI</button><button type="button" data-layer="1" aria-pressed="false">CRM</button><button type="button" data-layer="2" aria-pressed="false">API</button><button type="button" data-layer="3" aria-pressed="false">Дані</button>
 </div>
 <div class="dt-detail" aria-live="polite"><strong>Інтерфейс продукту</strong><p>Сайти, вебзастосунки й особисті кабінети, через які клієнти взаємодіють із бізнесом.</p></div>
 <div class="dt-foot"><span>Ілюстрація · не дані клієнта</span><a class="dt-original" href="<?php echo esc_url(mrseo_url('web-development'));?>">Поточна версія ↗</a></div>
</div>
<script type="module" src="<?php echo esc_url(get_template_directory_uri().'/assets/dev-tech-lab.js?v=1');?>"></script>
