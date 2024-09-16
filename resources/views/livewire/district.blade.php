<div>
    <div class="container mt-4">
        <!-- Add Post Button -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>District</h2>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPostModal">
                Add District
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
                        <th>District Name</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($districts as $district)
                        <tr>
                            <td>{{ $district->id }}</td>
                            <td>{{ $district->name }}</td>
                            <td>{{ $district->created_at->format('Y-m-d') }}</td>
                            <td>
                                <button class="btn btn-sm btn-info" wire:click="editDistrict({{ $district->id }})"
                                    data-bs-toggle="modal" data-bs-target="#editPostModal">Edit</button>
                                <button class="btn btn-sm btn-danger"
                                    wire:click="deleteDistrict({{ $district->id }})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $districts->links() }} <!-- Correct variable name -->
        </div>
    </div>

    <!-- Add Post Modal -->
    <div wire:ignore.self class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="addPostModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPostModalLabel">Add New District</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="CreateDistrict">
                        <div class="mb-3">
                            <label for="District" class="form-label">District Name</label>
                            <input type="text" wire:model="district"
                                class="form-control @error('district') is-invalid @enderror" id="District"
                                placeholder="Enter district name">
                            @error('district')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save District</button>
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
                    <h5 class="modal-title" id="editPostModalLabel">Edit District</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateDistrict">
                        <div class="mb-3">
                            <label for="editDistrict" class="form-label">District Name</label>
                            <input type="text" wire:model="district"
                                class="form-control @error('district') is-invalid @enderror" id="editDistrict"
                                placeholder="Edit district name">
                            @error('district')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update District</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
