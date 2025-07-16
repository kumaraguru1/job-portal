<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\JobSeekerAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\PasswordController;

Route::get('/', fn() => view('welcome'));

// Job Seeker Auth
Route::get('/register', [JobSeekerAuthController::class, 'registerForm'])->name('register');
Route::post('/register', [JobSeekerAuthController::class, 'register']);
Route::get('/login', [JobSeekerAuthController::class, 'loginForm'])->name('login');
Route::post('/login', [JobSeekerAuthController::class, 'login']);
Route::post('/logout', [JobSeekerAuthController::class, 'logout'])->middleware('auth:web');

// Job Seeker Dashboard
Route::middleware('auth:web')->group(function () {
    Route::get('/dashboard', [JobSeekerController::class, 'dashboard']);
    Route::get('/edit-profile', [JobSeekerController::class, 'edit']);
    Route::post('/update-profile', [JobSeekerController::class, 'update']);
    Route::get('/change-password', [PasswordController::class, 'changePasswordForm']);
    Route::post('/change-password', [PasswordController::class, 'changePassword']);
});

// Admin auth routes
Route::get('/admin/login', [\App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [\App\Http\Controllers\Auth\AdminLoginController::class, 'login']);
Route::post('/admin/logout', [\App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('admin.logout');

// Admin dashboard (protected)
Route::middleware(['auth:admin'])->group(function () {
    // Route::get('/admin/dashboard', function () {
    //     return view('admin.dashboard');
    // });
    Route::get('/admin/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard']);

    Route::get('/admin/job-seekers', [\App\Http\Controllers\AdminController::class, 'index']);
    Route::get('/admin/job-seeker/{id}', [\App\Http\Controllers\AdminController::class, 'show']);
    Route::delete('/admin/job-seeker/{id}', [\App\Http\Controllers\AdminController::class, 'destroy']);
});

