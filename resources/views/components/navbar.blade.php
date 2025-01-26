     <!-- ======= Header ======= -->
     <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between ">
            <i class="bi bi-list toggle-sidebar-btn"></i>
            <a href="" class="logo d-flex align-items-center mx-4">
                <img src="{{ asset('images/setting/logo-uin.png') }}" alt="">
                {{-- BUAT DINAMIS BERDASARKAN SETTING  --}}
                <span class="d-none d-lg-block mx-2">SMK ALAUDDIN</span>
            </a>
        </div><!-- End Logo -->


{{-- START NAVBAR --}}
<nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">
            <?php
            // $id = $_SESSION['id_user'];
            // SELECT * FROM user WHERE id_user = $id ");
            ?>
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown" >
                    <img src="{{ asset('images/setting/noprofil.png') }}" alt="" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2"  ></span>
            </a><!-- End Profile Image Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header text-start">
                    <h6>Nama    : {{ Auth::User()->nama }} </h6>
                    <span>Role  : {{ Auth::User()->is_admin == 0 ? "Guru" : "Kepala Sekolah"  }}</span>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="">
                        <i class="bi bi-person"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="">
                        <i class="bi bi-gear"></i>
                        <span>Account Settings</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="">
                        <i class='bi bi-house-door'></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        {{-- <button type="submit" class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal"> --}}
                        <button type="submit" class="dropdown-item d-flex align-items-center" >
                                <i class="bi bi-box-arrow-right"></i>
                                <span >Logout</span>
                        </button>
                    </form>
                </li>

            </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

    </ul>
</nav><!-- End Icons Navigation -->
{{-- END NAVBAR  --}}



</header><!-- End Header -->
