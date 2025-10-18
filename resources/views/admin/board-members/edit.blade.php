@extends('admin.layouts.app')

@section('title', 'ویرایش عضو هیئت مدیره')
@section('page-title', 'ویرایش اطلاعات عضو هیئت مدیره')

@section('content')
<div class="card">
    <form action="{{ route('admin.board-members.update', $boardMember) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>نام و نام خانوادگی *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $boardMember->name) }}" required>
            @error('name')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>سمت در هیئت مدیره *</label>
            <input type="text" name="position" class="form-control" value="{{ old('position', $boardMember->position) }}" required>
            @error('position')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>ایمیل</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $boardMember->email) }}">
            @error('email')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>موقعیت شغلی</label>
            <input type="text" name="job_title" class="form-control" value="{{ old('job_title', $boardMember->job_title) }}">
            @error('job_title')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>رشته تخصصی</label>
            <input type="text" name="specialization" class="form-control" value="{{ old('specialization', $boardMember->specialization) }}">
            @error('specialization')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>لینک صفحه شخصی</label>
            <input type="url" name="website_url" class="form-control" value="{{ old('website_url', $boardMember->website_url) }}">
            @error('website_url')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        @if($boardMember->image)
        <div class="form-group">
            <label>تصویر فعلی:</label><br>
            <img src="{{ asset('storage/' . $boardMember->image) }}" alt="{{ $boardMember->name }}" 
                 style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px; margin-bottom: 10px;">
        </div>
        @endif

        <div class="form-group">
            <label>تصویر جدید (اختیاری)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            @error('image')<span style="color: red;">{{ $message }}</span>@enderror
            <small style="color: #666;">فرمت‌های مجاز: JPG, PNG, GIF - حداکثر 2MB</small>
        </div>

        <div class="form-group">
            <label>بیوگرافی کوتاه</label>
            <textarea name="bio" class="form-control" rows="4">{{ old('bio', $boardMember->bio) }}</textarea>
            @error('bio')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>ترتیب نمایش *</label>
            <input type="number" name="order" class="form-control" value="{{ old('order', $boardMember->order) }}" required>
            @error('order')<span style="color: red;">{{ $message }}</span>@enderror
            <small style="color: #666;">عدد کمتر = نمایش زودتر</small>
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $boardMember->is_active) ? 'checked' : '' }}>
                فعال (نمایش در صفحه عمومی)
            </label>
        </div>

        <button type="submit" class="btn btn-success">بروزرسانی</button>
        <a href="{{ route('admin.board-members.index') }}" class="btn btn-danger">انصراف</a>
    </form>
</div>
@endsection