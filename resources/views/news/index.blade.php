<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>اخبار — انجمن علمی توسعه روستایی</title>
    <meta name="description" content="آخرین اخبار و اطلاعیه‌های انجمن علمی توسعه روستایی" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --brand: #246b5f;
            --brand-2: #0f3f37;
            --accent: #f6a700;
            --bg: #fbfbfb;
            --text: #24323f;
            --muted: #6b7a8a;
            --card: #ffffff;
            --radius: 16px;
            --shadow: 0 10px 24px rgba(8, 26, 34, 0.08);
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: 'Vazirmatn', system-ui, -apple-system, Segoe UI, Roboto, sans-serif;
            line-height: 1.7;
        }
        a { color: inherit; text-decoration: none; }
        img { max-width: 100%; display: block; }
        .container { max-width: 1200px; margin-inline: auto; padding-inline: 16px; }
        header {
            position: sticky;
            top: 0;
            z-index: 60;
            backdrop-filter: saturate(180%) blur(8px);
            background: rgba(255, 255, 255, .92);
            border-bottom: 1px solid #eef1f4;
        }
        .nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 12px 0;
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 700;
            color: var(--brand);
        }
        .brand .logo {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, var(--brand), var(--brand-2));
            color: #fff;
            box-shadow: 0 6px 16px rgba(36, 107, 95, .35);
        }
        nav { position: relative; }
        nav ul {
            display: flex;
            gap: 6px;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        nav > ul > li { position: relative; }
        nav a {
            padding: 10px 14px;
            border-radius: 12px;
            font-weight: 600;
            color: #0f1720;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all .2s ease;
        }
        nav a:hover {
            background: #eef6f4;
            color: var(--brand);
            box-shadow: 0 2px 0 var(--brand) inset;
        }
        .cta {
            background: var(--brand);
            color: #fff;
        }
        .cta:hover {
            background: var(--brand-2);
            color: #fff;
            box-shadow: none;
        }
        .submenu {
            position: absolute;
            right: 0;
            top: 100%;
            min-width: 220px;
            background: #fff;
            border: 1px solid #eef1f4;
            border-radius: 14px;
            box-shadow: var(--shadow);
            padding: 6px;
            display: none;
        }
        .submenu a {
            display: block;
            padding: 10px 12px;
            border-radius: 10px;
            color: #233;
        }
        .submenu a:hover {
            background: #f2faf8;
            color: var(--brand);
        }
        li.has-submenu:focus-within > .submenu,
        li.has-submenu:hover > .submenu { display: block; }
        .menu-btn {
            display: none;
            border: none;
            background: #fff;
            width: 42px;
            height: 42px;
            border-radius: 12px;
            box-shadow: var(--shadow);
        }
        main { padding: 48px 0 60px; }
        .page-header { text-align: center; margin-bottom: 36px; }
        .page-header h1 { margin: 0 0 12px 0; font-size: clamp(24px, 4vw, 40px); color: var(--brand); }
        .page-header p { margin: 0 auto; max-width: 620px; color: var(--muted); font-size: 16px; }
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
        }
        .news-card {
            background: var(--card);
            border-radius: var(--radius);
            overflow: hidden;
            border: 1px solid #eef1f4;
            box-shadow: 0 6px 18px rgba(15, 63, 55, .08);
            display: flex;
            flex-direction: column;
            transition: transform .2s ease, box-shadow .2s ease;
        }
        .news-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 30px rgba(15, 63, 55, .12);
        }
        .news-image { height: 200px; overflow: hidden; }
        .news-image img { width: 100%; height: 100%; object-fit: cover; }
        .news-body { padding: 18px; display: flex; flex-direction: column; gap: 12px; }
        .news-date { font-size: 13px; color: var(--muted); display: flex; align-items: center; gap: 6px; }
        .news-title { font-size: 18px; font-weight: 700; margin: 0; color: #1f2d3d; }
        .news-excerpt { color: var(--muted); font-size: 14px; margin: 0; }
        .empty-state {
            text-align: center;
            padding: 60px 0;
            color: var(--muted);
            font-size: 18px;
        }
        .pagination { margin-top: 40px; display: flex; justify-content: center; }
        footer {
            margin-top: 60px;
            background: linear-gradient(180deg, #0c2c27, #0a2420);
            color: #d7efe9;
            padding: 24px 0;
        }
        footer p { margin: 0; text-align: center; font-size: 14px; color: #b8d5cf; }
        @media (max-width: 720px) {
            .menu-btn { display: block; }
            nav {
                position: fixed;
                inset: 64px 14px auto 14px;
                background: #fff;
                border: 1px solid #eef1f4;
                border-radius: 16px;
                box-shadow: var(--shadow);
                padding: 8px;
                display: none;
            }
            nav.open { display: block; }
            nav ul { flex-direction: column; }
        }
    </style>
</head>
<body>
<header>
    <div class="container nav" role="navigation" aria-label="ناوبری اصلی">
        <a href="/" class="brand">
            <div class="logo">📰</div>
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

<main class="container">
    <div class="page-header">
        <h1>آخرین اخبار انجمن</h1>
        <p>اخبار، اطلاعیه‌ها و تازه‌ترین رویدادهای مرتبط با انجمن علمی توسعه روستایی ایران را اینجا دنبال کنید.</p>
    </div>

    @if($newsItems->count())
        <section class="news-grid">
            @foreach($newsItems as $news)
                <article class="news-card">
                    <div class="news-image">
                        @if($news->image)
                            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}">
                        @else
                            <img src="https://placehold.co/600x400?text=News" alt="{{ $news->title }}">
                        @endif
                    </div>
                    <div class="news-body">
                        <div class="news-date">🗓 {{ \Morilog\Jalali\Jalalian::fromDateTime($news->published_at)->format('Y/m/d') }}</div>
                        <h2 class="news-title">{{ $news->title }}</h2>
                        <p class="news-excerpt">{{ \Illuminate\Support\Str::limit(strip_tags($news->content), 140) }}</p>
                    </div>
                </article>
            @endforeach
        </section>

        <div class="pagination">
            {{ $newsItems->links() }}
        </div>
    @else
        <div class="empty-state">هیچ خبری برای نمایش وجود ندارد.</div>
    @endif
</main>

<footer>
    <div class="container">
        <p>© {{ now()->year }} انجمن علمی توسعه روستایی ایران</p>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuBtn = document.querySelector('.menu-btn');
        const nav = document.querySelector('header nav');

        menuBtn?.addEventListener('click', function () {
            const expanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', expanded ? 'false' : 'true');
            nav.classList.toggle('open');
        });
    });
</script>
</body>
</html>