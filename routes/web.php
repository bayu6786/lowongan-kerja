<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserJobController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('register');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register'); 
})->name('register');

require __DIR__.'/auth.php';

    Route::get('/home', function () {
    return view('pages.home');
    })->name('home');

    Route::get('/contact', function () {
    return view('pages.contact');
    })->name('contact');

    Route::get('/informasi-umum', function () {
    return view('pages.informasi');
    })->name('informasi');

    // Daftar lowongan
    Route::get('/lowongan', [UserJobController::class, 'index'])->name('user.jobs.index');

    // Hanya user login yang bisa lihat detail
    Route::middleware('auth')->group(function () {

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
        Route::get('/{id}', [UserJobController::class, 'show'])->name('user.jobs.show');
    });

// Admin login/logout
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login.form');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

// Admin area
Route::middleware('auth:admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('/jobs', JobController::class);
});




