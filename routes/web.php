<?php
use App\Http\Controllers\Auth\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TravelPackageController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TourGuideController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ProfileController;// use App\Http\Controllers\UserController ;
use App\Http\Controllers\Admin\TravelPackageController as AdminTravelPackageController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TouristController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\UserController as UserController;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController as AuthForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Middleware\AdminMiddleware;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
// Authentication Routes
Auth::routes(['register' => false]);

// Admin Authentication Routes
Route::prefix('admin')->group(function() {

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    // Admin Registration (protected)
    Route::middleware(['auth:web', 'is_admin'])->group(function() {
        Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('admin.register');
        Route::post('/register', [RegisterController::class, 'register']);
        
    });

});

// Public Registration
Route::post('/register', [RegisterController::class, 'register']);

// Admin Panel Routes
Route::group([
    'middleware' => [ 'auth','is_admin'],
    'prefix' => 'admin',
    'as' => 'admin.'
], function() {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Bookings
    Route::resource('bookings', AdminBookingController::class)->only(['index', 'destroy']);
    Route::get('/bookings/form/{destination}', [BookingController::class, 'showForm'])->name('bookings.form');
    Route::get('/booking/{booking}', [AdminBookingController::class, 'show'])->name('bookings.show');
    Route::put('/bookings/{booking}', [BookingController::class, 'updateStatus'])->name('bookings.updateStatus');

    // Travel Packages
    Route::resource('travel_packages', AdminTravelPackageController::class)->except('show');

    // Categories
    Route::resource('categories', CategoryController::class)->except('show');

    // Blogs
    Route::resource('blogs', AdminBlogController::class)->except('show');
    
    //Profile
   Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
   Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
Route::group([
     'middleware' => ['auth', 'is_admin'],
     'prefix' => 'admin',
     'as' => 'admin.'
 ], function() {
     Route::get('/users', [UserController::class, 'index'])->name('users.index');
     Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
     Route::post('/users', [UserController::class, 'store'])->name('users.store');
     Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
     Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
     Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
     Route::post('/users/{user}/restore', [UserController::class, 'restore'])->name('users.restore');


     Route::get('travel_packages/{travel_package}/galleries', [GalleryController::class, 'index'])->name('galleries.index');
     Route::get('/galleries', [GalleryController::class, 'index'])->name('galleries.index');

Route::resource('travel_packages.galleries', GalleryController::class)
     ->names([
         'index' => 'galleries.index',
         'create' => 'galleries.create',
         'store' => 'galleries.store',
         'edit' => 'galleries.edit',
         'update' => 'galleries.update',
         'destroy' => 'galleries.destroy'
     ])
     ->parameters(['travel_packages' => 'travelPackage']);
    // Nested gallery routes
    Route::resource('travel_packages.galleries', GalleryController::class)
    ->parameters(['travel_packages' => 'travelPackage'])
    ->except(['show']);

 });


// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('homepage');

// Travel Packages
Route::get('travel-packages', [TravelPackageController::class, 'index'])->name('travel_package.index');
Route::get('travel-packages/{travel_package:slug}', [TravelPackageController::class, 'show'])->name('travel_package.show');

// Blogs
Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('blogs/{blog:slug}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('blogs/category/{category:slug}', [BlogController::class, 'category'])->name('blog.category');

// Contact
Route::get('contact', function() {
    return view('contact');
})->name('contact');

// Bookings
Route::get('/bookings/create/{travelPackage}', [BookingController::class, 'create'])->name('bookings.create');
Route::get('/booking/{destination}', [BookingController::class, 'showForm'])->name('bookings.form');
Route::post('/booking', [BookingController::class, 'store'])->name('bookings.store');
Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');
Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');

Route::post('/reviews/store/{travelPackage}', [ReviewController::class, 'store'])->name('reviews.store');

// Password Reset
Route::post('/password/search', [ForgotPasswordController::class, 'sendEmail'])->name('password.email');
Route::get('/password/email/send/{token}', [ForgotPasswordController::class, 'reset'])->name('password.reset');
Route::post('/password/update/{token}', [ForgotPasswordController::class, 'updatePassword'])->name('password.update');

// Tourist Routes
Route::prefix('tourist')->group(function () {
    // Registration
    Route::get('/register', [UserController::class, 'register'])->name('tourist_user.register');
    Route::post('/register', [UserController::class, 'registerPost'])->name('touristregister.post');

    // Login
    Route::get('/login', [UserController::class, 'login'])->name('tourist_user.login');
    Route::post('/login', [UserController::class, 'loginPost'])->name('touristlogin.post');

    // Logout
    Route::post('/logout', [UserController::class, 'logout'])->name('touristlogout');

    // Profile (Protected)
    Route::get('/profile', [UserController::class, 'profile'])
         ->name('touristprofile')
         ->middleware('auth:user');

    // Password Reset
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotForm'])
         ->name('tourist.password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])
         ->name('tourist.password.email');
    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])
         ->name('tourist.password.reset');
    Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])
         ->name('tourist.password.update');
});

// Comments
Route::post('/comments', [CommentController::class, 'store'])
    ->name('comments.store')
    ->middleware('auth');