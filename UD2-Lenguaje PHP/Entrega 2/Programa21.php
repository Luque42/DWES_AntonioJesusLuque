<?php
//Ejemplo Definición de array simple
echo "<h2>definicion de array simple asociativo con array()</h2>";
$array1 = array(
    "perro" => "bichon maltés",
    "gato" => "siames",
);
var_dump($array1); //muestra el contenido del array
echo "<h2>definicion de array simple asociativo con corchetes [] a partir de PHP 5.4</h2>";

// a partir de PHP 5.4
$array2 = [
    "perro" => "dalmata",
    "gato" => "persa",
];
print_r($array2);
//mostrar un valor de cada uno
echo "<h2>mostrar un valor de cada uno</h2>";
$array3 = array("gato", "perro", "conejo");
var_dump($array3);
echo $array3[0]; //muestra gato unicamente
echo "<h2>añadir un elemento al final del array</h2>";
$array3[] = "loro"; //añade un elemento al final del array
var_dump($array3); 
$array3[1] = "hamster"; //modifica el valor del elemento en la posición 1
var_dump($array3); 
?>