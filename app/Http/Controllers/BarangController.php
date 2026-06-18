<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Supplier;

class BarangController extends Controller
{
    public function index() {
        $barangs = Barang::where('user_id', auth()->id())
                         ->with('kategori_rel')
                         ->paginate(15);
        $totalStok = Barang::where('user_id', auth()->id())->sum('stok');
        $totalBarang = Barang::where('user_id', auth()->id())->count();
        $stokRendah = Barang::where('user_id', auth()->id())->where('stok', '<', 5)->count();
        $totalKategori = Kategori::count();
        $kategoris = Kategori::all();

        return view('inventory.index', compact('barangs', 'totalStok', 'totalBarang', 'stokRendah', 'totalKategori', 'kategoris'));
    }

    public function create() {
        $kategoris = Kategori::all();
        $suppliers = Supplier::all();
        return view('inventory.create', compact('kategoris', 'suppliers'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'kode' => 'required|string|unique:barangs,kode',
            'nama' => 'required|string|min:3',
            'kategori_id' => 'required|exists:kategoris,id',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'tanggal_masuk' => 'required|date',
            'lokasi' => 'required|string',
            'kondisi' => 'required|in:Baik,Rusak,Hilang',
            'keterangan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Handle foto upload
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('barang', 'public');
            $validated['foto'] = $fotoPath;
        }

        // Set kategori string dari kategori_id
        $kategori = Kategori::find($validated['kategori_id']);
        $validated['kategori'] = $kategori->nama ?? 'Umum';
        $validated['tanggal'] = $validated['tanggal_masuk'];

        // Set supplier string dari supplier_id
        if ($validated['supplier_id']) {
            $supplier = Supplier::find($validated['supplier_id']);
            $validated['supplier'] = $supplier->nama ?? null;
        }

        // Assign the current logged-in user as the creator
        $validated['user_id'] = auth()->id();

        Barang::create($validated);

        return redirect()->route('barang.index')
                        ->with('success', 'Barang berhasil ditambahkan!');
    }

    public function show(Barang $barang) {
        $barang->load('kategori_rel');
        return view('inventory.show', compact('barang'));
    }

    public function edit(Barang $barang) {
        $kategoris = Kategori::all();
        $suppliers = Supplier::all();
        return view('inventory.edit', compact('barang', 'kategoris', 'suppliers'));
    }

    public function update(Request $request, Barang $barang) {
        $validated = $request->validate([
            'kode' => 'required|string|unique:barangs,kode,' . $barang->id,
            'nama' => 'required|string|min:3',
            'kategori_id' => 'required|exists:kategoris,id',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'tanggal_masuk' => 'required|date',
            'lokasi' => 'required|string',
            'kondisi' => 'required|in:Baik,Rusak,Hilang',
            'keterangan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Handle foto upload
        if ($request->hasFile('foto')) {
            // Delete old foto if exists
            if ($barang->foto && \Storage::disk('public')->exists($barang->foto)) {
                \Storage::disk('public')->delete($barang->foto);
            }
            $fotoPath = $request->file('foto')->store('barang', 'public');
            $validated['foto'] = $fotoPath;
        }

        // Set kategori string dari kategori_id
        $kategori = Kategori::find($validated['kategori_id']);
        $validated['kategori'] = $kategori->nama ?? 'Umum';
        $validated['tanggal'] = $validated['tanggal_masuk'];

        // Set supplier string dari supplier_id
        if ($validated['supplier_id']) {
            $supplier = Supplier::find($validated['supplier_id']);
            $validated['supplier'] = $supplier->nama ?? null;
        } else {
            $validated['supplier'] = null;
        }

        $barang->update($validated);

        return redirect()->route('barang.index')
                        ->with('success', 'Barang berhasil diperbarui!');
    }

    public function destroy(Barang $barang) {
        // Delete foto if exists
        if ($barang->foto && \Storage::disk('public')->exists($barang->foto)) {
            \Storage::disk('public')->delete($barang->foto);
        }

        $barang->delete();

        // Check if request is AJAX
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Barang berhasil dihapus!',
                'barang_id' => $barang->id
            ]);
        }

        return redirect()->route('barang.index')
                        ->with('success', 'Barang berhasil dihapus!');
    }
}

