// Navigation bar dropdown
document.addEventListener('DOMContentLoaded', () => {
    // Code here runs after DOM content is fully loaded
    const dropdowns = document.querySelectorAll('.dropdown-list');
    dropdowns.forEach(dropdown => {
        const toggleBtn = dropdown.querySelector('.drop-plus');
        const sublist = dropdown.querySelector('.sublist');
        dropdown.addEventListener("mouseover", (event) => {
            const isDropdown = event.currentTarget === event.target;
            if (isDropdown) {
                sublist.classList.add('active-list');
            }
        });
        dropdown.addEventListener("mouseleave", () => {
            sublist.classList.remove('active-list');
        });
        if (toggleBtn && sublist) {
            toggleBtn.addEventListener('click', (event) => {
                sublist.classList.toggle('active');
                toggleBtn.textContent = sublist.classList.contains('active') ? '-' : '+';
                event.stopPropagation(); // Prevent event from bubbling up
            });
        } else {
            console.error('Toggle button or sublist not found in dropdown:', dropdown);
        }
        // Close dropdown when clicking outside
        document.addEventListener('click', () => {
            if (sublist) {
                sublist.classList.remove('active');
                toggleBtn.textContent = '+';
            }
        });
        // Prevent closing dropdown when clicking inside
        dropdown.addEventListener('click', (event) => {
            event.stopPropagation();
        });
    });
    if (window.innerWidth < 991) {
        document.querySelector('.main-logo').insertAdjacentHTML('beforeend', `<span class="mobile_m_bar"><i class="fa fa-bars"></i></span>`);
        document.querySelector('.mobile_m_bar').addEventListener('click', function () {
            document.querySelector('.header-navbar .menubar').style.opacity = 1;
            document.querySelector('.header-navbar .menubar').style.left = 0;
        });
        document.querySelector('.mobile_menu_bar').addEventListener('click', function () {
            document.querySelector('.header-navbar .menubar').style.opacity = 0;
            document.querySelector('.header-navbar .menubar').style.left = -100 + '%';
        });
    } else {
        // change functionality for larger screens
    }
});
// Navigation bar dropdown End