@extends('layouts.main')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endpush
@section('content')
<div class="container">
<option>حقوقی</option>
</select>
</div>


<div class="col-md-4 mb-3">
<label class="form-label">نام <span class="required">*</span></label>
<input class="form-control">
</div>


<div class="col-md-4 mb-3">
<label class="form-label">نام خانوادگی <span class="required">*</span></label>
<input class="form-control">
</div>


<div class="col-md-4 mb-3">
<label class="form-label">تحصیلات <span class="required">*</span></label>
<select class="form-select">
<option>دیپلم</option>
<option>لیسانس</option>
<option>فوق لیسانس</option>
</select>
</div>


<div class="col-md-4 mb-3">
<label class="form-label">رتبه علمی <span class="required">*</span></label>
<select class="form-select">
<option>بدون رتبه</option>
<option>رتبه 1</option>
</select>
</div>


<div class="col-md-4 mb-3">
<label class="form-label">شماره تلفن <span class="required">*</span></label>
<input class="form-control">
</div>


<div class="col-md-4 mb-3">
<label class="form-label">تلفن همراه <span class="required">*</span></label>
<input class="form-control">
</div>


<div class="col-md-4 mb-3">
<label class="form-label">شهر <span class="required">*</span></label>
<input class="form-control">
</div>


<div class="col-md-8 mb-3">
<label class="form-label">نشانی پستی <span class="required">*</span></label>
<textarea class="form-control" rows="3"></textarea>
</div>


<div class="col-md-12 mb-3">
<label class="form-label">وابستگی سازمانی <span class="required">*</span></label>
<textarea class="form-control" rows="3"></textarea>
</div>


</div>
</form>
</div>
</div>
</div>


</div>
</div>
</div>
@endsection