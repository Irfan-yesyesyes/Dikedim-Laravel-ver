<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Manajemen Barang</title>
  @vite(['resources/css/app.css'])
</head>
<body>

  <nav class="navbar">
    <a href="#" class="navbar__brand">

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
      <li><a href="#" class="active">Beranda</a></li>
      <li><a href="#">Barang</a></li>
      <li><a href="#">Pengaturan</a></li>
    </ul>
  </nav>

  <section class="hero">
    <div class="hero__shapes"></div>
    <div class="hero__content">
      <div class="hero__badge">
        <span></span>
        SISTEM AKTIF
      </div>
      <h1>Kelola Inventaris<br><em>Lebih Cerdas</em></h1>
      <p>Platform manajemen barang gudang yang terintegrasi. Pantau stok, lacak transaksi, dan kelola supplier dalam satu sistem.</p>
    </div>
  </section>

  <section class="stats-section">
    <h2>Statistik Gudang</h2>
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-card__icon">📦</div>
        <div class="stat-card__value">5</div>
        <div class="stat-card__label">Total Barang</div>
      </div>
      <div class="stat-card">
        <div class="stat-card__icon">📁</div>
        <div class="stat-card__value">3</div>
        <div class="stat-card__label">Kategori</div>
      </div>
      <div class="stat-card">
        <div class="stat-card__icon">📚</div>
        <div class="stat-card__value">75</div>
        <div class="stat-card__label">Total Stok</div>
      </div>
      <div class="stat-card">
        <div class="stat-card__icon">💰</div>
        <div class="stat-card__value">Rp 88,2 Jt</div>
        <div class="stat-card__label">Nilai Inventaris</div>
      </div>
    </div>
  </section>

  <div class="main-layout">

    <aside class="sidebar">
      <h3>🔍 Filter Data</h3>

      <div class="filter-group">
        <div class="filter-group__label">Cari Barang</div>
        <input type="text" class="filter-search" placeholder="Nama atau kode...">
      </div>

      <div class="filter-group">
        <div class="filter-group__label">Kategori</div>
        <label class="checkbox-item">
          <input type="checkbox"> Elektronik
        </label>
        <label class="checkbox-item">
          <input type="checkbox"> Alat Tulis
        </label>
        <label class="checkbox-item">
          <input type="checkbox"> Furnitur
        </label>
      </div>

      <button class="filter-btn">Terapkan Filter</button>
    </aside>

    <div class="content-area">

      <!-- Form Card -->
      <div class="form-card">
        <h2>📦 Form Input Barang Masuk</h2>

        <div class="search-bar">
          <input type="text" placeholder="Cari atau filter...">
          <button class="btn-search">🔍 Cari</button>
        </div>

        <div class="form-grid">
          <div class="form-group">
            <label>Kode Barang *</label>
            <input type="text" placeholder="BRG-001">
          </div>
          <div class="form-group">
            <label>Nama Barang *</label>
            <input type="text" placeholder="Nama barang">
          </div>
          <div class="form-group">
            <label>Kategori *</label>
            <select>
              <option>Pilih Kategori</option>
            </select>
          </div>
          <div class="form-group">
            <label>Supplier</label>
            <select>
              <option>Pilih Supplier</option>
            </select>
          </div>
          <div class="form-group">
            <label>Stok *</label>
            <input type="number" placeholder="0">
          </div>
          <div class="form-group">
            <label>Harga Satuan (Rp) *</label>
            <input type="number" placeholder="0">
          </div>
          <div class="form-group">
            <label>Tanggal Masuk *</label>
            <input type="date">
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <input type="text" placeholder="(opsional)">
          </div>
        </div>

        <div class="form-actions">
          <button class="btn-primary">✓ Simpan Barang</button>
          <button class="btn-secondary">↺ Reset</button>
        </div>
      </div>

      <!-- Table Card -->
      <div class="table-card">
        <h2>📋 Daftar Barang</h2>

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
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><strong>BRG-001</strong></td>
                <td>Laptop Lenovo IdeaPad</td>
                <td><span class="badge badge--elektronik">Elektronik</span></td>
                <td>10</td>
                <td>Rp 7.500.000</td>
                <td>01/03/2026</td>
              </tr>
              <tr>
                <td><strong>BRG-002</strong></td>
                <td>Kertas HVS A4 80gr</td>
                <td><span class="badge badge--alat-tulis">Alat Tulis</span></td>
                <td>50</td>
                <td>Rp 55.000</td>
                <td>02/03/2026</td>
              </tr>
              <tr>
                <td><strong>BRG-003</strong></td>
                <td>Kursi Kantor Ergonomis</td>
                <td><span class="badge badge--furnitur">Furnitur</span></td>
                <td>3 ⚠️</td>
                <td>Rp 1.200.000</td>
                <td>03/03/2026</td>
              </tr>
              <tr>
                <td><strong>BRG-004</strong></td>
                <td>Printer Canon PIXMA</td>
                <td><span class="badge badge--elektronik">Elektronik</span></td>
                <td>8</td>
                <td>Rp 850.000</td>
                <td>04/03/2026</td>
              </tr>
              <tr>
                <td><strong>BRG-005</strong></td>
                <td>Spidol Whiteboard Pilot</td>
                <td><span class="badge badge--alat-tulis">Alat Tulis</span></td>
                <td>4 ⚠️</td>
                <td>Rp 12.000</td>
                <td>05/03/2026</td>
              </tr>
            </tbody>
          </table>
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
        <a href="#">Beranda</a>
        <a href="#">Barang Masuk</a>
        <a href="#">Daftar Barang</a>

        <a href="#">Pengaturan</a>
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

  <script>
    function toggleNav() {
      const navMenu = document.getElementById('navMenu');
      navMenu.classList.toggle('open');
    }
  </script>
