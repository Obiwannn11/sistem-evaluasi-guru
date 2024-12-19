@extends('layouts.main')

@section('content')
<h1>Detail Penilaian Guru: {{ $guru->nama }}</h1>
<p>NIP: {{ $guru->nip }}</p>

<table class="table">
    <thead>
        <tr>
            <th>Kriteria</th>
            <th>Nilai</th>
            <th>Komentar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($evaluasi as $e)
        <tr>
            <td>{{ $e->kriteria->nama }}</td> <!-- Asumsi ada relasi kriteria di model Evaluasi -->
            <td>{{ $e->nilai ?? 0 }}</td>
            <td>{{ $e->komentar ?? 'Tidak ada Komentar'}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('penilaian.index') }}" class="btn btn-primary">Kembali</a>
@endsection
