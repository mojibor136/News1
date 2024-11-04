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
    <title>ভিডিও</title>
</head>

<body class="bg-gray-100 font-roboto">
    @include('layout.search')
    @include('layout.header')

    <div class="container mx-auto my-12">
        <div class="flex justify-center border-t-2 border-[#29725e] relative">
            <div
                class="min-w-[150px] h-[40px] flex justify-center items-center bg-[#29725e] text-white font-semibold text-lg absolute transform skew-x-[-10deg] top-[-20px]">
                <span>ভিডিও</span>
            </div>
        </div>
    </div>

    <div class="container mx-auto mt-4 px-2 md:px-4">
        <div class="grid grid-cols-12 gap-4">
            @foreach ($videos as $video)
                <div class="col-span-12 md:col-span-9 py-2">
                    <a href="#"
                        class="block bg-[#f5f5f5] p-4 rounded-lg shadow-md hover:bg-[#e0e0e0] transition duration-200">
                        <div class="grid grid-cols-12">
                            <div class="col-span-5">
                                <iframe class="img-fluid w-full h-auto rounded" src="{{ $video->video }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </div>
                            <div class="col-span-7 px-2">
                                <div
                                    class="text-gray-800 font-semibold text-xl overflow-hidden whitespace-nowrap text-ellipsis">
                                    <span>{{ $video->title }}</span>
                                </div>
                                <div class="text-gray-700 text-lg overflow-hidden line-clamp-2 md:line-clamp-3">
                                    <span>{{ $video->title }}</span>
                                </div>
                                <div class="text-gray-600 text-base">
                                    {{ \Carbon\Carbon::parse($video->created_at)->locale('bn')->isoFormat('dddd, D MMMM YYYY, HH:mm') }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    @include('layout.footer')
    @include('layout.bakingnews')
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
