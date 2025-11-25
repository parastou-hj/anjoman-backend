@extends('admin.layouts.app')

@section('title', 'مدیریت فوتر')
@section('page-title', 'تنظیمات اطلاعات تماس فوتر')

@section('content')
    <div class="card">
        <h2 class="card-title">اطلاعات تماس و آدرس</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.footer.update') }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="address">آدرس</label>
                <textarea id="address" name="address" class="form-control" rows="3">{{ old('address', $footer->address ?? '') }}</textarea>
                @error('address')
                    <div class="alert alert-danger" style="margin-top:8px">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">شماره تماس</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $footer->phone ?? '') }}">
                @error('phone')
                    <div class="alert alert-danger" style="margin-top:8px">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">ایمیل</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $footer->email ?? '') }}">
                @error('email')
                    <div class="alert alert-danger" style="margin-top:8px">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
        </form>
    </div>
@endsection