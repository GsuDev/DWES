<?php

use App\Http\Controllers\MiControlador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/listar',[MiControlador::class,'listar']);

