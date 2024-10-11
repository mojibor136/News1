<div class="container mt-4">
    <style>
        th,
        td {
            white-space: nowrap;
        }

        @media (max-width: 768px) {
            h2 {
                font-size: 18px;
            }
        }
    </style>
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <h2 class="mb-3">Editor Contact Information</h2>

    <form wire:submit.prevent="submit">
        <div class="mb-3">
            <label for="editorName" class="form-label">Editor Name</label>
            <input type="text" wire:model="editorName" class="form-control" id="editorName" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" wire:model="address" class="form-control" id="address" required>
        </div>

        <div class="mb-3">
            <label for="fax" class="form-label">Fax</label>
            <input type="text" wire:model="fax" class="form-control" id="fax" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" wire:model="phone" class="form-control" id="phone" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" wire:model="email" class="form-control" id="email" required>
        </div>

        <button type="submit" class="btn btn-primary">{{ $isEditing ? 'Update' : 'Submit' }}</button>
    </form>

    <hr>

    <h3 class="mt-5">Contact Information List</h3>
    <div class="row">
        <div class="col-12 p-0">
            @foreach ($contactInfos as $info)
                <div class="card m-2">
                    <div class="card-body">
                        <p class="card-text"><strong>Editor Name:</strong> {{ $info->editorName }}</p>
                        <p class="card-text"><strong>Address:</strong> {{ $info->address }}</p>
                        <p class="card-text"><strong>Fax:</strong> {{ $info->fax }}</p>
                        <p class="card-text"><strong>Phone:</strong> {{ $info->phone }}</p>
                        <p class="card-text"><strong>Email:</strong> {{ $info->email }}</p>
                        <button class="btn btn-sm btn-warning" wire:click="edit({{ $info->id }})">Edit</button>
                        <button class="btn btn-sm btn-danger" wire:click="delete({{ $info->id }})">Delete</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
