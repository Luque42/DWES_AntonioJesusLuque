# Unidad 2 – Programación en PHP

## Saltos de línea

* El carácter especial "\n" introduce un salto de línea en el código fuente, pero el navegador no lo muestra como tal.

![1791382631075](image/Entrega1/1791382631075.png)

* Para que el salto se vea en pantalla hay que escribir la etiqueta HTML "br".

![1790323673658](image/Entrega1/1790323673658.png)

* La función "nl2br" transforma automáticamente cada "\n" de un texto en una etiqueta "br", de modo que el salto sí aparece en el navegador.

![1790323926615](image/Entrega1/1790323926615.png)

## Tipos de datos

* Declaración y uso de variables en PHP

![1790324039359](image/Entrega1/1790324039359.png)

![1791382751825](image/Entrega1/1791382751825.png)

![1791382796832](image/Entrega1/1791382796832.png)

* Alcance (ámbito) de las variables

  * Globales: son las que se declaran fuera de cualquier función. Dentro de una función no se pueden usar directamente; para acceder a ellas hay que indicarlo con la palabra "global" en el interior de la función.

  ![1790324799372](image/Entrega1/1790324799372.png)

  * Locales: se crean dentro de una función y desaparecen cuando esta termina.
  * Estáticas: conservan su valor entre una llamada a la función y la siguiente.

  ![1790325392230](image/Entrega1/1790325392230.png)

![1790325412200](image/Entrega1/1790325412200.png)

## Básico 2: el lenguaje PHP

![1791383522218](image/Entrega1/1791383522218.png)

## Especificadores de formato

![1790327957313](image/Entrega1/1790327957313.png)

![1790327914026](image/Entrega1/1790327914026.png)

### Programa 4

* Uso de especificadores de formato junto con la función printf.

![1790577534881](image/Entrega1/1790577534881.png)

![1790328250998](image/Entrega1/1790328250998.png)

* Ejemplo con printf

![1790578372426](image/Entrega1/1790578372426.png)

Ambas funciones aplican un formato al texto, pero se diferencian en el destino: printf() muestra el resultado directamente en la salida (navegador o pantalla), mientras que sprintf() lo devuelve como una cadena que se puede almacenar en una variable y reutilizar más adelante.

![1790578485763](image/Entrega1/1790578485763.png)

* Cadenas de caracteres

En PHP una cadena se puede escribir con comillas simples, comillas dobles, heredoc o nowdoc.

Si se usan comillas simples, PHP no interpreta las variables ni la mayoría de secuencias de escape que haya dentro:

![1790578789682](image/Entrega1/1790578789682.png)

### Programa 5

* Caracteres Unicode

![1791384045594](image/Entrega1/1791384045594.png)

![1791384028928](image/Entrega1/1791384028928.png)

* Secuencias de escape más habituales

![1790579506425](image/Entrega1/1790579506425.png)

## Funciones para trabajar con datos

* gettype(): devuelve el tipo de una variable.
* settype(): convierte una variable a otro tipo.
* isset(): comprueba si una variable existe y no es null.
* unset(): elimina una variable.

![1790681330606](image/Entrega1/1790681330606.png)

### Cómo evitar que se muestren errores

* Con **error_reporting**(**0**); se desactiva la notificación de errores.

![1790681510536](image/Entrega1/1790681510536.png)![1790681521147](image/Entrega1/1790681521147.png)

## Constantes y constantes predefinidas

![1791384084306](image/Entrega1/1791384084306.png)

![1791384304207](image/Entrega1/1791384304207.png)

### Constantes predefinidas

Ejemplo de la salida obtenida al listar algunas constantes de error:

<pre>Array
(
    [E_ERROR] => 1
    [E_RECOVERABLE_ERROR] => 4096
    [E_WARNING] => 2
    [E_PARSE] => 4
    [E_NOTICE] => 8
    [E_STRICT] => 2048
    ...
)
</pre>

![1790682629075](image/Entrega1/1790682629075.png)

### Programa 8

![1790763199694](image/Entrega1/1790763199694.png)

## Manejo de fechas y horas

![1790763249406](image/Entrega1/1790763249406.png)

![1790763263002](image/Entrega1/1790763263002.png)

### Programa 9


## Variables superglobales de PHP

![1790764867640](image/Entrega1/1790764867640.png)

### Programa 10

![1791384463209](image/Entrega1/1791384463209.png)
