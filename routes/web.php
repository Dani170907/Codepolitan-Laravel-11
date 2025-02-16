<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

// Menampilkan halaman welcome sebagai halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Inisialisasi array untuk menyimpan daftar film
$movies = [];

for ($i = 0; $i <= 5; $i++) {
    // Menambahkan 6 film ke dalam array dengan data statis
    $movies[] = [
        'title' => 'Movie ' . $i,
        'year' => '2020',
        'genre' => 'Comedy',
    ];
}

// Membuat grup route dengan middleware, prefix, dan alias
Route::group(
    [
        'middlware' => ['IsAuth'],
        'prefix' => 'movie', // Semua rute dalam grup ini akan memiliki prefix 'movie'
        'as' => 'movie.', // Semua rute dalam grup ini akan memiliki alias diawali 'movie.'
    ],
    function () use ($movies) {

        // Menampilkan semua film menggunakan method index dari MovieController
        Route::get('/', [MovieController::class, 'index']);

        // Menampilkan film berdasarkan ID, tetapi hanya bisa diakses oleh member
        Route::get('/{id}', [MovieController::class, 'show'])->middleware(['isMember']);

        // Menambahkan film baru menggunakan method store dari MovieController
        Route::post('/', [MovieController::class, 'store']);

        // Mengupdate data film berdasarkan ID
        Route::put('/{id}', function ($id) use ($movies) {
            $movies[$id]['title'] = request('title');
            $movies[$id]['year'] = request('year');
            $movies[$id]['genre'] = request('genre');

            return $movies;
        });

        // Mengupdate sebagian data film berdasarkan ID (mirip dengan PUT)
        Route::patch('/{id}', function ($id) use ($movies) {
            $movies[$id]['title'] = request('title');
            $movies[$id]['year'] = request('year');
            $movies[$id]['genre'] = request('genre');

            return $movies;
        });

        // Menghapus film berdasarkan ID
        Route::delete('/{id}', function ($id) use ($movies) {
            unset($movies[$id]);

            return $movies;
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
