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


        .link {
            text-transform: capitalize;
            text-decoration: none;
            font-size: 14px;
            font-family: 'Open Sans', sans-serif;
            font-weight: 500;
            cursor: pointer;
            color: rgb(30, 82, 252);
        }

        h5 {
            text-transform: capitalize;
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
            <form wire:submit.prevent="UpdateProfile">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="adminProfileLabel">Account Settings</h5>
                        <span class="link" data-bs-toggle="modal" data-bs-target="#passwordModal">change
                            password</span>
                    </div>
                    <div class="modal-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="profile-section">
                            <div class="mb-3">
                                <label for="adminName" class="form-label">Name</label>
                                <input wire:model="name" type="text" class="form-control" id="adminName">
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
@livewire('clint.user-password-update', ['userId' => $id])
</div>
