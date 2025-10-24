@extends('admin.layouts.app')

@section('title', 'افزودن منو')
@section('page-title', 'افزودن منوی جدید')

@section('content')
<div class="card">
    <form action="{{ route('admin.menus.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label>عنوان منو *</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required placeholder="مثال: خانه، درباره ما، تماس با ما">
            @error('title')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>لینک منو</label>
            <input type="text" name="url" class="form-control" value="{{ old('url') }}" placeholder="مثال: /about، https://example.com، #contact">
            @error('url')<span style="color: red;">{{ $message }}</span>@enderror
            <small style="color: #666;">
                می‌توانید از لینک‌های داخلی (/about) یا خارجی (https://...) یا anchor (#section) استفاده کنید.<br>
                برای منوهای والد که فقط زیرمنو دارند، می‌توانید خالی بگذارید.
            </small>
        </div>
         @if($pages->count())
        <div class="form-group">
            <label>یا انتخاب از صفحات داخلی</label>
            <select id="page-selector" class="form-control">
                <option value="">-- انتخاب صفحه --</option>
                @foreach($pages as $page)
                    <option value="{{ '/pages/' . $page->slug }}">
                        {{ $page->title }}{{ $page->is_published ? '' : ' (پیش‌نویس)' }}
                    </option>
                @endforeach
            </select>
            <small style="color: #666;">با انتخاب صفحه، لینک آن به صورت خودکار در فیلد بالا قرار می‌گیرد.</small>
        </div>
        @endif


        <div class="form-group">
            <label>نحوه باز شدن لینک *</label>
            <select name="target" class="form-control" required>
                <option value="_self" {{ old('target', '_self') === '_self' ? 'selected' : '' }}>همین صفحه (_self)</option>
                <option value="_blank" {{ old('target') === '_blank' ? 'selected' : '' }}>صفحه جدید (_blank)</option>
            </select>
            @error('target')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>منوی والد</label>
            <select name="parent_id" class="form-control">
                <option value="">منوی اصلی (بدون والد)</option>
                @foreach($parentMenus as $parentMenu)
                    <option value="{{ $parentMenu->id }}" {{ old('parent_id') == $parentMenu->id ? 'selected' : '' }}>
                        {{ $parentMenu->title }}
                    </option>
                @endforeach
            </select>
            @error('parent_id')<span style="color: red;">{{ $message }}</span>@enderror
            <small style="color: #666;">اگر این منو زیرمجموعه منوی دیگری است، آن را انتخاب کنید.</small>
        </div>

        <div class="form-group">
            <label>ترتیب نمایش *</label>
            <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}" required>
            @error('order')<span style="color: red;">{{ $message }}</span>@enderror
            <small style="color: #666;">عدد کمتر = نمایش زودتر (مثال: 1، 2، 3، ...)</small>
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                فعال (نمایش در منو)
            </label>
        </div>

        <button type="submit" class="btn btn-success">ایجاد منو</button>
        <a href="{{ route('admin.menus.index') }}" class="btn btn-danger">انصراف</a>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selector = document.getElementById('page-selector');
        const urlInput = document.querySelector('input[name="url"]');

        if (selector && urlInput) {
            selector.addEventListener('change', function () {
                if (this.value) {
                    urlInput.value = this.value;
                }
            });
        }
    });
</script>
@endpush