<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
{
    if (!auth()->check()) {
        abort(403, 'Not authenticated');
    }

    if (!auth()->user()->is_admin) {
        abort(403, 'User ID: '.auth()->id().' is not admin');
    }
    
    return $next($request);
}
}