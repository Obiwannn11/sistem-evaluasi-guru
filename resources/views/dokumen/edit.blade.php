@extends('layouts.main')

@section('content')
<h1>Edit Dokumen</h1>

<form action="{{ route('dokumen.update', $dokumen->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="kriteria">Kriteria</label>
        <input type="text" id="kriteria" class="form-control" value="{{ $dokumen->kriteria->nama }}" readonly>
    </div>

    <div class="form-group">
        <label for="current_file">File Saat Ini</label>
        <br>
        @if ($dokumen->file_path)
        <a href="{{ asset('storage/' . $dokumen->file_path) }}" target="_blank">Lihat File</a>
        @else
        <span class="text-danger">Belum ada file yang diunggah</span>
        @endif
    </div>

    <div class="form-group">
        <label for="new_file">Unggah File Baru</label>
        <input type="file" name="file_path" id="new_file" class="form-control" required>
        <small class="form-text text-muted">Unggah file yang sesuai dengan kriteria ini.</small>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    <a href="{{ route('dokumen.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
