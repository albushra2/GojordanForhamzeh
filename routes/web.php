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




Auth::routes(['register' => false]); // Disable default registration route
// Admin Authentication Routes
Route::prefix('admin')->group(function() {
    // Login
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    // Registration (protected - only existing admins can create new admins)
    Route::middleware(['auth:web', 'is_admin'])->group(function() {
        Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('admin.register');
        Route::post('/register', [RegisterController::class, 'register']);
    });
});
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::group(['middleware' => ['is_admin','auth'], 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

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

    Route::get('/booking/{booking}', [\App\Http\Controllers\Admin\BookingController::class, 'show'])
    ->name('bookings.show');

    Route::delete('/booking/{booking}', [\App\Http\Controllers\Admin\BookingController::class, 'destroy'])
    ->name('bookings.destroy');

    Route::get('/galleries', [\App\Http\Controllers\Admin\GalleryController::class, 'index'])
    ->name('galleries.index');

    
    Route::get('/galleries/create/{travelPackage}', [\App\Http\Controllers\Admin\GalleryController::class, 'create'])
        ->name('admin.galleries.create');
    
    Route::post('/galleries/{travelPackage}', [\App\Http\Controllers\Admin\GalleryController::class, 'store'])
        ->name('admin.galleries.store');
    // Route::get('/galleries/{travelPackage}/{gallery}/edit', [\App\Http\Controllers\Admin\GalleryController::class, 'edit'])
    //     ->name('admin.galleries.edit');
    // Route::put('/galleries/{travelPackage}/{gallery}', [\App\Http\Controllers\Admin\GalleryController::class, 'update'])
    //     ->name('admin.galleries.update');
    // Route::delete('/galleries/{travelPackage}/{gallery}', [\App\Http\Controllers\Admin\GalleryController::class, 'destroy'])
    //     ->name('admin.galleries.destroy');
    // Route::get('/galleries/{travelPackage}', [\App\Http\Controllers\Admin\GalleryController::class, 'show'])
    //     ->name('admin.galleries.show');
    // Route::get('/galleries/{travelPackage}/create', [\App\Http\Controllers\Admin\GalleryController::class, 'create'])
    //     ->name('admin.galleries.create');
 
});

Route::post('/bookings', [BookingController::class, 'store'])
    ->name('bookings.store');
 
    // return view('admin.bookings.show', compact('booking'));
    Route::put('/bookings/{booking}', [BookingController::class, 'updateStatus'])
        ->name('bookings.updateStatus');

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
// Route::get('travel-packages/{id}',[\App\Http\Controllers\TravelPackageController::class, 'show'])->name('travel_package.show');




// blogs
Route::get('blogs', [\App\Http\Controllers\BlogController::class, 'index'])->name('blogs.index');
Route::get('blogs/{blog:slug}', [\App\Http\Controllers\BlogController::class, 'show'])->name('blogs.show');
Route::get('blogs/category/{category:slug}', [\App\Http\Controllers\BlogController::class, 'category'])->name('blog.category');
// contact
Route::get('contact', function() {
    return view('contact');
})->name('contact');
// booking
Route::post('booking', [App\Http\Controllers\BookingController::class, 'store'])->name('booking.store');
Route::delete('/booking/{id}', [App\Http\Controllers\BookingController::class, 'destroy'])->name('booking.destroy');
    Route::get('/bookings/{booking}', [BookingController::class, 'show'])
    ->name('bookings.show');
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


// Route::middleware(['auth'])->group(function () {

//     // Display a list of the authenticated user's bookings
//     Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');

//     // Display details for a specific booking
//     // Uses Route Model Binding to automatically inject the Booking instance
//     Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');

//     // Delete a specific booking
//     // Uses Route Model Binding to automatically inject the Booking instance
//     Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');

// });

// // User routes
// Route::group(['middleware' => ['auth'], 'prefix' => 'user', 'as' => 'user.'], function() {
//     // Profile
//     Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
//     Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

//     // Bookings
//     Route::resource('bookings', BookingController::class)->only(['index', 'show', 'destroy']);

//     // Diaries
//     Route::resource('diaries', DiaryController::class)->except('edit', 'update');

//     // Reviews
//     Route::get('bookings/{booking}/review', [ReviewController::class, 'create'])->name('reviews.create');
//     Route::post('bookings/{booking}/review', [ReviewController::class, 'store'])->name('reviews.store');

//     // Contact
//     Route::get('contact', [ContactController::class, 'create'])->name('contact.create');
//     Route::post('contact', [ContactController::class, 'store'])->name('contact.store');
// });