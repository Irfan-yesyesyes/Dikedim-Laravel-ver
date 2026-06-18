<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lupa Password - Sistem Manajemen Barang</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

  <nav class="navbar">
    <a href="/" class="navbar__brand">
      <div class="navbar__title">
        DiKeDim
        <span>Sistem Manajemen Barang</span>
      </div>
    </a>
  </nav>

  <section class="hero">
    <div class="hero__shapes"></div>
    <div class="hero__content">
      <div class="hero__badge">
        <span></span>
        LUPA PASSWORD
      </div>
      <h1>Reset<br><em>Password</em></h1>
      <p>Masukkan email Anda untuk melanjutkan proses reset password.</p>
    </div>
  </section>

  <div class="login-container">
    <div class="login-card">
      <h2>🔑 Lupa Password</h2>

      @if ($errors->any())
        <div class="form-error-box">
          <strong>⚠️ Terjadi Kesalahan!</strong>
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      @if (session('status'))
        <div style="background: #e8f5e9; border: 1px solid #4caf50; border-radius: 8px; padding: 1.25rem; margin-bottom: 2rem; color: #2e7d32;">
          <strong>✓ Berhasil!</strong>
          <p style="margin: 0.75rem 0 0 0;">{{ session('status') }}</p>
        </div>
      @endif

      <form method="POST" action="{{ route('password.email') }}" class="login-form">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
          <label for="email">Email <span style="color: #d32f2f;">*</span></label>
          <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="Masukkan email Anda"
            required
            autofocus
            class="@error('email') form-error @enderror">
          @error('email')<span class="form-error-msg">{{ $message }}</span>@enderror
        </div>

        <!-- Buttons -->
        <div class="login-actions">
          <button type="submit" class="btn-login">
            ✓ Kirim Link Reset
          </button>
        </div>

        <!-- Back to Login -->
        <div class="login-footer-link">
          <a href="{{ route('login') }}">← Kembali ke Login</a>
        </div>
      </form>

      <div class="form-info" style="background: #f5f5f5; border-left: 4px solid #FF85BB; padding: 1.25rem; margin-top: 2rem; border-radius: 4px;">
        <p style="margin: 0; font-size: 0.9rem; color: #666; line-height: 1.5;">
          <strong>Catatan:</strong> Anda akan diarahkan langsung ke halaman untuk mengubah password setelah memasukkan email terdaftar.
        </p>
      </div>
    </div>
  </div>

  <footer class="footer">
    <div class="footer-grid">
      <div class="footer-col">
        <div class="footer-logo">
          <span>DiKeDim</span>
        </div>
        <p>Platform manajemen barang gudang yang terintegrasi dan mudah digunakan untuk bisnis modern Anda.</p>
      </div>

      <div class="footer-col">
        <h4>Navigasi</h4>
        <a href="/dashboard">Dashboard</a>
        <a href="/barang/create">Barang Masuk</a>
        <a href="/barang">Daftar Barang</a>
        <a href="#">Laporan</a>
      </div>

      <div class="footer-col">
        <h4>Kontak & Info</h4>
        <p><strong>Email:</strong> admin@dikdim.id</p>
        <p><strong>Telepon:</strong> (0331) 123-4567</p>
        <p><strong>Lokasi:</strong> Jember, Jawa Timur</p>
      </div>

      <div class="footer-col">
        <h4>Informasi</h4>
        <p><strong>Versi:</strong> 2.0.0</p>
        <p><strong>Tahun:</strong> 2026</p>
        <p><strong>Status:</strong> Aktif</p>
      </div>
    </div>
    <hr>
    <p class="footer__copyright">© 2026 Sistem Manajemen Barang Gudang. All rights reserved.</p>
  </footer>

</body>
</html>
