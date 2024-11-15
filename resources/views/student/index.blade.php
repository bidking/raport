@extends('layout.app')

@section('content')
<div class="index-siswa">
    <div class="show-container1">
        <h1>LAPORAN HASIL BELAJAR</h1>
        <table class="t-head">
            <tbody>
                <tr>
                    <td>Nama Siswa</td>
                    <td class="right">: {{ $siswa->nama_siswa }}</td>
                </tr>
                <tr>
                    <td>Nomor Induk Siswa</td>
                    <td class="right">: {{ $siswa->nis }}</td>
                </tr>
                <tr>
                    <td>Kelas/Semester</td>
                    <td class="right">: {{ $siswa->kelas->nama_kelas }} / Ganjil</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Pesan jika nilai belum ada -->
<!-- Menampilkan pesan error jika ada -->
@if ($errors->has('Pesan'))
    <div class="alert alert-danger">
        {{ $errors->first('Pesan') }}
    </div>
@endif


        <div class="show-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mata Pelajaran</th>
                        <th>Nilai</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td class="left">Matematika</td>
                        <td>{{ $data_nilai['matematika']['nilai'] }}</td>
                        <td>{{ $data_nilai['matematika']['grade'] }}</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td class="left">Bahasa Indonesia</td>
                        <td>{{ $data_nilai['indonesia']['nilai'] }}</td>
                        <td>{{ $data_nilai['indonesia']['grade'] }}</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td class="left">Bahasa Inggris</td>
                        <td>{{ $data_nilai['inggris']['nilai'] }}</td>
                        <td>{{ $data_nilai['inggris']['grade'] }}</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td class="left">Konsentrasi Keahlian</td>
                        <td>{{ $data_nilai['kejuruan']['nilai'] }}</td>
                        <td>{{ $data_nilai['kejuruan']['grade'] }}</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td class="left">Mata Pelajaran Pilihan</td>
                        <td>{{ $data_nilai['pilihan']['nilai'] }}</td>
                        <td>{{ $data_nilai['pilihan']['grade'] }}</td>
                    </tr>
                    <tr style="font-weight: 600">
                        <td></td>
                        <td class="left">Rata - rata</td>
                        <td>{{ $data_nilai['ratarata']['nilai'] }}</td>
                        <td>{{ $data_nilai['ratarata']['grade'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br><br>

        <div class="walas-container">
    <div class="walas">
        @if ($walas)
        <p>wali kelas siswa</p>
        <div class="walas-name" style="font-weight: bold;"> {{ $walas->nama_walas }} </div>

        @else
            <div class="walas-name"> Belum ada nilai dari walas </div>
        @endif
        <br><br>
        <div class="strip">_______________</div>
    </div>
</div>

</div>
@endsection
