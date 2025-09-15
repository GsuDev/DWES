<?php

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
  for($i = 0; $i<=$num; $i++){
    $aux *= $i;
  }
  return $aux;
}

// Ejercicio 15

$midividendo = 6;
$midivisor = 3;

function divimanual($midividendo, $midivisor){
  
}

