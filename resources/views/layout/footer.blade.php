<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<style>
    .footer-bottom {
        width: 100%;
        text-align: center;
        background: #212529;
        padding: 12px;
        color: #ccc;
    }

    .footer-container {
        background: #eee;
    }

    .info {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .info p {
        margin: 0;
        font-size: 14px;
    }

    .info p strong {
        color: #333;
    }

    .footer-icon a {
        display: inline-block;
        width: 27px;
        height: 27px;
        text-align: center;
        line-height: 27px;
        border-radius: 50%;
        color: #fff;
        transition: background-color 0.3s ease;
    }

    .footer-icon a:hover {
        opacity: 0.8;
    }

    .footer-icon a i {
        font-size: 15px;
    }

    .footer-icon a:nth-child(1) {
        background-color: #3b5998;
    }

    .footer-icon a:nth-child(2) {
        background-color: #1DA1F2;
    }

    .footer-icon a:nth-child(3) {
        background-color: #C13584;
    }

    .footer-icon a:nth-child(4) {
        background-color: #0077B5;
    }

    .footer-icon a:nth-child(5) {
        background-color: #FF0000;
    }

    .footer-type {
        font-size: 13px;
        font-weight: 600;
        color: #555;
    }

    .mail a {
        text-decoration: none;
        color: #333;
        font-size: 16px;
    }
</style>

<body>
    <div class="footer-container mt-4">
        <div class="container">
            <div class="footer py-4 row">
                <div
                    class="footer-logo col-12 col-md-4 col-mb-0 mb-4 d-flex align-items-center justify-content-center justify-content-md-start">
                    <div class="footer-img">
                        <img src="{{ asset('logo/logo.webp') }}" alt="">
                    </div>
                </div>
                <div
                    class="footer-info col-12 col-md-4 col-mb-0 mb-4 d-flex align-items-center justify-content-center justify-content-md-start">
                    <div class="info align-items-center align-items-md-start">
                        <p><strong>ভারপ্রাপ্ত সম্পাদক: </strong>রেজাউল করিম (রনি রেজা)
                            ২৪ উত্তর কাফরুল (৫ম তলা), ঢাকা-১২০৬।
                        </p>
                        <p><strong>ফ্যাক্স: </strong>+৮৮-০২-৯৮৩৩৬০৯</p>
                        <p><strong>ফোন: </strong>+৮৮-০২-৯৮৩৩৯৪২</p>
                    </div>
                </div>
                <div
                    class="footer-media col-12 col-md-4 d-flex justify-content-center justify-content-md-end align-items-center align-items-md-end">
                    <div class="d-flex flex-column align-items-center align-items-md-end gap-2">
                        <div class="footer-type">
                            <span>সোশ্যাল মিডিয়াতে আমরা</span>
                        </div>
                        <div class="footer-icon d-flex gap-2">
                            <a href="">
                                <i class="ri-facebook-line"></i>
                            </a>
                            <a href="">
                                <i class="ri-twitter-fill"></i>
                            </a>
                            <a href="">
                                <i class="ri-instagram-line"></i>
                            </a>
                            <a href="">
                                <i class="ri-linkedin-fill"></i>
                            </a>
                            <a href="">
                                <i class="ri-youtube-line"></i>
                            </a>
                        </div>
                        <div class="d-flex flex-column align-items-center align-items-md-end gap-2">
                            <div class="mail">
                                <i class="ri-mail-open-fill"></i>
                                <a href="">editor@daily-bangladesh.com</a>
                            </div>
                            <div class="mail">
                                <i class="ri-mail-open-fill"></i>
                                <a href="">newsroom@daily-bangladesh.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="footer-bottom">
            <span>© ২০২৪ | ডেইলি বাংলাদেশ কর্তৃক সর্বসত্ব ® সংরক্ষিত | উন্নয়নে ইমিথমেকারস.কম</span>
        </div>
    </div>
</body>

</html>
