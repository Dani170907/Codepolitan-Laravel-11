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
        $user = [
            'name' => 'Kezi',
            'email' => '1@b.com',
            'role' => 'admin',
        ];

        $movies = [
            ['title' => 'The Matrix', 'year' => 1999],
            ['title' => 'Inception', 'year' => 2010],
            ['title' => 'Interstellar', 'year' => 2014],
            ['title' => 'The Dark Knight', 'year' => 2008],
        ];

        return view('/home', compact('user', 'movies'));
    }
}
