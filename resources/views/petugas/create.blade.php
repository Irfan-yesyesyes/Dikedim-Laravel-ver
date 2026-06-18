@extends('layouts.app')

@section('title', 'Tambah Petugas')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h1 class="h3 mb-0"><i class="bi bi-person-plus"></i> Tambah Petugas Gudang</h1>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('petugas.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('petugas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- NIP -->
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP (Nomor Induk Pegawai) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nip') is-invalid @enderror"
                               id="nip" name="nip" value="{{ old('nip') }}"
                               placeholder="Masukkan NIP petugas" required>
                        @error('nip')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Nama -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                               id="nama" name="nama" value="{{ old('nama') }}"
                               placeholder="Masukkan nama petugas" required>
                        @error('nama')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                               id="email" name="email" value="{{ old('email') }}"
                               placeholder="Masukkan email petugas" required>
                        @error('email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Jabatan -->
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan <span class="text-danger">*</span></label>
                        <select class="form-select @error('jabatan') is-invalid @enderror"
                                id="jabatan" name="jabatan" required>
                            <option value="">-- Pilih Jabatan --</option>
                            <option value="Kepala Gudang" {{ old('jabatan') == 'Kepala Gudang' ? 'selected' : '' }}>Kepala Gudang</option>
                            <option value="Petugas Gudang" {{ old('jabatan') == 'Petugas Gudang' ? 'selected' : '' }}>Petugas Gudang</option>
                            <option value="Supervisor" {{ old('jabatan') == 'Supervisor' ? 'selected' : '' }}>Supervisor</option>
                            <option value="Admin" {{ old('jabatan') == 'Admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        @error('jabatan')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- No. Telepon -->
                    <div class="mb-3">
                        <label for="no_telepon" class="form-label">No. Telepon</label>
                        <input type="text" class="form-control @error('no_telepon') is-invalid @enderror"
                               id="no_telepon" name="no_telepon" value="{{ old('no_telepon') }}"
                               placeholder="Masukkan nomor telepon (opsional)">
                        @error('no_telepon')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Foto -->
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto Profil</label>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror"
                               id="foto" name="foto" accept="image/jpeg,image/png">
                        <small class="form-text text-muted">
                            Format: JPG, PNG | Ukuran maksimal: 2MB
                        </small>
                        @error('foto')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Simpan
                        </button>
                        <a href="{{ route('petugas.index') }}" class="btn btn-light">
                            <i class="bi bi-x-circle"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Preview foto sebelum upload
    document.getElementById('foto').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                // Validasi tipe file
                if (!file.type.match('image/.*')) {
                    alert('File harus berupa gambar (JPG atau PNG)');
                    e.target.value = '';
                    return;
                }
                // Validasi ukuran file
                if (file.size > 2048 * 1024) {
                    alert('Ukuran file tidak boleh lebih dari 2MB');
                    e.target.value = '';
                    return;
                }
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush

@endsection
