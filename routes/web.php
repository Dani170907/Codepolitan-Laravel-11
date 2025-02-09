<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

$movies = [];

for ($i = 0; $i <= 5; $i++) {
    $movies[] = [
        'title' => 'Movie ' . $i,
        'year' => '2020',
        'genre' => 'Comedi',
    ];
}

Route::get('/movie', function () use ($movies) {

    return $movies;
});


Route::post('/movie', function () use ($movies) {
    $movies[] = [
        'title' => request('title'),
        'year' => request('year'),
        'genre' => request('genre'),
    ];

    return $movies;
});


Route::put('/movie', function () use ($movies) {
    $movies[2]['title'] = request('title');
    $movies[2]['year'] = request('year');
    $movies[2]['genre'] = request('genre');

    return $movies;
});
