<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

// Menampilkan halaman welcome sebagai halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Inisialisasi array untuk menyimpan daftar film
$movies = [];

// Loop untuk menambahkan 6 film ke dalam array dengan data statis
for ($i = 0; $i <= 5; $i++) {
    $movies[] = [
        'title' => 'Movie ' . $i, // Judul film dengan format "Movie 0", "Movie 1", dst.
        'year' => '2020',         // Tahun rilis film, di sini selalu "2020"
        'genre' => 'Comedy',      // Genre film, di sini selalu "Comedy"
    ];
}

// Membuat grup route dengan middleware, prefix, dan alias
Route::group(
    [
        'middleware' => ['IsAuth'], // Middleware untuk memeriksa autentikasi
        'prefix' => 'movie',        // Semua rute dalam grup ini akan memiliki prefix 'movie'
        'as' => 'movie.',           // Semua rute dalam grup ini akan memiliki alias diawali 'movie.'
    ],
    function () use ($movies) {

        // Menampilkan semua film menggunakan method index dari MovieController
        Route::get('/', [MovieController::class, 'index']);

        // Menampilkan film berdasarkan ID, tetapi hanya bisa diakses oleh member
        Route::get('/{id}', function ($id) use ($movies) {
            return $movies[$id]; // Mengembalikan film berdasarkan ID
        })->middleware(['isMember']); // Middleware untuk memeriksa apakah pengguna adalah member

        // Menambahkan film baru
        Route::post('/', function () use ($movies) {
            $movies[] = [
                'title' => request('title'), // Judul film dari request
                'year' => request('year'),   // Tahun rilis film dari request
                'genre' => request('genre'), // Genre film dari request
            ];

            return $movies; // Mengembalikan daftar film yang telah diperbarui
        });

        // Mengupdate data film berdasarkan ID
        Route::put('/{id}', function ($id) use ($movies) {
            $movies[$id]['title'] = request('title'); // Update judul film
            $movies[$id]['year'] = request('year');   // Update tahun rilis film
            $movies[$id]['genre'] = request('genre'); // Update genre film

            return $movies; // Mengembalikan daftar film yang telah diperbarui
        });

        // Mengupdate sebagian data film berdasarkan ID (mirip dengan PUT)
        Route::patch('/{id}', function ($id) use ($movies) {
            $movies[$id]['title'] = request('title'); // Update judul film
            $movies[$id]['year'] = request('year');   // Update tahun rilis film
            $movies[$id]['genre'] = request('genre'); // Update genre film

            return $movies; // Mengembalikan daftar film yang telah diperbarui
        });

        // Menghapus film berdasarkan ID
        Route::delete('/{id}', function ($id) use ($movies) {
            unset($movies[$id]); // Menghapus film berdasarkan ID

            return $movies; // Mengembalikan daftar film yang telah diperbarui
        });
    }
);

// Menampilkan pesan jika pengguna belum berlangganan
Route::get('/pricing', function () {
    return 'Please, buy a membership';
});

// Menampilkan halaman login dengan alias 'login'
Route::get('/login', function () {
    return 'Login page';
})->name('login');
