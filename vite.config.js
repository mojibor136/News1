import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',     // আপনার জাভাস্ক্রিপ্ট ফাইল
                'resources/css/app.css',    // আপনার CSS ফাইল
            ],
            output: 'public/build',        // আউটপুট ডিরেক্টরি
        }),
    ],
});
