<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Canales de difusión
|--------------------------------------------------------------------------
|
| Aquí se registran los canales de difusión de eventos compatibles con
| la aplicación. Las funciones de autorización comprueban si un usuario
| autenticado puede escuchar cada canal.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
