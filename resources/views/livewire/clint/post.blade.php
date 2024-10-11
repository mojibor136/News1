<div>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Posts</h2>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPostModal">
                Add Post
            </button>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                        <th>Author</th>
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
                            <td>{{ $post->role }}</td>
                            <td>{{ $post->created_at->format('Y-m-d') }}</td>
                            <td>{{ $post->visitors->count() }}</td>
                            <td>
                                <button class="btn btn-sm btn-info" wire:click="editPost({{ $post->id }})"
                                    data-bs-toggle="modal" data-bs-target="#editPostModal">Edit</button>
                                <button class="btn btn-sm btn-danger"
                                    wire:click="deletePost({{ $post->id }})">Delete</button>
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

    <!-- Add Post Modal -->

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="addPostModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPostModalLabel">Add New Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="CreatePost">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="postImage" class="form-label">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="postImage" wire:model="image">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="postTitle" class="form-label">Post Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="postTitle" placeholder="Enter post title" wire:model="title">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="imgTitle" class="form-label">Image Title</label>
                                <input type="text" class="form-control @error('imgTitle') is-invalid @enderror"
                                    id="imgTitle" placeholder="Enter img title" wire:model="imgTitle">
                                @error('imgTitle')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="reporter" class="form-label">Reporter</label>
                                <input type="text" class="form-control @error('reporter') is-invalid @enderror"
                                    id="reporter" placeholder="Enter reporter name" wire:model="reporter">
                                @error('reporter')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="postTitle" class="form-label">Sub Title</label>
                                <input type="text" class="form-control @error('subtitle') is-invalid @enderror"
                                    id="postTitle" placeholder="Enter post sub-title" wire:model="subtitle">
                                @error('subtitle')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="postCategory" class="form-label">Category</label>
                                <select class="form-select @error('categoryId') is-invalid @enderror" id="postCategory"
                                    wire:model="categoryId">
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
                                <select class="form-select @error('subcategoryId') is-invalid @enderror"
                                    id="postSubCategory" wire:model="subcategoryId">
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
                                <select class="form-select @error('districtsId') is-invalid @enderror"
                                    id="postDistrict" wire:model="districtsId">
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
                                <select class="form-select @error('subdistrictsId') is-invalid @enderror"
                                    id="postSubDistrict" wire:model="subdistrictsId">
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
                                <input type="text" class="form-control @error('tag') is-invalid @enderror"
                                    id="postTag" placeholder="e.g., Technology, Health, Sports" wire:model="tag">
                                @error('tag')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="postContent" class="form-label">Content</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="postContent" rows="3"
                                placeholder="Enter content" wire:model="content"></textarea>
                            @error('content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Post Modal -->
    <div wire:ignore.self class="modal fade" id="editPostModal" tabindex="-1" aria-labelledby="editPostModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPostModalLabel">Edit Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updatePost">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="postImage" class="form-label">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="postImage" wire:model="image">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="postTitle" class="form-label">Post Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="postTitle" placeholder="Enter post title" wire:model="title">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="imgTitle" class="form-label">Image Title</label>
                                <input type="text" class="form-control @error('imgTitle') is-invalid @enderror"
                                    id="imgTitle" placeholder="Enter img title" wire:model="imgTitle">
                                @error('imgTitle')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="reporter" class="form-label">Reporter</label>
                                <input type="text" class="form-control @error('reporter') is-invalid @enderror"
                                    id="reporter" placeholder="Enter reporter name" wire:model="reporter">
                                @error('reporter')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="postTitle" class="form-label">Sub Title</label>
                                <input type="text" class="form-control @error('subtitle') is-invalid @enderror"
                                    id="postTitle" placeholder="Enter post sub-title" wire:model="subtitle">
                                @error('subtitle')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="postCategory" class="form-label">Category</label>
                                <select class="form-select @error('categoryId') is-invalid @enderror"
                                    id="postCategory" wire:model="categoryId">
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
                                <select class="form-select @error('subcategoryId') is-invalid @enderror"
                                    id="postSubCategory" wire:model="subcategoryId">
                                    <option selected>Select subcategory</option>
                                    @foreach ($sub_categories as $sub_category)
                                        <option value="{{ $sub_category->id }}">{{ $sub_category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('subcategoryId')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="postDistrict" class="form-label">District</label>
                                <select class="form-select @error('districtsId') is-invalid @enderror"
                                    id="postDistrict" wire:model="districtsId">
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
                                <select class="form-select @error('subdistrictsId') is-invalid @enderror"
                                    id="postSubDistrict" wire:model="subdistrictsId">
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
                                <input type="text" class="form-control @error('tag') is-invalid @enderror"
                                    id="postTag" placeholder="e.g., Technology, Health, Sports" wire:model="tag">
                                @error('tag')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="postContent" class="form-label">Content</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="postContent" rows="3"
                                placeholder="Enter content" wire:model="content"></textarea>
                            @error('content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
