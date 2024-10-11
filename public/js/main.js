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





// Function to format the date
function formatDate(date) {
    const options = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
    return date.toLocaleDateString('bn-BD', options); // 'bn-BD' for Bengali locale
}

// Set the current date in Bengali format
document.getElementById('current-date').innerText = formatDate(new Date());

// Function to get prayer times using the Aladhan API
function getPrayerTimes(latitude, longitude) {
    // API endpoint with latitude, longitude, and method for prayer times calculation
    const apiUrl = `http://api.aladhan.com/v1/timings?latitude=${latitude}&longitude=${longitude}&method=2`;

    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            // Extract prayer times from the API response
            const timings = data.data.timings;

            // Set prayer times in Bengali using innerText
            document.getElementById('fajr-time').innerText = convertToBanglaTime(timings.Fajr);
            document.getElementById('dhuhr-time').innerText = convertToBanglaTime(timings.Dhuhr);
            document.getElementById('asr-time').innerText = convertToBanglaTime(timings.Asr);
            document.getElementById('maghrib-time').innerText = convertToBanglaTime(timings.Maghrib);
            document.getElementById('isha-time').innerText = convertToBanglaTime(timings.Isha);
        })
        .catch(error => {
            console.error("Error fetching prayer times:", error);
        });
}

// Function to convert time to Bangla format
function convertToBanglaTime(time) {
    const banglaDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
    return time.replace(/\d/g, digit => banglaDigits[digit]);
}

// Get user's location and fetch prayer times
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(position => {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;

        // Fetch prayer times for the current location
        getPrayerTimes(latitude, longitude);
    });
} else {
    alert("Geolocation is not supported by this browser.");
}
