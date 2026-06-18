<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = [
        'nama_kategori',
        'deskripsi'
    ];

    protected $table = 'kategoris';

    /**
     * Relasi dengan Barang (One to Many)
     */
    public function barangs()
    {
        return $this->hasMany(Barang::class, 'kategori_id');
    }
}
