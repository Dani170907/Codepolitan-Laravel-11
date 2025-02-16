<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

// Menampilkan halaman welcome sebagai halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Membuat grup route dengan middleware, prefix, dan alias
Route::group(
    [
        'middleware' => ['isAuth'],
        'prefix' => 'movie', // Semua rute dalam grup ini akan memiliki prefix 'movie'
        'as' => 'movie.', // Semua rute dalam grup ini akan memiliki alias diawali 'movie.'
    ],

    function () {

        // Menampilkan semua film menggunakan method index dari MovieController
        Route::get('/', [MovieController::class, 'index']);
        // Menampilkan film berdasarkan ID, tetapi hanya bisa diakses oleh member
        Route::get('/{id}', [MovieController::class, 'show'])->middleware('isMember');
        // Menambahkan film baru menggunakan method store dari MovieController
        Route::post('/', [MovieController::class, 'store']);
        // Mengupdate data film berdasarkan ID menggunakan method update dari MovieController
        Route::put('/{id}', [MovieController::class, 'update']);
        // Mengupdate sebagian data film berdasarkan ID (mirip dengan PUT)
        Route::patch('/{id}', [MovieController::class, 'update']);
        // Menghapus film berdasarkan ID
        Route::delete('/{id}', [MovieController::class, 'destroy']);
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

Route::get('/request', function (Request $request) {
    dd($request);
});
