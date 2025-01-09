<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                    <i class="ti ti-bell-ringing"></i>
                    <div class="notification bg-primary rounded-circle"></div>
                </a>
            </li>
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (auth()->user()->photo)
                            <img src="{{ asset('storage' . '/' . auth()->user()->photo) }}" alt="" width="35" height="35" class="rounded-circle" />
                        @else
                            <img src="{{ asset('assets/vendor/theme/images/profile/user-1.jpg') }}" alt="" width="35" height="35" class="rounded-circle" />
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <a href="/admin/profile" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-user fs-6"></i>
                                <p class="mb-0 fs-3">Profile</p>
                            </a>
                            <a href="/" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-home fs-6"></i>
                                <p class="mb-0 fs-3">Homepage</p>
                            </a>
                            <form action="/logout" method="post" class="d-flex align-items-center gap-2 px-3 mb-2">
                                @csrf
                                <button type="submit" class="btn btn-outline-primary mt-2 d-block w-100 btn-logout">Logout</button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>