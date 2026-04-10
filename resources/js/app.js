import './bootstrap';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

const toggle = document.getElementById('sidebarToggle');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('sidebarOverlay');

if (toggle) {
    toggle.addEventListener('click', () => {
        sidebar.classList.toggle('open');
        overlay.classList.toggle('active');
        toggle.style.display = sidebar.classList.contains('open') ? 'none' : 'flex';
    });

    overlay.addEventListener('click', () => {
        sidebar.classList.remove('open');
        overlay.classList.remove('active');
        toggle.style.display = 'flex'; // показываем бургер при закрытии
    });
}
