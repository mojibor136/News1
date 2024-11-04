@extends('admin.layout.layout')
@section('title', 'Add New Post')
@section('content')
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- TinyMCE with API Key -->
    <script src="https://cdn.tiny.cloud/1/fsx8l20fj4nn5mesnxt5ddhbf0yrj7q6kz5ph1i042r9p7ub/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#product_description',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
        });
    </script>
    <div class="p-4">
        <div class="modal-content">
            <div class="modal-header">
                <h2 style="font-size:20px; padding-bottom:5px">Add New Posts</h2>
            </div>
            <div class="modal-body pt-2">
                <form action="{{ route('store.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="postImage" class="form-label">Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="postImage"
                                name="image">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="postTitle" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="postTitle"
                                name="title" placeholder="Enter post title" value="{{ old('title') }}">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="imgTitle" class="form-label">Image Title</label>
                            <input type="text" class="form-control @error('imgTitle') is-invalid @enderror"
                                id="imgTitle" name="imgTitle" placeholder="Enter img title" value="{{ old('imgTitle') }}">
                            @error('imgTitle')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="reporter" class="form-label">Reporter</label>
                            <input type="text" class="form-control @error('reporter') is-invalid @enderror"
                                id="reporter" name="reporter" placeholder="Enter reporter name"
                                value="{{ old('reporter') }}">
                            @error('reporter')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="subtitle" class="form-label">Sub Title</label>
                            <input type="text" class="form-control @error('subtitle') is-invalid @enderror"
                                id="subtitle" name="subtitle" placeholder="Enter post sub-title"
                                value="{{ old('subtitle') }}">
                            @error('subtitle')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="postCategory" class="form-label">Category</label>
                            <select class="form-select @error('categoryId') is-invalid @enderror" id="postCategory"
                                name="categoryId">
                                <option selected>Select category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('categoryId')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="postSubCategory" class="form-label">SubCategory</label>
                            <select class="form-select @error('subcategoryId') is-invalid @enderror" id="postSubCategory"
                                name="subcategoryId">
                                <option selected>Select subcategory</option>
                                @foreach ($sub_categories as $sub_category)
                                    <option value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
                                @endforeach
                            </select>
                            @error('subcategoryId')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="postDistrict" class="form-label">District</label>
                            <select class="form-select @error('districtsId') is-invalid @enderror" id="postDistrict"
                                name="districtsId">
                                <option selected>Select district</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                            @error('districtsId')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="postSubDistrict" class="form-label">SubDistrict</label>
                            <select class="form-select @error('subdistrictsId') is-invalid @enderror" id="postSubDistrict"
                                name="subdistrictsId">
                                <option selected>Select subdistrict</option>
                                @foreach ($subdistricts as $subdistrict)
                                    <option value="{{ $subdistrict->id }}">{{ $subdistrict->name }}</option>
                                @endforeach
                            </select>
                            @error('subdistrictsId')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="postTag" class="form-label">Tag</label>
                            <input type="text" class="form-control @error('tag') is-invalid @enderror" id="postTag"
                                name="tag" placeholder="e.g., Technology, Health, Sports"
                                value="{{ old('tag') }}">
                            @error('tag')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="col-md-6">
                            <label for="postTag" class="form-label">Lead News</label>
                            <div class="d-flex gap-4">
                                <div>
                                    <span>Yes</span>
                                    <input type="radio" name="lead" value="yes">
                                </div>
                                <div>
                                    <span>No</span>
                                    <input type="radio" name="lead" value="no">
                                </div>
                            </div>
                            @error('lead')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="product_description" class="form-label">Content</label>
                        <textarea class="editor form-control @error('content') is-invalid @enderror" id="product_description" name="content"
                            rows="3" placeholder="Enter content">{{ old('content') }}</textarea>
                        @error('content')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save Post</button>
                </form>
            </div>
        </div>
    </div>
@endsection
