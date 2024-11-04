@php
    $contactInfo = getContactInfo();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="bg-gray-100 my-8">
        <div class="container mx-auto p-2 md:p-4">
            <div class="grid grid-cols-12 py-4">
                <div class="col-span-12 md:col-span-4 flex justify-center md:justify-start">
                    <div class="w-40 h-16 md:w-52 md:h-20">
                        <img src="{{ asset('storage/' . $contactInfo->logo) }}" alt="Logo" class="h-full w-full">
                    </div>
                </div>
                <div class="col-span-12 md:col-span-4 py-2 md:py-0">
                    <div class="flex flex-col gap-1 items-center md:items-start">
                        <div class="w-[300px] text-center md:text-start break-words  whitespace-normal">
                            <span class="text-xl font-semibold text-gray-700">ভারপ্রাপ্ত সম্পাদক:</span>
                            <span class="text-lg text-gray-700">{{ $contactInfo->editorName }}
                                {{ $contactInfo->address }}</span>
                        </div>
                        <div class="text-center md:text-start">
                            <span class="text-xl font-semibold text-gray-700">ফ্যাক্স:</span>
                            <span class="text-lg text-gray-700">{{ $contactInfo->fax }}</span>
                        </div>
                        <div class="text-center md:text-start">
                            <span class="text-xl font-semibold text-gray-700">ফোন:</span>
                            <span class="text-lg text-gray-700">{{ $contactInfo->phone }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-4">
                    <div class="flex flex-col items-center justify-center">
                        <div class="text-lg my-2 font-semibold text-gray-700">
                            <span>সোশ্যাল মিডিয়াতে আমরা</span>
                        </div>
                        <div class="flex gap-2">
                            <?php
                                    $socialLinks = getSocialLinks();
                                    foreach ($socialLinks as $socialLink) {
                                        $icon = '';
                                        $bgColor = '';
                                        
                                        switch ($socialLink->name) {
                                            case 'Facebook':
                                                $icon = 'ri-facebook-line';
                                                $bgColor = 'bg-blue-700';
                                                break;
                                            case 'YouTube':
                                                $icon = 'ri-youtube-line';
                                                $bgColor = 'bg-red-600';
                                                break;
                                            case 'Instagram':
                                                $icon = 'ri-instagram-line';
                                                $bgColor = 'bg-pink-600';
                                                break;
                                            case 'TikTok':
                                                $icon = 'ri-tiktok-fill';
                                                $bgColor = 'bg-cyan-400';
                                                break;
                                            case 'Snapchat':
                                                $icon = 'ri-snapchat-line';
                                                $bgColor = 'bg-yellow-400';
                                                break;
                                            case 'Whatsapp':
                                                $icon = 'ri-whatsapp-line';
                                                $bgColor = 'bg-green-500';
                                                break;
                                            case 'LinkedIn':
                                                $icon = 'ri-linkedin-fill';
                                                $bgColor = 'bg-blue-600';
                                                break;
                                            default:
                                                $icon = 'ri-global-line';
                                                $bgColor = 'bg-gray-500';
                                                break;
                                        }
                                ?>
                            <a href="{{ $socialLink->link }}"
                                class="w-7 h-7 flex items-center justify-center rounded-full {{ $bgColor }} text-white transition-opacity duration-300 hover:opacity-80">
                                <i class="{{ $icon }}"></i>
                            </a>
                            <?php } ?>
                        </div>
                        <div class="text-lg text-gray-700 my-2">
                            <i class="ri-mail-open-fill"></i>
                            <a href="mailto:{{ $contactInfo->email }}"
                                class="text-gray-800 hover:underline">{{ $contactInfo->email }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
