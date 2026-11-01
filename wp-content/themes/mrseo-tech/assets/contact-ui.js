(() => {
  const popovers = Array.from(document.querySelectorAll('.mrseo-contact-popover'));
  if (!popovers.length) return;
  popovers.forEach((details) => {
    details.addEventListener('toggle', () => {
      if (!details.open) return;
      popovers.forEach((other) => { if (other !== details) other.open = false; });
    });
  });
  document.addEventListener('click', (event) => {
    popovers.forEach((details) => {
      if (details.open && !details.contains(event.target)) details.open = false;
    });
  });
  document.addEventListener('keydown', (event) => {
    if (event.key !== 'Escape') return;
    popovers.forEach((details) => {
      if (!details.open) return;
      details.open = false;
      details.querySelector('summary')?.focus();
    });
  });
})();
