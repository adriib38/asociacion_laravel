<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Metodo middleware para comprobar si el usuario esta autenticado.
     *
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()) {
            return $next($request);
        } 
        abort(404);
    }
}

