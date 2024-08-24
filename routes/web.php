<?php

use App\Http\Controllers\Dashboard\HeaderController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Main\MainPageController;
use App\Http\Controllers\Main\SmtpController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\Dashboard\WhyUsController;
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
    Route::resource('/dashboard/header', HeaderController::class)->names([
        'index' => 'header.index',
        'create' => 'header.create',
        'store' => 'header.store',
        'show' => 'header.show',
        'edit' => 'header.edit',
        'update' => 'header.update',
        'destroy' => 'header.destroy',
    ]);
    Route::resource('/dashboard/why-us', WhyUsController::class)->names([
        'index' => 'whyUs.index',
        'create' => 'whyUs.create',
        'store' => 'whyUs.store',
        'show' => 'whyUs.show',
        'edit' => 'whyUs.edit',
        'update' => 'whyUs.update',
        'destroy' => 'whyUs.destroy',
    ]);
});