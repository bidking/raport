@extends('layout.app')

@section('content')
<div class="create-container">
    <form action="/teacher/update/{{ $nilai->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="walas">Walas:</label>
            <input type="text" id="walas" name="walas" class="form-control" value="{{ $nilai->walas->nama_walas }}" disabled>
        </div>
        <div class="form-group">
        <label for="siswa_id">Nama Siswa:</label>
<input type="text" class="form-control" value="{{ $nilai->siswa->nama_siswa }}" disabled>
<input type="hidden" name="siswa_id" value="{{ $nilai->siswa_id }}">

</div>

        <div class="form-group">
            <label for="matematika">Matematika:</label>
            <input type="number" id="matematika" name="matematika" class="form-control" value="{{ $nilai->matematika }}" required>
        </div>
        <div class="form-group">
            <label for="indonesia">Bahasa Indonesia:</label>
            <input type="number" id="indonesia" name="indonesia" class="form-control" value="{{ $nilai->indonesia }}" required>
        </div>
        <div class="form-group">
            <label for="inggris">Bahasa Inggris:</label>
            <input type="number" id="inggris" name="inggris" class="form-control" value="{{ $nilai->inggris }}" required>
        </div>
        <div class="form-group">
            <label for="kejuruan">Kejuruan:</label>
            <input type="number" id="kejuruan" name="kejuruan" class="form-control" value="{{ $nilai->kejuruan }}" required>
        </div>
        <div class="form-group">
            <label for=" pilihan">Mapel Pilihan:</label>
            <input type="number" id="pilihan" name="pilihan" class="form-control" value="{{ $nilai->pilihan }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection