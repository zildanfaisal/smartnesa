@extends('layouts.dashboard')

@section('title', 'Dashboard - Smartnesa')

@section('content')
<style>
    .users-section { 
        padding: 0 30px 40px; 
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

    .badge-role { 
        padding: .4rem .6rem; 
        border-radius: .5rem; 
        font-weight:600; 
        font-size:.8rem; 
    }
    .badge-admin { 
        background:#e8e7ff; 
        color:#4f46e5; 
    }
    .badge-mentor { 
        background:#e8f5ff; 
        color:#0ea5e9; 
    }
    .badge-user { 
        background:#e8fff3; 
        color:#10b981; 
    }
</style>
<!-- Users Table -->
<div class="users-section mt-4" data-aos="fade-up">
    <div class="page-header">
        <h3 class="text-white"><i class="ti-files"></i> Daftar Akun</h3>
    </div>
    <div class="mb-4">
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary w-auto">+ Tambah Pengguna</a>
    </div>
    <div class="data-card">
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
@endsection
