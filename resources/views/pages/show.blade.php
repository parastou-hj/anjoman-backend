<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page->title }} — انجمن علمی توسعه روستایی</title>
    <meta name="description" content="{{ \Illuminate\Support\Str::limit(strip_tags($page->content), 160) }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        :root {
            --brand:#246b5f;
            --brand-2:#0f3f37;
            --accent:#f6a700;
            --bg:#fbfbfb;
            --text:#24323f;
            --muted:#6b7a8a;
            --card:#ffffff;
            --shadow: 0 0 24px rgba(8,26,34,0.08);
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Vazirmatn', sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.9;
        }
        a { color: inherit; text-decoration: none; }
        header {
            position: sticky;
            top: 0;
            z-index: 50;
            backdrop-filter: saturate(180%) blur(8px);
            background: rgba(255,255,255,.95);
            border-bottom: 1px solid #eef1f4;
        }
        .nav {
            max-width: 1200px;
            margin: 0 auto;
            padding: 12px 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--brand);
            font-weight: 700;
        }
        .brand .logo {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, var(--brand), var(--brand-2));
            color: #fff;
            box-shadow: 0 6px 16px rgba(36,107,95,.35);
        }
        nav ul {
            display: flex;
            list-style: none;
            gap: 6px;
            margin: 0;
            padding: 0;
        }
        nav li { position: relative; }
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
        }
        li.has-submenu:hover > .submenu,
        li.has-submenu:focus-within > .submenu { display: block; }
        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 30px 18px 80px;
        }
        .page-card {
            background: var(--card);
            border-radius: 18px;
            box-shadow: var(--shadow);
            padding: 30px;
        }
        .page-card h1 {
            margin-top: 0;
            margin-bottom: 12px;
            font-size: clamp(20px, 2.8vw, 32px);
            color: var(--brand-2);
        }
        .page-meta {
            margin-bottom: 28px;
            color: var(--muted);
            font-size: 14px;
        }
        .page-content img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(15,63,55,0.1);
        }
        .page-content table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .page-content table th,
        .page-content table td {
            border: 1px solid #e2e8f0;
            padding: 10px;
        }
        footer {
            margin-top: 80px;
            background: linear-gradient(180deg,#0c2c27, #0a2420);
            color: #d7efe9;
        }
        .footer-inner {
            max-width: 1200px;
            margin: 0 auto;
            padding: 24px 18px;
            text-align: center;
            font-size: 14px;
        }
        @media (max-width: 768px) {
            nav ul { flex-direction: column; align-items: flex-start; }
            nav { display: none; }
        }
    </style>
</head>
<body>
<header>
    <div class="nav">
        <a href="/" class="brand">
            <div class="logo">انجمن</div>
            <span>انجمن علمی توسعه روستایی</span>
        </a>
        <nav>
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
                                        <a href="{{ $submenu->url ?: '#' }}" target="{{ $submenu->target }}">{{ $submenu->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</header>

<main class="container">
    <article class="page-card">
        <h1>{{ $page->title }}</h1>
     
        <div class="page-content">
            {!! $page->content !!}
        </div>
    </article>
</main>

<footer>
    <div class="footer-inner">
        کلیه حقوق برای انجمن علمی توسعه روستایی محفوظ است.
    </div>
</footer>
</body>
</html>