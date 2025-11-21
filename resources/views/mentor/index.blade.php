<!-- 1. VIEW BLADE - mentor/index.blade.php -->
@extends('layouts.dashboard')

@section('title', 'Dashboard Mentor - Smartnesa')

@section('content')
<!-- Hero Section -->
<div class="hero-section" data-aos="fade-down">
    <div class="hero-content">
        <div class="hero-left">
            <img class="hero-avatar" src="{{ Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->nama ?? Auth::user()->name ?? 'Mentor') . '&background=4361ee&color=fff' }}"
                 alt="avatar" onerror="this.src='https://i.pravatar.cc/150?img=12'">
            <div class="hero-info">
                <div class="hero-subtitle">Inspiring the next generation</div>
                <h1 class="hero-title">{{ Auth::user()->nama ?? Auth::user()->name ?? 'Mentor Name' }}</h1>
                <div class="hero-chips">
                    <span class="chip chip-mentor">
                        <i class="ti-shield"></i> Mentor
                    </span>
                    <span class="chip">
                        <i class="ti-location-pin"></i> {{ Auth::user()->univ ?? 'Universitas' }}
                    </span>
                    <span class="chip">
                        <i class="ti-user"></i> {{ $totalStudents ?? 0 }} Students
                    </span>
                </div>
            </div>
        </div>
        <div class="hero-right">
            <a href="{{ route('mentor.project.index') }}" class="btn-start-learning">
                <i class="ti-clipboard"></i> REVIEW ESSAYS
            </a>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="stats-container" data-aos="fade-up">
    <div class="stat-card stat-enrolled">
        <div class="stat-icon">
            <i class="ti-user"></i>
        </div>
        <div class="stat-number">{{ $totalStudents ?? 0 }}</div>
        <div class="stat-label">TOTAL STUDENTS</div>
    </div>

    <div class="stat-card stat-active">
        <div class="stat-icon">
            <i class="ti-file"></i>
        </div>
        <div class="stat-number">{{ $totalEssays ?? 0 }}</div>
        <div class="stat-label">TOTAL ESSAYS</div>
    </div>

    <div class="stat-card stat-completed">
        <div class="stat-icon">
            <i class="ti-check-box"></i>
        </div>
        <div class="stat-number">{{ $essaysWithComment ?? 0 }}</div>
        <div class="stat-label">REVIEWED ESSAYS</div>
    </div>

    <div class="stat-card stat-rating">
        <div class="stat-icon">
            <i class="ti-time"></i>
        </div>
        <div class="stat-number">{{ $pendingEssays ?? 0 }}</div>
        <div class="stat-label">PENDING REVIEWS</div>
    </div>
</div>

