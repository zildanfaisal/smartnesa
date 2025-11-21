@extends('layouts.dashboard')
@section('title', 'Detail Essay - Admin')

@section('content')
<style>
    .detail-container {
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

    .info-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        padding: 25px;
        margin-bottom: 25px;
    }

    .section-title {
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 16px;
        padding-bottom: 15px;
        border-bottom: 2px solid #e2e8f0;
    }

    .section-title i {
        color: #667eea;
        font-size: 20px;
    }

    .info-row {
        display: flex;
        padding: 12px 0;
        border-bottom: 1px solid #f7fafc;
    }

    .info-row:last-child {
        border-bottom: none;
    }

    .info-label {
        width: 180px;
        font-weight: 600;
        color: #4a5568;
        font-size: 14px;
    }

    .info-value {
        flex: 1;
        color: #2d3748;
    }

    .student-profile {
        display: flex;
        align-items: center;
        gap: 15px;
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        padding: 20px;
        border-radius: 12px;
        margin-bottom: 20px;
    }

    .student-avatar-large {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid white;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .student-profile-info h4 {
        margin: 0 0 8px;
        color: #1e40af;
        font-weight: 700;
    }

    .student-profile-info p {
        margin: 0;
        color: #475569;
        font-size: 14px;
    }

    .comment-section {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        padding: 25px;
    }

    .comment-form textarea {
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        padding: 15px;
        font-size: 14px;
        resize: vertical;
        min-height: 150px;
    }

    .comment-form textarea:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        outline: none;
    }

    .existing-comment {
        background: #fffbeb;
        border-left: 4px solid #f59e0b;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .existing-comment-header {
        display: flex;
        justify-content: between;
        align-items: center;
        margin-bottom: 12px;
    }

    .existing-comment-header strong {
        color: #92400e;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .existing-comment-text {
        color: #78350f;
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .btn-save {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        color: white;
    }

    .btn-edit {
        background: #fbbf24;
        color: white;
        padding: 8px 20px;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        font-size: 13px;
    }

    .btn-edit:hover {
        background: #f59e0b;
        color: white;
    }

    .btn-delete {
        background: #ef4444;
        color: white;
        padding: 8px 20px;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        font-size: 13px;
        margin-left: 8px;
    }

    .btn-delete:hover {
        background: #dc2626;
        color: white;
    }

    .btn-back {
        background: #e2e8f0;
        color: #4a5568;
        padding: 12px 30px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
    }

    .btn-back:hover {
        background: #cbd5e0;
        color: #2d3748;
    }

    .pdf-viewer {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        padding: 20px;
    }

    .pdf-viewer iframe {
        border: 2px solid #e2e8f0;
        border-radius: 8px;
    }

    #commentForm {
        display: none;
    }

    #commentForm.show {
        display: block;
    }
</style>

<div class="detail-container">
    <div class="page-header">
        <h3><i class="ti-eye"></i> Detail Essay & Penilaian</h3>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="ti-check"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <!-- Left Column: Info & Comment -->
        <div class="col-lg-5">
            <!-- Student Profile -->
            <div class="info-card">
                <div class="section-title">
                    <i class="ti-user"></i> Informasi Mahasiswa
                </div>
                <div class="student-profile">
                    <img src="{{ $essay->user->foto ? asset('storage/' . $essay->user->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($essay->user->nama ?? $essay->user->name) . '&background=667eea&color=fff' }}"
                         alt="avatar"
                         class="student-avatar-large">
                    <div class="student-profile-info">
                        <h4>{{ $essay->user->name }}</h4>
                        <p><i class="ti-location-pin"></i> {{ $essay->user->university ?? 'Universitas tidak tersedia' }}</p>
                        <p><i class="ti-calendar"></i> Angkatan {{ $essay->user->angkatan ?? '-' }}</p>
                    </div>
                </div>

                <div class="info-row">
                    <div class="info-label">Bab Essay</div>
                    <div class="info-value">
                        <span class="badge bg-primary">{{ $essay->essay_bab }}</span>
                    </div>
                </div>

                <div class="info-row">
                    <div class="info-label">Judul Essay</div>
                    <div class="info-value">{{ $essay->essay_name }}</div>
                </div>

                <div class="info-row">
                    <div class="info-label">Tanggal Upload</div>
                    <div class="info-value">{{ $essay->created_at->format('d F Y, H:i') }} WIB</div>
                </div>

                <div class="info-row">
                    <div class="info-label">File PDF</div>
                    <div class="info-value">
                        <a href="{{ asset('storage/' . $essay->essay_file) }}"
                           target="_blank"
                           class="btn btn-sm btn-info">
                            <i class="ti-download"></i> Download PDF
                        </a>
                    </div>
                </div>
            </div>

            <!-- Comment Section -->
            <div class="comment-section">
                <div class="section-title">
                    <i class="ti-comment-alt"></i> Komentar & Penilaian
                </div>

                @if($essay->comment)
                    <!-- Existing Comment -->
                    <div class="existing-comment" id="existingComment">
                        <div class="existing-comment-header">
                            <strong><i class="ti-check-box"></i> Komentar Anda</strong>
                        </div>
                        <div class="existing-comment-text">
                            {{ $essay->comment }}
                        </div>
                    </div>
                @endif

                <!-- Comment Form -->
            </div>

            <!-- Back Button -->
            <div class="mt-3">
                <a href="{{ route('admin.project.index') }}" class="btn btn-back w-100">
                    <i class="ti-arrow-left"></i> Kembali ke Daftar Essay
                </a>
            </div>
        </div>

        <!-- Right Column: PDF Preview -->
        <div class="col-lg-7">
            <div class="pdf-viewer">
                <div class="section-title">
                    <i class="ti-file"></i> Preview Essay (PDF)
                </div>
                <iframe src="{{ asset('storage/' . $essay->essay_file) }}"
                        width="100%"
                        height="800px">
                </iframe>
            </div>
        </div>
    </div>
</div>

<script>
function showEditForm() {
    document.getElementById('existingComment').style.display = 'none';
    document.getElementById('commentForm').style.display = 'block';
}

function cancelEdit() {
    document.getElementById('existingComment').style.display = 'block';
    document.getElementById('commentForm').style.display = 'none';
}
</script>
@endsection
