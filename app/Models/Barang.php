<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'user_id',
        'supplier_id',
        'kode',
        'nama',
        'kategori',
        'kategori_id',
        'stok',
        'harga',
        'tanggal',
        'tanggal_masuk',
        'supplier',
        'keterangan',
        'lokasi',
        'kondisi',
        'foto'
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'tanggal' => 'date',
        'tanggal_masuk' => 'date',
        'stok' => 'integer',
    ];

    /**
     * Relasi dengan Kategori (Many to One)
     */
    public function kategori_rel()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    /**
     * Relasi dengan User (Many to One)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi dengan Supplier (Many to One)
     */
    public function supplier_rel()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    /**
     * Local Scope: Filter barang berdasarkan kondisi
     */
    public function scopeKondisi($query, $kondisi)
    {
        return $query->where('kondisi', $kondisi);
    }

    /**
     * Local Scope: Filter barang dengan stok rendah (< 5)
     */
    public function scopeStokRendah($query)
    {
        return $query->where('stok', '<', 5);
    }

    /**
     * Local Scope: Filter barang aktif/baik
     */
    public function scopeBaik($query)
    {
        return $query->where('kondisi', 'Baik');
    }
}
