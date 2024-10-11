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
        font-size: 17px;
    }
</style>

<body>
    @include('layout.search')
    @include('layout.header')


    <div class="container mt-3">
        <div class="type pt-3" style="font-size:28px; color:#555;font-weight:600">
            <i class="ri-price-tag-3-fill" style="color:#007377"></i>
            <span>{{ $name }}</span>
        </div>
    </div>

    <div class="container mt-3">
        <div class="p-2 p-md-4 py-4" style="background: #f5f5f5">
            <span style="font-size:20px; color:#333;font-weight:600" class="mx-1 mx-md-2">{{ $name }}</span>
            <div class="social-icon mt-3">
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

    <div class="container mt-4">
        <div class="row">
            <div class="col-12 col-md-3 mb-3">
                @foreach ($posts as $post)
                    <a href="{{ route('view.post', ['id' => $post->id, 'name' => $post->category->name]) }}"
                        style="color:#444">
                        <div class="border p-2 d-flex flex-row flex-md-column gap-2 gap-md-0">
                            <div class="img" style="width: 100%">
                                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="">
                            </div>
                            <div class="title py-0 py-md-1" style="font-size: 18px;font-weight:600">
                                <span>{{ Str::limit($post->title, 40) }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    @include('layout.footer')
    @include('layout.bakingnews')
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
