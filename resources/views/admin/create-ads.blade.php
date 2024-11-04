@extends('admin.layout.layout')
@section('title', 'Ads Create')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h2>Create Ads</h2>
            <a href="{{ route('ads') }}" class="btn btn-primary">List Ads</a>
        </div>
        <form action="{{ route('store.ads') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group my-2">
                <label for="link" class="mb-1">Link</label>
                <input name="link" type="text" id="link" class="form-control" placeholder="Enter ads link">
            </div>

            <div class="form-group my-2">
                <label for="Image" class="mb-1">Image</label>
                <input name="image" class="form-control" type="file" id="Image">
            </div>

            <button type="submit" class="btn btn-primary mt-2">Create</button>
        </form>
    </div>
@endsection
