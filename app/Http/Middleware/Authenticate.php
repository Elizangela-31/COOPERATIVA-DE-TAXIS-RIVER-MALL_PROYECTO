<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Obtiene la ruta de redirección cuando el usuario no está autenticado.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('iniciar-sesion');
    }
}
