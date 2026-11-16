# Diario de desarrollo

## Versión 1 — Modelos y migraciones — 13/11/2026
### Objetivo
Crear el proyecto Laravel y la estructura de base de datos.
### Logros
Tablas brands, features, cars y car_feature creadas (comprobado con `php artisan db:table`).
### Cambios realizados
Migraciones y modelos con $fillable, $casts y relaciones. Se usa SQLite en lugar de MySQL por simplicidad de instalación.
### Error o dificultad
[Síntoma exacto / mensaje de error, o decisión técnica relevante]
### Diagnóstico y solución
[Causa, pasos de corrección y qué aprendí]
### Evidencias
![Estructura de tablas](evidencias/v1-tablas.png)
### Pendiente para la siguiente versión
Controlador Resource, rutas y vistas de lectura.