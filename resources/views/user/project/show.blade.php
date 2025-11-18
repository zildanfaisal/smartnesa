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

)
<div class="container-fluid mt-4 px-4">
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <h4 class="mb-4"><i class="ti-file"></i> Essay Detail</h4>

            <!-- Essay Info -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <strong>Bab:</strong> <span class="badge bg-primary">{{ $essay->essay_bab }}</span>
                </div>
                <div class="col-md-6">
                    <strong>Judul:</strong> {{ $essay->essay_name }}
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <strong>Upload Date:</strong> {{ $essay->created_at->format('d M Y, H:i') }}
                </div>
                <div class="col-md-6">
                    <strong>Status:</strong>
                    @if($essay->comments->count() > 0)
                        <span class="badge bg-success">
                            <i class="ti-check"></i> Reviewed ({{ $essay->comments->count() }} comment(s))
                        </span>
                    @else
                        <span class="badge bg-warning">
                            <i class="ti-time"></i> Pending Review
                        </span>
                    @endif
                </div>
            </div>

            <!-- PDF Viewer -->
            <div class="mb-4">
                <h5>PDF File:</h5>
                <a href="{{ asset('storage/' . $essay->essay_file) }}"
                   target="_blank"
                   class="btn btn-info">
                    <i class="ti-eye"></i> View PDF
                </a>
            </div>

            <!-- Mentor Comments -->
            @if($essay->comments->count() > 0)
                <div class="mentor-comments">
                    <h5 class="mb-3">
                        <i class="ti-comments"></i> Mentor Feedback
                        <span class="badge bg-primary">{{ $essay->comments->count() }}</span>
                    </h5>

                    @foreach($essay->comments as $comment)
                        <div class="comment-box mb-3 p-3 border rounded">
                            <div class="d-flex align-items-center mb-2">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($comment->mentor->nama) }}&background=667eea&color=fff"
                                     alt="{{ $comment->mentor->nama }}"
                                     class="rounded-circle me-2"
                                     style="width: 40px; height: 40px;">
                                <div>
                                    <strong>{{ $comment->mentor->nama }}</strong>
                                    <small class="text-muted d-block">
                                        {{ $comment->created_at->diffForHumans() }}
                                    </small>
                                </div>
                            </div>
                            <p class="mb-0">{{ $comment->comment }}</p>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-info">
                    <i class="ti-info-alt"></i> Belum ada feedback dari mentor.
                </div>
            @endif

            <!-- Action Buttons -->
            <div class="mt-4">
                <a href="{{ route('user.project.index') }}" class="btn btn-secondary">
                    <i class="ti-arrow-left"></i> Back to List
                </a>
                <a href="{{ route('user.project.edit', $essay->id) }}" class="btn btn-warning">
                    <i class="ti-pencil"></i> Edit Essay
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
