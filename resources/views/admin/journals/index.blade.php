@extends('admin.layouts.app')

@section('title', 'مدیریت نشریات')
@section('page-title', 'مدیریت نشریات')

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 class="card-title" style="margin: 0;">لیست نشریات</h2>
        <a href="{{ route('admin.journals.create') }}" class="btn btn-primary">+ افزودن نشریه</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>شناسه</th>
                <th>تصویر</th>
                <th>عنوان</th>
                <th>برچسب</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($journals as $journal)
            <tr>
                <td>{{ $journal->id }}</td>
                <td><img src="{{ asset('storage/' . $journal->image) }}" alt="{{ $journal->title }}"></td>
                <td>{{ $journal->title }}</td>
                <td>
                    <span class="tag">{{ $journal->tag }}</span>
                </td>
                <td>
                    <span style="color: {{ $journal->is_active ? 'green' : 'red' }}">
                        {{ $journal->is_active ? 'فعال' : 'غیرفعال' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.journals.edit', $journal) }}" class="btn btn-primary btn-sm">ویرایش</a>
                    <form action="{{ route('admin.journals.destroy', $journal) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center;">هیچ نشریه‌ای یافت نشد</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection