<?php

require_once __DIR__ . "/../services/database.php";

class GameDao {

  // Función estática que devuelve todas las partidas de un usuario
  public static function getGames(Int $ownerId){

    // Defino la query de la select
    $query = "SELECT * FROM games where ownerId = ?";

    // Abro la conexion con la bbdd
    $conn = Database::connect();

    // Preparo el statement
    $stmt = mysqli_prepare($conn, $query);
    // Enlazo los parámetros
    mysqli_stmt_bind_param($stmt, "i", $ownerId);
    // Ejecuto el statement
    mysqli_stmt_execute($stmt);

    // Guardo los resultados 
    $resultados = mysqli_stmt_get_result($stmt);

    // Paso los resultados a un array asociativo
    $games = [];
    while($gameData = mysqli_fetch_assoc($resultados)){
      $games[] = new Game(
        $gameData['id'],
        $gameData['tries'],
        $gameData['status'],
        $gameData['board'],
        $gameData['ownerId']
      );
    }
    
    // Cierro la conexión
    mysqli_close($conn);

    // Devuelvo el array de partidas
    return $games;
  }


  public static function getGame(Int $id){

    // Defino la query de la select
    $query = "SELECT * FROM games WHERE id = ?";

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

    // Paso los resultados a un array asociativo
    $gameData = mysqli_fetch_assoc($resultados);
    $game = new Game(
      $gameData['id'],
      $gameData['tries'],
      $gameData['status'],
      $gameData['board'],
      $gameData['ownerId']
    );
    // Cierro la conexión
    mysqli_close($conn);
    return $game;
  }

  public static function newGame(Int $ownerId, Int $boardSize){

    // Genero una posición aleatoria para la mosca
    $moscaPosition = rand(0, $boardSize - 1);

    // El tablero se define como "tamaño,posiciónMosca"
    $board = $boardSize.','.$moscaPosition;

    // El numero de intentos se calcula como la mitad del tamaño del tablero más 7
    // redondeado hacia arriba
    $tries = round(($boardSize / 2) + 7);

    // Defino la query de la insert
    $query = "INSERT INTO games (tries, status, board, ownerId) VALUES (?, ?, ?, ?)";

    // Abro la conexion con la bbdd
    $conn = Database::connect();

    // Preparo el statement
    $stmt = mysqli_prepare($conn, $query);
    // Enlazo los parámetros
    mysqli_stmt_bind_param($stmt, "iisi", $tries, 0, $board, $ownerId);
    // Ejecuto el statement
    mysqli_stmt_execute($stmt);

    // Cierro la conexión
    mysqli_close($conn);

    // Guardo el id del nuevo registro
    $newId = mysqli_insert_id($conn);
    $newGame = self::getGame($newId);

    
    // Devuelvo la nueva partida
    return $newGame;
  }


  // Funcion que actualiza los datos de una partida
  public static function updateGame(Int $id, Int $tries, Int $status, String $board){

    // Defino la query de la update
    $query = "UPDATE games SET tries = ?, status = ?, board = ? WHERE id = ?";

    // Abro la conexion con la bbdd
    $conn = Database::connect();

    // Preparo el statement
    $stmt = mysqli_prepare($conn, $query);
    // Enlazo los parámetros
    mysqli_stmt_bind_param($stmt, "iisi", $tries, $status, $board, $id);
    // Ejecuto el statement
    mysqli_stmt_execute($stmt);

    // Cierro la conexión
    mysqli_close($conn);

    return self::getGame($id);
  }
}