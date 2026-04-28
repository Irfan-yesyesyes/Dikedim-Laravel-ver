<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

Route::get('/hitung/{a}/{b}', fn($a, $b) => $a + $b);
$hasil = 10 + 25;
Route::get('/hasil', fn() => "Hasil penjumlahan 10 + 25 adalah: $hasil");
Route::view('/tentang', 'tentang');
Route::get('/', [BarangController::class, 'index']);
Route::post('/simpan-barang', [BarangController::class, 'store'])->name('barang.store');
