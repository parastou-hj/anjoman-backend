<header>
    <div class="container-fluid header-container header-shadow bg-white px-0" role="navigation" aria-label="ناوبری اصلی">
        @if(isset($menus) && $menus->count() > 0)
       <div class=" header-back  ">
         <div class="row header-top d-flex align-items-center justify-content-between py-3 px-0 px-lg-auto">
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
       </div>

      
       <div class=" header-down">
    
         <div class="row mt-3 px-0">
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
                        <li></li>
                    @endauth
                </ul>
            </nav>
        </div>
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
                    <li></li>
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
<script>
    $(document).ready(function() {
    // ========== Header Moving Function ==========
    const headerMoving = () => {
        const $header = $('header');
        const $headerContainer = $('.header-container');
        const $mainHeader = $('.header-back');
        const $downHeader = $('.header-down');
        const $advertise = $('.advertise');
        const $resSearch = $('.res-search');
        
        const resSearchHeight = $resSearch.outerHeight() || 0;
        const downHeaderHeight = $downHeader.outerHeight() || 0;
        const mainHeaderHeight = $mainHeader.outerHeight() || 0;
        const adHeaderHeight = $advertise.outerHeight() || 0;
    
        let lastScrollTop = 0;
        let isHeaderVisible = true;
        
        $mainHeader.removeClass('lg-header-up');
        $downHeader.removeClass('header-hidden');
        $resSearch.removeClass('header-hidden');
        
        if (window.innerWidth > 992) {
            const headerHeight = mainHeaderHeight + downHeaderHeight;
            const totalHeight = headerHeight + adHeaderHeight;
            
            $headerContainer.css('height', headerHeight);
            $('body').css('padding-top', totalHeight);
            
            $(window).off('scroll.headerDesktop').on('scroll.headerDesktop', function() {
                const currentScroll = $(this).scrollTop();
                
                if (currentScroll > 50) {
                    if (currentScroll > lastScrollTop && isHeaderVisible) {
                        $mainHeader.addClass('lg-header-up');
                        $downHeader.addClass('header-hidden');
                        $headerContainer.css('height', mainHeaderHeight);
                        //  $headerContainer.addClass('header-shadow');
                        isHeaderVisible = false;
                    } else if (currentScroll < lastScrollTop && !isHeaderVisible) {
                        $mainHeader.removeClass('lg-header-up');
                        $downHeader.removeClass('header-hidden');
                        $headerContainer.css('height', headerHeight);
                        //  $headerContainer.removeClass('header-shadow');
                        isHeaderVisible = true;
                    }
                } else {
                    $mainHeader.removeClass('lg-header-up');
                    $downHeader.removeClass('header-hidden');
                    $headerContainer.css('height', headerHeight);
                    //  $headerContainer.removeClass('header-shadow');
                    isHeaderVisible = true;
                }
                
                lastScrollTop = currentScroll;
            });
        } else {
            const headerHeight = mainHeaderHeight + resSearchHeight;
            const totalHeight = headerHeight + adHeaderHeight;
            
            $headerContainer.css('height', headerHeight);
            $('body').css('padding-top', totalHeight);
            
            $(window).off('scroll.headerMobile').on('scroll.headerMobile', function() {
                const currentScroll = $(this).scrollTop();
                
                if (currentScroll > 50) {
                    if (currentScroll > lastScrollTop && isHeaderVisible) {
                        $mainHeader.addClass('lg-header-up');
                        $resSearch.addClass('header-hidden');
                        $headerContainer.css('height', mainHeaderHeight);
                        // $headerContainer.addClass('header-shadow')
                        isHeaderVisible = false;
                    } else if (currentScroll < lastScrollTop && !isHeaderVisible) {
                        $mainHeader.removeClass('lg-header-up');
                        $resSearch.removeClass('header-hidden');
                        $headerContainer.css('height', headerHeight);
                        // $headerContainer.removeClass('header-shadow');
                        isHeaderVisible = true;
                    }
                } else {
                    $mainHeader.removeClass('lg-header-up');
                    $resSearch.removeClass('header-hidden');
                    $headerContainer.css('height', headerHeight);
                    //   $headerContainer.removeClass('header-shadow');
                    isHeaderVisible = true;
                }
                
                lastScrollTop = currentScroll;
            });
        }
    };

    headerMoving();
    
    let resizeTimer;
    $(window).on('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            headerMoving();
        }, 250);
    });
    });

     document.addEventListener('DOMContentLoaded', function() {
            const menuBtn = document.querySelector('.menu-btn');
            const nav = document.querySelector('#primary-nav');
            const overlay = document.querySelector('.nav-overlay');

            if (!menuBtn || !nav) return;


            menuBtn.onclick = () => {
                nav.classList.toggle('active');
                overlay.classList.toggle('active');
                document.body.style.overflow = nav.classList.contains('active') ? 'hidden' : '';
                menuBtn.innerHTML = nav.classList.contains('active') ? '<i class="fa fa-times"></i>' :
                    '<i class="fa fa-bars"></i>';
            };


            overlay.onclick = () => menuBtn.click();


            document.querySelectorAll('#primary-nav .has-submenu a').forEach(link => {
                link.onclick = (e) => {
                    if (window.innerWidth <= 768) {
                        e.preventDefault();
                        link.parentElement.classList.toggle('active');
                    }
                };
            });

        });

</script>
@endpush