<?php
use App\Http\Middleware\AuthCheck;//panggil file middleware authcheck di folder app/http/middleware/AuthCheck
use App\Http\Middleware\TeacherCheck;//panggil file middleware authcheck di folder app/http/middleware/TeacherCheck
use App\Http\Middleware\StudentCheck;//panggil file middleware authcheck di folder app/http/middleware/TeacherCheck
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'authCheck' => AuthCheck::class,
            'teacher.check' => TeacherCheck::class,
            'student.check' => StudentCheck::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
