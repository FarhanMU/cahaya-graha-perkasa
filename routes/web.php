<?php

use App\Http\Controllers\Main\DashboardController;
use App\Http\Controllers\Main\MainPageController;
use App\Http\Controllers\Main\SmtpController;
use App\Http\Controllers\Master\DriverController;
use App\Http\Controllers\User\AuthController;
use Illuminate\Support\Facades\Route;


// Main Controller
Route::get('/', [MainPageController::class, 'index'])->name('beranda');
Route::get('/blog', [MainPageController::class, 'blogIndex'])->name('blog');
Route::get('/blog-detail/{slug}', [MainPageController::class, 'blogDetail'])->name('blog.detail');
Route::get('/id-card/{slug}', [MainPageController::class, 'idCardIndex'])->name('id-card');


// Auth Controller
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');



// Email Controller
Route::post('/smtp-send', [SmtpController::class, 'sendEmail'])->name('smtp.send');


Route::middleware('auth')->group(function () {
    // Dashboard Controller
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});