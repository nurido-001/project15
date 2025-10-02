<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WisataController extends Controller
{
    /**
     * Tampilkan daftar semua tempat wisata
     */
    public function index()
    {
        // Gunakan pagination agar lebih ringan
        $wisatas = Wisata::latest()->paginate(9);

        return view('Wisata.index', compact('wisatas'));
    }

    /**
     * Form tambah tempat wisata
     */
    public function create()
    {
        return view('Wisata.create');
    }

    /**
     * Simpan data wisata baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'        => 'required|string|max:255',
            'lokasi'      => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'harga_tiket' => 'nullable|numeric|min:0',
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('wisata', 'public');
        }

        Wisata::create($validated);

        return redirect()->route('wisata.index')->with('success', '✅ Data berhasil ditambahkan!');
    }

    /**
     * Detail wisata
     */
    public function show(Wisata $wisata)
    {
        return view('Wisata.show', compact('wisata'));
    }

    /**
     * Form edit data wisata
     */
    public function edit(Wisata $wisata)
    {
        return view('Wisata.edit', compact('wisata'));
    }

    /**
     * Update data wisata
     */
    public function update(Request $request, Wisata $wisata)
    {
        $validated = $request->validate([
            'nama'        => 'required|string|max:255',
            'lokasi'      => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'harga_tiket' => 'nullable|numeric|min:0',
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Jika upload foto baru → hapus lama & simpan baru
        if ($request->hasFile('foto')) {
            if ($wisata->foto && Storage::disk('public')->exists($wisata->foto)) {
                Storage::disk('public')->delete($wisata->foto);
            }
            $validated['foto'] = $request->file('foto')->store('wisata', 'public');
        }

        $wisata->update($validated);

        return redirect()->route('wisata.index')->with('success', '✏️ Data berhasil diperbarui!');
    }

    /**
     * Hapus data wisata
     */
    public function destroy(Wisata $wisata)
    {
        // Hapus foto dari storage jika ada
        if ($wisata->foto && Storage::disk('public')->exists($wisata->foto)) {
            Storage::disk('public')->delete($wisata->foto);
        }

        $wisata->delete();

        return redirect()->route('wisata.index')->with('success', '🗑️ Data berhasil dihapus!');
    }
}