</body>
</html>
                    <div class="flex items-center space-x-3">
                        <!-- Logo -->
                        <div class="w-10 h-10 bg-accent-500 rounded-lg flex items-center justify-center">
                            <i class="bi bi-box-seam text-white font-bold text-lg"></i>
                        </div>
                        <div>
                            <h1 class="text-xl font-bold">DiKeDim</h1>
                            <p class="text-xs text-primary-200">SISTEM MANAJEMEN BARANG</p>
                        </div>
                    </div>

                    <div class="hidden md:flex items-center space-x-6">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ route('dashboard') }}" class="hover:text-accent-300 transition-colors flex items-center gap-2">
                                    <i class="bi bi-house-door"></i>
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="hover:text-accent-300 transition-colors">
                                    Login
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="bg-accent-500 hover:bg-accent-600 px-4 py-2 rounded-lg font-medium transition-colors">
                                        Daftar
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>

                    <button class="md:hidden text-white">
                        <i class="bi bi-list text-2xl"></i>
                    </button>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="bg-gradient-to-br from-primary-700 to-primary-900 text-white py-20 md:py-32 relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="max-w-3xl">
                    <div class="inline-block mb-6">
                        <span class="bg-accent-500 text-white px-4 py-2 rounded-full text-sm font-semibold flex items-center gap-2 w-fit">
                            <span class="w-2 h-2 bg-white rounded-full animate-pulse"></span>
                            SISTEM AKTIF
                        </span>
                    </div>
                    <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                        Kelola Inventaris
                        <br>
                        <span class="text-accent-400">Lebih Cerdas</span>
                    </h1>
                    <p class="text-xl text-primary-100 mb-8 leading-relaxed max-w-2xl">
                        Platform manajemen barang gudang yang terintegrasi. Pantau stok, lacak transaksi, dan kelola supplier dalam satu sistem.
                    </p>
                </div>
            </div>

            <!-- Floating Elements -->
            <div class="absolute top-20 right-20 w-40 h-40 bg-accent-500 opacity-10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-10 w-64 h-64 bg-primary-600 opacity-20 rounded-full blur-3xl"></div>
        </div>


        <!-- Statistics Section -->
        <div class="bg-gray-100 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center gap-3 mb-12">
                    <i class="bi bi-bar-chart text-3xl text-primary-700"></i>
                    <h2 class="text-3xl font-bold text-gray-900">Statistik Gudang</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Total Barang -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow border-t-4 border-accent-500">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <p class="text-gray-600 font-medium">TOTAL BARANG</p>
                                <div class="w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center">
                                    <i class="bi bi-box text-accent-500 text-2xl"></i>
                                </div>
                            </div>
                            <p class="text-3xl font-bold text-gray-900">5</p>
                        </div>
                    </div>

                    <!-- Total Kategori -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow border-t-4 border-accent-500">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <p class="text-gray-600 font-medium">KATEGORI</p>
                                <div class="w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center">
                                    <i class="bi bi-folder text-accent-500 text-2xl"></i>
                                </div>
                            </div>
                            <p class="text-3xl font-bold text-gray-900">3</p>
                        </div>
                    </div>

                    <!-- Total Stok -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow border-t-4 border-accent-500">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <p class="text-gray-600 font-medium">TOTAL STOK</p>
                                <div class="w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center">
                                    <i class="bi bi-layers text-accent-500 text-2xl"></i>
                                </div>
                            </div>
                            <p class="text-3xl font-bold text-gray-900">75</p>
                        </div>
                    </div>

                    <!-- Nilai Inventaris -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow border-t-4 border-accent-500">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <p class="text-gray-600 font-medium">NILAI INVENTARIS</p>
                                <div class="w-12 h-12 bg-accent-100 rounded-lg flex items-center justify-center">
                                    <i class="bi bi-cash-coin text-accent-500 text-2xl"></i>
                                </div>
                            </div>
                            <p class="text-3xl font-bold text-gray-900">Rp 88,2 Jt</p>
                        </div>
                    </div>

                    <!-- Stok Rendah -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow border-4 border-warning-500 md:col-span-2 lg:col-span-2">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <p class="text-gray-600 font-medium">STOK MENIPIS (&lt;5)</p>
                                <div class="w-12 h-12 bg-warning-100 rounded-lg flex items-center justify-center">
                                    <i class="bi bi-exclamation-triangle text-warning-600 text-2xl"></i>
                                </div>
                            </div>
                            <p class="text-3xl font-bold text-gray-900">2</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="bg-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center gap-3 mb-8">
                    <i class="bi bi-search text-2xl text-primary-700"></i>
                    <h2 class="text-2xl font-bold text-gray-900">Filter Data</h2>
                </div>

                <div class="bg-white border border-gray-200 rounded-xl p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">CARI BARANG</label>
                            <input type="text" placeholder="Nama atau kode barang..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-700 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">KATEGORI</label>
                            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-700 focus:border-transparent">
                                <option>Pilih Kategori</option>
                                <option>Elektronik</option>
                                <option>Alat Tulis</option>
                                <option>Furnitur</option>
                            </select>
                        </div>
                        <div class="flex items-end gap-2">
                            <button class="flex-1 bg-primary-700 hover:bg-primary-800 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                                Terapkan Filter
                            </button>
                            <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg font-medium transition-colors">
                                🔄 Reset
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="bg-gray-100 py-12">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-xl shadow-md p-8 border-l-4 border-accent-500">
                    <h2 class="text-2xl font-bold text-gray-900 mb-8 flex items-center gap-3">
                        <span class="text-accent-500">📦</span>
                        Form Input Barang Masuk
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Kode Barang <span class="text-danger-500">*</span></label>
                            <input type="text" placeholder="Cth: BRG-001" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-700 focus:border-transparent">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Barang <span class="text-danger-500">*</span></label>
                            <input type="text" placeholder="Nama barang" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-700 focus:border-transparent">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori <span class="text-danger-500">*</span></label>
                            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-700 focus:border-transparent">
                                <option>Pilih Kategori</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Supplier</label>
                            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-700 focus:border-transparent">
                                <option>Pilih Supplier</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Stok <span class="text-danger-500">*</span></label>
                            <input type="number" placeholder="0" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-700 focus:border-transparent">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Harga Satuan (Rp) <span class="text-danger-500">*</span></label>
                            <input type="number" placeholder="0" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-700 focus:border-transparent">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Masuk <span class="text-danger-500">*</span></label>
                            <input type="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-700 focus:border-transparent">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Keterangan</label>
                            <input type="text" placeholder="Keterangan (opsional)" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-700 focus:border-transparent">
                        </div>
                    </div>

                    <div class="mt-8">
                        <button class="bg-primary-700 hover:bg-primary-800 text-white px-8 py-3 rounded-lg font-semibold transition-colors flex items-center gap-2">
                            <i class="bi bi-check-circle"></i>
                            Simpan Barang
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-xl shadow-md overflow-hidden border-l-4 border-accent-500">
                    <div class="p-8 border-b border-gray-200">
                        <h2 class="text-2xl font-bold text-gray-900 flex items-center justify-between">
                            <span class="flex items-center gap-3">
                                <span class="text-accent-500">📋</span>
                                Daftar Barang
                            </span>
                            <span class="text-gray-500 text-lg">5 barang</span>
                        </h2>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-primary-700 text-white">
                                    <th class="px-6 py-3 text-left text-sm font-semibold">KODE</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold">NAMA BARANG</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold">KATEGORI</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold">STOK</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold">HARGA SATUAN</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold">TANGGAL</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 font-semibold text-gray-900">BRG-001</td>
                                    <td class="px-6 py-4 text-gray-700">Laptop Lenovo IdeaPad</td>
                                    <td class="px-6 py-4"><span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">Elektronik</span></td>
                                    <td class="px-6 py-4 text-gray-700">10</td>
                                    <td class="px-6 py-4 text-gray-700">Rp 7.500.000</td>
                                    <td class="px-6 py-4 text-gray-700">01/03/2026</td>
                                </tr>
                                <tr class="bg-pink-50 hover:bg-pink-100 transition-colors">
                                    <td class="px-6 py-4 font-semibold text-gray-900">BRG-002</td>
                                    <td class="px-6 py-4 text-gray-700">Kertas HVS A4 80gr</td>
                                    <td class="px-6 py-4"><span class="bg-pink-100 text-pink-700 px-3 py-1 rounded-full text-sm font-medium">Alat Tulis</span></td>
                                    <td class="px-6 py-4 text-gray-700">50</td>
                                    <td class="px-6 py-4 text-gray-700">Rp 55.000</td>
                                    <td class="px-6 py-4 text-gray-700">02/03/2026</td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 font-semibold text-gray-900">BRG-003</td>
                                    <td class="px-6 py-4 text-gray-700">Kursi Kantor Ergonomis</td>
                                    <td class="px-6 py-4"><span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-medium">Furnitur</span></td>
                                    <td class="px-6 py-4"><span class="flex items-center gap-1"><span>3</span><i class="bi bi-exclamation-triangle text-warning-600"></i></span></td>
                                    <td class="px-6 py-4 text-gray-700">Rp 1.200.000</td>
                                    <td class="px-6 py-4 text-gray-700">03/03/2026</td>
                                </tr>
                                <tr class="bg-gray-50 hover:bg-gray-100 transition-colors">
                                    <td class="px-6 py-4 font-semibold text-gray-900">BRG-004</td>
                                    <td class="px-6 py-4 text-gray-700">Printer Canon PIXMA</td>
                                    <td class="px-6 py-4"><span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">Elektronik</span></td>
                                    <td class="px-6 py-4 text-gray-700">8</td>
                                    <td class="px-6 py-4 text-gray-700">Rp 850.000</td>
                                    <td class="px-6 py-4 text-gray-700">04/03/2026</td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 font-semibold text-gray-900">BRG-005</td>
                                    <td class="px-6 py-4 text-gray-700">Spidol Whiteboard Pilot</td>
                                    <td class="px-6 py-4"><span class="bg-pink-100 text-pink-700 px-3 py-1 rounded-full text-sm font-medium">Alat Tulis</span></td>
                                    <td class="px-6 py-4"><span class="flex items-center gap-1"><span>4</span><i class="bi bi-exclamation-triangle text-warning-600"></i></span></td>
                                    <td class="px-6 py-4 text-gray-700">Rp 12.000</td>
                                    <td class="px-6 py-4 text-gray-700">05/03/2026</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-primary-700 text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                    <!-- About -->
                    <div>
                        <div class="flex items-center gap-2 mb-4">
                            <div class="w-10 h-10 bg-accent-500 rounded-lg flex items-center justify-center">
                                <i class="bi bi-box-seam text-white font-bold"></i>
                            </div>
                            <h3 class="text-lg font-bold">DiKeDim</h3>
                        </div>
                        <p class="text-primary-100">Platform manajemen barang gudang yang terintegrasi dan mudah digunakan untuk bisnis modern.</p>
                    </div>

                    <!-- Navigation -->
                    <div>
                        <h4 class="text-lg font-semibold mb-4 text-accent-400">Navigasi</h4>
                        <ul class="space-y-2 text-primary-100">
                            <li><a href="#" class="hover:text-accent-400 transition-colors">Beranda</a></li>
                            <li><a href="#" class="hover:text-accent-400 transition-colors">Barang Masuk</a></li>
                            <li><a href="#" class="hover:text-accent-400 transition-colors">Daftar Barang</a></li>

                            <li><a href="#" class="hover:text-accent-400 transition-colors">Pengaturan</a></li>
                        </ul>
                    </div>

                    <!-- Contact -->
                    <div>
                        <h4 class="text-lg font-semibold mb-4 text-accent-400">Kontak & Info</h4>
                        <ul class="space-y-2 text-primary-100">
                            <li class="flex items-center gap-2">
                                <i class="bi bi-envelope"></i>
                                <span>admin@dikdim.id</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="bi bi-telephone"></i>
                                <span>(0331) 123-4567</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <i class="bi bi-geo-alt"></i>
                                <span>Jember, Jawa Timur</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Info -->
                    <div>
                        <h4 class="text-lg font-semibold mb-4 text-accent-400">Informasi</h4>
                        <p class="text-primary-100 text-sm">Versi 2.0.0 • 2026</p>
                        <p class="text-primary-100 text-sm mt-2">© 2026 DiKeDim — Sistem Manajemen Barang. All rights reserved.</p>
                    </div>
                </div>

                <div class="border-t border-primary-600 pt-8">
                    <p class="text-center text-primary-100 text-sm">&copy; {{ date('Y') }} DiKeDim — Sistem Manajemen Barang. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </body>
</html>
