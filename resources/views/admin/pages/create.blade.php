@extends('admin.layouts.app')

@section('title', 'افزودن صفحه جدید')
@section('page-title', 'ایجاد صفحه جدید')

@section('content')
<div class="card">
    <form action="{{ route('admin.pages.store') }}" method="POST">
        @include('admin.pages.form', ['page' => null])
    </form>
</div>
@endsection