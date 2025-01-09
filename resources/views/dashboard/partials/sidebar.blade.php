<div>
    <div class="brand-logo d-flex align-items-center justify-content-around">
        <a href="#" class="text-nowrap logo-img">
            {{-- <img src="{{ asset('assets/image/logo.png') }}" width="50" alt="Brand Logo" class="rounded"/> --}}
            <h2 class="text-brand d-inline-block">Fluency</h2>
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
        </div>
    </div>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
            <li class="nav-small-cap mt-0">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item {{ Request::is('dashboard') ? 'active selected' : '' }}">
                <a class="sidebar-link" href="/dashboard" aria-expanded="false">
                    <span>
                        <i class="ti ti-layout-dashboard"></i>
                    </span>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>

            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Course</span>
            </li>
            <li class="sidebar-item {{ Request::is('dashboard/courses*') ? 'active selected' : '' }}">
                <a class="sidebar-link" href="/dashboard/courses" aria-expanded="false">
                    <span>
                        <i class="ti ti-books"></i>
                    </span>
                    <span class="hide-menu">My Course</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('dashboard/certificates*') ? 'active selected' : '' }}">
                <a class="sidebar-link" href="/dashboard/certificates" aria-expanded="false">
                    <span>
                        <i class="ti ti-certificate"></i>
                    </span>
                    <span class="hide-menu">Certificate</span>
                </a>
            </li>

            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Settings</span>
            </li>
            <li class="sidebar-item {{ Request::is('dashboard/profile*') ? 'active selected' : '' }}">
                <a class="sidebar-link" href="/dashboard/profile" aria-expanded="false">
                    <span>
                        <i class="ti ti-user"></i>
                    </span>
                    <span class="hide-menu">Profile</span>
                </a>
            </li>
        </ul>
        <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
            <div class="d-flex">
                <div class="unlimited-access-title me-3">
                    <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Enroll other courses</h6>
                    <a href="/courses" class="btn btn-primary fs-2 fw-semibold lh-sm">Explore</a>
                </div>
                <div class="unlimited-access-img">
                    <img src="{{ asset('assets/vendor/theme/images/backgrounds/rocket.png') }}" alt="" class="img-fluid" />
                </div>
            </div>
        </div>
    </nav>
    <!-- End Sidebar navigation -->
</div>