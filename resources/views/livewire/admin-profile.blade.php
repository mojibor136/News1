<div>
    <style>
        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 70%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
    <!-- Trigger for #admin-profile modal -->
    <div class="admin-info" data-bs-toggle="modal" data-bs-target="#admin-profile">
        <span>{{ $name }}</span>
        <i class="ri-arrow-down-s-line"></i>
    </div>

    <!-- #admin-profile Modal Structure -->
    <div wire:ignore.self class="modal fade" id="admin-profile" tabindex="-1" aria-labelledby="adminProfileLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adminProfileLabel">Admin Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="UpdateProfile">
                    <div class="modal-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="profile-section">
                            <div class="text-center mb-3">
                                <img src="{{ asset('profile/profile.jpg') }}" class="rounded-circle mb-0"
                                    alt="Admin Profile" width="150" height="150">
                                <div class="d-flex justify-content-center align-items-center gap-1">
                                    <h5 class="m-0">{{ $name }}</h5>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="adminEmail" class="form-label">Name</label>
                                <input wire:model="name" type="text" class="form-control" id="adminEmail">
                                @error('name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="adminEmail" class="form-label">Email address</label>
                                <input wire:model="email" type="email" class="form-control" id="adminEmail">
                                @error('email')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
