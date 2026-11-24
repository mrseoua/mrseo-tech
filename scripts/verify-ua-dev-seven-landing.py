#!/usr/bin/env python3
"""Guard seven unique UA-only WebDev landing pages and safe routes / SEO."""
import json
import re
from pathlib import Path
t=Path(__file__).resolve().parents[1]/"wp-content/themes/mrseo-tech"
copy=(t/"inc/ua-dev-new-pages.php").read_text(encoding="utf-8")
routing=(t/"inc/ua-dev-new-routes.php").read_text(encoding="utf-8")
motion=(t/"assets/ua-dev-premium-images.js").read_text(encoding="utf-8")
premium_css=(t/"assets/ua-dev-premium-images.css").read_text(encoding="utf-8")
import hashlib
master=(t/"inc/ua-dev-master-hero.php").read_text(encoding="utf-8")
reference=(t/"premium-ua-commercial.php").read_text(encoding="utf-8")
template=(t/"ua-dev-new-landing.php").read_text(encoding="utf-8")
css=(t/"assets/ua-dev-new-landings.css").read_text(encoding="utf-8")
nav=(t/"inc/ua-header-six.php").read_text(encoding="utf-8")
functions=(t/"functions.php").read_text(encoding="utf-8")
i18n=(t/"inc/i18n-routing.php").read_text(encoding="utf-8")
hub=(t/"inc/ua-dev-hub-links.php").read_text(encoding="utf-8")
interior=(t/"premium-ua-interior.php").read_text(encoding="utf-8")
taxonomy=(t/"inc/mega-menu-trial.php").read_text(encoding="utf-8")
expected=("client-portals","data-parsing","payment-integration","mobile-app-development",
          "ecommerce-mobile-apps","corporate-mobile-apps","pwa-development")
blob=copy.split("<<<'MRSEO_UA_DEV_CONTENT'\n",1)[1].split("\nMRSEO_UA_DEV_CONTENT",1)[0]
pages=json.loads(blob)
assert tuple(pages)==expected
assert len({x["title"] for x in pages.values()})==7
assert len({x["h1"] for x in pages.values()})==7
assert len({x["meta"] for x in pages.values()})==7
assert len({x["intro"] for x in pages.values()})==7
assert len({x["scene"] for x in pages.values()})==7
for slug,p in pages.items():
    assert all(p.get(k) for k in ("title","meta","h1","highlight","intro","tag","scene","terms","result","cta")),slug
    assert 30<=len(p["title"])<=85,(slug,"title length")
    assert 80<=len(p["meta"])<=190,(slug,"description length")
    assert len(p["problems"])==len(p["actions"])==len(p["faq"])==3,slug
    assert len(p["related"])==2 and len(p["terms"])>=3,slug
    assert all(len(item)==2 and all(item) for key in ("problems","actions","faq","related") for item in p[key]),slug
    assert "http" not in json.dumps(p),slug
    assert f"'{slug}'=>'" in nav,slug
    assert slug in nav,slug  # Route uses dynamic array_keys() from the same validated page registry
    assert f"'{p['scene']}'=>array(" in master,slug
    assert "mrseo_udv_master_scene($scene)" in template,slug
for keyword in ("get_header();","get_footer();","aria-labelledby","id=\"udv-h1\"",
                "mrseo_url('contact','uk')","class=\"udv-faq-list\"","esc_html($p['title'])",
                "esc_html($p['title'])"):
    assert keyword in template,keyword
