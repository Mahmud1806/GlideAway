<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TripsController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// 🏠 Welcome page
Route::get('/', function () {
    return view('welcome');
});

// 👤 Authenticated user dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 🛡️ Admin dashboard (requires is_admin middleware)
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin.dashboard');
});

// 📧 Email verification redirect based on user type
Route::get('/verify-email/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    $user = Auth::user();

    return redirect($user->type === 'admin' ? route('admin.dashboard') : route('dashboard'));
})->middleware(['auth', 'signed'])->name('verification.verify');

// 🌍 Trips page
Route::get('/trips', [TripsController::class, 'index'])->name('trips');


// 🧑‍💻 Profile routes (authenticated users only)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Add Trip Page
Route::get('/add-trip', function () {
    return view('addTrip');
})->name('add.trip');
// web.php
Route::post('/trips/store', [TripsController::class, 'store'])->name('trips.store');

//Manage Trip
Route::get('/manage-trips', [TripsController::class, 'manage'])->name('manage.trips');

//Delete Trip
Route::delete('/trips/{country}', [TripsController::class, 'destroyByCountry'])->name('trips.destroy');

//Manage Users
Route::get('/manage-users', [ProfileController::class, 'manage'])->name('manage.users');
//delete User
Route::delete('/users/{id}', [ProfileController::class, 'destroyUser'])->name('users.destroy');


// 🔐 Auth routes (login, register, etc.)
require __DIR__.'/auth.php';
