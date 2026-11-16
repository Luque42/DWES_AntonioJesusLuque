# GameManager

GameManager es un catálogo de videojuegos desarrollado con Laravel 12. Permite gestionar videojuegos, sus desarrolladoras, fichas técnicas y géneros asociados. La aplicación utiliza **SQLite** y la base de datos local se encuentra en `database/database.sqlite`.

## Requisitos

- PHP 8.2 o superior con la extensión PDO SQLite.
- Composer.

## Instalación y ejecución

Desde la carpeta del proyecto:

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate:fresh --seed
php artisan serve
```

La configuración local usa `DB_CONNECTION=sqlite`; SQLite guarda los datos en `database/database.sqlite`.

## Relaciones Eloquent

- **Uno a muchos:** una `Desarrolladora` tiene muchos `Videojuego`; cada videojuego pertenece a una desarrolladora.
- **Uno a uno:** un `Videojuego` tiene una `FichaTecnica`, y cada ficha pertenece a un videojuego.
- **Muchos a muchos:** los videojuegos y los `Genero` se relacionan mediante `genero_videojuego`. La tabla pivote guarda marcas de tiempo.

## Factories y seeders

Las factories de desarrolladoras, videojuegos, fichas técnicas y géneros generan datos de prueba con Faker. `DatabaseSeeder` crea ocho géneros, cinco desarrolladoras y entre dos y cuatro videojuegos por desarrolladora. Cada videojuego recibe una ficha técnica y entre uno y tres géneros.

Para regenerar la base de datos y cargar el catálogo de ejemplo:

```bash
php artisan migrate:fresh --seed
```

## Eager loading y problema N+1

El problema **N+1** aparece cuando se obtiene una colección y se ejecuta una consulta adicional por cada registro para leer una relación. Por ejemplo, listar 10 videojuegos y acceder a la desarrolladora de cada uno puede hacer 1 consulta para los videojuegos más 10 consultas individuales para las desarrolladoras: **11 consultas para 10 videojuegos**.

Eloquent evita esas consultas repetidas al cargar las relaciones por adelantado con `with()`. El listado del catálogo usa `Videojuego::with(['desarrolladora', 'generos'])`, por lo que las relaciones necesarias se obtienen en consultas agrupadas, en lugar de una consulta por cada tarjeta.

`load()` carga relaciones de forma explícita después de obtener un modelo. Se usa en `show` para presentar desarrolladora, ficha técnica y géneros, y en `edit` para completar los datos del formulario. En desarrolladoras, `withCount('videojuegos')` obtiene el total relacionado en una consulta y evita cargar todos los videojuegos solo para contarlos.
