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
            ['title' => 'Pulp Fiction', 'year' => 1994],
            ['title' => 'Fight Club', 'year' => 1999],
            ['title' => 'Forrest Gump', 'year' => 1994],
            ['title' => 'The Lord of the Rings: The Fellowship of the Ring', 'year' => 2001],
            ['title' => 'Gladiator', 'year' => 2000],
            ['title' => 'The Shawshank Redemption', 'year' => 1994],
            ['title' => 'The Godfather', 'year' => 1972],
            ['title' => 'Titanic', 'year' => 1997],
            ['title' => 'Avatar', 'year' => 2009],
            ['title' => 'Jurassic Park', 'year' => 1993],
        ];

        return view('/home', compact('user', 'movies'));
    }
}
