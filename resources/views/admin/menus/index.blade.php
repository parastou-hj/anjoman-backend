@extends('admin.layouts.app')

@section('title', 'مدیریت منوها')
@section('page-title', 'منوساز و مدیریت منوها')

@push('styles')
<style>
    .menu-hierarchy {
        margin-right: 20px;
        border-right: 2px solid #e0e0e0;
        padding-right: 10px;
    }
    .parent-menu {
        background: #f8f9fa;
        font-weight: bold;
    }
    .child-menu {
        background: #fff;
        border-right: 3px solid #0f3460;
    }
    .status-toggle {
        cursor: pointer;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
    }
    .status-active {
        background: #d4edda;
        color: #155724;
    }
    .status-inactive {
        background: #f8d7da;
        color: #721c24;
    }
</style>
@endpush

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 class="card-title" style="margin: 0;">مدیریت منوهای سایت</h2>
        <a href="{{ route('admin.menus.create') }}" class="btn btn-primary">+ افزودن منو</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>شناسه</th>
                <th>عنوان منو</th>
                <th>لینک</th>
                <th>والد</th>
                <th>ترتیب</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($menus as $menu)
            <tr class="{{ $menu->parent_id ? 'child-menu' : 'parent-menu' }}">
                <td>{{ $menu->id }}</td>
                <td>
                    @if($menu->parent_id)
                        <span style="margin-right: 20px;">└─</span>
                    @endif
                    {{ $menu->title }}
                </td>
                <td>
                    @if($menu->url)
                        <a href="{{ $menu->url }}" target="{{ $menu->target }}" 
                           style="color: #0f3460; text-decoration: none;">
                            {{ Str::limit($menu->url, 40) }}
                            @if($menu->target === '_blank')
                                <span style="font-size: 12px;">↗</span>
                            @endif
                        </a>
                    @else
                        <span style="color: #666;">بدون لینک</span>
                    @endif
                </td>
                <td>
                    @if($menu->parent)
                        <span style="color: #666;">{{ $menu->parent->title }}</span>
                    @else
                        <strong>منوی اصلی</strong>
                    @endif
                </td>
                <td>{{ $menu->order }}</td>
                <td>
                    <span class="status-toggle {{ $menu->is_active ? 'status-active' : 'status-inactive' }}"
                          data-id="{{ $menu->id }}"
                          onclick="toggleStatus({{ $menu->id }})">
                        {{ $menu->is_active ? 'فعال' : 'غیرفعال' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.menus.edit', $menu) }}" class="btn btn-primary btn-sm">ویرایش</a>
                    <form action="{{ route('admin.menus.destroy', $menu) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" 
                                onclick="return confirm('آیا مطمئن هستید؟{{ $menu->children->count() > 0 ? '\n\nتوجه: این منو دارای زیرمنو است!' : '' }}')">
                            حذف
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center;">هیچ منویی یافت نشد</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="card" style="margin-top: 20px;">
    <h3>راهنما:</h3>
    <ul style="margin: 10px 0; padding-right: 20px;">
        <li><strong>منوی اصلی:</strong> منوهایی که والد ندارند و در سطح اول نمایش داده می‌شوند</li>
        <li><strong>زیرمنو:</strong> منوهایی که دارای والد هستند و در dropdown نمایش داده می‌شوند</li>
        <li><strong>ترتیب:</strong> عدد کمتر = نمایش زودتر</li>
        <li><strong>Target:</strong> _self = همین صفحه، _blank = صفحه جدید</li>
    </ul>
</div>
@endsection

@push('scripts')
<script>
function toggleStatus(menuId) {
    fetch(`/admin/menus/${menuId}/toggle`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const element = document.querySelector(`[data-id="${menuId}"]`);
            if (data.is_active) {
                element.textContent = 'فعال';
                element.className = 'status-toggle status-active';
            } else {
                element.textContent = 'غیرفعال';
                element.className = 'status-toggle status-inactive';
            }
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>
@endpush