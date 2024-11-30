<?php
 include "Soporte.php";

 private $consola;
 private $minNumJugadores;
 private $maxNumJugadores;

 public function __construct($titulo, $precio, $consola, $minNumJugadores, $maxNumJugadores) {
     parent::__construct($titulo, $precio); 
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

 public function muestraResumen() {
     parent::muestraResumen(); 
     echo "Consola: {$this->consola}\n";
     echo "Número mínimo de jugadores: {$this->minNumJugadores}\n";
     echo "Número máximo de jugadores: {$this->maxNumJugadores}\n";
 }

 ?>