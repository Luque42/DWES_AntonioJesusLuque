<?php
// ============================================================
// PROGRAMA SIMPLE: FUNCIONES BÁSICAS CON ARRAYS EN PHP
// Salida en HTML con títulos (h1, h2) para que se vea claro.
// Ejecutar con el servidor de PHP:  php -S localhost:8000
// y abrir en el navegador: http://localhost:8000/arrays.php
// ============================================================

// Creamos un array numérico inicial con 4 elementos (índices 0 a 3)
$array = ["manzana", "pera", "naranja", "uva"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Funciones de arrays en PHP</title>
    <style>
        /* Estilos sencillos para que se lea mejor */
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 30px auto; padding: 0 15px; color: #222; }
        h1 { border-bottom: 3px solid #4f5b93; padding-bottom: 8px; }
        h2 { color: #4f5b93; margin-top: 35px; }
        h3 { margin-bottom: 4px; }
        code { background: #eee; padding: 2px 6px; border-radius: 4px; }
        .resultado { background: #eef7ee; border-left: 4px solid #3a9b3a; padding: 8px 12px; margin: 6px 0; }
    </style>
</head>
<body>

<h1>Funciones de arrays en PHP</h1>

<?php
// Mostramos el array inicial para tener una referencia
echo "<h3>Array inicial</h3>";
echo "<div class='resultado'>" . implode(", ", $array) . "</div>";
?>


<?php
// ------------------------------------------------------------
// 1. AÑADIR ELEMENTO
// ------------------------------------------------------------
// Echo explicativo de la acción
echo "<h2>1. Añadir elemento</h2>";
echo "<p>Función: <code>\$array[] = \"nuevo\";</code> → agrega un elemento al final.</p>";
// Añadimos "nuevo" al final del array
$array[] = "nuevo";
// Mostramos el resultado
echo "<div class='resultado'>Resultado: " . implode(", ", $array) . "</div>";


// ------------------------------------------------------------
// 2. MODIFICAR ELEMENTO
// ------------------------------------------------------------
// Echo explicativo de la acción
echo "<h2>2. Modificar elemento</h2>";
echo "<p>Función: <code>\$array[2] = \"modificado\";</code> → cambia el valor en la posición indicada.</p>";
// Cambiamos el valor de la posición 2 ("naranja") por "modificado"
$array[2] = "modificado";
// Mostramos el resultado
echo "<div class='resultado'>Resultado: " . implode(", ", $array) . "</div>";


// ------------------------------------------------------------
// 3. ELIMINAR ELEMENTO
// ------------------------------------------------------------
// Echo explicativo de la acción
echo "<h2>3. Eliminar elemento</h2>";
echo "<p>Función: <code>unset(\$array[2]);</code> → elimina el valor y deja un hueco en los índices.</p>";
// Eliminamos el elemento de la posición 2
unset($array[2]);
// Mostramos los índices que quedan: se verá que falta el 2
echo "<div class='resultado'>Índices que quedan: " . implode(", ", array_keys($array)) . "</div>";
echo "<div class='resultado'>Resultado: " . implode(", ", $array) . "</div>";


// ------------------------------------------------------------
// 4. REINDEXAR ARRAY NUMÉRICO
// ------------------------------------------------------------
// Echo explicativo de la acción
echo "<h2>4. Reindexar array numérico</h2>";
echo "<p>Función: <code>\$array = array_values(\$array);</code> → reorganiza las claves en orden consecutivo desde 0.</p>";
// Reorganizamos las claves para que vuelvan a ser 0, 1, 2, 3...
$array = array_values($array);
// Mostramos los nuevos índices: ya no hay hueco
echo "<div class='resultado'>Índices nuevos: " . implode(", ", array_keys($array)) . "</div>";
echo "<div class='resultado'>Resultado: " . implode(", ", $array) . "</div>";


// ------------------------------------------------------------
// 5. COMPROBAR SI ES ARRAY
// ------------------------------------------------------------
// Echo explicativo de la acción
echo "<h2>5. Comprobar si es array</h2>";
echo "<p>Función: <code>is_array(\$array)</code> → devuelve true o false.</p>";
// is_array devuelve un booleano; lo convertimos a texto para poder verlo
echo "<div class='resultado'>Resultado: " . (is_array($array) ? "true" : "false") . "</div>";


// ------------------------------------------------------------
// 6. CONTAR ELEMENTOS
// ------------------------------------------------------------
// Echo explicativo de la acción
echo "<h2>6. Contar elementos</h2>";
echo "<p>Función: <code>count(\$array)</code> → devuelve el número de elementos.</p>";
// count devuelve un número entero
echo "<div class='resultado'>Resultado: " . count($array) . "</div>";


// ------------------------------------------------------------
// 7. BUSCAR VALOR
// ------------------------------------------------------------
// Echo explicativo de la acción
echo "<h2>7. Buscar valor</h2>";
echo "<p>Función: <code>in_array(\"valor\", \$array)</code> → true si existe, false si no.</p>";
// Buscamos un valor que SÍ existe
echo "<div class='resultado'>Buscar \"pera\": " . (in_array("pera", $array) ? "true" : "false") . "</div>";
// Buscamos un valor que NO existe
echo "<div class='resultado'>Buscar \"kiwi\": " . (in_array("kiwi", $array) ? "true" : "false") . "</div>";


// ------------------------------------------------------------
// 8. BUSCAR VALOR Y OBTENER CLAVE
// ------------------------------------------------------------
// Echo explicativo de la acción
echo "<h2>8. Buscar valor y obtener clave</h2>";
echo "<p>Función: <code>array_search(\"valor\", \$array)</code> → devuelve la clave o false.</p>";
// Guardamos el resultado de la búsqueda de un valor que SÍ existe
$clave = array_search("uva", $array);
// Usamos !== false porque la clave podría ser 0, que PHP también interpreta como "falso"
echo "<div class='resultado'>Buscar \"uva\": " . ($clave !== false ? "clave $clave" : "false") . "</div>";
// Buscamos un valor que NO existe
$clave = array_search("kiwi", $array);
echo "<div class='resultado'>Buscar \"kiwi\": " . ($clave !== false ? "clave $clave" : "false") . "</div>";


// ------------------------------------------------------------
// 9. BUSCAR CLAVE
// ------------------------------------------------------------
// Echo explicativo de la acción
echo "<h2>9. Buscar clave</h2>";
echo "<p>Función: <code>array_key_exists(\"clave\", \$array)</code> → true si la clave existe, false si no.</p>";
// Comprobamos una clave que SÍ existe (la 1)
echo "<div class='resultado'>Clave 1: " . (array_key_exists(1, $array) ? "true" : "false") . "</div>";
// Comprobamos una clave que NO existe (la 10)
echo "<div class='resultado'>Clave 10: " . (array_key_exists(10, $array) ? "true" : "false") . "</div>";
?>

</body>
</html>