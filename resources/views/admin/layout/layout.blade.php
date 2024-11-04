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

        .admin-content .admin-icons {
            display: flex;
            gap: 10px;
        }

        .admin-content .admin-icons a {
            text-decoration: none;
            color: #555;
            background: #f2f3f4;
            display: flex;
            border-radius: 5px;
            width: 30px;
            height: 30px;
            justify-content: center;
            align-items: center;
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
            padding: 10px;
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

        .over {
            height: 430px;
            overflow: auto;
            scrollbar-width: none;
            -ms-overflow-style: none;

            &::-webkit-scrollbar {
                display: none;
            }

        }

        .link {
            text-transform: capitalize;
            text-decoration: none;
            font-size: 14px;
            font-family: 'Open Sans', sans-serif;
            font-weight: 500;
            cursor: pointer;
            color: rgb(30, 82, 252);
        }

        @media (max-width: 640px) {

            .main-container {
                grid-template-columns: 1fr;
                grid-template-rows: 60px 1fr;
                grid-template-areas:
                    "header"
                    "main";
            }

            .main-content {
                padding: 2px;
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
        $admin = AdminInfo();
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
                <div class="admin-icons">
                    <a href=""><i class="ri-message-3-line"></i></a>
                    <a href=""><i class="ri-notification-4-line"></i></a>
                </div>
                <div class="admin-img">
                    <div class="admin-img">
                        <!-- Trigger for #admin-profile modal -->
                        <div class="img">
                            <img src="{{ asset('storage/Admins/' . $admin->image) }}" alt="Admin Profile Image">
                        </div>
                        <div class="admin-info" data-bs-toggle="modal" data-bs-target="#admin-profile">
                            <span>{{ $admin->name }}</span>
                            <i class="ri-arrow-down-s-line"></i>
                        </div>

                        <!-- #admin-profile Modal Structure -->
                        <div wire:ignore.self class="modal fade" id="admin-profile" tabindex="-1"
                            aria-labelledby="adminProfileLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="adminProfileLabel">Account Settings</h5>
                                        <span class="link" data-bs-toggle="modal"
                                            data-bs-target="#passwordModal">change
                                            password</span>
                                    </div>
                                    <form action="{{ route('admin.update') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            @if (session()->has('message'))
                                                <div class="alert alert-success mt-3">
                                                    {{ session('message') }}
                                                </div>
                                            @endif
                                            <div class="profile-section">
                                                <div class="mb-3">
                                                    <label for="adminName" class="form-label">Company Name</label>
                                                    <input type="text" value="{{ $admin->name }}"
                                                        class="form-control" id="adminName" required name="name">
                                                    @error('name')
                                                        <div class="text-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="adminEmail" class="form-label">Email address</label>
                                                    <input type="email" value="{{ $admin->email }}" name="email"
                                                        class="form-control" id="adminEmail" required>
                                                    @error('email')
                                                        <div class="text-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="image" class="form-label">Icon</label>
                                                    <input type="file" class="form-control" id="image"
                                                        accept="image/*" name="image">
                                                </div>
                                                <div class="group">
                                                    <input type="hidden" value="{{ $admin->id }}" name="adminId">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save Profile</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @livewire('admin-password-update', ['adminId' => $admin->id])
                    </div>

                </div>
            </div>
        </div>
        <div class="sidebar">
            <div class="logo-content" style="background: #fff;">
                <div class="logo">
                    <a href="{{ route('admin') }}">
                        @if ($logo)
                            <img src="{{ asset('storage/' . $logo->path) }}" class="img-fluid" style="max-width:80%"
                                alt="">
                        @endif
                    </a>
                </div>
            </div>
            <ul class="nav flex-column">
                <div class="over">
                    <li class="nav-item mb-2">
                        <a href="{{ route('admin') }}" class="nav-link d-flex align-items-center">
                            <i class="ri-dashboard-line"></i>
                            <span class="ms-1">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#categoryMenu" class="nav-link d-flex justify-content-between align-items-center"
                            data-bs-toggle="collapse">
                            <span><i class="ri-list-unordered"></i> Categories</span>
                            <i class="ri-arrow-down-s-line"></i>
                        </a>
                        <ul class="collapse" id="categoryMenu">
                            <li class="nav-item">
                                <a href="{{ route('all.category') }}" class="nav-link ps-4">Category</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('all.subcategory') }}" class="nav-link ps-4">SubCategory</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#districtMenu" class="nav-link d-flex justify-content-between align-items-center"
                            data-bs-toggle="collapse">
                            <span><i class="ri-map-pin-line"></i> Districts</span>
                            <i class="ri-arrow-down-s-line"></i>
                        </a>
                        <ul class="collapse" id="districtMenu">
                            <li class="nav-item">
                                <a href="{{ route('all.district') }}" class="nav-link ps-4">Districts</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('all.subdistrict') }}" class="nav-link ps-4">SubDistricts</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#postMenu" class="nav-link d-flex justify-content-between align-items-center"
                            data-bs-toggle="collapse">
                            <span><i class="ri-article-line"></i> Post</span>
                            <i class="ri-arrow-down-s-line"></i>
                        </a>
                        <ul class="collapse" id="postMenu">
                            <li class="nav-item">
                                <a href="{{ route('all.post') }}" wire:navigate class="nav-link ps-4">Posts</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pending.post') }}" wire:navigate class="nav-link ps-4">Pending</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#news" class="nav-link d-flex justify-content-between align-items-center"
                            data-bs-toggle="collapse">
                            <span><i class="ri-newspaper-fill"></i> Baking news</span>
                            <i class="ri-arrow-down-s-line"></i>
                        </a>
                        <ul class="collapse" id="news">
                            <li class="nav-item">
                                <a href="{{ route('baking.news') }}" wire:navigate class="nav-link ps-4">Baking
                                    news</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#video" class="nav-link d-flex justify-content-between align-items-center"
                            data-bs-toggle="collapse">
                            <span><i class="ri-film-line"></i> Video</span>
                            <i class="ri-arrow-down-s-line"></i>
                        </a>
                        <ul class="collapse" id="video">
                            <li class="nav-item">
                                <a href="{{ route('video') }}" class="nav-link ps-4">Video</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('reporter.list') }}" class="nav-link d-flex align-items-center">
                            <i class="ri-booklet-fill"></i>
                            <span class="ms-1">Reporter</span>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('all.user') }}"
                            class="nav-link d-flex justify-content-between align-items-center">
                            <span><i class="ri-group-line"></i> Users</span>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('ads') }}"
                            class="nav-link d-flex justify-content-between align-items-center">
                            <span><i class="ri-advertisement-line"></i> Adsense</span>
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#settingsMenu" class="nav-link d-flex justify-content-between align-items-center"
                            data-bs-toggle="collapse">
                            <span><i class="ri-settings-line"></i> Settings</span>
                            <i class="ri-arrow-down-s-line"></i>
                        </a>
                        <ul class="collapse" id="settingsMenu">
                            <li class="nav-item">
                                <a href="#" class="nav-link ps-4" data-bs-toggle="modal"
                                    data-bs-target="#permissionModal">Permission</a>
                            </li>
                        </ul>
                        <ul class="collapse" id="settingsMenu">
                            <li class="nav-item">
                                <a href="{{ route('contact.info') }}" class="nav-link ps-4">Contact Info</a>
                            </li>
                        </ul>
                        <ul class="collapse" id="settingsMenu">
                            <li class="nav-item">
                                <a href="#" class="nav-link ps-4" data-bs-toggle="modal"
                                    data-bs-target="#passwordModal">Password</a>
                            </li>
                        </ul>
                        <ul class="collapse" id="settingsMenu">
                            <li class="nav-item">
                                <a href="{{ route('link') }}" class="nav-link ps-4">Social Link</a>
                            </li>
                        </ul>
                        <ul class="collapse" id="settingsMenu">
                            <li class="nav-item">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#admin-profile"
                                    class="nav-link ps-4">Profile</a>
                            </li>
                        </ul>
                        <ul class="collapse" id="settingsMenu">
                            <li class="nav-item">
                                <a href="{{ route('logo.management') }}" class="nav-link ps-4">Logo</a>
                            </li>
                        </ul>
                    </li>
                </div>
            </ul>
            <div class="logout-content">
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="{{ route('admin.logout') }}"
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

    @livewire('permission')
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
