<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WisataController extends Controller
{
    public function index()
    {
        $wisatas = Wisata::all();
        return view('wisata.index', compact('wisatas'));
    }

    public function create()
    {
        return view('wisata.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['nama', 'lokasi', 'deskripsi']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('wisata', 'public');
        }

        Wisata::create($data);

        return redirect()->route('wisata.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show(Wisata $wisata)
    {
        return view('wisata.show', compact('wisata'));
    }

    public function edit(Wisata $wisata)
    {
        return view('wisata.edit', compact('wisata'));
    }

    public function update(Request $request, Wisata $wisata)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['nama', 'lokasi', 'deskripsi']);

        if ($request->hasFile('foto')) {
            if ($wisata->foto && Storage::disk('public')->exists($wisata->foto)) {
                Storage::disk('public')->delete($wisata->foto);
            }
            $data['foto'] = $request->file('foto')->store('wisata', 'public');
        }

        $wisata->update($data);

        return redirect()->route('wisata.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Wisata $wisata)
    {
        if ($wisata->foto && Storage::disk('public')->exists($wisata->foto)) {
            Storage::disk('public')->delete($wisata->foto);
        }

        $wisata->delete();

        return redirect()->route('wisata.index')->with('success', 'Data berhasil dihapus!');
    }
}
