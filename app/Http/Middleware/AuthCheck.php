<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthCheck
{
  
    public function handle(Request $request, Closure $next)
    {
        // Cek jika session 'user_type' ada
        if ($request->session()->get('user_type') === 'student') {
            return redirect('/student');
        } elseif ($request->session()->get('user_type') === 'teacher') {
            return redirect('/teacher');
        }

        // Lanjutkan permintaan jika tidak ada session
        return $next($request);
    }
}
