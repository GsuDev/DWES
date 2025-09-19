<?php


class Nave {
  private $nombre;
  private $tipoCarga;
  private $combustible;


  public function __construct($no, $tc, $co)
  {
    $this->nombre = $no;
    $this->tipoCarga = $tc;
    $this->combustible = $co;
  }
  
  public function __toString()
  {
    return "Nave: " . $this->nombre . " Tipo de carga: " . $this->tipoCarga . " Combustible: " . $this->combustible;
  }

  

  public function despegar() {
    return "La nave " . $this->nombre . " está despegando.";
  }





  /**
   * Get the value of nombre
   */ 
  public function getNombre()
  {
    return $this->nombre;
  }

  /**
   * Set the value of nombre
   *
   * @return  self
   */ 
  public function setNombre($nombre)
  {
    $this->nombre = $nombre;

    return $this;
  }

  /**
   * Get the value of tipoCarga
   */ 
  public function getTipoCarga()
  {
    return $this->tipoCarga;
  }

  /**
   * Set the value of tipoCarga
   *
   * @return  self
   */ 
  public function setTipoCarga($tipoCarga)
  {
    $this->tipoCarga = $tipoCarga;

    return $this;
  }

  /**
   * Get the value of combustible
   */ 
  public function getCombustible()
  {
    return $this->combustible;
  }

  /**
   * Set the value of combustible
   *
   * @return  self
   */ 
  public function setCombustible($combustible)
  {
    $this->combustible = $combustible;

    return $this;
  }
}