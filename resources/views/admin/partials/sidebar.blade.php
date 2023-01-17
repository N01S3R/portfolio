<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo"
                            srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Dashboard</li>
                <li class="sidebar-item {{ Route::is('admin.dashboard.index') ? 'active' : null }} ">
                    <a href="{{ route('admin.dashboard.index') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            </ul>
            <ul class="menu">
                <li class="sidebar-title">Users Managment</li>
                <li class="sidebar-item {{ Route::is('admin.users.index') ? 'active' : null }}">
                    <a href="{{ route('admin.users.index') }}" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('admin.roles.index') ? 'active' : null }}">
                    <a href="{{ route('admin.roles.index') }}" class='sidebar-link'>
                        <i class="bi bi-plus-square"></i>
                        <span>Roles</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('admin.permissionsCategory.index') ? 'active' : null }}">
                    <a href="{{ route('admin.permissionsCategory.index') }}" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>PermissionsCategory</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('admin.permissions.index') ? 'active' : null }}">
                    <a href="{{ route('admin.permissions.index') }}" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Permissions</span>
                    </a>
                </li>
            </ul>
            <ul class="menu">
                <li class="sidebar-title">Dashboard</li>
                <li class="sidebar-item {{ Route::is('admin.dashboard.index') ? 'active' : null }} ">
                    <a href="{{ route('admin.dashboard.index') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            </ul>
        </div>
