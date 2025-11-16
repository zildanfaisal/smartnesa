@extends('layouts.dashboard')
@section('title', 'Detail Essay - Smartnesa')

@section('content')
<style>
    .detail-container {
        padding: 30px;
    }

    .page-header {
        background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
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

    .detail-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        padding: 30px;
        margin-bottom: 25px;
    }

    .info-row {
        display: flex;
        padding: 15px 0;
        border-bottom: 1px solid #e2e8f0;
    }

    .info-row:last-child {
        border-bottom: none;
    }

    .info-label {
        width: 200px;
        font-weight: 600;
        color: #4a5568;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .info-label i {
        color: #48bb78;
    }

    .info-value {
        flex: 1;
        color: #2d3748;
    }

    .comment-box {
        background: #fffbeb;
        border-left: 4px solid #f59e0b;
        padding: 20px;
        border-radius: 8px;
    }

    .comment-box strong {
        color: #92400e;
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 10px;
    }

    .no-comment {
        background: #e0e7ff;
        border-left: 4px solid #6366f1;
        padding: 15px 20px;
        border-radius: 8px;
        color: #3730a3;
    }

    .action-buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 25px;
        padding-top: 25px;
        border-top: 1px solid #e2e8f0;
    }

    .btn-back {
        background: #e2e8f0;
        color: #4a5568;
        padding: 10px 24px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
    }

    .btn-back:hover {
        background: #cbd5e0;
        color: #2d3748;
    }

    .btn-edit {
        background: #fbbf24;
        color: white;
        padding: 10px 24px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        margin-right: 10px;
    }

    .btn-edit:hover {
        background: #f59e0b;
        color: white;
    }

    .btn-delete {
        background: #ef4444;
        color: white;
        padding: 10px 24px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
    }

    .btn-delete:hover {
        background: #dc2626;
        color: white;
    }

    .pdf-viewer {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        padding: 20px;
    }

    .pdf-viewer h5 {
        margin-bottom: 15px;
        color: #2d3748;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .pdf-viewer iframe {
        border: 1px solid #e2e8f0;
        border-radius: 8px;
    }
</style>

<div class="detail-container">
    <div class="page-header">
        <h3><i class="ti-eye"></i> Detail Essay</h3>
    </div>

    <div class="row">
        <div class="col-lg-5">
            <div class="detail-card">
                <div class="info-row">
                    <div class="info-label">
                        <i class="ti-book"></i>
                        Bab Essay
                    </div>
                    <div class="info-value">
                        <strong>{{ $essay->essay_bab }}</strong>
                    </div>
                </div>

                <div class="info-row">
                    <div class="info-label">
                        <i class="ti-pencil-alt"></i>
                        Judul Essay
                    </div>
                    <div class="info-value">
                        {{ $essay->essay_name }}
                    </div>
                </div>

                <div class="info-row">
                    <div class="info-label">
                        <i class="ti-calendar"></i>
                        Tanggal Upload
                    </div>
                    <div class="info-value">
                        {{ $essay->created_at->format('d F Y, H:i') }} WIB
                    </div>
                </div>

                <div class="info-row">
                    <div class="info-label">
                        <i class="ti-file"></i>
                        File PDF
                    </div>
                    <div class="info-value">
                        <a href="{{ asset('storage/' . $essay->essay_file) }}"
                           target="_blank"
                           class="btn btn-sm btn-info">
                            <i class="ti-download"></i> Download PDF
                        </a>
                    </div>
                </div>

                @if($essay->comment)
                    <div class="mt-3">
                        <div class="comment-box">
                            <strong><i class="ti-comment"></i> Komentar Mentor:</strong>
                            <p class="mb-0">{{ $essay->comment }}</p>
                        </div>
                    </div>
                @else
                    <div class="mt-3">
                        <div class="no-comment">
                            <i class="ti-info-alt"></i> Belum ada komentar dari mentor
                        </div>
                    </div>
                @endif

                <div class="action-buttons">
                    <a href="{{ route('user.project.index') }}" class="btn btn-back">
                        <i class="ti-arrow-left"></i> Kembali
                    </a>
                    <div>
                        <a href="{{ route('user.project.edit', $essay->id) }}" class="btn btn-edit">
                            <i class="ti-pencil"></i> Edit
                        </a>
                        <form action="{{ route('user.project.destroy', $essay->id) }}"
                              method="POST"
                              style="display: inline;"
                              onsubmit="return confirm('Yakin ingin menghapus essay ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">
                                <i class="ti-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="pdf-viewer">
                <h5><i class="ti-file"></i> Preview PDF</h5>
                <iframe src="{{ asset('storage/' . $essay->essay_file) }}"
                        width="100%"
                        height="700px">
                </iframe>
            </div>
        </div>
    </div>
</div>
@endsection
