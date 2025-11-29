<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'انجمن علمی توسعه روستایی')</title>

    <meta name="description" content="@yield('meta_description', 'وب‌سایت رسمی انجمن علمی توسعه روستایی')" />

    <!-- Fonts & CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/inner.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>


    </style>

    @stack('styles')
</head>

<body>

    {{-- HEADER --}}
    @include('partials.header')

    {{-- MAIN CONTENT --}}
    <main class="container">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('partials.footer')

    {{-- JS --}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        const menuBtn = document.querySelector('.menu-btn');
        const nav = document.getElementById('primary-nav');
        menuBtn?.addEventListener('click', () => {
            const isOpen = nav.classList.toggle('open');
            menuBtn.setAttribute('aria-expanded', String(isOpen));
        });

        document.getElementById('year').textContent = new Date().getFullYear();

        $('.hero-carousel').owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            dots: true,
            nav: true,
            rtl: true,
            navText: ["❮", "❯"]
        });

        $('.journals-carousel').owlCarousel({
            rtl: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            dots: true,
            nav: true,
            navText: ["❮", "❯"],
            // loop:true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        });

        const $gallery = $('#galleryOwl');
        $gallery.owlCarousel({
            // loop: true,
            rtl: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3500,
            autoplayHoverPause: true,
            dots: true,
            nav: true,
            navText: ["❮", "❯"],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });

        const lightbox = document.getElementById('lightbox');
        const lbImg = lightbox.querySelector('img');
        const lbCounter = document.getElementById('lbCounter');
        const lbDescription = document.getElementById('lbDescription');
        const closeBtn = lightbox.querySelector('.close');
        const prevBtn = lightbox.querySelector('.prev');
        const nextBtn = lightbox.querySelector('.next');

        const galleryItems = Array.from(document.querySelectorAll('#galleryOwl .owl-item:not(.cloned) .item img'));
        const galleryData = Array.from(document.querySelectorAll('#galleryOwl .owl-item:not(.cloned) .item'));
        let current = 0;

        function openLightbox(i) {
            current = (i + galleryData.length) % galleryData.length;
            const img = galleryItems[current];
            const data = galleryData[current];
            const description = data.getAttribute('data-description') || '';

            lbImg.src = img.src;
            lbImg.alt = img.alt || '';
            lbCounter.textContent = `${current+1} / ${galleryItems.length}`;
            lbDescription.textContent = description;

            lightbox.classList.add('open');
        }

        function closeLightbox() {
            lightbox.classList.remove('open');
        }

        function next() {
            openLightbox(current + 1);
        }

        function prev() {
            openLightbox(current - 1);
        }

        $gallery.on('click', '.item', function() {
            const idx = parseInt(this.getAttribute('data-index')) || 0;
            openLightbox(idx);
        });

        closeBtn.addEventListener('click', closeLightbox);
        nextBtn.addEventListener('click', next);
        prevBtn.addEventListener('click', prev);

        window.addEventListener('keydown', (e) => {
            if (!lightbox.classList.contains('open')) return;
            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowRight') next();
            if (e.key === 'ArrowLeft') prev();
        });

        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) closeLightbox();
        });

        document.addEventListener('DOMContentLoaded', function() {
            const menuBtn = document.querySelector('.menu-btn');
            const nav = document.querySelector('#primary-nav');
            const overlay = document.querySelector('.nav-overlay');

            if (!menuBtn || !nav) return;


            menuBtn.onclick = () => {
                nav.classList.toggle('active');
                overlay.classList.toggle('active');
                document.body.style.overflow = nav.classList.contains('active') ? 'hidden' : '';
                menuBtn.innerHTML = nav.classList.contains('active') ? '<i class="fa fa-times"></i>' :
                    '<i class="fa fa-bars"></i>';
            };


            overlay.onclick = () => menuBtn.click();


            document.querySelectorAll('#primary-nav .has-submenu a').forEach(link => {
                link.onclick = (e) => {
                    if (window.innerWidth <= 768) {
                        e.preventDefault();
                        link.parentElement.classList.toggle('active');
                    }
                };
            });

        });
    </script>



    @stack('scripts')

</body>

</html>
