<div class="border">
    <div class="btn-group w-full flex" role="group">
        <button wire:click="showLatest" type="button"
            class="w-1/2 text-lg {{ $filter === 'latest' ? 'bg-red-600 text-white' : 'bg-gray-200 text-black' }} py-2">
            সর্বশেষ
        </button>
        <button wire:click="showOld" type="button"
            class="w-1/2 text-lg {{ $filter === 'old' ? 'bg-red-600 text-white' : 'bg-gray-200 text-black' }} py-2">
            সর্বাধিক
        </button>
    </div>
    <div class="h-[550px] overflow-auto">
        @foreach ($posts as $post)
            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                class="flex flex-col p-1 bg-gray-100 border-b border-gray-300 hover:bg-gray-200">
                <div class="flex">
                    <i class="ri-arrow-right-s-line text-gray-800 text-2xl"></i>
                    <div class="text-gray-800 text-lg pl-2">
                        <span class="line-clamp-2">{{ $post->title }}</span>
                    </div>
                </div>
                <div class="flex items-center mx-2 pt-1 text-gray-600 text-base">
                    <i class="ri-time-fill"></i>
                    @php
                        \Carbon\Carbon::setLocale('bn');
                        $timeAgo = \Carbon\Carbon::parse($post->created_at)->diffForHumans();

                        // Convert English numbers to Bangla numbers
                        $timeAgo = str_replace(
                            ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'],
                            ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'],
                            $timeAgo,
                        );
                    @endphp
                    <span class="ml-1">
                        {{ $timeAgo }}
                    </span>
                </div>
            </a>
        @endforeach
    </div>
    <a href="{{ route('archives') }}" class="text-lg text-center bg-gray-500 text-white w-full py-2 block">
        সব খবর
    </a>
</div>
