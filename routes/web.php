<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::view('/home', 'home');

$pages = [
    'anime',
    'dom1',
    'flowcharts',
    'funzioni (1)',
    'home',
    'I Fantastici 5',
    'index',
    'mattutini',
    'nasa',
    'nasa1',
    'nasa2',
    'oggetti (1)',
    'pokedex',
    'pokemitology (1)',
    'pokemitology (2)',
    'pokemitology (3)',
    'pokemitology (4)',
    'presto',
    'prestoannunci',
    'Ricette_cucina',
    'rubrica',
    'supermario',
    'telefonia',
    'undertale (1)',
    'viaggi (1)',
    'viaggi (2)',
    'viaggi (3)',
    'viaggi (4)',
    'viaggi (5)',
    'weekend (1)',
];

Route::get('/{page}.html', function (string $page) use ($pages) {
    abort_unless(in_array($page, $pages, true), 404);

    return view($page);
})->where('page', '.*');
