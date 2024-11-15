<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\SISWAS; // Menggunakan nama model yang benar
use App\Models\NILAIS;
use App\Models\WALAS;
class AuthController extends Controller
{
   
    
    public function login(Request $request, SISWAS $siswa, WALAS $walas)
    {
        $request->validate([
            'user_type' => 'required|string|in:student,teacher',
        ]);
    
        if ($request->user_type === 'student') {
            $request->validate([
                'nis' => 'required|string',
                'student_password' => 'required|string',
            ]);
            return $this->authenticateStudent($request, $siswa);
        } else {
            $request->validate([
                'nig' => 'required|string',
                'teacher_password' => 'required|string',
            ]);
            return $this->authenticateTeacher($request, $walas);
        }
    }
    
    private function authenticateStudent(Request $request, SISWAS $siswa)
    {
        // Retrieve all students
        $students = $siswa->all();
    
        foreach ($students as $student) {
            if ($student->nis === $request->nis && Hash::check($request->student_password, $student->password)) {
                session(['user_type' => 'student', 'id' => $student->id, 'username' => $student->nama_siswa]);
                return redirect()->intended("/student");
            }
        }
    
        return redirect()->back()->withInput()->withErrors(["message" => "NIS atau password siswa salah."]);
    }
    
    private function authenticateTeacher(Request $request, walas $walas)
    {
        // Retrieve all teachers
        $teachers = $walas->all();
    
        foreach ($teachers as $teacher) {
            if ($teacher->nig === $request->nig && Hash::check($request->teacher_password, $teacher->password)) {
                session(['user_type' => 'teacher', 'id' => $teacher->id, 'username' => $teacher->nama_walas]);
                return redirect()->intended("/teacher");
            }
        }
    
        return redirect()->back()->withInput()->withErrors(["message" => "NIG atau password guru salah."]);
    }
    
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect("/login")->with("message", "Anda telah berhasil logout.");
    }
    
}
