<?php

use App\Livewire\PlayerNotes\Index as PlayerNotesIndex;
use App\Livewire\Players\Index as PlayersIndex;
use App\Livewire\Players\Show as PlayersShow;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::livewire('/', \App\Livewire\Home::class)->name('home');
    Route::livewire('/players', PlayersIndex::class)->name('players.index');
    Route::livewire('/players/notes', PlayerNotesIndex::class)->name('player-notes.index');
    Route::livewire('/players/{playerId}', PlayersShow::class)->name('players.show');
});
