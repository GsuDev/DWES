<?php

// Servidor

// Recupera los datos de la uri
$uriParams = explode("/", $_SERVER["REQUEST_URI"]);
// el primero siempre está vacío, lo quitamos
unset($uriParams[0]);

print_r($uriParams);
echo ("<br>");
if ($_SERVER["REQUEST_METHOD"] === "GET") {
  switch ($uriParams[1]) {
    case "iniciar";
      iniciarTablero($uriParams[2], $uriParams[3]);
      break;
    case "factorial";
      
  }
}

function iniciarTablero($boardSize, $numMinas) {
  if ($boardSize < 3 || $numMinas < 1) {
    return "Tablero o numero de minas invalido";
  }

  $board = [];
  
  for ($i = 0; $i < $numMinas; $i++) {
    $board[rand(0,$boardSize)] = "*";
  }
}

