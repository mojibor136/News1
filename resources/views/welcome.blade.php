<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <title>Home</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Roboto', sans-serif;
        padding-bottom: 500px;
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

    /* link header  */

    .link-header {
        background-color: #29725e;
        border-bottom: 1px solid #dee2e6;
    }

    .navbar-nav .nav-item {
        position: relative;
    }

    .dropdown-menu {
        top: 100%;
        left: 0;
        margin-top: 0;
        border-radius: 0;
        border-bottom: none;
        padding: 0;
    }

    .dropdown-menu li {
        border-bottom: 1px solid #ddd;
    }

    .dropdown-menu li:hover a {
        background: #ddd;
    }

    .dropdown-item {
        padding: 8px;
    }

    .nav-link {
        padding: 10px 12px;
        color: #fff;
        font-size: 16px;
    }

    .nav-link:hover {
        color: #ddd;
    }

    .nav-item:hover .dropdown-menu {
        display: block;
    }

    .navbar-expand-lg .navbar-nav {
        gap: 12px;
    }

    .logo {
        width: 80%;
    }

    .ads-logo {
        width: 100%;
        height: 100%;
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
        font-size: 16px;
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
    }

    a {
        text-decoration: none;
        color: transparent;
    }

    .post-content {
        border-bottom: 1px solid #ddd;
    }

    @media (max-width: 1280px) {
        .container {
            margin: 0 5px;
        }
    }
</style>

