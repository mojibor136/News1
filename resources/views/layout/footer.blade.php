@php
    $contactInfo = getContactInfo();
@endphp
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

    .footer-type {
        font-size: 20px;
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
    @php
        $logo = getLogo();
    @endphp
    <div class="footer-container mt-4">
        <div class="container">
            <div class="footer py-4 row">
                <div
                    class="footer-logo col-12 col-md-4 col-mb-0 mb-4 d-flex align-items-center justify-content-center justify-content-md-start">
                    <div class="footer-img">
                        @if ($logo)
                            <img src="{{ asset('storage/' . $logo->path) }}" alt="">
                        @endif
                    </div>
                </div>
                <div
                    class="footer-info col-12 col-md-4 col-mb-0 mb-4 d-flex align-items-center justify-content-center justify-content-md-start">
                    <div class="info align-items-center align-items-md-start">
                        <p style="font-size: 18px"><strong>ভারপ্রাপ্ত সম্পাদক: </strong>{{ $contactInfo->editorName }}
                            {{ $contactInfo->address }}
                        </p>
                        <p style="font-size: 18px"><strong>ফ্যাক্স: </strong>{{ $contactInfo->fax }}</p>
                        <p style="font-size: 18px"><strong>ফোন: </strong>{{ $contactInfo->phone }}</p>
                    </div>
                </div>
                <div
                    class="footer-media col-12 col-md-4 d-flex justify-content-center justify-content-md-end align-items-center align-items-md-end">
                    <div class="d-flex flex-column align-items-center align-items-md-end gap-2">
                        <div class="footer-type">
                            <span>সোশ্যাল মিডিয়াতে আমরা</span>
                        </div>
                        <div class="footer-icon d-flex gap-2">
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


                        <div class="d-flex flex-column align-items-center align-items-md-end gap-2">
                            <div class="mail">
                                <i class="ri-mail-open-fill"></i>
                                <a href="">{{ $contactInfo->email }}</a>
                            </div>
                            <div class="mail">
                                <i class="ri-mail-open-fill"></i>
                                <a href="">{{ $contactInfo->email }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="footer-bottom">
            <span style="font-size: 18px">© ২০২৪ | ডেইলি বাংলাদেশ কর্তৃক সর্বসত্ব ® সংরক্ষিত | উন্নয়নে ইমিথমেকারস.কম</span>
        </div>
    </div>
</body>

</html>
