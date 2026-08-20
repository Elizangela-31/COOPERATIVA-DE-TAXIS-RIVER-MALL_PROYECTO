<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Rutas de consola
|--------------------------------------------------------------------------
|
| En este archivo se definen los comandos de consola basados en funciones
| anónimas. Cada función se vincula con una instancia de comando para
| facilitar la interacción con sus métodos de entrada y salida.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Mostrar una frase inspiradora');
