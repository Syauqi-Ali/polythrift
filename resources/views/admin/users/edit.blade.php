@extends('layouts.app') 

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Edit Pengguna (Karyawan)</h4>
        </div>
        <div class="card-body">
            <!-- Form untuk update mengarah ke route admin.users.update -->
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <hr class="my-4">
                <h5 class="mb-3">Ubah Password (Opsional)</h5>
                <p class="text-muted small">Biarkan kosong jika tidak ingin mengubah password.</p>

                <div class="mb-3">
                    <label for="password" class="form-label">Password Baru</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                    <!-- name="password_confirmation" harus persis seperti ini agar terbaca oleh aturan validasi 'confirmed' di controller -->
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <!-- Pastikan route admin.users.index sudah ada -->
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection