<?php

require_once __DIR__ . "/../dao/userDao.php";

class PlayerController {

  // Función que devuelve todos los usuarios
  public static function getUsers(){
    return UserDao::getUsers();
  }
  
  // Función que devuelve un usuario por su id
  public static function getUser($data){
    $id = $data['id'];
    return UserDao::getUser($id);
  }

  // Función que recibe un array asociativo con los datos de un usuario y lo crea en la bbdd
  public static function createUser($userData){
    $name = $userData['name'];
    $password = $userData['password'];
    $email = $userData['email'];
    $isAdmin = $userData['isAdmin'] ?? 0; // Si no viene isAdmin, lo pongo a 0  
    return UserDao::createUser($name, $password, $email, $isAdmin);
  }

  // Función que recibe un array asociativo con los datos de un usuario y lo actualiza en la bbdd
  public static function updateUser($userData){
    $id = $userData['id'];
    $name = $userData['name'];
    $password = $userData['password'];
    $email = $userData['email'];
    $isAdmin = $userData['isAdmin'] ?? 0; // Si no viene isAdmin, lo pongo a 0  
    return UserDao::updateUser($id, $name, $password, $email, $isAdmin);
  }
  // Función que recibe un id y borra el usuario de la bbdd
  public static function deleteUser($data){
    $id = $data['id'];
    return UserDao::deleteUser($id);  
  }
}