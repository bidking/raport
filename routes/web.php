<?php


use App\Http\Middleware\AuthCheck;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/login');
});
// [AuthCheck::class]
// Gunakan middleware yang sudah didaftarkan dengan nama 'authCheck'
Route::middleware(['authCheck'])->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware(['teacher.check'])->group(function () {

    Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');

    Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');

    Route::post('/teacher/store', [TeacherController::class, 'store'])->name('teacher.store');

    Route::get('/teacher/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');

    Route::put('/teacher/update/{id}', [TeacherController::class, 'update'])->name('teacher.update');

    Route::delete('/teacher/destroy/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');

    Route::get('/teacher/view/{id}', [TeacherController::class, 'show']);

});

Route::middleware(['student.check'])->group(function () {
    Route::get('/student', [StudentController::class, 'index'])->name('student');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
