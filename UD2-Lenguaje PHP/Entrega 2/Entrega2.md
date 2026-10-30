# UD2 - Entrega 2

### Programa 11

![1791537374039](image/Entrega2_completa/1791537374039.png)

### Programa 12

![1791537385141](image/Entrega2_completa/1791537385141.png)

### Programa 13

![1791537406438](image/Entrega2_completa/1791537406438.png)

Match: compara con varias alternativas como un switch de java

## Bucles

### Programa 14

![1791537445682](image/Entrega2_completa/1791537445682.png)

### Foreach

![1791537476209](image/Entrega2_completa/1791537476209.png)

## Funciones

Las funciones simples sí pueden ser llamadas antes de definir la función, pero las condicionales no.

```php
<?php
// Función simple sin argumentos
function precioConIVA(): float {
    $precio = 399;  // definido dentro de la función
    $iva = 21;      // definido dentro de la función
    $precioFinal = $precio + ($precio * $iva / 100);
    return round($precioFinal, 2);
}

// Ejemplo de uso
echo "Precio con IVA: " . precioConIVA() . " €<br>"; // Llamada a la función y muestra del resultado
?>
```

### Funciones condicionales

### Programa 16

```php
print "<h2>Funciones Condicionales</h2>";
// Función con condicional
$condicionalFuncion = true;
$precio = 10;

print("<br />Llamada antes de condicional: No puede hacerse<br>");   
if ($condicionalFuncion) {
    function precio_con_iva_condi() {
        global $precio;
        $precioiva = $precio * 1.21;
        print "El precio con IVA es " . $precioiva;
    }
}

print "<br />Llamada después de condicional<br>";

precio_con_iva_condi();   // Aquí ya no da error
?>
```

## Argumentos

* Siempre es mejor utilizar **argumentos o parámetros** al hacer la llamada.
* Además, en lugar de mostrar el resultado en pantalla o guardar el resultado en una variable global, las funciones pueden devolver un valor usando la sentencia **return**.
* Cuando en una función se encuentra una sentencia **return**, termina su procesamiento y **devuelve** el valor que se indica.

### Programa 17

La opción 2 muestra la forma de hacer un **argumento por defecto**.

* Puede haber valores por defecto definidos para varios argumentos, pero en la lista de argumentos de la función todos ellos deben estar a la **derecha** de cualquier otro argumento sin valor por defecto.

```php
<?php
function precioConIVA(float $precio, float $iva): float { // Función que calcula el precio con IVA con argumentos
//Opcion 2: function precioConIVA(float $precio, float $iva = 21): float {  
    // $precio → precio base
    // $iva    → porcentaje de IVA (por defecto 21%)
    $precioFinal = $precio + ($precio * $iva / 100);
    return round($precioFinal, 2); // Redondeamos a 2 decimales
}

// Ejemplo de uso
$precioBase = 1725.50;
echo "Precio base: $precioBase €<br>";
echo "Precio con IVA (21%): " . precioConIVA($precioBase, 21) . " €<br>";
//Opcion 2: echo "Precio con IVA (21%): " . precioConIVA($precioBase) . " €<br>";
echo "Precio con IVA (10%): " . precioConIVA($precioBase, 10) . " €<br>";
?>
```

### Argumentos por referencia

1. Si quieres que esto ocurra debes definir el parámetro para que su valor se pase **por referencia**, añadiendo el símbolo **&** antes de su nombre.
2. NO PONEMOS RETURN

```php
<?php
    print "<br/><br/>  ARGUMENTOS POR valor y por referencia <br  /> ";//ARGUMENTOS POR DEFECTO
    function precio_iva_referencia (&$precio /*le pasas su direcion de memoria 100325*/, $iva=0.15) {
        $precio *= (1 + $iva); 
    }

    $precio = 20;  //imagina que su MEMORY ADDRESS vale 100325
    print "<br/><br/>1- ANTES de llamar a la función:  El precio con IVA es ".$precio ;  //20

    precio_iva_referencia($precio);

    print "<br/>2- DESPUES de llamar a la función:  El precio con IVA es ". $precio ;  //23
    print "<br/><b>3- Anota en tus apuntes qué RETURN has usado</b>";
    print "<br/><b>4- No hemos usado ningun RETURN</b>"
?>
```

### Argumentos variables

* Existen **dos enfoques**: el moderno con `...$args` y el clásico con `func_get_args()`

```php
<?php
// Versión moderna (PHP 5.6+)
function sumarModern(...$numeros) {
    $suma = 0;
    foreach ($numeros as $n) {
        $suma += $n;
    }
    return $suma;
}

// Versión clásica (PHP <5.6)
function sumarClasico() {
    $args = func_get_args(); // obtiene todos los argumentos como array
    $suma = 0;
    foreach ($args as $n) {
        $suma += $n;
    }
    return $suma;
}

// Ejemplos de uso
echo "Suma moderna (7 + 9): " . sumarModern(7, 9) . "<br>";
echo "Suma moderna (4 + 52 + 75 + 46 + 5): " . sumarModern(4, 52, 75, 46, 5) . "<br>";

echo "Suma clásica (7 + 9): " . sumarClasico(7, 9) . "<br>";
echo "Suma clásica (4 + 52 + 75 + 46 + 5): " . sumarClasico(4, 52, 75, 46, 5) . "<br>";

?>
```

## Inclusión de ficheros externos

La diferencia clave entre `include` y `require` es:

* `include` → si el archivo no se encuentra, muestra **warning** y el script sigue.
* `require` → si el archivo no se encuentra, lanza **fatal error** y el script se detiene.

### Programa 19 (Carpeta)

* Ficheros 19A, 19B, 19C y 19D. Además de un fichero con las funciones.

### Programa 20

```php
<?php
echo "<h2>Pruebas de strip_tags</h2>";

$nombre = 'Cristina <b>Civico</b>';

$solo_texto = strip_tags($nombre); // strip_tags() elimina las etiquetas HTML y PHP de una cadena

echo $solo_texto;

?>
<?php

echo "<h2>Pruebas de htmlspecialchars</h2>";

$texto = '<b>Hola</b>';
echo htmlspecialchars($texto, ENT_QUOTES, 'UTF-8'); // htmlspecialchars() convierte caracteres especiales en entidades HTML para evitar la ejecución de código malicioso

?>
```

## Array simple y asociativo (Programa 21)

![1791537596095](image/Entrega2_completa/1791537596095.png)

![1791537610701](image/Entrega2_completa/1791537610701.png)

## Array multidimensional (Programa 22)

![1791537577485](image/Entrega2_completa/1791537577485.png)

## Array de punteros (Programa 23)

![1791537624056](image/Entrega2_completa/1791537624056.png)

![1791537648454](image/Entrega2_completa/1791537648454.png)

## Funciones de array (Programa 24)

![1791537671102](image/Entrega2_completa/1791537671102.png)

![1791537685033](image/Entrega2_completa/1791537685033.png)

## Formularios (Programa 25)

![1791537705397](image/Entrega2_completa/1791537705397.png)

![1791537719919](image/Entrega2_completa/1791537719919.png)

Al haber datos no hay problema y muestra los datos, pero si no se hubiesen introducido, lo que aparecería sería el mensaje del else.

![1791537753253](image/Entrega2_completa/1791537753253.png)

### Post (Programa 26)

![1791537917553](image/Entrega2_completa/1791537917553.png)
