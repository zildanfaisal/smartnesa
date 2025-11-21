@extends('layouts.dashboard')

@section('title', 'Review Essay - Mentor')

@section('content')
<style>
    .review-container {
        padding: 30px;
    }

    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 25px 30px;
        border-radius: 12px;
        margin-bottom: 30px;
        color: white;
    }

    .essay-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        padding: 30px;
        margin-bottom: 25px;
    }

    .student-info {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 20px;
        background: #f8fafc;
        border-radius: 10px;
        margin-bottom: 25px;
    }

    .student-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
    }

    .comment-section {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        padding: 30px;
        margin-bottom: 25px;
    }

    .comment-item {
        background: #f8fafc;
        border-left: 4px solid #667eea;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .comment-item:last-child {
        margin-bottom: 0;
    }

    .comment-header {
        display: flex;
        justify-content: between;
        align-items: center;
        margin-bottom: 12px;
    }

    .mentor-info {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .mentor-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }

    .mentor-name {
        font-weight: 600;
        color: #2d3748;
    }

    .comment-date {
        font-size: 12px;
        color: #718096;
    }

    .comment-text {
        color: #4a5568;
        line-height: 1.6;
        margin: 0;
    }

    .my-comment-form {
        background: #fffbeb;
        border: 2px solid #fbbf24;
        border-radius: 12px;
        padding: 25px;
        margin-bottom: 25px;
    }

    .btn-delete-comment {
        background: #dc2626;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 6px;
        font-size: 14px;
        cursor: pointer;
    }

    .btn-delete-comment:hover {
        background: #b91c1c;
    }
</style>

<div class="review-container" data-aos="fade-up">
    <div class="page-header">
        <h3 class="text-white"><i class="ti-clipboard"></i> Review Essay Mahasiswa</h3>
        <p class="mb-0 mt-2 text-white">Berikan feedback dan komentar untuk mahasiswa</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="ti-check"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="ti-alert"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Essay Details -->
    <div class="essay-card">
        <h5 class="mb-4"><i class="ti-file"></i> Detail Essay</h5>

        <div class="student-info">
            <img src="{{ $essay->user->foto ? asset('storage/' . $essay->user->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($essay->user->nama) . '&background=667eea&color=fff' }}"
                 alt="{{ $essay->user->nama }}"
                 class="student-avatar">
            <div>
                <h6 class="mb-1">{{ $essay->user->nama }}</h6>
                <small class="text-muted">{{ $essay->user->univ }} - {{ $essay->user->jurusan }}</small><br>
                <small class="text-muted">Angkatan {{ $essay->user->angkatan }}</small>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <strong>Bab:</strong> <span class="badge bg-primary">{{ $essay->essay_bab }}</span>
            </div>
            <div class="col-md-8">
                <strong>Judul:</strong> {{ $essay->essay_name }}
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <strong>Tanggal Upload:</strong> {{ $essay->created_at->format('d M Y, H:i') }}
            </div>
            <div class="col-md-8">
                <strong>File PDF:</strong>
                <a href="{{ asset('storage/' . $essay->essay_file) }}"
                   target="_blank"
                   class="btn btn-sm btn-info ms-2">
                    <i class="ti-eye"></i> Lihat PDF
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <strong>Total Comments:</strong>
                <span class="badge bg-success">{{ $essay->comments->count() }} Comment(s)</span>
            </div>
        </div>
    </div>

    <!-- My Comment Form (untuk mentor yang sedang login) -->
    <div class="my-comment-form">
        <h5 class="mb-3">
            <i class="ti-pencil"></i>
            {{ $myComment ? 'Edit Your Comment' : 'Add Your Comment' }}
        </h5>

        <form action="{{ route('mentor.project.comment', $essay->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label"><strong>Your Feedback</strong></label>
                <textarea name="comment"
                          class="form-control @error('comment') is-invalid @enderror"
                          rows="5"
                          placeholder="Tulis feedback Anda untuk mahasiswa..."
                          required>{{ old('comment', $myComment->comment ?? '') }}</textarea>
                @error('comment')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="ti-check"></i> {{ $myComment ? 'Update Comment' : 'Submit Comment' }}
                </button>

                @if($myComment)
                    <form action="{{ route('mentor.project.comment.delete', $essay->id) }}"
                          method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus comment Anda?')"
                          style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete-comment">
                            <i class="ti-trash"></i> Delete My Comment
                        </button>
                    </form>
                @endif

                <a href="{{ route('mentor.project.index') }}" class="btn btn-secondary">
                    <i class="ti-arrow-left"></i> Back to List
                </a>
            </div>
        </form>
    </div>

    <!-- All Comments Section -->
    <div class="comment-section">
        <h5 class="mb-4">
            <i class="ti-comments"></i> All Mentor Comments
            <span class="badge bg-primary">{{ $essay->comments->count() }}</span>
        </h5>

        @forelse($essay->comments as $comment)
            <div class="comment-item">
                <div class="comment-header">
                    <div class="mentor-info">
                        <img src="{{ $comment->mentor->foto ? asset('storage/' . $comment->mentor->foto) : 'https://ui-avatars.com/api/?name=' . urlencode($comment->mentor->nama) . '&background=764ba2&color=fff' }}"
                             alt="{{ $comment->mentor->nama }}"
                             class="mentor-avatar">
                        <div>
                            <div class="mentor-name">
                                {{ $comment->mentor->nama }}
                                @if($comment->mentor_id == Auth::id())
                                    <span class="badge bg-warning text-dark">You</span>
                                @endif
                            </div>
                            <div class="comment-date">
                                <i class="ti-time"></i> {{ $comment->created_at->diffForHumans() }}
                                @if($comment->created_at != $comment->updated_at)
                                    <small>(edited)</small>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <p class="comment-text">{{ $comment->comment }}</p>
            </div>
        @empty
            <div class="text-center py-4">
                <i class="ti-info-alt text-muted" style="font-size: 3rem;"></i>
                <p class="text-muted mt-2">Belum ada comment dari mentor.</p>
            </div>
        @endforelse
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
