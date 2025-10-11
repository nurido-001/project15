<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">

    <!-- Toggle button for sidebar (mobile) -->
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-md"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center w-100" id="navbar-collapse">

        <!-- 🔍 Search Bar -->
        <form action="{{ route('wisata.search') }}" method="GET" class="d-flex align-items-center w-50">
            <input type="text" name="q" class="form-control form-control-sm me-2" placeholder="Cari wisata..." value="{{ request('q') }}">
            <button type="submit" class="btn btn-sm btn-primary">
                <i class="ti ti-search"></i>
            </button>
        </form>

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- 🔔 Notifications -->
            <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-2">
                <a class="nav-link btn btn-text-secondary btn-icon rounded-pill dropdown-toggle hide-arrow"
                    href="#" data-bs-toggle="dropdown">
                    <span class="position-relative">
                        <i class="ti ti-bell ti-md"></i>
                        <span class="badge rounded-pill bg-danger badge-dot badge-notifications border"></span>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end p-0">
                    <li class="dropdown-menu-header border-bottom">
                        <div class="dropdown-header d-flex align-items-center py-3">
                            <h6 class="mb-0 me-auto">Notifikasi</h6>
                        </div>
                    </li>
                    <li class="border-top">
                        <div class="d-grid p-3">
                            <a class="btn btn-primary btn-sm d-flex justify-content-center" href="#">
                                <small class="align-middle">Lihat semua notifikasi</small>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>

            <!-- 👤 User Menu -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow p-0" href="#" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{ asset('img/avatars/default.png') }}" alt="User Avatar" class="rounded-circle"/>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    @auth
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-online me-2">
                                        <img src="{{ asset('img/avatars/default.png') }}" class="rounded-circle"/>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                                        <small class="text-muted">User</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li><div class="dropdown-divider"></div></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item text-danger">
                                    <i class="ti ti-logout me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                    @endauth
                </ul>
            </li>
        </ul>
    </div>
</nav>
