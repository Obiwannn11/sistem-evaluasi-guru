@extends('layouts.main')

@section('content')
<h1>Unggah Dokumen</h1>
<form action="{{ route('user.dokumen.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 col-md-5">
        <label for="guru_id" class="form-label">Guru</label>
        <input type="text" id="guru_id" class="form-control" name="guru_id" value="{{ $guru->nama }}" disabled>
        <input type="hidden" name="guru_id" value="{{ $guru->id }}"> <!-- Menyimpan ID guru yang sebenarnya -->
    </div>
    <div class="mb-3 col-md-5">
        <label for="kriteria_id" class="form-label">Kriteria</label>
        <select id="kriteria_id" class="form-select" name="kriteria_id" required>
            
            <option value="" disabled selected>Pilih Kriteria</option>
            @foreach($selectKriteria as $kriterias)
                <option value="{{ $kriterias->id }}">{{ $kriterias->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3 col-md-5">
        <label for="file_path" class="form-label">File Dokumen</label>
        <input type="file" id="file_path" name="file_path" class="form-control" accept=".pdf,.doc,.docx" required>
        <small class="form-text text-muted">Hanya file PDF atau Word (maksimal 5 MB).</small>
    </div>
    <div class="mb-3 col-md-5 d-flex justify-content-between">
        <a href="{{ route('user.dokumen.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Unggah</button>
    </div>
</form>
@endsection
