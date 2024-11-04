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
    <title>আর্কাইভস</title>
</head>

<body class="bg-gray-100 font-roboto">
    @include('layout.search')
    @include('layout.header')

    <div class="container mx-auto mt-12 px-2 md:px-4">
        <div class="flex justify-center border-t-2 border-[#29725e] relative">
            <div
                class="min-w-[150px] h-[40px] flex justify-center items-center bg-[#29725e] text-white font-semibold text-lg absolute transform skew-x-[-10deg] top-[-20px]">
                <span>আর্কাইভস</span>
            </div>
        </div>
    </div>

    <div class="container mx-auto mt-4">
        @livewire('archive-search')
    </div>

    @include('layout.footer')
    @include('layout.bakingnews')
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
