<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\Admin\DashboardController;
use App\Http\Controllers\Api\Admin\UserController;
use Illuminate\Support\Facades\Route;

// --------------------
// CHILD
// --------------------
Route::post('/child/signup', [AuthController::class, 'signupChild']);
Route::post('/child/login', [AuthController::class, 'loginChild']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/child/profile', [AuthController::class, 'profileChild']);
    Route::post('/child/logout', [AuthController::class, 'logoutChild']);
});

// --------------------
// PARENT
// --------------------
Route::post('/parent/signup', [AuthController::class, 'signupParent']);
Route::post('/parent/login', [AuthController::class, 'loginParent']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/parent/profile', [AuthController::class, 'profileParent']);
    Route::post('/parent/logout', [AuthController::class, 'logoutParent']);
});

// --------------------
// ADMIN
// --------------------
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);

    Route::get('/admin/users', [UserController::class, 'index']);
    Route::post('/admin/users', [UserController::class, 'store']);
    Route::put('/admin/users/{id}', [UserController::class, 'update']);
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy']);
});
