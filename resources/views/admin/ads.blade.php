@extends('admin.layout.layout')
@section('title', 'Ads Management')
@section('content')
    <div class="container p-4">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h2>Ads List</h2>
            <a href="{{ route('create.ads') }}" class="btn btn-primary">Create Ad</a>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ads as $ad)
                    <tr>
                        <td>{{ $ad->id }}</td>
                        <td>
                            <a href="{{ $ad->link }}">
                                <img style="width: 60px;" src="{{ $ad->image }}" alt="">
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('delete.ads', $ad->id) }}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
