@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Hasil Evaluasi Kinerja Guru</h1>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Guru</th>
                <th>Total Skor Diperoleh</th>
                <th>Total Skor Maksimal</th>
                <th>Persentase</th>
            </tr>
        </thead>
        <tbody>
            {{ dd($evaluasiResults) }}
            @foreach ($evaluasiResults as $result)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $result['guru']->nama }}</td>
                    <td>{{ $result['total_skor'] }}</td>
                    <td>{{ $result['total_skor_maksimal'] }}</td>
                    <td>{{ $result['persentase'] }}%</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
