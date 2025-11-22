@extends('layouts.main')

@section('title',  $page->title ) 
@section('content')
<div class="mt-5">
    <article class="page-card">
        <h1>{{ $page->title }}</h1>
     
        <div class="page-content">
            {!! $page->content !!}
        </div>
    </article>
</div>

@endsection