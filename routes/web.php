<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Public Routes
Route::get('/', function () {

    if (Auth::check()) {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        return $user->isAdmin()
            ? redirect()->route('admin.dashboard')
            : redirect()->route('customer.dashboard');
    }

    return redirect()->route('login');

})->name('home');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// Admin Routes
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::resource('pupuk', AdminController::class)->except(['dashboard']);
    });

// Customer Routes
Route::prefix('customer')
    ->middleware(['auth', 'customer'])
    ->name('customer.')
    ->group(function () {
        Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('dashboard');
        Route::get('/pupuk', [CustomerController::class, 'index'])->name('pupuk.index');
        Route::get('/pupuk/{pupuk}', [CustomerController::class, 'show'])->name('pupuk.show');
    });
