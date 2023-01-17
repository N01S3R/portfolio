<!-- Navbar -->
<header class="mb-2">
    <div class="header-top">
        <div class="container">
            <div class="logo">
                <a href="index.html"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo"
                        srcset=""></a>
            </div>
            <div class="header-top-right">
                <div class="dropdown">
                    <a href="#" class="user-dropdown d-flex dropend" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div class="avatar avatar-md2">
                            <img src="{{ url('avatars/' . auth()->user()->avatar) }}" alt="Avatar">
                        </div>
                        <div class="text">
                            <h6 class="user-dropdown-name"
                                style="color: {{ auth()->user()->roles->pluck('colors')[0] }}">
                                {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</h6>
                            <p class="user-dropdown-status text-sm text-muted">
                                {{ auth()->user()->roles->pluck('name')[0] }}</p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">My Account</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a href="{{ route('logout') }}" class="dropdown-item"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <!-- Burger button responsive -->
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </div>
        </div>
    </div>
</header>
<!-- Navbar -->
