<header class="header-section-1">
    <div id="header-sticky" class="header-1">
        <div class="container">
            <div class="mega-menu-wrapper">
                <div class="header-main">
                    <div class="header-left">
                        <div class="logo">
                            <a href="{{ route('home') }}" class="header-logo">
                                <img class="logo-default" src="{{ asset('images/logo/logo.png') }}" alt="logo" style="width:70px; height:auto;">
                                <img class="logo-sticky" src="{{ asset('images/logo/logo2.png') }}" alt="logo sticky" style="width:70px; height:auto;">
                            </a>
                        </div>
                    </div>
                    <div class="header-middle">
                        <div class="mean__menu-wrapper">
                            <div class="main-menu">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li>
                                            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                                        </li>
                                        <li>
                                            <a href="{{ request()->routeIs('home') ? '#about' : route('home') . '#about' }}"
                                               class="{{ request()->routeIs('home') && request()->url() . request()->getRequestUri() === route('home') . '#about' ? 'active' : '' }}">
                                                About
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ request()->routeIs('home') ? '#program' : route('home') . '#program' }}"
                                               class="{{ request()->routeIs('home') && request()->url() . request()->getRequestUri() === route('home') . '#program' ? 'active' : '' }}">
                                                Program
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ request()->routeIs('home') ? '#project' : route('home') . '#project' }}"
                                               class="{{ request()->routeIs('home') && request()->url() . request()->getRequestUri() === route('home') . '#project' ? 'active' : '' }}">
                                                Project
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('blog') }}" class="{{ request()->routeIs('blog*') ? 'active' : '' }}">Blog</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('faq') }}" class="{{ request()->routeIs('faq') ? 'active' : '' }}">Faq's</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact Us</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="header-right d-flex justify-content-end align-items-center">
                        <a href="#0" class="search-trigger search-icon"><i class="fal fa-search"></i></a>
                        <div class="header-button ms-4">
                            <a href="{{ route('login') }}" class="theme-btn">
                                <span>
                                    Log in
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </span>
                            </a>
                        </div>
                        <div class="header__hamburger d-block d-xl-none my-auto">
                            <div class="sidebar__toggle">
                                <i class="fas fa-bars"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
