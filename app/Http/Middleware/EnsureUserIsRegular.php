<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsRegular
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Si no está autenticado, redirige al login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Evita que falle si role es null
        if (!isset($user->role) || $user->role !== 'user') {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }

        return $next($request);
    }
}
