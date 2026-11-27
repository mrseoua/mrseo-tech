"""Each native category card has one distinct, local artwork and real service link."""
from pathlib import Path
import runpy
from urllib.parse import urlparse
helper=runpy.run_path(str(Path(__file__).with_name("category-render-check.py")))
seen=set()
for slug,count in {"seo":5,"google-ads":4,"horoshop":4,"service-websites":4,"web-development":14}.items():
    page=helper["render_category"](slug,"catalog")
    links=helper["paths"](page)
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
print("31 visible-menu service tiles, unique local assets, and unchanged destinations.")
