# AutoTienda · Catálogo de coches (Laravel 13)

**Módulo:** Desarrollo Web en Entorno Servidor · 2.º DAW
**Proyecto:** UD6 · Proyecto final: tienda online
**Modalidad:** individual

Aplicación web para gestionar el catálogo de un concesionario de coches de segunda mano. Permite listar, buscar, filtrar, consultar, crear, editar y eliminar coches, indicando la marca de cada uno y su equipamiento.

---

## Temática y problema que resuelve

Un concesionario necesita mantener un catálogo de vehículos con su marca, precio, año, kilometraje, combustible, estado de disponibilidad y equipamiento. AutoTienda ofrece una interfaz web para gestionar ese catálogo sin tocar la base de datos directamente.

## Modelos y relaciones

| Modelo | Papel | Relación |
|--------|-------|----------|
| `Car` | Modelo principal del catálogo | Pertenece a una `Brand`; tiene muchos `Feature` |
| `Brand` | Marca del coche | **1:N** con `Car` (`brand_id` en `cars`) |
| `Feature` | Equipamiento (Bluetooth, techo solar...) | **N:M** con `Car` mediante la tabla pivote `car_feature` |

- **1:N (`Brand` → `Car`):** cada coche tiene una sola marca, así que basta una clave foránea.
- **N:M (`Car` ↔ `Feature`):** un coche tiene varios extras y un extra está en varios coches, por lo que se necesita la tabla pivote `car_feature`, con clave primaria compuesta `(car_id, feature_id)` para evitar duplicados.

### Campos de `Car`

| Campo | Tipo | Notas |
|-------|------|-------|
| `brand_id` | FK | Marca (restringe el borrado de la marca si tiene coches) |
| `model` | string(100) | Obligatorio |
| `description` | text | Opcional |
| `price` | decimal(10,2) | Precio |
| `year` | smallint | Año de matriculación |
| `mileage` | int | Kilómetros |
| `fuel` | string(20) | gasolina, diesel, hibrido, electrico |
| `status` | string(20) | disponible, reservado, vendido |

## Funcionalidades

- **CRUD completo** del modelo principal con las siete acciones del Resource Controller: `index`, `create`, `store`, `show`, `edit`, `update`, `destroy`.
- Vistas Blade con layout reutilizable, menú, mensajes de éxito y de validación.
- Formularios con `@csrf`, `@method`, `old()` y un parcial reutilizado por creación y edición.
- Validación mediante Form Request (`CarRequest`), con mensajes en español y comprobación de claves foráneas.
- Selección de varios extras con casillas y persistencia de la relación N:M con `sync()`.
- Búsqueda por modelo, filtro por marca y paginación de 10 coches por página.
- Carga anticipada (`with()`) para evitar el problema N+1.
- Página 404 propia para registros inexistentes.
- Factory y Seeders con datos de demostración coherentes.

## Requisitos

- PHP 8.3 o superior con las extensiones `pdo_sqlite` y `sqlite3`
- Composer
- Git

Versiones usadas: Laravel 13 y SQLite como base de datos.

## Instalación

```bash
git clone <URL_DEL_REPOSITORIO> tienda-coches
cd tienda-coches
composer install
cp .env.example .env
php artisan key:generate
```

En Windows (PowerShell), para copiar el `.env`:

```powershell
Copy-Item .env.example .env
```

### Base de datos (SQLite)

Crea el archivo de la base de datos:

```bash
# Linux / macOS
touch database/database.sqlite
```

```powershell
# Windows (PowerShell)
New-Item database\database.sqlite -ItemType File
```

Comprueba que en `.env` aparece:

```env
DB_CONNECTION=sqlite
```

Las líneas `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME` y `DB_PASSWORD` deben estar comentadas o eliminadas.

Opcionalmente, para textos y datos de demostración en español:

```env
APP_LOCALE=es
APP_FAKER_LOCALE=es_ES
```

> Para usar MySQL o MariaDB bastaría con crear la base de datos y configurar las variables `DB_*` del `.env`. Las migraciones y los modelos son los mismos.

### Migraciones y datos de demostración

```bash
php artisan migrate:fresh --seed
```

> ⚠️ Este comando elimina todos los datos existentes. Úsalo solo en una base de datos de desarrollo.

Crea las tablas y carga **23 coches** (3 fijos y 20 generados con la Factory), 6 marcas y 10 extras, con relaciones N:M coherentes.

### Iniciar el servidor

```bash
php artisan serve
```

Abre <http://127.0.0.1:8000>.

## Datos de demostración

Los **tres registros fijos** reconocibles son:

| Coche | Marca | Estado |
|-------|-------|--------|
| León FR | Seat | disponible |
| Corolla Hybrid | Toyota | reservado |
| Golf GTI | Volkswagen | disponible |

El resto de coches se generan con `CarFactory` y Faker.

## Rutas

| Acción | Método | URL | Nombre |
|--------|--------|-----|--------|
| index | GET | `/cars` | `cars.index` |
| create | GET | `/cars/create` | `cars.create` |
| store | POST | `/cars` | `cars.store` |
| show | GET | `/cars/{car}` | `cars.show` |
| edit | GET | `/cars/{car}/edit` | `cars.edit` |
| update | PUT/PATCH | `/cars/{car}` | `cars.update` |
| destroy | DELETE | `/cars/{car}` | `cars.destroy` |

Para comprobarlo: `php artisan route:list --name=cars`.

## Estructura relevante del repositorio

```text
tienda-coches/
├── app/
│   ├── Http/
│   │   ├── Controllers/CarController.php
│   │   └── Requests/CarRequest.php
│   ├── Models/ (Car, Brand, Feature)
│   └── Providers/AppServiceProvider.php
├── database/
│   ├── factories/CarFactory.php
│   ├── migrations/
│   └── seeders/ (BrandSeeder, FeatureSeeder, CarSeeder, DatabaseSeeder)
├── resources/views/
│   ├── layouts/app.blade.php
│   ├── cars/ (index, show, create, edit, _form)
│   └── errors/404.blade.php
├── routes/web.php
├── docs/
│   ├── 01-diseno.md
│   ├── 02-diario-desarrollo.md
│   ├── 03-pruebas.md
│   └── evidencias/
└── README.md
```

## Documentación

- [Diseño y modelo de datos](docs/01-diseno.md)
- [Diario de desarrollo](docs/02-diario-desarrollo.md)
- [Pruebas y evidencias](docs/03-pruebas.md)