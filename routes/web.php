<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\SubDistrictController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BakingNewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\Clint\ClintController;
use App\Http\Controllers\Clint\ClintPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/////////////////////////// Admin all route list ------------------------------

// Admin login routes
Route::controller(AdminLoginController::class)->group(function(){
    Route::get('/admin/login', 'Index')->name('admin.login.page');
    Route::post('/admin/login', 'AdminLogin')->name('admin.login');
    Route::get('/admin/logout', 'AdminLogout')->name('admin.logout');
});

// Admin dashboard & other protected routes
Route::middleware(['admin'])->group(function () {

    // Admin dashboard
    Route::controller(AdminController::class)->group(function(){
        Route::get('/Admin', 'Index')->name('admin');
    });

    Route::prefix('Admin')->group(function () {
        
        // User routes
        Route::controller(UserController::class)->group(function(){
            Route::get('/all/users', 'AllUser')->name('all.user');
        });
        
        // Category routes
        Route::controller(CategoryController::class)->group(function(){
            Route::get('/all/category', 'Index')->name('all.category');
        });

        // SubCategory routes
        Route::controller(SubCategoryController::class)->group(function(){
            Route::get('/all/subcategory', 'Index')->name('all.subcategory');
        });

        // District routes
        Route::controller(DistrictController::class)->group(function(){
            Route::get('/all/district', 'Index')->name('all.district');
        });

        // SubDistrict routes
        Route::controller(SubDistrictController::class)->group(function(){
            Route::get('/all/subdistrict', 'Index')->name('all.subdistrict');
        });

        // Post routes
        Route::controller(PostController::class)->group(function(){
            Route::get('/all/post', 'Index')->name('all.post');
            Route::get('/pending/post' , 'PendingPost')->name('pending.post');
        });

        // BakingNews routes
        Route::controller(BakingNewsController::class)->group(function(){
            Route::get('/baking/news' , 'Index')->name('baking.news');
        });

        Route::controller(VideoController::class)->group(function(){
            Route::get('/video' , 'Index')->name('video');
        });
    });
});

//////////////////// Web all route list ----------------

// Visitor count middleware

Route::middleware('TrackVisitors')->group(function(){
// Public homepage
   Route::controller(HomeController::class)->group(function(){
     Route::get('/' , 'Home')->name('home');
   });

});

Route::middleware(['auth'])->group(function () {
    Route::controller(HomeController::class)->group(function(){
    });

    Route::prefix('Clint')->group(function(){
        Route::controller(ClintController::class)->group(function(){
            Route::get('/dashboard' , 'Dashboard')->name('dashboard');
        });

        Route::controller(ClintPostController::class)->group(function(){
            Route::get('/all/post', 'Index')->name('clint.all.post');
        });
        
    });
});

require __DIR__.'/auth.php';
