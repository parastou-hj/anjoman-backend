<header>
    <div class="container  py-3" role="navigation" aria-label="ناوبری اصلی">
 
      <div class="row">
        <a href="/" class="brand">
        <div class="logo">
          <img src="/images/logo.jpeg" alt="">
        </div>
        <span>انجمن علمی توسعه روستایی ایران</span>
      </a>
      </div>

     <div class="row mt-3">
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

          @auth
             @if(request()->is('admin*') && auth()->user()->role === 'admin')
              <li><a class="cta" href="{{ route('admin.dashboard') }}">پنل مدیریت</a></li>
            @endif
          @else
            <li><a class="" href="{{ route('login') }}"></a></li>
          @endauth

        </ul>
      </nav>
     </div>

    </div>
</header>
