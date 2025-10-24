@extends('admin.layouts.app')

@section('title', 'مدیریت بخش خوشامدگویی')
@section('page-title', 'مدیریت بخش خوشامدگویی')

@section('content')
<div class="card">
    <h2 class="card-title">تنظیم متن خوشامدگویی صفحه اصلی</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.welcome.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">عنوان</label>
            <input type="text" id="title" name="title" value="{{ old('title', optional($welcome)->title) }}" class="form-control" required>
            @error('title')
                <div class="alert alert-danger" style="margin-top:10px;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="content">متن خوشامدگویی</label>
            <textarea id="content" name="content" rows="5" class="form-control" required>{{ old('content', optional($welcome)->content) }}</textarea>
            @error('content')
                <div class="alert alert-danger" style="margin-top:10px;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
    </form>
</div>
@endsection