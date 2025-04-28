<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;




Auth::routes(['register' => false]);

Route::group(['middleware' => ['is_admin','auth'], 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // booking
    Route::resource('bookings', \App\Http\Controllers\Admin\BookingController::class)->only(['index', 'destroy']);
    // في routes/web.php
   // للمستخدمين العاديين
Route::get('/booking/{destination}', [BookingController::class, 'showForm'])
->name('booking.form');

// للمسؤولين (إذا كنت بحاجة لمسار منفصل)
Route::prefix('admin')->group(function () {
Route::get('/bookings/form/{destination}', [BookingController::class, 'showForm'])
    ->name('admin.bookings.form');
});
Route::post('/booking', [BookingController::class, 'store'])
    ->name('booking.store');


Route::get('/booking/{destination}', [BookingController::class, 'showBookingForm'])->name('booking.form');

    // travel packages
    Route::resource('travel_packages', \App\Http\Controllers\Admin\TravelPackageController::class)->except('show');
    Route::resource('travel_packages.galleries', \App\Http\Controllers\Admin\GalleryController::class)->except(['create', 'index','show']);
    // categories
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class)->except('show');
    // blogs
    Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class)->except('show');
    // profile
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
// travel packages
Route::get('travel-packages',[\App\Http\Controllers\TravelPackageController::class, 'index'])->name('travel_package.index');
Route::get('travel-packages/{travel_package:slug}',[\App\Http\Controllers\TravelPackageController::class, 'show'])->name('travel_package.show');
// blogs
Route::get('blogs', [\App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::get('blogs/{blog:slug}', [\App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');
Route::get('blogs/category/{category:slug}', [\App\Http\Controllers\BlogController::class, 'category'])->name('blog.category');
// contact
Route::get('contact', function() {
    return view('contact');
})->name('contact');
// booking
Route::post('booking', [App\Http\Controllers\BookingController::class, 'store'])->name('booking.store');
Route::delete('/booking/{id}', [App\Http\Controllers\BookingController::class, 'destroy'])->name('booking.destroy');
//password_reset
route::post('\password\search',[App\Http\Controllers\ForgotPasswordController::class, 'sendEmail'])->name('password.email');
route::get('\password\email\send\{token}',[App\Http\Controllers\ForgotPasswordController::class, 'reset'])->name('password.reset');
route::post('\password\update\{token}',[App\Http\Controllers\ForgotPasswordController::class, 'updatePassword'])->name('password.update');

//tourist_login
Route::get('tourist-register', [\App\Http\Controllers\TouristController::class, 'register'])->name('touristregister');
Route::post('tourist-register', [\App\Http\Controllers\TouristController::class, 'registerPost'])->name('touristregister.post');
Route::get('tourist-login', [\App\Http\Controllers\TouristController::class, 'login'])->name('touristlogin');
Route::post('tourist-login', [\App\Http\Controllers\TouristController::class, 'loginPost'])->name('touristlogin.post');
Route::get('tourist-profile', [\App\Http\Controllers\TouristController::class, 'profile'])->name('touristprofile')->middleware('auth:travel_user');
Route::post('tourist-logout', [\App\Http\Controllers\TouristController::class, 'logout'])->name('touristlogout');
