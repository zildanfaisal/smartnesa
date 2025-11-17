<aside class="sidebar">
    <!-- User Info -->
    <div class="sidebar-header">
        <small>Welcome,</small>
        <div class="user-name">{{ Auth::user()->nama ?? Auth::user()->name ?? 'Mentor' }}</div>
    </div>

    <!-- Navigation Menu -->
    <div class="sidebar-menu">
        <a href="{{ route('mentor.index') }}" class="{{ request()->routeIs('mentor.index') ? 'active' : '' }}">
            <i class="ti-layout-grid2"></i> Dashboard
        </a>

        <a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile.*') ? 'active' : '' }}">
            <i class="ti-user"></i> My Profile
        </a>

        <a href="{{ route('mentor.quiz.attempt.index') }}" class="{{ request()->routeIs('mentor.quiz.*') ? 'active' : '' }}">
            <i class="ti-write"></i> Student Quiz Attempts
        </a>

        <a href="{{ route('mentor.project.index') }}" class="{{ Request::routeIs('mentor.project.*') ? 'active' : '' }}">
            <i class="ti-briefcase"></i> Student Project
        </a>

        {{-- Logout --}}
        <a href="#" onclick="confirmLogout(); return false;">
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
        title: 'Keluar dari Smartnesa?',
        text: "Anda akan keluar dari sesi saat ini",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Logout',
        cancelButtonText: 'Batal',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Logging out...',
                text: 'Mohon tunggu sebentar',
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                willOpen: () => {
                    Swal.showLoading();
                }
            });
            document.getElementById('logout-form').submit();
        }
    });
}
</script>
