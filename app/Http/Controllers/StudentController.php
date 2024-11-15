<?php

namespace App\Http\Controllers;
use App\Models\SISWAS; // Menggunakan nama model yang benar
use App\Models\NILAIS; 
use App\Models\WALAS; 
// Menggunakan nama model yang benar
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function grade($nilai): string
    {
        if ($nilai >= 90) {
            return 'A';
        } elseif ($nilai >= 80) {
            return 'B';
        } elseif ($nilai >= 70) {
            return 'C';
        } elseif ($nilai >= 60) {
            return 'D';
        } else {
            return 'E';
        }
    }
    
    public function index(): Factory|View
    {
        $siswa = SISWAS::with(['kelas', 'nilais'])->find(session('id'));
        $nilai = optional($siswa->nilais)->first();  // Pastikan relasi yang digunakan adalah 'nilais'
    
        // Ambil data walas berdasarkan nilai pertama
        $walas = $nilai ? WALAS::find($nilai->walas_id) : null;
    
        $data_nilai = [
            'matematika' => [
                'nilai' => $nilai->matematika ?? 'nilai belum diberikan oleh walas',
                'grade' => $nilai ? $this->grade($nilai->matematika) : 'N/A'
            ],
            'indonesia' => [
                'nilai' => $nilai->indonesia ?? 'nilai belum diberikan oleh walas',
                'grade' => $nilai ? $this->grade($nilai->indonesia) : 'N/A'
            ],
            'inggris' => [
                'nilai' => $nilai->inggris ?? 'nilai belum diberikan oleh walas',
                'grade' => $nilai ? $this->grade($nilai->inggris) : 'N/A'
            ],
            'kejuruan' => [
                'nilai' => $nilai->kejuruan ?? 'nilai belum diberikan oleh walas',
                'grade' => $nilai ? $this->grade($nilai->kejuruan) : 'N/A'
            ],
            'pilihan' => [
                'nilai' => $nilai->pilihan ?? 'nilai belum diberikan oleh walas',
                'grade' => $nilai ? $this->grade($nilai->pilihan) : 'N/A'
            ],
            'ratarata' => [
                'nilai' => $nilai->ratarata ?? 'nilai belum diberikan oleh walas',
                'grade' => $nilai ? $this->grade($nilai->ratarata) : 'N/A'
            ],
        ];
    
        return view('student.index', [
            'siswa' => $siswa,
            'data_nilai' => $data_nilai,
            'walas' => $walas,
        ]);
    }}
