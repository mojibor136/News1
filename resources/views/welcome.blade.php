@php
    $company = getCompany();
    $post = PostTitle();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
<style>
    body::-webkit-scrollbar {
        display: block;
    }
</style>

<body>

    @include('layout.search')
    @include('layout.header')
    {{-- main content  --}}

    <div class="container mt-1">
        <div class="row py-2 border-bottom border-md-0">
            <div class="col-lg-6 col-md-12 p-0 px-md-2 px-1">
                @if ($posts['latest'])
                    <a href="{{ route('view.post', ['id' => $posts['latest']->id, 'name' => $posts['latest']->category->name]) }}"
                        class="one-post">
                        <div class="news">
                            <div class="img">
                                <img src="{{ asset('storage/' . $posts['latest']->image) }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="title mt-2">
                                <h3>{{ $posts['latest']->title }}</h3>
                                <div class="text">
                                    <span>{{ $posts['latest']->subtitle }}</span>
                                </div>
                                @php
                                    $timeAgo = \Carbon\Carbon::parse($posts['latest']->created_at)->diffForHumans();
                                @endphp
                                <div class="time px-1">
                                    <i class="ri-time-fill"></i>
                                    <span>{{ $timeAgo }}</span>
                                </div>
                            </div>
                            <div class="border"></div>
                        </div>
                    </a>
                @endif

                <div class="row">
                    @foreach ($posts['two'] as $post)
                        <div class="col-md-6 border-right">
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}">
                                <div class="mt-1">
                                    <h3 id="title-bold">
                                        {{ $post->title }}
                                    </h3>
                                    <div class="text" id="title-four">
                                        <span>
                                            {{ $post->subtitle }}
                                        </span>
                                    </div>
                                    @php
                                        $timeAgo = \Carbon\Carbon::parse($post->created_at)->diffForHumans();
                                    @endphp
                                    <div class="time">
                                        <i class="ri-time-fill"></i>
                                        <span>{{ $timeAgo }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-3 col-md-12 p-0 px-md-0 px-1">
                <div class="py-2 px-1 px-md-2 post">
                    @foreach ($posts['four'] as $post)
                        <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                            class="post-list">
                            <div class="post-content">
                                <div style="display: flex; flex-direction:row; gap:5px;">
                                    <div class="img" style="width:90px; height:60px;">
                                        <img class="w-100 h-100" src="{{ asset('storage/' . $post->image) }}"
                                            alt="">
                                    </div>
                                    <div class="title" style="flex:1;">
                                        <h4 class="m-0">
                                            {{ $post->title }}
                                        </h4>
                                    </div>
                                </div>
                                <div class="text mt-1">
                                    <span>
                                        {{ $post->subtitle }}
                                    </span>
                                    @php
                                        $timeAgo = \Carbon\Carbon::parse($post->created_at)->diffForHumans();
                                    @endphp
                                    <div class="time">
                                        <i class="ri-time-fill"></i>
                                        <span>{{ $timeAgo }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-3 col-md-12 p-0 px-md-2 px-1 py-md-0 py-4">
                @livewire('post-filter')
            </div>
        </div>
    </div>

    {{-- video gallery -------------------------- --}}
    <div class="container topM">
        <div class="video-gallery row px-1 px-md-3 py-4" style="background: #111">
            <div class="type pb-4 d-flex align-items-center gap-2"
                style="font-size: 24px; font-weight:700; color:#ddd; padding-left:3px; line-height:normal;">
                <i class="ri-film-line"></i>
                <span>ভিডিও গ্যালারি</span>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 py-1 px-1">
                <a href="" style="background: #333; display:block" id="hover">
                    <iframe class="w-100" src="{{ $videoOne->video }}" title="YouTube video player" frameborder="0"
                        allowfullscreen></iframe>
                    <div class="title" style="padding: 2px 7px 7px 10px; color: #eee; font-size:24px;">
                        <span>{{ \Illuminate\Support\Str::limit($videoOne->title, 100) }}</span>
                    </div>
                    @php
                        use Carbon\Carbon;
                        Carbon::setLocale('bn');
                    @endphp
                    <div class="time mx-2" style="padding-top:0; font-size:14px; color:#a7a7a7; padding-bottom:10px;">
                        <i class="ri-time-fill"></i>
                        <span>{{ $videoOne->created_at->diffForHumans() }}</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="row">
                    @foreach ($videoFor as $video)
                        <div class="col-6 py-1 px-1">
                            <a href="" class="p-2" style="background: #333; display:block" id="hover">
                                <iframe class="w-100" src="{{ $video->video }}" title="YouTube video player"
                                    frameborder="0" allowfullscreen></iframe>
                                <div class="title" style="color: #eee; font-size:18px;">
                                    <span>{{ \Illuminate\Support\Str::limit($video->title, 70) }}</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container topM p-0">
        <div class="grid-card px-1 px-md-0">
            @foreach ($posts['four'] as $post)
                <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}" class="p-2"
                    style=" height:max-content; display: block; border:1px solid #ccc;">
                    <div class="d-flex gap-1">
                        <div class="text" style="flex:1;">
                            <p class="m-0 mb-1" style="font-size: 20px; color:#007377;">এখন ট্রেন্ডিং /</p>
                            <span id="title">
                                {{ $post->title }}
                            </span>
                        </div>
                        <div class="img" style="width:90px; height:60px;">
                            <img src="{{ asset('storage/' . $post->image) }}" width="80" height="60"
                                alt="">
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    {{-- news list and payeer time --}}

    <div class="container topM">
        <div class="row px-1 px-md-0">
            <div class="col-lg-9 col-md-12 p-0">
                <div class="grid-container">
                    @foreach ($posts['sixPosts'] as $post)
                        <a style="color:#444"
                            href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}">
                            <div class="border p-2">
                                <div class="img" style="width: 100%">
                                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid"
                                        alt="">
                                </div>
                                <div class="title py-1" style="font-size: 18px;font-weight:600">
                                    <span>{{ Str::limit($post->title, 38) }}</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3 col-md-12 pl-lg-2 pl-md-0 pt-md-2px pr-lg-0">
                <div>
                    <div class="banner">
                        <img src="{{ asset('banner/namaz.webp') }}" width="100%" alt="">
                    </div>
                    <table class="table table-bordered m-0" style="border-color: rgb(250, 146, 146);">
                        <tbody>
                            <tr>
                                <td>ফজর</td>
                                <td id="fajr-time"></td>
                            </tr>
                            <tr>
                                <td>জোহর</td>
                                <td id="dhuhr-time"></td>
                            </tr>
                            <tr>
                                <td>আসর</td>
                                <td id="asr-time"></td>
                            </tr>
                            <tr>
                                <td>মাগরিব</td>
                                <td id="maghrib-time"></td>
                            </tr>
                            <tr>
                                <td>ইশা</td>
                                <td id="isha-time"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="w-100" style=" text-align:center; background: #a52823; padding:7px;">
                        <span id="current-date" style="color: #fff; font-size:18px;"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- রাজনীতি জাতীয় news list --------- --}}

    <div class="container topM">
        <div class="row">
            <div class="col-lg-6 col-md-12 p-0 px-1 px-md-2">
                <div class="type py-2"
                    style="border-bottom: 4px double #75ac9d; font-size: 24px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <a href="{{ route('category.post', ['id' => $posts['OneNationalPost']->category_id, 'name' => $posts['OneNationalPost']->category->name]) }}"
                        id="hoverType"><span>জাতীয়</span></a>
                </div>
                <div class="row py-3">
                    <div class="col-lg-6 col-md-12" style="border-right: 1px solid #ccc;">
                        @if ($posts['OneNationalPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneNationalPost']->id, 'name' => $posts['OneNationalPost']->category->name]) }}"
                                class="d-block" id="hover">
                                <div class="img">
                                    <img src="{{ asset('storage/' . $posts['OneNationalPost']->image) }}"
                                        class="w-100" alt="">
                                </div>
                                <div class="title my-1" id="title-bold">
                                    <span>{{ $posts['OneNationalPost']->title }}</span>
                                </div>
                                <div class="text" id="title-four">
                                    <span>
                                        {{ $posts['OneNationalPost']->subtitle }}
                                    </span>
                                </div>
                            </a>
                        @else
                        @endif
                    </div>
                    <div class="col-lg-6 col-md-12 py-4 py-md-0" id="border">
                        @foreach ($posts['NationalPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="d-block py-3">
                                <div class="d-flex gap-2 align-items-center">
                                    <div class="img" style="width:90px; height:60px;">
                                        <img class="w-100 h-100" src="{{ asset('storage/' . $post->image) }}"
                                            alt="">
                                    </div>
                                    <div class="title" id="title-tow">
                                        <span>{{ $post->title }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 p-0 px-1 px-md-2">
                <div class="type py-2"
                    style=" border-bottom: 4px double #75ac9d; font-size: 24px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <a href="{{ route('category.post', ['id' => $posts['OnePoliticsPost']->category_id, 'name' => $posts['OnePoliticsPost']->category->name]) }}"
                        id="hoverType"><span>রাজনীতি</span></a>
                </div>
                <div class="row py-3">
                    <div class="col-lg-6 col-md-12" style="border-right: 1px solid #ccc;">
                        @if ($posts['OnePoliticsPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OnePoliticsPost']->id, 'name' => $posts['OnePoliticsPost']->category->name]) }}"
                                class="d-block" id="hover">
                                <div class="img">
                                    <img src="{{ asset('storage/' . $posts['OnePoliticsPost']->image) }}"
                                        class="w-100" alt="">
                                </div>
                                <div class="title my-1" id="title-bold">
                                    <span>{{ $posts['OnePoliticsPost']->title }}</span>
                                </div>
                                <div class="text" id="title-four">
                                    <span>
                                        {{ $posts['OnePoliticsPost']->subtitle }}
                                    </span>
                                </div>
                            </a>
                        @else
                        @endif
                    </div>
                    <div class="col-lg-6 col-md-12 py-4 py-md-0" id="border">
                        @foreach ($posts['PoliticsPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="d-block py-3">
                                <div class="d-flex gap-2 align-items-center">
                                    <div class="img" style="width:90px; height:60px;">
                                        <img class="w-100 h-100" src="{{ asset('storage/' . $post->image) }}"
                                            alt="">
                                    </div>
                                    <div class="title" id="title-tow">
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

    {{-- সারাদেশ all country news --}}

    <div class="container topM">
        <div class="row">
            <div class="col-12 px-md-2 px-1">
                <div class="type py-2"
                    style="border-bottom: 4px double #75ac9d; font-size: 24px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <a href="{{ route('category.post', ['id' => $posts['OneCountryPost']->category_id, 'name' => $posts['OneCountryPost']->category->name]) }}"
                        id="hoverType"><span>সারাদেশ</span></a>
                </div>
            </div>

            <div class="col-12 px-md-2 px-1">
            </div>

            <div class="col-12 mt-2">
                <div class="row px-1 px-md-2">
                    <div class="col-lg-4 col-md-12 p-0">
                        @if ($posts['OneCountryPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneCountryPost']->id, 'name' => $posts['OneCountryPost']->category->name]) }}"
                                class="d-block" id="hover">
                                <div class="img">
                                    <img src="{{ asset('storage/' . $posts['OneCountryPost']->image) }}"
                                        class="w-100" alt="">
                                </div>
                                <div class="title my-1" id="title-bold">
                                    <span>{{ $posts['OneCountryPost']->title }}</span>
                                </div>
                                <div class="text" id="title-four">
                                    <span>
                                        {{ $posts['OneCountryPost']->subtitle }}
                                    </span>
                                </div>
                            </a>
                        @else
                        @endif
                    </div>
                    <div class="col-lg-4 col-md-12 px-0 px-md-2 py-4 py-md-0" id="border">
                        @foreach ($posts['CountryPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="d-block py-3">
                                <div class="d-flex gap-2 align-items-center">
                                    <div class="img" style="width:90px; height:60px;">
                                        <img class="w-100 h-100" src="{{ asset('storage/' . $post->image) }}"
                                            alt="">
                                    </div>
                                    <div class="title" id="title-tow">
                                        <span>{{ $post->title }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="col-lg-4 col-md-12 px-0 px-md-2 border-lg-left border-md-left-0" id="border">
                        @foreach ($posts['CountryPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="d-block py-3">
                                <div class="d-flex gap-2 align-items-center">
                                    <div class="img" style="width:90px; height:60px;">
                                        <img class="w-100 h-100" src="{{ asset('storage/' . $post->image) }}"
                                            alt="">
                                    </div>
                                    <div class="title" id="title-tow">
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

    {{-- আন্তর্জাতিক news list --------- --}}

    <div class="container topM">
        <div class="row">
            <div class="col-lg-6 col-md-12 p-0 px-1">
                <div class="type py-2"
                    style="border-bottom: 4px double #75ac9d; font-size: 24px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <a href="{{ route('category.post', ['id' => $posts['OneInternationalPost']->category_id, 'name' => $posts['OneInternationalPost']->category->name]) }}"
                        id="hoverType"><span>আন্তর্জাতিক</span></a>
                </div>
                <div class="row py-3">
                    <div class="col-lg-6 col-md-12" style="border-right: 1px solid #ccc;">
                        @if ($posts['OneInternationalPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneInternationalPost']->id, 'name' => $posts['OneInternationalPost']->category->name]) }}"
                                class="d-block" id="hover">
                                <div class="img">
                                    <img src="{{ asset('storage/' . $posts['OneInternationalPost']->image) }}"
                                        class="w-100" alt="">
                                </div>
                                <div class="title my-1" id="title-bold">
                                    <span>{{ $posts['OneInternationalPost']->title }}</span>
                                </div>
                                <div class="text" id="title-four">
                                    <span>
                                        {{ $posts['OneInternationalPost']->subtitle }}
                                    </span>
                                </div>
                            </a>
                        @endif
                    </div>
                    <div class="col-lg-6 col-md-12 py-4 py-md-0" id="border">
                        @foreach ($posts['InternationalPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="d-block py-3">
                                <div class="d-flex gap-2 align-items-center">
                                    <div class="img" style="width:90px; height:60px;">
                                        <img class="w-100 h-100" src="{{ asset('storage/' . $post->image) }}"
                                            alt="">
                                    </div>
                                    <div class="title" id="title-tow">
                                        <span>{{ $post->title }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 p-0 px-1">
                <div class="type py-2"
                    style=" border-bottom: 4px double #75ac9d; font-size: 24px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <a href="{{ route('category.post', ['id' => $posts['OneCapitalPost']->category_id, 'name' => $posts['OneCapitalPost']->category->name]) }}"
                        id="hoverType"><span>রাজধানী</span></a>
                </div>
                <div class="row py-3">
                    <div class="col-lg-6 col-md-12" style="border-right: 1px solid #ccc;">
                        @if ($posts['OneCapitalPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneCapitalPost']->id, 'name' => $posts['OneCapitalPost']->category->name]) }}"
                                class="d-block" id="hover">
                                <div class="img">
                                    <img src="{{ asset('storage/' . $posts['OneCapitalPost']->image) }}"
                                        class="w-100" alt="">
                                </div>
                                <div class="title my-1" id="title-bold">
                                    <span>{{ $posts['OneCapitalPost']->title }}</span>
                                </div>
                                <div class="text" id="title-four">
                                    <span>
                                        {{ $posts['OneCapitalPost']->subtitle }}
                                    </span>
                                </div>
                            </a>
                        @endif
                    </div>
                    <div class="col-lg-6 col-md-12 py-4 py-md-0" id="border">
                        @foreach ($posts['CapitalPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="d-block py-3">
                                <div class="d-flex gap-2 align-items-center">
                                    <div class="img" style="width:90px; height:60px;">
                                        <img class="w-100 h-100" src="{{ asset('storage/' . $post->image) }}"
                                            alt="">
                                    </div>
                                    <div class="title" id="title-tow">
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

    {{-- বিনোদন news list --}}
    <div class="container topM px-1">
        <div class="type py-2"
            style="border-bottom: 4px double #75ac9d; font-size: 24px; font-weight:700; color:#333;">
            <i class="ri-file-text-line"></i>
            <a href="{{ route('category.post', ['id' => $posts['EntertainmentPost']->first()->category_id, 'name' => $posts['EntertainmentPost']->first()->category->name]) }}"
                id="hoverType"><span>বিনোদন</span></a>
        </div>
        <div class="row py-3">
            <div class="col-lg-4 col-md-12 border-lg-right border-md-right-0" id="border">
                @foreach ($posts['EntertainmentPost'] as $post)
                    <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                        class="d-block py-3">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="img" style="width:90px; height:60px;">
                                <img class="w-100 h-100" src="{{ asset('storage/' . $post->image) }}"
                                    alt="">
                            </div>
                            <div class="title" id="title-tow">
                                <span>{{ $post->title }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="col-lg-4 col-md-12 border-lg-right border-md-right-0">
                @if ($posts['OneEntertainmentPost'])
                    <a
                        href="{{ route('view.post', ['id' => $posts['OneEntertainmentPost']->id, 'name' => $posts['OneEntertainmentPost']->category->name]) }}">
                        <div class="img w-100">
                            <img src="{{ asset('storage/' . $posts['OneEntertainmentPost']->image) }}" class="w-100"
                                alt="">
                        </div>
                        <div class="title py-2" id="title-bold">
                            <span>{{ $posts['OneEntertainmentPost']->title }}</span>
                        </div>
                    </a>
                @endif
            </div>
            <div class="col-lg-4 col-md-12 py-2 py-md-0" id="border">
                @foreach ($posts['EntertainmentPost'] as $post)
                    <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                        class="d-block py-3">
                        <div class="d-flex gap-2 align-items-center">
                            <div class="img" style="width:90px; height:60px;">
                                <img class="w-100 h-100" src="{{ asset('storage/' . $post->image) }}"
                                    alt="">
                            </div>
                            <div class="title" id="title-tow">
                                <span>{{ $post->title }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- অর্থনীতি news list --}}

    <div class="container topM">
        <div class="row">
            <div class="col-lg-9 col-md-12 p-0 px-1">
                <div class="type py-2"
                    style="border-bottom: 4px double #75ac9d; font-size: 24px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <a href="{{ route('category.post', ['id' => $posts['OneSportsPost']->category_id, 'name' => $posts['OneSportsPost']->category->name]) }}"
                        id="hoverType"><span>খেলা</span></a>
                </div>
                <div class="row py-3">
                    <div class="col-lg-7 col-md-12" style="border-right: 1px solid #ccc;">
                        <div class="row">
                            <div class="col-12">
                                @if ($posts['OneSportsPost'])
                                    <a href="{{ route('view.post', ['id' => $posts['OneSportsPost']->id, 'name' => $posts['OneSportsPost']->category->name]) }}"
                                        class="d-block" id="hover">
                                        <div class="img">
                                            <img src="{{ asset('storage/' . $posts['OneSportsPost']->image) }}"
                                                class="w-100" alt="">
                                        </div>
                                        <div class="title my-1"
                                            style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                            <span>{{ $posts['OneSportsPost']->title }}</span>
                                        </div>
                                        <div class="my-2" style="border-bottom: 1px solid #ccc"></div>
                                    </a>
                                @endif
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    @foreach ($posts['TowSportsPost'] as $post)
                                        <div class="col-6">
                                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                                class="d-block" id="hover">
                                                <div class="img">
                                                    <img src="{{ asset('storage/' . $post->image) }}" class="w-100"
                                                        alt="">
                                                </div>
                                                <div class="title my-1"
                                                    style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                                    <span>{{ $post->title }}</span>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 py-2 py-md-0" id="border" style="border-right: 1px solid #ccc">
                        @foreach ($posts['SixSportsPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="d-block py-2">
                                <div class="d-flex gap-2 align-items-center">
                                    <div class="img" style="width:90px; height:60px;">
                                        <img class="w-100 h-100" src="{{ asset('storage/' . $post->image) }}"
                                            alt="">
                                    </div>
                                    <div class="title"
                                        style="flex:1; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; color: #111; font-size: 18px; line-height: 25px;">
                                        <span>{{ $post->title }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 p-0 px-md-3 px-1">
                <div class="type py-2"
                    style=" border-bottom: 4px double #75ac9d; font-size: 24px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <a href="{{ route('category.post', ['id' => $posts['OneEconomyPost']->category_id, 'name' => $posts['OneEconomyPost']->category->name]) }}"
                        id="hoverType"><span>অর্থনীতি</span></a>
                </div>
                <div class="row py-3">
                    <div class="col-12">
                        @if ($posts['OneEconomyPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneEconomyPost']->id, 'name' => $posts['OneEconomyPost']->category->name]) }}"
                                class="d-block" id="hover">
                                <div class="img">
                                    <img src="{{ asset('storage/' . $posts['OneEconomyPost']->image) }}"
                                        class="w-100" alt="">
                                </div>
                                <div class="title my-1"
                                    style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>{{ $posts['OneEconomyPost']->title }}</span>
                                </div>
                                <div class="text mb-1"
                                    style="font-size: 14px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>
                                        {{ $posts['OneEconomyPost']->subtitle }}
                                    </span>
                                </div>
                            </a>
                        @endif
                    </div>
                    <div class="col-12 mt-1" id="border">
                        @foreach ($posts['ForEconomyPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="d-block p-0 py-2">
                                <div class="d-flex gap-2 align-items-center">
                                    <div class="img" style="width:90px; height:60px;">
                                        <img class="w-100 h-100" src="{{ asset('storage/' . $post->image) }}"
                                            alt="">
                                    </div>
                                    <div class="title"
                                        style="flex:1; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; color: #111; font-size: 18px; line-height: 25px;">
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

    {{-- আইন-আদালত মুখোমুখি স্বাস্থ্য ও চিকিৎসা news list --}}

    <div class="container topM px-1">
        <div class="row">
            <div class="col-lg-4 col-md-12" style="border-right:1px solid #ccc">
                <div class="type py-2"
                    style="border-bottom: 4px double #75ac9d; font-size: 24px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <a href="{{ route('category.post', ['id' => $posts['OneCourtPost']->category_id, 'name' => $posts['OneCourtPost']->category->name]) }}"
                        id="hoverType"><span>আইন-আদালত</span></a>
                </div>
                <div class="row p-0 py-3">
                    <div class="col-12">
                        @if ($posts['OneCourtPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneCourtPost']->id, 'name' => $posts['OneCourtPost']->category->name]) }}"
                                class="d-block" id="hover">
                                <div class="img">
                                    <img src="{{ asset('storage/' . $posts['OneCourtPost']->image) }}"
                                        class="w-100" alt="">
                                </div>
                                <div class="title my-1"
                                    style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>{{ $posts['OneCourtPost']->title }}</span>
                                </div>
                                <div class="text mb-1"
                                    style="font-size: 18px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>
                                        {{ $posts['OneCourtPost']->subtitle }}
                                    </span>
                                </div>
                                <div class="mb-3 mt-1" style="border-bottom:1px solid #ccc"></div>
                            </a>
                        @endif
                    </div>
                    <div class="col-12" id="border">
                        @foreach ($posts['TCourtPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="d-block d-flex align-items-start gap-2">
                                <div class="mt-2"
                                    style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                                <div class="title my-1" id="border"
                                    style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>{{ $post->title }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12" style="border-right:1px solid #ccc">
                <div class="type py-2"
                    style="border-bottom: 4px double #75ac9d; font-size: 24px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <a href="{{ route('category.post', ['id' => $posts['OneFacePost']->category_id, 'name' => $posts['OneFacePost']->category->name]) }}"
                        id="hoverType"><span>মুখোমুখি</span></a>
                </div>
                <div class="row p-0 py-3">
                    <div class="col-12">
                        @if ($posts['OneFacePost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneFacePost']->id, 'name' => $posts['OneFacePost']->category->name]) }}"
                                class="d-block" id="hover">
                                <div class="img">
                                    <img src="{{ asset('storage/' . $posts['OneFacePost']->image) }}" class="w-100"
                                        alt="">
                                </div>
                                <div class="title my-1"
                                    style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>{{ $posts['OneFacePost']->title }}</span>
                                </div>
                                <div class="text mb-1"
                                    style="font-size: 18px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>
                                        {{ $posts['OneFacePost']->subtitle }}
                                    </span>
                                </div>
                                <div class="mb-3 mt-1" style="border-bottom:1px solid #ccc"></div>
                            </a>
                        @endif
                    </div>
                    <div class="col-12" id="border">
                        @foreach ($posts['TFacePost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="d-block d-flex align-items-start gap-2">
                                <div class="mt-2"
                                    style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                                <div class="title my-1" id="border"
                                    style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>{{ $post->title }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="type py-2"
                    style="border-bottom: 4px double #75ac9d; font-size: 24px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <a href="{{ route('category.post', ['id' => $posts['OneHealthPost']->category_id, 'name' => $posts['OneHealthPost']->category->name]) }}"
                        id="hoverType"><span>স্বাস্থ্য ও চিকিৎসা</span></a>
                </div>
                <div class="row p-0 py-3">
                    <div class="col-12">
                        @if ($posts['OneHealthPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneHealthPost']->id, 'name' => $posts['OneHealthPost']->category->name]) }}"
                                class="d-block" id="hover">
                                <div class="img">
                                    <img src="{{ asset('storage/' . $posts['OneHealthPost']->image) }}"
                                        class="w-100" alt="">
                                </div>
                                <div class="title my-1"
                                    style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>{{ $posts['OneHealthPost']->title }}</span>
                                </div>
                                <div class="text mb-1"
                                    style="font-size: 18px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>
                                        {{ $posts['OneHealthPost']->subtitle }}
                                    </span>
                                </div>
                                <div class="mb-3 mt-1" style="border-bottom:1px solid #ccc"></div>
                            </a>
                        @endif
                    </div>
                    <div class="row" id="border">
                        @foreach ($posts['THealthPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="d-block d-flex align-items-start gap-2">
                                <div class="mt-2"
                                    style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                                <div class="title my-1" id="border"
                                    style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>{{ $post->title }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- লাইফস্টাইল news list --}}

    <div class="container topM px-1">
        <div class="type py-2"
            style="border-bottom: 4px double #75ac9d; font-size: 24px; font-weight:700; color:#333;">
            <i class="ri-file-text-line"></i>
            <a href="{{ route('category.post', ['id' => $posts['LifestylePost']->first()->category_id, 'name' => $posts['LifestylePost']->first()->category->name]) }}"
                id="hoverType"><span>লাইফস্টাইল</span></a>
        </div>
        <div class="row py-2">
            @foreach ($posts['LifestylePost'] as $post)
                <div class="col-lg-3 col-md-12" style="border-right:1px solid #ccc" id="border">
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
    </div>

    <div class="container topM px-1">
        <div class="row">
            <div class="col-lg-4 col-md-12" style="border-right:1px solid #ccc">
                <div class="type py-2"
                    style="border-bottom: 4px double #75ac9d; font-size: 20px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <a href="{{ route('category.post', ['id' => $posts['OneReligionPost']->category_id, 'name' => $posts['OneReligionPost']->category->name]) }}"
                        id="hoverType"><span>ধর্ম</span></a>
                </div>
                <div class="row p-0 py-3">
                    <div class="col-12">
                        @if ($posts['OneReligionPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneReligionPost']->id, 'name' => $posts['OneReligionPost']->category->name]) }}"
                                class="d-block" id="hover">
                                <div class="img">
                                    <img src="{{ asset('storage/' . $posts['OneReligionPost']->image) }}"
                                        class="w-100" alt="">
                                </div>
                                <div class="title my-1"
                                    style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>{{ $posts['OneReligionPost']->title }}</span>
                                </div>
                                <div class="text mb-1"
                                    style="font-size: 18px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>
                                        {{ $posts['OneReligionPost']->subtitle }}
                                    </span>
                                </div>
                                <div class="mb-3 mt-1" style="border-bottom:1px solid #ccc"></div>
                            </a>
                        @endif
                    </div>
                    <div class="col-12" id="border">
                        @foreach ($posts['TReligionPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="d-block d-flex align-items-start gap-2">
                                <div class="mt-2"
                                    style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                                <div class="title my-1" id="border"
                                    style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>{{ $post->title }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12" style="border-right:1px solid #ccc">
                <div class="type py-2"
                    style="border-bottom: 4px double #75ac9d; font-size: 24px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <a href="{{ route('category.post', ['id' => $posts['OneLiteraturePost']->category_id, 'name' => $posts['OneLiteraturePost']->category->name]) }}"
                        id="hoverType"><span>শিল্প-সাহিত্য</span></a>
                </div>
                <div class="row p-0 py-3">
                    <div class="col-12">
                        @if ($posts['OneLiteraturePost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneLiteraturePost']->id, 'name' => $posts['OneLiteraturePost']->category->name]) }}"
                                class="d-block" id="hover">
                                <div class="img">
                                    <img src="{{ asset('storage/' . $posts['OneLiteraturePost']->image) }}"
                                        class="w-100" alt="">
                                </div>
                                <div class="title my-1"
                                    style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>{{ $posts['OneLiteraturePost']->title }}</span>
                                </div>
                                <div class="text mb-1"
                                    style="font-size: 18px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>
                                        {{ $posts['OneLiteraturePost']->subtitle }}
                                    </span>
                                </div>
                                <div class="mb-3 mt-1" style="border-bottom:1px solid #ccc"></div>
                            </a>
                        @endif
                    </div>
                    <div class="col-12" id="border">
                        @foreach ($posts['TLiteraturePost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="d-block d-flex align-items-start gap-2">
                                <div class="mt-2"
                                    style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                                <div class="title my-1" id="border"
                                    style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>{{ $post->title }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="type py-2"
                    style="border-bottom: 4px double #75ac9d; font-size: 24px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <a href="{{ route('category.post', ['id' => $posts['OneExpatriatePost']->category_id, 'name' => $posts['OneExpatriatePost']->category->name]) }}"
                        id="hoverType"><span>প্রবাস জীবন</span></a>
                </div>
                <div class="row p-0 py-3">
                    <div class="col-12">
                        @if ($posts['OneExpatriatePost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneExpatriatePost']->id, 'name' => $posts['OneExpatriatePost']->category->name]) }}"
                                class="d-block" id="hover">
                                <div class="img">
                                    <img src="{{ asset('storage/' . $posts['OneExpatriatePost']->image) }}"
                                        class="w-100" alt="">
                                </div>
                                <div class="title my-1"
                                    style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>{{ $posts['OneExpatriatePost']->title }}</span>
                                </div>
                                <div class="text mb-1"
                                    style="font-size: 18px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>
                                        {{ $posts['OneExpatriatePost']->subtitle }}
                                    </span>
                                </div>
                                <div class="mb-3 mt-1" style="border-bottom:1px solid #ccc"></div>
                            </a>
                        @endif
                    </div>
                    <div class="col-12" id="border">
                        @foreach ($posts['TExpatriatePost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="d-block d-flex align-items-start gap-2">
                                <div class="mt-2"
                                    style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                                <div class="title my-1" id="border"
                                    style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
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


    <div class="container topM px-1">
        <div class="row">
            <div class="col-lg-4" style="border-right:1px solid #ccc">
                <div class="type py-2"
                    style="border-bottom: 4px double #75ac9d; font-size: 24px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <a href="{{ route('category.post', ['id' => $posts['OneSchoolPost']->category_id, 'name' => $posts['OneSchoolPost']->category->name]) }}"
                        id="hoverType"><span>শিক্ষাঙ্গন</span></a>
                </div>
                <div class="row p-0 py-3">
                    <div class="col-12">
                        @if ($posts['OneSchoolPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneSchoolPost']->id, 'name' => $posts['OneSchoolPost']->category->name]) }}"
                                class="d-block" id="hover">
                                <div class="img">
                                    <img src="{{ asset('storage/' . $posts['OneSchoolPost']->image) }}"
                                        class="w-100" alt="">
                                </div>
                                <div class="title my-1"
                                    style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>{{ $posts['OneSchoolPost']->title }}</span>
                                </div>
                                <div class="text mb-1"
                                    style="font-size: 18px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>
                                        {{ $posts['OneSchoolPost']->subtitle }}
                                    </span>
                                </div>
                                <div class="mb-3 mt-1" style="border-bottom:1px solid #ccc"></div>
                            </a>
                        @endif
                    </div>
                    <div class="col-12" id="border">
                        @foreach ($posts['TSchoolPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="d-block d-flex align-items-start gap-2">
                                <div class="mt-2"
                                    style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                                <div class="title my-1" id="border"
                                    style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>{{ $post->title }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12" style="border-right:1px solid #ccc">
                <div class="type py-2"
                    style="border-bottom: 4px double #75ac9d; font-size: 24px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <a href="{{ route('category.post', ['id' => $posts['OneFunPost']->category_id, 'name' => $posts['OneFunPost']->category->name]) }}"
                        id="hoverType"><span>মজার খবর</span></a>
                </div>
                <div class="row p-0 py-3">
                    <div class="col-12">
                        @if ($posts['OneFunPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneFunPost']->id, 'name' => $posts['OneFunPost']->category->name]) }}"
                                class="d-block" id="hover">
                                <div class="img">
                                    <img src="{{ asset('storage/' . $posts['OneFunPost']->image) }}" class="w-100"
                                        alt="">
                                </div>
                                <div class="title my-1"
                                    style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>{{ $posts['OneFunPost']->title }}</span>
                                </div>
                                <div class="text mb-1"
                                    style="font-size: 18px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>
                                        {{ $posts['OneFunPost']->subtitle }}
                                    </span>
                                </div>
                                <div class="mb-3 mt-1" style="border-bottom:1px solid #ccc"></div>
                            </a>
                        @endif
                    </div>
                    <div class="col-12" id="border">
                        @foreach ($posts['TFunPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="d-block d-flex align-items-start gap-2">
                                <div class="mt-2"
                                    style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                                <div class="title my-1" id="border"
                                    style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>{{ $post->title }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="type py-2"
                    style="border-bottom: 4px double #75ac9d; font-size: 24px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <a href="{{ route('category.post', ['id' => $posts['OneSevenPost']->category_id, 'name' => $posts['OneSevenPost']->category->name]) }}"
                        id="hoverType"><span>সাতরং</span></a>
                </div>
                <div class="row p-0 py-3">
                    <div class="col-12">
                        @if ($posts['OneSevenPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneSevenPost']->id, 'name' => $posts['OneSevenPost']->category->name]) }}"
                                class="d-block" id="hover">
                                <div class="img">
                                    <img src="{{ asset('storage/' . $posts['OneSevenPost']->image) }}"
                                        class="w-100" alt="">
                                </div>
                                <div class="title my-1"
                                    style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>{{ $posts['OneSevenPost']->title }}</span>
                                </div>
                                <div class="text mb-1"
                                    style="font-size: 18px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>
                                        {{ $posts['OneSevenPost']->subtitle }}
                                    </span>
                                </div>
                                <div class="mb-3 mt-1" style="border-bottom:1px solid #ccc"></div>
                            </a>
                        @endif
                    </div>
                    <div class="col-12" id="border">
                        @foreach ($posts['TSevenPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="d-block d-flex align-items-start gap-2">
                                <div class="mt-2"
                                    style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                                <div class="title my-1" id="border"
                                    style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>{{ $post->title }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ফিচার জব কর্নার তথ্যপ্রযুক্তি news list --}}

    <div class="container topM px-1">
        <div class="row">
            <div class="col-lg-4 col-md-12" style="border-right:1px solid #ccc">
                <div class="type py-2"
                    style="border-bottom: 4px double #75ac9d; font-size: 24px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <a href="{{ route('category.post', ['id' => $posts['OneJobPost']->category_id, 'name' => $posts['OneJobPost']->category->name]) }}"
                        id="hoverType"><span>জব কর্নার</span></a>
                </div>
                <div class="row p-0 py-3">
                    <div class="col-12">
                        @if ($posts['OneJobPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneJobPost']->id, 'name' => $posts['OneJobPost']->category->name]) }}"
                                class="d-block" id="hover">
                                <div class="img">
                                    <img src="{{ asset('storage/' . $posts['OneJobPost']->image) }}" class="w-100"
                                        alt="">
                                </div>
                                <div class="title my-1"
                                    style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>{{ $posts['OneJobPost']->title }}</span>
                                </div>
                                <div class="text mb-1"
                                    style="font-size: 18px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>
                                        {{ $posts['OneJobPost']->subtitle }}
                                    </span>
                                </div>
                                <div class="mb-3 mt-1" style="border-bottom:1px solid #ccc"></div>
                            </a>
                        @endif
                    </div>
                    <div class="col-12" id="border">
                        @foreach ($posts['TJobPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="d-block d-flex align-items-start gap-2">
                                <div class="mt-2"
                                    style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                                <div class="title my-1" id="border"
                                    style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>{{ $post->title }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12" style="border-right:1px solid #ccc">
                <div class="type py-2"
                    style="border-bottom: 4px double #75ac9d; font-size: 24px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <a href="{{ route('category.post', ['id' => $posts['OneFeaturePost']->category_id, 'name' => $posts['OneFeaturePost']->category->name]) }}"
                        id="hoverType"><span>ফিচার</span></a>
                </div>
                <div class="row p-0 py-3">
                    <div class="col-12">
                        @if ($posts['OneFeaturePost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneFeaturePost']->id, 'name' => $posts['OneFeaturePost']->category->name]) }}"
                                class="d-block" id="hover">
                                <div class="img">
                                    <img src="{{ asset('storage/' . $posts['OneFeaturePost']->image) }}"
                                        class="w-100" alt="">
                                </div>
                                <div class="title my-1"
                                    style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>{{ $posts['OneFeaturePost']->title }}</span>
                                </div>
                                <div class="text mb-1"
                                    style="font-size: 18px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>
                                        {{ $posts['OneFeaturePost']->subtitle }}
                                    </span>
                                </div>
                                <div class="mb-3 mt-1" style="border-bottom:1px solid #ccc"></div>
                            </a>
                        @endif
                    </div>
                    <div class="col-12" id="border">
                        @foreach ($posts['TFeaturePost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="d-block d-flex align-items-start gap-2">
                                <div class="mt-2"
                                    style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                                <div class="title my-1" id="border"
                                    style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>{{ $post->title }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="type py-2"
                    style="border-bottom: 4px double #75ac9d; font-size: 24px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <a href="{{ route('category.post', ['id' => $posts['OneTechnologyPost']->category_id, 'name' => $posts['OneTechnologyPost']->category->name]) }}"
                        id="hoverType"><span>তথ্যপ্রযুক্তি</span></a>
                </div>
                <div class="row p-0 py-3">
                    <div class="col-12">
                        @if ($posts['OneTechnologyPost'])
                            <a href="{{ route('view.post', ['id' => $posts['OneTechnologyPost']->id, 'name' => $posts['OneTechnologyPost']->category->name]) }}"
                                class="d-block" id="hover">
                                <div class="img">
                                    <img src="{{ asset('storage/' . $posts['OneTechnologyPost']->image) }}"
                                        class="w-100" alt="">
                                </div>
                                <div class="title my-1"
                                    style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>{{ $posts['OneTechnologyPost']->title }}</span>
                                </div>
                                <div class="text mb-1"
                                    style="font-size: 18px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <span>
                                        {{ $posts['OneTechnologyPost']->subtitle }}
                                    </span>
                                </div>
                                <div class="mb-3 mt-1" style="border-bottom:1px solid #ccc"></div>
                            </a>
                        @endif
                    </div>
                    <div class="col-12" id="border">
                        @foreach ($posts['TTechnologyPost'] as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="d-block d-flex align-items-start gap-2">
                                <div class="mt-2"
                                    style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                                <div class="title my-1" id="border"
                                    style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
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