<!-- Recent Essays & Quick Actions -->
<div class="row mt-4 px-4" data-aos="fade-up">
    <!-- Recent Essays -->
    <div class="col-lg-8 mb-4">
        <div class="card shadow-sm border-0 rounded-3 overflow-hidden">
            <div class="card-header text-white d-flex justify-content-between align-items-center py-3">
                <h5 class="mb-0 fw-bold"><i class="ti-file me-2"></i>Recent Essays Submitted</h5>
                <a href="{{ route('mentor.project.index') }}" class="btn btn-sm btn-light shadow-sm rounded-pill px-3">
                    View All <i class="ti-arrow-right ms-1"></i>
                </a>
            </div>
            <div class="card-body p-4">
                @forelse($recentEssays ?? [] as $essay)
                <div class="essay-item mb-3 p-3 border-2 border-start border-primary rounded-3 bg-light shadow-sm">
                    <div class="d-flex align-items-start">
                        <img src="{{ $essay->user->foto ? asset('storage/' . $essay->user->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($essay->user->nama ?? 'Student') . '&background=667eea&color=fff' }}"
                             alt="{{ $essay->user->nama ?? 'Student' }}"
                             class="student-avatar me-3 shadow"
                             style="width: 55px; height: 55px; border-radius: 50%; object-fit: cover; border: 3px solid #fff;">
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="mb-1 fw-bold text-dark">{{ $essay->essay_name }}</h6>
                                    <div class="text-muted small mb-2">
                                        <i class="ti-user me-1"></i><strong>{{ $essay->user->nama ?? 'Unknown' }}</strong>
                                        <span class="mx-2">|</span>
                                        <i class="ti-book me-1"></i>{{ $essay->essay_bab }}
                                    </div>
                                    <div class="d-flex gap-2 flex-wrap">
                                        <span class="badge bg-info rounded-pill">
                                            <i class="ti-calendar me-1"></i>{{ $essay->created_at->format('d M Y') }}
                                        </span>

                                        @if($essay->comments->count() > 0)
                                            <span class="badge bg-success rounded-pill">
                                                <i class="ti-check me-1"></i>Reviewed ({{ $essay->comments->count() }})
                                            </span>
                                        @else
                                            <span class="badge bg-warning text-dark rounded-pill">
                                                <i class="ti-time me-1"></i>Pending
                                            </span>
                                        @endif

                                        <span class="badge bg-secondary rounded-pill">
                                            <i class="ti-comments me-1"></i>{{ $essay->comments->count() }} Comment(s)
                                        </span>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <a href="{{ asset('storage/' . $essay->essay_file) }}"
                                       target="_blank"
                                       class="btn btn-sm btn-outline-info mb-2 rounded-pill px-3 shadow-sm">
                                        <i class="ti-eye me-1"></i>View PDF
                                    </a>
                                    <a href="{{ route('mentor.project.show', $essay->id) }}"
                                       class="btn btn-sm btn-primary rounded-pill px-3 shadow-sm">
                                        <i class="ti-clipboard me-1"></i>Review
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-5">
                    <i class="ti-info-alt text-muted" style="font-size: 3.5rem; opacity: 0.3;"></i>
                    <p class="text-muted mt-3 mb-0">Belum ada essay yang disubmit.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Statistics & Quick Actions -->
    <div class="col-lg-4 mb-4">
        <!-- Essays by Chapter -->
        <div class="card shadow-sm border-0 rounded-3 mb-4 overflow-hidden">
            <div class="card-header text-white py-3">
                <h6 class="mb-0 fw-bold"><i class="ti-pie-chart me-2"></i>Essays by Chapter</h6>
            </div>
            <div class="card-body p-4">
                @forelse($essaysByChapter ?? [] as $bab => $count)
                <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                    <span class="fw-semibold"><i class="ti-book me-2 text-primary"></i>{{ $bab }}</span>
                    <span class="badge bg-primary rounded-pill px-3 py-2">{{ $count }}</span>
                </div>
                @empty
                <p class="text-muted text-center mb-0">No data available</p>
                @endforelse
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="card shadow-sm border-0 rounded-3 overflow-hidden">
            <div class="card-header text-white py-3">
                <h6 class="mb-0 fw-bold"><i class="ti-bolt me-2"></i>Quick Actions</h6>
            </div>
            <div class="card-body p-4">
                <div class="d-grid gap-2">
                    <a href="{{ route('mentor.project.index') }}" class="btn btn-outline-primary btn-sm shadow-sm rounded-pill m-2">
                        <i class="ti-file me-2"></i>All Essays
                    </a>
                    <a href="{{ route('mentor.quiz.attempt.index') }}" class="btn btn-outline-warning btn-sm shadow-sm rounded-pill m-2">
                        <i class="ti-clipboard me-2"></i>Quiz Attempts
                    </a>
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-info btn-sm shadow-sm rounded-pill m-2">
                        <i class="ti-user me-2"></i>My Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Active Students Table -->
