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
        $wisatas = Wisata::latest()->get(); // tampilkan terbaru dulu
        return view('wisata.index', compact('wisatas'));
    }

    /**
     * Form tambah tempat wisata
     */
    public function create()
    {
        return view('wisata.create');
    }

    /**
     * Simpan data wisata baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'       => 'required|string|max:255',
            'lokasi'     => 'required|string|max:255',
            'deskripsi'  => 'required|string',
            'harga_tiket'=> 'required|numeric|min:0',
            'foto'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['nama', 'lokasi', 'deskripsi', 'harga_tiket']);

        // upload foto jika ada
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('wisata', 'public');
        }

        Wisata::create($data);

        return redirect()->route('wisata.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Detail wisata
     */
    public function show(Wisata $wisata)
    {
        return view('wisata.show', compact('wisata'));
    }

    /**
     * Form edit data wisata
     */
    public function edit(Wisata $wisata)
    {
        return view('wisata.edit', compact('wisata'));
    }

    /**
     * Update data wisata
     */
    public function update(Request $request, Wisata $wisata)
    {
        $request->validate([
            'nama'       => 'required|string|max:255',
            'lokasi'     => 'required|string|max:255',
            'deskripsi'  => 'required|string',
            'harga_tiket'=> 'required|numeric|min:0',
            'foto'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['nama', 'lokasi', 'deskripsi', 'harga_tiket']);

        // jika ada upload foto baru, hapus yang lama
        if ($request->hasFile('foto')) {
            if ($wisata->foto && Storage::disk('public')->exists($wisata->foto)) {
                Storage::disk('public')->delete($wisata->foto);
            }
            $data['foto'] = $request->file('foto')->store('wisata', 'public');
        }

        $wisata->update($data);

        return redirect()->route('wisata.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Hapus data wisata
     */
    public function destroy(Wisata $wisata)
    {
        if ($wisata->foto && Storage::disk('public')->exists($wisata->foto)) {
            Storage::disk('public')->delete($wisata->foto);
        }

        $wisata->delete();

        return redirect()->route('wisata.index')->with('success', 'Data berhasil dihapus!');
    }
}
