@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Daftar Kriteria</h1>
    <a href="{{ route('kriterias.create') }}" class="btn btn-primary mb-3">Tambah Kriteria</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kriteria</th>
                <th>Bobot</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kriterias as $kriteria)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kriteria->nama }}</td>
                    <td>{{ $kriteria->bobot }}</td>
                    <td>
                        <a href="{{ route('kriterias.edit', $kriteria->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kriterias.destroy', $kriteria->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kriteria ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada kriteria.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
