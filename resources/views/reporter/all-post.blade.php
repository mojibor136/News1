@extends('reporter.layouts.layout')
@section('title', 'All Post')
@section('content')
    <div class="container mt-4 p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Posts</h2>
            <a href="{{ route('reporter.add.post') }}"class="btn btn-primary">Add Post</a>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Visitor</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>
                                <img width="45" src="{{ asset('storage/' . $post->image) }}" alt="">
                            </td>
                            <td>{{ Str::limit($post->title, 20) }}</td>
                            <td>{{ $post->category->name }}</td>
                            @if ($post->status === 'pending')
                                <td class="text-danger">{{ $post->status }}</td>
                            @elseif ($post->status === 'approve')
                                <td class="text-success">{{ $post->status }}</td>
                            @endif
                            <td>{{ $post->created_at->format('Y-m-d') }}</td>
                            <td>{{ $post->visitors->count() }}</td>
                            <td>
                                <a href="{{ route('reporter.view.post', $post->id) }}" class="btn btn-secondary btn-sm">
                                    <i class="ri-eye-line"></i>
                                </a>
                                <a href="{{ route('reporter.edit.post', $post->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{ route('reporter.delete.post', $post->id) }}"
                                    class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
