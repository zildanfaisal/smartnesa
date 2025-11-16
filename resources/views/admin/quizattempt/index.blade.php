@extends('layouts.dashboard')

@section('title', 'Student Quiz Attempts - Smartnesa')

@section('content')
<!-- Student Quiz Attempts Table -->
<div class="attempts-section mt-4" data-aos="fade-up">
	<div class="attempts-card">
		<div class="card-header">
			<h4 class="m-0">Semua Hasil Kuis Siswa</h4>
		</div>
		<div class="card-body">
			<!-- Filters -->
			<form method="GET" action="{{ route('admin.quiz.attempt.index') }}" class="filter-form m-4" id="attempt-filter-form">
				<div class="row g-2">
					<div class="col-12 col-md-3">
						<input type="text" class="form-control" name="q" value="{{ $search ?? '' }}" placeholder="Cari nama atau username">
					</div>
					<div class="col-12 col-md-3">
						<select name="univ" class="form-select">
							<option value="">Semua Universitas</option>
							@foreach(($univOptions ?? []) as $opt)
								<option value="{{ $opt }}" {{ (isset($univ) && $univ === $opt) ? 'selected' : '' }}>{{ $opt }}</option>
							@endforeach
						</select>
					</div>
					<div class="col-12 col-md-3">
						<select name="jurusan" class="form-select">
							<option value="">Semua Jurusan</option>
							@foreach(($jurusanOptions ?? []) as $opt)
								<option value="{{ $opt }}" {{ (isset($jurusan) && $jurusan === $opt) ? 'selected' : '' }}>{{ $opt }}</option>
							@endforeach
						</select>
					</div>
					<div class="col-12 col-md-2">
						<select name="angkatan" class="form-select">
							<option value="">Semua Angkatan</option>
							@foreach(($angkatanOptions ?? []) as $opt)
								<option value="{{ $opt }}" {{ (isset($angkatan) && $angkatan === $opt) ? 'selected' : '' }}>{{ $opt }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="mt-2">
					<a class="btn btn-link p-0" href="{{ route('admin.quiz.attempt.index') }}">Reset</a>
				</div>
			</form>

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
</div>

<style>
	.attempts-section { padding: 0 30px 40px; }
	.attempts-card { background:#fff; border-radius: 15px; box-shadow:0 2px 10px rgba(0,0,0,0.06); }
	.attempts-card .card-header { padding:20px 24px; display:flex; justify-content:space-between; align-items:center; border-bottom:1px solid #eef2f7; }
	.attempts-card .card-body { padding: 0; }
	.table-responsive { padding: 16px 24px; }
	.table thead th { font-weight:600; color:#495057; background:#f8f9fa; border-bottom-color:#e9ecef; }
	.badge-score { background:#e8fff3; color:#10b981; padding:.4rem .6rem; border-radius:.5rem; font-weight:600; font-size:.85rem; }
	@media (max-width: 576px) {
		.attempts-card .card-header { flex-direction: column; gap: 10px; align-items: flex-start; }
	}
</style>
<style>
	.filter-form { margin: 8px 0 20px; }
	.filter-form .form-control, .filter-form .form-select { height: 38px; }
	@media (max-width: 576px) {
		.filter-form .row > [class^='col-'] { margin-bottom: 8px; }
	}
</style>
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