<header>
    <div class="container py-3" role="navigation" aria-label="ناوبری اصلی">
        @if(isset($menus) && $menus->count() > 0)
        <div class="row d-flex align-items-center justify-content-between">
            <a href="/" class="brand">
                <div class="logo">
                    <img src="/images/logo.jpeg" alt="لوگو انجمن علمی توسعه روستایی ایران">
                </div>
                <span>انجمن علمی توسعه روستایی ایران</span>
            </a>
            
            <button class="menu-btn" aria-label="باز کردن منو" aria-expanded="false">
                <i class="fa fa-bars"></i>
            </button>
        </div>

      
        <div class="row mt-3">
            <nav class="desktop-nav">
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
                        <li><a class="" href="{{ route('login') }}">ورود</a></li>
                    @endauth
                </ul>
            </nav>
        </div>

     <div class="nav-overlay"></div>
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
                    <li><a class="" href="{{ route('login') }}">ورود</a></li>
                @endauth
            </ul>
        </nav>
        
        @else
        <div class="row d-flex align-items-center justify-content-between">
            <a href="/" class="brand">
                <div class="logo">
                    <img src="/images/logo.jpeg" alt="لوگو انجمن علمی توسعه روستایی ایران">
                </div>
                <span>انجمن علمی توسعه روستایی ایران</span>
            </a>
        </div>
        @endif
    </div>
</header>


@push('styles')
{{-- <link rel="stylesheet" href="{{ asset('css/off-canvas-nav.css') }}"> --}}
@endpush

@push('scripts')
{{-- <script src="{{ asset('js/off-canvas-nav.js') }}"></script> --}}
@endpush