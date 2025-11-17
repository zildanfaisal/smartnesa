@extends('layouts.dashboard')
@section('title', 'Daftar Essay Mahasiswa - Mentor')

@section('content')
<style>
    .mentor-container {
        padding: 30px;
    }

    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 25px 30px;
        border-radius: 12px;
        margin-bottom: 30px;
        color: white;
    }

    .page-header h3 {
        margin: 0;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .filter-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        padding: 25px;
        margin-bottom: 25px;
    }

    .filter-title {
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .filter-title i {
        color: #667eea;
    }

    .data-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    .table-responsive {
        border-radius: 12px;
        overflow: hidden;
    }

    .table {
        margin: 0;
    }

    .table thead th {
        background: #f7fafc;
        color: #2d3748;
        font-weight: 600;
        border-bottom: 2px solid #e2e8f0;
        padding: 15px;
    }

    .table tbody td {
        padding: 15px;
        vertical-align: middle;
    }

    .student-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .student-avatar {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        object-fit: cover;
    }

    .student-details strong {
        display: block;
        color: #2d3748;
    }

    .student-details small {
        color: #718096;
    }

    .badge-comment {
        padding: 8px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .badge-has-comment {
        background: #d1fae5;
        color: #065f46;
    }

    .badge-no-comment {
        background: #fee2e2;
        color: #991b1b;
    }

    .btn-filter {
        background: #667eea;
        color: white;
        border: none;
        padding: 10px 24px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-filter:hover {
        background: #5568d3;
        color: white;
        transform: translateY(-2px);
    }

    .btn-reset {
        background: #e2e8f0;
        color: #4a5568;
        border: none;
        padding: 10px 24px;
        border-radius: 8px;
        font-weight: 600;
        margin-left: 10px;
    }

    .btn-reset:hover {
        background: #cbd5e0;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #718096;
    }

    .empty-state i {
        font-size: 4rem;
        opacity: 0.3;
        margin-bottom: 20px;
    }
</style>

<div class="mentor-container">
    <div class="page-header">
        <h3 class="text-white"><i class="ti-files"></i> Daftar Essay Mahasiswa</h3>
        <p class="mb-0 mt-2 text-white">Kelola dan berikan komentar pada essay mahasiswa</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="ti-check"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Filter Section -->
  <!-- Filter Section -->
    <div class="filter-card">
        <div class="filter-title">
            <i class="ti-filter"></i> Filter & Pencarian
        </div>

        <form action="{{ route('mentor.project.index') }}" method="GET">
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label"><strong>Cari Nama Mahasiswa</strong></label>
                    <input type="text"
                           name="search"
                           class="form-control"
                           placeholder="Ketik nama mahasiswa..."
                           value="{{ request('search') }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label"><strong>Bab</strong></label>
                     <select
            class="w-40 border border-gray-300 rounded-lg px-3 py-2 bg-white focus:ring-2 focus:ring-blue-500">
                        <option value="">Semua Bab</option>
                        <option value="1" {{ request('bab') == '1' ? 'selected' : '' }}>Bab 1</option>
                        <option value="2" {{ request('bab') == '2' ? 'selected' : '' }}>Bab 2</option>
                        <option value="3" {{ request('bab') == '3' ? 'selected' : '' }}>Bab 3</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label"><strong>Universitas</strong></label>
                     <select
            class="w-48 border border-gray-300 rounded-lg px-3 py-2 bg-white focus:ring-2 focus:ring-blue-500">
                        <option value="">Semua Universitas</option>
                        @foreach($universities as $univ)
                            <option value="{{ $univ }}" {{ request('university') == $univ ? 'selected' : '' }}>
                                {{ $univ }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label"><strong>Angkatan</strong></label>
                    <select
            class="w-44 border border-gray-300 rounded-lg px-3 py-2 bg-white focus:ring-2 focus:ring-blue-500">
                        <option value="">Semua Angkatan</option>
                        @foreach($angkatans as $ank)
                            <option value="{{ $ank }}" {{ request('angkatan') == $ank ? 'selected' : '' }}>
                                {{ $ank }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12 mt-2">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-filter">
                            <i class="ti-search"></i> Filter
                        </button>
                        @if(request()->hasAny(['search', 'bab', 'university', 'angkatan']))
                            <a href="{{ route('mentor.project.index') }}" class="btn btn-reset">
                                <i class="ti-reload"></i> Reset Filter
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Table Section -->
    <div class="data-card">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="20%">Mahasiswa</th>
                        <th width="8%">Bab</th>
                        <th width="22%">Judul Essay</th>
                        <th width="12%">Tanggal Upload</th>
                        <th width="13%">Status</th>
                        <th width="10%">PDF</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($essays as $index => $essay)
                        <tr>
                            <td class="text-center">{{ $essays->firstItem() + $index }}</td>
                            <td>
                                <div class="student-info">
                                    <img src="{{ $essay->user->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($essay->user->name) }}"
                                         alt="avatar"
                                         class="student-avatar">
                                    <div class="student-details">
                                        <strong>{{ $essay->user->name }}</strong>
                                        <small>{{ $essay->user->university ?? '-' }}</small>
                                        <small>Angkatan {{ $essay->user->angkatan ?? '-' }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-primary">{{ $essay->essay_bab }}</span>
                            </td>
                            <td>{{ $essay->essay_name }}</td>
                            <td>{{ $essay->created_at->format('d M Y') }}</td>
                            <td>
                                @if($essay->comment)
                                    <span class="badge-comment badge-has-comment">
                                        <i class="ti-check"></i> Sudah Dinilai
                                    </span>
                                @else
                                    <span class="badge-comment badge-no-comment">
                                        <i class="ti-time"></i> Belum Dinilai
                                    </span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ asset('storage/' . $essay->essay_file) }}"
                                   target="_blank"
                                   class="btn btn-sm btn-info">
                                    <i class="ti-file"></i> Lihat
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('mentor.project.show', $essay->id) }}"
                                   class="btn btn-sm btn-success"
                                   title="Detail & Komentar">
                                    <i class="ti-comment-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">
                                <div class="empty-state">
                                    <i class="ti-info-alt"></i>
                                    <p class="mb-0">Tidak ada data essay yang ditemukan</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($essays->hasPages())
            <div class="p-3">
                {{ $essays->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
