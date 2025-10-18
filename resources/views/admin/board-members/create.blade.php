@extends('admin.layouts.app')

@section('title', 'افزودن عضو هیئت مدیره')
@section('page-title', 'افزودن عضو جدید به هیئت مدیره')

@section('content')
<div class="card">
    <form action="{{ route('admin.board-members.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label>نام و نام خانوادگی *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required 
                   placeholder="">
            @error('name')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>سمت در هیئت مدیره *</label>
            <input type="text" name="position" class="form-control" value="{{ old('position') }}" required 
                   placeholder="مثال: عضو هیئت مدیره، رئیس هیئت مدیره، نایب رئیس">
            @error('position')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>ایمیل</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" 
                   placeholder="">
            @error('email')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>موقعیت شغلی</label>
            <input type="text" name="job_title" class="form-control" value="{{ old('job_title') }}" 
                   placeholder="">
            @error('job_title')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>رشته تخصصی</label>
            <input type="text" name="specialization" class="form-control" value="{{ old('specialization') }}" 
                   placeholder="">
            @error('specialization')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>لینک صفحه شخصی</label>
            <input type="url" name="website_url" class="form-control" value="{{ old('website_url') }}" 
                   placeholder="">
            @error('website_url')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>تصویر</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            @error('image')<span style="color: red;">{{ $message }}</span>@enderror
            <small style="color: #666;">فرمت‌های مجاز: JPG, PNG, GIF - حداکثر 2MB - بهتر است تصویر مربع باشد</small>
        </div>

        <div class="form-group">
            <label>بیوگرافی کوتاه</label>
            <textarea name="bio" class="form-control" rows="4" placeholder="معرفی کوتاه از فعالیت‌ها و تخصص‌های عضو...">{{ old('bio') }}</textarea>
            @error('bio')<span style="color: red;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label>ترتیب نمایش *</label>
            <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}" required>
            @error('order')<span style="color: red;">{{ $message }}</span>@enderror
            <small style="color: #666;">عدد کمتر = نمایش زودتر (مثال: رئیس=1، نایب رئیس=2، ...)</small>
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                فعال (نمایش در صفحه عمومی)
            </label>
        </div>

        <button type="submit" class="btn btn-success">افزودن عضو</button>
        <a href="{{ route('admin.board-members.index') }}" class="btn btn-danger">انصراف</a>
    </form>
</div>

<div class="card" style="margin-top: 20px;">
    <h3>نکات مهم:</h3>
    <ul style="margin: 10px 0; padding-right: 20px;">
        <li>فیلدهای با علامت * اجباری هستند</li>
        <li>تصویر بهتر است با ابعاد مربع و کیفیت مناسب انتخاب شود</li>
        <li>لینک صفحه شخصی باید شامل پروتکل باشد (http:// یا https://)</li>
        <li>ترتیب نمایش به صورت صعودی است (1، 2، 3، ...)</li>
    </ul>
</div>
@endsection