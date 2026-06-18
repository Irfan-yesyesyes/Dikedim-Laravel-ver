<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugases = Petugas::paginate(10);
        return view('petugas.index', compact('petugases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|string|unique:petugas,nip',
            'nama' => 'required|string|min:3',
            'email' => 'required|email|unique:petugas,email',
            'jabatan' => 'required|in:Kepala Gudang,Petugas Gudang,Admin,Supervisor',
            'no_telepon' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,png|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('petugas', 'public');
            $validated['foto'] = $fotoPath;
        }

        Petugas::create($validated);

        return redirect()->route('petugas.index')
                        ->with('success', 'Data petugas berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Petugas $petugas)
    {
        return view('petugas.show', compact('petugas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Petugas $petugas)
    {
        return view('petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Petugas $petugas)
    {
        $validated = $request->validate([
            'nip' => 'required|string|unique:petugas,nip,' . $petugas->id,
            'nama' => 'required|string|min:3',
            'email' => 'required|email|unique:petugas,email,' . $petugas->id,
            'jabatan' => 'required|in:Kepala Gudang,Petugas Gudang,Admin,Supervisor',
            'no_telepon' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,png|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('foto')) {
            // Delete old foto if exists
            if ($petugas->foto && \Storage::disk('public')->exists($petugas->foto)) {
                \Storage::disk('public')->delete($petugas->foto);
            }
            $fotoPath = $request->file('foto')->store('petugas', 'public');
            $validated['foto'] = $fotoPath;
        }

        $petugas->update($validated);

        return redirect()->route('petugas.index')
                        ->with('success', 'Data petugas berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Petugas $petugas)
    {
        // Delete foto
        if ($petugas->foto && \Storage::disk('public')->exists($petugas->foto)) {
            \Storage::disk('public')->delete($petugas->foto);
        }

        $petugas->delete();

        return redirect()->route('petugas.index')
                        ->with('success', 'Data petugas berhasil dihapus!');
    }
}

