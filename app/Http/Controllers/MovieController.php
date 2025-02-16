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
            $this->movies[] = [
                // Menambahkan data film ke dalam array $movies
                'title' => 'Movie Controller ' . $i, // Judul film dengan format "Movie Controller 0", "Movie Controller 1", dst.
                'year' => '202' . $i, // Tahun rilis film dengan format "2020", "2021", dst.
                'genre' => 'Horror', // Genre film, di sini selalu "Horror"
            ];
        }
    }

    // Method untuk mengembalikan semua data film
    public function index()
    {
        return $this->movies;
    }

    // Method untuk menampilkan film berdasarkan ID
    public function show($id)
    {
        return $this->movies[$id]; // Mengembalikan film berdasarkan ID
    }

    // Method untuk menambahkan film baru
    public function store()
    {
        // Menambahkan film baru ke dalam array $movies
        $this->movies[] = [
            'title' => request('title'), // Judul film dari request
            'year' => request('year'), // Tahun rilis film dari request
            'genre' => request('genre'), // Genre film dari request
        ];
        return $this->movies; // Mengembalikan daftar film yang telah diperbarui
    }

    // Method untuk mengupdate data film berdasarkan ID
    public function update($id)
    {
        // Mengupdate judul, tahun, dan genre film berdasarkan ID
        $this->movies[$id]['title'] = request('title');
        $this->movies[$id]['year'] = request('year');
        $this->movies[$id]['genre'] = request('genre');

        return $this->movies[$id]; // Mengembalikan film yang telah diupdate
    }
}
