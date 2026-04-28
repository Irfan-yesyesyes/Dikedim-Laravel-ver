<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Manajemen Barang — DiKeDim</title>

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

  <nav class="navbar">
    <div class="nav-container">
      <div class="nav-brand">
        <img src="{{ asset('img/Logo.jpeg') }}" alt="Logo">
        <span>DiKeDim</span>
      </div>
    </div>
  </nav>

  <main class="main-content">
    <header class="page-header">
      <h1>Dashboard Gudang</h1>
      <p>Kelola inventaris barang secara real-time.</p>
    </header>

    <section class="card shadow">
      <form action="{{ route('barang.store') }}" method="POST">
        @csrf
        <div class="form-grid">
          <div class="form-group">
            <label>Kode Barang</label>
            <input type="text" name="kode" required placeholder="BRG-001">
          </div>
          <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama" required placeholder="Nama Barang">
          </div>
          <div class="form-group">
            <label>Kategori</label>
            <select name="kategori">
              <option value="Elektronik">Elektronik</option>
              <option value="Alat Tulis">Alat Tulis</option>
              <option value="Furnitur">Furnitur</option>
            </select>
          </div>
          <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stok" required>
          </div>
          <div class="form-group">
            <label>Harga (Rp)</label>
            <input type="number" name="harga" required>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Barang</button>
      </form>
    </section>

    <section class="card shadow">
      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>Kode</th>
              <th>Nama Barang</th>
              <th>Kategori</th>
              <th>Stok</th>
              <th>Harga</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($barangs as $b)
            <tr>
              <td>{{ $b->kode }}</td>
              <td>{{ $b->nama }}</td>
              <td><span class="badge">{{ $b->kategori }}</span></td>
              <td class="stok-value">{{ $b->stok }}</td>
              <td>Rp {{ number_format($b->harga, 0, ',', '.') }}</td>
              <td>
                <form action="/barang/{{ $b->id }}" method="POST" class="form-delete">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn-icon">🗑️ Hapus</button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="6" style="text-align:center;">Belum ada data barang.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </section>
  </main>

  <div id="toast" class="toast"></div>

  <script src="{{ asset('js/app.js') }}"></script>

  @if(session('success'))
    <script>
     terdaftar
      const checkToast = setInterval(() => {
        if (typeof window.showToast === 'function') {
          window.showToast("{{ session('success') }}");
          clearInterval(checkToast);
        }
      }, 100);
      setTimeout(() => clearInterval(checkToast), 3000);
    </script>
  @endif
</body>
</html>
