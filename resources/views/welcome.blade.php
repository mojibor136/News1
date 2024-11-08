@php
    $company = getCompany();
    $post = PostTitle();
    $ads = getAds()->shuffle()->first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    @include('icon.icon')
    @include('layout.scroll')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>
        {{ $company->name }} | {{ $post->title }}
    </title>
    <meta name="description" content="{{ $post->description }}">
    <meta name="keywords" content="{{ $post->tags->pluck('tag')->implode(', ') }}">
    <meta name="robots" content="index, follow">
</head>

<body>
    @include('layout.search')
    @include('layout.header')

    <div class="container mx-auto mt-3 md:mt-6 px-2 md:px-4">
        <div class="grid grid-cols-12">

            <div class="col-span-12 md:col-span-6 pr-0 md:pr-2 border-b">
                @if ($posts['latest'])
                    <a
                        href="{{ route('view.post', ['id' => $posts['latest']->id, 'name' => $posts['latest']->category->name]) }}">
                        <div class="w-full">
                            <img class="rounded-sm" src="{{ asset('storage/' . $posts['latest']->image) }}"
                                alt="">
                        </div>
                        <div class="flex flex-col gap-2 py-2">
                            <span
                                class="text-[26px] text-gray-950 font-bold line-clamp-2">{{ $posts['latest']->title }}</span>
                            <div class="flex flex-col gap-1">
                                <span
                                    class="text-base text-gray-700 font-medium line-clamp-3">{{ $posts['latest']->subtitle }}</span>
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
                                <span class="text-base text-gray-700 font-medium">{{ $timeAgo }}</span>
                            </div>
                        </div>
                    </a>
                @endif
                <div class="grid grid-cols-12 py-4 gap-4">
                    @foreach ($posts['two'] as $post)
                        <div class="col-span-12 md:col-span-6">
                            <a href="">
                                <span
                                    class="text-[20px] text-gray-950 font-semibold line-clamp-2">{{ $post->title }}</span>
                                <div class="flex flex-col gap-1">
                                    <span
                                        class="text-base text-gray-700 font-medium line-clamp-3 my-1">{{ $post->subtitle }}</span>
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
                                    <span class="text-base text-gray-700 font-medium">{{ $timeAgo }}</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <div class="col-span-12 my-4">
                        @if ($ads)
                            <a href="{{ $ads->link }}">
                                <img class="w-[-webkit-fill-availables]" src="{{ $ads->image }}" alt="">
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-span-12 md:col-span-3 px-0 md:px-2 border-0 md:border">
                <div>
                    @foreach ($posts['four'] as $index => $post)
                        <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}">
                            <div class="py-2 {{ $loop->last ? '' : 'border-b' }}">
                                <div class="grid grid-cols-12 pb-2 gap-2">
                                    <div class="col-span-5">
                                        <img class="rounded-sm" src="{{ asset('storage/' . $post->image) }}"
                                            alt="">
                                    </div>
                                    <div class="col-span-7">
                                        <span
                                            class="text-gray-950 font-semibold text-[20px] line-clamp-2">{{ $post->title }}</span>
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-base leading-tight text-gray-700 font-medium line-clamp-3">
                                        {{ $post->subtitle }}
                                    </span>
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
                                    <span class="text-sm text-gray-700 font-medium">{{ $timeAgo }}</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="col-span-12 md:col-span-3 px-0 md:px-2">
                @livewire('post-filter')
            </div>
        </div>
    </div>

    {{-- video gallery -------------------------- --}}
    <div class="container mx-auto my-8">
        <div class="video-gallery bg-gray-900 p-2 md:p-4">
            <!-- Gallery Title -->
            <a href="{{ route('video.list') }}">
                <div class="type pb-4 flex items-center gap-2 text-2xl font-bold text-gray-300 pl-1">
                    <i class="ri-film-line"></i>
                    <span>ভিডিও গ্যালারি</span>
                </div>
            </a>

            <!-- Main Video Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div class="col-span-1 lg:col-span-1">
                    <a href="#" class="block bg-gray-800 hover:bg-gray-700 transition">
                        <iframe class="w-full h-64" src="{{ $videoOne->video }}" title="YouTube video player"
                            frameborder="0" allowfullscreen></iframe>
                        <div class="text-gray-100 text-lg font-semibold p-3">
                            <span class="line-clamp-2">{{ $videoOne->title }}</span>
                        </div>
                        @php
                            \Carbon\Carbon::setLocale('bn');
                            $timeAgo = \Carbon\Carbon::parse($videoOne->created_at)->diffForHumans();

                            // Convert English numbers to Bangla numbers
                            $timeAgo = str_replace(
                                ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'],
                                ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'],
                                $timeAgo,
                            );
                        @endphp
                        <div class="text-gray-400 text-sm px-3 pb-3 flex items-center gap-1">
                            <i class="ri-time-fill"></i>
                            <span>{{ $timeAgo }}</span>
                        </div>
                    </a>
                </div>
                <!-- Smaller Videos Section -->
                <div class="col-span-1 lg:col-span-1 grid grid-cols-2 gap-4">
                    @foreach ($videoFor as $video)
                        <div class="col-span-1">
                            <a href="#" class="block bg-gray-800 hover:bg-gray-700 transition">
                                <iframe class="w-full h-40" src="{{ $video->video }}" title="YouTube video player"
                                    frameborder="0" allowfullscreen></iframe>
                                <div class="text-gray-100 text-base font-semibold p-2">
                                    <span class="line-clamp-2">{{ $video->title }}</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto p-0">
        <div class="grid-card px-2 md:px-4">
            @foreach ($posts['four'] as $post)
                <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                    class="block p-2 border border-gray-300" style="height: max-content;">
                    <div class="flex gap-2">
                        <!-- Text Section -->
                        <div class="flex-1">
                            <p class="m-0 mb-1 text-xl text-teal-600">
                                {{ $post->category->name }}/
                            </p>
                            <span id="title" class="text-base text-gray-800">
                                {{ $post->title }}
                            </span>
                        </div>
                        <!-- Image Section -->
                        <div class="w-24 h-16">
                            <img src="{{ asset('storage/' . $post->image) }}" class="w-20 h-full object-cover"
                                alt="">
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>


    <div class="container mx-auto my-8 p-2 md:p-4">
        <div class="grid grid-cols-12 gap-4">
            <!-- News List Section -->
            <div class="col-span-12 md:col-span-8 p-0">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach ($posts['sixPosts'] as $post)
                        <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                            class="block text-gray-700">
                            <div class="border p-2">
                                <div class="w-full mb-2">
                                    <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-auto rounded"
                                        alt="">
                                </div>
                                <div class="py-1 text-lg font-semibold">
                                    <span class="line-clamp-2">{{ $post->title }}</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Prayer Time & Banner Section -->
            <div class="col-span-12 md:col-span-4">
                <div>
                    <!-- Banner -->
                    <div class="mb-4">
                        <img src="{{ asset('banner/namaz.webp') }}" class="w-full" alt="">
                    </div>

                    <!-- Prayer Times Table -->
                    <table class="table-auto w-full border border-red-300 text-center mb-4">
                        <tbody>
                            <tr class="border-b border-red-300">
                                <td class="py-2">ফজর</td>
                                <td id="fajr-time" class="py-2"></td>
                            </tr>
                            <tr class="border-b border-red-300">
                                <td class="py-2">জোহর</td>
                                <td id="dhuhr-time" class="py-2"></td>
                            </tr>
                            <tr class="border-b border-red-300">
                                <td class="py-2">আসর</td>
                                <td id="asr-time" class="py-2"></td>
                            </tr>
                            <tr class="border-b border-red-300">
                                <td class="py-2">মাগরিব</td>
                                <td id="maghrib-time" class="py-2"></td>
                            </tr>
                            <tr>
                                <td class="py-2">ইশা</td>
                                <td id="isha-time" class="py-2"></td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Current Date -->
                    <div class="w-full text-center bg-red-600 py-2">
                        <span id="current-date" class="text-white text-lg"></span>
                    </div>

                    <script>
                        // Function to format date
                        function formatDate(date) {
                            const options = {
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric',
                                weekday: 'long'
                            };
                            return date.toLocaleDateString('bn-BD', options);
                        }

                        document.getElementById('current-date').innerText = formatDate(new Date());

                        // Function to get prayer times using the Aladhan API
                        function getPrayerTimes(latitude, longitude) {
                            const apiUrl = `https://api.aladhan.com/v1/timings?latitude=${latitude}&longitude=${longitude}&method=2`;

                            fetch(apiUrl)
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error('Network response was not ok');
                                    }
                                    return response.json();
                                })
                                .then(data => {
                                    if (data && data.data && data.data.timings) {
                                        const timings = data.data.timings;

                                        // Set prayer times in Bengali using innerText
                                        document.getElementById('fajr-time').innerText = convertToBanglaTime(convertTo12HourFormat(
                                            timings.Fajr));
                                        document.getElementById('dhuhr-time').innerText = convertToBanglaTime(convertTo12HourFormat(
                                            timings.Dhuhr));
                                        document.getElementById('asr-time').innerText = convertToBanglaTime(convertTo12HourFormat(
                                            timings.Asr));
                                        document.getElementById('maghrib-time').innerText = convertToBanglaTime(convertTo12HourFormat(
                                            timings.Maghrib));
                                        document.getElementById('isha-time').innerText = convertToBanglaTime(convertTo12HourFormat(
                                            timings.Isha));
                                    } else {
                                        console.error("Unexpected data structure:", data);
                                        alert("Could not retrieve prayer times.");
                                    }
                                })
                                .catch(error => {
                                    console.error("Error fetching prayer times:", error);
                                    alert("There was an error fetching prayer times. Please try again later.");
                                });
                        }

                        // Function to convert time to Bangla format
                        function convertToBanglaTime(time) {
                            const banglaDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                            return time.replace(/\d/g, digit => banglaDigits[digit]);
                        }

                        // Function to convert 24-hour time format to 12-hour format with "দিন" or "রাত"
                        function convertTo12HourFormat(time) {
                            const [hours, minutes] = time.split(':');
                            let hours12 = parseInt(hours, 10);
                            let period = '';

                            if (hours12 >= 6 && hours12 < 18) { // 6 AM to 6 PM
                                period = 'দিন';
                            } else {
                                period = 'রাত';
                            }

                            // Convert to 12-hour format
                            if (hours12 > 12) {
                                hours12 -= 12;
                            } else if (hours12 === 0) {
                                hours12 = 12;
                            }

                            return `${hours12}:${minutes} ${period}`;
                        }

                        // Get user's location and fetch prayer times
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(position => {
                                const latitude = position.coords.latitude;
                                const longitude = position.coords.longitude;

                                // Fetch prayer times for the current location
                                getPrayerTimes(latitude, longitude);
                            }, error => {
                                console.error("Error getting location:", error);
                                alert("Could not get your location. Please enable location services.");
                            });
                        } else {
                            alert("Geolocation is not supported by this browser.");
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>


    {{-- রাজনীতি জাতীয় news list --------- --}}

    <div class="container mx-auto my-8 p-2 md:p-4">
        <div class="grid grid-cols-12">
            <div class="col-span-12 md:col-span-6 p-0 px-1 px-md-2">
                @if ($posts['OneNationalPost'])
                    <div class="type py-2 border-b-4 border-double border-green-600 text-2xl font-bold text-gray-800">
                        <i class="ri-file-text-line"></i>
                        <a href="{{ route('category.post', ['id' => $posts['OneNationalPost']->category_id, 'name' => $posts['OneNationalPost']->category->name]) }}"
                            class="text-gray-700 hover:text-green-600">
                            <span>জাতীয়</span>
                        </a>
                    </div>
                @endif
                <div class="grid grid-cols-12 gap-2 mt-4">
                    <div class="col-span-12 md:col-span-6 border-r pr-0 md:pr-2">
                        @if ($posts['OneNationalPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneNationalPost']->id, 'name' => $posts['OneNationalPost']->category->name]) }}"
                                class="d-block" id="hover">
                                <div class="img">
                                    <img src="{{ asset('storage/' . $posts['OneNationalPost']->image) }}"
                                        class="w-100" alt="">
                                </div>
                                <div class="my-1">
                                    <span
                                        class="text-xl font-bold text-gray-700">{{ $posts['OneNationalPost']->title }}</span>
                                </div>
                                <div class="text">
                                    <span class="text-gray-700 text-lg line-clamp-4">
                                        {{ $posts['OneNationalPost']->subtitle }}
                                    </span>
                                </div>
                            </a>
                        @endif
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        @foreach ($posts['NationalPost'] as $post)
                            <a class="block {{ $loop->first ? '' : 'py-2' }} {{ $loop->last ? '' : 'border-b' }}"
                                href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}">
                                <div class="flex items-center">
                                    <div class="img flex-shrink-0 w-24 h-16">
                                        <img src="{{ asset('storage/' . $post->image) }}"
                                            class="w-full h-full object-cover" alt="">
                                    </div>
                                    <div class="ml-2 title text-gray-700 text-lg line-clamp-2 font-medium">
                                        {{ $post->title }}</div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-span-12 md:col-span-6 p-0 px-1 px-md-2">
                @if ($posts['OnePoliticsPost'])
                    <div class="type py-2 border-b-4 border-double border-green-600 text-2xl font-bold text-gray-800">
                        <i class="ri-file-text-line"></i>
                        <a href="{{ route('category.post', ['id' => $posts['OnePoliticsPost']->category_id, 'name' => $posts['OnePoliticsPost']->category->name]) }}"
                            class="text-gray-700 hover:text-green-600">
                            <span>রাজনীতি</span>
                        </a>
                    </div>
                @endif
                <div class="grid grid-cols-12 gap-2 mt-4">
                    <div class="col-span-12 md:col-span-6 border-r pr-0 md:pr-2">
                        @if ($posts['OnePoliticsPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OnePoliticsPost']->id, 'name' => $posts['OnePoliticsPost']->category->name]) }}"
                                class="d-block" id="hover">
                                <div class="img">
                                    <img src="{{ asset('storage/' . $posts['OnePoliticsPost']->image) }}"
                                        class="w-100" alt="">
                                </div>
                                <div class="my-1">
                                    <span
                                        class="text-xl font-bold text-gray-700">{{ $posts['OnePoliticsPost']->title }}</span>
                                </div>
                                <div class="text">
                                    <span class="text-gray-700 text-lg line-clamp-4">
                                        {{ $posts['OnePoliticsPost']->subtitle }}
                                    </span>
                                </div>
                            </a>
                        @endif
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        @foreach ($posts['PoliticsPost'] as $post)
                            <a class="block {{ $loop->first ? 'pt-0' : 'py-2' }} {{ $loop->last ? '' : 'border-b' }}"
                                href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}">
                                <div class="flex items-center">
                                    <div class="img flex-shrink-0 w-24 h-16">
                                        <img src="{{ asset('storage/' . $post->image) }}"
                                            class="w-full h-full object-cover" alt="">
                                    </div>
                                    <div class="ml-2 title text-gray-700 text-lg line-clamp-2 font-medium">
                                        {{ $post->title }}</div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- সারাদেশ all country news --}}

    <div class="container mx-auto mt-8 p-2 md:p-4">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12">
                @if ($posts['OneCountryPost'])
                    <div class="type py-2 border-b-4 border-double border-green-600 text-2xl font-bold text-gray-800">
                        <i class="ri-file-text-line"></i>
                        <a href="{{ route('category.post', ['id' => $posts['OneCountryPost']->category_id, 'name' => $posts['OneCountryPost']->category->name]) }}"
                            class="text-gray-700 hover:text-green-600">
                            <span>সারাদেশ</span>
                        </a>
                    </div>
                @endif
            </div>

            <div class="col-span-12 mt-2">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

                    {{-- Main Featured Post --}}
                    <div class="col-span-1">
                        @if ($posts['OneCountryPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneCountryPost']->id, 'name' => $posts['OneCountryPost']->category->name]) }}"
                                class="block">
                                <div class="img mb-2">
                                    <img src="{{ asset('storage/' . $posts['OneCountryPost']->image) }}"
                                        class="w-full object-cover" alt="">
                                </div>
                                <div class="title line-clamp-2 text-xl font-semibold text-gray-700 mb-1">
                                    {{ $posts['OneCountryPost']->title }}</div>
                                <div class="text text-gray-700 text-lg line-clamp-3">
                                    {{ $posts['OneCountryPost']->subtitle }}</div>
                            </a>
                        @endif
                    </div>

                    {{-- Smaller Featured Posts --}}
                    <div class="col-span-1 border-t lg:border-t-0 lg:border-l border-gray-300 pt-4 lg:pt-0 lg:pl-4">
                        @foreach ($posts['CountryPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="block {{ $loop->first ? 'pt-0' : 'py-2' }} {{ $loop->last ? '' : 'border-b' }}">
                                <div class="flex items-center">
                                    <div class="img flex-shrink-0 w-24 h-16">
                                        <img src="{{ asset('storage/' . $post->image) }}"
                                            class="w-full h-full object-cover" alt="">
                                    </div>
                                    <div class="ml-2 title text-gray-700 text-lg line-clamp-2 font-medium">
                                        {{ $post->title }}</div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="col-span-1 border-t lg:border-t-0 lg:border-l border-gray-300 pt-4 lg:pt-0 lg:pl-4">
                        @foreach ($posts['CountryPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="block {{ $loop->first ? 'pt-0' : 'py-2' }} {{ $loop->last ? '' : 'border-b' }}">
                                <div class="flex items-center">
                                    <div class="img flex-shrink-0 w-24 h-16">
                                        <img src="{{ asset('storage/' . $post->image) }}"
                                            class="w-full h-full object-cover" alt="">
                                    </div>
                                    <div class="ml-2 title text-gray-700 text-lg line-clamp-2 font-medium">
                                        {{ $post->title }}</div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- আন্তর্জাতিক রাজধানী news list --------- --}}

    <div class="container mx-auto my-8 p-2 md:p-4">
        <div class="grid grid-cols-12">
            <div class="col-span-12 md:col-span-6 p-0 px-1 px-md-2">
                @if ($posts['OneInternationalPost'])
                    <div class="type py-2 border-b-4 border-double border-green-600 text-2xl font-bold text-gray-800">
                        <i class="ri-file-text-line"></i>
                        <a href="{{ route('category.post', ['id' => $posts['OneInternationalPost']->category_id, 'name' => $posts['OneInternationalPost']->category->name]) }}"
                            class="text-gray-700 hover:text-green-600">
                            <span>আন্তর্জাতিক</span>
                        </a>
                    </div>
                @endif
                <div class="grid grid-cols-12 gap-2 mt-4">
                    <div class="col-span-12 md:col-span-6 border-r pr-0 md:pr-2">
                        @if ($posts['OneInternationalPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneInternationalPost']->id, 'name' => $posts['OneInternationalPost']->category->name]) }}"
                                class="d-block" id="hover">
                                <div class="img">
                                    <img src="{{ asset('storage/' . $posts['OneInternationalPost']->image) }}"
                                        class="w-100" alt="">
                                </div>
                                <div class="my-1">
                                    <span
                                        class="text-xl font-bold text-gray-700">{{ $posts['OneInternationalPost']->title }}</span>
                                </div>
                                <div class="text">
                                    <span class="text-gray-700 text-lg line-clamp-4">
                                        {{ $posts['OneInternationalPost']->subtitle }}
                                    </span>
                                </div>
                            </a>
                        @endif
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        @foreach ($posts['InternationalPost'] as $post)
                            <a class="block {{ $loop->first ? 'pt-0' : 'py-2' }} {{ $loop->last ? '' : 'border-b' }}"
                                href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}">
                                <div class="flex items-center">
                                    <div class="img flex-shrink-0 w-24 h-16">
                                        <img src="{{ asset('storage/' . $post->image) }}"
                                            class="w-full h-full object-cover" alt="">
                                    </div>
                                    <div class="ml-2 title text-gray-700 text-lg line-clamp-2 font-medium">
                                        {{ $post->title }}</div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-span-12 md:col-span-6 p-0 px-1 px-md-2">
                @if ($posts['OneCapitalPost'])
                    <div class="type py-2 border-b-4 border-double border-green-600 text-2xl font-bold text-gray-800">
                        <i class="ri-file-text-line"></i>
                        <a href="{{ route('category.post', ['id' => $posts['OnePoliticsPost']->category_id, 'name' => $posts['OnePoliticsPost']->category->name]) }}"
                            class="text-gray-700 hover:text-green-600">
                            <span>রাজধানী</span>
                        </a>
                    </div>
                @endif
                <div class="grid grid-cols-12 gap-2 mt-4">
                    <div class="col-span-12 md:col-span-6 border-r pr-0 md:pr-2">
                        @if ($posts['OneCapitalPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneCapitalPost']->id, 'name' => $posts['OneCapitalPost']->category->name]) }}"
                                class="d-block" id="hover">
                                <div class="img">
                                    <img src="{{ asset('storage/' . $posts['OneCapitalPost']->image) }}"
                                        class="w-100" alt="">
                                </div>
                                <div class="my-1">
                                    <span
                                        class="text-xl font-bold text-gray-700">{{ $posts['OneCapitalPost']->title }}</span>
                                </div>
                                <div class="text">
                                    <span class="text-gray-700 text-lg line-clamp-4">
                                        {{ $posts['OneCapitalPost']->subtitle }}
                                    </span>
                                </div>
                            </a>
                        @endif
                    </div>
                    <div class="col-span-12 md:col-span-6">
                        @foreach ($posts['CapitalPost'] as $post)
                            <a class="block {{ $loop->first ? 'pt-0' : 'py-2' }} {{ $loop->last ? '' : 'border-b' }}"
                                href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}">
                                <div class="flex items-center">
                                    <div class="img flex-shrink-0 w-24 h-16">
                                        <img src="{{ asset('storage/' . $post->image) }}"
                                            class="w-full h-full object-cover" alt="">
                                    </div>
                                    <div class="ml-2 title text-gray-700 text-lg line-clamp-2 font-medium">
                                        {{ $post->title }}</div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- বিনোদন news list --}}
    <div class="container mx-auto my-8 p-2 md:p-4">
        @if ($posts['EntertainmentPost'])
            <div class="type py-2 border-b-4 border-double border-green-600 text-2xl font-bold text-gray-800">
                <i class="ri-file-text-line"></i>
                <a href="{{ route('category.post', ['id' => $posts['EntertainmentPost']->first()->category_id, 'name' => $posts['EntertainmentPost']->first()->category->name]) }}"
                    class="text-gray-700 hover:text-green-600">
                    <span>বিনোদন</span>
                </a>
            </div>
        @endif
        <div class="row py-3 grid lg:grid-cols-3 gap-4">
            <div class="col border-r lg:border-r border-gray-300 pr-4">
                @foreach ($posts['EntertainmentPost'] as $post)
                    <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                        class="block {{ $loop->first ? 'pt-0' : 'py-2' }} {{ $loop->last ? '' : 'border-b' }}">
                        <div class="flex items-center">
                            <div class="img flex-shrink-0 w-24 h-16">
                                <img class="w-full h-full object-cover" src="{{ asset('storage/' . $post->image) }}"
                                    alt="">
                            </div>
                            <div class="ml-2 title text-lg font-medium text-gray-700">
                                <span>{{ $post->title }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="col">
                @if ($posts['OneEntertainmentPost'])
                    <a
                        href="{{ route('view.post', ['id' => $posts['OneEntertainmentPost']->id, 'name' => $posts['OneEntertainmentPost']->category->name]) }}">
                        <div class="flex-shrink-0 img w-full">
                            <img src="{{ asset('storage/' . $posts['OneEntertainmentPost']->image) }}"
                                class="w-full h-auto object-cover" alt="">
                        </div>
                        <div class="title py-2 text-xl font-bold text-gray-700">
                            <span>{{ $posts['OneEntertainmentPost']->title }}</span>
                        </div>
                    </a>
                @endif
            </div>

            <div class="col border-t lg:border-l lg:border-t-0 border-gray-300 lg:pl-4 pt-4 lg:pt-0">
                @foreach ($posts['EntertainmentPost'] as $post)
                    <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                        class="block {{ $loop->first ? 'pt-0' : 'py-2' }} {{ $loop->last ? '' : 'border-b' }}">
                        <div class="flex items-center">
                            <div class="img flex-shrink-0 w-24 h-16 overflow-hidden">
                                <img class="w-full h-full object-cover" src="{{ asset('storage/' . $post->image) }}"
                                    alt="">
                            </div>
                            <div class="ml-2 title text-lg font-medium text-gray-700">
                                <span>{{ $post->title }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>


    {{-- অর্থনীতি এবং খেলা news list --}}
    <div class="container mx-auto my-8 p-2 md:p-4">
        <div class="flex flex-wrap">
            <div class="lg:w-3/4 w-full px-0 md:px-1">
                @if ($posts['OneSportsPost'])
                    <div class="type py-2 border-b-4 border-double border-green-600 text-2xl font-bold text-gray-800">
                        <i class="ri-file-text-line"></i>
                        <a href="{{ route('category.post', ['id' => $posts['OneSportsPost']->category_id, 'name' => $posts['OneSportsPost']->category->name]) }}"
                            class="text-gray-700 hover:text-green-600">
                            <span>খেলা</span>
                        </a>
                    </div>
                @endif
                <div class="flex flex-wrap py-3">
                    <div class="lg:w-7/12 w-full border-0 md:border-r border-gray-300 pr-2">
                        @if ($posts['OneSportsPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneSportsPost']->id, 'name' => $posts['OneSportsPost']->category->name]) }}"
                                class="block hover:underline">
                                <div class="img">
                                    <img src="{{ asset('storage/' . $posts['OneSportsPost']->image) }}"
                                        class="w-full" alt="">
                                </div>
                                <div class="title mt-2 font-bold text-xl text-gray-700 line-clamp-2">
                                    <span>{{ $posts['OneSportsPost']->title }}</span>
                                </div>
                                <div class="my-2 border-b border-gray-300"></div>
                            </a>
                        @endif
                        <div class="grid grid-cols-2 gap-2">
                            @foreach ($posts['TowSportsPost'] as $post)
                                <div class="col-span-1">
                                    <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                        class="block">
                                        <div class="img h-36">
                                            <img src="{{ asset('storage/' . $post->image) }}"
                                                class="w-full h-full object-cover" alt="">
                                        </div>
                                        <div class="title mt-2 text-xl text-gray-700 line-clamp-2">
                                            <span>{{ $post->title }}</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="lg:w-5/12 w-full py-2 lg:py-0 border-0 md:border-r px-0 md:px-2 border-gray-300">
                        @foreach ($posts['EightSportsPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="block {{ $loop->first ? 'pt-0' : 'py-2' }} {{ $loop->last ? '' : 'border-b' }}">
                                <div class="flex items-center">
                                    <div class="w-24 flex-shrink-0 h-16">
                                        <img src="{{ asset('storage/' . $post->image) }}"
                                            class="w-full h-full object-cover" alt="">
                                    </div>
                                    <div class="title text-lg ml-2 text-gray-700 line-clamp-2">
                                        <span>{{ $post->title }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="lg:w-1/4 w-full px-0 md:px-1">
                @if ($posts['OneEconomyPost'])
                    <div class="type py-2 border-b-4 border-double border-green-600 text-2xl font-bold text-gray-800">
                        <i class="ri-file-text-line"></i>
                        <a href="{{ route('category.post', ['id' => $posts['OneEconomyPost']->category_id, 'name' => $posts['OneEconomyPost']->category->name]) }}"
                            class="text-gray-700 hover:text-green-600">
                            <span>অর্থনীতি</span>
                        </a>
                    </div>
                @endif
                <div class="py-3">
                    @if ($posts['OneEconomyPost'])
                        <a href="{{ route('view.post', ['id' => $posts['OneEconomyPost']->id, 'name' => $posts['OneEconomyPost']->category->name]) }}"
                            class="block">
                            <div class="img">
                                <img src="{{ asset('storage/' . $posts['OneEconomyPost']->image) }}" class="w-full"
                                    alt="">
                            </div>
                            <div class="title mt-2 text-xl text-gray-700 font-semibold line-clamp-2">
                                <span>{{ $posts['OneEconomyPost']->title }}</span>
                            </div>
                            <div class="text text-lg text-gray-700 line-clamp-2 mt-1">
                                <span>{{ $posts['OneEconomyPost']->subtitle }}</span>
                            </div>
                        </a>
                    @endif
                    <div class="mt-3">
                        @foreach ($posts['ForEconomyPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="block {{ $loop->first ? 'pt-0' : 'py-2' }} {{ $loop->last ? '' : 'border-b' }}">
                                <div class="flex items-center">
                                    <div class="w-24 flex-shrink-0 h-16">
                                        <img src="{{ asset('storage/' . $post->image) }}"
                                            class="w-full h-full object-cover" alt="">
                                    </div>
                                    <div class="title ml-2 text-lg text-gray-700 line-clamp-2">
                                        <span>{{ $post->title }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container mx-auto my-8 p-2 md:p-4">
        <div class="grid grid-cols-12 gap-2">
            <!-- আইন-আদালত Section -->
            <div class="col-span-12 md:col-span-4">
                @if ($posts['OneCourtPost'])
                    <div class="type py-2 border-b-4 border-double border-green-600 text-2xl font-bold text-gray-800">
                        <i class="ri-file-text-line"></i>
                        <a href="{{ route('category.post', ['id' => $posts['OneCourtPost']->category_id, 'name' => $posts['OneCourtPost']->category->name]) }}"
                            class="text-gray-700 hover:text-green-600">
                            <span>আইন-আদালত</span>
                        </a>
                    </div>
                @endif
                <div class="flex flex-col py-3 border-0 md:border-r pr-0 md:pr-2">
                    <div class="w-full">
                        @if ($posts['OneCourtPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneCourtPost']->id, 'name' => $posts['OneCourtPost']->category->name]) }}"
                                class="block hover:text-[#007377]">
                                <div class="overflow-hidden">
                                    <img src="{{ asset('storage/' . $posts['OneCourtPost']->image) }}"
                                        class="w-full" alt="">
                                </div>
                                <div class="my-2 text-xl font-bold text-gray-700 line-clamp-2">
                                    <span>{{ $posts['OneCourtPost']->title }}</span>
                                </div>
                                <div class="mb-1 text-lg text-gray-700 line-clamp-2">
                                    <span>{{ $posts['OneCourtPost']->subtitle }}</span>
                                </div>
                                <div class="my-3 border-b border-gray-300"></div>
                            </a>
                        @endif
                    </div>
                    <div class="w-full">
                        @foreach ($posts['TCourtPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="block flex items-start gap-2 border-b py-1">
                                <div class="mt-2 h-4 w-4 bg-[#007377] rounded"></div>
                                <div class="text-lg text-gray-800 line-clamp-2 font-medium">
                                    <span>{{ $post->title }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- মুখোমুখি Section -->
            <div class="col-span-12 md:col-span-4">
                @if ($posts['OneFacePost'])
                    <div class="type py-2 border-b-4 border-double border-green-600 text-2xl font-bold text-gray-800">
                        <i class="ri-file-text-line"></i>
                        <a href="{{ route('category.post', ['id' => $posts['OneFacePost']->category_id, 'name' => $posts['OneFacePost']->category->name]) }}"
                            class="text-gray-700 hover:text-green-600">
                            <span>মুখোমুখি</span>
                        </a>
                    </div>
                @endif
                <div class="flex flex-col py-3 border-0 md:border-r pr-0 md:pr-2">
                    <div class="w-full">
                        @if ($posts['OneFacePost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneFacePost']->id, 'name' => $posts['OneFacePost']->category->name]) }}"
                                class="block hover:text-[#007377]">
                                <div class="overflow-hidden">
                                    <img src="{{ asset('storage/' . $posts['OneFacePost']->image) }}" class="w-full"
                                        alt="">
                                </div>
                                <div class="my-2 text-xl font-bold text-gray-700 line-clamp-2">
                                    <span>{{ $posts['OneFacePost']->title }}</span>
                                </div>
                                <div class="mb-1 text-lg text-gray-700 line-clamp-2">
                                    <span>{{ $posts['OneFacePost']->subtitle }}</span>
                                </div>
                                <div class="my-3 border-b border-gray-300"></div>
                            </a>
                        @endif
                    </div>
                    <div class="w-full">
                        @foreach ($posts['TFacePost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="block flex items-start gap-2 border-b py-1">
                                <div class="mt-2 h-4 w-4 bg-[#007377] rounded"></div>
                                <div class="text-lg text-gray-800 line-clamp-2 font-medium">
                                    <span>{{ $post->title }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- স্বাস্থ্য ও চিকিৎসাSection -->
            <div class="col-span-12 md:col-span-4">
                @if ($posts['OneHealthPost'])
                    <div class="type py-2 border-b-4 border-double border-green-600 text-2xl font-bold text-gray-800">
                        <i class="ri-file-text-line"></i>
                        <a href="{{ route('category.post', ['id' => $posts['OneHealthPost']->category_id, 'name' => $posts['OneHealthPost']->category->name]) }}"
                            class="text-gray-700 hover:text-green-600">
                            <span>স্বাস্থ্য ও চিকিৎসা</span>
                        </a>
                    </div>
                @endif
                <div class="flex flex-col py-3 border-0 md:border-r pr-0 md:pr-2">
                    <div class="w-full">
                        @if ($posts['OneHealthPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneHealthPost']->id, 'name' => $posts['OneHealthPost']->category->name]) }}"
                                class="block hover:text-[#007377]">
                                <div class="overflow-hidden">
                                    <img src="{{ asset('storage/' . $posts['OneHealthPost']->image) }}"
                                        class="w-full" alt="">
                                </div>
                                <div class="my-2 text-xl font-bold text-gray-700 line-clamp-2">
                                    <span>{{ $posts['OneHealthPost']->title }}</span>
                                </div>
                                <div class="mb-1 text-lg text-gray-700 line-clamp-2">
                                    <span>{{ $posts['OneHealthPost']->subtitle }}</span>
                                </div>
                                <div class="my-3 border-b border-gray-300"></div>
                            </a>
                        @endif
                    </div>
                    <div class="w-full">
                        @foreach ($posts['THealthPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="block flex items-start gap-2 border-b py-1">
                                <div class="mt-2 h-4 w-4 bg-[#007377] rounded"></div>
                                <div class="text-lg text-gray-800 line-clamp-2 font-medium">
                                    <span>{{ $post->title }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- লাইফস্টাইল news list

    <div class="container topM px-1">
        @if ($posts['LifestylePost'])
            <div class="type py-2"
                style="border-bottom: 4px double #75ac9d; font-size: 24px; font-weight:700; color:#333;">
                <i class="ri-file-text-line"></i>
                <a href="{{ route('category.post', ['id' => $posts['LifestylePost']->first()->category_id, 'name' => $posts['LifestylePost']->first()->category->name]) }}"
                    id="hoverType"><span>লাইফস্টাইল</span></a>
            </div>
        @endif
        <div class="row py-2">
            @foreach ($posts['LifestylePost'] as $post)
                <div class="col-lg-3 col-md-12" style="border-right:1px solid #ccc">
                    <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                        class="b-block">
                        <div class="img">
                            <img src="{{ asset('storage/' . $post->image) }}" class="w-100" alt="">
                        </div>
                        <div class="title my-2"
                            style="font-size: 17px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                            <span>{{ $post->title }}</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div> --}}

    <div class="container mx-auto my-8 p-2 md:p-4">
        <div class="grid grid-cols-12 gap-2">
            <!-- ধর্ম Section -->
            <div class="col-span-12 md:col-span-4">
                @if ($posts['OneReligionPost'])
                    <div class="type py-2 border-b-4 border-double border-green-600 text-2xl font-bold text-gray-800">
                        <i class="ri-file-text-line"></i>
                        <a href="{{ route('category.post', ['id' => $posts['OneReligionPost']->category_id, 'name' => $posts['OneReligionPost']->category->name]) }}"
                            class="text-gray-700 hover:text-green-600">
                            <span>ধর্ম</span>
                        </a>
                    </div>
                @endif
                <div class="flex flex-col py-3 border-0 md:border-r pr-0 md:pr-2">
                    <div class="w-full">
                        @if ($posts['OneReligionPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneReligionPost']->id, 'name' => $posts['OneReligionPost']->category->name]) }}"
                                class="block hover:text-[#007377]">
                                <div class="overflow-hidden">
                                    <img src="{{ asset('storage/' . $posts['OneReligionPost']->image) }}"
                                        class="w-full" alt="">
                                </div>
                                <div class="my-2 text-xl font-bold text-gray-700 line-clamp-2">
                                    <span>{{ $posts['OneReligionPost']->title }}</span>
                                </div>
                                <div class="mb-1 text-lg text-gray-700 line-clamp-2">
                                    <span>{{ $posts['OneReligionPost']->subtitle }}</span>
                                </div>
                                <div class="my-3 border-b border-gray-300"></div>
                            </a>
                        @endif
                    </div>
                    <div class="w-full">
                        @foreach ($posts['TReligionPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="block flex items-start gap-2 border-b py-1">
                                <div class="mt-2 h-4 w-4 bg-[#007377] rounded"></div>
                                <div class="text-lg text-gray-800 line-clamp-2 font-medium">
                                    <span>{{ $post->title }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- শিল্প-সাহিত্য Section -->
            <div class="col-span-12 md:col-span-4">
                @if ($posts['OneLiteraturePost'])
                    <div class="type py-2 border-b-4 border-double border-green-600 text-2xl font-bold text-gray-800">
                        <i class="ri-file-text-line"></i>
                        <a href="{{ route('category.post', ['id' => $posts['OneLiteraturePost']->category_id, 'name' => $posts['OneLiteraturePost']->category->name]) }}"
                            class="text-gray-700 hover:text-green-600">
                            <span>শিল্প-সাহিত্য</span>
                        </a>
                    </div>
                @endif
                <div class="flex flex-col py-3 border-0 md:border-r pr-0 md:pr-2">
                    <div class="w-full">
                        @if ($posts['OneLiteraturePost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneLiteraturePost']->id, 'name' => $posts['OneLiteraturePost']->category->name]) }}"
                                class="block hover:text-[#007377]">
                                <div class="overflow-hidden">
                                    <img src="{{ asset('storage/' . $posts['OneLiteraturePost']->image) }}"
                                        class="w-full" alt="">
                                </div>
                                <div class="my-2 text-xl font-bold text-gray-700 line-clamp-2">
                                    <span>{{ $posts['OneLiteraturePost']->title }}</span>
                                </div>
                                <div class="mb-1 text-lg text-gray-700 line-clamp-2">
                                    <span>{{ $posts['OneLiteraturePost']->subtitle }}</span>
                                </div>
                                <div class="my-3 border-b border-gray-300"></div>
                            </a>
                        @endif
                    </div>
                    <div class="w-full">
                        @foreach ($posts['TLiteraturePost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="block flex items-start gap-2 border-b py-1">
                                <div class="mt-2 h-4 w-4 bg-[#007377] rounded"></div>
                                <div class="text-lg text-gray-800 line-clamp-2 font-medium">
                                    <span>{{ $post->title }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- প্রবাস জীবন Section -->
            <div class="col-span-12 md:col-span-4">
                @if ($posts['OneExpatriatePost'])
                    <div class="type py-2 border-b-4 border-double border-green-600 text-2xl font-bold text-gray-800">
                        <i class="ri-file-text-line"></i>
                        <a href="{{ route('category.post', ['id' => $posts['OneExpatriatePost']->category_id, 'name' => $posts['OneExpatriatePost']->category->name]) }}"
                            class="text-gray-700 hover:text-green-600">
                            <span>প্রবাস জীবন</span>
                        </a>
                    </div>
                @endif
                <div class="flex flex-col py-3 border-0 md:border-r pr-0 md:pr-2">
                    <div class="w-full">
                        @if ($posts['OneExpatriatePost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneExpatriatePost']->id, 'name' => $posts['OneExpatriatePost']->category->name]) }}"
                                class="block hover:text-[#007377]">
                                <div class="overflow-hidden">
                                    <img src="{{ asset('storage/' . $posts['OneExpatriatePost']->image) }}"
                                        class="w-full" alt="">
                                </div>
                                <div class="my-2 text-xl font-bold text-gray-700 line-clamp-2">
                                    <span>{{ $posts['OneExpatriatePost']->title }}</span>
                                </div>
                                <div class="mb-1 text-lg text-gray-700 line-clamp-2">
                                    <span>{{ $posts['OneExpatriatePost']->subtitle }}</span>
                                </div>
                                <div class="my-3 border-b border-gray-300"></div>
                            </a>
                        @endif
                    </div>
                    <div class="w-full">
                        @foreach ($posts['TExpatriatePost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="block flex items-start gap-2 border-b py-1">
                                <div class="mt-2 h-4 w-4 bg-[#007377] rounded"></div>
                                <div class="text-lg text-gray-800 line-clamp-2 font-medium">
                                    <span>{{ $post->title }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- শিক্ষাঙ্গন মজার খবর সাতরং news list --}}

    <div class="container mx-auto my-8 p-2 md:p-4">
        <div class="grid grid-cols-12 gap-2">
            <!-- শিক্ষাঙ্গন Section -->
            <div class="col-span-12 md:col-span-4">
                @if ($posts['OneSchoolPost'])
                    <div class="type py-2 border-b-4 border-double border-green-600 text-2xl font-bold text-gray-800">
                        <i class="ri-file-text-line"></i>
                        <a href="{{ route('category.post', ['id' => $posts['OneSchoolPost']->category_id, 'name' => $posts['OneSchoolPost']->category->name]) }}"
                            class="text-gray-700 hover:text-green-600">
                            <span>শিক্ষাঙ্গন</span>
                        </a>
                    </div>
                @endif
                <div class="flex flex-col py-3 border-0 md:border-r pr-0 md:pr-2">
                    <div class="w-full">
                        @if ($posts['OneSchoolPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneSchoolPost']->id, 'name' => $posts['OneSchoolPost']->category->name]) }}"
                                class="block hover:text-[#007377]">
                                <div class="overflow-hidden">
                                    <img src="{{ asset('storage/' . $posts['OneSchoolPost']->image) }}"
                                        class="w-full" alt="">
                                </div>
                                <div class="my-2 text-xl font-bold text-gray-700 line-clamp-2">
                                    <span>{{ $posts['OneSchoolPost']->title }}</span>
                                </div>
                                <div class="mb-1 text-lg text-gray-700 line-clamp-2">
                                    <span>{{ $posts['OneSchoolPost']->subtitle }}</span>
                                </div>
                                <div class="my-3 border-b border-gray-300"></div>
                            </a>
                        @endif
                    </div>
                    <div class="w-full">
                        @foreach ($posts['TSchoolPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="block flex items-start gap-2 border-b py-1">
                                <div class="mt-2 h-4 w-4 bg-[#007377] rounded"></div>
                                <div class="text-lg text-gray-800 line-clamp-2 font-medium">
                                    <span>{{ $post->title }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- মজার খবরSection -->
            <div class="col-span-12 md:col-span-4">
                @if ($posts['OneFunPost'])
                    <div class="type py-2 border-b-4 border-double border-green-600 text-2xl font-bold text-gray-800">
                        <i class="ri-file-text-line"></i>
                        <a href="{{ route('category.post', ['id' => $posts['OneFunPost']->category_id, 'name' => $posts['OneFunPost']->category->name]) }}"
                            class="text-gray-700 hover:text-green-600">
                            <span>মজার খবর</span>
                        </a>
                    </div>
                @endif
                <div class="flex flex-col py-3 border-0 md:border-r pr-0 md:pr-2">
                    <div class="w-full">
                        @if ($posts['OneFunPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneFunPost']->id, 'name' => $posts['OneFunPost']->category->name]) }}"
                                class="block hover:text-[#007377]">
                                <div class="overflow-hidden">
                                    <img src="{{ asset('storage/' . $posts['OneFunPost']->image) }}" class="w-full"
                                        alt="">
                                </div>
                                <div class="my-2 text-xl font-bold text-gray-700 line-clamp-2">
                                    <span>{{ $posts['OneFunPost']->title }}</span>
                                </div>
                                <div class="mb-1 text-lg text-gray-700 line-clamp-2">
                                    <span>{{ $posts['OneFunPost']->subtitle }}</span>
                                </div>
                                <div class="my-3 border-b border-gray-300"></div>
                            </a>
                        @endif
                    </div>
                    <div class="w-full">
                        @foreach ($posts['TFunPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="block flex items-start gap-2 border-b py-1">
                                <div class="mt-2 h-4 w-4 bg-[#007377] rounded"></div>
                                <div class="text-lg text-gray-800 line-clamp-2 font-medium">
                                    <span>{{ $post->title }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- সাতরং Section -->
            <div class="col-span-12 md:col-span-4">
                @if ($posts['OneSevenPost'])
                    <div class="type py-2 border-b-4 border-double border-green-600 text-2xl font-bold text-gray-800">
                        <i class="ri-file-text-line"></i>
                        <a href="{{ route('category.post', ['id' => $posts['OneSevenPost']->category_id, 'name' => $posts['OneSevenPost']->category->name]) }}"
                            class="text-gray-700 hover:text-green-600">
                            <span>সাতরং</span>
                        </a>
                    </div>
                @endif
                <div class="flex flex-col py-3 border-0 md:border-r pr-0 md:pr-2">
                    <div class="w-full">
                        @if ($posts['OneSevenPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneSevenPost']->id, 'name' => $posts['OneSevenPost']->category->name]) }}"
                                class="block hover:text-[#007377]">
                                <div class="overflow-hidden">
                                    <img src="{{ asset('storage/' . $posts['OneSevenPost']->image) }}"
                                        class="w-full" alt="">
                                </div>
                                <div class="my-2 text-xl font-bold text-gray-700 line-clamp-2">
                                    <span>{{ $posts['OneSevenPost']->title }}</span>
                                </div>
                                <div class="mb-1 text-lg text-gray-700 line-clamp-2">
                                    <span>{{ $posts['OneSevenPost']->subtitle }}</span>
                                </div>
                                <div class="my-3 border-b border-gray-300"></div>
                            </a>
                        @endif
                    </div>
                    <div class="w-full">
                        @foreach ($posts['TSevenPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="block flex items-start gap-2 border-b py-1">
                                <div class="mt-2 h-4 w-4 bg-[#007377] rounded"></div>
                                <div class="text-lg text-gray-800 line-clamp-2 font-medium">
                                    <span>{{ $post->title }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container mx-auto my-8 p-2 md:p-4">
        <div class="grid grid-cols-12 gap-2">
            <!-- ফিচার Section -->
            <div class="col-span-12 md:col-span-4">
                @if ($posts['OneFeaturePost'])
                    <div class="type py-2 border-b-4 border-double border-green-600 text-2xl font-bold text-gray-800">
                        <i class="ri-file-text-line"></i>
                        <a href="{{ route('category.post', ['id' => $posts['OneFeaturePost']->category_id, 'name' => $posts['OneFeaturePost']->category->name]) }}"
                            class="text-gray-700 hover:text-green-600">
                            <span>ফিচার</span>
                        </a>
                    </div>
                @endif
                <div class="flex flex-col py-3 border-0 md:border-r pr-0 md:pr-2">
                    <div class="w-full">
                        @if ($posts['OneFeaturePost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneFeaturePost']->id, 'name' => $posts['OneFeaturePost']->category->name]) }}"
                                class="block hover:text-[#007377]">
                                <div class="overflow-hidden">
                                    <img src="{{ asset('storage/' . $posts['OneFeaturePost']->image) }}"
                                        class="w-full" alt="">
                                </div>
                                <div class="my-2 text-xl font-bold text-gray-700 line-clamp-2">
                                    <span>{{ $posts['OneFeaturePost']->title }}</span>
                                </div>
                                <div class="mb-1 text-lg text-gray-700 line-clamp-2">
                                    <span>{{ $posts['OneFeaturePost']->subtitle }}</span>
                                </div>
                                <div class="my-3 border-b border-gray-300"></div>
                            </a>
                        @endif
                    </div>
                    <div class="w-full">
                        @foreach ($posts['TFeaturePost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="block flex items-start gap-2 border-b py-1">
                                <div class="mt-2 h-4 w-4 bg-[#007377] rounded"></div>
                                <div class="text-lg text-gray-800 line-clamp-2 font-medium">
                                    <span>{{ $post->title }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- জব কর্নারSection -->
            <div class="col-span-12 md:col-span-4">
                @if ($posts['OneJobPost'])
                    <div class="type py-2 border-b-4 border-double border-green-600 text-2xl font-bold text-gray-800">
                        <i class="ri-file-text-line"></i>
                        <a href="{{ route('category.post', ['id' => $posts['OneJobPost']->category_id, 'name' => $posts['OneJobPost']->category->name]) }}"
                            class="text-gray-700 hover:text-green-600">
                            <span>জব কর্নার</span>
                        </a>
                    </div>
                @endif
                <div class="flex flex-col py-3 border-0 md:border-r pr-0 md:pr-2">
                    <div class="w-full">
                        @if ($posts['OneJobPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneJobPost']->id, 'name' => $posts['OneJobPost']->category->name]) }}"
                                class="block hover:text-[#007377]">
                                <div class="overflow-hidden">
                                    <img src="{{ asset('storage/' . $posts['OneJobPost']->image) }}" class="w-full"
                                        alt="">
                                </div>
                                <div class="my-2 text-xl font-bold text-gray-700 line-clamp-2">
                                    <span>{{ $posts['OneJobPost']->title }}</span>
                                </div>
                                <div class="mb-1 text-lg text-gray-700 line-clamp-2">
                                    <span>{{ $posts['OneJobPost']->subtitle }}</span>
                                </div>
                                <div class="my-3 border-b border-gray-300"></div>
                            </a>
                        @endif
                    </div>
                    <div class="w-full">
                        @foreach ($posts['TJobPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="block flex items-start gap-2 border-b py-1">
                                <div class="mt-2 h-4 w-4 bg-[#007377] rounded"></div>
                                <div class="text-lg text-gray-800 line-clamp-2 font-medium">
                                    <span>{{ $post->title }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- তথ্যপ্রযুক্তি Section -->
            <div class="col-span-12 md:col-span-4">
                @if ($posts['OneTechnologyPost'])
                    <div class="type py-2 border-b-4 border-double border-green-600 text-2xl font-bold text-gray-800">
                        <i class="ri-file-text-line"></i>
                        <a href="{{ route('category.post', ['id' => $posts['OneTechnologyPost']->category_id, 'name' => $posts['OneTechnologyPost']->category->name]) }}"
                            class="text-gray-700 hover:text-green-600">
                            <span>তথ্যপ্রযুক্তি</span>
                        </a>
                    </div>
                @endif
                <div class="flex flex-col py-3 border-0 md:border-r pr-0 md:pr-2">
                    <div class="w-full">
                        @if ($posts['OneTechnologyPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneTechnologyPost']->id, 'name' => $posts['OneTechnologyPost']->category->name]) }}"
                                class="block hover:text-[#007377]">
                                <div class="overflow-hidden">
                                    <img src="{{ asset('storage/' . $posts['OneTechnologyPost']->image) }}"
                                        class="w-full" alt="">
                                </div>
                                <div class="my-2 text-xl font-bold text-gray-700 line-clamp-2">
                                    <span>{{ $posts['OneTechnologyPost']->title }}</span>
                                </div>
                                <div class="mb-1 text-lg text-gray-700 line-clamp-2">
                                    <span>{{ $posts['OneTechnologyPost']->subtitle }}</span>
                                </div>
                                <div class="my-3 border-b border-gray-300"></div>
                            </a>
                        @endif
                    </div>
                    <div class="w-full">
                        @foreach ($posts['TTechnologyPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="block flex items-start gap-2 border-b py-1">
                                <div class="mt-2 h-4 w-4 bg-[#007377] rounded"></div>
                                <div class="text-lg text-gray-800 line-clamp-2 font-medium">
                                    <span>{{ $post->title }}</span>
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
