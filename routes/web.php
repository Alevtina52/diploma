<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\FireController;
use App\Http\Controllers\AdminMapController;
use App\Http\Controllers\ContestController;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ContestController as AdminContestController;

/*
|--------------------------------------------------------------------------
| Service routes
|--------------------------------------------------------------------------
*/

Route::get('/hash', fn() => bcrypt('123456'));


/*
|--------------------------------------------------------------------------
| Public routes
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => view('welcome'));

Route::get('/map', [DistrictController::class, 'index'])
    ->name('map');

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Public contests (for guests)
|--------------------------------------------------------------------------
*/

Route::get('/contests', [ContestController::class, 'index'])
    ->name('contests.index');

Route::get('/contests/{contest}', [ContestController::class, 'show'])
    ->name('contests.show');

Route::post('/contests/{contest}/apply', [ContestController::class, 'apply'])
    ->name('contests.apply');


/*
|--------------------------------------------------------------------------
| Authenticated routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', fn() => view('dashboard'))
        ->name('dashboard');

    Route::resource('fires', FireController::class);

    Route::get('/admin/map', [AdminMapController::class, 'index'])
        ->name('admin.map');
});


/*
|--------------------------------------------------------------------------
| Admin panel
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {

        // Users
        Route::resource('users', UserController::class)
            ->only(['index', 'create', 'store']);

        // News
        Route::resource('news', NewsController::class);

        // Contests (admin CRUD)
        Route::resource('contests', AdminContestController::class);
    });
