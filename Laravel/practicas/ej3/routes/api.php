<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/newgame/{userId}/{length}', [GameController::class, 'iniciarPartida']);
Route::get('/open/{userId}/{gameId}/{tile1}/{tile2}', [GameController::class, 'destaparCasillas']);
Route::get('/info/{userId}', [GameController::class, 'estadoPartida']);