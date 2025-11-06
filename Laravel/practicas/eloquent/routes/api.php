<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuarripeiController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::get('verpersonas', [GuarripeiController::class, 'verPersonas']);
Route::get('buscarpersona/{dni}', [GuarripeiController::class, 'buscarPersona']);
Route::get('vermayores', [GuarripeiController::class, 'vermayores']);
Route::post('insertarPersona', [GuarripeiController::class, 'insertarPersona']);
Route::post('insertarPropiedad', [GuarripeiController::class, 'insertarPropiedad']);
Route::delete('borrarPersona/{dni}', [GuarripeiController::class, 'borrarPersona']);
Route::put('modificarPersona/{dni}', [GuarripeiController::class, 'modificarPersona']);

Route::get('comentariosPersona/{dni}', [GuarripeiController::class, 'comentariosPersona']);
Route::get('mostrarComentarios', [GuarripeiController::class, 'mostrarComentarios']);
Route::get('cochesDe/{dni}', [GuarripeiController::class, 'cochesDe']);
Route::get('propietariode/{matricula}', [GuarripeiController::class, 'propietariosDe']);
Route::get('todaspropiedades', [GuarripeiController::class, 'todaspropiedades']);
Route::post('attach/{dni}', [GuarripeiController::class, 'attachCoche']);
Route::post('detach/{dni}', [GuarripeiController::class, 'detachCoche']);
