@extends('layouts.dashboard')
@section('title', 'Tambah Essay - Smartnesa')

@section('content')
<style>
    .create-container {
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

    .page-header p {
        margin: 8px 0 0;
        opacity: 0.9;
        font-size: 14px;
    }

    .form-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        padding: 30px;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-label {
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
    }

    .form-label i {
        color: #667eea;
    }

    .required {
        color: #e53e3e;
        margin-left: 4px;
    }

    .form-control, .form-select {
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        padding: 12px 16px;
        font-size: 14px;
        transition: all 0.3s;
    }

    .form-control:focus, .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        outline: none;
    }

    .file-upload-area {
        border: 2px dashed #cbd5e0;
        border-radius: 8px;
        padding: 30px;
        text-align: center;
        background: #f7fafc;
        transition: all 0.3s;
        cursor: pointer;
        position: relative;
    }

    .file-upload-area:hover {
        border-color: #667eea;
        background: #edf2f7;
    }

    .file-upload-area input[type="file"] {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        opacity: 0;
        cursor: pointer;
    }

    .upload-icon {
        font-size: 48px;
        color: #667eea;
        margin-bottom: 10px;
    }

    .file-info-box {
        display: none;
        background: #e6fffa;
        border: 1px solid #81e6d9;
        border-radius: 8px;
        padding: 15px;
        margin-top: 15px;
        align-items: center;
        gap: 12px;
    }

    .file-info-box.show {
        display: flex;
    }

    .file-info-box i {
        font-size: 24px;
        color: #319795;
    }

    .btn-submit {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        color: white;
    }

    .btn-back {
        background: #e2e8f0;
        color: #4a5568;
        padding: 12px 30px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-back:hover {
        background: #cbd5e0;
        color: #2d3748;
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 30px;
        padding-top: 25px;
        border-top: 1px solid #e2e8f0;
    }
</style>

<div class="create-container">
    <div class="page-header">
        <h3 class="text-white"><i class="ti-write"></i> Tambah Essay Baru</h3>
        <p class="text-white">Lengkapi form di bawah untuk mengunggah essay Anda</p>
    </div>

    <div class="form-card">
        <form action="{{ route('user.project.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="essay_bab" class="form-label">
                            <i class="ti-book"></i>
                            Bab Essay
                            <span class="required">*</span>
                        </label>
                        <select class="form-select @error('essay_bab') is-invalid @enderror"
                                id="essay_bab"
                                name="essay_bab"
                                required>
                            <option value="" selected disabled>-- Pilih Bab --</option>
                            <option value="Bab 1" {{ old('essay_bab') == 'Bab 1' ? 'selected' : '' }}>Bab 1</option>
                            <option value="Bab 2" {{ old('essay_bab') == 'Bab 2' ? 'selected' : '' }}>Bab 2</option>
                            <option value="Bab 3" {{ old('essay_bab') == 'Bab 3' ? 'selected' : '' }}>Bab 3</option>
                        </select>
                        @error('essay_bab')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="essay_name" class="form-label">
                            <i class="ti-pencil-alt"></i>
                            Judul Essay
                            <span class="required">*</span>
                        </label>
                        <input type="text"
                               class="form-control @error('essay_name') is-invalid @enderror"
                               id="essay_name"
                               name="essay_name"
                               value="{{ old('essay_name') }}"
                               placeholder="Masukkan judul essay"
                               required>
                        @error('essay_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">
                    <i class="ti-cloud-up"></i>
                    Upload File PDF
                    <span class="required">*</span>
                </label>
                <div class="file-upload-area">
                    <input type="file"
                           class="@error('essay_file') is-invalid @enderror"
                           id="essay_file"
                           name="essay_file"
                           accept=".pdf"
                           required>
                    <i class="ti-upload upload-icon"></i>
                    <h5>Klik atau Seret File PDF Ke Sini</h5>
                    <p class="text-muted mb-0">Maksimal ukuran file: 10MB</p>
                </div>
                <div class="file-info-box" id="fileInfo">
                    <i class="ti-file"></i>
                    <div>
                        <strong id="fileName"></strong><br>
                        <small class="text-muted" id="fileSize"></small>
                    </div>
                </div>
                @error('essay_file')
                    <div class="text-danger mt-2"><small>{{ $message }}</small></div>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('user.project.index') }}" class="btn btn-back">
                    <i class="ti-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-submit">
                    <i class="ti-check"></i> Simpan Essay
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('essay_file').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        document.getElementById('fileName').textContent = file.name;
        document.getElementById('fileSize').textContent = formatBytes(file.size);
        document.getElementById('fileInfo').classList.add('show');
    }
});

function formatBytes(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
}
</script>
@endsection
