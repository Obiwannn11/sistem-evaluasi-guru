@extends('layouts.main')

@section('content')
<h1>Evaluasi Kinerja Guru</h1>
<table class="table">
    <thead>
        <tr>
            <th>Nama Guru</th>
            <th>NIP</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($guru as $item)
        <tr>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->nip }}</td>
            <td>{{ $item->email }}</td>
            <td>
                <a href="{{ route('evaluasi.show', $item->id) }}" class="btn btn-primary">Evaluasi</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
