<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index() {
        $barangs = Barang::all();
        return view('inventory.index', compact('barangs'));
    }
    
    public function store(Request $request) {
        Barang::create($request->all());
        return redirect()->back()->with('success', 'Barang berhasil ditambahkan!');
    }
}

