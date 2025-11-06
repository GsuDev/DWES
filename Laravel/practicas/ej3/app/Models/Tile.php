<?php

namespace App\Models;

class Tile
{

  public function __construct(
    public int $id,
    public int $boardId,
    public int $position,
    public int | null $pairPosition,
    public int $value
  ) {}
}
