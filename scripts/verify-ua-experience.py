from pathlib import Path
import subprocess
root=Path(__file__).resolve().parents[1]/"wp-content/themes/mrseo-tech"
template=root/"experience-uk.php"
page=template.read_text()
assert page.count("<h1 ")==1
assert 'data-experience="uk"' in page and "Довіра важливіша за публічність" in page
assert "mrseo_portfolio_items" not in page and "client-directory-card" not in page
assert "prefers-reduced-motion:reduce" in page
assert "mrseo_url('contact','uk')" in page
assert "Наш досвід</a>" in (root/"header.php").read_text()
assert "experience-uk.php" in (root/"portfolio-localized.php").read_text()
subprocess.run(["php","-l",str(template)],check=True)
print("PASS: UA confidential experience page, no public client directory, contact CTA and menu")
