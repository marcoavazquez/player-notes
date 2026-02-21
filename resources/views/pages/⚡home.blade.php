<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
    <header>
        @if (Route::has('login'))
            <nav>
                @auth
                    @can('create notes')
                        <flux:button href="{{ route('player-notes.index') }}" wire:navigate>
                            Player Notes
                        </flux:button>
                    @endcan
                @else
                    <a href="{{ route('login') }}">
                        Log in
                    </a>
                @endauth
            </nav>
        @endif
    </header>
</div>