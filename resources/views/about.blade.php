@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="mb-4">Tentang Dikedim</h1>

                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Siapa Kami?</h5>
                        <p class="card-text">
                            Dikedim adalah platform manajemen inventaris terpadu yang dirancang khusus untuk 
                            memenuhi kebutuhan institusi pendidikan modern. Kami menyediakan solusi lengkap 
                            untuk pengelolaan data mahasiswa, mata kuliah, dan aset barang secara efisien.
                        </p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Visi Kami</h5>
                        <p class="card-text">
                            Menjadi platform manajemen data terdepan yang mendukung transformasi digital 
                            di sektor pendidikan Indonesia dengan teknologi terkini dan user-friendly interface.
                        </p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Misi Kami</h5>
                        <ul class="mb-0">
                            <li>Menyediakan sistem manajemen data yang mudah digunakan</li>
                            <li>Meningkatkan efisiensi operasional institusi pendidikan</li>
                            <li>Memberikan dukungan terbaik kepada pengguna</li>
                            <li>Terus berinovasi mengikuti perkembangan teknologi</li>
                        </ul>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Fitur Unggulan</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="bi bi-check-circle text-success me-2"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6>Manajemen Mahasiswa</h6>
                                        <small class="text-muted">Database lengkap data mahasiswa</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="bi bi-check-circle text-success me-2"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6>Manajemen Mata Kuliah</h6>
                                        <small class="text-muted">Pengelolaan kurikulum terpadu</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="bi bi-check-circle text-success me-2"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6>Inventaris Barang</h6>
                                        <small class="text-muted">Tracking aset dan inventori</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="bi bi-check-circle text-success me-2"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6>Laporan Real-time</h6>
                                        <small class="text-muted">Analytics dan reporting komprehensif</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        console.log('About page loaded');
    </script>
@endpush
