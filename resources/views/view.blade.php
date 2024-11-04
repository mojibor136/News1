@php
    $company = getCompany();
    $ads1 = getAds()->shuffle()->first();
    $ads2 = getAds()->shuffle()->first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- Open Graph data -->
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $viewPost->title }}">
    <meta property="og:description" content="{{ Str::limit($viewPost->description, 150) }}">
    <meta property="og:image" content="{{ asset('storage/' . $viewPost->image) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="fb:app_id" content="2646462035526653">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $viewPost->title }}">
    <meta name="twitter:description" content="{{ Str::limit($viewPost->description, 150) }}">
    <meta name="twitter:image" content="{{ asset('storage/' . $viewPost->image) }}">
    <meta name="twitter:site" content="@mojibor236">
    <meta name="twitter:creator" content="@mojibor236">

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

    <div class="container mx-auto mt-1 px-2 md:px-4">
        <div class="">
            <div class="col-12 col-md-7">
                <div class="">
                    <div class="category py-4 pb-2 px-0">
                        <a href="#" class="text-teal-600 underline text-2xl">{{ $name }}</a>
                    </div>
                    <div class="name py-4 pt-0 px-0 font-semibold text-2xl text-gray-800">
                        <span>{{ $viewPost->title }}</span>
                    </div>
                    <div class="grid grid-cols-12">
                        <div class="col-span-12 flex items-center md:col-span-4 py-3 pt-0 px-0">
                            <div class="flex items-center flex-col gap-1">
                                <div>
                                    <div class="flex items-center gap-1">
                                        <i class="text-gray-600 text-lg ri-ball-pen-line"></i>
                                        <span class="text-gray-600 text-base">{{ $viewPost->reporter }}</span>
                                    </div>
                                    <?php
                                    function bnNumber($number)
                                    {
                                        $search = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
                                        $replace = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                                        return str_replace($search, $replace, $number);
                                    }
                                    ?>

                                    <div class="flex items-center gap-1">
                                        <i class="text-gray-600 text-lg ri-time-fill"></i>
                                        <span class="text-gray-600 text-base">প্রকাশিত:
                                            {{ bnNumber(\Carbon\Carbon::parse($viewPost->created_at)->locale('bn')->translatedFormat('g:i A, j F Y')) }}
                                        </span>
                                    </div>

                                    <div class="flex items-center gap-1">
                                        <i class="text-gray-600 text-lg ri-time-fill"></i>
                                        <span class="text-gray-600 text-base">আপডেট:
                                            {{ bnNumber(\Carbon\Carbon::parse($viewPost->updated_at)->locale('bn')->translatedFormat('g:i A, j F Y')) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 md:col-span-6 flex items-center px-0 px-md-2 py-3 py-md-0">
                            <div class="flex items-center gap-4">
                                <div class="flex flex-col gap-2">
                                    <div class="icon flex gap-2">
                                        <a id="PostShareBtn" href="javascript:void(0)" title="Share"
                                            class="w-8 h-8 rounded-full flex items-center justify-center bg-gray-800">
                                            <i class="ri-share-fill text-white text-lg"></i>
                                        </a>
                                        <a href="javascript:void(0);" onclick="printPage()"
                                            class="flex items-center justify-center w-8 h-8 rounded-full border border-gray-800">
                                            <i class="text-gray-800 text-lg ri-printer-line"></i>
                                        </a>
                                        <a href="#"
                                            class="flex items-center justify-center w-8 h-8 rounded-full border border-gray-800">
                                            <span class="text-gray-800 text-lg">A-</span>
                                        </a>
                                        <a href="#"
                                            class="flex items-center justify-center w-8 h-8 rounded-full border border-gray-800">
                                            <span class="text-gray-800 text-lg">A</span>
                                        </a>
                                        <a href="#"
                                            class="flex items-center justify-center w-8 h-8 rounded-full border border-gray-800">
                                            <span class="text-gray-800 text-lg">A+</span>
                                        </a>
                                    </div>
                                    <div class="social-icon flex gap-2">
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
                                        case 'Website':
                                            $icon = 'ri-global-line'; 
                                            $bgColor = '#333';
                                            break;
                                        case 'LinkedIn':
                                            $icon = 'ri-linkedin-fill'; 
                                            $bgColor = '#0077B5'; 
                                            break;
                                        default:
                                            $icon = 'ri-global-line';
                                            break;
                                    }
                                ?>
                                        <a href="{{ $socialLink->link }}"
                                            class="flex items-center justify-center w-8 h-8 rounded-full"
                                            style="background-color: {{ $bgColor }};">
                                            <i class="{{ $icon }} text-white"></i>
                                        </a>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="w-[200px] hidden md:block">
                                    @if ($ads1)
                                        <a href="{{ $ads1->link }}">
                                            <img class="w-[-webkit-fill-availables]" src="{{ $ads1->image }}"
                                                alt="">
                                        </a>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5"></div>
        </div>
    </div>


    <div class="container mx-auto mt-4 px-2 md:px-4">
        <div class="grid grid-cols-7 gap-2">
            <div class="col-span-7 md:col-span-5">
                <div class="img">
                    <img class="w-full" src="{{ asset('storage/' . $viewPost->image) }}" alt="">
                    <div class="img-name text-center py-1 border-b">
                        <span class="my-1 text-gray-600 text-lg">{{ $viewPost->imgTitle }}</span>
                    </div>
                </div>
                <div class="title mt-2 mb-4">
                    <h3 class="text-gray-600 text-xl font-semibold">
                        {{ $viewPost->subtitle }}
                    </h3>
                </div>
                <div class="content border-b">
                    <p class="text-xl text-gray-800">
                        {!! $viewPost->description !!}
                    </p>
                </div>
                <div class="tag-content mt-4">
                    <div class="type text-gray-800 text-lg">
                        <i class="ri-price-tag-3-fill text-teal-700"></i>
                        <span>সম্পর্কিত বিষয়:</span>
                    </div>
                    <div class="flex gap-2 mt-2 leading-normal">
                        @if ($viewPost->tags->isNotEmpty())
                            @foreach ($viewPost->tags as $tag)
                                @if (!empty($tag->tag))
                                    <a href="{{ route('tag.post', ['id' => $tag->id, 'name' => $tag->tag]) }}"
                                        class="py-2 px-3 border border-gray-300 text-gray-700 rounded-full text-sm">
                                        {{ $tag->tag }}
                                    </a>
                                @endif
                            @endforeach
                        @else
                            <span>No tags available.</span>
                        @endif
                    </div>
                </div>

                <div class="mt-6">
                    <div class="text-lg font-semibold text-gray-700">
                        <i class="ri-list-check text-teal-700"></i>
                        <span>সংশ্লিষ্ট খবর:</span>
                    </div>
                    <div class="py-4 flex flex-col gap-2">
                        @foreach ($relatedPosts as $post)
                            <a class="flex items-center gap-2 hover:underline"
                                href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}">
                                <img src="{{ asset('storage/Admins/' . $company->image) }}"
                                    class="w-5 h-5 rounded-full" alt="">
                                <span class="line-clamp-1 text-teal-700 text-base">{{ $post->title }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                {{-- ads section --}}

                <div class="my-4 w-[250px]">
                    @if ($ads2)
                        <a href="{{ $ads2->link }}">
                            <img class="w-[-webkit-fill-availables]" src="{{ $ads2->image }}" alt="">
                        </a>
                    @endif
                </div>

            </div>
            <div class="col-span-7 md:col-span-2" id="none-pdf">
                @livewire('post-filter')

                <div class="border mb-4 mt-4 rounded-t overflow-hidden">
                    <div class="w-full py-2 text-center bg-teal-700">
                        <span class="text-white text-lg">এই বিভাগের সর্বাধিক পঠিত</span>
                    </div>
                    <div id="border" class="max-h-96 overflow-auto pt-2">
                        @foreach ($relatedPosts as $post)
                            <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                                class="block py-2 px-1">
                                <div class="flex gap-2 items-center">
                                    <div class="img w-24 h-14">
                                        <img class="w-full h-full object-cover"
                                            src="{{ asset('storage/' . $post->image) }}" alt="">
                                    </div>
                                    @php
                                        $timeAgo = \Carbon\Carbon::parse($post->created_at)->diffForHumans();
                                    @endphp
                                    <div class="title" id="title-tow">
                                        <div class="flex flex-col">
                                            <span class="title-line-tow">{{ $post->title }}</span>
                                            <span class="text-sm">{{ $timeAgo }}</span>
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

    <div class="container mx-auto p-0" id="none-pdf">
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

    <div class="container mx-auto mt-4 px-2 md:px-4">
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
                            <div class="text-gray-700 text-lg line-clamp-2 font-bold py-1">
                                <span>{{ $post->title }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get the current URL
            const currentUrl = encodeURIComponent(window.location.href);
            console.log("Current URL:", currentUrl); // Check if URL is correct

            // Set the current URL in the data-url attribute
            const shareBtn = document.getElementById('PostShareBtn');
            if (shareBtn) {
                shareBtn.setAttribute('data-url', currentUrl);

                // Add event listener for sharing
                shareBtn.addEventListener('click', function() {
                    const urlToShare = this.getAttribute('data-url');
                    if (navigator.share) {
                        navigator.share({
                                title: 'Check this out!',
                                url: decodeURIComponent(urlToShare) // decode if required
                            })
                            .then(() => console.log('Sharing succeeded.'))
                            .catch(error => console.error('Error sharing:', error));
                    } else {
                        prompt("লিঙ্কটি কপি করুন:", decodeURIComponent(urlToShare));
                    }
                });
            } else {
                console.error("Share button not found!");
            }
        });
    </script>
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
