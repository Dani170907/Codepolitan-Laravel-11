<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Route;

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
                'title' => 'Movie Controller ' . $i, // Judul film dengan format "Movie Controller 0", "Movie Controller 1", dst.
                'year' => '202' . $i, // Tahun rilis film dengan format "2020", "2021", dst.
                'genre' => 'Horror', // Genre film, di sini selalu "Horror"
            ];
        }
    }

    // Method untuk mengembalikan semua data film
    public function index() {
        return view('movies.index');
    }

    // Method untuk menampilkan film berdasarkan ID
    public function show($id)
    {
        // Mengembalikan film berdasarkan ID yang diberikan
        // return $this->movies[$id];
        return view('movies.show');
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
        // Mengembalikan daftar film yang telah diperbarui
        return $this->movies;
    }

    // Method untuk mengupdate data film berdasarkan ID
    public function update(Request $request, $id)
    {
        // Mengupdate judul, tahun, dan genre film berdasarkan ID
        // $this->movies[$id]['title'] = request('title');
        // $this->movies[$id]['year'] = request('year');
        // $this->movies[$id]['genre'] = request('genre');

        // return $this->movies[$id]; // Mengembalikan film yang telah diupdate

        // Saat ini, method ini hanya mengembalikan semua data request
        return $request->all();
    }

    // Method untuk menghapus film berdasarkan ID
    public function destroy($id)
    {
        // Menghapus film berdasarkan ID dari array $movies
        unset($this->movies[$id]);
        // Mengembalikan daftar film yang telah diperbarui
        return $this->movies;
    }
}

