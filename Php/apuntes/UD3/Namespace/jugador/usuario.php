<?php

namespace App\Jugador;



class Usuario {
    private $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function tipo() {
        return "Soy un usuario jugador llamado {$this->nombre}";
    }
}
