@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Berikan Nilai Kinerja Guru</h1>

    <form action="{{ route('skors.store') }}" method="POST">
        @csrf

        <!-- Pilih Guru -->
        <div class="form-group">
            <label for="id_guru">Pilih Guru</label>
            <select name="id_guru" id="id_guru" class="form-control" required>
                <option value="" selected disabled>-- Pilih Guru --</option>
                @foreach ($gurus as $guru)
                    <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                @endforeach
            </select>
        </div>

        <!-- Daftar Kriteria -->
        <div class="form-group mt-4">
            <h4>Daftar Kriteria</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kriteria</th>
                        <th>Nilai (0-4)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kriterias as $kriteria)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kriteria->nama_kriteria }}</td>
                            <td>
                                <select name="skors[{{ $kriteria->id }}]" class="form-control" required>
                                    <option value="" selected disabled>-- Pilih Nilai --</option>
                                    @for ($i = 0; $i <= 4; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Tombol Submit -->
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-primary">Simpan Nilai</button>
        </div>
    </form>
</div>
@endsection
