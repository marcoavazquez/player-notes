<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', fn () => view('welcome'))->name('home');

    Route::livewire('/player-notes', 'pages::player-notes.index')->name('player-notes');
    Route::livewire('/player-notes/create', 'pages::player-notes.create')->name('player-notes.create');
});
