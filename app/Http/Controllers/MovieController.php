<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    // Deklarasi properti $movies sebagai array untuk menyimpan data film
    public $movies;

    // Constructor akan dijalankan secara otomatis saat objek MovieController dibuat
    public function __construct()
    {
        // Loop untuk membuat 6 data film dan menyimpannya ke dalam properti $movies
        for ($i = 0; $i < 6; $i++) {
            $this->movies[] = [ // Menambahkan data film ke dalam array $movies
                'title' => 'Movie Controller ' . $i, // Judul film dengan format "Movie Controller 0", "Movie Controller 1", dst.
                'year' => '202' . $i,    // Tahun rilis film dengan format "2020", "2021", dst.
                'genre' => 'Horror',     // Genre film, di sini selalu "Horror"
            ];
        }
    }

    // Method untuk mengembalikan semua data film
    public function index()
    {
        return $this->movies;
    }
}
