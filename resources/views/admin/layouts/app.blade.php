<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'پنل مدیریت')</title>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Vazirmatn', sans-serif; background: #f5f5f5; }
        
        /* Sidebar */
        .sidebar { position: fixed; right: 0; top: 0; width: 250px; height: 100vh; background: #1a1a2e; color: #fff; padding: 20px; overflow-y: auto; }
        .sidebar h2 { margin-bottom: 30px; font-size: 18px; border-bottom: 2px solid #16213e; padding-bottom: 10px; }
        .sidebar nav a { display: block; padding: 12px 15px; color: #fff; text-decoration: none; margin-bottom: 5px; border-radius: 8px; transition: 0.3s; }
        .sidebar nav a:hover { background: #16213e; }
        .sidebar nav a.active { background: #0f3460; }
        
        /* Main content */
        .main-content { margin-right: 250px; padding: 30px; }
        .header { background: #fff; padding: 20px 30px; border-radius: 12px; margin-bottom: 30px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); display: flex; justify-content: space-between; align-items: center; }
        .header h1 { font-size: 24px; color: #1a1a2e; }
        
        /* Card */
        .card { background: #fff; border-radius: 12px; padding: 25px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin-bottom: 20px; }
        .card-title { font-size: 20px; margin-bottom: 20px; color: #1a1a2e; }
        
        /* Table */
        table { width: 100%; border-collapse: collapse; }
        table th, table td { padding: 12px; text-align: right; border-bottom: 1px solid #eee; }
        table th { background: #f8f9fa; font-weight: 600; color: #1a1a2e; }
        table img { width: 80px; height: 50px; object-fit: cover; border-radius: 6px; }
        
        /* Buttons */
        .btn { display: inline-block; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: 0.3s; border: none; cursor: pointer; }
        .btn-primary { background: #0f3460; color: #fff; }
        .btn-primary:hover { background: #16213e; }
        .btn-success { background: #28a745; color: #fff; }
        .btn-danger { background: #dc3545; color: #fff; }
        .btn-sm { padding: 6px 12px; font-size: 14px; }
        
        /* Form */
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 600; color: #1a1a2e; }
        .form-control { width: 100%; padding: 10px 15px; border: 1px solid #ddd; border-radius: 8px; font-family: inherit; }
        .form-control:focus { outline: none; border-color: #0f3460; }
        
        /* Alert */
        .alert { padding: 15px 20px; border-radius: 8px; margin-bottom: 20px; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-danger { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        
        /* Stats */
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px; }
        .stat-card { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: #fff; padding: 25px; border-radius: 12px; }
        .stat-card h3 { font-size: 32px; margin-bottom: 5px; }
        .stat-card p { opacity: 0.9; }

        /* Tag style */
        .tag { display: inline-block; padding: 4px 10px; background: #eef6f4; color: #246b5f; border-radius: 999px; font-size: 12px; font-weight: 700; }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <h2>پنل مدیریت</h2>
        <nav>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                📊 داشبورد
            </a>
            <a href="{{ route('admin.menus.index') }}" class="{{ request()->routeIs('admin.menus.*') ? 'active' : '' }}">
                🧭 مدیریت منوها
            </a>
            <a href="{{ route('admin.board-members.index') }}" class="{{ request()->routeIs('admin.board-members.*') ? 'active' : '' }}">
                👥 هیئت مدیره
            </a>
            <a href="{{ route('admin.sliders.index') }}" class="{{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
                🖼️ مدیریت اسلایدرها
            </a>
            <a href="{{ route('admin.journals.index') }}" class="{{ request()->routeIs('admin.journals.*') ? 'active' : '' }}">
                📚 مدیریت نشریات
            </a>
            <a href="{{ route('admin.galleries.index') }}" class="{{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}">
                🖼️ مدیریت گالری
            </a>
            <a href="{{ route('admin.news.index') }}" class="{{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                📰 مدیریت اخبار
            </a>
            <a href="{{ route('admin.contact-messages.index') }}" class="{{ request()->routeIs('admin.contact-messages.*') ? 'active' : '' }}">
                ✉️ پیام‌های تماس
            </a>
            <a href="/" target="_blank">
                🌐 مشاهده سایت
            </a>
            <a href="{{ route('board-members') }}" target="_blank">
                👥 مشاهده هیئت مدیره
            </a>
            <form method="POST" action="{{ route('logout') }}" style="margin-top: 20px;">
                @csrf
                <button type="submit" class="btn btn-danger" style="width: 100%;">🚪 خروج</button>
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <div class="header">
            <h1>@yield('page-title', 'پنل مدیریت')</h1>
            <div>
                خوش آمدید، {{ auth()->user()->name }}
            </div>
        </div>

        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>