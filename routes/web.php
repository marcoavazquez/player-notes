<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', fn () => view('welcome'))->name('home');

    Route::livewire('/player-notes', 'pages::player-notes.index')->name('player-notes');
});