<div class="card shadow-sm mt-4 border-0 rounded-3 mb-4 mx-4" data-aos="fade-up">
    <div class="card-header text-white py-3">
        <h5 class="mb-0 fw-bold"><i class="ti-user me-2"></i>Active Students</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="5%" class="py-3">No</th>
                        <th width="25%" class="py-3">Student Name</th>
                        <th width="25%" class="py-3">University</th>
                        <th width="20%" class="py-3">Jurusan</th>
                        <th width="12%" class="text-center py-3">Total Essays</th>
                        <th width="13%" class="text-center py-3">Avg Score</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($activeStudents ?? [] as $index => $student)
                    <tr class="border-bottom">
                        <td class="fw-semibold text-muted">{{ $index + 1 }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ $student->foto ? asset('storage/' . $student->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($student->nama) . '&background=667eea&color=fff' }}"
                                     alt="{{ $student->nama }}"
                                     class="rounded-circle me-2 shadow-sm"
                                     style="width: 40px; height: 40px; object-fit: cover; border: 2px solid #e2e8f0;">
                                <span class="fw-semibold">{{ $student->nama }}</span>
                            </div>
                        </td>
                        <td>
                            <small class="text-muted">{{ Str::limit($student->univ ?? '-', 20) }}</small>
                        </td>
                        <td>
                            <small class="text-muted">{{ Str::limit($student->jurusan ?? '-', 15) }}</small>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-primary rounded-pill px-3 py-2">{{ $student->essay_files_count ?? 0 }}</span>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-success rounded-pill px-3 py-2">{{ number_format($student->avg_score ?? 0, 1) }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <i class="ti-info-alt text-muted" style="font-size: 2.5rem; opacity: 0.3;"></i>
                            <p class="text-muted mt-2 mb-0">No active students</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Custom gradient backgrounds */
    .bg-gradient {
        background: linear-gradient(135deg, #4361ee 0%, #3730a3 100%);
    }

    .bg-gradient-info {
        background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
    }

    .bg-gradient-success {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }

    .bg-gradient-secondary {
        background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
    }

    /* Essay item improvements */
    .essay-item {
        transition: all 0.3s ease;
        border-left-width: 4px !important;
    }

    .essay-item:hover {
        transform: translateX(5px);
        box-shadow: 0 4px 20px rgba(67, 97, 238, 0.2) !important;
    }

    /* Button improvements */
    .btn {
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn:hover {
        transform: translateY(-2px);
    }

    .btn-sm {
        padding: 8px 16px;
    }

    /* Table improvements */
    .table tbody tr {
        transition: all 0.2s ease;
    }

    .table tbody tr:hover {
        background-color: #f8fafc;
        transform: scale(1.01);
    }

    /* Card improvements */
    .card {
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-3px);
    }

    /* Badge improvements */
    .badge {
        font-weight: 600;
        letter-spacing: 0.3px;
    }

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

    .chip i {
        font-size: 14px;
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
        text-decoration: none;
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
        text-transform: uppercase;
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

    .class-content {
        display: flex;
        gap: 40px;
        align-items: center;
    }

    .class-thumbnail {
        flex-shrink: 0;
        width: 280px;
        height: 200px;
        border-radius: 15px;
        overflow: hidden;
        background: rgba(255,255,255,0.1);
    }

    .class-thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .class-details {
        flex: 1;
    }

    .class-title {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 15px;
        color: white;
    }

    .class-rating {
        color: #fbbf24;
        font-size: 20px;
        margin-bottom: 15px;
    }

    .class-lessons {
        font-size: 16px;
        margin-bottom: 25px;
        opacity: 0.9;
    }

    .btn-continue {
        background: white;
        color: #1e3a8a;
        padding: 14px 35px;
        border-radius: 25px;
        font-weight: 700;
        font-size: 15px;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s ease;
    }

    .btn-continue:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.2);
        color: #1e3a8a;
        text-decoration: none;
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

        .class-content {
            flex-direction: column;
        }

        .class-thumbnail {
            width: 100%;
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

        .class-title {
            font-size: 24px;
        }
    }
    .chip-mentor {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
        font-weight: 600;
    }

    .stat-rating {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }

    .essay-item {
        transition: all 0.3s ease;
    }

    .essay-item:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        transform: translateY(-2px);
    }

    .student-avatar {
        border: 2px solid #e0e0e0;
    }
</style>
@endpush
