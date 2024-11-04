@extends('admin.layout.layout')
@section('title', 'All Post')
@section('content')
    <style>
        form {
            width: 450px;
        }

        .main-card {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
    </style>
    <div class="p-4 main-card">
        <form action="{{ route('reporter.update') }}" method="post" class="p-4 card">
            @csrf
            <div class="mb-3" style="text-align: center">
                <h3>Reporter Update</h3>
            </div>
            <input type="hidden" name="id" value="{{ $reporter->id }}">
            <div class="form-group mb-4">
                <input class="form-control" type="text" value="{{ $reporter->name }}" name="name">
            </div>
            <div class="form-group mb-4">
                <input class="form-control" type="text" value="{{ $reporter->email }}" name="email">
            </div>
            <div class="form-group mb-4">
                <input class="form-control" type="text" placeholder="Enter New Password" name="password">
            </div>
            <div class="form-group mb-4">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
@endsection
