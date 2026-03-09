<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\User\ProgressController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// User pages
Route::middleware('auth')->group(function () {
    Route::view('/home', 'User.home')->name('home');
    Route::view('/profile', 'User.profile')->name('profile');
    Route::view('/subjects', 'User.subjects')->name('subjects');
    Route::get('/achievements', [ProgressController::class, 'showAchievements'])->name('achievements');
    Route::view('/awards', 'User.awards')->name('awards');
    Route::view('/store', 'User.store')->name('store');
    Route::view('/games', 'User.games')->name('games');
    Route::view('/lessons', 'User.lessons')->name('lessons');
    Route::view('/video', 'User.video')->name('video');
    Route::view('/game/1', 'User.game1')->name('game1');
    Route::view('/game/2', 'User.game2')->name('game2');
    Route::view('/game/3', 'User.game3')->name('game3');
    Route::view('/game/4', 'User.game4')->name('game4');
    Route::view('/game/5', 'User.game5')->name('game5');
    Route::view('/game/6', 'User.game6')->name('game6');

    // progress: record game results (web POST)
    Route::post('/progress', [ProgressController::class, 'store'])->name('progress.store');
});

require __DIR__ . '/auth.php';

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);

    Route::middleware('auth:admin')->group(function () {
        Route::view('/home', 'admin.home')->name('home');
        Route::view('/users', 'admin.usersmanagements')->name('users');
        Route::view('/subjects', 'admin.subjectsmanagements')->name('subjects');
        Route::view('/reports', 'admin.reports')->name('reports');
        Route::view('/settings', 'admin.systemsettings')->name('settings');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    });
});
