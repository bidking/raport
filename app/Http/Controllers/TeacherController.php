<?php

namespace App\Http\Controllers;

use App\Models\SISWAS; // Menggunakan nama model yang benar
use App\Models\NILAIS; 
use App\Models\WALAS; 
// Menggunakan nama model yang benar
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TeacherController extends Controller
{
    // a. Fungsi Index()
    public function index(): View
    {
        // Mengambil nilai berdasarkan walas_id yang ada di session
        $nilais = NILAIS::with(['siswa']) // Pastikan relasi sesuai dengan metode `siswa` pada model nilais
            ->where('walas_id', session('id'))
            ->get();
            $siswas = SISWAS::with('kelas')->get(); // Ambil semua siswa beserta data kelasnya

        return view('teacher.index', compact('nilais','siswas'));
    }

    // b. Fungsi Create()
    public function create(): View
    {
        // Mengambil siswas berdasarkan kelas_id yang ada di session
        $siswas = SISWAS::where('kelas_id', session('id'))->get();

        return view('teacher.create', compact('siswas'));
    }

    // c. Fungsi Store()
    public function store(Request $request): RedirectResponse
    {
        $walasId = session('id');
        if (!$walasId) {
            return redirect('/teacher')->withErrors(['walas_id' => 'ID Walas tidak ditemukan.']);
        }
    
        // Validasi data
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'matematika' => 'required|numeric',
            'indonesia' => 'required|numeric',
            'inggris' => 'required|numeric',
            'kejuruan' => 'required|numeric',
            'pilihan' => 'required|numeric',
        ]);
    
        // Cek apakah nilai untuk siswa ini sudah ada
        $nilai = NILAIS::where('siswa_id', $request->siswa_id)->first();
        if ($nilai) {
            return redirect('/teacher/create')
                ->withErrors(['siswa_id' => 'Nilai untuk siswa ini sudah ada.']);
        }
    
        // Menghitung rata-rata nilai
        $total = $request->matematika + $request->indonesia + $request->inggris + $request->kejuruan + $request->pilihan;
        $rata_rata = round($total / 5, 2);
    
        // Menyimpan data nilai
        NILAIS::create([
            'walas_id' => $walasId,
            'siswa_id' => $request->siswa_id,
            'matematika' => $request->matematika,
            'indonesia' => $request->indonesia,
            'inggris' => $request->inggris,
            'kejuruan' => $request->kejuruan,
            'pilihan' => $request->pilihan,
            'ratarata' => $rata_rata,
        ]);
    
        return redirect('/teacher')->with('success', 'Nilai berhasil disimpan.');
    }
    

    // d. Fungsi Edit()
    public function edit($id): View
    {
        $nilai = NILAIS::findOrFail($id);
        $siswas = SISWAS::where('kelas_id', session('id'))->get();

        return view('teacher.edit', compact('nilai', 'siswas'));
    }

    // e. Fungsi Update()
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'matematika' => 'required|numeric',
            'indonesia' => 'required|numeric',
            'inggris' => 'required|numeric',
            'kejuruan' => 'required|numeric',
            'pilihan' => 'required|numeric',
        ]);

        $rata_rata = round(($request->matematika + $request->indonesia + $request->inggris + $request->kejuruan + $request->pilihan) / 5, 2);

        $nilai = NILAIS::findOrFail($id);
        $nilai->update([
            'siswa_id' => $request->siswa_id,
            'matematika' => $request->matematika,
            'indonesia' => $request->indonesia,
            'inggris' => $request->inggris,
            'kejuruan' => $request->kejuruan,
            'pilihan' => $request->pilihan,
            'ratarata' => $rata_rata,
        ]);

        return redirect('/teacher')->with('success', 'Nilai berhasil diperbarui.');
    }

    // f. Fungsi Destroy()
    public function destroy($id): RedirectResponse
    {
        $nilai = NILAIS::findOrFail($id);
        $nilai->delete();

        return redirect('/teacher')->with('success', 'Nilai berhasil dihapus.');
    }

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

    public function show($id):  View|RedirectResponse
    {
        $nilai = NILAIS::with('siswa')->where('siswa_id', $id)->first();
        if ($nilai === null) {
            return back()->withErrors(['Tidak ada data yang ditemukan']);
        }
        $walas = WALAS::find($nilai->walas_id); 
        $siswas = SISWAS::with('nilais', 'kelas')->find($nilai->siswa_id);

        $data_nilai = [
            'matematika' => [
                'nilai' => $nilai->matematika ?? 'Data tidak tersedia',
                'grade' => $this->grade($nilai->matematika)
            ],
            'indonesia' => [
                'nilai' => $nilai->indonesia ?? 'Data tidak tersedia',
                'grade' => $this->grade($nilai->indonesia)
            ],
            'inggris' => [
                'nilai' => $nilai->inggris ?? 'Data tidak tersedia',
                'grade' => $this->grade($nilai->inggris)
            ],
            'kejuruan' => [
                'nilai' => $nilai->kejuruan ?? 'Data tidak tersedia',
                'grade' => $this->grade($nilai->kejuruan)
            ],
            'pilihan' => [
                'nilai' => $nilai->pilihan ?? 'Data tidak tersedia',
                'grade' => $this->grade($nilai->pilihan)
            ],
            'ratarata' => [
                'nilai' => $nilai->ratarata ?? 'Data tidak tersedia',
                'grade' => $this->grade($nilai->ratarata)
            ]
        ];

        return view('teacher.show', [
            'siswa' => $siswas,
            'walas' => $walas,
            'data_nilai' => $data_nilai,
        ]);
    }
}
