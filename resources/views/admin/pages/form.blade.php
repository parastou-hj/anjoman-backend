@php
    $pageInstance = $page ?? null;
@endphp

@csrf

<div class="form-group">
    <label>عنوان صفحه *</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $pageInstance->title ?? '') }}" required>
    @error('title')<span style="color: red;">{{ $message }}</span>@enderror
</div>

<div class="form-group">
    <label>آدرس (Slug)</label>
    <input type="text" name="slug" class="form-control" value="{{ old('slug', $pageInstance->slug ?? '') }}" placeholder="مثال: founders">
    <small style="color:#6b7280;">در صورت خالی بودن، به صورت خودکار از عنوان تولید می‌شود.</small>
    @error('slug')<span style="color: red; display:block;">{{ $message }}</span>@enderror
</div>

<div class="form-group">
    <label>محتوا *</label>
    <textarea name="content" class="form-control tinymce-editor" rows="15">{{ old('content', $pageInstance->content ?? '') }}</textarea>
    @error('content')<span style="color: red; display:block;">{{ $message }}</span>@enderror
</div>

<div class="form-group">
    <label>
        <input type="checkbox" name="is_published" value="1" {{ old('is_published', ($pageInstance->is_published ?? true)) ? 'checked' : '' }}>
        صفحه منتشر شود
    </label>
</div>

<button type="submit" class="btn btn-success">ذخیره</button>
<a href="{{ route('admin.pages.index') }}" class="btn btn-danger">انصراف</a>

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
            images_upload_handler: function (blobInfo, success, failure) {
                const xhr = new XMLHttpRequest();
                xhr.withCredentials = true;
                xhr.open('POST', '{{ route('admin.pages.upload-image') }}');
                xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

                xhr.onload = function() {
                    if (xhr.status !== 200) {
                        failure('خطا در آپلود تصویر: ' + xhr.responseText);
                        return;
                    }

                    const json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location !== 'string') {
                        failure('پاسخ نامعتبر از سرور');
                        return;
                    }

                    success(json.location);
                };

                xhr.onerror = function() {
                    failure('امکان برقراری ارتباط با سرور وجود ندارد.');
                };

                const formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());

                xhr.send(formData);
            }
        });
    });
</script>
@endpush