<div>
    <div class="brand-logo d-flex align-items-center justify-content-center">
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
            <li class="sidebar-item">
                <a class="sidebar-link active selected" href="javascript:void(0)" aria-expanded="false">
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
            <li class="sidebar-item">
                <a class="sidebar-link" href="javascript:void(0)" aria-expanded="false">
                    <span>
                        <i class="ti ti-books"></i>
                    </span>
                    <span class="hide-menu">Management</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="javascript:void(0)" aria-expanded="false">
                    <span>
                        <i class="ti ti-square-check"></i>
                    </span>
                    <span class="hide-menu">Verification</span>
                </a>
            </li>
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Administrator</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="javascript:void(0)" aria-expanded="false">
                    <span>
                        <i class="ti ti-users"></i>
                    </span>
                    <span class="hide-menu">Users</span>
                </a>
            </li>
        </ul>
        <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
            <div class="d-flex">
                <div class="unlimited-access-title me-3">
                    <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Enroll other course</h6>
                    <a href="#" target="_blank" class="btn btn-primary fs-2 fw-semibold lh-sm">Explore</a>
                </div>
                <div class="unlimited-access-img">
                    <img src="{{ asset('assets/vendor/theme/images/backgrounds/rocket.png') }}" alt="" class="img-fluid" />
                </div>
            </div>
        </div>
    </nav>
    <!-- End Sidebar navigation -->
</div>