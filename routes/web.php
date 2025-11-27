<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\KebayaController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Admin Auth Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Protected Admin Routes
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Portfolio Management
        Route::resource('portfolios', PortfolioController::class);
        
        // Package Management
        Route::resource('packages', PackageController::class);
        
        // Kebaya Management
        Route::resource('kebayas', KebayaController::class);
    });
});
