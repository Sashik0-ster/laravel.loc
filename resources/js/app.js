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

const deleteIncomes = document.getElementById('deleteIncomes');

if (deleteIncomes) {
    deleteIncomes.addEventListener('click', () => {
        document.querySelectorAll('[data-close]').forEach(closeCard => {
            closeCard.classList.toggle('d-none');
        });
    });
}
deleteIncomes.addEventListener('click', () => {
    console.log('deleteIncomes');
})

document.querySelectorAll('[data-close]').forEach(closeCard => {
    closeCard.addEventListener('click', () => {
        closeCard.closest('.col-12').remove();
    });
});

/*document.querySelectorAll('[data-close]').forEach(btn => {
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
});*/

document.querySelectorAll('[data-close]').forEach(btn => {
    btn.addEventListener('click', async (e) => {
        // 1. Підтвердження дії
        if (!confirm('Ви впевнені, що хочете видалити цей запис?')) return;

        const id = btn.dataset.id;
        const row = btn.closest('.income-item'); // Або інший селектор вашого контейнера

        try {
            const response = await fetch(`/incomes/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                }
            });

            if (response.ok) {
                // 2. "Живе" видалення без перезавантаження
                if (row) {
                    row.style.transition = 'opacity 0.3s';
                    row.style.opacity = '0';
                    setTimeout(() => row.remove(), 300);
                } else {
                    window.location.reload();
                }
            } else {
                const errorData = await response.json();
                alert(`Помилка: ${errorData.message || 'Не вдалося видалити'}`);
            }
        } catch (error) {
            console.error('Network error:', error);
            alert('Сталася помилка мережі. Спробуйте пізніше.');
        }
    });
});
