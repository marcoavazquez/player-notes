<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::livewire('/', 'pages::home')->name('home');
    Route::livewire('/players', 'pages::players.index')->name('players.index');
    Route::livewire('/players/notes', 'pages::player-notes.index')->name('player-notes.index');
    Route::livewire('/players/{playerId}', 'pages::players.show')->name('players.show');
});
