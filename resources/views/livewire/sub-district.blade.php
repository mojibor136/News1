<div>
    <div class="container mt-4">
        <!-- Add Post Button -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>SubDistrict</h2>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPostModal">
                SubDistrict Post
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
                        <th>SubDistrict Name</th>
                        <th>District</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sub_districts as $subdistrict)
                        <tr>
                            <td>{{ $subdistrict->id }}</td>
                            <td>{{ $subdistrict->name }}</td>
                            <td>{{ $subdistrict->district->name ?? 0 }}</td>
                            <td>2024-08-30</td>
                            <td>
                                <button class="btn btn-sm btn-info" wire:click="editSubDistrict({{ $subdistrict->id }})"
                                    data-bs-toggle="modal" data-bs-target="#editPostModal">Edit</button>
                                <button class="btn btn-sm btn-danger"
                                    wire:click="deleteSubdistrict({{ $subdistrict->id }})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Post Modal -->
    <div wire:ignore.self class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="addPostModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPostModalLabel">Add New SubDistrict</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="saveSubDistric">
                        <div class="mb-3">
                            <label for="SubDistrict" class="form-label">SubDistrict Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="SubDistrict" placeholder="Enter subdistrict name" wire:model="name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="postCategory" class="form-label">District</label>
                            <select class="form-select @error('district_id') is-invalid @enderror" id="postCategory"
                                wire:model="district_id">
                                <option selected>Select District</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                            @error('district_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save SubDistrict</button>
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
                    <h5 class="modal-title" id="editPostModalLabel">Edit SubDistrict</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateSubDistrict">
                        <div class="mb-3">
                            <label for="editSubDistrict" class="form-label">SubDistrict Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="editSubDistrict" placeholder="Enter subdistrict name" wire:model="name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="editDistrict" class="form-label">District</label>
                            <select class="form-select @error('district_id') is-invalid @enderror" id="editDistrict"
                                wire:model="district_id">
                                <option selected>Select District</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                            @error('district_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update SubDistrict</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
