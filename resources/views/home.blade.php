<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>انجمن علمی توسعه روستایی — صفحه اصلی</title>
  <meta name="description" content="وب‌سایت رسمی انجمن علمی توسعه روستایی" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;600;700&display=swap" rel="stylesheet">
  <!-- Owl Carousel -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">



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
  </style>
</head>
<body>
    <!-- بخش Navigation در home.blade.php را با این جایگزین کنید -->

<header>
    <div class="container nav" role="navigation" aria-label="ناوبری اصلی">
      <a href="/" class="brand">
        <div class="logo">
          <img src="" alt="">
        </div>
        <span>انجمن علمی توسعه روستایی</span>
      </a>
      <button class="menu-btn" aria-controls="primary-nav" aria-expanded="false" title="منو">☰</button>
      <nav id="primary-nav" aria-label="Primary">
        <ul>
          <!-- منوهای داینامیک از دیتابیس -->
          @foreach($menus as $menu)
            <li class="{{ $menu->hasChildren() ? 'has-submenu' : '' }}">
              @if($menu->url)
                <a href="{{ $menu->url }}" target="{{ $menu->target }}">
                  {{ $menu->title }}
                  @if($menu->hasChildren())
                    <span style="margin-right: 5px;">▼</span>
                  @endif
                </a>
              @else
                <a href="#" onclick="return false;">
                  {{ $menu->title }}
                  @if($menu->hasChildren())
                    <span style="margin-right: 5px;">▼</span>
                  @endif
                </a>
              @endif
              
              @if($menu->hasChildren())
                <ul class="submenu">
                  @foreach($menu->children as $submenu)
                    <li>
                      <a href="{{ $submenu->url ?: '#' }}" target="{{ $submenu->target }}">
                        {{ $submenu->title }}
                      </a>
                    </li>
                  @endforeach
                </ul>
              @endif
            </li>
          @endforeach

          <!-- منوهای ثابت (ورود/پنل مدیریت) -->
          @auth
            @if(auth()->user()->role === 'admin')
              <li><a class="cta" href="{{ route('admin.dashboard') }}">پنل مدیریت</a></li>
            @endif
          @else
            <li><a class="cta" href="{{ route('login') }}">ورود</a></li>
          @endauth
        </ul>
      </nav>
    </div>
</header>
 

  <main id="hero" class="container">
    <!-- Hero Slider - داده‌ها از دیتابیس -->
    <section class="owl-carousel hero-carousel hero" aria-roledescription="carousel" aria-label="اسلایدر تصاویر">
      @forelse($sliders as $slider)
        <div class="item">
          <img src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->title }}" />
          <div class="caption">
            <h2>{{ $slider->title }}</h2>
            @if($slider->description)
              <p>{{ $slider->description }}</p>
            @endif
          </div>
        </div>
      @empty
        <div class="item">
          <img  class='logo' src="https://via.placeholder.com/1200x600/246b5f/ffffff?text=اسلایدر+پیش‌فرض" alt="پیش‌فرض" />
          <div class="caption">
            <h2>به انجمن علمی توسعه روستایی خوش آمدید</h2>
            <p>لطفاً از پنل مدیریت اسلایدر اضافه کنید</p>
          </div>
        </div>
      @endforelse
    </section>

    <!-- Welcome -->
    <section class="welcome">
      <div class="container box">
        <h1><span class="">به سایت انجمن علمی جغرافیا و برنامه‌ریزی روستایی ایران خوش آمدید</span></h1>
        <p>
          این پایگاه با هدف گسترش ارتباطات علمی، اطلاع‌رسانی فعالیت‌ها و برنامه‌های انجمن، و ایجاد بستری برای تعامل میان اعضا، شاخه‌های استانی، کمیته‌های تخصصی و سایر مراکز علمی و اجرایی مرتبط با موضوعات روستایی راه‌اندازی شده است.

انجمن علمی جغرافیا و برنامه‌ریزی روستایی ایران از کلیه اساتید دانشگاه‌ها، پژوهشگران، مدیران سازمان‌های مرتبط، کارشناسان، دانشجویان و علاقه‌مندان حوزه‌های توسعه و برنامه‌ریزی روستایی، کشاورزی، ترویج و جامعه‌شناسی دعوت می‌نماید تا با بازدید از بخش‌های مختلف این پایگاه، ضمن آشنایی با فعالیت‌ها و اهداف انجمن، از آخرین اخبار، نشست‌های تخصصی، همایش‌ها و مقالات منتشرشده در نشریات انجمن بهره‌مند شوند.

