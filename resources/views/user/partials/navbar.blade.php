<header class="mb-5">
    <div class="header-top">
        <div class="container">
            <div class="logo">
                <a href="index.html"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo"
                        srcset=""></a>
            </div>
            <div>
                <a href="#" class="px-2">
                    <img src="{{ asset('storage/images/metal.gif') }}" alt="" width="30" height="24">
                    {{ auth()->user()->resource->metal }}
                </a>
                <a href="#" class="px-2">
                    <img src="{{ asset('storage/images/crystal.gif') }}" alt="" width="30" height="24">
                    {{ auth()->user()->resource->crystal }}
                </a>
                <a href="#" class="px-2">
                    <img src="{{ asset('storage/images/deuterium.gif') }}" alt="" width="30" height="24">
                    {{ auth()->user()->resource->deuter }}
                </a>
                <a href="#" class="px-2">
                    <img src="{{ asset('storage/images/energy.gif') }}" alt="" width="30"
                        height="24">
                        {{ auth()->user()->resource->energy }}
                </a>
                <a href="#" class="px-2">
                    <img src="{{ asset('storage/images/darkmatter.gif') }}" alt="" width="30"
                        height="24">
                        {{ auth()->user()->resource->antimater }}
                </a>
            </div>
            <div class="header-top-right">

                <div class="dropdown">
                    <a href="#" class="user-dropdown d-flex dropend" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div class="avatar avatar-md2">
                            <img src="{{ asset('assets/images/faces/1.jpg') }}" alt="Avatar">
                        </div>
                        <div class="text">
                            <h6 class="user-dropdown-name">John Ducky</h6>
                            <p class="user-dropdown-status text-sm text-muted">Member</p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">My Account</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
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
    {{-- <nav class="main-navbar">
        <div class="container">
            <ul>
                <li class="menu-item  ">
                    <a href="index.html" class='menu-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav> --}}

</header>
