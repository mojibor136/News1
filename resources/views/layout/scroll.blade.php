<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
    <style>
        .scroll-bar {
            position: fixed;
            bottom: 30px;
            right: 20px;
            width: 42px;
            height: 42px;
            display: none;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgb(253, 67, 67);
            z-index: 999999999;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: background 0.3s;
        }

        .scroll-bar.show {
            display: flex;
        }

        .scroll-bar:hover {
            background: rgb(220, 30, 30);
        }

        .scroll-bar i {
            font-size: 22px;
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="scroll-bar" id="scrollToTopBtn" onclick="scrollToTop()">
        <i class="ri-arrow-up-line"></i>
    </div>

    <script>
        // Function to scroll to the top
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Function to show/hide the scroll button on scroll
        window.onscroll = function() {
            var scrollBtn = document.getElementById("scrollToTopBtn");
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                scrollBtn.classList.add("show");
            } else {
                scrollBtn.classList.remove("show");
            }
        };
    </script>

</body>

</html>
