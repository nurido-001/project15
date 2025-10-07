<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penilaian;
use App\Models\Wisata;
use Illuminate\Support\Facades\Auth;

class PenilaianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Simpan review baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'wisata_id' => 'required|exists:wisatas,id', // ✅ ganti nama field-nya
            'rating'    => 'required|integer|min:1|max:5',
            'komentar'  => 'nullable|string|max:500',
        ]);

        Penilaian::create([
            'pengguna_id' => Auth::id(), // otomatis pakai user login
            'wisata_id'   => $request->wisata_id, // ✅ ganti field
            'rating'      => $request->rating,
            'komentar'    => $request->komentar,
        ]);

        return redirect()->back()->with('success', 'Review berhasil ditambahkan!');
    }

    /**
     * Hapus review
     */
    public function destroy($id)
    {
        $review = Penilaian::findOrFail($id);

        // hanya pemilik review yang boleh hapus
        if ($review->pengguna_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak diizinkan menghapus review ini.');
        }

        $review->delete();

        return redirect()->back()->with('success', 'Review berhasil dihapus!');
    }
}
