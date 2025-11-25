<footer>
  <div class="container footer-grid">
    <div>
      <h4>انجمن علمی توسعه روستایی</h4>
      <p class="muted">پشتیبان دانش، نوآوری و عدالت فضایی در پهنه‌های روستایی ایران.</p>
    </div>

    <div>
      <h4>پیوندهای سریع</h4>
      <ul>
  @forelse($footerLinks as $link)
          <li><a href="{{ $link->url }}">{{ $link->title }}</a></li>
        @empty
          <li class="muted">پیوندی ثبت نشده است.</li>
        @endforelse
      </ul>
    </div>

    <div>
      <h4>اطلاعات تماس</h4>
      <ul style="list-style:none; padding:0; margin:0">
        @if($footerSettings?->address)
          <li class="muted"> آدرس: 
             {{ $footerSettings->address }}</li>
        @endif
        @if($footerSettings?->phone)
          <li class="muted">
            شماره تماس : 
             {{ $footerSettings->phone }}</li>
        @endif
        @if($footerSettings?->email)
          <li class="muted"> 
            ایمیل : 
            {{ $footerSettings->email }}</li>
        @endif
        @unless($footerSettings)
          <li class="muted">اطلاعات تماس هنوز ثبت نشده است.</li>
        @endunless
    </div>
  </div>

  <div class="container copy">
      © <span id="year"></span> انجمن علمی توسعه روستایی
  </div>
</footer>
