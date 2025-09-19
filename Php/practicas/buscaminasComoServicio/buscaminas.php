<?php
// Clase que representa una celda
class Celda {
    public $mina = false;    // ¿tiene mina?
    public $numero = 0;      // minas vecinas (en este caso solo izquierda y derecha)
    public $revelada = false;
}

// Clase tablero lineal (vector)
class Tablero {
    private $longitud;
    private $celdas = [];

    public function __construct($longitud) {
        $this->longitud = $longitud;

        // Crear celdas
        for ($i = 0; $i < $longitud; $i++) {
            $this->celdas[$i] = new Celda();
        }

        // Colocar la única mina en una posición aleatoria
        $posMina = rand(0, $longitud - 1);
        $this->celdas[$posMina]->mina = true;

        // Calcular números vecinos (izquierda y derecha)
        for ($i = 0; $i < $longitud; $i++) {
            if ($this->celdas[$i]->mina) continue;
            $contador = 0;
            if ($i > 0 && $this->celdas[$i - 1]->mina) $contador++;
            if ($i < $longitud - 1 && $this->celdas[$i + 1]->mina) $contador++;
            $this->celdas[$i]->numero = $contador;
        }
    }

    // Revelar una posición
    public function revelar($pos) {
        if ($pos < 0 || $pos >= $this->longitud) return false;
        $celda = $this->celdas[$pos];
        $celda->revelada = true;
        return $celda->mina;
    }

    // Mostrar tablero
    public function mostrar($mostrarTodo = false) {
        for ($i = 0; $i < $this->longitud; $i++) {
            $celda = $this->celdas[$i];
            if ($mostrarTodo || $celda->revelada) {
                if ($celda->mina) {
                    echo "* ";
                } else {
                    echo $celda->numero . " ";
                }
            } else {
                echo "# ";
            }
        }
        echo PHP_EOL;
    }
}

