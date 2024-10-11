<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Ticker</title>
</head>
<style>
    button {
        white-space: nowrap;
    }
</style>

<body>
    @php
        $newse = getBakingNews();
    @endphp
    <div style="background: #ccc;" class="fixed-bottom d-flex align-items-center justify-content-center">
        <button style="line-height: normal; border-radius: 0; background:#be475d;font-size: 20px"
            class="btn text-white fw-medium px-4 py-2">শীর্ষ সংবাদ:</button>
        <marquee class="flex-grow-1" onmouseover="this.stop();" onmouseout="this.start();">
            <div class="d-flex gap-3 align-items-center">
                @foreach ($newse as $news)
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-dark mx-2" style="width: 8px; height: 8px;"></div>
                        <li style="font-size: 20px" class="list-unstyled text-dark">{{ $news->news }}</li>
                    </div>
                @endforeach
            </div>
        </marquee>
    </div>

    <!-- Bootstrap JS and Popper.js -->

</body>

</html>
