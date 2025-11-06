<?php
// index.php

require './administrador/usuario.php';
require './jugador/usuario.php';
require './auxiliar/helpers.php';

//Alias para usar clases con nombres iguales
use App\Administrador\Usuario as UsuarioCliente;
use App\Jugador\Usuario as UsuarioAdmin;

//Instanciamos las clases
$cliente = new UsuarioCliente("Juan");
$admin = new UsuarioAdmin("Marta");

echo $cliente->tipo();
echo "<br>";
echo $admin->tipo();
echo "<br>";

//Usamos la función y la constante de otro namespace
echo \App\Auxiliar\saludar("Alfredo");
echo "<br>";
echo "Versión: " . \App\Auxiliar\VERSION;
echo "<br>";
