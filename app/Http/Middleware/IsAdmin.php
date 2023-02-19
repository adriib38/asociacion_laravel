<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * El middleware para comprobar si el usuario es administrador.
     *
    */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->rol == 'admin') {
            return $next($request);                                                                           
        } 
        abort(404);
    }
}
