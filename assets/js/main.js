document.addEventListener('DOMContentLoaded', () => {
    // Theme Switcher
    const themeBtn = document.getElementById('theme-toggle-button');
    const themeIndicator = document.getElementById('theme-toggle-indicator');
    const html = document.documentElement;
    if (localStorage.getItem('theme') === 'dark') {
        html.classList.add('dark');
        if(themeIndicator) themeIndicator.style.transform = 'translateX(1.25rem)';
    }
    if(themeBtn) themeBtn.addEventListener('click', () => {
        html.classList.toggle('dark');
        if (html.classList.contains('dark')) {
            localStorage.setItem('theme', 'dark');
            themeIndicator.style.transform = 'translateX(1.25rem)';
        } else {
            localStorage.setItem('theme', 'light');
            themeIndicator.style.transform = 'translateX(0.25rem)';
        }
    });

    // Modals and Dropdowns
    const setupToggle = (btnId, elementId) => {
        const btn = document.getElementById(btnId);
        const el = document.getElementById(elementId);
        if(btn && el) {
            btn.addEventListener('click', (e) => { e.stopPropagation(); el.classList.toggle('hidden'); });
            if (btnId !== 'notification-button') document.getElementById(`${btnId}-cancel-button`)?.addEventListener('click', () => el.classList.add('hidden'));
        }
    };
    setupToggle('logout-button-desktop', 'logout-modal');
    setupToggle('notification-button', 'notification-dropdown');
    window.addEventListener('click', () => document.getElementById('notification-dropdown')?.classList.add('hidden'));

    // Profile Edit
    const editBtn = document.getElementById('edit-profile-button');
    if(editBtn) editBtn.addEventListener('click', () => {
        document.getElementById('profile-view-mode').classList.toggle('hidden');
        document.getElementById('profile-edit-mode').classList.toggle('hidden');
    });

    // Symptoms Form Simulation
    const sympForm = document.getElementById('symptoms-form');
    if(sympForm) sympForm.addEventListener('submit', e => {
        e.preventDefault();
        document.getElementById('results-section').classList.remove('hidden');
    });

    // Services Page Hospital Simulation
    const hospitalList = document.getElementById('hospitals-list');
    if(hospitalList) setTimeout(() => {
        hospitalList.innerHTML = `
            <div class="p-3 bg-gray-50 rounded-md">
                <p class="font-semibold">Asiri Central Hospital (Private)</p>
                <a href="tel:0114665500" class="text-sm text-blue-600">011-466-5500</a>
            </div>`;
    }, 1500);
});

