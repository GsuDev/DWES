<?php

require_once 'animal.php';

class gato extends Animal{

  public function hacerRuido(){
    return "miau miau";
  }

  public function hacerCaso(){
    if (random_int(1,100)<=5){
      return true;
    } else {
      return false;
    }
  }

  public function toserBolaPelo(){
    
  }
}