<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::livewire('/', 'pages::home')->name('home');
    Route::livewire('/players/notes', 'pages::player-notes.index')->name('player-notes.index');
});
