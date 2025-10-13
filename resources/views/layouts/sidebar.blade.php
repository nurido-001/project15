<aside class="sidebar bg-success text-white">
    <div class="app-brand text-center py-3 border-bottom border-white border-opacity-25">
        <a href="{{ route('dashboard') }}" 
           class="text-decoration-none text-white fw-bold fs-4 d-flex align-items-center justify-content-center">
            <i class="ti ti-map-pin me-2 fs-3"></i> 
            WisataKu
        </a>
    </div>

    <ul class="menu-inner list-unstyled mt-3 px-2">

        {{-- 🏠 Dashboard Statistik --}}
        <li class="menu-item {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" 
               class="menu-link d-flex align-items-center text-white text-decoration-none py-2 px-3 rounded">
                <i class="menu-icon ti ti-smart-home me-2"></i>
                <div>Dashboard</div>
            </a>
        </li>

        {{-- 🗺️ Rekomendasi Tempat Wisata --}}
        <li class="menu-item {{ request()->routeIs('cards.index') ? 'active' : '' }}">
            <a href="{{ route('dashboard.cards') }}" 
               class="menu-link d-flex align-items-center text-white text-decoration-none py-2 px-3 rounded">
                <i class="menu-icon ti ti-map-pin me-2"></i>
                <div>Rekomendasi Tempat Wisata</div>
            </a>
        </li>

        {{-- 👥 Kelola Pengguna (Hanya untuk admin) --}}
        @auth
            @if (Auth::user()->role === 'admin')
                <li class="menu-item {{ request()->routeIs('pengguna.*') ? 'active' : '' }}">
                    <a href="{{ route('pengguna.index') }}" 
                       class="menu-link d-flex align-items-center text-white text-decoration-none py-2 px-3 rounded">
                        <i class="menu-icon ti ti-users me-2"></i>
                        <div>Kelola Pengguna</div>
                    </a>
                </li>
            @endif
        @endauth

        {{-- 🧭 Jelajahi Tempat Wisata --}}
        <li class="menu-item {{ request()->routeIs('wisata.*') ? 'active' : '' }}">
            <a href="{{ route('wisata.index') }}" 
               class="menu-link d-flex align-items-center text-white text-decoration-none py-2 px-3 rounded">
                <i class="menu-icon ti ti-map me-2"></i>
                <div>Jelajahi Tempat Wisata</div>
            </a>
        </li>

        {{-- 📊 Lihat Grafik Pengguna --}}
        <li class="menu-item {{ request()->routeIs('grafik.index') ? 'active' : '' }}">
            <a href="{{ route('grafik.index') }}" 
               class="menu-link d-flex align-items-center text-white text-decoration-none py-2 px-3 rounded">
                <i class="menu-icon ti ti-chart-bar me-2"></i>
                <div>Lihat Grafik Pengguna</div>
            </a>
        </li>

    </ul>
</aside>

<style>
.sidebar {
    width: 250px;
    min-height: 100vh;
    background: linear-gradient(180deg, #16a34a, #15803d);
    color: #fff;
}
.menu-item {
    margin-bottom: 6px;
}
.menu-link:hover,
.menu-item.active .menu-link {
    background-color: rgba(255, 255, 255, 0.15);
    color: #fff;
    transform: translateX(4px);
    transition: all 0.3s ease;
}
.menu-icon {
    font-size: 1.3rem;
}
</style>
