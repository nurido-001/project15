<aside class="sidebar">
    <div class="app-brand">
        <a href="{{ route('dashboard') }}" class="text-decoration-none text-white fw-bold fs-4">
            <i class="ti ti-map-pin me-2"></i> Wisataku
        </a>
    </div>

    <ul class="menu-inner">
        <!-- Dashboard Statistik -->
        <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon ti ti-smart-home"></i>
                <div>Dashboard</div>
            </a>
        </li>

        <!-- Dashboard Cards -->
        <li class="menu-item {{ request()->routeIs('dashboard.cards') ? 'active' : '' }}">
            <a href="{{ route('dashboard.cards') }}" class="menu-link">
                <i class="menu-icon ti ti-layout-grid"></i>
                <div>Dashboard Cards</div>
            </a>
        </li>

        <!-- Kelola Pengguna -->
        <li class="menu-item {{ request()->routeIs('pengguna.*') ? 'active' : '' }}">
            <a href="{{ route('pengguna.index') }}" class="menu-link">
                <i class="menu-icon ti ti-users"></i>
                <div>Kelola Pengguna</div>
            </a>
        </li>

        <!-- Kelola Tempat Wisata -->
        <li class="menu-item {{ request()->routeIs('wisata.*') ? 'active' : '' }}">
            <a href="{{ route('wisata.index') }}" class="menu-link">
                <i class="menu-icon ti ti-map"></i>
                <div>Kelola Tempat Wisata</div>
            </a>
        </li>

        <!-- Lihat Grafik Pengguna -->
        <li class="menu-item {{ request()->routeIs('grafik.*') ? 'active' : '' }}">
            <a href="{{ route('grafik.index') }}" class="menu-link">
                <i class="menu-icon ti ti-chart-bar"></i>
                <div>Lihat Grafik Pengguna</div>
            </a>
        </li>
    </ul>
</aside>
