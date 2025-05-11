<?php
// use App\Http\Controllers\Auth\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TravelPackageController;
// use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TourGuideController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\TravelPackageController as AdminTravelPackageController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TouristController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\UserController;
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
    'middleware' => ['is_admin', 'auth'],
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
    
    // Route::resource('travel_packages.galleries', GalleryController::class)
    // ->except(['index', 'show'])
    // ->names([
    //     'create' => 'admin.travel_packages.galleries.create',
    //     'store' => 'admin.travel_packages.galleries.store',
    //     'edit' => 'admin.travel_packages.galleries.edit',
    //     'update' => 'admin.travel_packages.galleries.update',
    //     'destroy' => 'admin.travel_packages.galleries.destroy'
    // ]);

    // Categories
    Route::resource('categories', CategoryController::class)->except('show');

    // Blogs
    Route::resource('blogs', AdminBlogController::class)->except('show');

    // Users & Profile
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('profile', 'App\Http\Controllers\ProfileController@show')->name('profile.show');
Route::put('profile', 'App\Http\Controllers\ProfileController@update')->name('profile.update');
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
Route::get('/booking/{destination}', [BookingController::class, 'showForm'])->name('booking.form');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');
Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');

// Password Reset
Route::post('/password/search', [ForgotPasswordController::class, 'sendEmail'])->name('password.email');
Route::get('/password/email/send/{token}', [ForgotPasswordController::class, 'reset'])->name('password.reset');
Route::post('/password/update/{token}', [ForgotPasswordController::class, 'updatePassword'])->name('password.update');

// Tourist Routes
Route::prefix('tourist')->group(function () {
    // Registration
    Route::get('/register', [TouristController::class, 'register'])
         ->name('touristregister')
         ->middleware('guest:travel_user');
    Route::post('/register', [TouristController::class, 'registerPost'])
         ->name('touristregister.post');
    
    // Login
    Route::get('/login', [TouristController::class, 'login'])
         ->name('touristlogin')
         ->middleware('guest:travel_user');
    Route::post('/login', [TouristController::class, 'loginPost'])
         ->name('touristlogin.post');
    
    // Profile
    Route::get('/profile', [TouristController::class, 'profile'])
         ->name('touristprofile')
         ->middleware('auth:travel_user');
    
    // Logout
    Route::post('/logout', [TouristController::class, 'logout'])
         ->name('touristlogout');

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