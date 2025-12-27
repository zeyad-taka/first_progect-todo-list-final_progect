<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\taskcontroller;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/tasks', [taskcontroller::class, 'index']);
Route::get('/tasks/{id}', [taskcontroller::class, 'show']);
Route::post('/tasks', [taskcontroller::class, 'store']);
Route::put('/tasks/{id}', [taskcontroller::class, 'update']);
Route::delete('/tasks/{id}', [taskcontroller::class, 'destroy']);
use App\Http\Controllers\Api\CategoryController;
Route::get('/categories', [CategoryController::class, 'index']);
Route::apiResource('categories', CategoryController::class);