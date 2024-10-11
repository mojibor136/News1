<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @include('icon.icon')
    @include('layout.scroll')
    <title>{{ $viewPost->title }}</title>
</head>
<style>
    .title-line-tow {
        font-size: 18px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.6;
    }

    .grid-container-six {
        width: 100%;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }

    .social-icon {
        display: flex;
        gap: 5px;
    }

    .social-icon a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 33px;
        height: 33px;
        border-radius: 50%;
        border: 1px solid #ddd;
        color: #fff;
        transition: background-color 0.3s ease;
        text-decoration: none;
    }

    .social-icon i {
        font-size: 20px;
    }

    @media print {
        header {
            display: none;
        }

        .footer-container {
            display: none;
        }

        #none-pdf {
            display: none;
        }
    }

    @media (max-width: 768px) {
        #p {
            padding-right: 0;
            padding-left: 0;
        }
    }

    @media (max-width: 640px) {
        .grid-container-six {
            grid-template-columns: repeat(1, 1fr);
        }
    }
</style>

<body>
    @include('layout.search')
    @include('layout.header')

    <div class="container mt-1">
        <div class="row px-2">
            <div class="col-12 col-md-7">
                <div class="row px-1">
                    <div class="category py-4 pb-2 px-0">
                        <a href="" style="color: #007377; text-decoration:underline; font-size:24px;">{{ $name }}</a>
                    </div>
                    <div class="name py-4 pt-0 px-0" style="font-weight: 600;color:#333; font-size:28px;">
                        <span>{{ $viewPost->title }}</span>
                    </div>
                    <div class="col-12 col-md-6 border-bottom py-3 pt-0 px-0">
                        <div class="d-flex flex-column gap-1">
                            <div class="d-flex align-items-center gap-1">
                                <i style="color:#555;font-size:18px;" class="ri-ball-pen-line"></i>
                                <span style="font-size:16px; color:#555">{{ $viewPost->reporter }}</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i style="color:#555;font-size:18px;" class="ri-time-fill"></i>
                                <span style="font-size:16px; color:#555">প্রকাশিত:
                                    {{ \Carbon\Carbon::parse($viewPost->created_at)->locale('bn_BD')->translatedFormat('g:i A, d F Y') }}</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i style="color:#555;font-size:18px;" class="ri-time-fill"></i>
                                <span style="font-size:16px; color:#555">আপডেট:
                                    {{ \Carbon\Carbon::parse($viewPost->updated_at)->locale('bn_BD')->translatedFormat('g:i A, d F Y') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 d-flex align-items-center px-0 px-md-2 py-3 py-md-0">
                        <div class="d-flex flex-column gap-2">
                            <div class="icon d-flex gap-2">
                                <a href="javascript:void(0);" onclick="printPage()"
                                    style="display: flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 50%; border: 1px solid #333;">
                                    <i style="color: #333; font-size:18px;" class="ri-printer-line"></i>
                                </a>
                                <a href=""
                                    style="display: flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 50%; border: 1px solid #333;">
                                    <span style="color: #333; font-size:18px;">A-</span>
                                </a>
                                <a href=""
                                    style="display: flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 50%; border: 1px solid #333;">
                                    <span style="color: #333; font-size:18px;">A</span>
                                </a>
                                <a href=""
                                    style="display: flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 50%; border: 1px solid #333;">
                                    <span style="color: #333; font-size:18px;">A+</span>
                                </a>
                            </div>
                            <div class="social-icon">
                                <?php
                            $socialLinks = getSocialLinks();
                            foreach ($socialLinks as $socialLink) {
                                $icon = '';
                                $bgColor = '';
                                
                                switch ($socialLink->name) {
                                    case 'Facebook':
                                        $icon = 'ri-facebook-line';
                                        $bgColor = '#3b5998';
                                        break;
                                    case 'YouTube':
                                        $icon = 'ri-youtube-line';
                                        $bgColor = '#ff0000';
                                        break;
                                    case 'Instagram':
                                        $icon = 'ri-instagram-line';
                                        $bgColor = '#e1306c';
                                        break;
                                    case 'TikTok':
                                        $icon = 'ri-tiktok-fill';
                                        $bgColor = '#69c9d0';
                                        break;
                                    case 'Snapchat':
                                        $icon = 'ri-snapchat-line';
                                        $bgColor = '#fffc00'; 
                                        break;
                                    case 'Whatsapp':
                                        $icon = 'ri-whatsapp-line'; 
                                        $bgColor = '#25D366';
                                        break;
                                    default:
                                        $icon = 'ri-global-line';
                                        break;
                                }
                            ?>
                                <a href="{{ $socialLink->link }}" style="background-color: {{ $bgColor }};">
                                    <i class="{{ $icon }}" style="color: white;"></i>
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5"></div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-12 col-md-9 ">
                <div class="img">
                    <img width="100%" src="{{ asset('storage/' . $viewPost->image) }}" alt="">
                    <div class="img-name text-center py-1 border-bottom">
                        <span class="my-1" style="font-size: 18px;color:#555;">{{ $viewPost->imgTitle }}</span>
                    </div>
                </div>
                <div class="title mt-2 mb-4">
                    <h3 style="font-size: 24px; color:#555;font-weight:600; line-height:1.6">
                        {{ $viewPost->subtitle }}
                    </h3>
                </div>
                <div class="content border-bottom">
                    <p style="white-space: pre-wrap;line-height:2.2; font-size:20px;color:#333">
                        <br> {{ $viewPost->description }}
                    </p>
                </div>
                <div class="tag-content mt-4">
                    <div class="type" style="font-size:18px; color:#333">
                        <i class="ri-price-tag-3-fill" style="color:#007377"></i>
                        <span>সম্পর্কিত বিষয়:</span>
                    </div>
                    <div class="d-flex gap-2 mt-2" style="line-height: normal">
                        @if ($viewPost->tags->isNotEmpty())
                            @foreach ($viewPost->tags as $tag)
                                @if (!empty($tag->tag))
                                    <a href="{{ route('tag.post', ['id' => $tag->id, 'name' => $tag->tag]) }}"
                                        class="d-block py-2 px-3 border"
                                        style="color:#777; border-radius:16px;font-size:15px;">
                                        {{ $tag->tag }}
                                    </a>
                                @endif
                            @endforeach
                        @else
                            <span>No tags available.</span>
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 p-0 px-md-2 px-1 py-md-0 py-4" id="none-pdf">
                @livewire('post-filter')

                <div class="border mb-4 mt-4 rounded-top overflow-hidden">
                    <div class="w-100 py-2 text-center" style="background: #29725e">
                        <span style="font-size:20px; color:#fff;">এই বিভাগের সর্বাধিক পঠিত</span>
                    </div>
                    <div id="border" style="max-height: 400px; overflow:auto;" class="pt-2">
                        @foreach ($relatedPosts as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="d-block py-2 px-1">
                                <div class="d-flex gap-2 align-items-center">
                                    <div class="img" style="width:90px; height:55px;">
                                        <img class="w-100 h-100" src="{{ asset('storage/' . $post->image) }}"
                                            alt="">
                                    </div>
                                    @php
                                        $timeAgo = \Carbon\Carbon::parse($post->created_at)->diffForHumans();
                                    @endphp
                                    <div class="title" id="title-tow">
                                        <div class="d-flex flex-column">
                                            <span class="title-line-tow">{{ $post->title }}</span>
                                            <span style="font-size: 15px;">{{ $timeAgo }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

    @livewire('comment', ['id' => $viewPost->id])

    <div class="container topM" id="none-pdf">
        <div class="row">
            <div class="grid-card px-1 px-md-3">
                @foreach ($posts['four'] as $post)
                    <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                        class="p-2" style=" height:max-content; display: block; border:1px solid #ccc;">
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
    </div>

    <div class="container topM" id="p">
        <div class="col-lg-12 col-md-12 px-1 px-md-0" id="none-pdf">
            <div class="type py-2 mb-3 "
                style="border-bottom: 4px double #ccc; font-size: 17px; font-weight:700; color:#555;">
                <span>আরো পড়ুন</span>
            </div>
            <div class="grid-container-six">
                @foreach ($relatedPosts as $post)
                    <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}">
                        <div class="border p-2">
                            <div class="img" style="width: 100%">
                                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="">
                            </div>
                            <div class="title py-1" id="title-bold">
                                <span>{{ $post->title }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        function printPage() {
            window.print();
        }
    </script>
    @include('layout.footer')
    @include('layout.bakingnews')
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
