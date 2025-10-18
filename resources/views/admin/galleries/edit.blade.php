@extends('admin.layouts.app')

@section('title', 'ویرایش تصویر')
@section('page-title', 'ویرایش تصویر گالری')

@section('content')
<div class="card">
    <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>تصویر فعلی:</label><br>
            <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->alt }}" style="max-width: 300px; max-height: 200px; border-radius: 8px; margin-bottom: 10px; object-fit: cover;">
        </div>

        <div class="form-group">
            <label>تصویر جدید (اختیاری)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            @error('image')<span style="color: red;">{{ $message }}</span>@enderror
            <small style="color: #666;">فرمت‌های مجاز: JPG, PNG, GIF - حداکثر 2MB</small>
        </div>

        <div class="form-group">
            <label>Alt متن (برای SEO)</label>
            <input type="text" name="alt" class="form-control" value="{{ old('alt', $gallery->alt) }}" placeholder="توضیح کوتاه تصویر برای موتورهای جستجو">
            @error('alt')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>توضیحات تصویر</label>
            <textarea name="description" class="form-control" rows="4" placeholder="توضیحات کاملی از تصویر که در مودال نمایش داده می‌شود...">{{ old('description', $gallery->description) }}</textarea>
            @error('description')<span style="color: red;">{{ $message }}</span>@enderror
            <small style="color: #666;">این متن هنگام کلیک روی تصویر در مودال نمایش داده می‌شود</small>
        </div>

        <div class="form-group">
            <label>ترتیب نمایش *</label>
            <input type="number" name="order" class="form-control" value="{{ old('order', $gallery->order) }}" required>
            @error('order')<span style="color: red;">{{ $message }}</span>@enderror
            <small style="color: #666;">عدد کمتر = نمایش زودتر</small>
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $gallery->is_active) ? 'checked' : '' }}>
                نمایش در گالری
            </label>
        </div>

        <button type="submit" class="btn btn-success">بروزرسانی</button>
        <a href="{{ route('admin.galleries.index') }}" class="btn btn-danger">انصراف</a>
    </form>
</div>
@endsection