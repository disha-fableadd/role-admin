<aside id="layout-menu" class="layout-menu menu-vertical menu bg-label-secondary fixed">
    <div class="app-brand demo">
        <a href="{{ url('/dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo me-1">
                <!-- Logo here -->
            </span>
            <span class="app-brand-text demo menu-text fw-semibold ms-2">Materio</span>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    @if (session('role') == 'admin') <!-- Admin -->
        <ul class="menu-inner py-1">
            <li class="menu-item">
                <a href="{{ url('/dashboard') }}" class="menu-link">
                    <i class="menu-icon tf-icons ri-home-smile-line"></i>
                    <div data-i18n="Dashboards">Dashboard</div>
                </a>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ri-layout-2-line"></i>
                    <div data-i18n="Layouts">Users</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ url('/adduser') }}" class="menu-link">
                            <div data-i18n="Add User">Add User</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('/allusers') }}" class="menu-link">
                            <div data-i18n="All Users">All Users</div>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- More Admin Links -->
        </ul>
    @elseif (session('role') == 'manager') <!-- Manager -->
        <ul class="menu-inner py-1">
            <li class="menu-item">
                <a href="{{ url('/dashboard') }}" class="menu-link">
                    <i class="menu-icon tf-icons ri-home-smile-line"></i>
                    <div data-i18n="Dashboards">Dashboard</div>
                </a>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ri-layout-2-line"></i>
                    <div data-i18n="Layouts">Projects</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ url('/projects') }}" class="menu-link">
                            <div data-i18n="All Projects">All Projects</div>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- More Manager Links -->
        </ul>
    @elseif (session('role') == 'staff') <!-- Staff -->
        <ul class="menu-inner py-1">
            <li class="menu-item">
                <a href="{{ url('/dashboard') }}" class="menu-link">
                    <i class="menu-icon tf-icons ri-home-smile-line"></i>
                    <div data-i18n="Dashboards">Dashboard</div>
                </a>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ri-layout-2-line"></i>
                    <div data-i18n="Layouts">Projects</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{ url('/projects') }}" class="menu-link">
                            <div data-i18n="All Projects">All Projects</div>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- More Staff Links -->
        </ul>
    @endif

    <li class="menu-item">
        <a href="{{ url('/profile') }}" class="menu-link">
            <i class="menu-icon tf-icons ri-user-line"></i>
            <div data-i18n="Profile">Profile</div>
        </a>
    </li>
    
    <li class="menu-item">
        <a href="{{ url('/logout') }}" class="menu-link">
            <i class="menu-icon tf-icons ri-logout-box-line"></i>
            <div data-i18n="Logout">Logout</div>
        </a>
    </li>
</aside>
