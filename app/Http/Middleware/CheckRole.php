<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!auth()->check()) {
            return redirect()->route('login.create')->with('error', 'Vous devez être connecté.');
        }

        foreach ($roles as $role) {
            if (auth()->user()->role === $role) {
                return $next($request);
            }
        }

        return redirect()->route('login.create')->with('error', 'Accès non autorisé');
    }
}
