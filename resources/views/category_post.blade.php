<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @include('icon.icon')
    @include('layout.scroll')
    <title>{{ $name }}</title>
</head>
<style>
    #img-res {
        width: 280px;
    }

    .sm-text-size {
        font-size: 15px;
        color: #333;
        font-weight: 600;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .title-line-tow-big {
        font-size: 18px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        font-weight: 600;
        color: #333;
    }

    .title-line-tow {
        font-size: 18px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        line-height: 1.7;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .type-border {
        display: flex;
        justify-content: center;
        border-top: 2px solid #29725e;
        position: relative;
    }

    .type-card {
        min-width: 150px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #29725e;
        font-weight: 600;
        position: absolute;
        transform: skewX(-10deg);
        color: #fff;
        font-size: 18px;
        top: -20px;
    }

    @media (max-width: 768px) {
        #img-res {
            width: 100%;
        }

        .sm-text-size {
            font-size: 15px;
        }
    }
</style>

<body>
    @include('layout.search')
    @include('layout.header')


    <div class="container topM">
        <div class="type-border">
            <div class="type-card">
                <span>{{ $name }}</span>
            </div>
        </div>
    </div>

    <div class="container mx-auto my-6 p-2 md:p-4">
        <div class="flex flex-wrap">
            <div class="w-full md:w-9/12">
                <div class="flex flex-wrap">
                    <div class="w-full md:w-8/12">
                        <a href="{{ route('view.post', ['id' => $latestPost->id, 'name' => $latestPost->category->name]) }}"
                            class="flex flex-col md:flex-row gap-2 bg-gray-200 p-2 rounded">
                            <div class="img text-center w-full md:w-64 h-48">
                                <img src="{{ asset('storage/' . $latestPost->image) }}" alt=""
                                    class="w-full h-full object-cover rounded">
                            </div>
                            <div class="flex-1 px-2 md:px-1 pb-3">
                                <div class="font-semibold py-1 text-xl text-gray-700 line-clamp-2">
                                    <span>{{ $latestPost->title }}</span>
                                </div>
                                <div class="text-gray-600 text-lg pb-1 line-clamp-4">
                                    <span>{{ $latestPost->subtitle }}</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="w-full md:w-4/12 py-2 md:py-0 px-0 md:px-2">
                        <a href="{{ route('view.post', ['id' => $secondPost->id, 'name' => $secondPost->category->name]) }}"
                            class="block bg-gray-200 text-gray-800 p-2 rounded">
                            <div class="flex flex-wrap md:block">
                                <div class="w-5/12 md:w-full">
                                    <img src="{{ asset('storage/' . $secondPost->image) }}" alt=""
                                        class="w-full h-auto object-cover rounded">
                                </div>
                                <div
                                    class="w-7/12 md:w-full mt-1 md:mt-2 line-clamp-2 px-2 md:px-0 font-semibold text-lg">
                                    <span>{{ $secondPost->title }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="py-0 md:py-4 pr-0 md:pr-2">
                    <div class="flex flex-wrap -mx-2">
                        @foreach ($randomPosts as $post)
                            <div class="w-full md:w-4/12 px-2 py-2 md:py-0">
                                <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                    class="block bg-gray-200 text-gray-800 p-2 rounded">
                                    <div class="flex flex-wrap md:block">
                                        <div class="w-5/12 md:w-full h-32">
                                            <img src="{{ asset('storage/' . $post->image) }}" alt=""
                                                class="w-full h-full object-cover rounded">
                                        </div>
                                        <div
                                            class="w-7/12 md:w-full line-clamp-2 mt-1 md:mt-2 px-2 md:px-0 font-semibold text-lg">
                                            <span>{{ $post->title }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="w-full md:w-3/12 mb-4">
                @livewire('post-filter')
            </div>
        </div>
    </div>


    <div class="container mx-auto p-2 md:p-4">
        <div class="grid grid-cols-12 gap-2">
            <div class="col-span-12 md:col-span-9">
                <div
                    class="type py-2 border-t-4 border-dotted border-gray-300 border-b border-gray-300 font-bold text-2xl text-[#29725e] flex items-center">
                    <img width="20" src="{{ asset('icon/Sign.webp') }}" alt="">
                    <span class="ml-2">ভাইরাল নিউজ বিভাগের সব খবর</span>
                </div>
                <div class="grid grid-cols-12 gap-2">
                    @foreach ($allposts as $post)
                        <div class="col-span-12 md:col-span-6 py-2">
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="block bg-gray-200 p-2 hover:bg-gray-300">
                                <div class="flex gap-2 items-center">
                                    <div class="grid grid-cols-12">
                                        <div class="col-span-5">
                                            <div class="img">
                                                <img class="w-full h-full object-cover"
                                                    src="{{ asset('storage/' . $post->image) }}" alt="">
                                            </div>
                                        </div>
                                        @php
                                            $date = \Carbon\Carbon::parse($post->created_at);
                                            $banglaDays = [
                                                'Sunday' => 'রবিবার',
                                                'Monday' => 'সোমবার',
                                                'Tuesday' => 'মঙ্গলবার',
                                                'Wednesday' => 'বুধবার',
                                                'Thursday' => 'বৃহস্পতিবার',
                                                'Friday' => 'শুক্রবার',
                                                'Saturday' => 'শনিবার',
                                            ];
                                            $banglaMonths = [
                                                'January' => 'জানুয়ারি',
                                                'February' => 'ফেব্রুয়ারি',
                                                'March' => 'মার্চ',
                                                'April' => 'এপ্রিল',
                                                'May' => 'মে',
                                                'June' => 'জুন',
                                                'July' => 'জুলাই',
                                                'August' => 'আগস্ট',
                                                'September' => 'সেপ্টেম্বর',
                                                'October' => 'অক্টোবর',
                                                'November' => 'নভেম্বর',
                                                'December' => 'ডিসেম্বর',
                                            ];
                                            $day = $banglaDays[$date->format('l')];
                                            $month = $banglaMonths[$date->format('F')];
                                            $dayNumber = \App\Helpers\convertToBanglaNumber($date->format('j'));
                                            $year = \App\Helpers\convertToBanglaNumber($date->format('Y'));
                                            $time = \App\Helpers\convertToBanglaNumber($date->format('h:i A'));
                                            $formattedDate =
                                                $day . ', ' . $dayNumber . ' ' . $month . ' ' . $year . ', ' . $time;
                                        @endphp
                                        <div class="col-span-7 px-2 ml-1">
                                            <div class="title">
                                                <div class="flex flex-col">
                                                    <span
                                                        class="text-lg line-clamp-2 text-gray-700 font-semibold">{{ $post->title }}</span>
                                                    <span class="text-sm text-gray-600">{{ $formattedDate }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-span-12 md:col-span-3">
                <div class="border rounded-t-lg overflow-hidden">
                    <div class="w-full py-2 text-center bg-[#29725e]">
                        <span class="text-xl text-white">এই বিভাগের সর্বাধিক পঠিত</span>
                    </div>
                    <div class="max-h-96 overflow-auto pt-2">
                        @foreach ($allposts as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="block px-1 hover:bg-gray-200">
                                <div class="flex items-center border-b {{ $loop->first ? '' : 'py-2' }}">
                                    <div class="img flex-shrink-0 w-24 h-16">
                                        <img class="w-full h-full object-cover"
                                            src="{{ asset('storage/' . $post->image) }}" alt="">
                                    </div>
                                    @php
                                        $timeAgo = \Carbon\Carbon::parse($post->created_at)->diffForHumans();
                                    @endphp
                                    <div class="flex flex-col ml-2">
                                        <span class="text-base line-clamp-2 text-gray-800 font-semibold">{{ $post->title }}</span>
                                        <span class="text-sm text-gray-700">{{ $timeAgo }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('layout.footer')
    @include('layout.bakingnews')
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
