@extends('admin.layouts.app')

@section('title', 'ویرایش نشریه')
@section('page-title', 'ویرایش نشریه')

@section('content')
<div class="card">
    <form action="{{ route('admin.journals.update', $journal) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>عنوان نشریه *</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $journal->title) }}" required>
            @error('title')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>توضیحات</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description', $journal->description) }}</textarea>
            @error('description')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>تصویر جلد فعلی:</label><br>
            <img src="{{ asset('storage/' . $journal->image) }}" alt="{{ $journal->title }}" style="max-width: 200px; border-radius: 8px; margin-bottom: 10px;">
        </div>

        <div class="form-group">
            <label>تصویر جلد جدید (اختیاری)</label>
            <input type="file" name="image" class="form-control">
            @error('image')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>برچسب *</label>
            <input type="text" name="tag" class="form-control" value="{{ old('tag', $journal->tag) }}" placeholder="مثال: علمی-پژوهشی، تخصصی، ..." required>
            @error('tag')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>لینک مشاهده</label>
            <input type="url" name="link" class="form-control" value="{{ old('link', $journal->link) }}" placeholder="https://example.com">
            @error('link')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $journal->is_active) ? 'checked' : '' }}>
                فعال
            </label>
        </div>

        <button type="submit" class="btn btn-success">بروزرسانی</button>
        <a href="{{ route('admin.journals.index') }}" class="btn btn-danger">انصراف</a>
    </form>
</div>
@endsection