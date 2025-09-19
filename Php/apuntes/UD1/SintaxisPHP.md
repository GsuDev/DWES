# Sintaxis Básica de PHP

## Conceptos básicos

### Apertura de bloques de codigo

En PHP hay que empezar los documentos `.php` con la etiqueta `<?php` la cual no requiere cerrarse.

### Variables

No hay tipado y las variables se definen con `$`. Por ejemplo `$variable`.

### Arrays

Se usa `[]` entonces para crearlo `$miArray = []` y para añadir cosas al final del:
array `$miArray[] = 'loquesea'`.

Son similares a los objetos de JS.

Se puede meter clave valor con:
![alt text](image-2.png)

Borrar elementos con:
![alt text](image.png)

### Strings

Se concatena con el punto:
![alt text](image-3.png)

## Creando nuestro primer servidor

### Manejo de la URL

Sacar datos del server:

![alt text](image-4.png)

Su resultado es:

![alt text](image-5.png)

Entonces de ahí podemos sacar la url y el metodo HTTP de la solicitud:
Por ejemplo de esta forma podemos mostrar esos datos en el navegador:

![alt text](image-6.png)

Para encaminar esto a la creación de unos endpoints debemos poder manejar estos datos:

![alt text](image-7.png)

La función `explode("separador", STRING)` recibe un string del que según un separador crea un vector con los elementos separados por el separador.

Tenemos todos los parámetros de la url, ahora hay que filtrarlos para ejecutar el codigo que corresponda:

![alt text](image-8.png)

Esto es la forma mas simple de endpoint en php.

## Plantilla servidor con endpoints

```php
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

// Enrutamiento de endpoints 

// GET
if ($method === 'GET') {
    switch ($uriParams[0]) {
        case "PRIMER ENDPOINT":
            if (isset($uriParams[1]) && isset($uriParams[2])) {
                $response = iniciarTablero($uriParams[1], $uriParams[2]);
            } else {
                $response['message'] = 'Parámetros insuficientes para iniciar tablero';
            }
            break;
        case "SEGUNDO ENDPOINT":
            if (isset($uriParams[1])) {
                $response = calcularFactorial($uriParams[1]);
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
        case "usuario":
            $response = crearUsuario($input);
            break;
    }
// PUT
} elseif ($method === 'PUT') {
    switch ($uriParams[0]) {
        case "usuario":
            if (isset($uriParams[1])) {
                $response = actualizarUsuario($uriParams[1], $input);
            }
            break;
    }

// DELETE
} elseif ($method === 'DELETE') {
    switch ($uriParams[0]) {
        case "usuario":
            if (isset($uriParams[1])) {
                $response = eliminarUsuario($uriParams[1]);
            }
            break;
    }
}

// Enviar respuesta
echo json_encode($response);
```
