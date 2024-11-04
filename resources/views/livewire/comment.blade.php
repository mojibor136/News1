<div class="container mx-auto my-8 px-2 md:px-4" id="none-pdf">
    @livewireStyles
    <div class="flex flex-col md:flex-row">
        <div class="w-full md:w-7/12">
            <div class="py-4">
                <span class="text-gray-800 font-medium text-lg">{{ $comments->count() }} comments</span>
            </div>
            <div class="border-t border-b py-4 flex flex-col">
                @if (session()->has('message'))
                    <div class="alert alert-success mb-2 text-green-600">
                        {{ session('message') }}
                    </div>
                @endif

                <form wire:submit.prevent="Comment">
                    <div class="flex flex-col gap-2">
                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        <input wire:model="name" type="text" class="form-control mb-2 border rounded p-2"
                            placeholder="Name">

                        <textarea wire:model="comment" class="form-control border rounded p-2" placeholder="Add a comment" rows="4"></textarea>
                        @error('comment')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <button class="my-2 bg-blue-600 text-white rounded px-4 py-2">Post</button>
                    </div>
                </form>
            </div>

            <div class="list-content">
                @foreach ($comments as $comment)
                    <div class="list flex gap-3 py-3">
                        <div class="">
                            <div class="w-12 h-12">
                                <img src="{{ asset('profile/user.jpg') }}" alt=""
                                    class="rounded-full w-full h-full object-cover">
                            </div>
                        </div>
                        <div class="" style="line-height:initial">
                            <div class="name">
                                <p class="m-0 text-blue-800 text-base capitalize">{{ $comment->name }}</p>
                                <span class="text-gray-800 text-base mt-1">{{ $comment->content }}</span>
                            </div>
                            <div class="mt-1 flex gap-2 text-sm text-gray-600">
                                <span class="text-blue-800 cursor-pointer">Link</span>
                                <span class="text-blue-800 cursor-pointer">Reply</span>
                                <span>{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <a href="#" class="mt-2 flex items-center text-gray-900">
                <span class="text-sm font-light ml-2">Facebook Comments plugin</span>
            </a>
        </div>
        <div class="hidden md:block md:w-5/12"></div>
    </div>
    @livewireScripts
</div>
