@extends('admin.layouts.app')

@section('title', 'مدیریت صفحات داخلی')
@section('page-title', 'مدیریت صفحات داخلی')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 class="card-title" style="margin: 0;">لیست صفحات</h2>
        <a href="{{ route('admin.pages.create') }}" class="btn btn-success">افزودن صفحه جدید</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul style="margin: 0; padding-right: 18px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>عنوان</th>
                    <th>لینک</th>
                    <th>وضعیت</th>
                    <th>آخرین بروزرسانی</th>
                    <th>اقدامات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pages as $page)
                    <tr>
                        <td>{{ $page->title }}</td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <code style="background: #f1f5f9; padding: 6px 10px; border-radius: 6px; display: inline-block;">{{ url('/pages/' . $page->slug) }}</code>
                                <button class="btn btn-sm btn-primary copy-link" data-link="{{ url('/pages/' . $page->slug) }}">کپی</button>
                                @if($page->is_published)
                                    <a href="{{ route('pages.show', $page->slug) }}" target="_blank" class="btn btn-sm btn-success">مشاهده</a>
                                @endif
                            </div>
                        </td>
                        <td>
                            @if($page->is_published)
                                <span class="tag" style="background:#e1f6ef; color:#246b5f;">منتشر شده</span>
                            @else
                                <span class="tag" style="background:#fdecea; color:#c0392b;">پیش‌نویس</span>
                            @endif
                        </td>
                     
                 
                        <td style="display:flex; gap:8px;">
                            <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-sm btn-primary">ویرایش</a>
                            <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" onsubmit="return confirm('آیا از حذف این صفحه اطمینان دارید؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 20px;">هنوز صفحه‌ای ایجاد نشده است.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.copy-link').forEach(function(button) {
            button.addEventListener('click', function () {
                const link = this.getAttribute('data-link');
                navigator.clipboard.writeText(link).then(() => {
                    this.textContent = 'کپی شد!';
                    setTimeout(() => this.textContent = 'کپی', 1500);
                });
            });
        });
    });
</script>
@endpush