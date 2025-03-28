@extends('layouts.main')

@section('content')
<h1>Detail Penilaian Guru: {{ $guru->nama }}</h1>
<h5 class="mb-3">NIP: {{ $guru->nip }}</h5>

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
            <td class="fw-bold">{{ $e->kriteria->nama }}</td> <!-- Asumsi ada relasi kriteria di model Evaluasi -->
            <td class="fw-bold">{{ $e->nilai ?? "Belum Dinilai" }}</td>
            <td>{{ $e->komentar ?? 'Tidak ada Komentar'}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('penilaian.index') }}" class="btn btn-primary">Kembali</a>
@endsection
