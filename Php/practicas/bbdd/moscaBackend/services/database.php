<?php

require_once __DIR__ . "/../config/config.php";
class Database
{
  public static function connect()
  {
    $conexion = mysqli_connect(Config::$DB_URL, Config::$DB_USER, Config::$DB_PASS, Config::$DB_NAME);
    if (!$conexion) {
      print "Fallo al conectar a MySQL: " . mysqli_connect_error();
    }
    return $conexion;
  }
}