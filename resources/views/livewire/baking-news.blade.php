<div>
    <div class="container mt-4">
        <!-- Add Post Button -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Baking News</h2>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPostModal">
                Add news
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
                        <th>Baking news</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @php
                    use Illuminate\Support\Str;
                @endphp
                <tbody>
                    @foreach ($newse as $news)
                        <tr>
                            <td>{{ $news->id }}</td>
                            <td style="font-size: 15px;">{{ Str::limit($news->news, 70) }}</td>
                            <td>{{ $news->created_at->format('Y-m-d') }}</td>
                            <td>
                                <button wire:click="editNews({{ $news->id }})" class="btn btn-sm btn-info"
                                    data-bs-toggle="modal" data-bs-target="#editNews">Edit</button>
                                <button wire:click="deleteNews({{ $news->id }})"
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
            {{ $newse->links() }}
        </div>
    </div>

    <!-- Add News Modal -->
    <div wire:ignore.self class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="addPostModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPostModalLabel">Add Baking News</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="CreateNews">
                        <div class="mb-3">
                            <label for="postTitle" class="form-label">News Name</label>
                            <input wire:model="news" type="text"
                                class="form-control @error('news') is-invalid @enderror" id="postTitle"
                                placeholder="Enter news name">
                            @error('news')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save news</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Category --}}

    <div wire:ignore.self class="modal fade" id="editNews" tabindex="-1" aria-labelledby="editNewsLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editNewsLabel">Edit News</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateNews">
                        <div class="mb-3">
                            <label for="editNews" class="form-label">News Name</label>
                            <input wire:model="news" type="text"
                                class="form-control @error('news') is-invalid @enderror" id="editNews"
                                placeholder="Enter news name">
                            @error('news')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update News</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
