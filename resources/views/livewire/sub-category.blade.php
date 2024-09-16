<div wire:ignore.self>
    <div class="container mt-4">
        <!-- Add Post Button -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>SubCategory</h2>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPostModal">
                Add SubCategory
            </button>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <!-- Posts Table -->
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>SubCategory</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sub_categories as $subcategory)
                        <tr>
                            <td>{{ $subcategory->id }}</td>
                            <td>{{ $subcategory->name }}</td>
                            <td>{{ $subcategory->category->name }}</td>
                            <td>{{ $subcategory->created_at->format('Y-m-d') }}</td>
                            <td>
                                <button class="btn btn-sm btn-info" wire:click="editSubCategory({{ $subcategory->id }})"
                                    data-bs-toggle="modal" data-bs-target="#editPostModal">
                                    Edit
                                </button> <button class="btn btn-sm btn-danger"
                                    wire:click="deleteSubCategory({{ $subcategory->id }})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination Links -->
        <div class="mt-3">
            {{ $sub_categories->links() }}
        </div>
    </div>

    <!-- Add Post Modal -->
    <div wire:ignore.self class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="addPostModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPostModalLabel">Add New SubCategory</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="saveSubCategory">
                        <div class="mb-3">
                            <label for="postTitle" class="form-label">SubCategory Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                wire:model="name" id="postTitle" placeholder="Enter subcategory name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="postCategory" class="form-label">Category</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" id="postCategory"
                                wire:model="category_id">
                                <option selected>Select category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="editPostModal" tabindex="-1" aria-labelledby="editPostModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPostModalLabel">Edit SubCategory</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateSubCategory">
                        <div class="mb-3">
                            <label for="editSubCategoryName" class="form-label">SubCategory Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                wire:model="name" id="editSubCategoryName" placeholder="Enter subcategory name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="editCategory" class="form-label">Category</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" id="editCategory"
                                wire:model="category_id">
                                <option selected>Select category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update SubCategory</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
