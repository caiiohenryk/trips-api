<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::get("/users", [UserController::class, 'index']); // GET localhost:8000/api/users?page=1
Route::get("/users/{user}", [UserController::class, 'show']); // GET localhost:8000/api/users/1
Route::post("/users", [UserController::class, 'store']); // POSTlocalhost:8000/api/users
Route::put("/users/{user}", [UserController::class, 'update']); // PUT localhost:8000/api/users/1
Route::delete("/users/{user}", [UserController::class, 'destroy']); // DELETE localhost:8000/api/users/1