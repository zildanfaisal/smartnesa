@extends('layouts.dashboard')

@section('title', 'Dashboard Admin - Smartnesa')

@section('content')
<!-- Hero Section -->
<div class="hero-section" data-aos="fade-down">
    <div class="hero-content">
        <div class="hero-left">
            <img class="hero-avatar" src="{{ Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->nama ?? Auth::user()->name ?? 'Admin') . '&background=dc2626&color=fff' }}"
                 alt="avatar" onerror="this.src='https://i.pravatar.cc/150?img=1'">
            <div class="hero-info">
                <div class="hero-subtitle">System Administrator</div>
                <h1 class="hero-title">{{ Auth::user()->nama ?? Auth::user()->name ?? 'Admin' }}</h1>
                <div class="hero-chips">
                    <span class="chip chip-admin">
                        <i class="ti-crown"></i> Administrator
                    </span>
                    <span class="chip">
                        <i class="ti-shield"></i> Full Access
                    </span>
                    <span class="chip">
                        <i class="ti-user"></i> {{ $totalUsers ?? 0 }} Users
                    </span>
                </div>
            </div>
        </div>
        <div class="hero-right">
            <a href="{{ route('admin.users.create') }}" class="btn-start-learning">
                <i class="ti-plus"></i> ADD NEW USER
            </a>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="stats-container" data-aos="fade-up">
    <div class="stat-card stat-users">
        <div class="stat-icon">
            <i class="ti-user"></i>
        </div>
        <div class="stat-number">{{ $totalUsers ?? 0 }}</div>
        <div class="stat-label">TOTAL USERS</div>
    </div>

    <div class="stat-card stat-essays">
        <div class="stat-icon">
            <i class="ti-file"></i>
        </div>
        <div class="stat-number">{{ $totalEssays ?? 0 }}</div>
        <div class="stat-label">TOTAL ESSAYS</div>
    </div>

    <div class="stat-card stat-modules">
        <div class="stat-icon">
            <i class="ti-video-camera"></i>
        </div>
        <div class="stat-number">{{ $totalModules ?? 0 }}</div>
        <div class="stat-label">TOTAL MODULES</div>
    </div>

    <div class="stat-card stat-scores">
        <div class="stat-icon">
            <i class="ti-bar-chart"></i>
        </div>
        <div class="stat-number">{{ $avgScore ?? 0 }}</div>
        <div class="stat-label">AVERAGE SCORE</div>
    </div>
</div>

