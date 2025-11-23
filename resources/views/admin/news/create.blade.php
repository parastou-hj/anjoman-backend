@extends('admin.layouts.app')

@section('title', 'افزودن خبر')
@section('page-title', 'افزودن خبر جدید')

@section('content')
<div class="card">
    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>عنوان خبر *</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            @error('title')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>توضیح کوتاه (برای لیست اخبار) *</label>
            <textarea name="description" class="form-control" rows="3" placeholder="توضیح کوتاهی درباره خبر (حداکثر 500 کاراکتر)" maxlength="500" required>{{ old('description') }}</textarea>
            <small style="color: #666;">برای نمایش در لیست اخبار</small>
            @error('description')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>محتوای کامل خبر *</label>
            <textarea name="content" class="form-control tinymce-editor" rows="15">{{ old('content') }}</textarea>
            <small style="color: #666;">محتوای تکمیلی برای صفحه خبر تکی</small>
            @error('content')<span style="color: red; display:block;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>تصویر خبر *</label>
            <input type="file" name="image" class="form-control" accept="image/*" required>
            @error('image')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>تاریخ انتشار *</label>
            <input type="date" name="published_at" class="form-control" value="{{ old('published_at', now()->toDateString()) }}" required>
            @error('published_at')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                فعال
            </label>
        </div>

        <button type="submit" class="btn btn-success">ذخیره</button>
        <a href="{{ route('admin.news.index') }}" class="btn btn-danger">انصراف</a>
    </form>
</div>
@endsection
@push('scripts')
<script src="https://cdn.tiny.cloud/1/e2542kfm6llf9xmph6r2dju04ra2ij7ij4soorfhx99axcet/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (window.tinymce?.editors?.length) {
            tinymce.remove();
        }

        tinymce.init({
            selector: 'textarea.tinymce-editor',
            language: 'fa',
            language_url: 'https://cdn.tiny.cloud/1/e2542kfm6llf9xmph6r2dju04ra2ij7ij4soorfhx99axcet/tinymce/6/langs/fa.js',
            directionality: 'rtl',
            height: 500,
            plugins: 'advlist autolink lists link image media table code fullscreen',
            toolbar: 'undo redo | bold italic underline | alignright aligncenter alignleft alignjustify | bullist numlist outdent indent | link image media table | removeformat fullscreen code',
            menubar: 'file edit view insert format tools table help',
            content_style: 'body { font-family: Vazirmatn, sans-serif; line-height: 2; }',
            images_upload_handler: function (blobInfo) {
    return new Promise((resolve, reject) => {
        const formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());

        fetch('{{ route('admin.pages.upload-image') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'X-Requested-With': 'XMLHttpRequest'
            },
            credentials: 'same-origin',
            body: formData
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('خطای سرور (' + response.status + ')');
                }
                return response.json();
            })
            .then(json => {
                if (json?.location) {
                    resolve(json.location);
                } else {
                    reject('پاسخ نامعتبر از سرور');
                }
            })
            .catch(error => reject(error.message));
    });
}
        });
    });
</script>
@endpush