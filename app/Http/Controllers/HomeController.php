<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Method untuk menampilkan halaman utama
    public function index()
    {
        // Mengembalikan nilai properti 'authenticated' dari request
        // return response(request()->authenticated);
        return view('/home');
    }
}
