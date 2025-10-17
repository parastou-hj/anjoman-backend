@extends('admin.layouts.app')

@section('title', 'افزودن اسلایدر')
@section('page-title', 'افزودن اسلایدر جدید')

@section('content')
<div class="card">
    <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label>عنوان *</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            @error('title')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>توضیحات</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
            @error('description')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>تصویر *</label>
            <input type="file" name="image" class="form-control" required>
            @error('image')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>ترتیب نمایش *</label>
            <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}" required>
            @error('order')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                فعال
            </label>
        </div>

        <button type="submit" class="btn btn-success">ذخیره</button>
        <a href="{{ route('admin.sliders.index') }}" class="btn btn-danger">انصراف</a>
    </form>
</div>
@endsection