همچنین از شما بازدیدکنندگان گرامی درخواست می‌شود پیشنهادات و دیدگاه‌های ارزشمند خود را جهت بهبود و غنای محتوای این پایگاه از طریق بخش «تماس با ما» با مدیر سایت در میان بگذارید.
        </p>
      </div>
    </section>

    <!-- Journals - داده‌ها از دیتابیس -->
    <section id="journals" class="journal-sec section">
      <h3>نشریات و مجلات انجمن</h3>
      @if($journals->count() > 0)
        <div class="owl-carousel journals-carousel">
          @foreach($journals as $journal)
            <div class="p-2">
              @if($journal->link)
              <a class="card item" href="{{ $journal->link }}"  target="_blank">
                <div class="card-img">
                  <img src="{{ asset('storage/' . $journal->image) }}" alt="{{ $journal->title }}" />
                </div>
                <div class="meta">
                  <div class="tag">{{ $journal->tag }}</div>
                  <h4 style="margin:10px 0 4px">{{ $journal->title }}</h4>
                  @if($journal->description)
                    <p class="muted" style="font-size: 14px;">{{ Str::limit($journal->description, 80) }}</p>
                  @endif
                  
                    <span class="muted" >مشاهده شماره‌ها ↗</span>
                
                </div>
              </a>
              @endif
            </div>
          @endforeach
        </div>
      @else
        <p class="muted">هنوز نشریه‌ای اضافه نشده است. از پنل مدیریت اضافه کنید.</p>
      @endif
    </section>

    <!-- About Us -->
    <section id="about" class="section">
      <div class="about">
        <div>
          <h3>درباره انجمن</h3>
          <p class="lead">انجمن علمی توسعه روستایی شبکه‌ای از پژوهشگران، دانشجویان و کنشگران محلی است که با هدف <strong>توانمندسازی جوامع روستایی</strong> از طریق پژوهش‌های مسئله‌محور، آموزش‌های کاربردی و ترویج دانش بومی فعالیت می‌کند.</p>
          <div class="highlights">
            <div class="pill">پژوهش‌های مسئله‌محور</div>
            <div class="pill">توانمندسازی محلی</div>
            <div class="pill">دانش‌بنیان و نوآوری</div>
          </div>
        </div>
        <aside class="card" style="padding:16px">
          <h4 style="margin-top:0">ماموریت و چشم‌انداز</h4>
          <p class="muted">توسعه پایدار و عدالت‌محور، با اتکا به سرمایه‌های انسانی و طبیعی روستاها.</p>
        </aside>
      </div>
    </section>

   <!-- Gallery - داده‌ها از دیتابیس -->
<section id="gallery" class="section">
  <h3>گالری تصاویر</h3>
  @if($galleries->count() > 0)
    <div class="owl-carousel gallery" id="galleryOwl">
      @foreach($galleries as $index => $gallery)
        <div class="item" 
             data-index="{{ $index }}"
             data-description="{{ $gallery->description ?? '' }}">
          <img src="{{ asset('storage/' . $gallery->image) }}" 
               alt="{{ $gallery->alt ?? 'تصویر گالری' }}"/>
        </div>
      @endforeach
    </div>
  @else
    <p class="muted">هنوز تصویری در گالری اضافه نشده است.</p>
  @endif
</section>

<!-- Lightbox - به‌روزرسانی شده برای نمایش توضیحات -->
<div class="lightbox" id="lightbox" aria-modal="true" role="dialog">
  <button class="close">✕</button>
  <button class="prev">❮</button>
  <img alt="" />
  <button class="next">❯</button>
  <div class="counter" id="lbCounter"></div>
  <!-- اضافه کردن بخش توضیحات -->
  <div class="description" id="lbDescription"></div>
</div>

    <!-- Contact -->
    <!-- <section id="contact" class="section">
      <div class="card" style="padding:18px">
        <h3>ارتباط با ما</h3>
        <p class="muted">ایمیل: info@rural-dev.ir — تلفن: ۰۲۱-۱۲۳۴۵۶۷۸</p>
      </div>
    </section> -->
  </main>

  <!-- Footer -->
  <footer>
    <div class="container footer-grid">
      <div>
        <h4>انجمن علمی توسعه روستایی</h4>
        <p class="muted">پشتیبان دانش، نوآوری و عدالت فضایی در پهنه‌های روستایی ایران.</p>
      </div>
      <div>
        <h4>پیوندهای سریع</h4>
        <ul style="list-style:none; padding:0; margin:0">
          <li><a href="#journals">مجلات</a></li>
          <li><a href="#about">درباره‌ما</a></li>
          <li><a href="#gallery">گالری</a></li>
        </ul>
      </div>
      <div>
        <h4>دسترسی سریع</h4>
        <ul style="list-style:none; padding:0; margin:0">
          <li><a href="#contact">تماس با ما</a></li>
          @auth
            @if(auth()->user()->role === 'admin')
              <li><a href="{{ route('admin.dashboard') }}">پنل مدیریت</a></li>
            @endif
          @endauth
        </ul>
      </div>
    </div>
    <div class="container copy">© <span id="year"></span> انجمن علمی توسعه روستایی — تمامی حقوق محفوظ است.</div>
  </footer>

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
</body>
</html>