# Cooperativa River Mall — versión mejorada

## Acceso inicial

Ejecuta una sola vez:

```bash
php artisan db:seed
```

Credenciales de demostración:

- Correo: `admin@rivermall.com`
- Contraseña: `Admin1234`

Cambia estas credenciales antes de publicar el proyecto.

## Ejecución local

```bash
php artisan optimize:clear
php artisan serve
```

Abre `http://127.0.0.1:8000`.

## Mejoras incluidas

- Inicio de sesión y cierre de sesión.
- Protección de todas las rutas con middleware `auth`.
- Dashboard con contadores reales.
- Menú lateral adaptable.
- CRUD de socios, conductores, taxis, clientes, servicios y pagos.
- Búsqueda y paginación en módulos principales.
