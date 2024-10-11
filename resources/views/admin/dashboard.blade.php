@extends('admin.layout.layout')
@section('title', 'Dashboard')
@section('content')
    @include('icon.icon')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <style>
        .main-content {
            background: transparent;
        }

        .admin-container {
            display: grid;
            gap: 20px;
        }

        .chat-container {
            display: flex;
            flex-wrap: nowrap;
            gap: 10px;
            width: 100%;
            overflow: hidden;
            height: 100px;
        }

        .post-container,
        .user-container,
        .visitor-container {
            display: flex;
            background: #fff;
            border-radius: 8px;
            color: #333;
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            justify-content: space-between;
            width: 100%;
            align-items: center;
            box-sizing: border-box;
        }

        .post-container {
            background: #007bff;
            color: #fff;
        }

        .user-container {
            background: #dc3545;
            color: #fff;
        }

        .visitor-container {
            background: #ff4500;
            color: #fff;
        }

        .icon {
            font-size: 1.5rem;
            margin-right: 10px;
        }

        .count {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .label {
            font-size: 0.9rem;
        }

        .post-content {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            overflow: hidden;
            height: 100%;
        }

        .owl-dot {
            display: none !important;
        }

        .owl-carousel {
            margin-bottom: 0 !important;
        }

        .owl-item {
            margin-right: 10px;
        }

        @media (max-width: 640px) {
            .admin-container {
                gap: 0px;
            }

            .chat-container {
                gap: 7px;
            }

            .table-responsive {
                overflow-x: auto;
                white-space: nowrap;
            }
        }
    </style>
    <div class="admin-container">
        <div class="chat-container owl-carousel owl-theme" id="three-card">
            <div class="post-container">
                <div class="icon">
                    <i class="ri-file-text-line"></i>
                </div>
                <div>
                    <div class="count">{{ PostCount() }}</div>
                    <div class="label">Posts</div>
                </div>
            </div>
            <div class="user-container">
                <div class="icon">
                    <i class="ri-user-line"></i>
                </div>
                <div>
                    <div class="count">{{ UserCount() }}</div>
                    <div class="label">Users</div>
                </div>
            </div>
            <div class="visitor-container">
                <div class="icon">
                    <i class="ri-eye-line"></i>
                </div>
                <div>
                    <div class="count">{{ VisitorCount() }}</div>
                    <div class="label">Visitors</div>
                </div>
            </div>
        </div>
        <div class="post-content">
            @livewire('post')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        function initializeCarousel() {
            if ($(window).width() <= 640) {
                $("#three-card").owlCarousel({
                    margin: 10,
                    loop: true,
                    autoplay: true,
                    autoplayTimeout: 5000,
                    responsive: {
                        0: {
                            items: 2
                        },
                        600: {
                            items: 2
                        },
                        1000: {
                            items: 3
                        }
                    }
                });
            } else {
                $("#three-card").trigger('destroy.owl.carousel').removeClass('owl-carousel owl-loaded').find('.owl-stage')
                    .children().unwrap();
            }
        }

        $(document).ready(function() {
            initializeCarousel();

            $(window).resize(function() {
                initializeCarousel();
            });
        });
    </script>
@endsection
