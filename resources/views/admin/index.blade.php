@extends('layouts.dashboard')

@section('title', 'Dashboard - Smartnesa')

@section('content')
<!-- Hero Section -->
<div class="hero-section" data-aos="fade-down">
    <div class="hero-content">
        <div class="hero-left">
            <img class="hero-avatar" src="{{ Auth::user()->avatar ?? asset('images/avatar-default.jpg') }}"
                 alt="avatar" onerror="this.src='https://i.pravatar.cc/150?img=12'">
            <div class="hero-info">
                <div class="hero-subtitle">Looking forward to learning</div>
                <h1 class="hero-title">{{ Auth::user()->name ?? 'Siftiyan Abdullah Zidan Arzaqi' }}</h1>
                <div class="hero-chips">
                    <span class="chip"><i class="ti-location-pin"></i> Universitas Negeri Surabaya</span>
                    <span class="chip"><i class="ti-id-badge"></i> S1 Sistem Informasi</span>
                    <span class="chip"><i class="ti-book"></i> {{ $enrolledCount ?? 1 }} enrolled class active</span>
                </div>
            </div>
        </div>
        <div class="hero-right">
            <a href="" class="btn-start-learning">
                <i class="ti-bolt"></i> START LEARNING
            </a>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="stats-container" data-aos="fade-up">
    <div class="stat-card stat-enrolled">
        <div class="stat-icon">
            <i class="ti-book"></i>
        </div>
        <div class="stat-number">{{ $enrolledCourses ?? 30 }}</div>
        <div class="stat-label">ENROLLED COURSES</div>
    </div>

    <div class="stat-card stat-active">
        <div class="stat-icon">
            <i class="ti-desktop"></i>
        </div>
        <div class="stat-number">{{ $activeCourses ?? 10 }}</div>
        <div class="stat-label">ACTIVE COURSES</div>
    </div>

    <div class="stat-card stat-completed">
        <div class="stat-icon">
            <i class="ti-medall-alt"></i>
        </div>
        <div class="stat-number">{{ $completedCourses ?? 7 }}</div>
        <div class="stat-label">COMPLETED COURSES</div>
    </div>
</div>

<!-- Active Class Card -->
<div class="active-class-section" data-aos="fade-up">
    <div class="active-class-card">
        <h2 class="section-title">Class Active</h2>

        <div class="class-content">
            <div class="class-thumbnail">
                <img src="{{ $activeClass->thumbnail ?? asset('images/course-thumb.jpg') }}" alt="Course Thumbnail">
            </div>

            <div class="class-details">
                <h3 class="class-title">{{ $activeClass->title ?? 'Kelas Esai Online' }}</h3>
                <div class="class-rating">
                    <i class="ti-star"></i>
                    <i class="ti-star"></i>
                    <i class="ti-star"></i>
                    <i class="ti-star"></i>
                    <i class="ti-star"></i>
                </div>
                <p class="class-lessons">Total lessons: <strong>{{ $activeClass->lessons_count ?? 12 }}</strong></p>
                <a href="" class="btn-continue">
                    Continue to Lesson
                </a>
            </div>
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
</style>
@endpush
