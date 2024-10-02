<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <title>Daily Bangladesh</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Roboto', sans-serif;
        padding-bottom: 36px;
    }

    a {
        text-decoration: none;
        color: transparent;
    }

    .social-icons .icon a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        margin: 0 5px;
        border-radius: 50%;
        background-color: #f0f0f0;
        text-decoration: none;
        transition: background-color 0.3s ease;
        color: #fff;
    }

    .social-icons .icon a:nth-child(1) {
        background-color: #3b5998;
    }

    .social-icons .icon a:nth-child(2) {
        background-color: #25d366;
    }

    .social-icons .icon a:nth-child(3) {
        background-color: #ff0000;
    }

    .social-icons .icon a:nth-child(4) {
        background-color: #1da1f2;
    }

    .social-icons .icon a:nth-child(5) {
        background-color: #c32aa3;
    }

    .social-icons .icon a:hover {
        background-color: #007bff;
        color: white;
    }

    .social-icons i {
        font-size: 17px;
    }

    .lang-botton a {
        display: block;
        padding: 4px 8px;
        border-radius: 20px;
        background: #be475d;
        color: white;
        text-decoration: none;
        font-size: 14px;
    }

    .lang-botton a:nth-child(2) {
        background: #29725e;
        color: #fff;
    }

    .icon-container {
        width: 32px;
        height: 32px;
        font-size: 16px;
        color: white;
        cursor: pointer;
        font-weight: 700;
    }

    .ads-logo {
        width: 100%;
        height: 100%;
    }

    .sticky-top {
        z-index: 200;
    }

    /* main content */
    .news .title h3 {
        font-size: 20px;
        line-height: 30px;
        padding: 5px 0;
        padding-left: 2px !important;
        padding-bottom: 0;
        color: #222;
        font-weight: 600;
    }

    .news .title .text span {
        color: #555;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        display: -webkit-box;
        font-size: 15px;
        line-height: 23px;
        margin-top: 5px;
        overflow: hidden;
        text-overflow: ellipsis;
        padding-left: 2px !important;
    }

    .time {
        display: flex;
        font-size: 13px;
        color: #666;
        padding: 5px 0;
        gap: 3px;
    }

    .post .title h4 {
        font-size: 14px;
        text-align: left;
        font-weight: 600;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        display: -webkit-box;
        overflow: hidden;
        text-overflow: ellipsis;
        color: #333;
    }

    .post .text span {
        font-size: 14px;
        color: #444;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        display: -webkit-box;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .post {
        display: flex;
        flex-direction: column;
        gap: 10px;
        overflow: hidden;
        border: 1px solid #ddd;
        border-bottom: none;
    }

    .post a.post-list:not(:last-child) {
        border-bottom: 1px solid #ddd;
        padding-bottom: 5px;
    }

    .post a .post-list:last-child {
        border-bottom: none;
    }


    a {
        text-decoration: none;
        color: transparent;
    }

    .post-list:hover h4 {
        color: #007377;
    }

    .one-post:hover h3 {
        color: #007377;
    }

    .hover-effect:hover .text-block span {
        color: rgb(224, 79, 79);
    }

    #btn1,
    #btn2 {
        border-radius: 0;
        border-bottom: 1px solid #ddd;
    }

    #border a {
        border-bottom: 1px solid #ddd;
    }

    #border a:last-child {
        border: none;
    }

    #border a:first-child {
        padding-top: 0 !important;
    }

    #border a:hover .title span {
        color: #007377;
    }

    #hover:hover .title span {
        color: #007377;
    }

    /* Customize the select element */
    .custom-select {
        background: transparent;
        border: 1px solid #ccc;
        padding-right: 40px;
        position: relative;
    }

    /* Position and style the arrow icon */
    .dropdown-arrow {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        font-size: 18px;
        color: #333;
    }

    .grid-container {
        width: 100%;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .border {
        border: 1px solid #ccc;
    }

    tbody {
        text-align: center;
    }

    tr td {
        font-size: 15px;
    }

    .bottomM {
        margin-bottom: 50px;
    }

    .topM {
        margin-top: 50px;
    }

    .grid-card {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        gap: 5px;
    }

    .border-lg-left {
        border-left: 1px solid #ccc;
    }

    .border-lg-right {
        border-right: 1px solid #ccc;
    }

    .pl-lg-1 {
        padding-left: 5px;
    }

    .pl-lg-2 {
        padding-left: 10px;
    }

    .pr-lg-0 {
        padding-right: 0;
    }

    .custom-width-200 {
        width: 200px;
    }

    @media (max-width: 768px) {
        .grid-container {
            grid-template-columns: repeat(2, 1fr);
        }

        .grid-card {
            grid-template-columns: 1fr;
        }

        .grid-card a .d-flex {
            justify-content: space-between;
            align-items: center;
        }

        .border-md-right-0 {
            border-right: 0 !important;
        }

        .border-md-left-0 {
            border-left: 0 !important;
        }

        .grid-container {
            grid-template-columns: 1fr 1fr;
        }

        .pl-md-0 {
            padding-left: 0;
        }

        .pt-md-2px {
            padding-top: 10px;
        }

        .pr-md-0 {
            padding-right: 0;
        }

        .p-md-1px {
            padding: 5px;
        }

        .custom-width-300 {
            width: 300px;
        }

    }

    @media (max-width: 768px) {
        .custom-width-250 {
            width: 250px;
        }
    }
</style>

<body>

    @php
        $categories = getCategory();
    @endphp

    {{-- search container  --}}
    @include('layout.search')

    {{-- top header --}}
    <header class="bg-white text-black border-bottom d-none d-md-block">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center justify-content-center gap-2" style="color: #333; font-size:14px">
                    <i class="ri-calendar-fill"></i>
                    <span id="formattedDate"></span>
                </div>
                <div class="d-flex align-items-center gap-3 lang-botton">
                    <a href="">English</a>
                    <a href="">Converter</a>
                </div>
                <div class="d-flex justify-content-center  align-items-center social-icons">
                    <div class="mx-3">
                        <a href="" class="btn btn-secondary btn-sm">সাবস্ক্রাইব</a>
                    </div>
                    <div class="icon">
                        <a href=""><i class="ri-facebook-fill"></i></a>
                        <a href=""><i class="ri-whatsapp-fill"></i></a>
                        <a href=""><i class="ri-youtube-fill"></i></a>
                        <a href=""><i class="ri-twitter-x-line"></i></a>
                        <a href=""><i class="ri-instagram-fill"></i></a>
                    </div>
                </div>
                <div class="">
                    <div id="searchBtn"
                        class="d-flex align-items-center justify-content-center bg-secondary rounded-circle icon-container">
                        <i class="ri-search-line"></i>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    {{-- logo and ads img --}}

    <div class="container d-none d-md-block">
        <div class="row py-2">
            <div class="col-4 d-flex align-items-center">
                <img src="{{ asset('logo/logo.webp') }}" class="img-fluid" style="max-width: 65%" alt="">
            </div>
            <div class="col-8 d-flex align-items-center">
                <img class="ads-logo" src="{{ asset('logo/Beximco-LPG-28-01-2023.webp') }}" alt="">
            </div>
        </div>
    </div>

    @include('layout.navbar')

    <header class="sticky-top">
        <div style="background: #eee;">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center py-3">
                    <div class="icon" style="cursor:pointer; color:#555; font-size:20px; font-weight:700">
                        <i class="ri-menu-line"></i>
                    </div>
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('logo/logo.webp') }}" class="img-fluid" style="max-width:50%" alt="">
                    </div>
                    <div class="search" style=" cursor:pointer; font-size: 20px;color:#555;font-weight:600">
                        <i id="searchBtn" class="ri-search-line"></i>
                    </div>
                </div>
                <nav class="navbar navbar-expand p-0 overflow-hidden d-block d-md-none">
                    <div class="navbar-nav gap-1 overflow-auto">
                        @foreach ($categories as $category)
                            <div class="nav-item dropdown">
                                @if ($category->subcategories->isNotEmpty())
                                    <!-- Dropdown for category with subcategories -->
                                    <a class="nav-link dropdown-toggle text-dark" href="#"
                                        id="navbarDropdownMobile{{ $category->id }}" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ $category->name }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMobile{{ $category->id }}">
                                        @foreach ($category->subcategories as $subcategory)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ $subcategory->id }}">{{ $subcategory->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <!-- Direct link for category without subcategories -->
                                    <a class="nav-link text-dark" href="{{ $category->id }}">
                                        {{ $category->name }}
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </nav>
            </div>
        </div>
    </header>

    {{-- main content  --}}

    <div class="container mt-1">
        <div class="row py-2 border-bottom border-md-0">
            <div class="col-lg-6 col-md-12 p-0 px-md-2 px-1">
                @if ($posts['latest'])
                    <a href="" class="one-post">
                        <div class="news">
                            <div class="img">
                                <img src="{{ asset('storage/' . $posts['latest']->image) }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="title mt-2">
                                <h3>{{ $posts['latest']->title }}</h3>
                                <div class="text">
                                    <span>{{ $posts['latest']->description }}</span>
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
                            <a href="#">
                                <div class="mt-1">
                                    <h3
                                        style="
                                    font-size: 17px;
                                    line-height: 27px;
                                    padding: 5px 2px 0 2px;
                                    color: #222;
                                    font-weight: 600;
                                    display: -webkit-box;
                                    -webkit-line-clamp: 2;
                                    -webkit-box-orient: vertical;
                                    overflow: hidden;
                                    text-overflow: ellipsis;">
                                        {{ $posts['latest']->title }}
                                    </h3>
                                    <div class="text">
                                        <span
                                            style="
                                        display: -webkit-box;
                                        -webkit-line-clamp: 5;
                                        -webkit-box-orient: vertical;
                                        overflow: hidden;
                                        text-overflow: ellipsis;
                                        color: #333;
                                        font-size: 14px;">
                                            {{ $posts['latest']->description }}
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
                        <a href="{{ $post->id }}" class="post-list">
                            <div class="post-content">
                                <div style="display: flex; flex-direction:row; gap:5px;">
                                    <div class="img" style="width:90px; height:60px;">
                                        <img class="w-100 h-100" src="{{ asset('storage/' . $post->image) }}"
                                            alt="">
                                    </div>
                                    <div class="title" style="font-size: 18px;flex:1;">
                                        <h4 class="m-0" style="line-height: inherit;">
                                            {{ $post->title }}
                                        </h4>
                                    </div>
                                </div>
                                <div class="text mt-1">
                                    <span>
                                        {{ $post->description }}
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
                <div class="border">
                    <div class="btn-group w-100" role="group">
                        <button type="button" class="btn btn-danger w-50" id="btn1"
                            onclick="toggleButton(this, 'btn2')">সর্বশেষ</button>
                        <button type="button" class="btn btn-light w-50" id="btn2"
                            onclick="toggleButton(this, 'btn1')">সর্বাধিক</button>
                    </div>
                    <div style="height: 625px; overflow:auto;">

                        @foreach ($posts['all'] as $post)
                            <a href="#" class="hover-effect"
                                style="border-bottom: 1px solid #ddd; display:block; background:#f3f3f3;">
                                <div class="d-flex p-1">
                                    <i class="ri-arrow-right-s-line" style="color: #333; font-size:24px;"></i>
                                    <div class="text-block" style="color: #333; font-size:14px; padding-top:7px;">
                                        <span>{{ $post->title }}</span>
                                    </div>
                                </div>
                                @php
                                    $timeAgo = \Carbon\Carbon::parse($post->created_at)->diffForHumans();
                                @endphp
                                <div class="time mx-2" style="padding-top:0">
                                    <i class="ri-time-fill"></i>
                                    <span>{{ $timeAgo }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <a href="" class="btn-sm btn btn-secondary w-100 rounded-0">সব
                        খবর</a>
                </div>
            </div>
        </div>
    </div>

    {{-- video gallery -------------------------- --}}
    <div class="container topM">
        <div class="video-gallery row px-1 px-md-3 py-4" style="background: #111">
            <div class="type pb-4 d-flex align-items-center gap-2"
                style="font-size: 20px; font-weight:700; color:#ddd; padding-left:3px; line-height:normal;">
                <i class="ri-film-line"></i>
                <span>ভিডিও গ্যালারি</span>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 py-1 px-1">
                <a href="" style="background: #333; display:block" id="hover">
                    <video controls class="w-100">
                        <source src="{{ asset('video/b.webM') }}" type="video/mp4">
                    </video>
                    <div class="title" style="padding: 2px 7px 7px 10px; color: #eee; font-size:22px;">
                        <span>শেখ হাসিনা সম্বন্ধে নতুন তথ্য দিলেন ডা. মুস্তাফিজুর
                            রহমান ইরান</span>
                    </div>
                    <div class="time mx-2" style="padding-top:0; font-size:14px; color:#a7a7a7; padding-bottom:10px;">
                        <i class="ri-time-fill"></i>
                        <span>১ ঘণ্টা আগে</span>
                    </div>
                </a>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-6 py-1 px-1">
                        <a href="" class="p-2" style="background: #333; display:block" id="hover">
                            <video controls class="w-100">
                                <source src="{{ asset('video/fg.webM') }}" type="video/mp4">
                            </video>
                            <div class="title" style="color: #eee; font-size:15px;">
                                <span>শেখ হাসিনা সম্বন্ধে নতুন তথ্য দিলেন ডা.
                                    মুস্তাফিজুর
                                    রহমান ইরান</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 py-1 px-1">
                        <a href="" class="p-2" style="background: #333; display:block" id="hover">
                            <video controls class="w-100">
                                <source src="{{ asset('video/dfg.webM') }}" type="video/mp4">
                            </video>
                            <div class="title" style="color: #eee; font-size:15px;">
                                <span>শেখ হাসিনা সম্বন্ধে নতুন তথ্য দিলেন ডা.
                                    মুস্তাফিজুর
                                    রহমান ইরান</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 py-1 px-1">
                        <a href="" class="p-2" style="background: #333; display:block" id="hover">
                            <video controls class="w-100">
                                <source src="{{ asset('video/g.webM') }}" type="video/mp4">
                            </video>
                            <div class="title" style="color: #eee; font-size:15px;">
                                <span>শেখ হাসিনা সম্বন্ধে নতুন তথ্য দিলেন ডা.
                                    মুস্তাফিজুর
                                    রহমান ইরান</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 py-1 px-1">
                        <a href="" class="p-2" style="background: #333; display:block" id="hover">
                            <video controls class="w-100">
                                <source src="{{ asset('video/k.webM') }}" type="video/mp4">
                            </video>
                            <div class="title" style="color: #eee; font-size:15px;">
                                <span>শেখ হাসিনা সম্বন্ধে নতুন তথ্য দিলেন ডা.
                                    মুস্তাফিজুর
                                    রহমান ইরান</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container topM p-0">
        <div class="grid-card px-1 px-md-0">
            <a href="" class="p-2" style=" height:max-content; display: block; border:1px solid #ccc;">
                <div class="d-flex gap-1">
                    <div class="text" style="flex:1;">
                        <p class="m-0 mb-1" style="font-size: 15px; color:#007377;">এখন ট্রেন্ডিং /</p>
                        <span
                            style="
                            color: #000;
                            font-size: 15px;
                            display: -webkit-box;
                            -webkit-line-clamp: 2;
                            -webkit-box-orient: vertical;
                            overflow: hidden;
                            text-overflow: ellipsis;">
                            পৃথিবীর আকাশে ‘দ্বিতীয় চাঁদ’ দেখা যাবে ২৯ সেপ্টেম্বর
                        </span>
                    </div>
                    <div class="img">
                        <img src="{{ asset('image/gm-kader-db-1727100683.jpg') }}" width="80" height="60"
                            alt="">
                    </div>
                </div>
            </a>
        </div>
    </div>

    {{-- news list and payeer time --}}

    <div class="container topM">
        <div class="row px-1 px-md-0">
            <div class="col-lg-9 col-md-12 p-0">
                <div class="grid-container">
                    <a href="">
                        <div class="border p-2">
                            <div class="img" style="width: 100%">
                                <img src="{{ asset('image/gm-kader-db-1727100683.jpg') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="title py-1"
                                style="font-size: 16px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="border p-2">
                            <div class="img" style="width: 100%">
                                <img src="{{ asset('image/gm-kader-db-1727100683.jpg') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="title py-1"
                                style="font-size: 16px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="border p-2">
                            <div class="img" style="width: 100%">
                                <img src="{{ asset('image/gm-kader-db-1727100683.jpg') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="title py-1"
                                style="font-size: 16px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="border p-2">
                            <div class="img" style="width: 100%">
                                <img src="{{ asset('image/gm-kader-db-1727100683.jpg') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="title py-1"
                                style="font-size: 16px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="border p-2">
                            <div class="img" style="width: 100%">
                                <img src="{{ asset('image/gm-kader-db-1727100683.jpg') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="title py-1"
                                style="font-size: 16px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </div>
                    </a>
                    <a href="">
                        <div class="border p-2">
                            <div class="img" style="width: 100%">
                                <img src="{{ asset('image/gm-kader-db-1727100683.jpg') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <div class="title py-1"
                                style="font-size: 16px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </div>
                    </a>
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
                        <span id="current-date" style="color: #fff; font-size:14px;"></span>
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
                    style="border-bottom: 4px double #75ac9d; font-size: 20px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <span>জাতীয়</span>
                </div>
                <div class="row py-3">
                    <div class="col-lg-6 col-md-12" style="border-right: 1px solid #ccc;">
                        <a href="" class="d-block" id="hover">
                            <div class="img">
                                <img src="{{ asset('image/1-1727101720.jpg') }}" class="w-100" alt="">
                            </div>
                            <div class="title my-1"
                                style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                            <div class="text"
                                style="font-size: 15px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>
                                    ‘বাংলাদেশি অনুপ্রবেশকারীদের উল্টো করে ঝোলানো হবে’ ভারতের কেন্দ্রীয় স্বরাষ্ট্রমন্ত্রী
                                    অমিত শাহর এ বক্তব্যের কড়া প্রতিবাদ ক‌রে‌ছে বাংলা‌দেশ।
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-12" id="border">
                        <a href="" class="d-block py-3 pt-0">
                            <div class="d-flex gap-2 align-items-center">
                                <div class="img" style="width:90px; height:60px;">
                                    <img class="w-100 h-100" src="{{ asset('image/jabi-db-1726806839.jpg') }}"
                                        alt="">
                                </div>
                                <div class="title"
                                    style="flex:1; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; color: #111; font-size: 15px; line-height: 25px;">
                                    <span>বাংলাদেশকে শুল্কমুক্ত বাজার দেবে চীন</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 p-0 px-1 px-md-2">
                <div class="type py-2"
                    style=" border-bottom: 4px double #75ac9d; font-size: 20px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <span>রাজনীতি</span>
                </div>
                <div class="row py-3">
                    <div class="col-lg-6 col-md-12" style="border-right: 1px solid #ccc;">
                        <a href="" class="d-block" id="hover">
                            <div class="img">
                                <img src="{{ asset('image/gm-kader-db-1727100683.jpg') }}" class="w-100"
                                    alt="">
                            </div>
                            <div class="title my-1"
                                style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                            <div class="text"
                                style="font-size: 15px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>
                                    ‘বাংলাদেশি অনুপ্রবেশকারীদের উল্টো করে ঝোলানো হবে’ ভারতের কেন্দ্রীয় স্বরাষ্ট্রমন্ত্রী
                                    অমিত শাহর এ বক্তব্যের কড়া প্রতিবাদ ক‌রে‌ছে বাংলা‌দেশ।
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-12" id="border">
                        <a href="" class="d-block py-3 pt-0">
                            <div class="d-flex gap-2 align-items-center">
                                <div class="img" style="width:90px; height:60px;">
                                    <img class="w-100 h-100" src="{{ asset('image/jabi-db-1726806839.jpg') }}"
                                        alt="">
                                </div>
                                <div class="title"
                                    style="flex:1; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; color: #111; font-size: 15px; line-height: 25px;">
                                    <span>বাংলাদেশকে শুল্কমুক্ত বাজার দেবে চীন</span>
                                </div>
                            </div>
                        </a>

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
                    style="border-bottom: 4px double #75ac9d; font-size: 20px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <span>সারাদেশ</span>
                </div>
            </div>

            <div class="col-12 px-md-2 px-1">
                <div class="d-flex flex-column flex-md-row py-3 mt-4 gap-3 gap-md-0 mb-2"
                    style="background: #ededed; align-items: center; justify-content: center;">
                    <div class="d-flex mx-4">
                        <div class="d-flex align-items-center gap-4">
                            <div>
                                <span style="color: #be475d;">আপনার এলাকার খবর</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-md-row gap-4 gap-md-2">
                        <div class="position-relative">
                            <select
                                class="form-select custom-select custom-width-200 custom-width-300 custom-width-250"
                                id="postCategory">
                                <option selected>বিভাগ</option>
                            </select>
                            <i class="ri-arrow-down-s-line dropdown-arrow"></i> <!-- Remixicon arrow -->
                        </div>
                        <div class="position-relative">
                            <select
                                class="form-select custom-select custom-width-200 custom-width-300 custom-width-250"
                                id="postCategory">
                                <option selected>জেলা</option>
                                <option value="">lalmonirhat</option>
                            </select>
                            <i class="ri-arrow-down-s-line dropdown-arrow"></i> <!-- Remixicon arrow -->
                        </div>
                    </div>
                    <div class="d-flex mx-4">
                        <div class="d-flex align-items-center gap-4">
                            <div>
                                <button type="submit" id="button" name="btnSubmit" class="btn btn-success"
                                    disabled="">খুঁজুন</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-2">
                <div class="row px-1 px-md-2">
                    <div class="col-lg-4 col-md-12 p-0">
                        <a href="" class="d-block" id="hover">
                            <div class="img">
                                <img src="{{ asset('image/1-1727101720.jpg') }}" class="w-100" alt="">
                            </div>
                            <div class="title my-1"
                                style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                            <div class="text"
                                style="font-size: 15px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>
                                    ‘বাংলাদেশি অনুপ্রবেশকারীদের উল্টো করে ঝোলানো হবে’ ভারতের কেন্দ্রীয় স্বরাষ্ট্রমন্ত্রী
                                    অমিত শাহর এ বক্তব্যের কড়া প্রতিবাদ ক‌রে‌ছে বাংলা‌দেশ।
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-12 px-0 px-md-2" id="border">
                        <a href="" class="d-block py-3">
                            <div class="d-flex gap-2 align-items-center">
                                <div class="img" style="width:90px; height:60px;">
                                    <img class="w-100 h-100" src="{{ asset('image/jabi-db-1726806839.jpg') }}"
                                        alt="">
                                </div>
                                <div class="title"
                                    style="flex:1; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; color: #111; font-size: 15px; line-height: 25px;">
                                    <span>বাংলাদেশকে শুল্কমুক্ত বাজার দেবে চীন</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-12 px-0 px-md-2 border-lg-left border-md-left-0" id="border">
                        <a href="" class="d-block py-3">
                            <div class="d-flex gap-2 align-items-center">
                                <div class="img" style="width:90px; height:60px;">
                                    <img class="w-100 h-100" src="{{ asset('image/jabi-db-1726806839.jpg') }}"
                                        alt="">
                                </div>
                                <div class="title"
                                    style=" flex:1; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; color: #111; font-size: 15px; line-height: 25px;">
                                    <span>বাংলাদেশকে শুল্কমুক্ত বাজার দেবে চীন</span>
                                </div>
                            </div>
                        </a>
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
                    style="border-bottom: 4px double #75ac9d; font-size: 20px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <span>আন্তর্জাতিক</span>
                </div>
                <div class="row py-3">
                    <div class="col-lg-6 col-md-12" style="border-right: 1px solid #ccc;">
                        <a href="" class="d-block" id="hover">
                            <div class="img">
                                <img src="{{ asset('image/1-1727101720.jpg') }}" class="w-100" alt="">
                            </div>
                            <div class="title my-1"
                                style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                            <div class="text"
                                style="font-size: 15px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>
                                    ‘বাংলাদেশি অনুপ্রবেশকারীদের উল্টো করে ঝোলানো হবে’ ভারতের কেন্দ্রীয় স্বরাষ্ট্রমন্ত্রী
                                    অমিত শাহর এ বক্তব্যের কড়া প্রতিবাদ ক‌রে‌ছে বাংলা‌দেশ।
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-12" id="border">
                        <a href="" class="d-block py-3">
                            <div class="d-flex gap-2 align-items-center">
                                <div class="img" style="width:90px; height:60px;">
                                    <img class="w-100 h-100" src="{{ asset('image/jabi-db-1726806839.jpg') }}"
                                        alt="">
                                </div>
                                <div class="title"
                                    style="flex:1; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; color: #111; font-size: 15px; line-height: 25px;">
                                    <span>বাংলাদেশকে শুল্কমুক্ত বাজার দেবে চীন</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 p-0 px-1">
                <div class="type py-2"
                    style=" border-bottom: 4px double #75ac9d; font-size: 20px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <span>রাজধানী</span>
                </div>
                <div class="row py-3">
                    <div class="col-lg-6 col-md-12" style="border-right: 1px solid #ccc;">
                        <a href="" class="d-block" id="hover">
                            <div class="img">
                                <img src="{{ asset('image/gm-kader-db-1727100683.jpg') }}" class="w-100"
                                    alt="">
                            </div>
                            <div class="title my-1"
                                style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                            <div class="text"
                                style="font-size: 15px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>
                                    ‘বাংলাদেশি অনুপ্রবেশকারীদের উল্টো করে ঝোলানো হবে’ ভারতের কেন্দ্রীয় স্বরাষ্ট্রমন্ত্রী
                                    অমিত শাহর এ বক্তব্যের কড়া প্রতিবাদ ক‌রে‌ছে বাংলা‌দেশ।
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-12" id="border">
                        <a href="" class="d-block py-3">
                            <div class="d-flex gap-2 align-items-center">
                                <div class="img" style="width:90px; height:60px;">
                                    <img class="w-100 h-100" src="{{ asset('image/jabi-db-1726806839.jpg') }}"
                                        alt="">
                                </div>
                                <div class="title"
                                    style="flex:1; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; color: #111; font-size: 15px; line-height: 25px;">
                                    <span>বাংলাদেশকে শুল্কমুক্ত বাজার দেবে চীন</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- বিনোদন news list --}}
    <div class="container topM px-1">
        <div class="type py-2"
            style="border-bottom: 4px double #75ac9d; font-size: 20px; font-weight:700; color:#333;">
            <i class="ri-file-text-line"></i>
            <span>বিনোদন</span>
        </div>
        <div class="row py-3">
            <div class="col-lg-4 col-md-12 border-lg-right border-md-right-0" id="border">
                <a href="" class="d-block py-3">
                    <div class="d-flex gap-2 align-items-center">
                        <div class="img" style="width:90px; height:60px;">
                            <img class="w-100 h-100" src="{{ asset('image/jabi-db-1726806839.jpg') }}"
                                alt="">
                        </div>
                        <div class="title"
                            style="flex:1; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; color: #111; font-size: 15px; line-height: 25px;">
                            <span>বাংলাদেশকে শুল্কমুক্ত বাজার দেবে চীন</span>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-4 col-md-12 border-lg-right border-md-right-0">
                <a href="">
                    <div class="img w-100">
                        <img src="{{ asset('image/810100-198-1727425848.jpg') }}" class="w-100" alt="">
                    </div>
                    <div class="title py-2" style="font-size: 18px; color:#111; font-weight:600">
                        <span>ওটিটিতে মনোযোগী জাহিদ হাসান</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-12" id="border">
                <a href="" class="d-block py-3">
                    <div class="d-flex gap-2 align-items-center">
                        <div class="img" style="width:90px; height:60px;">
                            <img class="w-100 h-100" src="{{ asset('image/jabi-db-1726806839.jpg') }}"
                                alt="">
                        </div>
                        <div class="title"
                            style="flex:1; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; color: #111; font-size: 15px; line-height: 25px;">
                            <span>বাংলাদেশকে শুল্কমুক্ত বাজার দেবে চীন</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    {{-- অর্থনীতি news list --}}

    <div class="container topM">
        <div class="row">
            <div class="col-lg-9 col-md-12 p-0 px-1">
                <div class="type py-2"
                    style="border-bottom: 4px double #75ac9d; font-size: 20px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <span>খেলা</span>
                </div>
                <div class="row py-3">
                    <div class="col-lg-7 col-md-12" style="border-right: 1px solid #ccc;">
                        <div class="row">
                            <div class="col-12">
                                <a href="" class="d-block" id="hover">
                                    <div class="img">
                                        <img src="{{ asset('image/1-1727101720.jpg') }}" class="w-100"
                                            alt="">
                                    </div>
                                    <div class="title my-1"
                                        style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                        <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                                    </div>
                                    <div class="my-2" style="border-bottom: 1px solid #ccc"></div>
                                </a>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="" class="d-block" id="hover">
                                            <div class="img">
                                                <img src="{{ asset('image/1-1727101720.jpg') }}" class="w-100"
                                                    alt="">
                                            </div>
                                            <div class="title my-1"
                                                style="font-size: 15px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="" class="d-block" id="hover">
                                            <div class="img">
                                                <img src="{{ asset('image/1-1727101720.jpg') }}" class="w-100"
                                                    alt="">
                                            </div>
                                            <div class="title my-1"
                                                style="font-size: 15px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12" id="border" style="border-right: 1px solid #ccc">
                        <a href="" class="d-block py-2">
                            <div class="d-flex gap-2 align-items-center">
                                <div class="img" style="width:90px; height:60px;">
                                    <img class="w-100 h-100" src="{{ asset('image/jabi-db-1726806839.jpg') }}"
                                        alt="">
                                </div>
                                <div class="title"
                                    style="flex:1; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; color: #111; font-size: 15px; line-height: 25px;">
                                    <span>বাংলাদেশকে শুল্কমুক্ত বাজার দেবে চীন</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 p-0 px-md-3 px-1">
                <div class="type py-2"
                    style=" border-bottom: 4px double #75ac9d; font-size: 20px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <span>অর্থনীতি</span>
                </div>
                <div class="row py-3">
                    <div class="col-12">
                        <a href="" class="d-block" id="hover">
                            <div class="img">
                                <img src="{{ asset('image/gm-kader-db-1727100683.jpg') }}" class="w-100"
                                    alt="">
                            </div>
                            <div class="title my-1"
                                style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                            <div class="text mb-1"
                                style="font-size: 14px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>
                                    ‘বাংলাদেশি অনুপ্রবেশকারীদের উল্টো করে ঝোলানো হবে’ ভারতের কেন্দ্রীয় স্বরাষ্ট্রমন্ত্রী
                                    অমিত শাহর এ বক্তব্যের কড়া প্রতিবাদ ক‌রে‌ছে বাংলা‌দেশ।
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 mt-1" id="border">
                        <a href="" class="d-block p-0 py-2">
                            <div class="d-flex gap-2 align-items-center">
                                <div class="img" style="width:90px; height:60px;">
                                    <img class="w-100 h-100" src="{{ asset('image/jabi-db-1726806839.jpg') }}"
                                        alt="">
                                </div>
                                <div class="title"
                                    style="flex:1; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; color: #111; font-size: 15px; line-height: 25px;">
                                    <span>বাংলাদেশকে শুল্কমুক্ত বাজার দেবে চীন</span>
                                </div>
                            </div>
                        </a>
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
                    style="border-bottom: 4px double #75ac9d; font-size: 20px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <span>আইন-আদালত</span>
                </div>
                <div class="row p-0 py-3">
                    <div class="col-12">
                        <a href="" class="d-block" id="hover">
                            <div class="img">
                                <img src="{{ asset('image/khulna-db-1727429217.jpg') }}" class="w-100"
                                    alt="">
                            </div>
                            <div class="title my-1"
                                style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                            <div class="text mb-1"
                                style="font-size: 15px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>
                                    ‘বাংলাদেশি অনুপ্রবেশকারীদের উল্টো করে ঝোলানো হবে’ ভারতের কেন্দ্রীয় স্বরাষ্ট্রমন্ত্রী
                                    অমিত শাহর এ বক্তব্যের কড়া প্রতিবাদ ক‌রে‌ছে বাংলা‌দেশ।
                                </span>
                            </div>
                            <div class="mb-3 mt-1" style="border-bottom:1px solid #ccc"></div>
                        </a>
                    </div>
                    <div class="col-12" id="border">
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12" style="border-right:1px solid #ccc">
                <div class="type py-2"
                    style="border-bottom: 4px double #75ac9d; font-size: 20px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <span>মুখোমুখি</span>
                </div>
                <div class="row p-0 py-3">
                    <div class="col-12">
                        <a href="" class="d-block" id="hover">
                            <div class="img">
                                <img src="{{ asset('image/gm-kader-db-1727100683.jpg') }}" class="w-100"
                                    alt="">
                            </div>
                            <div class="title my-1"
                                style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                            <div class="text mb-1"
                                style="font-size: 15px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>
                                    ‘বাংলাদেশি অনুপ্রবেশকারীদের উল্টো করে ঝোলানো হবে’ ভারতের কেন্দ্রীয় স্বরাষ্ট্রমন্ত্রী
                                    অমিত শাহর এ বক্তব্যের কড়া প্রতিবাদ ক‌রে‌ছে বাংলা‌দেশ।
                                </span>
                            </div>
                            <div class="mb-3 mt-1" style="border-bottom:1px solid #ccc"></div>
                        </a>
                    </div>
                    <div class="col-12" id="border">
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="type py-2"
                    style="border-bottom: 4px double #75ac9d; font-size: 20px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <span>স্বাস্থ্য ও চিকিৎসা</span>
                </div>
                <div class="row p-0 py-3">
                    <div class="col-12">
                        <a href="" class="d-block" id="hover">
                            <div class="img">
                                <img src="{{ asset('image/gm-kader-db-1727100683.jpg') }}" class="w-100"
                                    alt="">
                            </div>
                            <div class="title my-1"
                                style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                            <div class="text mb-1"
                                style="font-size: 15px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>
                                    ‘বাংলাদেশি অনুপ্রবেশকারীদের উল্টো করে ঝোলানো হবে’ ভারতের কেন্দ্রীয় স্বরাষ্ট্রমন্ত্রী
                                    অমিত শাহর এ বক্তব্যের কড়া প্রতিবাদ ক‌রে‌ছে বাংলা‌দেশ।
                                </span>
                            </div>
                            <div class="mb-3 mt-1" style="border-bottom:1px solid #ccc"></div>
                        </a>
                    </div>
                    <div class="row" id="border">
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- লাইফস্টাইল news list --}}

    <div class="container topM px-1">
        <div class="type py-2"
            style="border-bottom: 4px double #75ac9d; font-size: 20px; font-weight:700; color:#333;">
            <i class="ri-file-text-line"></i>
            <span>লাইফস্টাইল</span>
        </div>
        <div class="row py-2">
            <div class="col-lg-3 col-md-12" style="border-right:1px solid #ccc" id="border">
                <a href="" class="b-block">
                    <div class="img">
                        <img src="{{ asset('image/810100-198-1727425848.jpg') }}" class="w-100" alt="">
                    </div>
                    <div class="title my-2"
                        style="font-size: 17px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                        <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-12" style="border-right:1px solid #ccc" id="border">
                <a href="" class="b-block">
                    <div class="img">
                        <img src="{{ asset('image/810100-198-1727425848.jpg') }}" class="w-100" alt="">
                    </div>
                    <div class="title my-2"
                        style="font-size: 17px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                        <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-12" style="border-right:1px solid #ccc" id="border">
                <a href="" class="b-block">
                    <div class="img">
                        <img src="{{ asset('image/810100-198-1727425848.jpg') }}" class="w-100" alt="">
                    </div>
                    <div class="title my-2"
                        style="font-size: 17px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                        <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-12" id="border">
                <a href="" class="b-block">
                    <div class="img">
                        <img src="{{ asset('image/810100-198-1727425848.jpg') }}" class="w-100" alt="">
                    </div>
                    <div class="title my-2"
                        style="font-size: 17px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                        <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="container topM px-1">
        <div class="row">
            <div class="col-lg-4 col-md-12" style="border-right:1px solid #ccc">
                <div class="type py-2"
                    style="border-bottom: 4px double #75ac9d; font-size: 20px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <span>ধর্ম</span>
                </div>
                <div class="row p-0 py-3">
                    <div class="col-12">
                        <a href="" class="d-block" id="hover">
                            <div class="img">
                                <img src="{{ asset('image/khulna-db-1727429217.jpg') }}" class="w-100"
                                    alt="">
                            </div>
                            <div class="title my-1"
                                style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                            <div class="text mb-1"
                                style="font-size: 15px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>
                                    ‘বাংলাদেশি অনুপ্রবেশকারীদের উল্টো করে ঝোলানো হবে’ ভারতের কেন্দ্রীয় স্বরাষ্ট্রমন্ত্রী
                                    অমিত শাহর এ বক্তব্যের কড়া প্রতিবাদ ক‌রে‌ছে বাংলা‌দেশ।
                                </span>
                            </div>
                            <div class="mb-3 mt-1" style="border-bottom:1px solid #ccc"></div>
                        </a>
                    </div>
                    <div class="col-12" id="border">
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12" style="border-right:1px solid #ccc">
                <div class="type py-2"
                    style="border-bottom: 4px double #75ac9d; font-size: 20px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <span>শিল্প-সাহিত্য</span>
                </div>
                <div class="row p-0 py-3">
                    <div class="col-12">
                        <a href="" class="d-block" id="hover">
                            <div class="img">
                                <img src="{{ asset('image/gm-kader-db-1727100683.jpg') }}" class="w-100"
                                    alt="">
                            </div>
                            <div class="title my-1"
                                style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                            <div class="text mb-1"
                                style="font-size: 15px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>
                                    ‘বাংলাদেশি অনুপ্রবেশকারীদের উল্টো করে ঝোলানো হবে’ ভারতের কেন্দ্রীয় স্বরাষ্ট্রমন্ত্রী
                                    অমিত শাহর এ বক্তব্যের কড়া প্রতিবাদ ক‌রে‌ছে বাংলা‌দেশ।
                                </span>
                            </div>
                            <div class="mb-3 mt-1" style="border-bottom:1px solid #ccc"></div>
                        </a>
                    </div>
                    <div class="col-12" id="border">
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="type py-2"
                    style="border-bottom: 4px double #75ac9d; font-size: 20px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <span>প্রবাস জীবন</span>
                </div>
                <div class="row p-0 py-3">
                    <div class="col-12">
                        <a href="" class="d-block" id="hover">
                            <div class="img">
                                <img src="{{ asset('image/gm-kader-db-1727100683.jpg') }}" class="w-100"
                                    alt="">
                            </div>
                            <div class="title my-1"
                                style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                            <div class="text mb-1"
                                style="font-size: 15px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>
                                    ‘বাংলাদেশি অনুপ্রবেশকারীদের উল্টো করে ঝোলানো হবে’ ভারতের কেন্দ্রীয় স্বরাষ্ট্রমন্ত্রী
                                    অমিত শাহর এ বক্তব্যের কড়া প্রতিবাদ ক‌রে‌ছে বাংলা‌দেশ।
                                </span>
                            </div>
                            <div class="mb-3 mt-1" style="border-bottom:1px solid #ccc"></div>
                        </a>
                    </div>
                    <div class="col-12" id="border">
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
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
                    style="border-bottom: 4px double #75ac9d; font-size: 20px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <span>শিক্ষাঙ্গন</span>
                </div>
                <div class="row p-0 py-3">
                    <div class="col-12">
                        <a href="" class="d-block" id="hover">
                            <div class="img">
                                <img src="{{ asset('image/khulna-db-1727429217.jpg') }}" class="w-100"
                                    alt="">
                            </div>
                            <div class="title my-1"
                                style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                            <div class="text mb-1"
                                style="font-size: 15px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>
                                    ‘বাংলাদেশি অনুপ্রবেশকারীদের উল্টো করে ঝোলানো হবে’ ভারতের কেন্দ্রীয় স্বরাষ্ট্রমন্ত্রী
                                    অমিত শাহর এ বক্তব্যের কড়া প্রতিবাদ ক‌রে‌ছে বাংলা‌দেশ।
                                </span>
                            </div>
                            <div class="mb-3 mt-1" style="border-bottom:1px solid #ccc"></div>
                        </a>
                    </div>
                    <div class="col-12" id="border">
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12" style="border-right:1px solid #ccc">
                <div class="type py-2"
                    style="border-bottom: 4px double #75ac9d; font-size: 20px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <span>মজার খবর</span>
                </div>
                <div class="row p-0 py-3">
                    <div class="col-12">
                        <a href="" class="d-block" id="hover">
                            <div class="img">
                                <img src="{{ asset('image/gm-kader-db-1727100683.jpg') }}" class="w-100"
                                    alt="">
                            </div>
                            <div class="title my-1"
                                style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                            <div class="text mb-1"
                                style="font-size: 15px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>
                                    ‘বাংলাদেশি অনুপ্রবেশকারীদের উল্টো করে ঝোলানো হবে’ ভারতের কেন্দ্রীয় স্বরাষ্ট্রমন্ত্রী
                                    অমিত শাহর এ বক্তব্যের কড়া প্রতিবাদ ক‌রে‌ছে বাংলা‌দেশ।
                                </span>
                            </div>
                            <div class="mb-3 mt-1" style="border-bottom:1px solid #ccc"></div>
                        </a>
                    </div>
                    <div class="col-12" id="border">
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="type py-2"
                    style="border-bottom: 4px double #75ac9d; font-size: 20px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <span>সাতরং</span>
                </div>
                <div class="row p-0 py-3">
                    <div class="col-12">
                        <a href="" class="d-block" id="hover">
                            <div class="img">
                                <img src="{{ asset('image/gm-kader-db-1727100683.jpg') }}" class="w-100"
                                    alt="">
                            </div>
                            <div class="title my-1"
                                style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                            <div class="text mb-1"
                                style="font-size: 15px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>
                                    ‘বাংলাদেশি অনুপ্রবেশকারীদের উল্টো করে ঝোলানো হবে’ ভারতের কেন্দ্রীয় স্বরাষ্ট্রমন্ত্রী
                                    অমিত শাহর এ বক্তব্যের কড়া প্রতিবাদ ক‌রে‌ছে বাংলা‌দেশ।
                                </span>
                            </div>
                            <div class="mb-3 mt-1" style="border-bottom:1px solid #ccc"></div>
                        </a>
                    </div>
                    <div class="col-12" id="border">
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
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
                    style="border-bottom: 4px double #75ac9d; font-size: 20px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <span>ফিচার</span>
                </div>
                <div class="row p-0 py-3">
                    <div class="col-12">
                        <a href="" class="d-block" id="hover">
                            <div class="img">
                                <img src="{{ asset('image/khulna-db-1727429217.jpg') }}" class="w-100"
                                    alt="">
                            </div>
                            <div class="title my-1"
                                style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                            <div class="text mb-1"
                                style="font-size: 15px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>
                                    ‘বাংলাদেশি অনুপ্রবেশকারীদের উল্টো করে ঝোলানো হবে’ ভারতের কেন্দ্রীয় স্বরাষ্ট্রমন্ত্রী
                                    অমিত শাহর এ বক্তব্যের কড়া প্রতিবাদ ক‌রে‌ছে বাংলা‌দেশ।
                                </span>
                            </div>
                            <div class="mb-3 mt-1" style="border-bottom:1px solid #ccc"></div>
                        </a>
                    </div>
                    <div class="col-12" id="border">
                        <a href="" class="d-block d-flex align-items-start gap-2 py-3 py-sm-0">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                        <a href="" class="d-block d-flex align-items-start gap-2 py-3 py-sm-0">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                        <a href="" class="d-block d-flex align-items-start gap-2 py-3 py-sm-0">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12" style="border-right:1px solid #ccc">
                <div class="type py-2"
                    style="border-bottom: 4px double #75ac9d; font-size: 20px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <span>জব কর্নার</span>
                </div>
                <div class="row p-0 py-3">
                    <div class="col-12">
                        <a href="" class="d-block" id="hover">
                            <div class="img">
                                <img src="{{ asset('image/gm-kader-db-1727100683.jpg') }}" class="w-100"
                                    alt="">
                            </div>
                            <div class="title my-1"
                                style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                            <div class="text mb-1"
                                style="font-size: 15px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>
                                    ‘বাংলাদেশি অনুপ্রবেশকারীদের উল্টো করে ঝোলানো হবে’ ভারতের কেন্দ্রীয় স্বরাষ্ট্রমন্ত্রী
                                    অমিত শাহর এ বক্তব্যের কড়া প্রতিবাদ ক‌রে‌ছে বাংলা‌দেশ।
                                </span>
                            </div>
                            <div class="mb-3 mt-1" style="border-bottom:1px solid #ccc"></div>
                        </a>
                    </div>
                    <div class="col-12" id="border">
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="type py-2"
                    style="border-bottom: 4px double #75ac9d; font-size: 20px; font-weight:700; color:#333;">
                    <i class="ri-file-text-line"></i>
                    <span>তথ্যপ্রযুক্তি</span>
                </div>
                <div class="row p-0 py-3">
                    <div class="col-12">
                        <a href="" class="d-block" id="hover">
                            <div class="img">
                                <img src="{{ asset('image/gm-kader-db-1727100683.jpg') }}" class="w-100"
                                    alt="">
                            </div>
                            <div class="title my-1"
                                style="font-size: 18px; color: #333; font-weight: 700; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                            <div class="text mb-1"
                                style="font-size: 15px; color: #333; line-height: 26px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>
                                    ‘বাংলাদেশি অনুপ্রবেশকারীদের উল্টো করে ঝোলানো হবে’ ভারতের কেন্দ্রীয় স্বরাষ্ট্রমন্ত্রী
                                    অমিত শাহর এ বক্তব্যের কড়া প্রতিবাদ ক‌রে‌ছে বাংলা‌দেশ।
                                </span>
                            </div>
                            <div class="mb-3 mt-1" style="border-bottom:1px solid #ccc"></div>
                        </a>
                    </div>
                    <div class="col-12" id="border">
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
                        <a href="" class="d-block d-flex align-items-start gap-2">
                            <div class="mt-2"
                                style="height: 15px; width:17px; border-radius:3px; background:#007377"></div>
                            <div class="title my-1" id="border"
                                style="font-size: 17px; color: #333; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                <span>লেবাননে ইসরায়েলের ভয়াবহ বিমান হামলা, নিহত</span>
                            </div>
                        </a>
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
