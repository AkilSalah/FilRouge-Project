<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
{
    if (!auth()->check()) {
        return redirect()->route('login.create')->with('error', 'Vous devez être connecté.');
    }

    $user = auth()->user();

    foreach ($roles as $role) {
        if ($user->role === $role) {
            return $next($request);
        }
    }

    return abort(403,'Forbiden');
}

}
