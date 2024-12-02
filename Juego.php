<?php
include_once "Soporte.php";

class Juego extends Soporte {
    
    private $consola;
    private $minNumJugadores;
    private $maxNumJugadores;

    public function __construct(
        string $titulo,
        int $numero,       
        float $precio,
        string $consola,
        int $minNumJugadores,
        int $maxNumJugadores
    ) {
        // Llama correctamente al constructor padre
        parent::__construct($titulo, $numero, $precio);

        $this->consola = $consola;
        $this->minNumJugadores = $minNumJugadores;
        $this->maxNumJugadores = $maxNumJugadores;
    }

    public function muestraJugadoresPosibles() {
        if ($this->minNumJugadores == 1 && $this->maxNumJugadores == 1) {
            echo "Para un jugador\n";
        } elseif ($this->minNumJugadores == $this->maxNumJugadores) {
            echo "Para {$this->minNumJugadores} jugadores\n";
        } else {
            echo "De {$this->minNumJugadores} a {$this->maxNumJugadores} jugadores\n";
        }
    }

    public function muestraResumen(): void {
        parent::muestraResumen(); 
        echo "Consola: {$this->consola}\n";
        echo "Número mínimo de jugadores: {$this->minNumJugadores}\n";
        echo "Número máximo de jugadores: {$this->maxNumJugadores}\n";
    }
}
?>
