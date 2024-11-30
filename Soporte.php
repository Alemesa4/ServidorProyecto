<?php
require_once "Resumbible.php";
abstract class Soporte implements Resumbible {
    public string $titulo;
    private int $numero;
    protected float $precio;
    private static float $IVA = 0.21;

    public function __construct(string $titulo, int $numero, float $precio) {
        $this->titulo = $titulo;
        $this->numero = $numero;
        $this->precio = $precio;
    }

    public function getPrecio(): float {
        if ($this->precio < 0) {
            throw new InvalidArgumentException("El precio no puede ser negativo.");
        }
        return $this->precio;}

    public function getPrecioConIva(): float {
        return $this->precio * (1 + self::$IVA);
    }

    public function getNumero(): int {
        return $this->numero;
    }

    public function muestraResumen(): void {
        echo "Título: {$this->titulo}\n";
        echo "Número: {$this->numero}\n";
        echo "Precio sin IVA: " . number_format($this->getPrecio(), 2) . " €\n";
        echo "Precio con IVA: " . number_format($this->getPrecioConIva(), 2) . " €\n";
    }
}
?>
