@extends('layouts.dashboard')

@section('title', 'Student Quiz Attempts - Smartnesa')

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

	.badge-score { 
		background:#e8fff3; 
		color:#10b981; 
		padding:.4rem .6rem; 
		border-radius:.5rem; 
		font-weight:600; 
		font-size:.85rem; 
	}
</style>
<!-- Student Quiz Attempts Table -->
<div class="mentor-container" data-aos="fade-up">
	<div class="page-header">
        <h3 class="text-white"><i class="ti-files"></i> Daftar Quiz Mahasiswa</h3>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="ti-check"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

	<div class="filter-card">
		<div class="filter-title">
            <i class="ti-filter"></i> Filter & Pencarian
        </div>
		<form method="GET" action="{{ route('mentor.quiz.attempt.index') }}" id="attempt-filter-form">
			<div class="row g-3">
				<div class="col-md-3">
					<label class="form-label"><strong>Cari Nama Mahasiswa</strong></label>
					<input type="text" class="form-control" name="q" value="{{ $search ?? '' }}" placeholder="Cari nama atau username">
				</div>
				<div class="col-md-3">
					<label class="form-label"><strong>Universitas</strong></label>
					<select name="univ" class="w-auto border border-gray-300 rounded-lg px-3 py-2 bg-white focus:ring-2 focus:ring-blue-500">
						<option value="">Semua Universitas</option>
						@foreach(($univOptions ?? []) as $opt)
							<option value="{{ $opt }}" {{ (isset($univ) && $univ === $opt) ? 'selected' : '' }}>{{ $opt }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-3">
					<label class="form-label"><strong>Jurusan</strong></label>
					<select name="jurusan" class="w-auto border border-gray-300 rounded-lg px-3 py-2 bg-white focus:ring-2 focus:ring-blue-500">
						<option value="">Semua Jurusan</option>
						@foreach(($jurusanOptions ?? []) as $opt)
							<option value="{{ $opt }}" {{ (isset($jurusan) && $jurusan === $opt) ? 'selected' : '' }}>{{ $opt }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-3">
					<label class="form-label"><strong>Angkatan</strong></label>
					<select name="angkatan" class="w-auto border border-gray-300 rounded-lg px-3 py-2 bg-white focus:ring-2 focus:ring-blue-500">
						<option value="">Semua Angkatan</option>
						@foreach(($angkatanOptions ?? []) as $opt)
							<option value="{{ $opt }}" {{ (isset($angkatan) && $angkatan === $opt) ? 'selected' : '' }}>{{ $opt }}</option>
						@endforeach
					</select>
				</div>
				<div class="mt-3 ml-1">
					<a class="btn btn-reset" href="{{ route('mentor.quiz.attempt.index') }}">
						<i class="ti-reload"></i> Reset Filter
					</a>
				</div>
			</div>
		</form>
	</div>
	
	<div class="data-card">
		<div class="table-responsive">
			<table class="table table-hover align-middle">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Siswa</th>
						<th>Modul</th>
						<th>Skor</th>
					</tr>
				</thead>
				<tbody>
					@php
						$start = method_exists($scores, 'currentPage') ? ($scores->currentPage()-1) * $scores->perPage() : 0;
					@endphp
					@forelse($scores as $index => $row)
						<tr>
							<td>{{ $start + $index + 1 }}</td>
							<td>{{ $row->user->nama ?? 'Unknown' }}</td>
							<td>{{ $row->module->title ?? 'Modul tidak ditemukan' }}</td>
							<td>
								<span class="badge-score">{{ (int) $row->score }} / 100</span>
							</td>
						</tr>
					@empty
						<tr>
							<td colspan="5" class="text-center text-muted">Belum ada data hasil kuis.</td>
						</tr>
					@endforelse
				</tbody>
			</table>
			@if(method_exists($scores, 'links'))
				<div>
					{{ $scores->links() }}
				</div>
			@endif
		</div>
	</div>
</div>
<script>
	(function(){
		const form = document.getElementById('attempt-filter-form');
		if(!form) return;

		const inputQ = form.querySelector('input[name="q"]');
		const selUniv = form.querySelector('select[name="univ"]');
		const selJurusan = form.querySelector('select[name="jurusan"]');
		const selAngkatan = form.querySelector('select[name="angkatan"]');

		let tId;
		const debounce = (fn, delay=400) => {
			return function(){
				clearTimeout(tId);
				const ctx = this, args = arguments;
				tId = setTimeout(() => fn.apply(ctx, args), delay);
			};
		};

		const submitForm = () => form.submit();

		if (inputQ) {
			inputQ.addEventListener('input', debounce(() => {
				submitForm();
			}, 500));
		}
		[selUniv, selJurusan, selAngkatan].forEach(el => {
			if (el) el.addEventListener('change', submitForm);
		});
	})();
</script>
@endsection
