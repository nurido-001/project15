<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    public function index()
    {
        $penggunas = Pengguna::all();
        return view('Pengguna.index', compact('penggunas'));
    }

    public function create()
    {
        return view('Pengguna.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:penggunas',
        ]);

        Pengguna::create($request->all());

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        return view('Pengguna.edit', compact('pengguna'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:penggunas,email,'.$id,
        ]);

        $pengguna = Pengguna::findOrFail($id);
        $pengguna->update($request->all());

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil diupdate!');
    }

    public function destroy($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->delete();

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil dihapus!');
    }
}
