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
        color: #eee;
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

    <div class="container topM">
        <div class="row">
            <div class="col-12 col-md-9">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <a href="{{ route('view.post', ['id' => $latestPost->id, 'name' => $latestPost->category->name]) }}"
                            class="d-flex gap-2 flex-column flex-md-row" style="background: #eee">
                            <div class="img text-center" id="img-res">
                                <img src="{{ asset('storage/' . $latestPost->image) }}" alt=""
                                    class="img-fluid">
                            </div>
                            <div style="flex: 1" class="px-2 px-md-1 pb-3">
                                <div class=" py-1" id="title-bold">
                                    <span>{{ $latestPost->title }}</span>
                                </div>
                                <div class=" pb-1" id="title-four">
                                    <span>
                                        {{ $latestPost->subtitle }}
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-md-4 py-2 py-md-0">
                        <a href="{{ route('view.post', ['id' => $secondPost->id, 'name' => $secondPost->category->name]) }}"
                            style=" display:block; background: #eee;color:#333">
                            <div class="row">
                                <div class="col-5 col-md-12">
                                    <div class="img">
                                        <img src="{{ asset('storage/' . $secondPost->image) }}" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-7 col-md-12">
                                    <div class="title mt-1 px-0 py-2 px-md-2" style="font-size: 18px;font-weight:600">
                                        <span>{{ Str::limit($secondPost->title, 30) }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="py-0 py-md-4">
                    <div class="row">
                        @foreach ($randomPosts as $post)
                            <div class="col-12 col-md-4 py-2 py-md-0">
                                <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                    style=" display:block; background: #eee;color:#333">
                                    <div class="row">
                                        <div class="col-5 col-md-12">
                                            <div class="img">
                                                <img src="{{ asset('storage/' . $post->image) }}" alt=""
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col-7 col-md-12">
                                            <div class="title mt-1 px-0 py-2 px-md-2"
                                                style="font-size: 18px;font-weight:600">
                                                <span>{{ Str::limit($post->title, 40) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

            <div class="col-12 col-md-3 mb-4">
                @livewire('post-filter')
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-9">
                <div class="type py-2"
                    style="border-top: 4px double #ccc; border-bottom:1px solid #ccc; font-size: 24px; font-weight:700; color:#29725e;">
                    <img width="20" src="{{ asset('icon/Sign.webp') }}" alt="">
                    <span>ভাইরাল নিউজ বিভাগের সব খবর</span>
                </div>
                <div class="row">
                    @foreach ($allposts as $post)
                        <div class="col-12 col-md-6 py-2">
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="d-block" style="padding-right:7px; background: #eee">
                                <div class="d-flex gap-2 align-items-center">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="img">
                                                <img class="w-100 h-100" src="{{ asset('storage/' . $post->image) }}"
                                                    alt="">
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
                                            $dayNumber = \App\Helpers\convertToBanglaNumber($date->format('j')); // Use the helper function
                                            $year = \App\Helpers\convertToBanglaNumber($date->format('Y')); // Use the helper function
                                            $time = \App\Helpers\convertToBanglaNumber($date->format('h:i A')); // Use the helper function

                                            $formattedDate =
                                                $day . ', ' . $dayNumber . ' ' . $month . ' ' . $year . ', ' . $time;
                                        @endphp
                                        <div class="col-7 ps-0 px-2">
                                            <div class="title" id="title-tow">
                                                <div class="d-flex flex-column py-1">
                                                    <span class="title-line-tow-big">{{ $post->title }}</span>
                                                    <span
                                                        style="font-size: 15px;line-height:1.6;color:#555">{{ $formattedDate }}</span>
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
            <div class="col-12 col-md-3">
                <div class="border rounded-top overflow-hidden">
                    <div class="w-100 py-2 text-center" style="background: #29725e">
                        <span style="font-size:20px; color:#fff;">এই বিভাগের সর্বাধিক পঠিত</span>
                    </div>
                    <div id="border" style="max-height: 400px; overflow:auto;" class="pt-2">
                        @foreach ($allposts as $post)
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

    @include('layout.footer')
    @include('layout.bakingnews')
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
