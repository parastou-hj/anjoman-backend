@extends('admin.layouts.app')

@section('title', 'مدیریت اسلایدرها')
@section('page-title', 'مدیریت اسلایدرها')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 class="card-title" style="margin: 0;">لیست اسلایدرها</h2>
        <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">+ افزودن اسلایدر</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>شناسه</th>
                <th>تصویر</th>
                <th>عنوان</th>
                <th>ترتیب</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sliders as $slider)
            <tr>
                <td>{{ $slider->id }}</td>
                <td><img src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->title }}"></td>
                <td>{{ $slider->title }}</td>
                <td>{{ $slider->order }}</td>
                <td>
                    <span style="color: {{ $slider->is_active ? 'green' : 'red' }}">
                        {{ $slider->is_active ? 'فعال' : 'غیرفعال' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-primary btn-sm">ویرایش</a>
                    <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center;">هیچ اسلایدری یافت نشد</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection