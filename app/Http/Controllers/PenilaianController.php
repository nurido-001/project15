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
     * Tampilkan daftar semua penilaian (opsional untuk admin)
     */
    public function index()
    {
        // Jika admin: tampilkan semua penilaian, jika bukan: hanya miliknya
        $user = Auth::user();
        $penilaians = ($user->is_admin ?? false)
            ? Penilaian::with(['pengguna', 'wisata'])->latest()->paginate(10)
            : Penilaian::where('pengguna_id', $user->id)->with('wisata')->latest()->paginate(10);

        return view('Penilaian.index', compact('penilaians'));
    }

    /**
     * Simpan review baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'wisata_id' => 'required|exists:wisatas,id',
            'rating'    => 'required|integer|min:1|max:5',
            'komentar'  => 'nullable|string|max:500',
        ]);

        // Cegah pengguna menilai wisata yang sama lebih dari 1x
        $existing = Penilaian::where('pengguna_id', Auth::id())
            ->where('wisata_id', $validated['wisata_id'])
            ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'Anda sudah memberi penilaian untuk wisata ini.');
        }

        Penilaian::create([
            'pengguna_id' => Auth::id(),
            'wisata_id'   => $validated['wisata_id'],
            'rating'      => $validated['rating'],
            'komentar'    => $validated['komentar'],
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
