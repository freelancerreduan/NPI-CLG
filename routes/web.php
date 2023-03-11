<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Saller\SallerHomeController;
use App\Http\Controllers\User\userHomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// All Admin routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('admin.index');
});


// All Saller routes
Route::group(['prefix' => 'saller', 'middleware' => ['auth' ,'isUser']], function () {
    Route::get('/dashboard', [SallerHomeController::class, 'index'])->name('saller.index');
});





// All users route
Route::group(['prefix' => 'user', 'middleware' => ['auth' ,'isUser']], function () {
    Route::get('/dashboard', [userHomeController::class, 'index'])->name('user.index');
});
