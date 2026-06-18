<?php

use App\Http\Controllers\BarangController;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Jika user sudah login, arahkan ke dashboard
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    // Jika belum login, arahkan ke login
    return redirect('/login');
});

Route::get('/dashboard', function () {
    $totalBarang = Barang::count();
    $totalStok = Barang::sum('stok') ?? 0;
    $stokRendah = Barang::where('stok', '<', 5)->count();
    $totalKategori = Kategori::count();
    $recentBarangs = Barang::orderBy('created_at', 'desc')->limit(5)->get();

    return view('dashboard', compact('totalBarang', 'totalStok', 'stokRendah', 'totalKategori', 'recentBarangs'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('barang', BarangController::class);
});

require __DIR__.'/auth.php';
