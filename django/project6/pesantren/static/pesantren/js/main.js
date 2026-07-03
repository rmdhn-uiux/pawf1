document.addEventListener('DOMContentLoaded', function () {

    // ===== AOS Init =====
    AOS.init({
        duration: 800,
        easing: 'cubic-bezier(0.16, 1, 0.3, 1)',
        once: true,
        offset: 100,
    });

    // ===== Sticky Header =====
    const navbar = document.getElementById('navbar');
    let lastScroll = 0;

    window.addEventListener('scroll', function () {
        const currentScroll = window.scrollY;
        if (currentScroll > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
        lastScroll = currentScroll;
    });

    // ===== Mobile Navigation Drawer =====
    const mobileToggle = document.getElementById('mobile-toggle');
    const mobileOverlay = document.getElementById('mobile-overlay');
    const mobileDrawer = document.getElementById('mobile-drawer');
    const closeMobile = document.getElementById('close-mobile');
    const overlayBg = document.getElementById('overlay-bg');
    const hamburgerIcon = document.getElementById('hamburger-icon');

    function openDrawer() {
        if (!mobileOverlay || !mobileDrawer) return;
        mobileOverlay.classList.remove('hidden');
        requestAnimationFrame(function () {
            mobileDrawer.classList.remove('translate-x-full');
            mobileDrawer.classList.add('translate-x-0');
        });
        document.body.style.overflow = 'hidden';
        if (hamburgerIcon) {
            hamburgerIcon.classList.remove('fa-bars');
            hamburgerIcon.classList.add('fa-xmark');
        }
    }

    function closeDrawer() {
        if (!mobileOverlay || !mobileDrawer) return;
        mobileDrawer.classList.remove('translate-x-0');
        mobileDrawer.classList.add('translate-x-full');
        setTimeout(function () {
            mobileOverlay.classList.add('hidden');
            document.body.style.overflow = '';
        }, 400);
        if (hamburgerIcon) {
            hamburgerIcon.classList.remove('fa-xmark');
            hamburgerIcon.classList.add('fa-bars');
        }
    }

    if (mobileToggle) {
        mobileToggle.addEventListener('click', function () {
            if (mobileOverlay && mobileOverlay.classList.contains('hidden')) {
                openDrawer();
            } else {
                closeDrawer();
            }
        });
    }

    if (closeMobile) closeMobile.addEventListener('click', closeDrawer);
    if (overlayBg) overlayBg.addEventListener('click', closeDrawer);

    document.querySelectorAll('[data-close]').forEach(function (link) {
        link.addEventListener('click', closeDrawer);
    });

    // ===== Back to Top Button =====
    const backToTop = document.getElementById('back-to-top');

    if (backToTop) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 300) {
                backToTop.style.opacity = '1';
                backToTop.style.visibility = 'visible';
                backToTop.style.transform = 'translateY(0)';
            } else {
                backToTop.style.opacity = '0';
                backToTop.style.visibility = 'hidden';
                backToTop.style.transform = 'translateY(1rem)';
            }
        });

        backToTop.addEventListener('click', function (e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // ===== Hero Stats Counter Animation =====
    const statNumbers = document.querySelectorAll('.stat-number');

    function animateCounter(el) {
        var target = parseInt(el.getAttribute('data-target'), 10);
        var current = 0;
        var suffix = target >= 100 ? '+' : '+';
        var increment = Math.ceil(target / 60);
        var timer = setInterval(function () {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            el.textContent = current + (current === target ? suffix : '');
        }, 25);
    }

    if (statNumbers.length > 0) {
        var statsObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    statsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        statNumbers.forEach(function (el) {
            statsObserver.observe(el);
        });
    }

    // ===== Toast Auto-dismiss =====
    var toasts = document.querySelectorAll('.toast-message');
    toasts.forEach(function (toast) {
        setTimeout(function () {
            toast.style.opacity = '0';
            toast.style.transition = 'opacity 0.5s ease-out';
            setTimeout(function () { toast.remove(); }, 500);
        }, 6000);
    });

});
