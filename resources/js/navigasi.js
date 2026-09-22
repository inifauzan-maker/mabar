const menu = document.getElementById('menu-ponsel');
const pembuka = document.getElementById('buka-menu');
const penutup = document.getElementById('tutup-menu');

if (menu && pembuka && penutup) {
    pembuka.addEventListener('click', () => {
        menu.showModal();
        pembuka.setAttribute('aria-expanded', 'true');
    });
    penutup.addEventListener('click', () => menu.close());
    menu.addEventListener('click', (event) => {
        if (event.target === menu) {
            const batas = menu.getBoundingClientRect();
            if (event.clientX < batas.left || event.clientX > batas.right || event.clientY < batas.top || event.clientY > batas.bottom) {
                menu.close();
            }
        }
    });
    menu.addEventListener('close', () => {
        pembuka.setAttribute('aria-expanded', 'false');
        if (window.innerWidth < 1024) pembuka.focus();
    });
    window.matchMedia('(min-width: 1024px)').addEventListener('change', (event) => {
        if (event.matches && menu.open) menu.close();
    });
}
