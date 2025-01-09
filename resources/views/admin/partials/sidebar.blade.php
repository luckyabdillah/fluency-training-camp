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
            <li class="sidebar-item {{ Request::is('admin') ? 'active selected' : '' }}">
                <a class="sidebar-link" href="/admin" aria-expanded="false">
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

            <li class="sidebar-item {{ Request::is('admin/courses*') ? 'active selected' : '' }}">
                <a class="sidebar-link" href="/admin/courses" aria-expanded="false">
                    <span>
                        <i class="ti ti-books"></i>
                    </span>
                    <span class="hide-menu">Management</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('admin/quizzes*') ? 'active selected' : '' }}">
                <a class="sidebar-link" href="/admin/quizzes" aria-expanded="false">
                    <span>
                        <i class="ti ti-message"></i>
                    </span>
                    <span class="hide-menu">Quiz</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('admin/verifications*') ? 'active selected' : '' }}">
                <a class="sidebar-link" href="/admin/verifications" aria-expanded="false">
                    <span>
                        <i class="ti ti-square-check"></i>
                    </span>
                    <span class="hide-menu">Verification</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('admin/students*') ? 'active selected' : '' }}">
                <a class="sidebar-link" href="/admin/students" aria-expanded="false">
                    <span>
                        <i class="ti ti-users"></i>
                    </span>
                    <span class="hide-menu">Students</span>
                </a>
            </li>

            {{-- <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Settings</span>
            </li>
            <li class="sidebar-item {{ Request::is('admin/profile*') ? 'active selected' : '' }}">
                <a class="sidebar-link" href="/admin/profile" aria-expanded="false">
                    <span>
                        <i class="ti ti-user"></i>
                    </span>
                    <span class="hide-menu">Profile</span>
                </a>
            </li> --}}
            
            @can('admin')
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Administrator</span>
                </li>
                <li class="sidebar-item {{ Request::is('admin/users*') ? 'active selected' : '' }}">
                    <a class="sidebar-link" href="/admin/users" aria-expanded="false">
                        <span>
                            <i class="ti ti-user"></i>
                        </span>
                        <span class="hide-menu">Users</span>
                    </a>
                </li>
            @endcan
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>