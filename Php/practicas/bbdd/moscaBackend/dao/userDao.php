<?php

require_once __DIR__ . "/../services/database.php";

class UserDao {

  

  // Función estática que devuelve todos los usuarios
  public static function getUsers(){
    // Defino la query de la select
    $query = "SELECT * FROM users";
    // Abro la conexion con la bbdd
    $conn = Database::connect();
    // Preparo el statement
    $stmt = mysqli_prepare($conn, $query);
    // Ejecuto el statement
    mysqli_stmt_execute($stmt);
    // Guardo los resultados 
    $resultados = mysqli_stmt_get_result($stmt);

    $usuarios = [];
    while($userData = mysqli_fetch_assoc($resultados)){
      $usuarios[] = new User(
        $userData['id'],
        $userData['name'],
        $userData['password'],
        $userData['email'],
        $userData['isAdmin']
      );
    }
    
    // Cierro la conexión
    mysqli_close($conn);
    return $usuarios;
  }

  public static function getUser($id){

    // Defino la query de la select
    $query = "SELECT * FROM users WHERE id = ?";

    // Abro la conexion con la bbdd
    $conn = Database::connect();


    // Preparo el statement
    $stmt = mysqli_prepare($conn, $query);
    // Enlazo los parámetros
    mysqli_stmt_bind_param($stmt, "i", $id);
    // Ejecuto el statement
    mysqli_stmt_execute($stmt);

    // Guardo los resultados 
    $resultados = mysqli_stmt_get_result($stmt);

    // Cierro la conexión
    mysqli_close($conn);

    // Paso los resultados a un array asociativo
    $userData = mysqli_fetch_assoc($resultados);

    // Creo el objeto user
    $user = new User(
      $userData['id'],
      $userData['name'],
      $userData['password'],
      $userData['email'],
      $userData['isAdmin']
    );

    

    return $user;
  }
  
  public static function createUser($name, $password, $email, $isAdmin){

    // Defino la query de la insert
    $query = "INSERT INTO users (name, password, email, isAdmin) VALUES (?, ?, ?, ?)";

    // Abro la conexion con la bbdd
    $conn = Database::connect();

    // Preparo el statement
    $stmt = mysqli_prepare($conn, $query);

    // Enlazo los parámetros
    mysqli_stmt_bind_param($stmt, "sssi", $name, $password, $email, $isAdmin);

    // Ejecuto el statement
    if (!mysqli_stmt_execute($stmt)) {
      return null;
    }
    mysqli_stmt_execute($stmt);

    // Recupero el id autoincremental generado
    $id = mysqli_insert_id($conn);

    // Cierro la conexión
    mysqli_close($conn);

    // Devuelvo el usuario recien creado
    $newUser = self::getUser($id);
    return $newUser;
  }

  public static function updateUser($user){
    $query = "UPDATE users SET name = ?, password = ?, email = ?, isAdmin = ? WHERE id = ?";

    // Abro la conexion con la bbdd
    $conn = Database::connect();

    // Preparo el statement
    $stmt = mysqli_prepare($conn, $query);
    // Enlazo los parámetros
    mysqli_stmt_bind_param($stmt, "sssii", $user->name, $user->password, $user->email, $user->isAdmin, $user->id);
    // Ejecuto el statement y verifico que se ha ejecutado correctamente
    if (mysqli_stmt_execute($stmt)) {
      $updatedUser = self::getUser($user->id);
    } else {
      $updatedUser = null;
    }
    // Cierro la conexión
    mysqli_close($conn);

    // Devuelvo el usuario ya actualizado
    return $updatedUser;
    
  }

  public static function deleteUser($id){
    $query = "DELETE FROM users WHERE id = ?";

    // Abro la conexion con la bbdd
    $conn = Database::connect();

    // Preparo el statement
    $stmt = mysqli_prepare($conn, $query);
    // Enlazo los parámetros
    mysqli_stmt_bind_param($stmt, "i", $id);
    // Ejecuto el statement y verifico que se ha ejecutado correctamente
    $success = mysqli_stmt_execute($stmt);
    
    // Cierro la conexión
    mysqli_close($conn);

    return $success;
  }

  // Funcion login recibe un username y password y devuelve el usuario si las credenciales son correctas
  public static function login($name, $password){
    // Defino la query de la select
    $query = "SELECT * FROM users WHERE name = ? AND password = ?";
    // Abro la conexion con la bbdd
    $conn = Database::connect();
    // Preparo el statement
    $stmt = mysqli_prepare($conn, $query);
    // Enlazo los parámetros
    mysqli_stmt_bind_param($stmt, "ss", $name, $password);
    // Ejecuto el statement
    mysqli_stmt_execute($stmt);
    // Guardo los resultados 
    $resultados = mysqli_stmt_get_result($stmt);
    // Cierro la conexión
    mysqli_close($conn);
    // Paso los resultados a un array asociativo
    $userData = mysqli_fetch_assoc($resultados);
    if($userData){
      $user = new User(
        $userData['id'],
        $userData['name'],
        $userData['password'],
        $userData['email'],
        $userData['isAdmin']
      );
    } else {
      $user = null;
    }
    return $user;
  }
  
}