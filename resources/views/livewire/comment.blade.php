<div class="container topM" id="none-pdf">
    @livewireStyles
    <div class="row">
        <div class="col-12 col-md-7">
            <div class="py-4">
                <span style="font-size: 15px; color:#333; font-weight:500">{{ $comments->count() }} comments</span>
            </div>
            <div class="border-bottom border-top py-4 d-flex flex-column">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <form wire:submit.prevent="Comment">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input wire:model="name" type="text" class="form-control mb-2" placeholder="Name"
                        style="width: 100%">

                    <textarea wire:model="comment" class="form-control" placeholder="Add a comment" style="width: 100%" rows="4"></textarea>
                    @error('comment')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="d-flex justify-content-end">
                        <button class="my-2 btn btn-primary" style="width: fit-content;">Post</button>
                    </div>
                </form>

            </div>

            <div class="list-content">
                @foreach ($comments as $comment)
                    <div class="list d-flex gap-3 py-3">
                        <div class="list-item">
                            <div class="img" style="width: 50px; height:50px;">
                                <img src="{{ asset('profile/user.jpg') }}" alt="" class="rounded img-fluid">
                            </div>
                        </div>
                        <div class="list-item" style="line-height:initial">
                            <div class="name">
                                <p class="m-0 text-capitalize" style="color:rgb(33, 87, 158);font-size:15px;">
                                    {{ $comment->name }}</p>
                                <span style="color:#333; font-size:14px;" class="mt-1">{{ $comment->content }}</span>
                            </div>
                            <div class="mt-1 d-flex gap-2" style="font-size: 13px;">
                                <span style="color:rgb(33, 87, 158); cursor: pointer;">Link</span>
                                <span style="color:rgb(33, 87, 158); cursor: pointer;">Reply</span>
                                <span>{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <a href="" class="mt-2" style="display: block; color:#333">
                <i style="color: rgb(0, 105, 175)" class="ri-facebook-box-line"></i>
                <span style="font-size: 12px; font-weight:200">Facebook Comments plugin</span>
            </a>
        </div>
        <div class="col-5"></div>
    </div>
    @livewireScripts
</div>
