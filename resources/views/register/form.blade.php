@extends('layouts.main')
@section('content')
<div class="container">
<h3 class="mb-3">فرم ثبت‌نام</h3>


@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif


{{-- <form method="POST" action="{{ route('register.store') }}"> --}}
@csrf



<input class="form-control mb-2" name="email" placeholder="ایمیل" />
<input class="form-control mb-2" name="email_confirmation" placeholder="تکرار ایمیل" />


<input class="form-control mb-2" name="username" placeholder="نام کاربری" />
<input class="form-control mb-2" name="name" placeholder="نام" />
<input class="form-control mb-2" name="family" placeholder="نام خانوادگی" />


<input class="form-control mb-2" name="education" placeholder="تحصیلات" />
<input class="form-control mb-2" name="rank" placeholder="رتبه علمی" />


<input class="form-control mb-2" name="phone" placeholder="شماره تلفن" />
<input class="form-control mb-2" name="mobile" placeholder="تلفن همراه" />
<input class="form-control mb-2" name="city" placeholder="شهر" />


<textarea class="form-control mb-2" name="address" placeholder="نشانی پستی"></textarea>
<textarea class="form-control mb-2" name="organization" placeholder="وابستگی سازمانی"></textarea>


<button class="btn btn-success w-100">ثبت</button>
</form>
</div>
@endsection