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
<div class="row mt-4" data-aos="fade-up">
    <!-- Recent Essays -->
    <div class="col-lg-8">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="ti-file"></i> Recent Essays Submitted</h5>
                <a href="{{ route('mentor.project.index') }}" class="btn btn-sm btn-light">View All</a>
            </div>
            <div class="card-body">
                @forelse($recentEssays ?? [] as $essay)
                <div class="essay-item mb-3 p-3 border rounded">
                    <div class="d-flex align-items-start">
                        <img src="{{ $essay->user->foto ? asset('storage/' . $essay->user->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($essay->user->nama ?? 'Student') . '&background=667eea&color=fff' }}"
                             alt="{{ $essay->user->nama ?? 'Student' }}"
                             class="student-avatar me-3"
                             style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <h6 class="mb-1">{{ $essay->essay_name }}</h6>
                                    <div class="text-muted small mb-2">
                                        <i class="ti-user"></i> {{ $essay->user->nama ?? 'Unknown' }} |
                                        <i class="ti-book"></i> {{ $essay->essay_bab }}
                                    </div>
                                    {{-- <div>
                                        <span class="badge bg-info">
                                            <i class="ti-calendar"></i> {{ $essay->created_at->format('d M Y') }}
                                        </span>
                                        @if($essay->comment)
                                            <span class="badge bg-success">
                                                <i class="ti-check"></i> Reviewed
                                            </span>
                                        @else
                                            <span class="badge bg-warning">
                                                <i class="ti-time"></i> Pending
                                            </span>
                                        @endif
                                    </div> --}}
                                    <div>
    <span class="badge bg-info">
        <i class="ti-calendar"></i> {{ $essay->created_at->format('d M Y') }}
    </span>

    {{-- UPDATE: Cek jumlah comments, bukan single comment --}}
    @if($essay->comments->count() > 0)
        <span class="badge bg-success">
            <i class="ti-check"></i> Reviewed ({{ $essay->comments->count() }})
        </span>
    @else
        <span class="badge bg-warning">
            <i class="ti-time"></i> Pending
        </span>
    @endif

    {{-- TAMBAHAN: Badge untuk comments counter --}}
    <span class="badge bg-secondary">
        <i class="ti-comments"></i> {{ $essay->comments->count() }} Comment(s)
    </span>
</div>
                                </div>
                                <div class="text-end">
                                    <a href="{{ asset('storage/' . $essay->essay_file) }}"
                                       target="_blank"
                                       class="btn btn-sm btn-outline-info mb-1">
                                        <i class="ti-eye"></i> View PDF
                                    </a>
                                    <a href="{{ route('mentor.project.show', $essay->id) }}"
                                       class="btn btn-sm btn-outline-primary">
                                        <i class="ti-clipboard"></i> Review
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-4">
                    <i class="ti-info-alt text-muted" style="font-size: 3rem;"></i>
                    <p class="text-muted mt-2">Belum ada essay yang disubmit.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Statistics & Quick Actions -->
    <div class="col-lg-4">
        <!-- Essays by Chapter -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-info text-white">
                <h6 class="mb-0"><i class="ti-pie-chart"></i> Essays by Chapter</h6>
            </div>
            <div class="card-body">
                @forelse($essaysByChapter ?? [] as $bab => $count)
                <div class="d-flex justify-content-between align-items-center mb-2 pb-2 border-bottom">
                    <span><i class="ti-book"></i> {{ $bab }}</span>
                    <span class="badge bg-primary">{{ $count }}</span>
                </div>
                @empty
                <p class="text-muted text-center">No data available</p>
                @endforelse
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h6 class="mb-0"><i class="ti-bolt"></i> Quick Actions</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('mentor.project.index') }}" class="btn btn-outline-primary btn-sm">
                        <i class="ti-file"></i> All Essays
                    </a>
                    <a href="{{ route('mentor.quiz.attempt.index') }}" class="btn btn-outline-warning btn-sm">
                        <i class="ti-clipboard"></i> Quiz Attempts
                    </a>
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-info btn-sm">
                        <i class="ti-user"></i> My Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Active Students Table -->
<div class="card shadow-sm mt-4" data-aos="fade-up">
    <div class="card-header bg-secondary text-white">
        <h5 class="mb-0"><i class="ti-user"></i> Active Students</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Student Name</th>
                        <th>University</th>
                        <th>Jurusan</th>
                        <th>Total Essays</th>
                        <th>Avg Score</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($activeStudents ?? [] as $index => $student)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ $student->foto ? asset('storage/' . $student->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($student->nama) . '&background=667eea&color=fff' }}"
                                     alt="{{ $student->nama }}"
                                     class="rounded-circle me-2"
                                     style="width: 35px; height: 35px; object-fit: cover;">
                                <span>{{ $student->nama }}</span>
                            </div>
                        </td>
                        <td>
                            <small>{{ Str::limit($student->univ ?? '-', 20) }}</small>
                        </td>
                        <td>
                            <small>{{ Str::limit($student->jurusan ?? '-', 15) }}</small>
                        </td>
                        <td>
                            <span class="badge bg-primary">{{ $student->essay_files_count ?? 0 }}</span>
                        </td>
                        <td>
                            <span class="badge bg-success">{{ number_format($student->avg_score ?? 0, 1) }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">No active students</td>
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
