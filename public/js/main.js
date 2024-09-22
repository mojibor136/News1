function toggleButton(clickedButton, otherButtonId) {
    // Add 'btn-danger' class to the clicked button
    clickedButton.classList.add('btn-danger');
    clickedButton.classList.remove('btn-light');

    // Remove 'btn-danger' class from the other button
    var otherButton = document.getElementById(otherButtonId);
    otherButton.classList.remove('btn-danger');
    otherButton.classList.add('btn-light');
}



function getBanglaDate() {
    // বর্তমান তারিখ নাও
    const today = new Date();

    // বাংলায় দিনগুলোর নাম
    const banglaDays = ['রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার', 'শনিবার'];

    // বাংলায় মাসগুলোর নাম
    const banglaMonths = ['জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'];

    // ইংরেজি তারিখ থেকে দিন, মাস, এবং বছর নাও
    const dayOfWeek = banglaDays[today.getDay()];
    const dayOfMonth = today.getDate();
    const month = banglaMonths[today.getMonth()];
    const year = today.getFullYear();

    // বাংলা সাল গণনার জন্য (যেমন: ১৪৩১ বঙ্গাব্দ)
    const banglaYear = year - 593;

    // এখানে একটি ফাংশন যোগ করা হয়েছে, যা ইংরেজি তারিখ অনুযায়ী বাংলা তারিখ ধারণা করে
    const banglaMonthsBengali = ['বৈশাখ', 'জ্যৈষ্ঠ', 'আষাঢ়', 'শ্রাবণ', 'ভাদ্র', 'আশ্বিন', 'কার্তিক', 'অগ্রহায়ণ', 'পৌষ', 'মাঘ', 'ফাল্গুন', 'চৈত্র'];
    let banglaDayOfMonth = dayOfMonth; // এখানে সঠিক ক্যালকুলেশনের জন্য তোমাকে একটি পূর্ণ বাংলা তারিখ ক্যালকুলেশন ফাংশন ব্যবহার করতে হবে।
    let banglaMonth = banglaMonthsBengali[today.getMonth()]; // বাংলা মাসও এখানে ডাইনামিক করা হলো।

    // উদাহরণস্বরূপ: এখানে তারিখ গণনার জন্য একটা সাধারণ নিয়ম দেওয়া হলো, তবে এটা আরো জটিল হতে পারে।
    if (today.getMonth() >= 4 && today.getMonth() <= 9) {
        banglaMonth = banglaMonthsBengali[today.getMonth() - 4];
    }

    // ফরম্যাট করে দেখাও
    return `${dayOfWeek}, ${dayOfMonth} ${month} ${year}, ${banglaDayOfMonth} ${banglaMonth} ${banglaYear}`;
}

// প্রতিদিন স্বয়ংক্রিয়ভাবে তারিখ আপডেট হবে
document.getElementById("formattedDate").innerText = getBanglaDate();
