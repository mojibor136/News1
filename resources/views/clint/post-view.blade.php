@extends('clint.layout.layout')
@section('title', 'View Post')
@section('content')
    <div class="p-4">
        <div class="d-flex justify-content-between align-items-center">
            <h4>{{ Str::limit($posts->title, 50, '...') }}</h4>
            <a href="{{ route('clint.all.post') }}" class="btn btn-secondary">Back</a>
        </div>
        <div class="pt-4">
            <img width="100%" src="{{ asset('storage/' . $posts->image) }}" alt="">
        </div>
        <div class="pt-4">
            {!! $posts->description !!}
        </div>
    </div>
@endsection
