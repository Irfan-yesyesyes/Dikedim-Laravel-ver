<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Barang - Sistem Manajemen Barang</title>
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
        EDIT BARANG
      </div>
      <h1>Edit Barang<br><em>{{ $barang->nama }}</em></h1>
      <p>Perbarui informasi barang yang sudah ada di dalam sistem.</p>
    </div>
  </section>

  <div class="main-layout">

    <aside class="sidebar">
      <h3>📝 Informasi Form</h3>
      <div class="form-info">
        <p><strong>📋 Petunjuk</strong></p>
        <p>Edit data barang di bawah ini. Semua field yang bertanda <span style="color: #d32f2f;">*</span> harus diisi.</p>
        <p style="margin-top: 1rem; font-size: 0.9rem; color: #666;">Perubahan akan otomatis tersimpan dan terintegrasi dengan sistem inventori.</p>
      </div>
    </aside>

    <div class="content-area">

      <!-- Form Card -->
      <div class="form-card">
        <h2>✏️ Form Edit Barang</h2>

        <form action="{{ route('barang.update', $barang) }}" method="POST" enctype="multipart/form-data" x-data="{
          fotoPreview: '{{ $barang->foto ? Storage::url($barang->foto) : '' }}',
          initializePreview() {
            if (!this.fotoPreview) {
              this.$watch('fotoPreview', () => this.$nextTick());
            }
          }
        }" @load="initializePreview()">
          @csrf
          @method('PUT')

          <!-- Informasi Dasar -->
          <div class="form-section">
            <h3>1. Informasi Dasar</h3>
            <div class="form-grid">
              <div class="form-group">
                <label>Kode Barang <span style="color: #d32f2f;">*</span></label>
                <input type="text" name="kode" value="{{ old('kode', $barang->kode) }}" placeholder="BRG-001" required
                       class="@error('kode') form-error @enderror">
                @error('kode')<span class="form-error-msg">{{ $message }}</span>@enderror
              </div>
              <div class="form-group">
                <label>Nama Barang <span style="color: #d32f2f;">*</span></label>
                <input type="text" name="nama" value="{{ old('nama', $barang->nama) }}" placeholder="Nama barang" required
                       class="@error('nama') form-error @enderror">
                @error('nama')<span class="form-error-msg">{{ $message }}</span>@enderror
              </div>
              <div class="form-group">
                <label>Kategori <span style="color: #d32f2f;">*</span></label>
                <select name="kategori_id" required class="@error('kategori_id') form-error @enderror">
                  <option value="">-- Pilih Kategori --</option>
                  @foreach($kategoris as $kat)
                    <option value="{{ $kat->id }}" {{ old('kategori_id', $barang->kategori_id) == $kat->id ? 'selected' : '' }}>
                      {{ $kat->nama_kategori }}
                    </option>
                  @endforeach
                </select>
                @error('kategori_id')<span class="form-error-msg">{{ $message }}</span>@enderror
              </div>
              <div class="form-group">
                <label>Supplier</label>
                <select name="supplier_id" class="@error('supplier_id') form-error @enderror">
                  <option value="">-- Pilih Supplier --</option>
                  @foreach($suppliers as $sup)
                    <option value="{{ $sup->id }}" {{ old('supplier_id', $barang->supplier_id) == $sup->id ? 'selected' : '' }}>
                      {{ $sup->nama }}
                    </option>
                  @endforeach
                </select>
                @error('supplier_id')<span class="form-error-msg">{{ $message }}</span>@enderror
              </div>
            </div>
          </div>

          <!-- Stok & Harga -->
          <div class="form-section">
            <h3>2. Stok & Harga</h3>
            <div class="form-grid">
              <div class="form-group">
                <label>Stok <span style="color: #d32f2f;">*</span></label>
                <input type="number" name="stok" value="{{ old('stok', $barang->stok) }}" min="0" required
                       class="@error('stok') form-error @enderror">
                @error('stok')<span class="form-error-msg">{{ $message }}</span>@enderror
              </div>
              <div class="form-group">
                <label>Harga (Rp) <span style="color: #d32f2f;">*</span></label>
                <input type="number" name="harga" value="{{ old('harga', $barang->harga) }}" min="0" step="1000" required
                       class="@error('harga') form-error @enderror">
                @error('harga')<span class="form-error-msg">{{ $message }}</span>@enderror
              </div>
              <div class="form-group">
                <label>Tanggal Masuk <span style="color: #d32f2f;">*</span></label>
                <input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk', $barang->tanggal_masuk?->format('Y-m-d')) }}" required
                       class="@error('tanggal_masuk') form-error @enderror">
                @error('tanggal_masuk')<span class="form-error-msg">{{ $message }}</span>@enderror
              </div>
              <div class="form-group">
                <label>Lokasi <span style="color: #d32f2f;">*</span></label>
                <input type="text" name="lokasi" value="{{ old('lokasi', $barang->lokasi) }}" placeholder="Rak A1" required
                       class="@error('lokasi') form-error @enderror">
                @error('lokasi')<span class="form-error-msg">{{ $message }}</span>@enderror
              </div>
            </div>
          </div>

          <!-- Kondisi -->
          <div class="form-section">
            <h3>3. Kondisi & Keterangan</h3>
            <div class="form-grid">
              <div class="form-group">
                <label>Kondisi <span style="color: #d32f2f;">*</span></label>
                <select name="kondisi" required class="@error('kondisi') form-error @enderror">
                  <option value="">-- Pilih Kondisi --</option>
                  <option value="Baik" {{ old('kondisi', $barang->kondisi) == 'Baik' ? 'selected' : '' }}>Baik</option>
                  <option value="Rusak" {{ old('kondisi', $barang->kondisi) == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                  <option value="Hilang" {{ old('kondisi', $barang->kondisi) == 'Hilang' ? 'selected' : '' }}>Hilang</option>
                </select>
                @error('kondisi')<span class="form-error-msg">{{ $message }}</span>@enderror
              </div>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <textarea name="keterangan" rows="4" placeholder="Keterangan tambahan (opsional)"
                        class="@error('keterangan') form-error @enderror">{{ old('keterangan', $barang->keterangan) }}</textarea>
              @error('keterangan')<span class="form-error-msg">{{ $message }}</span>@enderror
            </div>
          </div>

          <!-- Foto Barang -->
          <div class="form-section">
            <h3>4. Foto Barang</h3>
            <div class="form-group">
              <label>Ganti Foto</label>
              <label for="foto" class="file-upload-area">
                <span style="font-size: 2rem;">📸</span>
                <p>Klik untuk memilih atau drag & drop</p>
                <p style="font-size: 0.9rem; color: #999;">JPG, PNG, atau WebP (Maksimal 2MB) - Kosongkan jika tidak ingin mengubah</p>
                <input type="file" id="foto" name="foto" accept="image/jpeg,image/png,image/webp"
                       class="hidden"
                       x-on:change="
                           const file = $el.files[0];
                           if (file) {
                               if (!file.type.match('image/.*')) {
                                   alert('File harus berupa gambar (JPG, PNG, atau WebP)');
                                   $el.value = '';
                                   return;
                               }
                               if (file.size > 2048 * 1024) {
                                   alert('Ukuran file tidak boleh lebih dari 2MB');
                                   $el.value = '';
                                   return;
                               }
                               const reader = new FileReader();
                               reader.onload = (e) => {
                                   fotoPreview = e.target.result;
                               };
                               reader.readAsDataURL(file);
                           }
                       ">
              </label>
              @error('foto')<span class="form-error-msg">{{ $message }}</span>@enderror
            </div>

            <!-- Preview -->
            <div style="margin-top: 1rem;">
              <p style="font-size: 0.9rem; font-weight: 600; margin-bottom: 0.5rem; color: #666;">Preview Foto:</p>
              <img :src="fotoPreview" alt="Preview" style="max-width: 250px; height: auto; border-radius: 8px; border: 1px solid #ddd;">
            </div>
          </div>

          <!-- Form Actions -->
          <div class="form-actions">
            <a href="{{ route('barang.index') }}" class="btn btn-secondary">
              ← Batal
            </a>
            <button type="submit" class="btn btn-primary">
              ✓ Perbarui Barang
            </button>
          </div>
        </form>
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
  </script>
</body>
</html>
