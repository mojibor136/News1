<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <div class="bg-[#29725e] fixed top-[-100px] left-0 right-0 z-50 transition-all duration-500 ease-in-out"
        id="searchBox">
        <div class="container mx-auto">
            <div class="p-3">
                <form action="{{ route('search') }}" method="GET">
                    <div class="flex">
                        <input name="query" type="text" placeholder="খুঁজুন"
                            class="border-0 text-xl text-gray-700 rounded-l-md form-control w-full">
                        <button type="submit"
                            class="border-0 rounded-r-md bg-blue-500 hover:bg-blue-600 text-white px-4 py-2">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/search.js') }}"></script>
</body>

</html>
