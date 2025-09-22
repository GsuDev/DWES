<?php

// Servidor

// Recupera los datos de la uri
$uriParams = explode("/", $_SERVER["REQUEST_URI"]);
// el primero siempre está vacío, lo quitamos
unset($uriParams[0]);

print_r($uriParams);
echo("<br>");
if($_SERVER["REQUEST_METHOD"]==="GET"){
  switch ($uriParams[1]) {
    case "bisiesto";
      echo "comprobando bisiesto " . $uriParams[2] . "<br>";
      if (esBisiesto($uriParams[2])){
        echo "true";
      } else {
        echo "false";
      };
    break;
    case "factorial";
      $res = factorialsillo($uriParams[2]);
      echo $res;
    break;
  }
}

// Ejercicio 5
$miyear = 2024;

function esBisiesto($year)
{
  if (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) {
    return true;
  } else {
    return false;
  }
}

// Ejercicio 11


$minum = 7;

function factorialsillo($num)
{
  $aux = 1;
  for($i = 1; $i<=$num; $i++){
    $aux *= $i;
  }
  return $aux;
}

// Ejercicio 15

$midividendo = 6;
$midivisor = 3;

function divimanual($midividendo, $midivisor){
  
}

