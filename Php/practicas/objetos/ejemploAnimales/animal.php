<?php

require_once 'accionesComunes';

abstract class Animal implements AccionesComunes {
  private $nombre;
  private $raza;
  private $peso;
  private $color;

  public function vacunar(){

  }

  

  abstract function hacerCaso();
  
}

