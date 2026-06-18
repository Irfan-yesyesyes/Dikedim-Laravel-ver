<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Sistem Manajemen Barang</title>
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
        MASUK KE SISTEM
      </div>
      <h1>Login<br><em>Akun</em></h1>
      <p>Masuk ke sistem manajemen barang untuk mengelola inventori Anda.</p>
    </div>
  </section>

  <div class="login-container">
    <div class="login-card">
      <h2>🔐 Login Ke Sistem</h2>

      @if ($errors->any())
        <div class="form-error-box">
          <strong>⚠️ Login Gagal!</strong>
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
          <label for="email">Email <span style="color: #d32f2f;">*</span></label>
          <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="admin@example.com"
            required
            autofocus
            class="@error('email') form-error @enderror">
          @error('email')<span class="form-error-msg">{{ $message }}</span>@enderror
        </div>

        <!-- Password -->
        <div class="form-group">
          <label for="password">Password <span style="color: #d32f2f;">*</span></label>
          <input
            type="password"
            id="password"
            name="password"
            placeholder="Masukkan password"
            required
            class="@error('password') form-error @enderror">
          @error('password')<span class="form-error-msg">{{ $message }}</span>@enderror
        </div>

        <!-- Remember Me -->
        <div class="form-group-checkbox">
          <label for="remember_me">
            <input id="remember_me" type="checkbox" name="remember">
            <span>Ingat saya</span>
          </label>
        </div>

        <!-- Buttons -->
        <div class="login-actions">
          <button type="submit" class="btn-login">
            ✓ Masuk
          </button>
        </div>

        <!-- Forgot Password Link -->
        @if (Route::has('password.request'))
          <div class="login-footer-link">
            <a href="{{ route('password.request') }}">Lupa Password?</a>
          </div>
        @endif
      </form>
    </div>
  </div>

  <footer class="footer">
    <div class="footer__content">
      <div class="footer__section">
        <div class="footer__brand">
          <div>DiKeDim</div>
        </div>
        <p>Platform manajemen barang gudang yang terintegrasi dan mudah digunakan untuk bisnis modern Anda.</p>
      </div>
      <div class="footer__section">
        <h4>Navigasi</h4>
        <a href="/dashboard">Dashboard</a>
        <a href="/barang/create">Barang Masuk</a>
        <a href="/barang">Daftar Barang</a>
        <a href="#">Laporan</a>
      </div>
      <div class="footer__section">
        <h4>Kontak & Info</h4>
        <p><strong>Email:</strong> admin@dikdim.id</p>
        <p><strong>Telepon:</strong> (0331) 123-4567</p>
        <p><strong>Lokasi:</strong> Jember, Jawa Timur</p>
      </div>
      <div class="footer__section">
        <h4>Informasi</h4>
        <p><strong>Versi:</strong> 2.0.0</p>
        <p><strong>Tahun:</strong> 2026</p>
        <p><strong>Status:</strong> Aktif</p>
      </div>
    </div>
    <hr>
    <p class="footer__copyright">© 2026 Sistem Manajemen Barang Gudang. All rights reserved.</p>
  </footer>

  <style>
    .login-container {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 70vh;
      padding: 2rem;
      background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    }

    .login-card {
      background: white;
      border-radius: 12px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
      padding: 3.5rem;
      width: 100%;
      max-width: 450px;
    }

    .login-card h2 {
      text-align: center;
      color: #021A54;
      margin-bottom: 2.5rem;
      font-size: 1.5rem;
    }

    .form-error-box {
      background: #ffebee;
      border: 1px solid #d32f2f;
      border-radius: 8px;
      padding: 1.25rem;
      margin-bottom: 2rem;
      color: #d32f2f;
    }

    .form-error-box strong {
      display: block;
      margin-bottom: 0.5rem;
    }

    .form-error-box ul {
      margin: 0;
      padding-left: 1.5rem;
    }

    .form-error-box li {
      font-size: 0.9rem;
    }

    .login-form {
      margin-bottom: 2rem;
    }

    .form-group {
      margin-bottom: 2rem;
    }

    .form-group label {
      display: block;
      margin-bottom: 0.5rem;
      color: #021A54;
      font-weight: 600;
      font-size: 0.95rem;
    }

    .form-group input[type="email"],
    .form-group input[type="password"] {
      width: 100%;
      padding: 1rem;
      border: 2px solid #e0e0e0;
      border-radius: 8px;
      font-size: 1rem;
      transition: all 0.3s ease;
    }

    .form-group input[type="email"]:focus,
    .form-group input[type="password"]:focus {
      outline: none;
      border-color: #FF85BB;
      box-shadow: 0 0 0 3px rgba(255, 133, 187, 0.1);
    }

    .form-group input.form-error {
      border-color: #d32f2f;
    }

    .form-error-msg {
      color: #d32f2f;
      font-size: 0.85rem;
      margin-top: 0.25rem;
      display: block;
    }

    .form-group-checkbox {
      display: flex;
      align-items: center;
      margin-bottom: 1.5rem;
    }

    .form-group-checkbox label {
      display: flex;
      align-items: center;
      margin: 0;
      cursor: pointer;
      font-weight: 500;
      color: #666;
    }

    .form-group-checkbox input[type="checkbox"] {
      margin-right: 0.5rem;
      cursor: pointer;
    }

    .login-actions {
      margin-bottom: 2rem;
    }

    .btn-login {
      width: 100%;
      padding: 1rem 1.5rem;
      background: linear-gradient(135deg, #FF85BB 0%, #FF6B9D 100%);
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(255, 133, 187, 0.3);
    }

    .btn-login:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(255, 133, 187, 0.4);
    }

    .btn-login:active {
      transform: translateY(0);
    }

    .login-footer-link {
      text-align: center;
      margin-bottom: 2.5rem;
    }

    .login-footer-link a {
      color: #FF85BB;
      text-decoration: none;
      font-weight: 600;
      transition: color 0.3s ease;
    }

    .login-footer-link a:hover {
      color: #FF6B9D;
    }

    .login-info {
      background: #f5f7fa;
      border-left: 4px solid #FF85BB;
      padding: 1rem;
      border-radius: 8px;
      font-size: 0.9rem;
      color: #333;
    }

    .login-info p {
      margin: 0.25rem 0;
    }

    .login-info strong {
      color: #021A54;
    }

    .login-info code {
      background: #fff;
      padding: 0.25rem 0.5rem;
      border-radius: 4px;
      font-family: 'Courier New', monospace;
      color: #FF85BB;
    }

    @media (max-width: 768px) {
      .login-card {
        padding: 2.5rem;
      }

      .login-container {
        min-height: 60vh;
      }
    }
  </style>

</body>
</html>
