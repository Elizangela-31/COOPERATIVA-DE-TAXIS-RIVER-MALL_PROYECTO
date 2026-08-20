<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

class PreventRequestsDuringMaintenance extends Middleware
{
    /**
     * Direcciones accesibles mientras el modo de mantenimiento está activo.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
}
