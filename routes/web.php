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
use App\Http\Controllers\CategoryPostController;
use App\Http\Controllers\SubCategoryPostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\SocialLinkController;
use App\Http\Controllers\ContactInfoController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\Clint\ClintController;
use App\Http\Controllers\Clint\ClintPostController;
use App\Http\Controllers\Reporter\ReporterPostController;
use App\Http\Controllers\Reporter\ReporterController;
use App\Http\Controllers\Reporter\Auth\ReporterAuthController;

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
Route::get('/storage-link', function () {
    // Define the target and link folders
    $targetFolder = storage_path('app/public'); // Corrected target path
    $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage'; // Corrected link path

    // Check if the link already exists
    if (!file_exists($linkFolder)) {
        symlink($targetFolder, $linkFolder);
        return 'Storage link has been created!';
    } else {
        return 'Storage link already exists!';
    }
});
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
        Route::post('/Admin/update' , 'AdminUpdate')->name('admin.update');
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
            Route::get('/add/post' , 'AddPost')->name('add.post');
            Route::post('/store/post' , 'StorePost')->name('store.post');
            Route::get('/delete/post/{id}' , 'DeletePost')->name('delete.post');
            Route::get('/edit/post/{id}' , 'EditPost')->name('edit.post');
            Route::post('/update/post' , 'UpdatePost')->name('update.post');
            Route::get('/view/post/{id}' , 'ViewPost')->name('admin.view.post');
        });

        // BakingNews routes
        Route::controller(BakingNewsController::class)->group(function(){
            Route::get('/baking/news' , 'Index')->name('baking.news');
        });

        // Video controller

        Route::controller(VideoController::class)->group(function(){
            Route::get('/video' , 'Index')->name('video');
        });

        // Social Link

        Route::controller(SocialLinkController::class)->group(function(){
            Route::get('/social/link' , 'Index')->name('link');
        });

        // Contact Info 

        Route::controller(ContactInfoController::class)->group(function(){
            Route::get('/contact/info' , 'Index')->name('contact.info');
        });

        // Logo controller

        Route::controller(LogoController::class)->group(function(){
            Route::get('/logo/management' , 'Index')->name('logo.management');
        });

        Route::controller(ReporterController::class)->group(function(){
            Route::get('/reporter/status/{id}' , 'Status')->name('reporter.status');
            Route::post('/reporter/update' , 'Update')->name('reporter.update');
            Route::get('/reporter/edit/{id}' , 'Edit')->name('reporter.edit');
            Route::get('/reporter/delete/{id}' , 'ReporterDelete')->name('reporter.delete');
            Route::get('/reporter/list' , 'ReporterList')->name('reporter.list');
            Route::post('reporter/create' , 'ReporterCreate')->name('reporter.create');
        });

        Route::controller(AdController::class)->group(function(){
            Route::get('/ads' , 'Index')->name('ads');
            Route::get('/create/ads' , 'CreateAds')->name('create.ads');
            Route::post('/store/ads' , 'StoreAds')->name('store.ads');
            Route::get('/delete/ads/{id}' , 'DeleteAds')->name('delete.ads');
        });

    });
});

// Routes protected by 'reporter' middleware for ReporterController and ReporterPostController
Route::middleware(['reporter'])->group(function () {
    
    // Reporter Dashboard Route
    Route::controller(ReporterController::class)->group(function () {
        Route::get('/reporter', 'Index')->name('reporter'); // Reporter dashboard
    });

    // Routes for Reporter Posts, managed by ReporterPostController
    Route::prefix('reporter')->group(function () {
        Route::controller(ReporterPostController::class)->group(function () {
            Route::get('/all/post', 'Index')->name('reporter.all.post');
            Route::get('/pending/post' , 'PendingPost')->name('reporter.pending.post');
            Route::get('/add/post' , 'AddPost')->name('reporter.add.post');
            Route::post('/store/post' , 'StorePost')->name('reporter.store.post');
            Route::get('/delete/post/{id}' , 'DeletePost')->name('reporter.delete.post');
            Route::get('/edit/post/{id}' , 'EditPost')->name('reporter.edit.post');
            Route::post('/update/post' , 'UpdatePost')->name('reporter.update.post');
            Route::get('/view/post/{id}' , 'ViewPost')->name('reporter.view.post');
        });
    });
});

// Authentication routes for ReporterAuthController
Route::controller(ReporterAuthController::class)->group(function () {
    Route::get('/Reporter/login/page', 'ReporterLoginPage')->name('reporter.login.page'); // Login page
    Route::post('/Reporter/login', 'ReporterLogin')->name('reporter.login');              // Handle login
    Route::get('/Reporter/logout', 'ReporterLogout')->name('reporter.logout');            // Handle logout
});


//////////////////// Web all route list ----------------

// Visitor count middleware

Route::middleware('TrackVisitors')->group(function(){
// Public homepage
   Route::controller(HomeController::class)->group(function(){
     Route::get('/' , 'Home')->name('home');
   });
});

Route::controller(VideoController::class)->group(function(){
    Route::get('/videos' , 'Video')->name('video.list');
});

Route::controller(TagController::class)->group(function(){
    Route::get('/tag/{id}/{name}' , 'Index')->name('tag.post');
});

Route::controller(ViewController::class)->group(function(){
    Route::get('/view/{id}/{name}' , 'Index')->name('view.post');
});

Route::controller(CategoryPostController::class)->group(function(){
    Route::get('/category/{id}/{name}' , 'Index')->name('category.post');
});

Route::controller(SubCategoryPostController::class)->group(function(){
    Route::get('/subcategory/{id}/{name}' , 'Index')->name('subcategory.post');
});

Route::controller(ArchiveController::class)->group(function(){
    Route::get('/archives' , 'Index')->name('archives');
});

Route::controller(SearchController::class)->group(function(){
    Route::get('/search' , 'Index')->name('search');
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
            Route::get('/pending/post' , 'PendingPost')->name('clint.pending.post');
            Route::get('/add/post' , 'AddPost')->name('clint.add.post');
            Route::post('/store/post' , 'StorePost')->name('clint.store.post');
            Route::get('/delete/post/{id}' , 'DeletePost')->name('clint.delete.post');
            Route::get('/edit/post/{id}' , 'EditPost')->name('clint.edit.post');
            Route::post('/update/post' , 'UpdatePost')->name('clint.update.post');
            Route::get('/view/post/{id}' , 'ViewPost')->name('clint.view.post');
        });
        
    });
});

require __DIR__.'/auth.php';
