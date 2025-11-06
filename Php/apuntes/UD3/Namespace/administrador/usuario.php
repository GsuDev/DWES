<?php


namespace App\Administrador;


class Usuario {
    private $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function tipo() {
        return "Soy un usuario administrador llamado {$this->nombre}";
    }
}
