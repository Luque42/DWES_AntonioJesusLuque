# AutoTienda – Catálogo de coches (Laravel 13)

Aplicación web CRUD para gestionar el catálogo de un concesionario de coches.
Modelos: `Car` (principal), `Brand` (1:N) y `Feature` (N:M con `Car` vía `car_feature`).

## Requisitos
- PHP 8.3 o superior con las extensiones `pdo_sqlite` y `sqlite3`
- Composer

## Instalación
```bash
git clone <URL_DEL_REPOSITORIO> tienda-coches
cd tienda-coches
composer install
cp .env.example .env
php artisan key:generate
```

Crea el archivo de la base de datos SQLite:
```bash
# Linux / macOS
touch database/database.sqlite

# Windows (PowerShell)
New-Item database\database.sqlite -ItemType File
```

Comprueba que `.env` contiene:
```env
DB_CONNECTION=sqlite
```

Migraciones y datos de demostración (⚠️ borra los datos existentes):
```bash
php artisan migrate:fresh --seed
```

Iniciar el servidor:
```bash
php artisan serve
```
Abre http://127.0.0.1:8000

## Documentación
- [Diseño](docs/01-diseno.md)
- [Diario de desarrollo](docs/02-diario-desarrollo.md)
- [Pruebas](docs/03-pruebas.md)