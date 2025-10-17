@extends('admin.layouts.app')

@section('title', 'داشبورد')
@section('page-title', 'داشبورد')

@section('content')
<div class="stats-grid">
    <div class="stat-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <h3>{{ $stats['sliders'] }}</h3>
        <p>اسلایدر</p>
    </div>
    <div class="stat-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
        <h3>{{ $stats['journals'] }}</h3>
        <p>نشریه</p>
    </div>
    <div class="stat-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
        <h3>{{ $stats['galleries'] }}</h3>
        <p>تصویر گالری</p>
    </div>
    <div class="stat-card" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
        <h3>{{ $stats['news'] }}</h3>
        <p>خبر</p>
    </div>
    <div class="stat-card" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
        <h3>{{ $stats['messages'] }}</h3>
        <p>پیام خوانده نشده</p>
    </div>
</div>

<div class="card">
    <h2 class="card-title">خوش آمدید به پنل مدیریت</h2>
    <p>از منوی سمت راست می‌توانید بخش‌های مختلف را مدیریت کنید.</p>
</div>
@endsection