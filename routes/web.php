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

// 🛡️ Admin dashboard
Route::get('/admin-dashboard', function () {
    return view('admin'); // ✅ matches admin.blade.php
})->middleware(['auth', 'verified'])->name('admin.dashboard');

// ✉️ Email verification redirect with role check
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    $user = Auth::user();

    return redirect($user->type === 'admin' ? route('admin.dashboard') : route('dashboard'));
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/trips', [TripsController::class, 'index'])->name('trips');



// 🧑‍💻 Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🔐 Auth routes (login, register, etc.)
require __DIR__.'/auth.php';
