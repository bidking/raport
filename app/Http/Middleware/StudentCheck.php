<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->get('user_type') !== 'student') {
            return redirect('/login/student')->withErrors(['message' => 'Silakan login untuk melanjutkan.']);
        }
    
        return $next($request);
    }
    
}
