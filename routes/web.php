<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/movie', function (){
    $movies = [];

    for ($i=0; $i < 10; $i++) {
        $movies[] = [
            'title' => 'Movie ' . $i,
            'year' => '2020',
            'genre' => 'Comedi',
        ];
    }

    echo '<h1>Movies</h1>';
    echo '<ul>';
    foreach ($movies as $movie) {
        echo '<li>' . $movie['title'] . '-' . $movie['year'] . '-' . $movie['genre']. '-' . '</li>';
    }
    echo '</ul>';
});
