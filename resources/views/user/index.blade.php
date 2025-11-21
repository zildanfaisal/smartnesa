@extends('layouts.dashboard')

@section('title', 'Dashboard - Smartnesa')

@section('content')
<!-- Hero Section -->
<div class="hero-section" data-aos="fade-down">
    <div class="hero-content">
        <div class="hero-left">
            <img class="hero-avatar"
                 src="{{ Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->nama) . '&background=4361ee&color=fff' }}"
                 alt="avatar">
            <div class="hero-info">
                <div class="hero-subtitle">Looking forward to learning</div>
                <h1 class="hero-title">{{ Auth::user()->nama ?? 'User' }}</h1>
                <div class="hero-chips">
                    <span class="chip">
                        <i class="ti-location-pin"></i> {{ Auth::user()->univ ?? 'Universitas' }}
                    </span>
                    <span class="chip">
                        <i class="ti-id-badge"></i> {{ Auth::user()->jurusan ?? 'Jurusan' }}
                    </span>
                    <span class="chip">
                        <i class="ti-calendar"></i> Angkatan {{ Auth::user()->angkatan ?? '-' }}
                    </span>
                </div>
            </div>
        </div>
        <div class="hero-right">
            <a href="{{ route('user.courses.enrolled') }}" class="btn-start-learning">
                <i class="ti-bolt"></i> START LEARNING
            </a>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="stats-container" data-aos="fade-up">
    <div class="stat-card stat-enrolled">
        <div class="stat-icon">
            <i class="ti-file"></i>
        </div>
        <div class="stat-number">{{ $totalEssays ?? 0 }}</div>
        <div class="stat-label">MY ESSAYS</div>
    </div>

    <div class="stat-card stat-active">
        <div class="stat-icon">
            <i class="ti-video-camera"></i>
        </div>
        <div class="stat-number">{{ $totalModules ?? 0 }}</div>
        <div class="stat-label">MODULES AVAILABLE</div>
    </div>

    <div class="stat-card stat-completed">
        <div class="stat-icon">
            <i class="ti-bar-chart"></i>
        </div>
        <div class="stat-number">{{ $averageScore ?? 0 }}</div>
        <div class="stat-label">AVERAGE SCORE</div>
    </div>
</div>

