@extends('layouts.app')

@section('title', 'Daftar Petugas Gudang')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h1 class="h3 mb-0"><i class="bi bi-people"></i> Daftar Petugas Gudang</h1>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('petugas.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Petugas
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if($petugases->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th>Telepon</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($petugases as $petugas)
                            <tr>
                                <td>{{ ($petugases->currentPage() - 1) * $petugases->perPage() + $loop->iteration }}</td>
                                <td><strong>{{ $petugas->nip }}</strong></td>
                                <td>{{ $petugas->nama }}</td>
                                <td>{{ $petugas->email }}</td>
                                <td>
                                    <span class="badge bg-info">{{ $petugas->jabatan }}</span>
                                </td>
                                <td>{{ $petugas->no_telepon ?? '-' }}</td>
                                <td>
                                    @if($petugas->foto)
                                        <img src="{{ Storage::url($petugas->foto) }}" alt="Foto" class="rounded" width="50" height="50">
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('petugas.show', $petugas) }}" class="btn btn-sm btn-info" title="Lihat Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('petugas.edit', $petugas) }}" class="btn btn-sm btn-warning" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('petugas.destroy', $petugas) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">
                                    Belum ada data petugas. <a href="{{ route('petugas.create') }}">Tambah sekarang</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div>
                    <p class="text-muted mb-0">
                        Menampilkan {{ $petugases->firstItem() ?? 0 }} sampai {{ $petugases->lastItem() ?? 0 }} dari {{ $petugases->total() }} data
                    </p>
                </div>
                <div>
                    {{ $petugases->links('pagination::bootstrap-4') }}
                </div>
            </div>
        @else
            <div class="alert alert-info" role="alert">
                <strong>Info:</strong> Belum ada data petugas.
                <a href="{{ route('petugas.create') }}" class="alert-link">Tambah petugas baru</a>
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    // Konfirmasi delete sebelum hapus
    document.querySelectorAll('form[onsubmit*="confirm"]').forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                e.preventDefault();
            }
        });
    });
</script>
@endpush

@endsection
