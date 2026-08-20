<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Comprobar si la aplicación está en mantenimiento
|--------------------------------------------------------------------------
|
| Si la aplicación está en modo de mantenimiento mediante el comando
| "down", se carga este archivo para mostrar el contenido preparado
| sin iniciar el framework y evitar posibles excepciones.
|
*/

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

/*
|--------------------------------------------------------------------------
| Registrar el cargador automático
|--------------------------------------------------------------------------
|
| Composer proporciona un cargador automático de clases para la aplicación.
| Se incluye en este archivo para evitar cargar manualmente cada clase.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Ejecutar la aplicación
|--------------------------------------------------------------------------
|
| Una vez iniciada la aplicación, la solicitud entrante se procesa mediante
| el núcleo HTTP. Después, la respuesta se envía al navegador del usuario.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
