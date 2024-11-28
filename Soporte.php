<?php
class Soporte {
    public string $titulo;
    private int $numero;
    protected float $precio;
    private static float $IVA = 0.21;

    public function __construct(string $titulo, int $numero, float $precio) {
        $this->titulo = $titulo;
        $this->numero = $numero;
        $this->precio = $precio;
    }

    // Método para obtener el precio sin IVA
    public function getPrecio(): float {
        if ($this->precio < 0) {
            throw new InvalidArgumentException("El precio no puede ser negativo.");
        }
        return $this->precio;}

    // Método para obtener el precio con IVA
    public function getPrecioConIva(): float {
        return $this->precio * (1 + self::$IVA);
    }

    // Método para obtener el número
    public function getNumero(): int {
        return $this->numero;
    }

    // Método para mostrar un resumen del soporte
    public function muestraResumen(): void {
        echo "Título: {$this->titulo}\n";
        echo "Número: {$this->numero}\n";
        echo "Precio sin IVA: " . number_format($this->getPrecio(), 2) . " €\n";
        echo "Precio con IVA: " . number_format($this->getPrecioConIva(), 2) . " €\n";
    }
}
?>
