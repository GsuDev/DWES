<?php

require_once 'animal.php';

class perro extends Animal{

  public function hacerRuido(){
    return "guau guau";
  }

  public function hacerCaso(){
    if (random_int(1,10)<=9){
      return true;
    } else {
      return false;
    }

  }

  public function sacarPaseo(){
    
  }
}