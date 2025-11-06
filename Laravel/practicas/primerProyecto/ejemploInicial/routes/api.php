<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CajaController;

Route::get('/cambio/{cantidad}', [CajaController::class, 'calcularCambio']);

