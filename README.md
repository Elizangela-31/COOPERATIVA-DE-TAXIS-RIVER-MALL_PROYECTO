# Cooperativa River Mall

Sistema web desarrollado en Laravel 10 para la gestión administrativa de la
Cooperativa de Taxis River Mall, ubicada en Sangolquí, Quito.

## Requisitos

- PHP 8.1 o superior
- Composer
- MySQL o MariaDB
- Extensiones PHP requeridas por Laravel 10

## Instalación

1. Cree una base de datos llamada `cooperativa_taxis`.
2. Abra una terminal dentro de la carpeta del proyecto.
3. Ejecute:

```bash
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

En macOS o Linux reemplace `copy` por `cp`.

Después, abra `http://127.0.0.1:8000`.

## Acceso inicial

- Correo: `admin@rivermall.com`
- Contraseña: `Admin1234`

Cambie estas credenciales antes de publicar el sistema en un servidor real.

## Módulos

- Panel principal
- Socios
- Conductores
- Taxis
- Clientes
- Servicios
- Pagos

Todos los módulos incluyen creación, consulta, edición, eliminación, validaciones,
búsqueda, ordenamiento y paginación.
