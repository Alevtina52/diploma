<?php

use App\Http\Controllers\Admin\ContestController as AdminContestController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\FireController;
use App\Http\Controllers\AdminMapController;
use App\Http\Controllers\ContestController;

Route::get('/hash', function () {
    return bcrypt('123456');
});


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

Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {

        Route::get('/users', [UserController::class, 'index'])
            ->name('users.index');

        Route::get('/users/create', [UserController::class, 'create'])
            ->name('users.create');

        Route::post('/users', [UserController::class, 'store'])
            ->name('users.store');
    });


Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('news', NewsController::class);
    });


Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {
        Route::resource('contests', AdminContestController::class);
    });

Route::get('/contests', [ContestController::class, 'index'])
    ->name('contests.index');

Route::get('/contests/{contest}', [ContestController::class, 'show'])
    ->name('contests.show');

Route::post('/contests/{contest}/apply', [ContestController::class, 'apply'])
    ->name('contests.apply');
