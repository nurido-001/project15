<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <!-- Brand Logo -->
  <div class="app-brand demo">
    <a href="{{ route('dashboard') }}" class="app-brand-link">
      <span class="app-brand-logo demo">
        <svg width="32" height="22" viewBox="0 0 32 22" fill="none"
             xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd"
            d="M0.0017 0V6.85398C0.0017 6.85398 -0.1332 9.01207 1.9809 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.238 0H0.0017Z"
            fill="#7367F0" />
          <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
            d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
            fill="#161616" />
          <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
            d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
            fill="#161616" />
          <path fill-rule="evenodd" clip-rule="evenodd"
            d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
            fill="#7367F0" />
        </svg>
      </span>
      <span class="app-brand-text demo menu-text fw-bold">Wisataku</span>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <!-- Sidebar Menu -->
  <ul class="menu-inner py-1">
    <!-- Home -->
    <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
      <a href="{{ route('home') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-home"></i>
        <div>Home</div>
      </a>
    </li>

    <!-- Dashboard Statistik -->
    <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
      <a href="{{ route('dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-smart-home"></i>
        <div>Dashboard</div>
      </a>
    </li>

    <!-- Dashboard Cards -->
    <li class="menu-item {{ request()->routeIs('dashboard.cards') ? 'active' : '' }}">
      <a href="{{ route('dashboard.cards') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-layout-grid"></i>
        <div>Dashboard Cards</div>
      </a>
    </li>

    <!-- Kelola Admin -->
    <li class="menu-item {{ request()->routeIs('admin.*') ? 'active' : '' }}">
      <a href="{{ route('admin.index') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-user-shield"></i>
        <div>Kelola Admin</div>
      </a>
    </li>

    <!-- Kelola Pengguna -->
    <li class="menu-item {{ request()->routeIs('pengguna.*') ? 'active' : '' }}">
      <a href="{{ route('pengguna.index') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-users"></i>
        <div>Kelola Pengguna</div>
      </a>
    </li>

    <!-- Kelola Tempat Wisata -->
    <li class="menu-item {{ request()->routeIs('wisata.*') ? 'active' : '' }}">
      <a href="{{ route('wisata.index') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-map"></i>
        <div>Kelola Tempat Wisata</div>
      </a>
    </li>

    <!-- Lihat Grafik Pengguna -->
    <li class="menu-item {{ request()->routeIs('grafik.*') ? 'active' : '' }}">
      <a href="{{ route('grafik.index') }}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-chart-bar"></i>
        <div>Lihat Grafik Pengguna</div>
      </a>
    </li>
  </ul>
</aside>
