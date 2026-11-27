"""Source-based UA intent inventory; does not claim search-engine rankings."""
from pathlib import Path
import json,re,unicodedata
root=Path(__file__).resolve().parents[1]/"wp-content/themes/mrseo-tech/inc"
def load(file,marker):
    return json.loads((root/file).read_text().split("<<<'"+marker+"'\n",1)[1].split("\n"+marker,1)[0])
base=load("ua-semantic-map.php","MRSEO_UA_SEMANTIC_MAP")
dev=load("ua-dev-new-pages.php","MRSEO_UA_DEV_CONTENT")
hs=load("horoshop-premium-routes.php","MRSEO_HS_PAGES")
def norm(s):
    return re.sub(r"[^\w]+"," ",unicodedata.normalize("NFKC",s).casefold()).strip()
primary={slug:v["primary"] for slug,v in base.items()}
primary.update({slug:v["terms"][0] for slug,v in dev.items()})
primary.update({"horoshop/"+slug:v[0] for slug,v in hs.items()})
assert len(primary)==75
assert len(set(map(norm,primary.values())))==75, "Exact primary intent duplication"
assert "розробка особистого кабінету" not in base["web-applications"]["secondary"]
assert "створення сайту на хорошоп" not in [base["horoshop"]["primary"],*base["horoshop"]["secondary"]]
for k in ("title","description"):
    assert len(set(norm(v[k]) for v in base.values()))==59,k
assert all(len(v["secondary"])==len(set(v["secondary"])) for v in base.values())
print("75 UA intent records; distinct normalized primary targets; 59 unique title/description records. Near-duplicate and SERP intent review remain separate.")
