// EJEMPLO DE LOS APUNTES- USANDO GLOBAL
$iva = true;
$precio = 10;

print "<br />Llamada antes de condicional";
precio_con_iva_condi();   // Da error, pues aquí aún no está definida la función

if ($iva) {
    function precio_con_iva_condi() {
        global $precio;
        $precioiva = $precio * 1.21;
        print "El precio con IVA es " . $precioiva;
    }
}

print "<br />Llamada después de condicional<br>";

precio_con_iva_condi();   // Aquí ya no da error