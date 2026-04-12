import './bootstrap';
import * as bootstrap from 'bootstrap';

window.bootstrap = bootstrap;


/* ─── BURGER BUTTON ─── */
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
/* ─── BURGER BUTTON ─── */

// ----------------------------------//

/* ─── DELETE BUTTON ─── */

const deleteButton = document.getElementById('deleteButton');

if (deleteButton) {
    deleteButton.addEventListener('click', () => {
        document.querySelectorAll('[data-close]').forEach(closeCard => {
            closeCard.classList.toggle('d-none');
        });
    });
}
deleteButton.addEventListener('click', () => {
    console.log('deleteButton');
})

document.querySelectorAll('[data-close]').forEach(closeCard => {
    closeCard.addEventListener('click', () => {
        closeCard.closest('.col-12').remove();
    });
});

document.querySelectorAll('[data-close]').forEach(btn => {
    btn.addEventListener('click', async () => {
        const id = btn.dataset.id; // берём id из атрибута

        const response = await fetch(`/incomes/${id}`, {
            method: 'DELETE', headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            }
        });

        if (response.ok) {
            window.location.reload();
        } else {
            alert('Помилка при видаленні');
        }
    });
});
