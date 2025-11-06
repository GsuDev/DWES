<?php

require_once '../dao/gameDao.php';

class GameController {
  

  public static function newGame($data) {
    return GameDao::newGame($data['ownerId'], $data['board']);
  }

  public function getGameById($data) {
    return gameDao::getGame($data['id']);
  }

  public function getGamesOwnedBy($data) {
    return gameDao::getGames($data['ownerId']);
  }

  public function darManotazo($data) {
    $game = gameDao::getGame($data['gameId']);


    if (!$game) {
      throw new Exception("Game not found");
    }

    if ($game['status'] !== '0') {
      throw new Exception("Game is not active");
    }
    if ($game['tries'] <= 0) {
      throw new Exception("No tries left");
    }
    

    // Lógica para procesar el manotazo

    // Recupera el tablero
    $board = explode(',', $game['board']); 

    if ($data['position'] < 0 || $data['position'] > (int)$board[0] - 1) {
      throw new Exception("Invalid position");
    }


    $moscaPosition = (int)$board[1];
    $tries = $game['tries'] - 1;

    
    // Aqui me quedé fernando, que he estado malito
    if ($data['position'] == $moscaPosition) {
      // La mosca ha sido atrapada
      $status = '1'; // Ganado
    } else if ($data['position'] == $moscaPosition-1 || $data['position'] == $moscaPosition+1) {
      // Ha estado cerca
      
    } else {
      // Ha fallado
    
    }

  }
}