<body>
    {{-- top header --}}
    <header class="bg-white text-black border-bottom">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center justify-content-center gap-2" style="color: #333; font-size:14px">
                    <i class="ri-calendar-fill"></i>
                    <span>মঙ্গলবার , ১৭ সেপ্টেম্বর ২০২৪ , ২ আশ্বিন ১৪৩১</span>
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
                    <div
                        class="d-flex align-items-center justify-content-center bg-secondary rounded-circle icon-container">
                        <i class="ri-search-line"></i>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    {{-- logo and ads img --}}

    <div class="container xl-m-0">
        <div class="row py-2">
            <div class="col-4 d-flex align-items-center">
                <img class="logo" src="{{ asset('logo/logo.webp') }}" alt="">
            </div>
            <div class="col-8 d-flex align-items-center">
                <img class="ads-logo" src="{{ asset('logo/Beximco-LPG-28-01-2023.webp') }}" alt="">
            </div>
        </div>
    </div>

    {{-- navbar --}}

    <header class="link-header sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg p-0">
                <div class="navbar-nav">
                    <div class="nav-item dropdown">
                        <a class="nav-link" href="#">
                            জাতীয়
                        </a>
                    </div>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            সারাদেশ
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">ঢাকা</a></li>
                            <li><a class="dropdown-item" href="#">চট্টগ্রাম</a></li>
                            <li><a class="dropdown-item" href="#">রাজশাহী</a></li>
                            <li><a class="dropdown-item" href="#">খুলনা</a></li>
                            <li><a class="dropdown-item" href="#">বরিশাল</a></li>
                            <li><a class="dropdown-item" href="#">সিলেট</a></li>
                            <li><a class="dropdown-item" href="#">রংপুর</a></li>
                            <li><a class="dropdown-item" href="#">ময়মনসিংহ</a></li>
                        </ul>
                    </div>
                    <div class="nav-item dropdown">
                        <a class="nav-link" href="#">
                            আর্কাইভ
                        </a>
                    </div>
                    <div class="nav-item dropdown">
                        <a class="nav-link" href="#">
                            অপরাধ
                        </a>
                    </div>
                    <div class="nav-item dropdown">
                        <a class="nav-link" href="#">
                            ট্রেন্ডিং
                        </a>
                    </div>
                    <div class="nav-item dropdown">
                        <a class="nav-link" href="#">
                            ভাইরাল
                        </a>
                    </div>
                    <div class="nav-item dropdown">
                        <a class="nav-link" href="#">
                            ফ্যাক্টচেক
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    {{-- main content  --}}

    <div class="container xl-m-0">
        <div class="row py-2">
            <div class="col-6 p-1">
                <a href="">
                    <div class="news">
                        <div class="img">
                            <img src="{{ asset('image/886-1726671367.jpg') }}" class="img-fluid" alt="">
                        </div>
                        <div class="title">
                            <h3>প্রাথমিকভাবে শহিদ পরিবার পাবে ৫ লাখ টাকা, আহত ব্যক্তি ১ লাখ</h3>
                            <div class="text">
                                <span>গণঅভ্যুত্থানে নিহত শহিদদের প্রত্যেক পরিবার প্রাথমিকভাবে ৫ লাখ টাকা এবং আহত
                                    প্রত্যেক
                                    ব্যক্তি প্রাথমিকভাবে সর্বোচ্চ এক লাখ টাকা করে দেওয়ার সিদ্ধান্ত হয়েছে।বুধবার
                                    অন্তর্বর্তীকালীন সরকারের প্রধান উপদেষ্টা ড. মুহাম্মদ ইউনূসের সভাপতিত্বে জুলাই শহিদ
                                    স্মৃতি ফাউন্ডেশনের কার্যনির্বাহী কমিটির প্রথম বৈঠকে এ সিদ্ধান্ত...
                                </span>
                            </div>
                            <div class="time px-1">
                                <i class="ri-time-fill"></i>
                                <span>১ ঘণ্টা আগে</span>
                            </div>
                        </div>
                        <div class="border"></div>
                    </div>
                </a>
            </div>

            <div class="col-3 p-2 py-1">
                <div class="border p-2 post">
                    <a href="">
                        <div class="post-content">
                            <div style="display: flex; flex-direction:row; gap:5px;">
                                <div class="img">
                                    <img width="90" height="55"
                                        src="{{ asset('image/metro-rail-db-1726662331.jpg') }}" alt="">
                                </div>
                                <div class="title" style="font-size: 18px;">
                                    <h4 class="m-0" style="line-height: inherit;">
                                        শুক্রবারও চলবে মেট্রোরেল, জেনে নিন সময়সূচি
                                    </h4>
                                </div>
                            </div>
                            <div class="text mt-1">
                                <span>রাজধানীর উত্তরা থেকে মতিঝিল পর্যন্ত সপ্তাহে ৬ দিন চলাচল করতো মেট্রোরেল। শুক্রবার
                                    বন্ধ
                                    থাকতো। তবে আগামী ২০ সেপ্টেম্বর থেকে শুক্রবারও মেট্রোর সেবা পাবেন রাজধানীবাসী।
                                    অর্থাৎ,
                                    সেদিন থেকে সপ্তাহে ৭ দিনই চলবে মেট্রোরেল। তবে শুক্রবার মেট্রোরেল চলাচলের সময়সূচিতে
                                    ভিন্নতা রয়েছে।
                                </span>
                                <div class="time">
                                    <i class="ri-time-fill"></i>
                                    <span>১ ঘণ্টা আগে</span>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="">
                        <div class="post-content">
                            <div style="display: flex; flex-direction:row; gap:5px;">
                                <div class="img">
                                    <img width="90" height="55"
                                        src="{{ asset('image/moshior-db-1726805072.jpg') }}" alt="">
                                </div>
                                <div class="title" style="font-size: 18px;">
                                    <h4 class="m-0" style="line-height: inherit;">
                                        অতিরিক্ত ডিআইজি মশিউর রহমান গ্রেফতার
                                    </h4>
                                </div>
                            </div>
                            <div class="text mt-1">
                                <span>
                                    বাংলাদেশ পুলিশের চট্টগ্রাম রেঞ্জের অতিরিক্ত ডিআইজি মশিউর রহমানকে গ্রেফতার করা হয়েছে।
                                    চট্টগ্রাম থেকে আটক করে তাকে ঢাকা নিয়ে আসা হয়েছে। এর আগে তিনি ঢাকা মহানগর গোয়েন্দা
                                    পুলিশে
                                    (ডিবি) কর্মরত ছিলেন...
                                </span>
                                <div class="time">
                                    <i class="ri-time-fill"></i>
                                    <span>১ ঘণ্টা আগে</span>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="">
                        <div class="post-content">
                            <div style="display: flex; flex-direction:row; gap:5px;">
                                <div class="img">
                                    <img width="90" height="55"
                                        src="{{ asset('image/s-alam-db-1726809858.jpg') }}" alt="">
                                </div>
                                <div class="title" style="font-size: 18px;">
                                    <h4 class="m-0" style="line-height: inherit;">
                                        এস আলমের সম্পদের তথ্য চেয়েছে সিঙ্গাপুরের আর্থিক গোয়েন্দা সংস্থা
                                    </h4>
                                </div>
                            </div>
                            <div class="text mt-1">
                                <span>
                                    দেশের ব্যাংকখাত থেকে জালিয়াতি ও অনিয়মের মাধ্যমে বিপুল সম্পদ আত্মসাৎ ও বিদেশে পাচারের
                                    অভিযোগ রয়েছে এস আলম গ্রুপের বিরুদ্ধে। বাংলাদেশ ফাইন্যান্সিয়াল ইন্টেলিজেন্স ইউনিটের
                                    (বিএফআইইউ) কাছে এস আলম গ্রুপ ও এর মালিকদের দেশে-বিদেশে থাকা সম্পদের বিস্তারিত তথ্য
                                    জানতে
                                    চেয়েছে সিঙ্গাপুরের আর্থিক গোয়েন্দা সংস্থা ফাইন্যান্সিয়াল ইন্টেলিজেন্স ইউনিট
                                    (এফআইইউ)।
                                </span>
                                <div class="time">
                                    <i class="ri-time-fill"></i>
                                    <span>১ ঘণ্টা আগে</span>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="">
                        <div class="post-content">
                            <div style="display: flex; flex-direction:row; gap:5px;">
                                <div class="img">
                                    <img width="90" height="55"
                                        src="{{ asset('image/jabi-db-1726806839.jpg') }}" alt="">
                                </div>
                                <div class="title" style="font-size: 18px;">
                                    <h4 class="m-0" style="line-height: inherit;">
                                        গণপিটুনিতে মৃত্যুর ঘটনায় জাবিতে তদন্ত কমিটি গঠন
                                    </h4>
                                </div>
                            </div>
                            <div class="text mt-1">
                                <span>
                                    জাহাঙ্গীরনগর বিশ্ববিদ্যালয়ের (জাবি) সাবেক শিক্ষার্থী ও ছাত্রলীগ নেতা শামীম আহমেদ
                                    ওরফে
                                    শামীম মোল্লাকে পিটিয়ে হত্যার ঘটনায় ছয় সদস্যের তদন্ত কমিটি গঠন করেছে বিশ্ববিদ্যালয়
                                    প্রশাসন। তদন্ত কমিটিকে আগামী ৩০ কর্মদিবসের মধ্যে সুপারিশসহ প্রতিবেদন জমা দেওয়ার
                                    নির্দেশ
                                    দেওয়া হয়েছে।
                                </span>
                                <div class="time">
                                    <i class="ri-time-fill"></i>
                                    <span>১ ঘণ্টা আগে</span>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
            </div>

            <div class="col-3 p-1">

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
