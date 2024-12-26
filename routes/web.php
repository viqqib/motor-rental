<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomepageSettingsController;
use App\Http\Controllers\Admin\MotorsController;
use App\Http\Controllers\Admin\MotorsHargaController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\MotorController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\isLogged;

// Sample Header Links
View::composer('frontend.partials.navbar', function ($view) {
    $view->with('headerLinks', [
        ['name' => 'Home', 'link' => '/'],
        ['name' => 'About', 'link' => '/about'],
        ['name' => 'Contact', 'link' => '/contact'],
        ['name' => 'Contact', 'link' => '/contact'],
    ]);
});

//Frontend
Route::get('/', [HomeController::class, 'showAvailableBikes']);

Route::get('/motor', [MotorController::class, 'index'])->name('motor.index');
Route::get('/motor/{id}', [MotorController::class, 'show'])->name('motor.show');

//Admin
Route::get('/admin', [AdminController::class, 'index'])->middleware('is_admin');

// Route::get('/admin/motor', [MotorsController::class, 'index']);

// Route::resource('/admin/motor', MotorsController::class);

Route::prefix('admin')
    ->name('admin.')
    ->middleware('is_admin')
    ->group(function () {
        Route::resource('motor', MotorsController::class);
        Route::resource('motorHarga', MotorsHargaController::class);
        Route::resource('homepageContent', HomepageSettingsController::class);
    });
    
Route::get('/admin/session', [SessionController::class, 'index'])->middleware(isLogged::class);
Route::post('/admin/session/login', [SessionController::class, 'login']);
Route::get('/admin/session/logout', [SessionController::class, 'logout']);


Route::get('/admin/session/register', [SessionController::class, 'register']);
Route::post('/admin/session/create', [SessionController::class, 'create']);

