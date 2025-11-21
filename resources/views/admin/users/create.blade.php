@extends('layouts.dashboard')

@section('title', 'Tambah Akun - Admin')

@section('content')
<div class="container py-4" data-aos="fade-up">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card" style="border:1px solid #e9ecef; border-radius:10px;">
                <div class="card-body p-4">
                    <h3 class="mb-3">Tambah Akun</h3>
                    <p class="text-muted mb-4">Buat akun baru untuk Admin/Mentor/User.</p>

                    @if (session('status') === 'user-created')
                        <div class="alert alert-success">Akun berhasil dibuat.</div>
                    @endif

                    <form method="POST" action="{{ route('admin.users.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama') }}" required>
                            @error('nama')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control" value="{{ old('username') }}" required>
                            @error('username')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            @error('email')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" id="password" name="password" class="form-control">
                                    @error('password')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="univ" class="form-label">Universitas</label>
                                    <input type="text" id="univ" name="univ" class="form-control" value="{{ old('univ') }}">
                                    @error('univ')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="jurusan" class="form-label">Jurusan</label>
                                    <input type="text" id="jurusan" name="jurusan" class="form-control" value="{{ old('jurusan') }}">
                                    @error('jurusan')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="angkatan" class="form-label">Angkatan</label>
                                    <input type="text" id="angkatan" name="angkatan" class="form-control" value="{{ old('angkatan') }}">
                                    @error('angkatan')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select id="role" name="role" class="form-select" required>
                                        <option value="" disabled {{ old('role') ? '' : 'selected' }}>Pilih Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role }}" {{ old('role') === $role ? 'selected' : '' }}>{{ ucfirst($role) }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
