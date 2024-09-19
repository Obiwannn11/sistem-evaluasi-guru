<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">



        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>


        {{-- cek jika super admin  --}}
        <?php if (true) : ?>
         <!-- dropdown nav 3 -->
    <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav2" data-bs-toggle="collapse" href="#">
      <i class="bi bi-gear"></i><span>Setting</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>

    <ul id="forms-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">


            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('user.index') }}">
                    <i class='bx bx-user'></i>
                    <span>User</span>
                </a>
            </li>


        <li class="nav-item">
            <a class="nav-link collapsed" href="admin/pengaturan">
                <i class='bx bx-cog'></i>
                <span>Pengaturan</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="admin/slide">
                <i class='bx bx-image-alt'></i>
                <span>Slide</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="admin/prodi">
                <i class='bx bx-buildings'></i>
                <span>Prodi</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="admin/profil">
                <i class='bx bx-id-card'></i>
                <span>Profil</span>
            </a>
        </li>

        </ul>

    </li>
    <!-- end dropdown nav 3 -->

    <?php endif ?>

         <!-- dropdown nav 1 -->
    <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-person-fill"></i><span>Profil</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="admin/pengumuman">
          <i class="bi bi-circle-fill"></i><span>Pengumuman</span>
        </a>
      </li>
      <li>
        <a href="admin/visi">
          <i class="bi bi-circle-fill"></i><span>Visi, Misi, Tujuan</span>
        </a>
      </li>
      <li>
        <a href="admin/prestasi">
          <i class="bi bi-circle-fill"></i><span>Prestasi</span>
        </a>
      </li>
    </ul>
    </li>
    <!-- End dropdown Nav 1-->


         <!-- dropdown nav 2 -->
    <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav1" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-bookmark-fill"></i><span>Perencanaan</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="admin/">
          <i class="bi bi-circle-fill"></i><span>Metode</span>
        </a>
      </li>
      <li>
        <a href="{{ route('materi.index') }}">
          <i class="bi bi-circle-fill"></i><span>Materi</span>
        </a>
      </li>
      <li>
        <a href="admin/prestasi">
          <i class="bi bi-circle-fill"></i><span>Indikator Keberhasilan</span>
        </a>
      </li>
    </ul>
    </li>
    <!-- End dropdown Nav 2-->

         <!-- dropdown nav exe -->
    <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-navExe" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-check"></i><span>Evaluasi</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-navExe" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="admin/pengumuman">
          <i class="bi bi-circle-fill"></i><span>Metode</span>
        </a>
      </li>
      <li>
        <a href="admin/visi">
          <i class="bi bi-circle-fill"></i><span>Materi</span>
        </a>
      </li>
      <li>
        <a href="admin/prestasi">
          <i class="bi bi-circle-fill"></i><span>Indikator Keberhasilan</span>
        </a>
      </li>
    </ul>
    </li>
    <!-- End dropdown Nav exe-->


    </ul>

</aside><!-- End Sidebar-->
