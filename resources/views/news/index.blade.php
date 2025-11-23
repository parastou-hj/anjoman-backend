@extends('layouts.main')
@section('content')
<div class="container">
    <div class="page-header">
        <h1>آخرین اخبار انجمن</h1>
        <p>اخبار، اطلاعیه‌ها و تازه‌ترین رویدادهای مرتبط با انجمن علمی توسعه روستایی ایران را اینجا دنبال کنید.</p>
    </div>

    @if($newsItems->count())
        <section class="row">
            @foreach($newsItems as $news)
                <article class="news-card col-lg-3">
                    <div class="news-image">
                        @if($news->image)
                            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}">
                        @else
                            <img src="https://placehold.co/600x400?text=News" alt="{{ $news->title }}">
                        @endif
                    </div>
                    <div class="news-body">
                        <div class="news-date">🗓 {{ \Morilog\Jalali\Jalalian::fromDateTime($news->published_at)->format('Y/m/d') }}</div>
                        <h2 class="news-title">{{ $news->title }}</h2>
                        <p class="news-excerpt">{{ \Illuminate\Support\Str::limit(strip_tags($news->content), 140) }}</p>
                    </div>
                </article>
            @endforeach
        </section>

        <div class="pagination">
            {{ $newsItems->links() }}
        </div>
    @else
        <div class="empty-state">هیچ خبری برای نمایش وجود ندارد.</div>
    @endif
</div>

@endsection