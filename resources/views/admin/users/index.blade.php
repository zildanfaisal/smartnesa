@extends('layouts.dashboard')

@section('title', 'Dashboard - Smartnesa')

@section('content')

{{-- continue content section --}}

<!-- Users Table -->
<div class="users-section mt-4" data-aos="fade-up">
    <div class="users-card">
        <div class="card-header">
            <h4 class="m-0">Data Pengguna</h4>
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Tambah Akun</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Universitas</th>
                            <th>Jurusan</th>
                            <th>Angkatan</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $index => $u)
                            <tr>
                                <td>{{ ($users->currentPage()-1) * $users->perPage() + $index + 1 }}</td>
                                <td>{{ $u->nama }}</td>
                                <td>{{ $u->univ ?? '-' }}</td>
                                <td>{{ $u->jurusan ?? '-' }}</td>
                                <td>{{ $u->angkatan ?? '-' }}</td>
                                <td>
                                    @php $role = $u->role; @endphp
                                    <span class="badge-role {{ $role === 'admin' ? 'badge-admin' : ($role === 'mentor' ? 'badge-mentor' : 'badge-user') }}">{{ ucfirst($role) }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $u->id) }}" class="btn btn-sm btn-secondary w-auto">Edit</a>
                                    <form action="{{ route('admin.users.destroy', $u->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger w-auto">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted">Belum ada data pengguna.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

</div>

<style>
     /* Users Table Section */
    .users-section { padding: 0 30px 40px; }
    .users-card { background:#fff; border-radius: 15px; box-shadow:0 2px 10px rgba(0,0,0,0.06); }
    .users-card .card-header { padding:20px 24px; display:flex; justify-content:space-between; align-items:center; border-bottom:1px solid #eef2f7; }
    .users-card .card-body { padding: 0; }
    .table-responsive { padding: 16px 24px; }
    .table thead th { font-weight:600; color:#495057; background:#f8f9fa; border-bottom-color:#e9ecef; }
    .badge-role { padding: .4rem .6rem; border-radius: .5rem; font-weight:600; font-size:.8rem; }
    .badge-admin { background:#e8e7ff; color:#4f46e5; }
    .badge-mentor { background:#e8f5ff; color:#0ea5e9; }
    .badge-user { background:#e8fff3; color:#10b981; }
</style>
@endsection
