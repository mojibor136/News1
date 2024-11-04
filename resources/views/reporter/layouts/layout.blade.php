<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('icon.icon')
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    @livewireStyles
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            position: fixed;
            width: 100%;
            font-family: 'Roboto', sans-serif;
        }

        .main-container {
            font-family: 'Roboto', sans-serif;
            height: 100vh;
            background-color: #eee;
            display: grid;
            grid-template-columns: 220px 1fr;
            grid-template-rows: 70px 1fr;
            grid-template-areas:
                "sidebar header"
                "sidebar main";
        }

        .header {
            grid-area: header;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
        }

        .search-box {
            border: 1px solid #ddd;
            padding: 7px;
            border-radius: 7px;
            color: #aaa;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .search-box input {
            border: none;
            outline: none;
            width: 200px;
            color: #555;
            font-size: 15px;
            font-family: 'Roboto', sans-serif;
        }

        .menu-bar {
            display: none;
        }

        .admin-content {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }

        .admin-content .admin-img {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .admin-content .admin-img .img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
        }

        .admin-content .admin-img .img img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .admin-content .admin-img .admin-info {
            font-family: 'Roboto', sans-serif;
            font-weight: 400;
            display: flex;
            gap: 5px;
            align-items: center;
            text-transform: capitalize;
            cursor: pointer;
            color: #333;
            font-size: 16px;
        }

        .main {
            grid-area: main;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            overflow: hidden;
            width: 100%;
        }

        .main-content {
            background-color: #fff;
            width: 100%;
            height: 100%;
            border-radius: 8px;
            overflow: auto;
        }

        .main-content::-webkit-scrollbar {
            display: none;
        }

        .sidebar {
            background-color: #343a40;
            color: #fff;
            height: inherit;
            display: flex;
            flex-direction: column;
            padding: 15px;
            position: relative;
        }

        .logo-content {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 8px;
            background: #fff;
        }

        .logo {
            width: 100%;
            height: 80px;
            color: #999;
            display: flex;
            align-items: center;
            padding-left: 20px;
        }


        .sidebar a {
            color: #fff;
            text-decoration: none;
        }

        .sidebar .nav-link {
            color: #fff;
            font-size: 15px;
            font-weight: 400;
            border-radius: 8px;
        }

        .sidebar .nav-link:hover {
            background-color: #495057;
            color: #fff;
        }

        .logout-content {
            position: absolute;
            bottom: 20px;
            width: 100%;
            right: 0;
            padding: 0 20px;
        }

        #categoryMenu .content {
            flex-grow: 1;
            padding: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            text-align: left;
            padding: 8px;
        }

        .table thead th {
            background-color: #f8f9fa;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table tbody tr:hover {
            background-color: #e9ecef;
        }

        .table .btn {
            margin: 0;
        }


        .table>:not(caption)>*>* {
            vertical-align: middle;
            font-size: 14px;
        }

        th {
            font-weight: 500;
            color: #333;
        }

        .table-responsive table {
            width: 100%;
            white-space: nowrap;
        }

        .container {
            position: relative;
        }

        @media (max-width: 640px) {

            .main-container {
                grid-template-columns: 1fr;
                grid-template-rows: 60px 1fr;
                grid-template-areas:
                    "header"
                    "main";
            }

            .header {
                padding: 0 10px;
            }

            .main {
                padding: 17px 10px;
            }

            .sidebar {
                display: block;
                z-index: 999;
                position: absolute;
                top: 60px;
                left: -220px;
                width: 220px;
                transition: left 0.3s;
            }

            .search-content {
                display: none;
            }

            .menu-bar {
                display: block;
                font-weight: 600;
                font-size: 24px;
                color: #555;
            }

            .logout-content {
                bottom: 150px;
            }

            table {
                font-size: 15px;
            }
        }
    </style>
</head>

<body>
    @php
        $logo = getLogo();
    @endphp
    <div class="main-container">
        <div class="header">
            <div class="search-content">
                <div class="search-box">
                    <i class="ri-search-line"></i>
                    <input type="text" placeholder="Search..">
                </div>
            </div>
            <div class="menu-bar">
                <i class="ri-menu-fill"></i>
            </div>
            <div class="admin-content">
                <div class="admin-img">
                    <div class="img">
                        <img src="{{ asset('profile/4715330.png') }}" alt="">
                    </div>
                    <div class="admin-info">
                        @if (auth('reporter')->check())
                            @php
                                $nameParts = explode(' ', auth('reporter')->user()->name);
                                $middleName = count($nameParts) > 1 ? $nameParts[1] : auth('reporter')->user()->name;
                            @endphp
                            <span>Reporter: {{ $middleName }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar">
            <div class="logo-content">
                <div class="logo">
                    <a href="{{ route('reporter') }}">
                        @if ($logo)
                            <img src="{{ asset('storage/' . $logo->path) }}" class="img-fluid" style="max-width:80%"
                                alt="">
                        @endif
                    </a>
                </div>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="{{ route('reporter') }}" class="nav-link d-flex align-items-center">
                        <i class="ri-dashboard-line"></i>
                        <span class="ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#postMenu" class="nav-link d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse">
                        <span><i class="ri-article-line"></i> Post</span>
                        <i class="ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="collapse" id="postMenu">
                        <li class="nav-item">
                            <a href="{{ route('reporter.all.post') }}" class="nav-link ps-4">Posts</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="logout-content">
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="{{ route('reporter.logout') }}"
                            style="background-color: #495057;
                            color: #fff; border-radius: 8px;"
                            class="nav-link d-flex align-items-center">
                            <i class="ri-logout-box-r-line"></i>
                            <span class="ms-1">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main">
            <div class="main-content">
                @yield('content')
            </div>
        </div>
    </div>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('a[href="#settingMenu"]').addEventListener('click', function() {
                event.preventDefault();
                var myModal = new bootstrap.Modal(document.getElementById('permissionModal'));
                myModal.show();
            });
        });
    </script>

    <script>
        let menuBtn = document.querySelector('.menu-bar');
        let sidebar = document.querySelector('.sidebar');

        menuBtn.addEventListener('click', function() {
            if (sidebar.style.left === '0px') {
                sidebar.style.left = '-220px';
            } else {
                sidebar.style.left = '0px';
            }
        });
    </script>

</body>

</html>
