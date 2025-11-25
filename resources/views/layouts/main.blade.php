<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'انجمن علمی توسعه روستایی')</title>

  <meta name="description" content="@yield('meta_description', 'وب‌سایت رسمی انجمن علمی توسعه روستایی')" />

  <!-- Fonts & CSS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
      items:1, loop:true, autoplay:true, autoplayTimeout:5000, autoplayHoverPause:true,
      dots:true, nav:true, rtl:true, navText:["❮","❯"]
    });

    $('.journals-carousel').owlCarousel({
      rtl:true,  autoplay:true, autoplayTimeout:4000, autoplayHoverPause:true,
      dots:true, nav:true, navText:["❮","❯"],
      // loop:true,
      responsive:{0:{items:1},600:{items:2},1000:{items:4}}
    });

    const $gallery = $('#galleryOwl');
    $gallery.owlCarousel({
      loop:true, rtl:true, margin:10, autoplay:true, autoplayTimeout:3500, autoplayHoverPause:true,
      dots:true, nav:true, navText:["❮","❯"],
      responsive:{0:{items:1},600:{items:2},1000:{items:3}}
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

function openLightbox(i){
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

function closeLightbox(){ 
  lightbox.classList.remove('open'); 
}

function next(){ 
  openLightbox(current+1); 
}

function prev(){ 
  openLightbox(current-1); 
}

$gallery.on('click', '.item', function(){
  const idx = parseInt(this.getAttribute('data-index')) || 0;
  openLightbox(idx);
});

closeBtn.addEventListener('click', closeLightbox);
nextBtn.addEventListener('click', next);
prevBtn.addEventListener('click', prev);

window.addEventListener('keydown', (e)=>{
  if(!lightbox.classList.contains('open')) return;
  if(e.key === 'Escape') closeLightbox();
  if(e.key === 'ArrowRight') next();
  if(e.key === 'ArrowLeft') prev();
});

lightbox.addEventListener('click', (e)=>{ 
  if(e.target === lightbox) closeLightbox(); 
});
  </script>

  @stack('scripts')

</body>
</html>
