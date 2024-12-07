@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Daftar Penilaian Guru</h1>
    <a href="{{ route('penilaians.create') }}" class="btn btn-primary mb-3">Tambah Penilaian</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Guru</th>
                <th>Kriteria</th>
                <th>Nilai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($penilaians as $penilaian)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $penilaian->guru->nama }}</td>
                    <td>{{ $penilaian->kriteria->nama }}</td>
                    <td>{{ $penilaian->nilai }}</td>
                    <td>
                        <a href="{{ route('penilaians.edit', $penilaian->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('penilaians.destroy', $penilaian->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus penilaian ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada penilaian.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
