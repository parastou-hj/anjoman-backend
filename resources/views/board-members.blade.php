<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>اعضای هیئت مدیره — انجمن علمی توسعه روستایی</title>
  <meta name="description" content="اعضای هیئت مدیره انجمن علمی جغرافیا و برنامه‌ریزی روستایی ایران" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;600;700&display=swap" rel="stylesheet">
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
      --shadow: 0 10px 24px rgba(8,26,34,0.08);
    }
    *{box-sizing:border-box}
    html,body{height:100%}
    body{margin:0; background:var(--bg); color:var(--text); font-family:'Vazirmatn', system-ui, -apple-system, Segoe UI, Roboto, sans-serif; line-height:1.6}
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
    nav a{padding:10px 14px; border-radius:12px; font-weight:600; color:#0f1720; display:inline-flex; align-items:center; gap:6px; transition:all .2s ease}
    nav a:hover{background:#eef6f4; color:var(--brand); box-shadow:0 2px 0 var(--brand) inset}
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
</head>
<body>
  <!-- Header with Dynamic Navigation -->
  <header>
    <div class="container nav" role="navigation" aria-label="ناوبری اصلی">
      <a href="/" class="brand">
        <div class="logo">🌾</div>
        <span>انجمن علمی توسعه روستایی</span>
      </a>
      <button class="menu-btn" aria-controls="primary-nav" aria-expanded="false" title="منو">☰</button>
      <nav id="primary-nav" aria-label="Primary">
        <ul>
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

  <!-- Main Content -->
  <main class="container main">
    <!-- Page Header -->
    <div class="page-header">
      <h1>اعضای هیئت مدیره</h1>
      <p>بیان افتخار می‌کند از معرفی اعضای محترم هیئت مدیره انجمن علمی جغرافیا و برنامه‌ریزی روستایی ایران</p>
    </div>

    <!-- Members Grid -->
    @if($boardMembers->count() > 0)
      <div class="members-grid">
        @foreach($boardMembers as $member)
          <article class="member-card d-flex">
            <!-- Photo -->
            <div class="member-photo">
              @if($member->image)
                <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}">
              @else
                <div class="placeholder">👤</div>
              @endif
            </div>

            <!-- Info -->
            <div class="member-info">
              <h2 class="member-name">{{ $member->name }}</h2>
              <div class="member-position">{{ $member->position }}</div>

              <div class="member-details">
                @if($member->job_title)
                  <div class="detail">
                    <span class="icon">🏢</span>
                    <span>{{ $member->job_title }}</span>
                  </div>
                @endif

                @if($member->specialization)
                  <div class="detail">
                    <span class="icon">🎓</span>
                    <span>{{ $member->specialization }}</span>
                  </div>
                @endif

                @if($member->email)
                  <div class="detail">
                    <span class="icon">✉️</span>
                    <a href="mailto:{{ $member->email }}" style="color: var(--brand);">{{ $member->email }}</a>
                  </div>
                @endif
              </div>

              @if($member->bio)
                <div class="member-bio">{{ $member->bio }}</div>
              @endif

              @if($member->website_url)
                <div class="member-links">
                  <a href="{{ $member->website_url }}" target="_blank" class="member-link">
                    🔗 صفحه شخصی
                  </a>
                </div>
              @endif
            </div>
          </article>
        @endforeach
      </div>
    @else
      <div style="text-align: center; padding: 60px 20px; background: var(--card); border-radius: var(--radius); border: 1px solid #eef1f4;">
        <h3 style="color: var(--muted); margin: 0;">اطلاعات اعضای هیئت مدیره به‌زودی منتشر خواهد شد</h3>
      </div>
    @endif
  </main>

  <!-- Footer -->
  <footer>
    <div class="container footer-content">
      <p>© <span id="year"></span> انجمن علمی توسعه روستایی — تمامی حقوق محفوظ است</p>
    </div>
  </footer>

  <script>
    const menuBtn = document.querySelector('.menu-btn');
    const nav = document.getElementById('primary-nav');
    menuBtn?.addEventListener('click', () => {
      const isOpen = nav.classList.toggle('open');
      menuBtn.setAttribute('aria-expanded', String(isOpen));
    });

    document.getElementById('year').textContent = new Date().getFullYear();
  </script>
</body>
</html>