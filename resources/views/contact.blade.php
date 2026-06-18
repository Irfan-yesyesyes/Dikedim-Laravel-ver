@extends('layouts.app')

@section('title', 'Hubungi Kami')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="mb-4">Hubungi Kami</h1>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <i class="bi bi-telephone fs-3 text-primary mb-3"></i>
                                <h5 class="card-title">Telepon</h5>
                                <p class="card-text">
                                    <a href="tel:+62-21-1234567">+62-21-1234567</a>
                                </p>
                                <small class="text-muted">Senin - Jumat, 08:00 - 17:00</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <i class="bi bi-envelope fs-3 text-primary mb-3"></i>
                                <h5 class="card-title">Email</h5>
                                <p class="card-text">
                                    <a href="mailto:support@dikedim.ac.id">support@dikedim.ac.id</a>
                                </p>
                                <small class="text-muted">Respon dalam 24 jam</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <i class="bi bi-geo-alt fs-5 text-primary me-2"></i>
                        <strong>Alamat</strong>
                        <p class="mt-2 mb-0">
                            Jl. Pendidikan No. 123<br>
                            Jakarta Selatan 12345<br>
                            Indonesia
                        </p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Kirim Pesan</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('contact.submit') ?? '#' }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    id="name" 
                                    name="name" 
                                    required
                                    value="{{ old('name') }}"
                                >
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input 
                                    type="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    id="email" 
                                    name="email" 
                                    required
                                    value="{{ old('email') }}"
                                >
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="subject" class="form-label">Subjek</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('subject') is-invalid @enderror" 
                                    id="subject" 
                                    name="subject" 
                                    required
                                    value="{{ old('subject') }}"
                                >
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Pesan</label>
                                <textarea 
                                    class="form-control @error('message') is-invalid @enderror" 
                                    id="message" 
                                    name="message" 
                                    rows="5" 
                                    required
                                >{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-send me-2"></i>Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Contact page scripts
        console.log('Contact page loaded');
        
        // Form validation
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    console.log('Contact form submitted');
                });
            }
        });
    </script>
@endpush
