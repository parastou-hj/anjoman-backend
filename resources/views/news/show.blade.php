@extends('layouts.main')

@section('content')
<div class="container">
    <article class="news-detail">
        <div class="news-detail-header">
            <h1 class="news-detail-title">{{ $news->title }}</h1>
            <div class="news-detail-meta">
                <span class="news-detail-date">
                    📅 {{ \Morilog\Jalali\Jalalian::fromDateTime($news->published_at)->format('Y/m/d') }}
                </span>
            </div>
        </div>

        @if($news->image)
            <div class="news-detail-image">
                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" />
            </div>
        @endif

        <div class="news-detail-content">
            {!! $news->content !!}
        </div>

        <div class="news-detail-footer">
            <a href="{{ route('news.index') }}" class="btn btn-secondary">بازگشت به اخبار</a>
        </div>
    </article>
</div>

<style>
    .news-detail {
        background: white;
        padding: 2rem;
        border-radius: 8px;
        margin: 2rem 0;
    }

    .news-detail-header {
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #e0e0e0;
    }

    .news-detail-title {
        font-size: 2rem;
        margin-bottom: 0.5rem;
        color: #333;
    }

    .news-detail-meta {
        display: flex;
        gap: 1rem;
        color: #666;
        font-size: 0.95rem;
    }

    .news-detail-image {
        margin: 2rem 0;
        text-align: center;
    }

    .news-detail-image img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .news-detail-content {
        line-height: 1.8;
        color: #333;
        margin: 2rem 0;
        font-size: 1rem;
    }

    .news-detail-content p {
        margin-bottom: 1rem;
    }

    .news-detail-footer {
        margin-top: 2rem;
        padding-top: 1rem;
        border-top: 1px solid #e0e0e0;
    }
</style>
@endsection