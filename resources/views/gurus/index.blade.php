@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Daftar Guru</h1>
    <a href="{{ route('gurus.create') }}" class="btn btn-primary mb-3">Tambah Guru</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Bidang Studi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($gurus as $guru)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $guru->nama }}</td>
                    <td>{{ $guru->nip }}</td>
                    <td>{{ $guru->bidangStudi }}</td>
                    <td>
                        <a href="{{ route('gurus.edit', $guru->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('gurus.destroy', $guru->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data guru ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada data guru.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
