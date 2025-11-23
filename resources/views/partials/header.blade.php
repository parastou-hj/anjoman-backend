<header>
    <div class="container nav" role="navigation" aria-label="ناوبری اصلی">

      <a href="/" class="brand">
        <div class="logo">
          <img src="" alt="">
        </div>
        <span>انجمن علمی توسعه روستایی</span>
      </a>

      <button class="menu-btn">☰</button>

      <nav id="primary-nav">
        <ul>

          @foreach($menus as $menu)
            <li class="{{ $menu->hasChildren() ? 'has-submenu' : '' }}">
              <a href="{{ $menu->url ?: '#' }}" target="{{ $menu->target }}">
                {{ $menu->title }}
                @if($menu->hasChildren())
                  <span>▼</span>
                @endif
              </a>

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

        
          <li><a class="cta" href="{{ route('admin.register.form') }}">عضویت در انجمن</a></li>

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
