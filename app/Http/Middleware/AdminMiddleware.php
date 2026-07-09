<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is logged in AND is an admin
        if (!Auth::check() || !Auth::user()->is_admin) {
            // If not, kick them out to the login page
            return redirect('/admin/login');
        }

        // If they are an admin, let them through!
        return $next($request);
    }
}