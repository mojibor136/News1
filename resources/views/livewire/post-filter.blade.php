<div class="border">
    <div class="btn-group w-100" role="group">
        <button wire:click="showLatest" type="button" style="font-size: 20px;"
            class="btn w-50 {{ $filter === 'latest' ? 'btn-danger' : 'btn-light' }}" id="btn1">
            সর্বশেষ
        </button>
        <button wire:click="showOld" style="font-size: 20px;" type="button" class="btn w-50 {{ $filter === 'old' ? 'btn-danger' : 'btn-light' }}"
            id="btn2">
            সর্বাধিক
        </button>
    </div>

    <div style="height: 625px; overflow:auto;">
        @foreach ($posts as $post)
            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                class="hover-effect" style="border-bottom: 1px solid #ddd; display:block; background:#f3f3f3;">
                <div class="d-flex p-1">
                    <i class="ri-arrow-right-s-line" style="color: #333; font-size:28px;"></i>
                    <div class="text-block" style="color: #333; font-size:18px; padding-top:7px;">
                        <span>{{ \Illuminate\Support\Str::limit($post->title, 40) }}</span>
                    </div>
                </div>
                <div class="time mx-2" style="padding-top:0">
                    <i class="ri-time-fill"></i>
                    <span>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
                </div>
            </a>
        @endforeach
    </div>
    <a href="{{ route('archives') }}" style="font-size: 20px;" class="btn-sm btn btn-secondary w-100 rounded-0">সব খবর</a>
</div>
