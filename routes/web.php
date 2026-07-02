<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');
});

Route::middleware('auth')->group(function () {
    Route::get('/login/logout', [LoginController::class, 'logout'])->name('login.logout');
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/show', [DashboardController::class, 'show'])->name('dashboard.show');
    Route::get('/dashboard/edit', [DashboardController::class, 'edit'])->name('dashboard.edit');
    Route::put('/dashboard/update', [DashboardController::class, 'update'])->name('dashboard.update');
    
    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::put('/setting/{setting}/update', [SettingController::class, 'update'])->name('setting.update');
    
    Route::resource('/user', UserController::class)->middleware('role:Superadmin');
});