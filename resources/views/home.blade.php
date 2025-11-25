@extends('layouts.main')

<!-- @section('title', ' ')  -->
@section('content')
  <div id="hero" class="">
 
    <section class="owl-carousel hero-carousel hero" aria-roledescription="carousel" aria-label="اسلایدر تصاویر">
      @forelse($sliders as $slider)
        <div class="item">
          <img src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->title }}" />
          <div class="caption">
            <h2>{{ $slider->title }}</h2>
            @if($slider->description)
              <p>{{ $slider->description }}</p>
            @endif
          </div>
        </div>
      @empty
        <div class="item">
          <img  class='logo' src="https://via.placeholder.com/1200x600/246b5f/ffffff?text=اسلایدر+پیش‌فرض" alt="پیش‌فرض" />
          <div class="caption">
            <h2>به انجمن علمی توسعه روستایی خوش آمدید</h2>
            <p>لطفاً از پنل مدیریت اسلایدر اضافه کنید</p>
          </div>
        </div>
      @endforelse
    </section>

 
    <section class="welcome">
      <div class="container box">
       <h1><span class="highlight">{{ optional($welcome)->title ?? 'به سایت انجمن علمی جغرافیا و برنامه‌ریزی روستایی ایران خوش آمدید' }}</span></h1>
        <p>
          {{ optional($welcome)->content ?? 'این پایگاه اینترنتی با هدف اطلاع‌رسانی از برنامه‌های انجمن و برقراری ارتباط بین اعضا، شاخه‌های وابسته، کمیته‌های مطالعات و سایر مراکز مرتبط با انجمن راه‌اندازی شده است.' }}
        </p>
      </div>
    </section>

    
    <section id="journals" class="journal-sec section">
      <h3>نشریات و مجلات انجمن</h3>
      @if($journals->count() > 0)
        <div class="owl-carousel journals-carousel">
          @foreach($journals as $journal)
            <div class="p-2">
              @if($journal->link)
              <a class="card item" href="{{ $journal->link }}"  target="_blank">
                <div class="card-img">
                  <img src="{{ asset('storage/' . $journal->image) }}" alt="{{ $journal->title }}" />
                </div>
                <div class="meta">
                  <div class="tag">{{ $journal->tag }}</div>
                  <h4 style="margin:10px 0 4px">{{ $journal->title }}</h4>
                  @if($journal->description)
                    <p class="muted" style="font-size: 14px;">{{ Str::limit($journal->description, 80) }}</p>
                  @endif
                  
                    <span class="muted" >مشاهده شماره‌ها ↗</span>
                
                </div>
              </a>
              @endif
            </div>
          @endforeach
        </div>
      @else
        <p class="muted">هنوز نشریه‌ای اضافه نشده است. از پنل مدیریت اضافه کنید.</p>
      @endif
    </section>

   
    <section id="about" class="section">
      <div class="about">
        <div>
         <h3>{{ optional($about)->title ?? 'درباره انجمن' }}</h3>
          <p class="lead">{!! optional($about)->lead ?? 'انجمن علمی توسعه روستایی شبکه‌ای از پژوهشگران، دانشجویان و کنشگران محلی است که با هدف <strong>توانمندسازی جوامع روستایی</strong> از طریق پژوهش‌های مسئله‌محور، آموزش‌های کاربردی و ترویج دانش بومی فعالیت می‌کند.' !!}</p>
          @php
            $highlights = collect([
                optional($about)->highlight_one,
                optional($about)->highlight_two,
                optional($about)->highlight_three,
            ])->filter();
          @endphp
          <div class="highlights">
              @if($highlights->isNotEmpty())
              @foreach($highlights as $highlight)
                <div class="pill">{{ $highlight }}</div>
              @endforeach
            @else
              <div class="pill">پژوهش‌های مسئله‌محور</div>
              <div class="pill">توانمندسازی محلی</div>
              <div class="pill">دانش‌بنیان و نوآوری</div>
            @endif
          </div>
        </div>
        <aside class="card" style="padding:16px">
         <h4 style="margin-top:0">{{ optional($about)->mission_title ?? 'ماموریت و چشم‌انداز' }}</h4>
          <p class="muted">{{ optional($about)->mission_description ?? 'توسعه پایدار و عدالت‌محور، با اتکا به سرمایه‌های انسانی و طبیعی روستاها.' }}</p>
        </aside>
      </div>
    </section>


<section id="gallery" class="section">
  <h3>گالری تصاویر</h3>
  @if($galleries->count() > 0)
    <div class="owl-carousel gallery" id="galleryOwl">
      @foreach($galleries as $index => $gallery)
        <div class="item" 
             data-index="{{ $index }}"
             data-description="{{ $gallery->description ?? '' }}">
          <img src="{{ asset('storage/' . $gallery->image) }}" 
               alt="{{ $gallery->alt ?? 'تصویر گالری' }}"/>
        </div>
      @endforeach
    </div>
  @else
    <p class="muted">هنوز تصویری در گالری اضافه نشده است.</p>
  @endif
</section>

<div class="lightbox" id="lightbox" aria-modal="true" role="dialog">
  <button class="close">✕</button>
  <button class="prev">❮</button>
  <img alt="" />
  <button class="next">❯</button>
  <div class="counter" id="lbCounter"></div>
  <!-- اضافه کردن بخش توضیحات -->
  <div class="description" id="lbDescription"></div>
</div>

    <!-- Contact -->
    <!-- <section id="contact" class="section">
      <div class="card" style="padding:18px">
        <h3>ارتباط با ما</h3>
        <p class="muted">ایمیل: info@rural-dev.ir — تلفن: ۰۲۱-۱۲۳۴۵۶۷۸</p>
      </div>
    </section> -->
  </div>

  
@endsection

  
