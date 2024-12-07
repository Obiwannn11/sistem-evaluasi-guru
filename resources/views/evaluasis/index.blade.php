@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Hasil Evaluasi</h1>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Guru</th>
                <th>Total Skor</th>
                <th>Persentase</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($evaluasis as $evaluasi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $evaluasi->guru->nama }}</td>
                    <td>{{ $evaluasi->total_skor }}</td>
                    <td>{{ $evaluasi->persentase }}%</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
