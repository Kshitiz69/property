<?php

use App\Http\Controllers\ContactController;
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
    if (\auth()->user())
    {
        $info['item'] = \App\Models\Listing::orderBy('id', 'desc')->whereNot('user_id', \auth()->user()->id)->limit(15)->get();
    }
    else{
        $info['item'] = \App\Models\Listing::orderBy('id', 'desc')->limit(15)->get();
    }

    return view('welcome', $info);
});

Route::get("/contact-us", [App\Http\Controllers\ContactController::class, 'index'])->name('contact-us');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login-redirect', [App\Http\Controllers\Auth\LoginController::class, 'loginRedirect'])->name('login-redirect');

////admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.home');
    Route::resource('/admin-listings', App\Http\Controllers\Admin\ListingController::class);
    Route::get('/admin-listings/file/delete', [App\Http\Controllers\Admin\ListingController::class, 'deleteFile'])->name('admin.listings.image.delete');
    Route::resource('/users', App\Http\Controllers\Admin\UserController::class);
});
////user
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/listings/file/delete', [App\Http\Controllers\User\ManageListingController::class, 'deleteFile'])->name('listings.image.delete');
    Route::resource('/manage-listings', App\Http\Controllers\User\ManageListingController::class);
    Route::resource('/sell', App\Http\Controllers\User\SellController::class);
    Route::get('/favorites/property', [App\Http\Controllers\FavoriteController::class, 'index'])->name('favorites.index');
});
Route::resource('/listings', App\Http\Controllers\ListingController::class);
//Route::get('/contact-info/property/user', [App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
Route::post('/contact-info/property', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
Route::resource('/buy', App\Http\Controllers\User\SearchController::class);
Route::get('/favorite', [App\Http\Controllers\FavoriteController::class, 'store'])->name('favorite.store');
Route::get('/all-properties', [App\Http\Controllers\HomeController::class, 'getAllProperties'])->name('properties.index');
//Route::get('/success-message', [App\Http\Controllers\HomeController::class, 'success'])->name('properties.index');

