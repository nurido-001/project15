<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class WisataController extends Controller
{
    /**
     * Terapkan middleware auth agar semua fungsi butuh login.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Tampilkan daftar semua tempat wisata + fitur pencarian
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $wisatas = Wisata::when($search, function ($query, $search) {
                $query->where('nama', 'like', "%{$search}%")
                      ->orWhere('lokasi', 'like', "%{$search}%")
                      ->orWhere('deskripsi', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(9)
            ->appends(['search' => $search]);

        $notFound = ($wisatas->isEmpty() && $search)
            ? "😞 Maaf, tidak ada tempat wisata yang cocok dengan kata kunci: '{$search}'."
            : null;

        return view('Wisata.index', compact('wisatas', 'search', 'notFound'));
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

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('wisata', 'public');
        }

        // Buat objek baru dari model Wisata
        $wisata = new Wisata($validated);
        $wisata->pengguna_id = Auth::id(); // Catat id pengguna yang menambahkan
        $wisata->save();

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
     * Form edit data wisata (hanya admin atau pemilik)
     */
    public function edit(Wisata $wisata)
    {
        if (Auth::user()->role !== 'admin' && $wisata->pengguna_id !== Auth::id()) {
            abort(403, '🚫 Anda tidak diizinkan mengedit wisata ini.');
        }

        return view('Wisata.edit', compact('wisata'));
    }

    /**
     * Update data wisata (hanya admin atau pemilik)
     */
    public function update(Request $request, Wisata $wisata)
    {
        if (Auth::user()->role !== 'admin' && $wisata->pengguna_id !== Auth::id()) {
            abort(403, '🚫 Anda tidak diizinkan memperbarui wisata ini.');
        }

        $validated = $request->validate([
            'nama'        => 'required|string|max:255',
            'lokasi'      => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'harga_tiket' => 'nullable|numeric|min:0',
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

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
     * Hapus data wisata (hanya admin atau pemilik)
     */
    public function destroy(Wisata $wisata)
    {
        if (Auth::user()->role !== 'admin' && $wisata->pengguna_id !== Auth::id()) {
            abort(403, '🚫 Anda tidak diizinkan menghapus wisata ini.');
        }

        if ($wisata->foto && Storage::disk('public')->exists($wisata->foto)) {
            Storage::disk('public')->delete($wisata->foto);
        }

        $wisata->delete();

        return redirect()->route('wisata.index')->with('success', '🗑️ Data berhasil dihapus!');
    }
}
