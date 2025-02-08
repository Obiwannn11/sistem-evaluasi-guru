@extends('layouts.main')

@section('content')
<h1>Daftar Penilaian Guru</h1>

<table class="table">
    <thead>
        <tr>
            <th>Nama Guru</th>
            <th>NIP</th>
            <th>Total Nilai</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        {{-- {{ dd($gurus) }} --}}
        @foreach ($dataGurus as $data)
        <tr>
            <td>{{ $data['guru']->nama }}</td>
            <td>{{ $data['guru']->nip }}</td>
            <td>{{ $data['nilai']/12 }}</td>
            <td>
                <a href="{{ route('penilaian.show', $data['guru']->id) }}" class="btn btn-info">Lihat Detail</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
