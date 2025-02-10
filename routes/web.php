<?php

use App\Http\Middleware\CheckMembership;
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


Route::get('/movie/{id}', function ($id) use ($movies) {
    return $movies[$id];
})->middleware('isMember');


Route::post('/movie', function () use ($movies) {
    $movies[] = [
        'title' => request('title'),
        'year' => request('year'),
        'genre' => request('genre'),
    ];

    return $movies;
});


Route::put('/movie/{id}', function ($id) use ($movies) {
    $movies[$id]['title'] = request('title');
    $movies[$id]['year'] = request('year');
    $movies[$id]['genre'] = request('genre');

    return $movies;
});


Route::patch('/movie/{id}', function ($id) use ($movies) {
    $movies[$id]['title'] = request('title');
    $movies[$id]['year'] = request('year');
    $movies[$id]['genre'] = request('genre');

    return $movies;
});


Route::delete('/movie/{id}', function ($id) use ($movies) {
    unset($movies[$id]);

    return $movies;
});

Route::get('/pricing', function () {
    return 'Please, buy a membership';
});
