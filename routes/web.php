<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminBookController;
use App\Http\Controllers\Admin\AdminCounterController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminInstituteController;
use App\Http\Controllers\Admin\AdminPaymentMethodController;
use App\Http\Controllers\Admin\AdminTeacherController;
use App\Http\Controllers\FrontendBookController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\FrontendPaymentController;
use App\Http\Controllers\Institute\InstituteBlogController;
use App\Http\Controllers\Institute\InstituteHomeController;
use App\Http\Controllers\Institute\PaymentMethodController;
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

Route::post('/getInstitute', [App\Http\Controllers\FrontendController::class, 'ingetInstitutedex'])->name('getInstitute');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/blogs', [FrontendController::class, 'blog'])->name('frontend.blog.index');
Route::get('/blog/{slug}', [FrontendController::class, 'blogDetails'])->name('frontend.blog.details');


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
    Route::resource('teacher', AdminTeacherController::class);
    Route::resource('institute', AdminInstituteController::class);
});


// All Saller routes
Route::group(['prefix' => 'saller', 'middleware' => ['auth' ,'isUser']], function () {
    Route::get('/dashboard', [SallerHomeController::class, 'index'])->name('saller.index');
});





// All users route
Route::group(['prefix' => 'user', 'middleware' => ['auth' ,'isUser']], function () {
    // Route::get('/dashboard', [userHomeController::class, 'index'])->name('user.index');
});


// All institute route
Route::group(['prefix' => 'institute', 'middleware' => ['auth' ,'isInstitute']], function () {
    Route::get('/dashboard', [InstituteHomeController::class, 'index'])->name('institute.index');
    Route::get('/user-list', [InstituteHomeController::class, 'userList'])->name('user.list');
    Route::get('/user-create', [InstituteHomeController::class, 'userCreate'])->name('user.create');
    Route::post('/user-store', [InstituteHomeController::class, 'userStore'])->name('user.store');

    
    Route::get('/blogs', [InstituteBlogController::class, 'index'])->name('institute.blog.index');
    Route::get('/blog/create', [InstituteBlogController::class, 'create'])->name('institute.blog.create');
    Route::post('/blog/store', [InstituteBlogController::class, 'store'])->name('institute.blog.store');
    Route::get('/blog/{id}/edit', [InstituteBlogController::class, 'edit'])->name('institute.blog.edit');
    Route::post('/blog/{id}/update', [InstituteBlogController::class, 'update'])->name('institute.blog.update');
    Route::post('/blog/{id}/destroy', [InstituteBlogController::class, 'destroy'])->name('institute.blog.destroy');


    Route::resource('payment-method', PaymentMethodController::class);
});


// All Saller routes
Route::group(['middleware' => ['auth']], function () {
    Route::get('/pay/{id}/', [FrontendPaymentController::class, 'index'])->name('frontend.pay');
    Route::post('/pay/{id}/', [FrontendPaymentController::class, 'store'])->name('frontend.pay.store');
});

