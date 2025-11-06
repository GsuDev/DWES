<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'getUsers']);

Route::get('/users/{id}', [UserController::class, 'getUser']);

Route::post('/users', [UserController::class, 'createUser']);

Route::delete('/users/{id}', [UserController::class, 'getUser']);