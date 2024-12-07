<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        {{-- nav item dashboard --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href=""<i class="bi bi-grid"></i>
                <i class="bi bi-house-door"></i><span>Dashboard</span>
            </a>
        </li>
        {{-- end of nav item dashboard --}}

        <!-- dropdown nav 1 -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav2" data-bs-toggle="collapse" href="#">
              <i class="bi bi-gear"></i><span>Setting</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <ul id="forms-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="">
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
            </ul>
        </li>
        {{-- end dropdown nav 1 --}}

        {{-- nav item guru --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('gurus.index') }}" <i class='bi bi-grid'></i>
                <i class="bi bi-person"></i><span>Guru</span>
            </a>
        </li>
        {{-- end of nav item guru --}}

        {{-- nav item Kriteria --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('kriterias.index') }}" <i class="bi bi-grid"></i>
                <i class="bi bi-list-check"></i><span>Kriteria</span>
            </a>
        </li>
        {{-- end of nav item Kriteria --}}

        {{-- nav item evaluasi --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('evaluasis.index') }}" <i class="bi bi-grid"></i> 
                <i class="bi bi-journal-check"></i><span>Evaluasi</span>
            </a>
        </li>
        {{-- end of nav item evaluasi --}}


    </ul>



</aside><!-- End Sidebar-->
