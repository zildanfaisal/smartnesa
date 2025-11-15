<nav class="navbar main-nav navbar-expand-lg px-2 px-sm-0 py-2 py-lg-0">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="{{ asset('images/logo.png') }}" alt="logo">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="ti-menu"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>

                {{-- Dropdown Pages --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Pages
                        <span><i class="ti-angle-down"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('live-course') }}">Live-Course</a></li>
                        <li><a class="dropdown-item" href="{{ route('e-learning') }}">E-Learning</a></li>
                        <li><a class="dropdown-item" href="{{ route('event-smartnesa') }}">Event Smartnesa</a></li>
                        <li><a class="dropdown-item" href="{{ route('event-national') }}">Event National</a></li>
                        <li><a class="dropdown-item" href="{{ route('blog') }}">Blog</a></li>
                        <li><a class="dropdown-item" href="{{ route('faq') }}">FAQ</a></li>
                        {{-- <li><a class="dropdown-item" href="{{ route('faq') }}">FAQ</a></li> --}}
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('e-learning') }}">E-Learning</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('simpelmawa') }}">Simpelmawa</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>

                {{-- Dashboard dropdown --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Dashboard
                        <span><i class="ti-angle-down"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        @auth
                            {{-- Kalau sudah login, tampilkan sesuai role --}}
                            @if(auth()->user()->isAdmin())
                                <li><a class="dropdown-item" href="{{ route('admin.index') }}">Dashboard Admin</a></li>
                            @elseif(auth()->user()->isMentor())
                                <li><a class="dropdown-item" href="{{ route('mentor.index') }}">Dashboard Mentor</a></li>
                            @else
                                <li><a class="dropdown-item" href="{{ route('user.index') }}">Dashboard Mentee</a></li>
                            @endif
                        @else
                            {{-- Kalau belum login, arahkan ke login --}}
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login as Mentee</a></li>
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login as Mentor</a></li>
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login as Admin</a></li>
                        @endauth
                    </ul>
                </li>

                {{-- Login/Daftar --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Daftar
                        <span><i class="ti-angle-down"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('register') }}">Sign Up</a></li>
                        <li><a class="dropdown-item" href="{{ route('login') }}">Log In</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>
