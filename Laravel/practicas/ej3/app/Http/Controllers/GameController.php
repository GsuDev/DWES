<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Board;
use App\Models\Tile;

class GameController extends Controller
{

  // Función para crear el tablero y sus casillas
  public static function iniciarPartida($userId, $length)
  {

    // Crea un nuevo tablero con la longitud indicada para el usuario indicado y recoge la id generada
    $boardId = DB::table('board')->insertGetId([
      'length' => $length,
      'userId' => $userId,
    ]);

    // Array de indices para distribuir las parejas
    $positionArray = range(0, $length - 1);

    // Contador para los valores de cada casilla
    $counter = 0;

    // Comprueba si el tamaño del tablero es impar
    if (($length % 2) !== 0) {
      // Quita la ultima posición para no poner el miembro de una pareja incompleta ahí
      array_pop($positionArray);

      // Inserta una casilla sin pareja en la última posicion
      DB::table('Pair')->insertGetId([
        'boardId' => $boardId,
        'position' => $length - 1,
        'pairPosition' => null,
        'value' => $counter++,
        'isDone' => true
      ]);
    }

    // Barajea aleatoriamente el array de indices
    shuffle($positionArray);

    // Bucle para poner cada valor en dos casillas diferentes con posiciones aleatorias
    while (count($positionArray)) {
      $pos = array_pop($positionArray);
      $pairPos = array_pop($positionArray);
      DB::table('Pair')->insertGetId([
        'boardId' => $boardId,
        'position' => $pos,
        'pairPosition' => $pairPos,
        'value' => $counter++,
        'isDone' => false
      ]);
    }


    $board = array_fill(0, $length, '*');
    return Response()->json(
      [
        'UserId' => $userId,
        'BoardId' => $boardId,
        'Board' => $board
      ]
    );
  }

  public static function destaparCasillas($userId, $boardId, $pos1, $pos2)
  {
    $tile = DB::table('Pair')
      ->where('boardId', $boardId)
      ->where(function ($query) use ($pos1) {
        $query->where('position', $pos1)
          ->orWhere('pairPosition', $pos1);
      })
      ->first();

    if ($tile && ($tile->position === $pos2 || $tile->pairPosition === $pos2)) {
      $res = "Son pareja ✅";
      DB::table('Pair')
        ->where('id', $tile->id)
        ->update(['isDone' => true]);
    } else {
      $res = "No son pareja ❌";
    }

    //Recupera la longitud del tablero
    $length = DB::table('Board')
      ->where('id', $boardId)
      ->value('length');

    // Lo rellena con asteriscos
    $board = array_fill(0, $length, '*');
    
    // "Destapa" las casillas si existen
    if($tile && ($pos2 > 0 && $pos2 < $length)){
      $board[$tile->position] = $tile->value;
      $board[$tile->pairPosition] = $tile->value;
    }
    

    return Response()->json(
      [
        "UserId" => $userId,
        "BoardId" => $boardId,
        "is" => $res,
        "Board" => $board
      ]
    , 200,[], );
  }

  public static function estadoPartida($userId, $boardId) {}
}
