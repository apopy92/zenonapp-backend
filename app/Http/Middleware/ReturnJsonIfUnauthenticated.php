<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class ReturnJsonIfUnauthenticated extends Middleware
{
    protected function redirectTo(Request $request): ?string
    {
        // No redirigir, devolver JSON de error si no está autenticado
        if (!$request->expectsJson()) {
            return null;
        }

        return null;
    }
}
