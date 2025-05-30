<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="{{ route('dashboard') }}" class="brand-link">
            <!--begin::Brand Image-->
            <img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light text-uppercase">School-App</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Tableau de bord</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('etudiant.index') }}"
                        class="nav-link {{ request()->routeIs('etudiant.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>Étudiants</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('evaluations.index') }}"
                        class="nav-link {{ request()->routeIs('evaluations.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-journal-check"></i>
                        <p>Évaluations</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('notes.index') }}"
                        class="nav-link {{ request()->routeIs('notes.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-pencil-square"></i>
                        <p>Notes</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('statistiques.index') }}"
                        class="nav-link {{ request()->routeIs('statistiques.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-bar-chart-line"></i>
                        <p>Statistiques</p>
                    </a>
                </li>

            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
