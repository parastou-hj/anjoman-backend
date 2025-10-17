@extends('admin.layouts.app')

@section('title', 'ویرایش اسلایدر')
@section('page-title', 'ویرایش اسلایدر')

@section('content')
<div class="card">
    <form action="{{ route('admin.sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>عنوان *</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $slider->title) }}" required>
            @error('title')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>توضیحات</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description', $slider->description) }}</textarea>
            @error('description')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>تصویر فعلی:</label><br>
            <img src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->title }}" style="max-width: 200px; border-radius: 8px; margin-bottom: 10px;">
        </div>

        <div class="form-group">
            <label>تصویر جدید (اختیاری)</label>
            <input type="file" name="image" class="form-control">
            @error('image')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>ترتیب نمایش *</label>
            <input type="number" name="order" class="form-control" value="{{ old('order', $slider->order) }}" required>
            @error('order')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $slider->is_active) ? 'checked' : '' }}>
                فعال
            </label>
        </div>

        <button type="submit" class="btn btn-success">بروزرسانی</button>
        <a href="{{ route('admin.sliders.index') }}" class="btn btn-danger">انصراف</a>
    </form>
</div>
@endsection