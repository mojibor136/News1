<div>
    <form wire:submit.prevent="search" class="px-2 md:px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- তারিখ হতে -->
            <div>
                <label for="startDate" class="block text-lg font-medium text-gray-700">তারিখ হতে:</label>
                <input type="date"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#29725e] focus:border-[#29725e]"
                    id="startDate" wire:model="startDate" required>
            </div>

            <!-- তারিখ পর্যন্ত -->
            <div>
                <label for="endDate" class="block text-lg font-medium text-gray-700">তারিখ পর্যন্ত:</label>
                <input type="date"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#29725e] focus:border-[#29725e]"
                    id="endDate" wire:model="endDate" required>
            </div>

            <!-- সব ক্যাটাগরি -->
            <div>
                <label for="category" class="block text-lg font-medium text-gray-700">সব ক্যাটাগরি:</label>
                <select
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#29725e] focus:border-[#29725e]"
                    wire:model="category">
                    <option value="all" selected>সব ক্যাটাগরি</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- খুঁজুন Button -->
        <div class="mt-4 text-center">
            <button type="submit"
                class="bg-[#29725e] text-white font-semibold py-2 w-[200px] rounded hover:bg-[#1a5d47] transition duration-200">খুঁজুন</button>
        </div>
    </form>

    <!-- Posts Display -->
    <div class="container mx-auto my-6 px-2 md:px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($posts as $post)
                <div class="col-span-1 md:col-span-2 py-2">
                    <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                        class="block bg-gray-100 rounded-md shadow hover:shadow-lg transition duration-200">
                        <div class="flex">
                            <div class="w-1/3">
                                <img class="h-full w-full object-cover"
                                    src="{{ asset('storage/' . $post->image) }}" alt="">
                            </div>
                            <div class="w-2/3 py-2 pl-3">
                                <div class="font-semibold text-xl text-gray-800 line-clamp-2">
                                    <span>{{ $post->title }}</span>
                                </div>
                                <div class="text-gray-600 text-xl">
                                    <span class="line-clamp-3">{{ $post->subtitle }}</span>
                                </div>
                                <div class="text-gray-500 text-sm">
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
