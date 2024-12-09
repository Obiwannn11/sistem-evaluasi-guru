@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Edit Dokumen</h1>
    <form action="{{ route('dokumens.update', $dokumen) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_guru" class="form-label">Guru</label>
            <select name="id_guru" id="id_guru" class="form-control" required>
                @foreach ($gurus as $guru)
                    <option value="{{ $guru->id_guru }}" {{ $dokumen->id_guru == $guru->id_guru ? 'selected' : '' }}>
                        {{ $guru->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_kriteria" class="form-label">Kriteria</label>
            <select name="id_kriteria" id="id_kriteria" class="form-control" required>
                @foreach ($kriterias as $kriteria)
                    <option value="{{ $kriteria->id_kriteria }}" {{ $dokumen->id_kriteria == $kriteria->id_kriteria ? 'selected' : '' }}>
                        {{ $kriteria->nama_kriteria }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="file_path" class="form-label">File Baru (Opsional)</label>
            <input type="file" name="file_path" id="file_path" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