<!-- Main Content -->
<div class="row mt-4 px-4" data-aos="fade-up">
    <!-- My Essays -->
    <div class="col-lg-8 mb-4">
        <div class="content-card">
            <div class="content-card-header">
                <h5><i class="ti-files"></i> My Recent Essays</h5>
                <a href="{{ route('user.project.index') }}" class="btn btn-sm btn-primary">
                    View All <i class="ti-arrow-right"></i>
                </a>
            </div>
            <div class="content-card-body">
                @forelse($recentEssays ?? [] as $essay)
                <div class="essay-item">
                    <div class="essay-info">
                        <div class="essay-bab">
                            <span class="badge bg-primary">{{ $essay->essay_bab }}</span>
                        </div>
                        <div class="essay-details">
                            <h6>{{ $essay->essay_name }}</h6>
                            <small class="text-muted">
                                <i class="ti-calendar"></i> {{ $essay->created_at->format('d M Y') }}
                            </small>
                        </div>
                    </div>
                    <div class="essay-actions">
                        @if($essay->comment)
                            <span class="badge bg-success mb-2">
                                <i class="ti-check"></i> Reviewed
                            </span>
                        @else
                            <span class="badge bg-warning mb-2">
                                <i class="ti-time"></i> Pending
                            </span>
                        @endif
                        <div class="btn-group">
                            <a href="{{ asset('storage/' . $essay->essay_file) }}"
                               target="_blank"
                               class="btn btn-sm btn-outline-info">
                                <i class="ti-eye"></i>
                            </a>
                            <a href="{{ route('user.project.show', $essay->id) }}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="ti-list"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="empty-state">
                    <i class="ti-info-alt"></i>
                    <p>Belum ada essay yang diupload.</p>
                    <a href="{{ route('user.project.create') }}" class="btn btn-primary btn-sm mt-2">
                        <i class="ti-plus"></i> Upload Essay
                    </a>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Quick Stats & Actions -->
    <div class="col-lg-4 mb-4">
        <!-- Progress Card -->
        <div class="content-card mb-4">
            <div class="content-card-header">
                <h5><i class="ti-pie-chart"></i> My Progress</h5>
            </div>
            <div class="content-card-body">
                <div class="progress-item">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Essay Completed</span>
                        <span class="fw-bold">{{ $essayProgress ?? 0 }}%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-success" style="width: {{ $essayProgress ?? 0 }}%"></div>
                    </div>
                </div>

                <div class="progress-item mt-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Module Completed</span>
                        <span class="fw-bold">{{ $moduleProgress ?? 0 }}%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-primary" style="width: {{ $moduleProgress ?? 0 }}%"></div>
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top">
                    <div class="d-flex justify-content-between mb-2">
                        <span><i class="ti-book"></i> Bab 1</span>
                        <span class="badge bg-info">{{ $essayByBab['Bab 1'] ?? 0 }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span><i class="ti-book"></i> Bab 2</span>
                        <span class="badge bg-info">{{ $essayByBab['Bab 2'] ?? 0 }}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span><i class="ti-book"></i> Bab 3</span>
                        <span class="badge bg-info">{{ $essayByBab['Bab 3'] ?? 0 }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="content-card">
            <div class="content-card-header">
                <h5><i class="ti-bolt"></i> Quick Actions</h5>
            </div>
            <div class="content-card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('user.project.create') }}" class="btn btn-outline-primary btn-sm">
                        <i class="ti-plus"></i> Upload Essay
                    </a>
                    <a href="{{ route('user.courses.enrolled') }}" class="btn btn-outline-success btn-sm">
                        <i class="ti-video-camera"></i> View Modules
                    </a>
                    <a href="{{ route('user.quiz.attempt.index') }}" class="btn btn-outline-info btn-sm">
                        <i class="ti-clipboard"></i> Quiz Attempts
                    </a>
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-warning btn-sm">
                        <i class="ti-user"></i> Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Active Class Card -->
<div class="active-class-section px-4" data-aos="fade-up">
    <div class="active-class-card">
        <h2 class="section-title">Available Modules</h2>

        <div class="modules-grid">
            @forelse($availableModules ?? [] as $module)
            <div class="module-card">
                <div class="module-icon">
                    <i class="ti-video-camera"></i>
                </div>
                <div class="module-info">
                    <h6>{{ $module->title }}</h6>
                    <p class="text-muted small mb-2">{{ Str::limit($module->description, 60) }}</p>
                    @if($module->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </div>
                @if($module->is_active)
                <a href="{{ $module->link }}" class="btn btn-sm btn-light">
                    <i class="ti-arrow-right"></i>
                </a>
                @endif
            </div>
            @empty
            <div class="col-12 text-center py-4">
                <i class="ti-info-alt text-muted" style="font-size: 3rem;"></i>
                <p class="text-muted mt-2">No modules available</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

<style>
    /* Hero Section */
    .hero-section {
        background: linear-gradient(135deg, #4361ee 0%, #3730a3 100%);
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

    .btn-start-learning {
        background: white;
        color: #4361ee;
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
        color: #4361ee;
    }

    /* Stats Container */
    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
        padding: 30px;
        padding-top: 40px;
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

    .stat-enrolled .stat-icon {
        background: #e7f0ff;
        color: #4361ee;
    }

    .stat-active .stat-icon {
        background: #f3e8ff;
        color: #9333ea;
    }

    .stat-completed .stat-icon {
        background: #ffe8f0;
        color: #ec4899;
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

    /* Content Cards */
    .content-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.06);
        overflow: hidden;
    }

    .content-card-header {
        background: #f8fafc;
        padding: 20px 25px;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .content-card-header h5 {
        margin: 0;
        font-size: 16px;
        font-weight: 600;
        color: #2d3748;
    }

    .content-card-body {
        padding: 20px 25px;
    }

    /* Essay Item */
    .essay-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        margin-bottom: 15px;
        transition: all 0.3s ease;
    }

    .essay-item:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        transform: translateY(-2px);
    }

    .essay-item:last-child {
        margin-bottom: 0;
    }

    .essay-info {
        display: flex;
        gap: 15px;
        align-items: center;
        flex: 1;
    }

    .essay-details h6 {
        margin: 0 0 5px 0;
        font-size: 15px;
        color: #2d3748;
    }

    .essay-actions {
        text-align: right;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 40px 20px;
        color: #718096;
    }

    .empty-state i {
        font-size: 3rem;
        opacity: 0.3;
        margin-bottom: 15px;
    }

    /* Active Class Section */
    .active-class-section {
        padding: 30px;
    }

    .active-class-card {
        background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
        border-radius: 20px;
        padding: 40px;
        color: white;
    }

    .section-title {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 30px;
        color: white;
    }

    /* Modules Grid */
    .modules-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
    }

    .module-card {
        background: rgba(255,255,255,0.1);
        border: 1px solid rgba(255,255,255,0.2);
        border-radius: 12px;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 15px;
        transition: all 0.3s ease;
    }

    .module-card:hover {
        background: rgba(255,255,255,0.15);
        transform: translateY(-3px);
    }

    .module-icon {
        width: 50px;
        height: 50px;
        background: rgba(255,255,255,0.2);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        flex-shrink: 0;
    }

    .module-info {
        flex: 1;
    }

    .module-info h6 {
        color: white;
        margin: 0 0 5px 0;
        font-size: 16px;
    }

    .progress {
        height: 10px;
        border-radius: 10px;
        background: #e2e8f0;
    }

    .progress-bar {
        border-radius: 10px;
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

        .modules-grid {
            grid-template-columns: 1fr;
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

        .active-class-section {
            padding: 15px;
        }

        .active-class-card {
            padding: 25px;
        }

        .essay-item {
            flex-direction: column;
            gap: 15px;
        }

        .essay-actions {
            text-align: center;
            width: 100%;
        }
    }
</style>
@endsection
