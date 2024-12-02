<?php
require_once "Soporte.php";
require_once "Cintavideo.php";
require_once "Dvd.php";
require_once "Juego.php";
require_once "Cliente.php";

class Videoclub {
    private string $nombre;
    private array $productos = []; // Array de objetos Soporte
    private int $numProductos = 0;
    private array $socios = []; // Array de objetos Cliente
    private int $numSocios = 0;

    public function __construct(string $nombre) {
        $this->nombre = $nombre;
    }

    // Método privado para incluir un producto en el array de productos
    private function incluirProducto(Soporte $producto): void {
        $this->productos[] = $producto;
        $this->numProductos++;
    }

    // Métodos públicos para incluir diferentes tipos de productos
    public function incluirCintaVideo(string $titulo, float $precio, int $duracion): void {
        $this->incluirProducto(new Cintavideo($titulo, $this->numProductos + 1, $precio, $duracion));
    }

    public function incluirDvd(string $titulo, float $precio, string $idiomas, string $formatoPantalla): void {
        $this->incluirProducto(new Dvd($titulo, $this->numProductos + 1, $precio, $idiomas, $formatoPantalla));
    }

    public function incluirJuego(string $titulo, float $precio, string $consola, int $minJugadores, int $maxJugadores): void {
        $this->incluirProducto(new Juego($titulo, $this->numProductos + 1, $precio, $consola, $minJugadores, $maxJugadores));
    }

    // Métodos para listar productos
    public function listarProductos(): void {
        echo "Productos disponibles en {$this->nombre}:\n";
        foreach ($this->productos as $producto) {
            echo "<br>";
            $producto->muestraResumen();
        }
    }

    // Métodos para incluir y gestionar socios
    public function incluirSocio(string $nombre, int $maxAlquilerConcurrente = 3): void {
        $this->socios[] = new Cliente($nombre, $this->numSocios + 1, $maxAlquilerConcurrente);
        $this->numSocios++;
    }

    public function listarSocios(): void {
        echo "Socios del videoclub {$this->nombre}:\n";
        foreach ($this->socios as $socio) {
            echo "<br>";
            $socio->muestraResumen();
        }
    }

    // Método para alquilar un producto a un socio
    public function alquilaSocioProducto(int $numeroCliente, int $numeroSoporte): void {
        $socio = $this->socios[$numeroCliente - 1] ?? null;
        $soporte = $this->productos[$numeroSoporte - 1] ?? null;

        if ($socio === null) {
            echo "El cliente con número {$numeroCliente} no existe.\n";
            return;
        }

        if ($soporte === null) {
            echo "El soporte con número {$numeroSoporte} no existe.\n";
            return;
        }

        $socio->alquilar($soporte);
    }
}
?>
