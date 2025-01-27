@extends('layouts.main')

@section('content')

<div class="card shadow p-3">
    <h5>Dashboard</h5>
</div>

<section class="section dashboard">
    <div class="row g-3 justify-content-center">

        <!-- namas -->
        <div class="col-md-4">
            <div class="card info-card sales-card">

                <div class="card-body">
                    <h5 class="card-title">Nama :</h5>

                    <div class="d-flex align-items-center">
                       <!-- <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i c lass='bx bx-user'></i>
                        </div> -->
                        <div class="">
                            <h6>{{ Auth::User()->nama }}</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end namas -->

        <!-- hak aksess -->
        <div class="col-md-4">
            <div class="card info-card sales-card">

                <div class="card-body">
                    <h5 class="card-title">Hak Akses :</h5>

                    <div class="d-flex align-items-center">
                        <!-- <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class='bx bx-buildings'></i>
                        </div> -->
                        <div class="">
                            <h6> {{ Auth::User()->is_admin == 0 ? "Guru" : "Kepala Sekolah"  }} </h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end hak aksess -->


        <!-- emails -->
        <div class="col-md-4">
            <div class="card info-card sales-card">

                <div class="card-body">
                    <h5 class="card-title">Email :</h5>

                    <div class="d-flex align-items-center">
                        <!-- <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class='bx bx-image-alt'></i>
                        </div> -->
                        <div class="">
                            <h6> {{ Auth::User()->email }}</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end emails -->


        <!-- status perencanaan -->
        <div class="col-md-4">
            <div class="card info-card sales-card">

                <div class="card-body">
                    <h5 class="card-title">Status Perencanaan :</h5>

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
        <div class="col-md-4">
            <div class="card info-card sales-card">

                <div class="card-body">
                    <h5 class="card-title">Status Evaluasi :</h5>

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