assert "esc_attr($page['meta'])" in routing
assert "array_keys(mrseo_ua_dev_new_pages())" in routing
assert "mrseo_ua_dev_new_route()" in routing
assert "ua-dev-hub-links.php" in interior
assert "mrseo_ua_dev_new_pages()" in hub
assert "client-portals" in hub and "pwa-development" in hub
assert "udv-hub-grid" in css and "data-pti-service=\"web-development\"" in css
assert "mrseo_locale()!=='uk'" in routing
assert "redirect_canonical" in routing and "remove_action('wp_head','rel_canonical')" in routing
assert "pre_get_document_title" in routing and "wp_enqueue_style" in routing
assert "mrseo_ua_dev_new_pages" in i18n and "mrseo_i18n_exact_url($lang,'web-development')" in i18n
assert "require_once get_template_directory() . '/inc/ua-dev-new-routes.php';" in functions
assert "mrseo-ua-catalog-header" in functions and "ua-catalog-header.css" in functions
assert "X-Robots-Tag: noindex, nofollow" in functions
assert "mrseo_ua_menu_groups()" in nav and "foreach($services['live_extra'] as $slug=>$label)" in nav
assert "mrseo-ua-six-planned" not in nav and "Сторінка готується" not in nav
assert "if(in_array($group['key'],array('data','commerce'),true))continue;" in nav
assert "'sites'=>'Сайти'" in nav
assert "mrseo_ua_menu_groups" in taxonomy and "Вебзастосунки та кабінети" in taxonomy, "SEO route registry must remain unchanged"
assert "data-udv-step=\"0\"" in template and 'data-udv-scene=' in template
assert 'data-udv-stage=' in template and 'udv-motion-toggle' in template
assert "udv-storyboard" in template and "pti-scene-controls" in template
assert "udv-story-step" in css and "udv-kinetic-svg" in css
assert 'class="pti-page puc-page udv-page' in template
assert 'class="pti-hero psc-hero udv-hero"' in template
assert 'class="pti-wrap pti-hero-grid udv-hero-grid"' in template
assert 'class="psc-hero-stage udv-visual"' in template
assert "class=\"pti-scene-caption udv-scene-caption\"" in template
assert '<h1 id="udv-h1"><?php echo esc_html($p[\'title\']);?>' in template
assert "mrseo_udv_master_hero_accents()" in master
assert "esc_html($hero_accent)" in template
assert "function mrseo_udv_master_hero_accents()" in master
# Layout-specific descriptive labels intentionally add seven more phrases, so
# do not count every scene => label match across the whole file.
assert "premium-ua-interiors.css" in routing and "premium-ua-commercial.css" in routing
assert "pti-hero psc-hero" in reference and "psc-hero-stage" in reference
assert "mrseo_udv_master_scene_data" in master and "function mrseo_udv_lower_art(" in master
assert "udv-lower-graphic" in master and "mrseo_udv_lower_art($scene,'problem',$p['problems'])" in template
assert "mrseo_udv_lower_art($scene,'solution',$p['actions'])" in template
assert "udv-premium-scene" in master and "udv-premium-hero-image" in master
assert "udv-premium-detail-image" in master and "udv-premium-detail-tracer" in master
assert "udv-premium-hero-image" in premium_css and "udv-premium-detail-frame" in premium_css
assert 'loading="eager"' in master and 'fetchpriority="high"' in master
assert 'loading="lazy"' in master and 'decoding="async"' in master
assert 'get_template_directory_uri()' in master and 'esc_url($src)' in master
assert "udv-lower-graphic" in css and "udv-illustrated-grid" in css
assert "udvLowerPaused" in motion and "lowerIo" in motion
assert "ua-dev-premium-images.js" in routing and "ua-dev-premium-images.css" in routing
assert "'2.2.0'" in routing and "'1.1.0'" in routing
assert 'mask-image:none' in premium_css and '-webkit-mask-image:none' in premium_css
assert 'udv-premium-detail-image' in premium_css and 'aspect-ratio:1.65' in premium_css
assert 'object-position:36% 53%' in premium_css and 'object-position:64% 49%' in premium_css
assert 'transform:scale(1.015)' in premium_css
assert 'udv-premium-point' in premium_css and 'width:13px;height:13px' in premium_css
assert 'data-udv-part' in master and "data-udv-premium-scene" in master
assert "udv-scene-controls" in css
for scene in ("portal","parsing","payment","mobile","shop","team","pwa"):
    assert f"'{scene}'=>array(" in master,scene
    assert f"'{scene}'=>array(" in master,scene
    assert "ua-dev-premium-" in master
sizes=[]
hashes=[]
for scene in ("portal","parsing","payment","mobile","shop","team","pwa"):
    image=(t/f"assets/ua-dev-premium-{scene}.webp")
    assert image.is_file(),scene
    raw=image.read_bytes()
    assert raw[:4]==b"RIFF" and raw[8:12]==b"WEBP",scene
    assert 16000<len(raw)<120000,(scene,len(raw))
    sizes.append(len(raw))
    hashes.append(hashlib.sha256(raw).hexdigest())
assert len(set(hashes))==7,"Every service must have its own original artwork"
assert sum(sizes)<450000,"No unoptimized multi-megabyte hero images"
for token in ("IntersectionObserver","setInterval","visibilitychange","prefers-reduced-motion","saveData",
              "aria-pressed","pagehide","clearInterval","udvPaused","is-current"):
    assert token in motion,token
assert "@media(max-width:710px)" in premium_css
assert "@media(prefers-reduced-motion:reduce)" in premium_css
assert premium_css.count("{")==premium_css.count("}")
assert "udv-scene-controls" in css and "udv-section--close" in css
assert "@media(max-width:710px)" in css and "@media(max-width:430px)" in css
assert "prefers-reduced-motion:reduce" in css and "@keyframes udv-float" in css
assert css.count("{")==css.count("}"),"Unbalanced CSS"
assert not re.search(r'href=["\x27]https?://',template), "No external links"
print("PASS: seven distinct optimized premium WebP assets, accessible hero stages, image-based lower sections, routes/SEO and reduced-motion")
