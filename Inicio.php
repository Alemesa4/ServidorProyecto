<?php
include_once "Soporte.php";
include_once "CintaVideo.php";
include_once "Juego.php";

$soporte1 = new Soporte("Tenet", 22, 3); 
echo "<strong>" . $soporte1->titulo . "</strong>"; 
echo "<br>Precio: " . $soporte1->getPrecio() . " euros";
echo "<br>Precio IVA incluido: " . $soporte1->getPrecioConIVA() . " 
euros\n";
echo "<br>";
$soporte1->muestraResumen();
echo "<br> <br>";

$miCinta = new CintaVideo("Los cazafantasmas", 23, 3.5, 107); 
echo "<strong>" . $miCinta->titulo . "</strong>"; 
echo "<br>Precio: " . $miCinta->getPrecio() . " euros"; 
echo "<br>Precio IVA incluido: " . $miCinta->getPrecioConIva() . " 
euros";
$miCinta->muestraResumen();


$miJuego = new Juego("The Last of Us Part II", 26, 49.99, "PS4", 1, 1);
echo "<strong>" . $miJuego->titulo . "</strong>";
echo "<br>Precio: " . $miJuego->getPrecio() . " euros";
echo "<br>Precio IVA incluido: " . $miJuego->getPrecioConIva() . "
euros";
$miJuego->muestraResumen();
?>