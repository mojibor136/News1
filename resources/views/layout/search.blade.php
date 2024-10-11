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

    .bg-green {
        background-color: #29725e;
        position: fixed;
        top: -100px;
        left: 0;
        right: 0;
        z-index: 9999;
        transition: top 0.5s ease;
    }
</style>

<body>
    <div class="bg-green" id="searchBox">
        <div class="container">
            <div class="p-3">
                <form action="{{ route('search') }}" method="GET">
                    <div class="d-flex">
                        <input name="query" type="text" placeholder="খুঁজুন"
                            class="border-0 rounded-1 rounded-end-0 form-control">
                        <div class="icon">
                            <button type="submit"
                                class="border-0 rounded-0 rounded-end-1 btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/search.js') }}"></script>
</body>

</html>
