@extends('layouts.dashboard')

@section('title', 'My Quiz Attempts - Smartnesa')

@section('content')
<!-- Quiz Attempts Table -->
<div class="quiz-attempts-section mt-4" data-aos="fade-up">
	<div class="quiz-card">
		<div class="card-header">
			<h4 class="m-0">Kuis yang Telah Diselesaikan</h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover align-middle">
					<thead>
						<tr>
							<th>No</th>
							<th>Modul</th>
							<th>Skor</th>
						</tr>
					</thead>
					<tbody>
						@forelse($scores as $idx => $row)
							<tr>
								<td>{{ $idx + 1 }}</td>
								<td>{{ $row->module->title ?? 'Modul tidak ditemukan' }}</td>
								<td>
									<span class="badge-score">{{ (int) $row->score }} / 100</span>
								</td>
							</tr>
						@empty
							<tr>
								<td colspan="4" class="text-center text-muted">Belum ada kuis yang diselesaikan.</td>
							</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<style>
	.quiz-attempts-section { padding: 0 30px 40px; }
	.quiz-card { background:#fff; border-radius: 15px; box-shadow:0 2px 10px rgba(0,0,0,0.06); }
	.quiz-card .card-header { padding:20px 24px; display:flex; justify-content:space-between; align-items:center; border-bottom:1px solid #eef2f7; }
	.quiz-card .card-body { padding: 0; }
	.table-responsive { padding: 16px 24px; }
	.table thead th { font-weight:600; color:#495057; background:#f8f9fa; border-bottom-color:#e9ecef; }
	.badge-score { background:#e8fff3; color:#10b981; padding:.4rem .6rem; border-radius:.5rem; font-weight:600; font-size:.85rem; }
	@media (max-width: 576px) {
		.quiz-card .card-header { flex-direction: column; gap: 10px; align-items: flex-start; }
	}
</style>
@endsection