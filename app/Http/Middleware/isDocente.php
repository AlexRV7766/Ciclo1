<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsDocente
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->rol_id == 2) { // 2 = Docente
            return $next($request);
        }

        return redirect('/')->with('error', 'Acceso denegado');
    }
}

