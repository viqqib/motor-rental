<?php

use App\Http\Controllers\AboutPageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ContentHomepageController;
use App\Http\Controllers\Admin\HomepageSettingsController;
use App\Http\Controllers\Admin\MotorsController;
use App\Http\Controllers\Admin\MotorsHargaController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SettingsSocialLinksController;
use App\Http\Controllers\Admin\WebsiteInfoController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\MotorController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\isLogged;
use App\Models\WebsiteInfo;

// Sample Header Links
View::composer('frontend.partials.navbar', function ($view) {
    $view->with('headerLinks', [
        ['name' => 'Beranda', 'link' => '/'],
        ['name' => 'Rental', 'link' => '/motor'],
        ['name' => 'Tentang', 'link' => '/tentang'],
        ['name' => 'Contact', 'link' => '/kontak'],
    ]);
});

// Frontend Routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/tentang', [AboutPageController::class, 'index']);
Route::get('/kontak', [ContactPageController::class, 'index']);
Route::get('/motor', [MotorController::class, 'index'])->name('motor.index');
Route::get('/motor/{id}', [MotorController::class, 'show'])->name('motor.show');

// Admin Routes
Route::get('/admin', [AdminController::class, 'index'])->middleware('is_admin');

// Admin Routes - Motors
// Admin Routes - Motors
Route::prefix('admin')
    ->name('admin.')
    ->middleware('is_admin')
    ->group(function () {
        Route::resource('motor', MotorsController::class);
        Route::resource('motorHarga', MotorsHargaController::class);
    });

// Admin Routes - Content Homepage
Route::prefix('admin/content')
    ->name('admin.content.')
    ->middleware('is_admin')
    ->group(function () {
        Route::resource('homepage', ContentHomepageController::class);
    });


Route::prefix('admin/settings')
    ->name('admin.settings.')
    ->middleware('is_admin')
    ->group(function () {
        Route::resource('/', SettingsController::class);
        Route::resource('social-link', SettingsSocialLinksController::class);
        Route::resource('web-info', WebsiteInfoController::class);
    });


// Admin Session Routes
Route::get('/admin/session', [SessionController::class, 'index'])->middleware(isLogged::class);
Route::post('/admin/session/login', [SessionController::class, 'login']);
Route::get('/admin/session/logout', [SessionController::class, 'logout']);
Route::get('/admin/session/register', [SessionController::class, 'register'])->middleware('is_admin');
Route::post('/admin/session/create', [SessionController::class, 'create'])->middleware('is_admin');
