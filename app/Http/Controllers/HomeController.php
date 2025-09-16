<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Buat controller hanya bisa diakses user yang sudah login.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Halaman utama setelah login.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home'); 
        // view ini ada di: resources/views/home.blade.php
    }

    /**
     * Halaman dashboard (khusus admin atau user tertentu).
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        return view('dashboard.index'); 
        // view ini ada di: resources/views/dashboard/index.blade.php
    }
}
