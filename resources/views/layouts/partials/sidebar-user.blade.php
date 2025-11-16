<aside class="sidebar">
    <!-- User Info -->
    <div class="sidebar-header">
        <small>Welcome,</small>
        <div class="user-name">{{ Auth::user()->name ?? 'Zidan' }}</div>
    </div>

    <!-- Navigation Menu -->
    <div class="sidebar-menu">
        <a href="{{ route('user.index') }}" class="{{ request()->routeIs('user.index') ? 'active' : '' }}">
            <i class="ti-layout-grid2"></i> Dashboard
        </a>

        <a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile.*') ? 'active' : '' }}">
            <i class="ti-user"></i> My Profile
        </a>

        <a href="{{ route('user.courses.enrolled') }}" class="{{ request()->routeIs('user.courses.*') ? 'active' : '' }}">
            <i class="ti-book"></i> Enrolled Courses
        </a>

        <a href="{{ route('user.quiz.attempt.index') }}" class="{{ request()->routeIs('user.quiz.attempt.index') ? 'active' : '' }}">
            <i class="ti-write"></i> My Quiz Attempts
        </a>

        <a href="" class="{{ Request::is('projects*') ? 'active' : '' }}">
            <i class="ti-briefcase"></i> My Project
        </a>

        <a href="" class="{{ Request::is('certificates*') ? 'active' : '' }}">
            <i class="ti-medall"></i> Certificate
        </a>

        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="ti-shift-right"></i> Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</aside>
