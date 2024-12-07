@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Edit Kriteria</h1>
    <form action="{{ route('kriterias.update', $kriteria) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
            <input type="text" name="nama_kriteria" id="nama_kriteria" class="form-control" value="{{ $kriteria->nama_kriteria }}" required>
        </div>
        <div class="mb-3">
            <label for="bobot" class="form-label">Bobot</label>
            <input type="number" name="bobot" id="bobot" class="form-control" value="{{ $kriteria->bobot }}" required min="0" max="4">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
