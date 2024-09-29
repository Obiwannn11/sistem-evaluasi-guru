     <!-- ======= Header ======= -->
     <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between ">
            <i class="bi bi-list toggle-sidebar-btn"></i>
            <a href="{{ route('user.index') }}" class="logo d-flex align-items-center mx-4">
                <img src="{{ asset('images/setting/smkmandar.png') }}" alt="">
                {{-- BUAT DINAMIS BERDASARKAN SETTING  --}}
                <span class="d-none d-lg-block mx-2">SMK MANDAR</span>
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
                <?php if (1 === 1): ?>
                    <img src="{{ asset('images/setting/noprofil.png') }}" alt="" class="rounded-circle">
                <?php else : ?>
                    <img src="{{ asset('images/setting/noprofil.png') }}" alt="" class="rounded-circle">
                <?php endif ?>
                <span class="d-none d-md-block dropdown-toggle ps-2"  ></span>
            </a><!-- End Profile Image Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                    <h6>Nama    : Mustikasari</h6>
                    <span>Role  : Guru</span>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('user.index') }}">
                        <i class="bi bi-person"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('user.index') }}">
                        <i class="bi bi-gear"></i>
                        <span>Account Settings</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('user.index') }}">
                        <i class='bi bi-house-door'></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                    </a>
                </li>

            </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

    </ul>
</nav><!-- End Icons Navigation -->
{{-- END NAVBAR  --}}



</header><!-- End Header -->
