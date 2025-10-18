@extends('admin.layouts.app')

@section('title', 'افزودن نشریه')
@section('page-title', 'افزودن نشریه جدید')

@section('content')
<div class="card">
    <form action="{{ route('admin.journals.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label>عنوان نشریه *</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            @error('title')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>توضیحات</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
            @error('description')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>تصویر جلد *</label>
            <input type="file" name="image" class="form-control" required>
            @error('image')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>برچسب *</label>
            <input type="text" name="tag" class="form-control" value="{{ old('tag') }}" placeholder="مثال: علمی-پژوهشی، تخصصی، ..." required>
            @error('tag')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>لینک مشاهده</label>
            <input type="url" name="link" class="form-control" value="{{ old('link') }}" placeholder="https://example.com">
            @error('link')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                فعال
            </label>
        </div>

        <button type="submit" class="btn btn-success">ذخیره</button>
        <a href="{{ route('admin.journals.index') }}" class="btn btn-danger">انصراف</a>
    </form>
</div>
@endsection