<div class="container mt-4">
    <!-- Add Post Button -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Video</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPostModal">
            Add Video
        </button>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Video Table (Sample Table) -->
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Video</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($videos as $video)
                <tr>
                    <td>{{ $video->id }}</td>
                    <td>{{ $video->video }}</td>
                    <td>{{ $video->title }}</td>
                    <td>{{ $video->created_at->format('Y-m-d') }}</td>
                    <td>
                        <button class="btn btn-sm btn-info">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>

    <!-- Add Video Modal -->
    <div wire:ignore.self class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="addPostModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPostModalLabel">Add Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="CreateVideo" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="title" class="form-label">Video Title</label>
                            <input wire:model="title" type="text"
                                class="form-control @error('title') is-invalid @enderror" id="title"
                                placeholder="Enter video title">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="video" class="form-label">Video</label>
                            <input type="file" class="form-control @error('video') is-invalid @enderror"
                                id="video" wire:model="video" accept="video/*">
                            @error('video')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div wire:loading wire:target="video">Uploading...</div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Save Video</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@livewireScripts