<!-- Quick Stats & Recent Activity -->
<div class="row mt-4 px-4" data-aos="fade-up">
    <!-- User Role Distribution -->
    <div class="col-lg-4 mb-4">
        <div class="info-card">
            <div class="info-card-header">
                <h5><i class="ti-pie-chart"></i> User Distribution</h5>
            </div>
            <div class="info-card-body">
                <div class="role-stat">
                    <div class="role-info">
                        <span class="role-label">
                            <i class="ti-crown text-danger"></i> Admin
                        </span>
                        <span class="role-count">{{ $usersByRole['admin'] ?? 0 }}</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-danger" style="width: {{ $totalUsers > 0 ? (($usersByRole['admin'] ?? 0) / $totalUsers * 100) : 0 }}%"></div>
                    </div>
                </div>

                <div class="role-stat">
                    <div class="role-info">
                        <span class="role-label">
                            <i class="ti-shield text-warning"></i> Mentor
                        </span>
                        <span class="role-count">{{ $usersByRole['mentor'] ?? 0 }}</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-warning" style="width: {{ $totalUsers > 0 ? (($usersByRole['mentor'] ?? 0) / $totalUsers * 100) : 0 }}%"></div>
                    </div>
                </div>

                <div class="role-stat">
                    <div class="role-info">
                        <span class="role-label">
                            <i class="ti-user text-success"></i> User
                        </span>
                        <span class="role-count">{{ $usersByRole['user'] ?? 0 }}</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-success" style="width: {{ $totalUsers > 0 ? (($usersByRole['user'] ?? 0) / $totalUsers * 100) : 0 }}%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Essay Statistics -->
    <div class="col-lg-4 mb-4">
        <div class="info-card">
            <div class="info-card-header">
                <h5><i class="ti-clipboard"></i> Essay Statistics</h5>
            </div>
            <div class="info-card-body">
                @foreach($essaysByBab ?? [] as $bab => $count)
                <div class="essay-stat">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span><i class="ti-book"></i> {{ $bab }}</span>
                        <span class="badge bg-primary">{{ $count }}</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-primary" style="width: {{ $totalEssays > 0 ? ($count / $totalEssays * 100) : 0 }}%"></div>
                    </div>
                </div>
                @endforeach

                <div class="mt-3 pt-3 border-top">
                    <div class="d-flex justify-content-between">
                        <span class="text-muted">Reviewed</span>
                        <span class="badge bg-success">{{ $reviewedEssays ?? 0 }}</span>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <span class="text-muted">Pending</span>
                        <span class="badge bg-warning">{{ $pendingEssays ?? 0 }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="col-lg-4 mb-4">
        <div class="info-card">
            <div class="info-card-header">
                <h5><i class="ti-bolt"></i> Quick Actions</h5>
            </div>
            <div class="info-card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-outline-primary btn-sm shadow-sm m-2">
                        <i class="ti-user-plus me-2"></i>Add New User
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-success btn-sm shadow-sm m-2">
                        <i class="ti-id-badge me-2"></i>Manage Users
                    </a>
                    <a href="{{ route('admin.project.index') }}" class="btn btn-outline-info btn-sm shadow-sm m-2">
                        <i class="ti-files me-2"></i>View All Essays
                    </a>
                    <a href="{{ route('admin.quiz.attempt.index') }}" class="btn btn-outline-warning btn-sm shadow-sm m-2">
                        <i class="ti-clipboard me-2"></i>Quiz Attempts
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Users Table -->
<div class="row px-4 mb-4" data-aos="fade-up">
    <div class="col-lg-12">
        <div class="table-card">
            <div class="table-card-header">
                <h5><i class="ti-user"></i> Recent Users</h5>
                <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-primary shadow-sm">
                    View All <i class="ti-arrow-right ms-1"></i>
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">No</th>
                            <th width="20%">Name</th>
                            <th width="20%">Email</th>
                            <th width="20%">University</th>
                            <th width="10%">Role</th>
                            <th width="15%">Registered</th>
                            <th width="10%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentUsers ?? [] as $index => $user)
                        <tr>
                            <td class="fw-semibold text-muted">{{ $index + 1 }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ $user->foto ? asset('storage/' . $user->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($user->nama) . '&background=667eea&color=fff' }}"
                                         alt="{{ $user->nama }}"
                                         class="rounded-circle shadow-sm"
                                         style="width: 40px; height: 40px; object-fit: cover;">
                                    <strong class="text-dark">{{ $user->nama }}</strong>
                                </div>
                            </td>
                            <td><span class="text-muted">{{ $user->email }}</span></td>
                            <td>
                                <small class="text-muted">{{ Str::limit($user->univ ?? '-', 25) }}</small>
                            </td>
                            <td>
                                @if($user->role == 'admin')
                                    <span class="badge bg-danger rounded-pill px-3">Admin</span>
                                @elseif($user->role == 'mentor')
                                    <span class="badge bg-warning rounded-pill px-3">Mentor</span>
                                @else
                                    <span class="badge bg-success rounded-pill px-3">User</span>
                                @endif
                            </td>
                            <td>
                                <small class="text-muted"><i class="ti-calendar me-1"></i>{{ $user->created_at->format('d M Y') }}</small>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                   class="btn btn-sm btn-outline-primary rounded-pill px-3"
                                   title="Edit User">
                                    <i class="ti-pencil me-1"></i>Edit
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <i class="ti-info-alt text-muted" style="font-size: 2.5rem; opacity: 0.3;"></i>
                                <p class="text-muted mt-2 mb-0">No users found</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    /* Hero Section */
    .hero-section {
        background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
        padding: 50px 60px;
        border-radius: 20px;
        margin: 30px;
        color: white;
    }

    .hero-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 30px;
    }

    .hero-left {
        display: flex;
        align-items: center;
        gap: 25px;
        flex: 1;
    }

    .hero-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 5px solid rgba(255,255,255,0.2);
        object-fit: cover;
    }

    .hero-subtitle {
        font-size: 14px;
        opacity: 0.9;
        margin-bottom: 8px;
    }

    .hero-title {
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 15px;
        line-height: 1.2;
    }

    .hero-chips {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .chip {
        background: rgba(255,255,255,0.2);
        padding: 8px 15px;
        border-radius: 20px;
        font-size: 13px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .chip-admin {
        background: rgba(255,255,255,0.3);
        font-weight: 600;
    }

    .btn-start-learning {
        background: white;
        color: #dc2626;
        padding: 14px 30px;
        border-radius: 25px;
        font-weight: 700;
        font-size: 15px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .btn-start-learning:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        color: #dc2626;
    }

    /* Stats Container */
    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        padding: 40px 30px;
    }

    .stat-card {
        background: white;
        padding: 35px 30px;
        border-radius: 15px;
        text-align: center;
        box-shadow: 0 2px 10px rgba(0,0,0,0.06);
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    }

    .stat-icon {
        width: 70px;
        height: 70px;
        margin: 0 auto 20px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
    }

    .stat-users .stat-icon {
        background: #fee2e2;
        color: #dc2626;
    }

    .stat-essays .stat-icon {
        background: #dbeafe;
        color: #2563eb;
    }

    .stat-modules .stat-icon {
        background: #fef3c7;
        color: #f59e0b;
    }

    .stat-scores .stat-icon {
        background: #d1fae5;
        color: #059669;
    }

    .stat-number {
        font-size: 48px;
        font-weight: 700;
        color: #212529;
        margin-bottom: 8px;
    }

    .stat-label {
        font-size: 13px;
        font-weight: 600;
        color: #6c757d;
        letter-spacing: 0.5px;
    }

    /* Info Cards */
    .info-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.06);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .info-card:hover {
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        transform: translateY(-3px);
    }

    .info-card-header {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        padding: 20px;
        border-bottom: 2px solid #e2e8f0;
    }

    .info-card-header h5 {
        margin: 0;
        font-size: 16px;
        font-weight: 700;
        color: #2d3748;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .info-card-header h5 i {
        color: #dc2626;
    }

    .info-card-body {
        padding: 20px;
    }

    .info-card-body .btn {
        font-weight: 600;
        padding: 12px 20px;
        border-radius: 10px;
        transition: all 0.3s ease;
        border-width: 2px;
    }

    .info-card-body .btn:hover {
        transform: translateX(5px);
    }

    .role-stat, .essay-stat {
        margin-bottom: 20px;
    }

    .role-stat:last-child, .essay-stat:last-child {
        margin-bottom: 0;
    }

    .role-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
    }

    .role-label {
        font-weight: 600;
        color: #2d3748;
    }

    .role-count {
        font-weight: 700;
        color: #4a5568;
    }

    .progress {
        height: 8px;
        border-radius: 10px;
    }

    /* Table Card */
    .table-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.06);
        overflow: hidden;
        margin-bottom: 30px;
        transition: all 0.3s ease;
    }

    .table-card:hover {
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .table-card-header {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        padding: 20px 25px;
        border-bottom: 2px solid #e2e8f0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .table-card-header h5 {
        margin: 0;
        font-size: 18px;
        font-weight: 700;
        color: #2d3748;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .table-card-header h5 i {
        color: #dc2626;
    }

    .table {
        margin: 0;
    }

    .table thead th {
        background: #f8fafc;
        color: #4a5568;
        font-weight: 700;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 2px solid #e2e8f0;
        padding: 18px 20px;
    }

    .table tbody td {
        padding: 18px 20px;
        vertical-align: middle;
        border-bottom: 1px solid #f1f5f9;
    }

    .table tbody tr {
        transition: all 0.2s ease;
    }

    .table tbody tr:hover {
        background-color: #f8fafc;
        transform: scale(1.01);
    }

    .table tbody tr:last-child td {
        border-bottom: none;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .hero-content {
            flex-direction: column;
            text-align: center;
        }

        .hero-left {
            flex-direction: column;
        }

        .hero-chips {
            justify-content: center;
        }
    }

    @media (max-width: 768px) {
        .hero-section {
            padding: 30px 20px;
            margin: 15px;
        }

        .hero-title {
            font-size: 28px;
        }

        .stats-container {
            padding: 15px;
            gap: 15px;
        }
    }
</style>
@endsection
