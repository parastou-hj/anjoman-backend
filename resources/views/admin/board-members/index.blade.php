@extends('admin.layouts.app')

@section('title', 'مدیریت هیئت مدیره')
@section('page-title', 'مدیریت اعضای هیئت مدیره')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 class="card-title" style="margin: 0;">اعضای هیئت مدیره</h2>
        <a href="{{ route('admin.board-members.create') }}" class="btn btn-primary">+ افزودن عضو</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>شناسه</th>
                <th>تصویر</th>
                <th>نام</th>
                <th>سمت</th>
                <th>موقعیت شغلی</th>
                <th>ایمیل</th>
                <th>ترتیب</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($members as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td>
                    @if($member->image)
                        <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" 
                             style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%;">
                    @else
                        <div style="width: 60px; height: 60px; background: #f0f0f0; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            👤
                        </div>
                    @endif
                </td>
                <td><strong>{{ $member->name }}</strong></td>
                <td>
                    <span class="tag">{{ $member->position }}</span>
                </td>
                <td>{{ Str::limit($member->job_title ?? 'نامشخص', 30) }}</td>
                <td>
                    @if($member->email)
                        <a href="mailto:{{ $member->email }}" style="color: #0f3460;">{{ $member->email }}</a>
                    @else
                        <span style="color: #999;">ندارد</span>
                    @endif
                </td>
                <td>{{ $member->order }}</td>
                <td>
                    <span style="color: {{ $member->is_active ? 'green' : 'red' }}">
                        {{ $member->is_active ? 'فعال' : 'غیرفعال' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.board-members.edit', $member) }}" class="btn btn-primary btn-sm">ویرایش</a>
                    <form action="{{ route('admin.board-members.destroy', $member) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" style="text-align: center;">هنوز عضوی اضافه نشده است</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="card" style="margin-top: 20px;">
    <h3>راهنما:</h3>
    <ul style="margin: 10px 0; padding-right: 20px;">
        <li><strong>ترتیب:</strong> عدد کمتر = نمایش زودتر در صفحه</li>
        <li><strong>تصویر:</strong> بهتر است تصاویر مربع و با کیفیت مناسب باشند</li>
        <li><strong>ایمیل:</strong> در صفحه عمومی به صورت لینک نمایش داده می‌شود</li>
        <li><strong>لینک وبسایت:</strong> صفحه شخصی یا پروفایل دانشگاهی عضو</li>
    </ul>
</div>
@endsection