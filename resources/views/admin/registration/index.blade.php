@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">لیست ثبت‌نام‌ها</h3>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>نام</th>
                <th>نام خانوادگی</th>
                <th>ایمیل</th>
                <th>موبایل</th>
                <th>تاریخ ثبت</th>
                <th>عملیات</th>
            </tr>
        </thead>

        <tbody>
            @foreach($items as $row)
                <tr>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->family }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->mobile }}</td>
                    <td>{{ jdate($row->created_at)->format('Y/m/d') }}</td>
                    <td>
                        <a href="{{ route('admin.registrations.show', $row->id) }}" class="btn btn-sm btn-primary">
                            مشاهده
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $items->links() }}
</div>
@endsection
