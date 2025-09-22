<?php

// Configuración de cabeceras para las PU*** tildes
header("Content-Type: application/json; charset=UTF-8");

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

// Enrutamiento de endpoints (si entra modifica la respuesta por defecto)

// GET
if ($method === 'GET') {
  switch ($uriParams[0]) {
    case "users":
      if (count($uriParams) == 1) {
        $response = getUsers();
      } else {
        $response['message'] = 'Parámetros insuficientes para iniciar tablero';
      }
      break;
    case "user":
      if (isset($uriParams[1])) {
        $response = getUser($uriParams[1]);
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

  // POST
} elseif ($method === 'POST') {
  switch ($uriParams[0]) {
    case "users":
      $response = crearUsuario($input);
      break;
    case "login":
      $response = iniSes($input);
      break;
  }
}

// Enviar respuesta
echo json_encode($response);








// Funciones de manejo de usuarios
function getUsers()
{
  // Simulación de datos de usuarios
  $users = [
    ['id' => 1, 'username' => 'user1', 'email' => 'blabla@mail.com', 'password' => '1234'],
    ['id' => 2, 'username' => 'user2', 'email' => 'equisde@xd.xd', 'password' => 'abcd'],
  ];
  http_response_code(200);
  return [
    'status' => 'success',
    'message' => 'Lista de usuarios obtenida',
    'data' => $users
  ];
}

function getUser($id)
{
  // Simulación de datos de usuario
  $user = ['id' => $id, 'username' => 'username' . $id, 'email' => 'user' . $id . '@mail.com', 'password' => 'SECRET'];
  http_response_code(200);
  return [
    'status' => 'success',
    'message' => 'Usuario obtenido',
    'data' => $user
  ];
}

function crearUsuario($data) {
  if (isset($data['username']) && isset($data['email']) && isset($data['password'])) {
    // Aquí se insertaría el usuario en la base de datos
    http_response_code(201);
    return [
      'status' => 'success',
      'message' => 'Usuario creado exitosamente',
      'data' => ['id' => rand(3, 1000), 'username' => $data['username'], 'email' => $data['email']]
    ];
  } else {
    http_response_code(400);
    return [
      'status' => 'error',
      'message' => 'Faltan datos para crear el usuario',
      'data' => null
    ];
  }
}

function iniSes($data) {
  // Simulación de verificación de usuario
  $validUsers = [
    ['username' => 'user1', 'password' => 'pass1'],
    ['username' => 'user2', 'password' => 'pass2'],
  ];

  foreach ($validUsers as $user) {
    if ($data['username'] === $user['username'] && $data['password'] === $user['password']) {
      http_response_code(200);
      return [
        'status' => 'success',
        'message' => 'Inicio de sesión exitoso',
        'data' => ['token' => bin2hex(random_bytes(16))]
      ];
    }
  }

  http_response_code(401);
  return [
    'status' => 'error',
    'message' => 'Credenciales inválidas',
    'data' => null
  ];
}
