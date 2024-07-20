<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/users", [UserController::class, 'index']); // GET localhost:8000/api/users?page=1
Route::get("/users/{user}", [UserController::class, 'show']); // GET localhost:8000/api/users/1