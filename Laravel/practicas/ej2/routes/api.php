<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LetrasController;
use Monolog\Level;

Route::get('/cuentaletras/{palabra}/{letra}', [LetrasController::class, 'cuentaletras']);
Route::get('/cuentapalabras/{frase}', [LetrasController::class, 'cuentaPalabras']);
Route::get('/palindromo/{frase}', [LetrasController::class, 'isPalindrome']);
Route::get('/claveCesar/{mensaje}', [LetrasController::class, 'claveDelCesar']);
