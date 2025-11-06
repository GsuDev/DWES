<?php

class Game {

  public function __construct(
    public Int $id,
    public Int $tries,
    public Int $status,
    public String $board,
    public Int $ownerId
  ){}
}