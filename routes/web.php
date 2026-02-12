<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\FireController;
use App\Http\Controllers\AdminMapController;

Route::get('/hash', function () {
    return bcrypt('123456');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/map', [DistrictController::class, 'index'])->name('map');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});

Route::get('/admin/map', [AdminMapController::class, 'index'])
    ->name('admin.map');

Route::resource('fires', FireController::class);

