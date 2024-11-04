<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Ticker</title>
</head>

<body>
    @php
        $newse = getBakingNews();
    @endphp
    <div class="fixed bottom-0 left-0 right-0 bg-gray-300 flex items-center justify-center">
        <button class="bg-[#be475d] text-white font-medium font-medium text-lg px-4 py-2 rounded-none whitespace-nowrap">
            শীর্ষ সংবাদ:
        </button>        
        <marquee class="flex-grow" onmouseover="this.stop();" onmouseout="this.start();">
            <div class="flex gap-3 items-center">
                @foreach ($newse as $news)
                    <div class="flex items-center">
                        <div class="rounded-full bg-black mx-2 w-2 h-2"></div>
                        <li class="list-none text-gray-950 text-lg">{{ $news->news }}</li>
                    </div>
                @endforeach
            </div>
        </marquee>
    </div>
</body>

</html>
