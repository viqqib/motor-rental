<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MotorsController;
use App\Http\Controllers\Admin\MotorsHargaController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\MotorController;



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
Route::get('/admin', [AdminController::class, 'index']);

// Route::get('/admin/motor', [MotorsController::class, 'index']);

// Route::resource('/admin/motor', MotorsController::class);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('motor', MotorsController::class); // This handles all CRUD operations, including PUT
    Route::resource('motorHarga', MotorsHargaController::class);
});

Route::get('/admin/session', [SessionController::class, 'index']);
Route::post('/admin/session/login', [SessionController::class, 'login']);

