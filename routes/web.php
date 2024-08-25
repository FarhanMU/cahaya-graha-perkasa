<?php

use App\Http\Controllers\Dashboard\CardController;
use App\Http\Controllers\Dashboard\ContactUsController;
use App\Http\Controllers\Dashboard\HeaderController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SocialMediaController;
use App\Http\Controllers\Main\MainPageController;
use App\Http\Controllers\Main\SmtpController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\Dashboard\WhyUsController;
use App\Http\Controllers\Dashboard\OurProductController;
use App\Http\Controllers\Dashboard\SendEmailController;
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

    Route::resource('/dashboard/our-product', OurProductController::class)->names([
        'index' => 'ourProduct.index',
        'create' => 'ourProduct.create',
        'store' => 'ourProduct.store',
        'show' => 'ourProduct.show',
        'edit' => 'ourProduct.edit',
        'update' => 'ourProduct.update',
        'destroy' => 'ourProduct.destroy',
    ]);

    Route::resource('/dashboard/contact-us', ContactUsController::class)->names([
        'index' => 'contactUs.index',
        'create' => 'contactUs.create',
        'store' => 'contactUs.store',
        'show' => 'contactUs.show',
        'edit' => 'contactUs.edit',
        'update' => 'contactUs.update',
        'destroy' => 'contactUs.destroy',
    ]);

    Route::resource('/dashboard/social-media', SocialMediaController::class)->names([
        'index' => 'socialMedia.index',
        'create' => 'socialMedia.create',
        'store' => 'socialMedia.store',
        'show' => 'socialMedia.show',
        'edit' => 'socialMedia.edit',
        'update' => 'socialMedia.update',
        'destroy' => 'socialMedia.destroy',
    ]);

    Route::resource('/dashboard/card', CardController::class)->names([
        'index' => 'card.index',
        'create' => 'card.create',
        'store' => 'card.store',
        'show' => 'card.show',
        'edit' => 'card.edit',
        'update' => 'card.update',
        'destroy' => 'card.destroy',
    ]);

    Route::get('/dashboard/send-email', [SendEmailController::class, 'index'])->name('sendEmail.index');

});