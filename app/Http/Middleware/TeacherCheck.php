<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class TeacherCheck
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->get('user_type') !== 'teacher') {
            return redirect('/login/teacher')->withErrors(['message' => 'Silakan login untuk melanjutkan.']);
        }
    
        return $next($request);
    }
}
