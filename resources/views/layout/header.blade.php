@php
    $categories = getCategory();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<style>
    body::-webkit-scrollbar {
        display: block;
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
        left: -25px;
        z-index: 999;
    }

    .side-link {
        color: #333 !important;
        font-size: 16px !important;
    }

    .side-link:hover {
        color: #007bff !important;
    }

    .custom-scrollbar {
        max-height: 230px;
        overflow: auto;
    }

    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 5px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    .custom-scrollbar {
        scrollbar-width: thin;
        scrollbar-color: #888 transparent;
    }

    .list-group-item {
        border: none;
    }

    .list-group-item-action {
        color: #333;
        text-decoration: none;
        font-size: 20px;
    }

    .list-group-item-action:hover {
        background-color: #f8f9fa;
    }

    @media (max-width: 768px) {
        .sidebar {
            height: 65vh;
            overflow: auto;
        }

        .sidebar.show {
            left: 0px;
        }

    }
</style>

<body>
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
                <div class="">
                    <div id="searchBtn"
                        class="d-flex align-items-center justify-content-center bg-secondary rounded-circle icon-container">
                        <i class="ri-search-line"></i>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    @php
        $logo = getLogo();
        $logoads = getAdsLogo();
    @endphp

    <div class="container d-none d-md-block">
        <div class="row py-2">
            <div class="col-4 d-flex align-items-center">
                <a href="{{ route('home') }}">
                    @if ($logo)
                        <img src="{{ asset('storage/' . $logo->path) }}" class="img-fluid" style="max-width: 65%"
                            alt="">
                    @endif
                </a>
            </div>
            <div class="col-8 d-flex align-items-center">
                @if ($logoads)
                    <img class="ads-logo" src="{{ asset('storage/' . $logoads->path) }}" alt="">
                @endif
            </div>
        </div>
    </div>
    <header class="sticky-top">
        <div style="background: #eee;">
            <div class="container" style="position: relative;">
                <div class="d-flex justify-content-between align-items-center py-3">
                    <div class="icon" id="menuToggle"
                        style="cursor:pointer; color:#555; font-size:20px; font-weight:700">
                        <i class="ri-menu-line"></i>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('home') }}">
                            @if ($logo)
                                <img src="{{ asset('storage/' . $logo->path) }}" class="img-fluid" style="max-width:60%"
                                    alt="">
                            @endif
                        </a>
                    </div>
                    <div class="search" style=" cursor:pointer; font-size: 20px;color:#555;font-weight:600">
                        <i id="searchBtn" class="ri-search-line"></i>
                    </div>
                </div>

                <div class="sidebar p-3" id="sidebar">
                    <div class="mb-2">
                        <h5>Menu</h5>
                        <ul class="nav flex-column">
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link side-link" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link side-link" href="{{ route('logout') }}">Logout</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link side-link" href="{{ route('login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link side-link" href="{{ route('registere') }}">Register</a>
                                </li>
                            @endauth
                        </ul>
                    </div>

                    <div class="mb-4">
                        <h5>Categories</h5>
                        <div class="custom-scrollbar">
                            <ul class="list-group">
                                @foreach ($categories as $category)
                                    <li class="list-group-item">
                                        <a href="{{ route('category.post', ['id' => $category->id, 'name' => $category->name]) }}"
                                            class="d-block list-group-item-action">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layout.navbar')

    </header>
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
