@extends('admin.layouts.app')

@section('title', 'مدیریت اخبار')
@section('page-title', 'مدیریت اخبار سایت')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 class="card-title" style="margin: 0;">لیست اخبار</h2>
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">+ افزودن خبر</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>شناسه</th>
                <th>تصویر</th>
                <th>عنوان</th>
                <th>تاریخ انتشار</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($newsItems as $news)
                <tr>
                    <td>{{ $news->id }}</td>
                    <td>
                        @if($news->image)
                            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" style="width: 80px; height: 80px; object-fit: cover; border-radius: 6px;">
                        @else
                            <span class="text-muted">بدون تصویر</span>
                        @endif
                    </td>
                    <td>{{ \Illuminate\Support\Str::limit($news->title, 40) }}</td>
                    <td>{{ \Morilog\Jalali\Jalalian::fromDateTime($news->published_at)->format('Y/m/d') }}</td>
                    <td>
                        <span style="color: {{ $news->is_active ? 'green' : 'red' }}">
                            {{ $news->is_active ? 'فعال' : 'غیرفعال' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.news.edit', $news) }}" class="btn btn-primary btn-sm">ویرایش</a>
                        <form action="{{ route('admin.news.destroy', $news) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">هیچ خبری ثبت نشده است</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection