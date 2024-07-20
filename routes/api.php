<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

// CRUD User
Route::group([
    'middleware' => 'api',
    'prefix' => 'users'
], function ($router) {
    Route::get("", [UserController::class, 'index'])->name('getAll'); // GET localhost:8000/api/users?page=1
    Route::get("/{user}", [UserController::class, 'show'])->name('getById'); // GET localhost:8000/api/users/1
    Route::post("", [UserController::class, 'store'])->name('post'); // POSTlocalhost:8000/api/users
    Route::put("/{user}", [UserController::class, 'update'])->name('update'); // PUT localhost:8000/api/users/1
    Route::delete("/{user}", [UserController::class, 'destroy'])->name('delete'); // DELETE localhost:8000/api/users/1
});

// Authentication
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [LoginController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me', [LoginController::class, 'me'])->middleware('auth:api')->name('me');
});