<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckEdad
{
public function handle(Request $request, Closure $next)
{
if ($request->edad < 18) {
  return response('Acceso denegado.', 403);
  }

  return $next($request); // continúa hacia la siguiente capa
  }
  }