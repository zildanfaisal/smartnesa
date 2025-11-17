<aside class="sidebar">
    <!-- User Info -->
    <div class="sidebar-header">
        <small>Welcome,</small>
        <div class="user-name">{{ Auth::user()->name ?? 'User' }}</div>
    </div>

    <!-- Navigation Menu -->
    <div class="sidebar-menu">

        {{-- Dashboard --}}
        <a href="{{ route('user.index') }}"
           class="{{ request()->routeIs('user.index') ? 'active' : '' }}">
            <i class="ti-layout-grid2"></i> Dashboard
        </a>

        {{-- Profile --}}
        <a href="{{ route('profile.edit') }}"
           class="{{ request()->routeIs('profile.*') ? 'active' : '' }}">
            <i class="ti-user"></i> My Profile
        </a>

        {{-- Enrolled Courses --}}
        <a href="{{ route('user.courses.enrolled') }}"
           class="{{ request()->routeIs('user.courses.*') ? 'active' : '' }}">
            <i class="ti-book"></i> Enrolled Courses
        </a>

        {{-- Quiz Attempts --}}
        <a href="{{ route('user.quiz.attempt.index') }}"
           class="{{ request()->routeIs('user.quiz.*') ? 'active' : '' }}">
            <i class="ti-write"></i> My Quiz Attempts
        </a>

        {{-- My Project --}}
        <a href="{{ route('user.project.index') }}"
           class="{{ request()->routeIs('user.project.*') ? 'active' : '' }}">
            <i class="ti-briefcase"></i> My Project
        </a>

        {{-- Certificate --}}
        <a href="#"
           class="{{ request()->is('certificates*') ? 'active' : '' }}">
            <i class="ti-medall"></i> Certificate
        </a>

        {{-- Logout --}}
       <a href="{{ route('logout') }}"  onclick="confirmLogout(); return false;"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="ti-shift-right"></i> Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

    </div>
</aside>
<script>
function confirmLogout() {
    Swal.fire({
        title: 'Logout?',
        text: "Apakah Anda yakin ingin keluar?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Logout',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('logout-form').submit();
        }
    });
}
</script>
