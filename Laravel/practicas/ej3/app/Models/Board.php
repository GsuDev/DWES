<?php

namespace App\Models;

class Board
{

  public function __construct(
    public int $id,
    public int $length,
    public int $userId
  ) {}
}
