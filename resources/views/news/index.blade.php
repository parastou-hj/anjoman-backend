@extends('layouts.main')
@section('content')
<div class="">
    <div class="page-header">
        <h1>آخرین اخبار انجمن</h1>
        <p>اخبار، اطلاعیه‌ها و تازه‌ترین رویدادهای مرتبط با انجمن علمی توسعه روستایی ایران را اینجا دنبال کنید.</p>
    </div>

    @if($newsItems->count())
        <section class="row">
            @foreach($newsItems as $news)
            <div class="col-lg-3 p-2">
                   <article class="news-card">
                    <a href="{{ route('news.show', $news) }}" class="news-card-link">
                        <div class="news-image">
                            @if($news->image)
                                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}">
                            @else
                                <img src="https://placehold.co/600x400?text=News" alt="{{ $news->title }}">
                            @endif
                        </div>
                        <div class="news-body">
                            <div class="news-date">
                                 {{ \Morilog\Jalali\Jalalian::fromDateTime($news->published_at)->format('Y/m/d') }}</div>
                            <h2 class="news-title">{{ $news->title }}</h2>
                            <p class="news-excerpt">{{ $news->description }}</p>
                        </div>
                    </a>
                </article>
            </div>
             
            @endforeach
        </section>

        <div class="pagination">
            {{ $newsItems->links() }}
        </div>
    @else
        <div class="empty-state">هیچ خبری برای نمایش وجود ندارد.</div>
    @endif
</div>

<style>
    .news-card-link {
        text-decoration: none;
        color: inherit;
        display: block;
        height: 100%;
    }

    .news-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin-bottom: 2rem;
    }

    .news-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .news-image img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-radius: 8px 8px 0 0;
    }

    .news-body {
        padding: 1.5rem;
        background: white;
        border-radius: 0 0 8px 8px;
    }

    .news-date {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }

    .news-title {
        font-size: 1.2rem;
        margin: 0.5rem 0;
        color: #333;
    }

    .news-excerpt {
        color: #666;
        font-size: 0.95rem;
        line-height: 1.6;
        margin: 0;
    }
</style>
@endsection