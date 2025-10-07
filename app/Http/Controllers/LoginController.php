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
        // Validasi input terlebih dahulu (lebih aman)
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Regenerasi sesi untuk keamanan (CSRF/session fixation)
            $request->session()->regenerate();

            // Redirect ke halaman sebelumnya atau dashboard
            return redirect()->intended(route('dashboard'))
                ->with('success', 'Login berhasil!');
        }

        // Jika gagal login
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

        // Hapus sesi lama dan token untuk keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('status', 'Anda telah keluar dari sistem.');
    }
}
