<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Barang - {{ $barang->nama }}</title>
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
      <li><a href="#">Laporan</a></li>
      <li><a href="#" onclick="logout()">Logout</a></li>
    </ul>
  </nav>

  <section class="hero">
    <div class="hero__shapes"></div>
    <div class="hero__content">
      <div class="hero__badge">
        <span></span>
        DETAIL BARANG
      </div>
      <h1>{{ $barang->nama }}<br><em>{{ $barang->kode }}</em></h1>
      <p>Lihat informasi lengkap mengenai barang gudang di sistem inventori.</p>
    </div>
  </section>

  <div class="main-layout">

    <aside class="sidebar">
      <h3>🔍 Detail Info</h3>

      <div class="filter-group">
        <div class="filter-group__label">Status Barang</div>
        <p style="margin: 0.5rem 0; color: #666; font-size: 0.95rem;">
          <strong>Stok:</strong> {{ $barang->stok }} unit
        </p>
        <p style="margin: 0.5rem 0; color: #666; font-size: 0.95rem;">
          <strong>Kondisi:</strong> {{ $barang->kondisi }}
        </p>
      </div>

      <div class="filter-group">
        <a href="{{ route('barang.edit', $barang) }}" class="filter-btn" style="background: #FF85BB; border: none; display: block; text-align: center; text-decoration: none; color: white;">
          ✏️ Edit Barang
        </a>
        <form action="{{ route('barang.destroy', $barang) }}" method="POST" style="margin-top: 1rem;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="filter-btn" style="background: #ef4444; border: none; display: block; text-align: center; color: white; width: 100%; cursor: pointer;">
            🗑️ Hapus Barang
          </button>
        </form>
        <a href="{{ route('barang.index') }}" class="filter-btn" style="background: #2196F3; border: none; display: block; text-align: center; text-decoration: none; color: white; margin-top: 1rem;">
          ← Kembali ke Daftar
        </a>
      </div>
    </aside>

    <div class="content-area">

      <!-- Detail Grid -->
      <div class="table-card">
        <h2>📦 Informasi Barang</h2>

        <div style="padding: 2rem; background: white;">
          <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 2rem; margin-bottom: 2rem;">
            <!-- Left: Foto -->
            <div style="display: flex; flex-direction: column; align-items: center;">
              @if($barang->foto)
                <img src="{{ Storage::url($barang->foto) }}" alt="Foto Barang" style="width: 100%; max-width: 280px; height: auto; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
              @else
                <div style="width: 100%; max-width: 280px; height: 280px; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #f5f5f5 0%, #e9e9e9 100%); border-radius: 8px;">
                  <i class="bi bi-image" style="font-size: 4rem; color: #d0d0d0;"></i>
                </div>
              @endif
              <h3 style="margin-top: 1rem; text-align: center; color: #021A54;">{{ $barang->nama }}</h3>
              <p style="color: #999; font-size: 0.9rem;">{{ $barang->kode }}</p>
            </div>

            <!-- Right: Info Utama -->
            <div>
              <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                  <p style="font-size: 0.85rem; font-weight: 600; color: #999; text-transform: uppercase; margin-bottom: 0.5rem;">Kode Barang</p>
                  <p style="font-size: 1rem; font-weight: 600; color: #021A54;">{{ $barang->kode }}</p>
                </div>
                <div>
                  <p style="font-size: 0.85rem; font-weight: 600; color: #999; text-transform: uppercase; margin-bottom: 0.5rem;">Nama Barang</p>
                  <p style="font-size: 1rem; font-weight: 600; color: #021A54;">{{ $barang->nama }}</p>
                </div>
              </div>

              <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                <div>
                  <p style="font-size: 0.85rem; font-weight: 600; color: #999; text-transform: uppercase; margin-bottom: 0.5rem;">Kategori</p>
                  <span style="display: inline-block; padding: 0.5rem 1rem; border-radius: 6px; font-size: 0.85rem; font-weight: 600; background: linear-gradient(135deg, #E3F2FD 0%, #BBDEFB 100%); color: #1565C0;">{{ $barang->kategori }}</span>
                </div>
                <div>
                  <p style="font-size: 0.85rem; font-weight: 600; color: #999; text-transform: uppercase; margin-bottom: 0.5rem;">Supplier</p>
                  <p style="font-size: 1rem; font-weight: 600; color: #021A54;">{{ $barang->supplier ?? '-' }}</p>
                </div>
              </div>

              <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                <div>
                  <p style="font-size: 0.85rem; font-weight: 600; color: #999; text-transform: uppercase; margin-bottom: 0.5rem;">Harga</p>
                  <p style="font-size: 1rem; font-weight: 600; color: #021A54;">Rp {{ number_format($barang->harga, 0, ',', '.') }}</p>
                </div>
                <div>
                  <p style="font-size: 0.85rem; font-weight: 600; color: #999; text-transform: uppercase; margin-bottom: 0.5rem;">Kondisi</p>
                  <span style="display: inline-block; padding: 0.5rem 1rem; border-radius: 6px; font-size: 0.85rem; font-weight: 600; background: {{ $barang->kondisi == 'Baik' ? 'linear-gradient(135deg, #E8F5E9 0%, #C8E6C9 100%); color: #388E3C;' : ($barang->kondisi == 'Rusak' ? 'linear-gradient(135deg, #FFF3E0 0%, #FFE0B2 100%); color: #F57C00;' : 'linear-gradient(135deg, #FFEBEE 0%, #FFCDD2 100%); color: #D32F2F;') }}">{{ $barang->kondisi }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Stok Information -->
      <div class="table-card" style="margin-top: 2rem;">
        <h2>📊 Informasi Stok</h2>

        <div style="padding: 2rem;">
          <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem;">
            <div>
              <p style="font-size: 0.85rem; font-weight: 600; color: #999; text-transform: uppercase; margin-bottom: 0.5rem;">Jumlah Stok</p>
              <p style="font-size: 1.8rem; font-weight: 800; color: {{ $barang->stok < 5 ? '#EF4444' : '#10B981' }};">{{ $barang->stok }}</p>
            </div>
            <div>
              <p style="font-size: 0.85rem; font-weight: 600; color: #999; text-transform: uppercase; margin-bottom: 0.5rem;">Tanggal Masuk</p>
              <p style="font-size: 1rem; font-weight: 600; color: #021A54;">{{ $barang->tanggal_masuk?->format('d M Y') ?? '-' }}</p>
            </div>
            <div>
              <p style="font-size: 0.85rem; font-weight: 600; color: #999; text-transform: uppercase; margin-bottom: 0.5rem;">Lokasi</p>
              <p style="font-size: 1rem; font-weight: 600; color: #021A54;">{{ $barang->lokasi }}</p>
            </div>
          </div>

          @if($barang->stok < 5)
            <div style="background: linear-gradient(135deg, #FFF3E0 0%, #FFE0B2 100%); border: 1px solid #F57C00; border-radius: 8px; padding: 1rem 1.5rem; display: flex; align-items: center; gap: 1rem; margin-top: 1.5rem;">
              <i class="bi bi-exclamation-triangle" style="font-size: 1.5rem; color: #F57C00;"></i>
              <div>
                <strong style="color: #F57C00;">Peringatan!</strong> Stok barang ini rendah. Pertimbangkan untuk melakukan pemesanan ulang.
              </div>
            </div>
          @endif
        </div>
      </div>

      <!-- Keterangan -->
      @if($barang->keterangan)
        <div class="table-card" style="margin-top: 2rem;">
          <h2>📝 Keterangan</h2>

          <div style="padding: 2rem;">
            <p style="color: #021A54; line-height: 1.6;">{{ $barang->keterangan }}</p>
          </div>
        </div>
      @endif

      <!-- History -->
      <div class="table-card" style="margin-top: 2rem;">
        <h2>⏱️ Riwayat</h2>

        <div style="padding: 2rem;">
          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div>
              <p style="font-size: 0.85rem; font-weight: 600; color: #999; text-transform: uppercase; margin-bottom: 0.5rem;">Dibuat</p>
              <p style="font-size: 0.95rem; color: #021A54;">{{ $barang->created_at->format('d M Y H:i') }}</p>
            </div>
            <div>
              <p style="font-size: 0.85rem; font-weight: 600; color: #999; text-transform: uppercase; margin-bottom: 0.5rem;">Diperbarui</p>
              <p style="font-size: 0.95rem; color: #021A54;">{{ $barang->updated_at->format('d M Y H:i') }}</p>
            </div>
          </div>
        </div>
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
  </script>
</body>
</html>
