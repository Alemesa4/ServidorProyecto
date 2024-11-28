<?php
require_once 'Soporte.php';

class Cintavideo extends Soporte {
    protected int $duracion;

    public function __construct(string $titulo, int $numero, float $precio, int $duracion) {
        parent::__construct($titulo, $numero, $precio);
        $this->duracion = $duracion;
    }

    public function muestraResumen(): void{
        parent::muestraResumen();
        echo  "Duración: {$this->duracion} minutos\n";
    }
}