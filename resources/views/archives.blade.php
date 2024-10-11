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
    <title>আর্কাইভস</title>
</head>
<style>
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

    .form-label {
        font-weight: 500;
        font-size: 18px;
    }

    .btn-search {
        background-color: #363;
        color: #eee;
        font-weight: 500;
        border-radius: 0;
        width: 300px;
    }

    .btn-search:hover {
        background-color: #363;
        color: #ccc;
    }

    #title-bold-one {
        color: #111;
        font-size: 20px;
        font-weight: 600;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .col-12:hover #title-bold-one,
    .col-9 a:hover #title-bold-one {
        color: #29725e;
    }

    #text-theree {
        color: #333;
        font-size: 18px;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        line-height: 1.7;
        text-overflow: ellipsis;
    }

    #time-text {
        font-size: 15px;
        color: #555;
    }

    @media (max-width: 768px) {
        #text-theree {
            -webkit-line-clamp: 2;
        }

        #title-bold-one {
            font-size: 20px;
            font-weight: 500;
        }
    }
</style>

<body>
    @include('layout.search')
    @include('layout.header')

    <div class="container topM">
        <div class="type-border">
            <div class="type-card">
                <span>আর্কাইভস</span>
            </div>
        </div>
    </div>

    <div class="container topM">
        @livewire('archive-search')
    </div>

    @include('layout.footer')
    @include('layout.bakingnews')
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
