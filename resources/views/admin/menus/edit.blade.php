@extends('admin.layouts.app')

@section('title', 'ویرایش منو')
@section('page-title', 'ویرایش منو')

@section('content')
<div class="card">
    <form action="{{ route('admin.menus.update', $menu) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>عنوان منو *</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $menu->title) }}" required>
            @error('title')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>لینک منو</label>
            <input type="text" name="url" class="form-control" value="{{ old('url', $menu->url) }}">
            @error('url')<span style="color: red;">{{ $message }}</span>@enderror
        </div>
         @if($pages->count())
        <div class="form-group">
            <label>یا انتخاب از صفحات داخلی</label>
            <select id="page-selector" class="form-control">
                <option value="">-- انتخاب صفحه --</option>
                @foreach($pages as $page)
                    <option value="{{ '/pages/' . $page->slug }}" {{ old('url', $menu->url) === '/pages/' . $page->slug ? 'selected' : '' }}>
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
                <option value="_self" {{ old('target', $menu->target) === '_self' ? 'selected' : '' }}>همین صفحه</option>
                <option value="_blank" {{ old('target', $menu->target) === '_blank' ? 'selected' : '' }}>صفحه جدید</option>
            </select>
            @error('target')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>منوی والد</label>
            <select name="parent_id" class="form-control">
                <option value="">منوی اصلی</option>
                @foreach($parentMenus as $parentMenu)
                    <option value="{{ $parentMenu->id }}" {{ old('parent_id', $menu->parent_id) == $parentMenu->id ? 'selected' : '' }}>
                        {{ $parentMenu->title }}
                    </option>
                @endforeach
            </select>
            @error('parent_id')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>ترتیب نمایش *</label>
            <input type="number" name="order" class="form-control" value="{{ old('order', $menu->order) }}" required>
            @error('order')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $menu->is_active) ? 'checked' : '' }}>
                فعال
            </label>
        </div>

        <button type="submit" class="btn btn-success">بروزرسانی</button>
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

