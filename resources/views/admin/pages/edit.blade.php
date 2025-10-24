@extends('admin.layouts.app')

@section('title', 'ویرایش صفحه')
@section('page-title', 'ویرایش صفحه')

@section('content')
<div class="card">
    <form action="{{ route('admin.pages.update', $page) }}" method="POST">
        @method('PUT')
        @include('admin.pages.form', ['page' => $page])
    </form>
</div>
@endsection