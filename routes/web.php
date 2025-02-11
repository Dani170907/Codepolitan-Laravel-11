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
        'genre' => 'Comedy',
    ];
}

Route::group(
    [
        'middlware' => ['IsAuth'],
        'prefix' => 'movie',
        'as' => 'movie.',
    ],
    function () use ($movies) {

        Route::get('/', function () use ($movies) {
            return $movies;
        });

        Route::get('/{id}', function ($id) use ($movies) {
            return $movies[$id];
        })->middleware(['isMember']);

        Route::post('/', function () use ($movies) {
            $movies[] = [
                'title' => request('title'),
                'year' => request('year'),
                'genre' => request('genre'),
            ];

            return $movies;
        });


        Route::put('/{id}', function ($id) use ($movies) {
            $movies[$id]['title'] = request('title');
            $movies[$id]['year'] = request('year');
            $movies[$id]['genre'] = request('genre');

            return $movies;
        });


        Route::patch('/{id}', function ($id) use ($movies) {
            $movies[$id]['title'] = request('title');
            $movies[$id]['year'] = request('year');
            $movies[$id]['genre'] = request('genre');

            return $movies;
        });


        Route::delete('/{id}', function ($id) use ($movies) {
            unset($movies[$id]);

            return $movies;
        });
    }
);



Route::get('/pricing', function () {
    return 'Please, buy a membership';
});

Route::get('/login', function () {
    return 'Login page';
})->name('login');
