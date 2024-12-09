@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Daftar Dokumen</h1>
    <a href="{{ route('dokumens.create') }}" class="btn btn-primary">Tambah Dokumen</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Guru</th>
                <th>Kriteria</th>
                <th>File</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dokumens as $dokumen)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $dokumen->guru->nama }}</td>
                    <td>{{ $dokumen->kriteria->nama_kriteria }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $dokumen->file_path) }}" target="_blank">Lihat File</a>
                    </td>
                    <td>
                        <a href="{{ route('dokumens.edit', $dokumen) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('dokumens.destroy', $dokumen) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
