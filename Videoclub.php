<?php
class Videoclub {
    private $nombre;
    private $productos = []; 
    private $numProductos = 0;
    private $socios = []; 
    private $numSocios = 0;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    private function incluirProducto(Soporte $producto) {
        $this->productos[] = $producto;
        $this->numProductos++;
    }

    public function incluirCintaVideo($titulo, $precio, $duracion) {
        $producto = new CintaVideo($titulo, $precio, $duracion);
        $this->incluirProducto($producto);
    }

    public function incluirDvd($titulo, $precio, $idiomas, $formatoPantalla) {
        $producto = new Dvd($titulo, $precio, $idiomas, $formatoPantalla);
        $this->incluirProducto($producto);
    }

    public function incluirJuego($titulo, $precio, $consola, $minNumJugadores, $maxNumJugadores) {
        $producto = new Juego($titulo, $precio, $consola, $minNumJugadores, $maxNumJugadores);
        $this->incluirProducto($producto);
    }

    public function incluirSocio($nombre, $maxAlquileresConcurrentes = 3) {
        $socio = new Cliente($nombre, $this->numSocios + 1, $maxAlquileresConcurrentes);
        $this->socios[] = $socio;
        $this->numSocios++;
    }

    public function listarProductos() {
        echo "Productos en el videoclub:\n";
        foreach ($this->productos as $producto) {
            $producto->muestraResumen();
        }
    }

    public function listarSocios() {
        echo "Socios del videoclub:\n";
        foreach ($this->socios as $socio) {
            $socio->muestraResumen();
        }
    }

    public function alquilarSocioProducto($numeroCliente, $numeroSoporte) {
        $cliente = $this->socios[$numeroCliente - 1] ?? null;
        $soporte = null;

        foreach ($this->productos as $producto) {
            if ($producto->getNumero() == $numeroSoporte) {
                $soporte = $producto;
                break;
            }
        }

        if ($cliente && $soporte) {
            $cliente->alquilar($soporte);
        } else {
            echo "Cliente o soporte no encontrado.\n";
        }
    }
}
?>