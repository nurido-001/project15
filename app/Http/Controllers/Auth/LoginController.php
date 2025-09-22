<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Ke mana user diarahkan setelah login
     *
     * @var string
     */
    protected $redirectTo = '/home'; // kalau mau ke dashboard ganti '/dashboard'

    /**
     * Buat instance controller baru.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Kalau mau redirect beda untuk admin / user
     */
    protected function redirectTo()
    {
        if (auth()->user()->role === 'admin') {
            return '/dashboard';
        }

        return '/home';
    }

    
}
