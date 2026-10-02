<?php
function PrecioConIva (float $precio , float $iva ): float {
    // $precio → precio base
    // $iva    → porcentaje de IVA (por defecto 21%)
    $precioFinal = $precio + ($precio * $iva / 100);
    return round($precioFinal, 2); // Redondeamos a 2 decimales
}

function precioConIva2 (float $precio , float $iva=21): floar {
    $precioFinal = $precio + ($precio - ($iva/100))
}

// Ejemplo de uso
$precioBase = 100;
echo "Precio base: $precioBase €<br>";
echo "Precio con IVA (21%): " . precioConIVA($precioBase, 21) . " €<br>";
echo "Precio con IVA (10%): " . precioConIVA($precioBase, 10) . " €<br>";

?>