@extends('layouts.main')

@section('index_profil')

<div class="card shadow p-3">
    <h5>Profil </h5>
</div>

<div class="card shadow p-3">

    <div class="row g-3 mb-3">

        <div class="col-md-3">
            <?php if (true) : ?>
                <img src="{{ asset('images/setting/noprofil.png') }}" alt="" class="rounded w-100">
            <?php else : ?>
                <img src="{{ asset('images/setting/noprofil.png') }}" alt="" class="rounded w-100">
            <?php endif ?>
        </div>

        <div class="col-md-9">
            <table class="table">
                <tbody>
                    <tr>
                        <td width="100">Email</td>
                        <td width="5">:</td>
                        <td class="fw-bold">Admin@smkmadani.ac.id</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td class="fw-bold">Mustikasari</td>
                    </tr>
                    <tr>
                        <td>Role</td>
                        <td>:</td>
                        <td class="fw-bold">SuperGuru</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</div>


@endsection
