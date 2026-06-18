@extends('layouts.app')

@section('title', 'Detail Petugas - ' . $petugas->nama)

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h1 class="h3 mb-0"><i class="bi bi-person-vcard"></i> Detail Petugas</h1>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('petugas.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <!-- Card Foto Profil -->
        <div class="card text-center">
            <div class="card-body">
                @if($petugas->foto)
                    <img src="{{ Storage::url($petugas->foto) }}" alt="Foto Profil" class="rounded-circle mb-3" width="150" height="150">
                @else
                    <div class="rounded-circle bg-light d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 150px; height: 150px;">
                        <i class="bi bi-person-fill" style="font-size: 60px; color: #ccc;"></i>
                    </div>
                @endif
                <h5 class="card-title">{{ $petugas->nama }}</h5>
                <p class="card-text text-muted">NIP: {{ $petugas->nip }}</p>
                <span class="badge bg-info mb-3">{{ $petugas->jabatan }}</span>
                <div class="d-flex gap-2">
                    <a href="{{ route('petugas.edit', $petugas) }}" class="btn btn-warning btn-sm flex-grow-1">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <form action="{{ route('petugas.destroy', $petugas) }}" method="POST" style="flex-grow: 1;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm w-100">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <!-- Card Detail Informasi -->
        <div class="card">
            <div class="card-header bg-light">
                <h5 class="mb-0">Informasi Petugas</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <p class="text-muted mb-0">NIP</p>
                    </div>
                    <div class="col-md-8">
                        <p class="fw-bold mb-0">{{ $petugas->nip }}</p>
                    </div>
                </div>

                <hr>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <p class="text-muted mb-0">Nama Lengkap</p>
                    </div>
                    <div class="col-md-8">
                        <p class="fw-bold mb-0">{{ $petugas->nama }}</p>
                    </div>
                </div>

                <hr>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <p class="text-muted mb-0">Email</p>
                    </div>
                    <div class="col-md-8">
                        <p class="fw-bold mb-0">
                            <a href="mailto:{{ $petugas->email }}">{{ $petugas->email }}</a>
                        </p>
                    </div>
                </div>

                <hr>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <p class="text-muted mb-0">Jabatan</p>
                    </div>
                    <div class="col-md-8">
                        <p class="fw-bold mb-0">
                            <span class="badge bg-info">{{ $petugas->jabatan }}</span>
                        </p>
                    </div>
                </div>

                <hr>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <p class="text-muted mb-0">No. Telepon</p>
                    </div>
                    <div class="col-md-8">
                        <p class="fw-bold mb-0">{{ $petugas->no_telepon ?? '-' }}</p>
                    </div>
                </div>

                <hr>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <p class="text-muted mb-0">Terdaftar Sejak</p>
                    </div>
                    <div class="col-md-8">
                        <p class="fw-bold mb-0">{{ $petugas->created_at->format('d M Y H:i') }}</p>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-4">
                        <p class="text-muted mb-0">Terakhir Diperbarui</p>
                    </div>
                    <div class="col-md-8">
                        <p class="fw-bold mb-0">{{ $petugas->updated_at->format('d M Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Aksi -->
        <div class="card mt-3">
            <div class="card-header bg-light">
                <h5 class="mb-0">Aksi</h5>
            </div>
            <div class="card-body">
                <p class="text-muted mb-3">
                    Gunakan tombol di bawah untuk mengelola data petugas ini.
                </p>
                <div class="d-flex gap-2">
                    <a href="{{ route('petugas.edit', $petugas) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Edit Data
                    </a>
                    <a href="{{ route('petugas.index') }}" class="btn btn-secondary">
                        <i class="bi bi-list"></i> Lihat Semua
                    </a>
                    <form action="{{ route('petugas.destroy', $petugas) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
