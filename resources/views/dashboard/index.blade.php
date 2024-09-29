@extends('layouts.main')

@section('content')

<div class="card shadow p-3">
    <h5>Dashboard</h5>
</div>

<section class="section dashboard">
    <div class="row g-3 justify-content-center">

        <!-- user -->
        <div class="col-md-3">
            <div class="card info-card sales-card">

                <div class="card-body">
                    <h5 class="card-title">Nama :</h5>

                    <div class="d-flex align-items-center">
                       <!-- <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i c lass='bx bx-user'></i>
                        </div> -->
                        <div class="">
                            <h6><?= "Mustikasari"; ?></h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end user -->

        <!-- slide -->
        <div class="col-md-4">
            <div class="card info-card sales-card">

                <div class="card-body">
                    <h5 class="card-title">Jabatan :</h5>

                    <div class="d-flex align-items-center">
                        <!-- <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class='bx bx-image-alt'></i>
                        </div> -->
                        <div class="">
                            <h6><?= "Guru Bahasa Inggris"; ?></h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end user -->

        <!-- prodi -->
        <div class="col-md-3">
            <div class="card info-card sales-card">

                <div class="card-body">
                    <h5 class="card-title">Hak Akses :</h5>

                    <div class="d-flex align-items-center">
                        <!-- <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class='bx bx-buildings'></i>
                        </div> -->
                        <div class="">
                            <h6><?= "Guru"; ?></h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end prodi -->

        <!-- status perencanaan -->
        <div class="col-md-5">
            <div class="card info-card sales-card">

                <div class="card-body">
                    <h5 class="card-title">Status Perencanaan Program Kurikulum Merdeka :</h5>

                    <div class="d-flex align-items-center">
                        <!-- <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class='bx bx-buildings'></i>
                        </div> -->
                        <div class="">
                            <h6><?= "Selesai ✅" ?></h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end status perencanaan -->

        <!-- status evaluasi -->
        <div class="col-md-5">
            <div class="card info-card sales-card">

                <div class="card-body">
                    <h5 class="card-title">Status Evaluasi Program Kurikulum Merdeka :</h5>

                    <div class="d-flex align-items-center">
                        <!-- <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class='bx bx-buildings'></i>
                        </div> -->
                        <div class="">
                            <h6><?= "Belum Selesai ❌" ?></h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end status evaluasi -->

    </div>
</section>


@endsection

