<?php

namespace App\Http\Controllers;

use Hamcrest\Type\IsNumeric;
use Illuminate\Http\Request;

class LetrasController extends Controller
{
  function cuentaletras($palabra, $letra)
  {
    $contador = 0;
    for ($i = 0; $i < strlen($palabra); $i++) {
      if ($palabra[$i] == $letra) {
        $contador++;
      }
    }
    return response()->json(
      [
        'palabra' => $palabra,
        'letra' => $letra,
        'contador' => $contador
      ],
      200,
      ['Content-Type' => 'application/json ;charset=UTF-8']
    );
  }

  function cuentaPalabras($frase)
  {
    $arrayPalabras = explode(" ", $frase);
    return response()->json(
      [
        'frase' => $frase,
        'contador' => count($arrayPalabras)
      ],
      200,
      ['Content-Type' => 'application/json ;charset=UTF-8']
    );
  }

  function isPalindrome($palabra)
  {
    // Remove spaces and ensure the string contains only letters
    $palabra = preg_replace('/[^a-zA-Z]/', '', $palabra);
    $palabra = strtolower($palabra);

    $invertida = strrev($palabra);

    $result = ($palabra === $invertida);

    $respuesta = ($result) ? 'Es un palíndromo' : 'No es un palíndromo';
    return response()->json(
      [
        "resultado" => $respuesta
      ]
    , 200, ['Content-Type' => 'application/json ; charset=UTF-8'], JSON_UNESCAPED_UNICODE);
  }
  function claveDelCesar($mensaje)
  {
    // Pasar a mayúsculas
    $mensaje = mb_strtoupper($mensaje, 'UTF-8');

    $resultado = '';

    for ($i = 0; $i < mb_strlen($mensaje, 'UTF-8'); $i++) {
      $char = mb_substr($mensaje, $i, 1, 'UTF-8');

      // Si es letra A-Z
      if ($char >= 'A' && $char <= 'Z') {
        $resultado .= ($char === 'Z') ? 'A' : chr(ord($char) + 1);
      }
      // Si es dígito 0-9
      elseif ($char >= '0' && $char <= '9') {
        $resultado .= ($char === '9') ? '0' : strval(intval($char) + 1);
      }
      // Otros caracteres se mantienen
      else {
        $resultado .= $char;
      }
    }

    return response()->json(
      ["mensaje_codificado" => $resultado],
      200,
      ['Content-Type' => 'application/json; charset=UTF-8'],
      JSON_UNESCAPED_UNICODE
    );
  }
  
}
