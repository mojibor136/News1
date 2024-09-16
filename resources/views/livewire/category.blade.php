<div>
    <div class="container mt-4">
        <!-- Add Post Button -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Category</h2>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPostModal">
                Add Category
            </button>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
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
        <!-- Posts Table -->
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at->format('Y-m-d') }}</td>
                            <td>
                                <button wire:click="editCategory({{ $category->id }})" class="btn btn-sm btn-info"
                                    data-bs-toggle="modal" data-bs-target="#editCategoryModal">Edit</button>
                                <button wire:click="deleteCategory({{ $category->id }})"
                                    class="btn btn-sm
                                    btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination Links -->
        <div class="mt-3">
            {{ $categories->links() }}
        </div>
    </div>

    <!-- Add Post Modal -->
    <div wire:ignore.self class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="addPostModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPostModalLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="CreateCategory">
                        <div class="mb-3">
                            <label for="postTitle" class="form-label">Category Name</label>
                            <input wire:model="category" type="text"
                                class="form-control @error('category') is-invalid @enderror" id="postTitle"
                                placeholder="Enter category name">
                            @error('category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Category --}}

    <div wire:ignore.self class="modal fade" id="editCategoryModal" tabindex="-1"
        aria-labelledby="editCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateCategory">
                        <div class="mb-3">
                            <label for="editCategoryName" class="form-label">Category Name</label>
                            <input wire:model="category" type="text"
                                class="form-control @error('category') is-invalid @enderror" id="editCategoryName"
                                placeholder="Enter category name">
                            @error('category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
