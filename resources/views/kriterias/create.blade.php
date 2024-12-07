@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Tambah Kriteria</h1>
    <form action="{{ route('kriterias.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
            <input type="text" name="nama_kriteria" id="nama_kriteria" class="form-control" placeholder="Masukkan Nama Kriteria Penilaian" required>
            @error('nama_kriteria')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="bobot" class="form-label">Bobot</label>
            <input type="number" name="bobot" id="bobot" class="form-control" placeholder="Nilainya antara 0 - 4" required min="0" max="4">
            @error('bobot')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
