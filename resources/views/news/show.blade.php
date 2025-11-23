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
            <div class="share-section">
                <a href="{{ route('news.index') }}" class="btn btn-secondary">بازگشت به اخبار</a>
                
                <div class="share-buttons">
                    <span class="share-label">اشتراک‌گذاری:</span>
                    

                    <a href="https://t.me/share/url?url={{ urlencode(route('news.show', $news)) }}&text={{ urlencode($news->title) }}" 
                       target="_blank" 
                       class="share-btn telegram"
                       title="اشتراک در تلگرام">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.16.16-.295.295-.605.295l.213-3.053 5.56-5.023c.242-.213-.054-.334-.373-.121l-6.869 4.332-2.96-.924c-.644-.213-.657-.644.136-.953l11.566-4.458c.538-.196 1.006.128.832 1.13z"/>
                        </svg>
                    </a>


                    <a href="https://wa.me/?text={{ urlencode($news->title . ' ' . route('news.show', $news)) }}" 
                       target="_blank" 
                       class="share-btn whatsapp"
                       title="اشتراک در واتس‌اپ">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a6.963 6.963 0 00-6.955 6.96c0 1.928.617 3.742 1.776 5.245L2.561 22.288l5.717-1.496A6.948 6.948 0 0011.051 21c3.86 0 7.001-3.141 7.001-7.001 0-1.87-.738-3.631-2.076-4.947a7.006 7.006 0 00-4.945-2.045M19.338 3.68C17.432 1.78 14.825 0.745 12.05.745 5.948.745.961 5.732.961 11.835c0 2.031.528 4.008 1.532 5.748L.39 23.337l6.322-1.652c1.674.896 3.554 1.368 5.338 1.368 6.101 0 11.089-4.987 11.089-11.089 0-2.965-1.192-5.751-3.362-7.684"/>
                        </svg>
                    </a>


                    <button class="share-btn copy-link" onclick="copyToClipboard('{{ route('news.show', $news) }}')" title="کپی لینک">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                        </svg>
                    </button>
                </div>
            </div>
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
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .share-section {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .share-buttons {
        display: flex;
        gap: 0.8rem;
        align-items: center;
        flex-wrap: wrap;
    }

    .share-label {
        color: #666;
        font-size: 0.95rem;
        font-weight: 500;
        white-space: nowrap;
    }

    .share-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #f0f0f0;
        color: #333;
        text-decoration: none;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        padding: 0;
    }

    .share-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .share-btn svg {
        width: 20px;
        height: 20px;
    }

    .share-btn.telegram {
        background-color: #0088cc;
        color: white;
    }

    .share-btn.telegram:hover {
        background-color: #0077aa;
    }

    .share-btn.whatsapp {
        background-color: #25d366;
        color: white;
    }

    .share-btn.whatsapp:hover {
        background-color: #1ecc4f;
    }

    .share-btn.facebook {
        background-color: #1877f2;
        color: white;
    }

    .share-btn.facebook:hover {
        background-color: #0a66c2;
    }

    .share-btn.twitter {
        background-color: #1da1f2;
        color: white;
    }

    .share-btn.twitter:hover {
        background-color: #1a91da;
    }

    .share-btn.copy-link {
        background-color: #6c757d;
        color: white;
    }

    .share-btn.copy-link:hover {
        background-color: #5a6268;
    }

    @media (max-width: 768px) {
        .news-detail-footer {
            flex-direction: column;
            align-items: flex-start;
        }

        .share-section {
            flex-direction: column;
            width: 100%;
        }

        .share-buttons {
            width: 100%;
            justify-content: flex-start;
        }

        .btn.btn-secondary {
            width: 100%;
            text-align: center;
        }
    }
</style>

<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            alert('لینک در کلیپ‌بورد کپی شد!');
        }, function(err) {
            console.error('خطا در کپی کردن:', err);
        });
    }
</script>
@endsection