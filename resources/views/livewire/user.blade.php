<div>
    <style>
        td a {
            text-transform: capitalize;
        }

        button {
            text-transform: capitalize;
        }
    </style>
    <div class="container mt-4">

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
                        <th>Image</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                                <img width="45" src="{{ asset('profile/4715330.png') }}" alt="">
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->created_at->format('Y-m-d') }}</td>
                            <td>
                                @if ($user->status === 'deactive')
                                    <button wire:click="toggleStatus({{ $user->id }})"
                                        class="btn btn-sm btn-danger">
                                        {{ $user->status }}
                                    </button>
                                @elseif ($user->status === 'active')
                                    <button wire:click="toggleStatus({{ $user->id }})"
                                        class="btn btn-sm btn-success">
                                        {{ $user->status }}
                                    </button>
                                @endif
                            </td>
                            <td>
                                <button wire:click="deleteUser({{ $user->id }})"
                                    class="btn btn-sm
                                    btn-warning">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination Links -->
        <div class="mt-3">
            {{ $users->links() }}
        </div>
    </div>

</div>
