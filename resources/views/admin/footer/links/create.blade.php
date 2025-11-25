@extends('admin.layouts.app')

@section('title', 'ایجاد پیوند فوتر')
@section('page-title', 'افزودن پیوند سریع جدید')

@section('content')
    <div class="card">
        <h2 class="card-title">جزئیات پیوند</h2>

        <form method="POST" action="{{ route('admin.footer-links.store') }}">
            @csrf

            <div class="form-group">
                <label for="title">عنوان پیوند</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
                @error('title')
                    <div class="alert alert-danger" style="margin-top:8px">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="page_id">انتخاب صفحه داخلی</label>
                <select id="page_id" name="page_id" class="form-control">
                    <option value="">-- انتخاب کنید --</option>
                    @foreach($pages as $page)
                        <option value="{{ $page->id }}" @selected(old('page_id') == $page->id)>{{ $page->title }}</option>
                    @endforeach
                </select>
                @error('page_id')
                    <div class="alert alert-danger" style="margin-top:8px">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="order">ترتیب نمایش</label>
                <input type="number" id="order" name="order" class="form-control" min="0" value="{{ old('order', 0) }}">
                @error('order')
                    <div class="alert alert-danger" style="margin-top:8px">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" style="display:flex; align-items:center; gap:8px">
                <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                <label for="is_active" style="margin:0">فعال باشد</label>
            </div>

            <div style="display:flex; gap:12px; flex-wrap:wrap">
                <button type="submit" class="btn btn-primary">ثبت پیوند</button>
                <a href="{{ route('admin.footer-links.index') }}" class="btn btn-danger">انصراف</a>
            </div>
        </form>
    </div>
@endsection