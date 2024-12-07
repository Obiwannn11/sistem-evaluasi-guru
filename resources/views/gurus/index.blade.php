@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Daftar Guru</h1>
    <a href="{{ route('gurus.create') }}" class="btn btn-primary">Tambah Guru</a>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gurus as $guru)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $guru->nama }}</td>
                    <td>{{ $guru->email }}</td>
                    <td>
                        {{-- <a href="{{ route('gurus.show', $guru) }}" class="btn btn-info">Detail</a> --}}
                        <a href="{{ route('gurus.edit', $guru->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('gurus.destroy', $guru->id) }}" method="POST" style="display: inline-block;">
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
