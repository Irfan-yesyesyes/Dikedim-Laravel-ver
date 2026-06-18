<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Barang - Sistem Manajemen Barang</title>
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

    <button class="navbar__hamburger" onclick="toggleNav()" aria-label="Menu">
      <span></span>
      <span></span>
      <span></span>
    </button>

    <ul class="navbar__nav" id="navMenu">
      <li><a href="/dashboard">Dashboard</a></li>
      <li><a href="/barang" class="active">Barang</a></li>
      <li><a href="#" onclick="logout()">Logout</a></li>
    </ul>
  </nav>

  <section class="hero">
    <div class="hero__shapes"></div>
    <div class="hero__content">
      <div class="hero__badge">
        <span></span>
        DAFTAR BARANG
      </div>
      <h1>Manajemen<br><em>Barang</em></h1>
      <p>Kelola inventori gudang Anda dengan mudah dan efisien dengan sistem terintegrasi.</p>
    </div>
  </section>

  <section class="stats-section">
    <h2>Statistik Barang</h2>
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-card__icon">📦</div>
        <div class="stat-card__value">{{ $totalBarang ?? 0 }}</div>
        <div class="stat-card__label">Total Barang</div>
      </div>
      <div class="stat-card">
        <div class="stat-card__icon">📚</div>
        <div class="stat-card__value">{{ $totalStok ?? 0 }}</div>
        <div class="stat-card__label">Total Stok</div>
      </div>
      <div class="stat-card">
        <div class="stat-card__icon">⚠️</div>
        <div class="stat-card__value">{{ $stokRendah ?? 0 }}</div>
        <div class="stat-card__label">Stok Rendah</div>
      </div>
      <div class="stat-card">
        <div class="stat-card__icon">📁</div>
        <div class="stat-card__value">{{ $totalKategori ?? 0 }}</div>
        <div class="stat-card__label">Kategori</div>
      </div>
    </div>
  </section>

  <div class="main-layout">

    <aside class="sidebar">
      <h3>🔍 Filter Data</h3>

      <div class="filter-group">
        <div class="filter-group__label">Cari Barang</div>
        <input type="text" class="filter-search" id="searchInput" placeholder="Nama atau kode...">
      </div>

      <div class="filter-group">
        <div class="filter-group__label">Kategori</div>
        <label class="checkbox-item">
          <input type="checkbox"> Semua Kategori
        </label>
        @foreach($kategoris ?? [] as $kat)
        <label class="checkbox-item">
          <input type="checkbox"> {{ $kat->nama_kategori }}
        </label>
        @endforeach
      </div>

      <div class="filter-group">
        <div class="filter-group__label">Kondisi</div>
        <label class="checkbox-item">
          <input type="checkbox"> Baik
        </label>
        <label class="checkbox-item">
          <input type="checkbox"> Rusak
        </label>
        <label class="checkbox-item">
          <input type="checkbox"> Hilang
        </label>
      </div>

      <button class="filter-btn">Terapkan Filter</button>

      <a href="{{ route('barang.create') }}" class="filter-btn" style="background: #ff8557; border: none; margin-top: 1rem; display: block; text-align: center; text-decoration: none; color: white;">
        ➕ Tambah Barang
      </a>
    </aside>

    <div class="content-area">

      <!-- Table Card -->
      <div class="table-card">
        <h2>📋 Daftar Barang</h2>

        @if($barangs->count() > 0)
        <div class="table-wrapper">
          <table>
            <thead>
              <tr>
                <th>KODE</th>
                <th>NAMA BARANG</th>
                <th>KATEGORI</th>
                <th>STOK</th>
                <th>HARGA SATUAN</th>
                <th>TANGGAL</th>
                <th>SUPPLIER</th>
                <th>KONDISI</th>
                <th>AKSI</th>
              </tr>
            </thead>
            <tbody>
              @foreach($barangs as $barang)
              <tr>
                <td><strong>{{ $barang->kode }}</strong></td>
                <td>{{ $barang->nama }}</td>
                <td><span class="badge">{{ $barang->kategori ?? 'Umum' }}</span></td>
                <td>
                  @if($barang->stok < 5)
                    <span class="badge" style="background: #ffebee; color: #d32f2f;">{{ $barang->stok }}</span>
                  @elseif($barang->stok < 10)
                    <span class="badge" style="background: #fff3e0; color: #f57c00;">{{ $barang->stok }}</span>
                  @else
                    <span class="badge" style="background: #e8f5e9; color: #388e3c;">{{ $barang->stok }}</span>
                  @endif
                </td>
                <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                <td>{{ $barang->tanggal_masuk?->format('d/m/Y') }}</td>
                <td>{{ $barang->supplier_rel?->nama ?? '-' }}</td>
                <td>
                  @if($barang->kondisi == 'Baik')
                    <span class="badge" style="background: #e8f5e9; color: #388e3c;">{{ $barang->kondisi }}</span>
                  @elseif($barang->kondisi == 'Rusak')
                    <span class="badge" style="background: #fff3e0; color: #f57c00;">{{ $barang->kondisi }}</span>
                  @else
                    <span class="badge" style="background: #ffebee; color: #d32f2f;">{{ $barang->kondisi ?? 'Unknown' }}</span>
                  @endif
                </td>
                <td>
                  <a href="{{ route('barang.show', $barang) }}" class="action-link">
                    <i class="bi bi-eye"></i> Lihat
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!-- Pagination Info -->
        <div style="padding: 1rem 2rem; border-top: 1px solid #ddd; font-size: 0.9rem; color: #666;">
          Menampilkan <strong>{{ $barangs->firstItem() ?? 0 }}</strong> sampai
          <strong>{{ $barangs->lastItem() ?? 0 }}</strong> dari
          <strong>{{ $barangs->total() }}</strong> data
        </div>

        @else
        <div style="text-align: center; padding: 3rem 2rem; color: #999;">
          <p style="font-size: 1.1rem; margin-bottom: 1rem;">📦 Belum ada data barang</p>
          <a href="{{ route('barang.create') }}" style="display: inline-block; background: #ff8557; color: white; padding: 0.75rem 1.5rem; border-radius: 6px; text-decoration: none; font-weight: 600;">
            ➕ Tambah Barang Baru
          </a>
        </div>
        @endif
      </div>

    </div>
  </div>

  <footer>
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

    <hr class="footer-divider">
    <p class="footer-bottom">&copy; 2026 <span>Sistem Manajemen Barang Gudang</span>. All rights reserved.</p>
  </footer>

  <form method="POST" action="{{ route('logout') }}" id="logoutForm" style="display: none;">
    @csrf
  </form>

  <script>
    function toggleNav() {
      const navMenu = document.getElementById('navMenu');
      navMenu.classList.toggle('open');
    }

    function logout() {
      event.preventDefault();
      document.getElementById('logoutForm').submit();
    }

    // Search functionality
    document.getElementById('searchInput')?.addEventListener('keyup', function(e) {
      const searchTerm = e.target.value.toLowerCase();
      const rows = document.querySelectorAll('tbody tr');
      rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchTerm) ? '' : 'none';
      });
    });
  </script>

  <style>
    .action-link {
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
      padding: 0.5rem 0.75rem;
      background: linear-gradient(135deg, #FF85BB 0%, #FF6B9D 100%);
      color: white;
      text-decoration: none;
      border-radius: 6px;
      font-weight: 500;
      font-size: 0.9rem;
      transition: all 0.3s ease;
      box-shadow: 0 2px 8px rgba(255, 133, 187, 0.2);
    }

    .action-link:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(255, 133, 187, 0.35);
      background: linear-gradient(135deg, #FF6B9D 0%, #FF4A7E 100%);
    }

    .action-link i {
      font-size: 0.95rem;
    }
  </style>
</body>
</html>
