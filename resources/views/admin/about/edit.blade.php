@extends('admin.layouts.app')

@section('title', 'مدیریت بخش درباره انجمن')
@section('page-title', 'مدیریت بخش درباره انجمن')

@section('content')
<div class="card">
    <h2 class="card-title">تنظیم متن درباره انجمن</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.about.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">عنوان اصلی</label>
            <input type="text" id="title" name="title" value="{{ old('title', optional($about)->title) }}" class="form-control" required>
            @error('title')
                <div class="alert alert-danger" style="margin-top:10px;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="lead">متن معرفی</label>
            <textarea id="lead" name="lead" rows="4" class="form-control" required>{{ old('lead', optional($about)->lead) }}</textarea>
            @error('lead')
                <div class="alert alert-danger" style="margin-top:10px;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>برجسته‌ها</label>
            <div class="grid" style="display:grid; gap:12px; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr));">
                <input type="text" name="highlight_one" placeholder="برجسته اول" value="{{ old('highlight_one', optional($about)->highlight_one) }}" class="form-control">
                <input type="text" name="highlight_two" placeholder="برجسته دوم" value="{{ old('highlight_two', optional($about)->highlight_two) }}" class="form-control">
                <input type="text" name="highlight_three" placeholder="برجسته سوم" value="{{ old('highlight_three', optional($about)->highlight_three) }}" class="form-control">
            </div>
            @error('highlight_one')
                <div class="alert alert-danger" style="margin-top:10px;">{{ $message }}</div>
            @enderror
            @error('highlight_two')
                <div class="alert alert-danger" style="margin-top:10px;">{{ $message }}</div>
            @enderror
            @error('highlight_three')
                <div class="alert alert-danger" style="margin-top:10px;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="mission_title">عنوان ماموریت/چشم‌انداز</label>
            <input type="text" id="mission_title" name="mission_title" value="{{ old('mission_title', optional($about)->mission_title) }}" class="form-control">
            @error('mission_title')
                <div class="alert alert-danger" style="margin-top:10px;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="mission_description">توضیحات ماموریت/چشم‌انداز</label>
            <textarea id="mission_description" name="mission_description" rows="3" class="form-control">{{ old('mission_description', optional($about)->mission_description) }}</textarea>
            @error('mission_description')
                <div class="alert alert-danger" style="margin-top:10px;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
    </form>
</div>
@endsection