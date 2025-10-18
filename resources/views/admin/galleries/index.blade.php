@extends('admin.layouts.app')

@section('title', 'مدیریت گالری')
@section('page-title', 'مدیریت گالری تصاویر')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 class="card-title" style="margin: 0;">گالری تصاویر</h2>
        <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">+ افزودن تصویر</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>شناسه</th>
                <th>تصویر</th>
                <th>Alt متن</th>
                <th>توضیحات</th>
                <th>ترتیب</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($galleries as $gallery)
            <tr>
                <td>{{ $gallery->id }}</td>
                <td>
                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->alt }}" style="width: 80px; height: 80px; object-fit: cover; border-radius: 6px;">
                </td>
                <td>{{ Str::limit($gallery->alt ?? 'بدون Alt', 20) }}</td>
                <td>{{ Str::limit($gallery->description ?? 'بدون توضیح', 30) }}</td>
                <td>{{ $gallery->order }}</td>
                <td>
                    <span style="color: {{ $gallery->is_active ? 'green' : 'red' }}">
                        {{ $gallery->is_active ? 'فعال' : 'غیرفعال' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-primary btn-sm">ویرایش</a>
                    <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center;">هیچ تصویری در گالری یافت نشد</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection