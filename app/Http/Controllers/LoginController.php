<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan form login.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Proses autentikasi pengguna.
     */
    public function login(Request $request)
    {
        // ✅ Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        $credentials = $request->only('email', 'password');

        // ✅ Coba autentikasi
        if (Auth::attempt($credentials)) {
            // Regenerasi sesi untuk keamanan
            $request->session()->regenerate();

            $pengguna = Auth::user();

            // ✅ Redirect berdasarkan role
            if ($pengguna->role === 'admin') {
                return redirect()
                    ->route('dashboard')
                    ->with('success', 'Login sebagai Admin berhasil!');
            } else {
                return redirect()
                    ->route('dashboard.cards')
                    ->with('success', 'Login berhasil sebagai Pengguna!');
            }
        }

        // ❌ Jika gagal login
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    /**
     * Logout pengguna.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // ✅ Hapus sesi lama dan token untuk keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('status', 'Anda telah keluar dari sistem.');
    }
}
