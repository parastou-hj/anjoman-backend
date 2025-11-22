
@extends('layouts.main')

@section('title', ' هیئت مدیره') 
@section('content')
  <!-- Main Content -->
  <div class=" main">
    <!-- Page Header -->
    <div class="page-header">
      <h1>اعضای هیئت مدیره</h1>
      <p>بیان افتخار می‌کند از معرفی اعضای محترم هیئت مدیره انجمن علمی توسعه روستایی ایران</p>
    </div>

    <!-- Members Grid -->
    @if($boardMembers->count() > 0)
      <div class="members-grid">
        @foreach($boardMembers as $member)
          <article class="member-card d-flex">
            <!-- Photo -->
            <div class="member-photo">
              @if($member->image)
                <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}">
              @else
                <div class="placeholder">👤</div>
              @endif
            </div>

            <!-- Info -->
            <div class="member-info">
              <h2 class="member-name">{{ $member->name }}</h2>
              <div class="member-position">{{ $member->position }}</div>

              <div class="member-details">
                @if($member->job_title)
                  <div class="detail">
                    <span class="icon">🏢</span>
                    <span>{{ $member->job_title }}</span>
                  </div>
                @endif

                @if($member->specialization)
                  <div class="detail">
                    <span class="icon">🎓</span>
                    <span>{{ $member->specialization }}</span>
                  </div>
                @endif

                @if($member->email)
                  <div class="detail">
                    <span class="icon">✉️</span>
                    <a href="mailto:{{ $member->email }}" style="color: var(--brand);">{{ $member->email }}</a>
                  </div>
                @endif
              </div>

              @if($member->bio)
                <div class="member-bio">{{ $member->bio }}</div>
              @endif

              @if($member->website_url)
                <div class="member-links">
                  <a href="{{ $member->website_url }}" target="_blank" class="member-link">
                    🔗 صفحه شخصی
                  </a>
                </div>
              @endif
            </div>
          </article>
        @endforeach
      </div>
    @else
      <div style="text-align: center; padding: 60px 20px; background: var(--card); border-radius: var(--radius); border: 1px solid #eef1f4;">
        <h3 style="color: var(--muted); margin: 0;">اطلاعات اعضای هیئت مدیره به‌زودی منتشر خواهد شد</h3>
      </div>
    @endif
  </div>


@endsection