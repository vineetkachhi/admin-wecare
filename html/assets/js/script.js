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
    // form active state
    const formGroups = document.querySelectorAll('.form-group');
    formGroups.forEach(group => {
        const input = group.querySelector('input, textarea');
        input.addEventListener('focus', () => {
            group.classList.add('active');
        });
        input.addEventListener('blur', () => {
            if (input.value === '') {
                group.classList.remove('active');
            }
        });
    });
    // Navigation bar dropdown End
    // const baseUrl = document.getElementsByTagName('base')[0].getAttribute('href');
    // console.log('All href URLs:', hrefs);
    // const pathname = window.location.href.split('/').pop() || '/';
    // if (pathname === 'https://wecareexport.com' || pathname === '/' || pathname.includes('#contact')) {
    // if (pathname === 'index.html' || pathname.startsWith('index.html#') || pathname.includes('#contact') || pathname === baseUrl || pathname === '/') {
        const customeSlide = document.querySelector('.client-testimonials');
        if (customeSlide) {
            const swiper = new Swiper(customeSlide, {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 3,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                // pagination: {
                //     el: ".swiper-pagination",
                //     clickable: true,
                // },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 10,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 10,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 10,
                    },
                }
                // scrollbar: {el: '.swiper-scrollbar',},
            });
        // } else {
        //     console.error('Customer section not found');
        // }
        
    }
});