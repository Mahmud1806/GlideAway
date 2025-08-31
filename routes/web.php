<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TripsController;
use App\Http\Controllers\BlogpostController;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;

// 🏠 Public welcome page
Route::get('/', function () {
    return view('welcome');
});

// 👤 Authenticated user dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 📧 Email verification redirect based on user type
Route::get('/verify-email/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    $user = Auth::user();
    return redirect($user->type === 'admin' ? route('admin.dashboard') : route('dashboard'));
})->middleware(['auth', 'signed'])->name('verification.verify');

// 🛡️ Admin-only routes
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin.dashboard');

    // Add & manage shop items
    Route::get('/add-items', function () {
        return view('addItems');
    })->name('add.items');

    Route::post('/add-items', [ShopController::class, 'store'])->name('shop.store');

    Route::get('/manage-items', [ShopController::class, 'index'])->name('manage.items');

    // Add & manage trips
    Route::get('/add-trip', function () {
        return view('addTrip');
    })->name('add.trip');

    Route::post('/trips/store', [TripsController::class, 'store'])->name('trips.store');

    Route::get('/manage-trips', [TripsController::class, 'manage'])->name('manage.trips');

    Route::delete('/trips/{country}', [TripsController::class, 'destroyByCountry'])->name('trips.destroy');

    // Manage users
    Route::get('/manage-users', [ProfileController::class, 'manage'])->name('manage.users');
    Route::delete('/users/{id}', [ProfileController::class, 'destroyUser'])->name('users.destroy');
});

// 🌍 Public trip and blog pages
Route::get('/trips', [TripsController::class, 'index'])->name('trips');
Route::get('/blogposts', [BlogpostController::class, 'index'])->name('blogposts');
Route::get('/add-blogpost', function () {
    return view('addBlogpost');
})->name('addblogpost');
Route::post('/blogpost', [BlogpostController::class, 'store'])->name('blogpost.store');

// 🧑‍💻 Authenticated user profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Recharge
    Route::get('/recharge', function () {
        return view('recharge');
    })->name('recharge');

    Route::post('/recharge', [RechargeController::class, 'store'])->name('recharge.store');

    // Cart
    Route::get('/cart', function () {
        return view('cart');
    })->name('cart');
});
Route::post('/cart/pay/{id}', [CartController::class, 'pay'])->name('cart.pay');

//Manage shop
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/manage-shop', [ShopController::class, 'index'])->name('manage.shop');
    Route::delete('/shop/{id}', [ShopController::class, 'destroy'])->name('shop.destroy');
});
Route::get('/shop', [ShopController::class, 'showShop'])->name('shop');



//Manage Blogposts

Route::get('/manage-blogposts', [BlogpostController::class, 'manage'])->name('manage.blogpost');
Route::delete('/blogposts/{id}', [BlogpostController::class, 'destroy'])->name('blogpost.destroy');

//Manage Cart operations
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/pay/{id}', [CartController::class, 'pay'])->name('cart.pay');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');


// 🔐 Auth routes (login, register, etc.)
require __DIR__.'/auth.php';
