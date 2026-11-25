<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

// Leaderboard & Heavy Lifter PR Wall
Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard');

// Blog Routes
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/api/blog/{slug}', [BlogController::class, 'apiShow'])->name('api.blog.show');

// Gym Supplement & Gear Store Routes
Route::get('/store', [StoreController::class, 'index'])->name('store.index');
Route::get('/store/checkout', fn () => redirect()->route('store.index'));
Route::post('/store/checkout', [StoreController::class, 'checkout'])->name('store.checkout');

// Authentication Routes (Guest Only)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/demo-login', [AuthController::class, 'demoLogin'])->name('login.demo');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Member Profile & Fitness Tracking Routes (Auth Required)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/change-plan', [ProfileController::class, 'changePlan'])->name('profile.change-plan');
    Route::post('/profile/renew', [ProfileController::class, 'renew'])->name('profile.renew');
    Route::post('/profile/freeze', [ProfileController::class, 'freezeMembership'])->name('profile.freeze');
    Route::get('/profile/invoice/{id}', [ProfileController::class, 'invoice'])->name('profile.invoice');

    // Live QR Turnstile Check-in
    Route::post('/profile/check-in', [ProfileController::class, 'checkIn'])->name('profile.check-in');

    // Daily Workout & Set Logging
    Route::post('/profile/workouts', [ProfileController::class, 'storeWorkout'])->name('profile.workouts.store');
    Route::delete('/profile/workouts/{id}', [ProfileController::class, 'deleteWorkout'])->name('profile.workouts.delete');

    // Weekly Body Measurements & Transformation Progress
    Route::post('/profile/progress', [ProfileController::class, 'storeProgress'])->name('profile.progress.store');
});
