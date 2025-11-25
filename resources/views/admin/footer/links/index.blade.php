@extends('admin.layouts.app')

@section('title', 'پیوندهای سریع فوتر')
@section('page-title', 'مدیریت پیوندهای سریع')

@section('content')
    <div class="card">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px; gap:12px; flex-wrap:wrap">
            <h2 class="card-title" style="margin:0">لیست پیوندها</h2>
            <a class="btn btn-success" href="{{ route('admin.footer-links.create') }}">➕ افزودن پیوند جدید</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table>
                <thead>
                <tr>
                    <th>عنوان</th>
                    <th>صفحه مقصد</th>
                    <th>ترتیب نمایش</th>
                    <th>وضعیت</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @forelse($links as $link)
                    <tr>
                        <td>{{ $link->title }}</td>
                        <td>{{ $link->page?->title ?? 'بدون صفحه' }}</td>
                        <td>{{ $link->order }}</td>
                        <td>
                            <span class="tag" style="background:{{ $link->is_active ? '#e9fff7' : '#fdeaea' }}; color:{{ $link->is_active ? '#1b6b52' : '#b42318' }}">
                                {{ $link->is_active ? 'فعال' : 'غیرفعال' }}
                            </span>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.footer-links.edit', $link) }}">ویرایش</a>
                            <form action="{{ route('admin.footer-links.destroy', $link) }}" method="POST" style="display:inline-block" onsubmit="return confirm('حذف شود؟')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5">هیچ پیوندی ثبت نشده است.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection