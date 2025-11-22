<footer>
  <div class="container footer-grid">
    <div>
      <h4>انجمن علمی توسعه روستایی</h4>
      <p class="muted">پشتیبان دانش، نوآوری و عدالت فضایی در پهنه‌های روستایی ایران.</p>
    </div>

    <div>
      <h4>پیوندهای سریع</h4>
      <ul>
        <li><a href="/pages/journals">مجلات</a></li>
        <li><a href="/pages/about">درباره‌ما</a></li>
        <li><a href="#gallery">گالری</a></li>
      </ul>
    </div>

    <div>
      <h4>دسترسی سریع</h4>
      <ul>
        <li><a href="#contact">تماس با ما</a></li>
        @auth
          @if(auth()->user()->role === 'admin')
            <li><a href="{{ route('admin.dashboard') }}">پنل مدیریت</a></li>
          @endif
        @endauth
      </ul>
    </div>
  </div>

  <div class="container copy">
      © <span id="year"></span> انجمن علمی توسعه روستایی
  </div>
</footer>
