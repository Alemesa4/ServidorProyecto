<?php	
require_once 'Soporte.php';

class Dvd extends Soporte {
    public string $idioma;
    protected string $formatpantalla;
    public function __construct(string $titulo, int $numero, float $precio, string $idioma, string $formatpantalla) {
        parent::__construct($titulo, $numero, $precio);
        $this->idioma = $idioma;
        $this->formatpantalla = $formatpantalla;
    }

    public function muestraResumen(): void {
        parent::muestraResumen();
        echo "Idioma: {$this->idioma}\n";
        echo "Formato de pantalla: {$this->formatpantalla}\n";
    }
}
