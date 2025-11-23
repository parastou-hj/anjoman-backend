@extends('admin.layouts.master')

@section('content')
<div class="container">
    <h3 class="mb-3">جزئیات ثبت‌نام</h3>

    <div class="card p-3">
        <p><strong>نام: </strong>{{ $item->name }}</p>
        <p><strong>نام خانوادگی:</strong> {{ $item->family }}</p>
        <p><strong>ایمیل:</strong> {{ $item->email }}</p>
        <p><strong>نام کاربری:</strong> {{ $item->username }}</p>
        <p><strong>تحصیلات:</strong> {{ $item->education }}</p>
        <p><strong>رتبه علمی:</strong> {{ $item->rank }}</p>
        <p><strong>تلفن:</strong> {{ $item->phone }}</p>
        <p><strong>موبایل:</strong> {{ $item->mobile }}</p>
        <p><strong>شهر:</strong> {{ $item->city }}</p>
        <p><strong>نشانی پستی:</strong> {{ $item->address }}</p>
        <p><strong>وابستگی سازمانی:</strong> {{ $item->organization }}</p>
        <p><strong>تاریخ ثبت:</strong> {{ jdate($item->created_at)->format('Y/m/d') }}</p>
    </div>

    <a href="{{ route('admin.registrations.index') }}" class="btn btn-secondary mt-3">بازگشت</a>
</div>
@endsection
