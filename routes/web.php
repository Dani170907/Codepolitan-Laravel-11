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
    return 'Please, buy a membership'; // Mengembalikan pesan untuk membeli membership
});

// Menampilkan halaman login dengan alias 'login'
Route::get('/login', function () {
    return 'Login page'; // Mengembalikan halaman login
})->name('login'); // Alias: login


Route::post('/request', function (Request $request) {
    // Contoh penggunaan method input() untuk mengambil semua input dari request
    // $input = $request->input();
    // return $input;

    // Contoh penggunaan method input() untuk mengambil array colors.* dari request
    // $input = $request->input('colors.*');
    // return $input;

    // Contoh penggunaan method query() untuk mengambil parameter query string 'gender'
    // $query = $request->query('gender');
    // return $query;

    // Contoh penggunaan method date() untuk mengambil dan memformat tanggal dari request
    // $data = $request->date('schedule', 'Y-m-d', 'Asia/Jakarta')
    // // ->addDays()
    // // ->addMinutes(30)
    // // ->addHours(3)
    // ;
    // return $data->diffForHumans();

    // Contoh penggunaan method has() untuk memeriksa apakah request memiliki input 'email' dan 'password'
    // if ($request->has('email', 'password')) {
    //     return "Berhasil Login";
    // }

    // Contoh penggunaan method hasAny() untuk memeriksa apakah request memiliki salah satu dari input 'email' atau 'password'
    // if ($request->hasAny('email', 'password')) {
    //     return "Berhasil Login";
    // }

    // Contoh penggunaan method merge() untuk menambahkan atau mengganti nilai input request
    $request->merge(['email' => 'kezia@gmail.com']);

    // Contoh penggunaan method missing() untuk memeriksa apakah request tidak memiliki input 'email' atau 'password'
    if ($request->missing('email', 'password')) {
        return "Emailnya/password tidak ada"; // Mengembalikan pesan jika email atau password tidak ada
    } else {
        return "Datanya Lengkap"; // Mengembalikan pesan jika email dan password ada
    }
    // return 'Gagal';
});

Route::get('/response', function () {
    return response('OK', 200)->header('Content-Type', 'text/plain');
});

Route::get('/cache-control', function () {
    return Response::make('page allow to cache', 200)
    ->header('Chace-Control', 'public, max-age=86400');
});

Route::middleware('cache.headers:public;max_age=2628000;etag')->group(function () {
    Route::get('/privacy', function () {
        return "Privacy page";
    });

    Route::get('/terms', function () {
        return "Terms page";
    });
});
