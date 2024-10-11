<div>
    <form wire:submit.prevent="search">
        <div class="row g-3">
            <!-- তারিখ হতে -->
            <div class="col-md-4">
                <label for="startDate" class="form-label">তারিখ হতে:</label>
                <input type="date" class="form-control" id="startDate" wire:model="startDate" required>
            </div>

            <!-- তারিখ পর্যন্ত -->
            <div class="col-md-4">
                <label for="endDate" class="form-label">তারিখ পর্যন্ত:</label>
                <input type="date" class="form-control" id="endDate" wire:model="endDate" required>
            </div>

            <!-- সব ক্যাটাগরি -->
            <div class="col-md-4">
                <label for="category" class="form-label">সব ক্যাটাগরি:</label>
                <select class="form-select" wire:model="category">
                    <option value="all" selected>সব ক্যাটাগরি</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- খুঁজুন Button -->
        <div class="row g-3 mt-3">
            <div class="col text-center">
                <button type="submit" class="btn btn-search btn-lg">খুঁজুন</button>
            </div>
        </div>
    </form>

    <!-- Posts Display -->
    <div class="container topM">
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-12 col-md-9 py-2">
                    <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                        style="display: block; background:#f5f5f5">
                        <div class="row">
                            <div class="col-5">
                                <img class="img-fluid" src="{{ asset('storage/' . $post->image) }}" alt="">
                            </div>
                            <div class="col-7 py-2" style="padding-left: 0">
                                <div class="title" id="title-bold-one">
                                    <span>{{ $post->title }}</span>
                                </div>
                                <div class="text" id="text-theree">
                                    <span>{{ $post->subtitle }}</span>
                                </div>
                                <div class="time" id="time-text">
                                    <span>{{ $post->created_at->format('l, d F Y, H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
