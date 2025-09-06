<?php

use Illuminate\Support\Facades\Route;

//Route::view('/', 'welcome');
Route::get('/', function () {
    return redirect()->route('administration.dashboard');
})->name('home');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('lang/{locale}', function ($locale) {

    if (in_array($locale, ['en', 'es', 'de'])) {
        session(['locale_lang' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');


require __DIR__ . '/auth.php';
