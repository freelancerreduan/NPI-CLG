<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminBookController;
use App\Http\Controllers\Admin\AdminCounterController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\FrontendBookController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Saller\SallerHomeController;
use App\Http\Controllers\User\userHomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/reboot', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    Artisan::call('view:cache');
    // composer dump-autoload
    dd('Done');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');


Route::get('books', [FrontendBookController::class, 'index'])->name('frontend.book.index');
Route::post('book/favorite/', [FrontendBookController::class, 'favorite'])->name('frontend.book.favorite');
Route::get('book/{slug}', [FrontendBookController::class, 'details'])->name('frontend.book.details');

// All Admin routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('admin.index');
    Route::resource('category', AdminCategoryController::class);
    Route::resource('blog', AdminBlogController::class);
    Route::resource('counter', AdminCounterController::class);
    Route::resource('book', AdminBookController::class);
});


// All Saller routes
Route::group(['prefix' => 'saller', 'middleware' => ['auth' ,'isUser']], function () {
    Route::get('/dashboard', [SallerHomeController::class, 'index'])->name('saller.index');
});





// All users route
Route::group(['prefix' => 'user', 'middleware' => ['auth' ,'isUser']], function () {
    Route::get('/dashboard', [userHomeController::class, 'index'])->name('user.index');
});


