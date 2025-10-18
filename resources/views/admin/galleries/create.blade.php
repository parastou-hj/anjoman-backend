@extends('admin.layouts.app')

@section('title', 'افزودن تصویر')
@section('page-title', 'افزودن تصویر جدید به گالری')

@section('content')
<div class="card">
    <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label>تصویر *</label>
            <input type="file" name="image" class="form-control" required accept="image/*">
            @error('image')<span style="color: red;">{{ $message }}</span>@enderror
            <small style="color: #666;">فرمت‌های مجاز: JPG, PNG, GIF - حداکثر 2MB</small>
        </div>

        <div class="form-group">
            <label>Alt متن (برای SEO)</label>
            <input type="text" name="alt" class="form-control" value="{{ old('alt') }}" placeholder="توضیح کوتاه تصویر برای موتورهای جستجو">
            @error('alt')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>توضیحات تصویر</label>
            <textarea name="description" class="form-control" rows="4" placeholder="توضیحات کاملی از تصویر که در مودال نمایش داده می‌شود...">{{ old('description') }}</textarea>
            @error('description')<span style="color: red;">{{ $message }}</span>@enderror
            <small style="color: #666;">این متن هنگام کلیک روی تصویر در مودال نمایش داده می‌شود</small>
        </div>

        <div class="form-group">
            <label>ترتیب نمایش *</label>
            <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}" required>
            @error('order')<span style="color: red;">{{ $message }}</span>@enderror
            <small style="color: #666;">عدد کمتر = نمایش زودتر</small>
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                نمایش در گالری
            </label>
        </div>

        <button type="submit" class="btn btn-success">افزودن به گالری</button>
        <a href="{{ route('admin.galleries.index') }}" class="btn btn-danger">انصراف</a>
    </form>
</div>
@endsection