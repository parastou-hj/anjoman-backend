@extends('admin.layouts.app')

@section('title', 'تغییر رمز عبور')
@section('page-title', 'تغییر رمز عبور')

@section('content')
    <div class="card">
        <h2 class="card-title">به‌روزرسانی رمز عبور</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin-right: 16px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.password.update') }}" style="max-width: 500px;">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="current_password">رمز عبور فعلی</label>
                <input type="password" id="current_password" name="current_password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">رمز عبور جدید</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">تایید رمز عبور جدید</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">ثبت تغییرات</button>
        </form>
    </div>
@endsection