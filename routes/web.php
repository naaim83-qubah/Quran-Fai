<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Quran with FAI - Language Switcher
|--------------------------------------------------------------------------
*/
Route::get('/language/{locale}', function (string $locale) {
    $supported = ['en', 'ms', 'id', 'ar'];

    abort_unless(in_array($locale, $supported, true), 404);

    session(['locale' => $locale]);

    return redirect()->back();
})->name('language.switch');

/*
|--------------------------------------------------------------------------
| Quran with FAI - Level 1
|--------------------------------------------------------------------------
*/
Route::get('/learn/level-1', function () {
    return view('quran.level1');
})->name('quran.level1');



Route::get('/learn/level-2', function () {
    return view('quran.level2');
})->name('quran.level2');



Route::get('/learn/level-3', function () {
    return view('quran.level3');
})->name('quran.level3');

