<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CajaController extends Controller
{
  public function calcularCambio($cantidad): JsonResponse
  {


    return response()->json([
      'cantidad' => $cantidad,
      'cambio' => [
        '20ebros' => intdiv($cantidad, 20),
        '10ebros' => intdiv($cantidad % 20, 10),
        '5ebros' => intdiv($cantidad % 10, 5),
        '1ebro' => $cantidad % 5,
      ],
    ], 200);
  }
}
