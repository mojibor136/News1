@php
    $categories = getCategory();
@endphp
<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@100..900&display=swap"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/bn.min.js"></script>
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<style>
    body {
        font-family: 'Noto Serif Bengali', sans-serif;
    }

    .sidebar {
        width: 200px;
        height: 100vh;
        position: absolute;
        top: 100%;
        left: -500px;
        background: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        transition: left 0.3s ease;
    }

    .sidebar.show {
        left: 0px;
        z-index: 999;
    }

    .overflow-auto::-webkit-scrollbar {
        display: none;
    }

    .custom-shadow {
        box-shadow: none;
    }

    @media (max-width: 768px) {
        .sidebar {
            height: 80vh;
            overflow: auto;
        }

        .sidebar.show {
            left: 0px;
        }

        .custom-shadow {
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.2), 0px -2px 6px rgba(0, 0, 0, 0.2);
        }

    }
</style>

<body>

    <header class="bg-white text-black border-b hidden md:block">
        <div class="container mx-auto px-2 md:px-4">
            <nav class="flex items-center justify-between py-4">
                <div class="flex items-center gap-2 text-gray-800 text-base">
                    <a href=""
                        class="block py-1 px-3 text-white bg-gray-700 hover:bg-blue-700 rounded">ই-পেপার</a>
                    <a href="{{ route('video.list') }}"
                        class="block py-1 px-3 text-white bg-gray-700 hover:bg-blue-700 rounded">ভিডিও</a>
                    <a href="{{ route('archives') }}"
                        class="block py-1 px-3 text-white bg-gray-700 hover:bg-blue-700 rounded">আর্কাইভ</a>
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="block py-1 px-3 text-white bg-gray-700 hover:bg-blue-700 rounded">ড্যাশবোর্ড</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="block py-1 px-3 text-white bg-gray-700 hover:bg-blue-700 rounded">লগইন</a>
                    @endauth
                    <div id="searchBtn"
                        class="flex items-center justify-center bg-gray-700 text-white rounded w-12 h-8 cursor-pointer">
                        <i class="ri-search-line"></i>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="flex space-x-3">
                        <a id="shareBtn" data-url="https://joruribarta.com/" href="javascript:void(0)" title="Share"
                            class="w-8 h-8 rounded-full flex items-center justify-center bg-gray-800">
                            <i class="ri-share-fill text-white text-lg"></i>
                        </a>
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
                                case 'LinkedIn':
                                    $icon = 'ri-linkedin-fill'; 
                                    $bgColor = '#0077B5'; 
                                    break;
                                default:
                                    $icon = 'ri-global-line';
                                    break;
                            }
                        ?>
                        <a href="{{ $socialLink->link }}" style="background-color: {{ $bgColor }};"
                            class="w-8 h-8 rounded-full flex items-center justify-center">
                            <i class="{{ $icon }} text-white text-lg"></i>
                        </a>
                        <?php } ?>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    @php
        $logo = getLogo();
        $logoads = getAdsLogo();
    @endphp

    <div class="container mx-auto bg-white">
        <div class="grid grid-cols-2 py-2">
            <div class="md:grid-span-1 grid-span-2 items-center">
                <a href="{{ route('home') }}" class="block w-52 h-20">
                    @if ($logo)
                        <img src="{{ asset('storage/' . $logo->path) }}" class="h-full w-full object-contain"
                            alt="">
                    @endif
                </a>
                <span class="ml-4 hidden md:block text-gray-700 whitespace-nowrap" id="formattedDate"></span>
            </div>

            <div class="grid-span-0 md:grid-span-1 flex items-center justify-end gap-4 pr-4">
                <a href=""
                    class="block md:hidden py-1 px-3 text-white bg-gray-700 hover:bg-blue-700 rounded">ই-পেপার</a>
                <div id="menuToggle" class="md:hidden block cursor-pointer text-gray-700 text-2xl font-bold">
                    <i class="ri-menu-line"></i>
                </div>
                <div class="hidden md:block">
                    @if ($logoads)
                        <img class="h-24" src="{{ asset('storage/' . $logoads->path) }}" alt="">
                    @endif
                </div>
            </div>
        </div>
    </div>

    <header class="sticky top-0 z-10">

        <div class="bg-white md:bg-gray-500 custom-shadow">
            <div class="container mx-auto px-2">
                <div class="overflow-auto justify-between px-2 flex items-center whitespace-nowrap">
                    <a href="{{ route('home') }}"
                        class="border-0 md:border-r md:border-l md:px-2 pr-1 md:pr-0 py-[5px] md:text-white text-gray-700 md:text-lg text-2xl inline-block"><i
                            class="ri-home-3-line"></i>
                    </a>
                    @foreach ($categories as $category)
                        <a href="{{ route('category.post', ['id' => $category->id, 'name' => $category->name]) }}"
                            class="px-2 inline-block py-[5px] border-0 md:border-r text-gray-700 md:text-white text-lg">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="sidebar fixed left-[-500px] h-full w-52 bg-white shadow-lg transition-all duration-300"
            id="sidebar">
            <div class="p-3">
                <div class="mb-2">
                    <h5 class="font-semibold text-xl text-gray-700">মেনু</h5>
                    <ul class="flex flex-col">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link block rounded px-3 py-2 side-link text-gray-800 hover:bg-gray-300 text-lg hover:text-blue-600"
                                    href="{{ route('dashboard') }}">ড্যাশবোর্ড</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link block rounded px-3 py-2 side-link text-gray-800 hover:bg-gray-300 text-lg hover:text-blue-600"
                                    href="{{ route('logout') }}">লগআউট</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link block rounded px-3 py-2 side-link text-gray-800 hover:bg-gray-300 text-lg hover:text-blue-600"
                                    href="{{ route('login') }}">লগইন</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link block rounded px-3 py-2 side-link text-gray-800 text-lg hover:text-blue-600 hover:bg-gray-300"
                                    href="{{ route('registere') }}">রেজিস্টার</a>
                            </li>
                        @endauth
                    </ul>
                </div>

                <div class="mb-4">
                    <h5 class="font-semibold text-xl text-gray-700">ক্যাটাগরি</h5>
                    <div class="">
                        <ul class="list-group">
                            @foreach ($categories as $category)
                                <li class="list-group-item">
                                    <a href="{{ route('category.post', ['id' => $category->id, 'name' => $category->name]) }}"
                                        class="block rounded text-gray-800 text-lg hover:bg-gray-300 px-3 py-2">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <script>
        const shareButtons = document.querySelectorAll('#shareBtn');

        shareButtons.forEach(button => {
            button.addEventListener('click', function() {
                const urlToShare = button.getAttribute('data-url');
                if (navigator.share) {
                    navigator.share({
                            title: 'Check this out!',
                            url: urlToShare
                        })
                        .then(() => console.log('Sharing succeeded.'))
                        .catch(error => console.error('Error sharing:', error));
                } else {
                    prompt("লিঙ্কটি কপি করুন:", urlToShare);
                }
            });
        });
    </script>
    <script>
        moment.locale('bn');

        const currentDate = moment().format('dddd, D MMMM YYYY');

        const banglaMonths = [
            'বৈশাখ', 'জ্যৈষ্ঠ', 'আষাঢ়', 'শ্রাবণ', 'ভাদ্র', 'আশ্বিন', 'কার্তিক', 'অগ্রহায়ণ',
            'পৌষ', 'মাঘ', 'ফাল্গুন', 'চৈত্র'
        ];

        const formattedDate = '২৮ আশ্বিন ১৪৩১';

        document.getElementById('formattedDate').innerText = `${currentDate}, ${formattedDate}`;
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sidebar = document.getElementById('sidebar');
            const menuIcon = document.getElementById('menuToggle').querySelector('i');

            document.getElementById('menuToggle').addEventListener('click', function() {
                sidebar.classList.toggle('show');
                if (sidebar.classList.contains('show')) {
                    menuIcon.classList.remove('ri-menu-line');
                    menuIcon.classList.add('ri-close-line');
                } else {
                    menuIcon.classList.remove('ri-close-line');
                    menuIcon.classList.add('ri-menu-line');
                }
            });
        });
    </script>
</body>

</html>
