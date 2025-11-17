<aside class="sidebar">
    <!-- User Info -->
    <div class="sidebar-header">
        <small>Welcome,</small>
        <div class="user-name">{{ Auth::user()->name ?? 'Zidan' }}</div>
    </div>

    <!-- Navigation Menu -->
    <div class="sidebar-menu">
        <a href="{{ route('mentor.index') }}" class="{{ request()->routeIs('mentor.index') ? 'active' : '' }}">
            <i class="ti-layout-grid2"></i> Dashboard
        </a>

        <a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile.*') ? 'active' : '' }}">
            <i class="ti-user"></i> My Profile
        </a>

        <!-- <a href="" class="{{ request()->routeIs('courses/enrolled*') ? 'active' : '' }}">
            <i class="ti-book"></i> Enrolled Courses
        </a> -->

        <a href="{{ route('mentor.quiz.attempt.index') }}" class="{{ request()->routeIs('mentor.quiz.*') ? 'active' : '' }}">
            <i class="ti-write"></i> Student Quiz Attempts
        </a>

        <a href="{{ route('mentor.project.index') }}" class="{{ Request::routeIs('mentor.project.*') ? 'active' : '' }}">
            <i class="ti-briefcase"></i> Student Project
        </a>

        <!-- <a href="" class="{{ Request::is('certificates*') ? 'active' : '' }}">
            <i class="ti-medall"></i> Certificate
        </a> -->

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
