<?php

namespace App\Livewire\Players;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;

class Show extends Component
{
    protected UserRepositoryInterface $repository;

    public User $player;

    public string $message = '';

    public function boot(UserRepositoryInterface $repository): void
    {
        $this->repository = $repository;
    }

    public function mount(int $playerId): void
    {
        $this->player = $this->repository->getPlayerWithNotes($playerId);
    }

    #[On('player-note-created')]
    public function refreshPlayerNotes(): void
    {
        Flux::modals()->close('create-note');
        $this->message = 'Note created successfully';
    }

    public function render()
    {
        return view('livewire.players.show');
    }
}
