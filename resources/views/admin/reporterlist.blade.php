@extends('admin.layout.layout')
@section('title', 'Reporter Management')
@section('content')
    <style>
        td a {
            text-transform: capitalize;
        }
    </style>
    <div class="container mt-4">

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Error Message -->
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="mb-4">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newreporter">Create Reporter</button>
        </div>
        <!-- Posts Table -->
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reporters as $reporter)
                        <tr>
                            <td>{{ $reporter->id }}</td>
                            <td>
                                <img width="45" src="{{ asset('profile/4715330.png') }}" alt="">
                            </td>
                            <td>{{ $reporter->name }}</td>
                            <td>{{ $reporter->created_at->format('Y-m-d') }}</td>
                            <td>
                                @if ($reporter->status === 'deactive')
                                    <a class="btn btn-sm btn-danger"
                                        href="{{ route('reporter.status', $reporter->id) }}">{{ $reporter->status }}</a>
                                @elseif ($reporter->status === 'active')
                                    <a class="btn btn-sm btn-success"
                                        href="{{ route('reporter.status', $reporter->id) }}">{{ $reporter->status }}</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('reporter.delete', $reporter->id) }}"
                                    class="btn btn-sm
                            btn-danger">Delete</a>
                                <a href="{{ route('reporter.edit', $reporter->id) }}"
                                    class="btn btn-sm
                            btn-warning">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <!-- Add Post Modal -->
        <div wire:ignore.self class="modal fade" id="newreporter" tabindex="-1" aria-labelledby="newreporterLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newreporterLabel">New Reporter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('reporter.create') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="postTitle" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="postTitle" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter Email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="postTitle" class="form-label">Password</label>
                                <input type="text" class="form-control" name="password" placeholder="Enter Password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Create Reporter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination Links -->
        <div class="mt-3">
            {{ $reporters->links() }}
        </div>
    </div>
@endsection
