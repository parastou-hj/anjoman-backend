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
            <label>متن خبر *</label>
            <textarea name="content" class="form-control" rows="6" required>{{ old('content') }}</textarea>
            @error('content')<span style="color: red;">{{ $message }}</span>@enderror
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