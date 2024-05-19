<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication\AuthController;
use App\Http\Controllers\Dashboard\AbsensiController;
use App\Http\Controllers\Dashboard\IndexController as DashboardIndexController;
use App\Http\Controllers\Dashboard\MuridController;
use App\Http\Controllers\Dashboard\UserController;

Route::controller(AuthController::class)->group(function() {
    Route::match(['POST', 'GET'], '/', 'Login')->name('login');
});

Route::middleware('auth')->group(function() {
    Route::prefix('dashboard')->group(function() {
        Route::controller(DashboardIndexController::class)->group(function() {
            Route::match(['POST', 'GET'], '/', 'index')->name('dashboard');
        });
        Route::controller(UserController::class)->group(function() {
            Route::prefix('user')->group(function() {
                Route::match(['GET'], '/', 'index')->name('user');
                Route::match(['POST', 'GET'], 'create', 'create')->name('user.create');
                Route::match(['POST', 'GET'], 'update/{id}', 'update')->name('user.update');
                Route::match(['POST', 'GET'], 'delete/{id}', 'delete')->name('user.delete');
            });
        });
        Route::controller(MuridController::class)->group(function() {
            Route::prefix('murid')->group(function() {
                Route::match(['GET'], '/', 'index')->name('murid');
            });
        });
        Route::controller(AbsensiController::class)->group(function() {
            Route::prefix('absensi')->group(function() {
                Route::match(['GET'], '/', 'index')->name('absensi');
            });
        });
    });
});