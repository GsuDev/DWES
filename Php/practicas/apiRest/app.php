<?php

// Recupera los datos de la URI
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uriParams = explode("/", trim($uri, "/"));

// Obtener método de la solicitud
$method = $_SERVER['REQUEST_METHOD'];

// Obtener datos del cuerpo para POST/PUT
$input = json_decode(file_get_contents('php://input'), true);

// Respuesta por defecto
$response = [
  'status' => 'error',
  'message' => 'Endpoint no encontrado',
  'data' => null
];

http_response_code(404);

if ($method === 'GET') {
  switch ($uriParams[0]) {
    case "bisiesto":
      if (isset($uriParams[1])) {
        $response = esBisiesto($uriParams[1]);
      } else {
        $response['message'] = 'Parámetros insuficientes para calcular bisiesto';
      }
      break;
    case "factorial":
      if (isset($uriParams[1])) {
        $response = factorialsillo($uriParams[1]);
      } else {
        $response['message'] = 'Falta el número para calcular factorial';
      }
      break;
    case "hello":
      $response = [
        'status' => 'success',
        'message' => 'Servidor funcionando correctamente',
        'data' => ['timestamp' => date('Y-m-d H:i:s')]
      ];
      http_response_code(200);
      break;
  }
}

// Enviar respuesta
echo json_encode($response);

// Ejercicio 5
$miyear = 2024;

function esBisiesto($year)
{
  if (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) {
    $result['year'] = $year;
    $result['bisiesto'] = true;
    $result['message'] = 'El año es bisiesto';
    $result['status'] = 'success';
    http_response_code(200);
    return $result;
  } else {
    $result['year'] = $year;
    $result['bisiesto'] = false;
    $result['message'] = 'El año no es bisiesto';
    $result['status'] = 'success';
    http_response_code(200);
    return $result;
  }
}

// Ejercicio 11


$minum = 7;

function factorialsillo($num)
{
  $aux = 1;
  for ($i = 1; $i <= $num; $i++) {
    $aux *= $i;
  }
  return $aux;
}
