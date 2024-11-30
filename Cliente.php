<?php
class Cliente {
    private $nombre;
    private $numero;
    private $soportesAlquilados = [];
    private $numSoportesAlquilados = 0; 
    private $maxAlquilerConcurrente;


    public function __construct($nombre, $numero, $maxAlquilerConcurrente = 3) {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getNumSoportesAlquilados() {
        return $this->numSoportesAlquilados;
    }

    public function muestraResumen() {
        echo "Nombre: {$this->nombre}\n";
        echo "Número de cliente: {$this->numero}\n";
        echo "Total de alquileres realizados: {$this->numSoportesAlquilados}\n";
        echo "Soportes alquilados actualmente: " . count($this->soportesAlquilados) . "\n";
    }

    public function tieneAlquilado(Soporte $s) {
        return in_array($s, $this->soportesAlquilados, true);
    }

    public function alquilar(Soporte $s) {
        if ($this->tieneAlquilado($s)) {
            echo "El soporte ya está alquilado.\n";
            return false;
        }

        if (count($this->soportesAlquilados) >= $this->maxAlquilerConcurrente) {
            echo "No se pueden realizar más alquileres concurrentes.\n";
            return false;
        }

        $this->soportesAlquilados[] = $s;
        $this->numSoportesAlquilados++;
        echo "Soporte alquilado con éxito.\n";
        return true;
    }

    public function devolver($numSoporte) {
        foreach ($this->soportesAlquilados as $index => $soporte) {
            if ($soporte->getNumero() == $numSoporte) {
                unset($this->soportesAlquilados[$index]);
                echo "Soporte devuelto con éxito.\n";
                return true;
            }
        }

        echo "El soporte con número {$numSoporte} no está alquilado.\n";
        return false;
    }

    public function listarAlquileres() {
        echo "Alquileres actuales (". count($this->soportesAlquilados) . "):\n";
        foreach ($this->soportesAlquilados as $soporte) {
            $soporte->muestraResumen(); 
        }
    }
}
?>