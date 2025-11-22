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

  <style>
       :root{
      --brand:#246b5f;
      --brand-2:#0f3f37;
      --accent:#f6a700;
      --bg:#fbfbfb;
      --text:#24323f;
      --muted:#6b7a8a;
      --card:#ffffff;
      --ring: rgba(36,107,95,.25);
      --radius: 16px;
      --shadow: 0px 0px 24px 2px rgba(8,26,34,0.08);
    }
    *{box-sizing:border-box}
    html,body{height:100%}
    .logo{
      width: 30px;
      height:30px
    }
    body{
      font-size:14px;
      margin:0; background:var(--bg); color:var(--text); font-family:'Vazirmatn', system-ui, -apple-system, Segoe UI, Roboto, sans-serif; line-height:1.9}
    a{color:inherit; text-decoration:none}
    img{max-width:100%; display:block}
    .container{max-width:1200px; margin-inline:auto; padding-inline:16px}

    /* Header */
    header{position:sticky; top:0; z-index:60; backdrop-filter:saturate(180%) blur(8px); background:rgba(255,255,255,.9); border-bottom:1px solid #eef1f4}
    .nav{display:flex; align-items:center; justify-content:space-between; gap:16px; padding:10px 0}
    .brand{display:flex; align-items:center; gap:12px; font-weight:700; color:var(--brand)}
    .brand .logo{width:40px; height:40px; border-radius:50%; display:grid; place-items:center; background:linear-gradient(135deg,var(--brand),var(--brand-2)); color:#fff; box-shadow:0 6px 16px rgba(36,107,95,.35)}

    nav{position:relative}
    nav ul{display:flex; gap:6px; list-style:none; margin:0; padding:0}
    nav > ul > li{position:relative}
    nav a{padding:10px 14px; border-radius:5px; font-weight:600; color:#0f1720; display:inline-flex; align-items:center; gap:6px; transition:all .2s ease}
    nav a:hover{background:#eef6f4; color:var(--brand); box-shadow:0 2px 0 var(--brand) inset}
    .cta{background:var(--brand); color:#fff}
    .cta:hover{background:var(--brand-2); color:#fff; box-shadow:none}

    .submenu{position:absolute; right:0; top:100%; min-width:220px; background:#fff; border:1px solid #eef1f4; border-radius:5px; box-shadow:var(--shadow); padding:6px; display:none}
    .submenu a{display:block; padding:10px 12px; border-radius:5px; color:#233}
    .submenu a:hover{background:#f2faf8; color:var(--brand)}
    li.has-submenu:focus-within > .submenu, li.has-submenu:hover > .submenu{display:block}

    .menu-btn{display:none; border:none; background:#fff; width:42px; height:42px; border-radius:5px; box-shadow:var(--shadow)}

    .welcome{margin:14px auto 0}
    .welcome .box{background:#fff; border:1px solid #e7f0ed; border-radius:5px; padding:18px; box-shadow:var(--shadow)}
    .welcome h1{font-size:clamp(18px,2.6vw,24px); margin:0 0 10px 0; line-height:1.8}
    .welcome .highlight{display:inline-block; background:linear-gradient(transparent 60%, #e1f6ef 60%);}    
    .welcome p{margin:0; color:#334}

    .hero{margin-top:16px}
    .hero .item{position:relative; height:56vh; max-height:680px; border-radius:5px; overflow:hidden}
    .hero .item img{width:100%; height:100%; object-fit:cover;border-radius:5px}
    .caption{position:absolute; inset:auto 0 0 0; padding:24px; background:linear-gradient(180deg,rgba(0,0,0,0) 0%, rgba(0,0,0,.55) 100%); color:#fff}
    .caption h2{margin:0 0 6px 0; font-size:clamp(18px,3vw,28px)}

    .section{padding:56px 0}
    .section h3{font-size:clamp(18px,2.6vw,28px); margin:0 0 18px 0}

    .card{background:var(--card); border:1px solid #eef1f4; border-radius:5px; overflow:hidden;}
    .card .meta{padding:12px 14px}
    .card img{
      height:100%;
       object-fit:contain;
       transition:all .3s

    }
    .card-img{
      height:300px;
      overflow:hidden;
           
    }
    .card:hover img{
      transform:scale(1.1);
       transition:all .3s
    }
    .tag{display:inline-block; padding:4px 10px; background:#eef6f4; color:var(--brand); border-radius:999px; font-size:12px; font-weight:700}

    .about{display:grid; grid-template-columns: 1.2fr 1fr; gap:24px; align-items:center}
    .about p{color:var(--muted)}
    .about .highlights{display:grid; grid-template-columns:repeat(3,1fr); gap:10px; margin-top:10px}
    .pill{background:#fff7e6; color:#a35a00; padding:10px 12px; border-radius:5px; border:1px solid #ffe2a6; font-weight:700; text-align:center}

    .gallery .item{border-radius:5px; overflow:hidden; border:1px solid #eef1f4; cursor:pointer;height: 220px;}
    .gallery .item img{width:100%; height:100%; object-fit:cover;}

    .lightbox{position:fixed; inset:0; background:rgba(0,0,0,.9); display:none; align-items:center; justify-content:center; padding:20px; z-index:80}
    .lightbox.open{display:flex}
    .lightbox img{max-width:96%; max-height:92vh; border-radius:5px; box-shadow:0 20px 40px rgba(0,0,0,.35)}
    .lightbox .close, .lightbox .prev, .lightbox .next{position:absolute; top:16px; border:none; background:#fff; color:#111; padding:8px 12px; border-radius:5px}
    .lightbox .close{right:16px}
    .lightbox .prev, .lightbox .next{top:50%; transform:translateY(-50%)}
    .lightbox .prev{right:16px}
    .lightbox .next{left:16px}
    .lightbox .counter{position:absolute; bottom:12px; color:#fff; font-weight:700}

    footer{margin-top:56px; background:linear-gradient(180deg,#0c2c27, #0a2420); color:#d7efe9}
    .footer-grid{display:grid; grid-template-columns:2fr 1fr 1fr; gap:24px; padding:28px 0}
    .footer-grid h4{margin:0 0 10px 0}
    .footer-grid a{color:#d7efe9}
    .copy{border-top:1px solid rgba(255,255,255,.15); padding:12px 0; font-size:14px; color:#b8d5cf}

    .muted{color:var(--muted)}
    .lead{font-size:18px}
    .lightbox .description { 
  position: absolute; 
  bottom: 0; 
  left: 0; 
  right: 0; 
  background: linear-gradient(transparent, rgba(0,0,0,0.8)); 
  color: #fff; 
  padding: 30px 20px 20px; 
  text-align: center;
  max-height: 25vh;
  overflow-y: auto;
}

.lightbox .description:empty {
  display: none;
}

.journal-sec:hover a{
  color:var(--brand) !important
}
.journal-sec .card:hover{
  box-shadow: var(--shadow);
}

    @media (max-width: 960px){.about{grid-template-columns:1fr} .footer-grid{grid-template-columns:1fr 1fr}}
    @media (max-width: 720px){
      .menu-btn{display:block}
      nav{position:fixed; inset:64px 14px auto 14px; background:#fff; border:1px solid #eef1f4; border-radius:5px; box-shadow:var(--shadow); padding:8px; display:none}
      nav.open{display:block}
      nav ul{flex-direction:column}
      .footer-grid{grid-template-columns:1fr}
    }

    
   
        
    .cta{background:var(--brand); color:#fff}
    .cta:hover{background:var(--brand-2); color:#fff; box-shadow:none}

    .submenu{position:absolute; right:0; top:100%; min-width:220px; background:#fff; border:1px solid #eef1f4; border-radius:14px; box-shadow:var(--shadow); padding:6px; display:none}
    .submenu a{display:block; padding:10px 12px; border-radius:10px; color:#233}
    .submenu a:hover{background:#f2faf8; color:var(--brand)}
    li.has-submenu:focus-within > .submenu, li.has-submenu:hover > .submenu{display:block}

    .menu-btn{display:none; border:none; background:#fff; width:42px; height:42px; border-radius:12px; box-shadow:var(--shadow)}

    /* Main Content */
    .main{padding:40px 0}
    .page-header{text-align:center; margin-bottom:50px}
    .page-header h1{font-size:clamp(24px,4vw,42px); margin:0 0 16px 0; color:var(--brand)}
    .page-header p{font-size:18px; color:var(--muted); max-width:600px; margin:0 auto}

    /* Members Grid */
    /* .members-grid{display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:24px; margin-top:40px} */
    .member-card{display:flex;background:var(--card); border-radius:var(--radius); overflow:hidden; transition:all .3s ease}


    .member-photo{width: 20%; height:250px; background:#f8f9fa; display:flex; align-items:center; justify-content:center; position:relative; overflow:hidden}
    .member-photo img{width:100%; height:100%; object-fit:contain}
    .member-photo .placeholder{font-size:48px; color:#ccc}

    .member-info{padding:20px}
    .member-name{font-size:20px; font-weight:700; margin:0 0 8px 0; color:var(--brand)}
    .member-position{font-size:14px; font-weight:600; color:var(--accent); background:#fff7e6; padding:4px 12px; border-radius:20px; display:inline-block; margin-bottom:12px}

    .member-details{margin:16px 0}
    .member-details .detail{display:flex; align-items:center; gap:8px; margin-bottom:8px; font-size:14px}
    .member-details .detail:last-child{margin-bottom:0}
    .member-details .icon{color:var(--muted); min-width:16px}

    .member-bio{margin-top:16px; padding-top:16px; border-top:1px solid #eef1f4; font-size:14px; color:var(--muted); line-height:1.5}

    .member-links{display:flex; gap:8px; margin-top:16px}
    .member-link{display:inline-flex; align-items:center; gap:6px; padding:8px 12px; background:#f8f9fa; border-radius:8px; font-size:12px; font-weight:600; color:var(--brand); transition:all .2s ease}
    .member-link:hover{background:var(--brand); color:#fff}

    /* Footer */
    footer{margin-top:60px; background:linear-gradient(180deg,#0c2c27, #0a2420); color:#d7efe9; padding:40px 0 20px}
    .footer-content{text-align:center}
    .footer-content p{margin:0; font-size:14px; color:#b8d5cf}

    @media (max-width: 720px){
      .menu-btn{display:block}
      nav{position:fixed; inset:64px 14px auto 14px; background:#fff; border:1px solid #eef1f4; border-radius:16px; box-shadow:var(--shadow); padding:8px; display:none}
      nav.open{display:block}
      nav ul{flex-direction:column}
      .members-grid{grid-template-columns:1fr}
    }
       
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
