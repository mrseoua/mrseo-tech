"""Each native category card has one distinct, local artwork and real service link."""
from pathlib import Path
import runpy
from urllib.parse import urlparse
helper=runpy.run_path(str(Path(__file__).with_name("category-render-check.py")))
seen=set()
menu=helper['render_category']('seo','menu')
menu_paths=helper['paths'](menu)
all_card_paths=set()
for slug,count in {"seo":5,"google-ads":4,"horoshop":4,"service-websites":4,"web-development":14}.items():
    page=helper["render_category"](slug,"catalog")
    links=helper["paths"](page)
    assert links==helper['paths'](helper['render_category'](slug,'orbit'))-{'/contact/'}
    assert links<=menu_paths
    all_card_paths.update(links)
    assert len(links)==len(page.images)==count,(slug,len(links),len(page.images))
    for url in page.images:
        path=urlparse(url).path.removeprefix("/theme/")
        assert path.startswith("assets/"),(slug,path)
        asset=helper["THEME"]/path
        assert asset.is_file(),asset
        assert path not in seen,("repeated category image",path)
        seen.add(path)
        if asset.suffix==".webp":
            data=asset.read_bytes()
            assert data[:4]==b"RIFF" and data[8:12]==b"WEBP",asset
        elif asset.suffix==".svg":
            assert asset.read_text().startswith("<svg"),asset
assert len(seen)==31
assert len(all_card_paths)==31
assert menu_paths-all_card_paths=={'/seo/','/google-ads/','/horoshop/','/service-websites/','/web-development/','/contact/'}
print("31 visible-menu service tiles, unique local assets, and unchanged destinations.")
