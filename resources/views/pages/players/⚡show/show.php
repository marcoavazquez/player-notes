<?php

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Livewire\Component;
use Livewire\Attributes\On;

new class extends Component
{
    protected UserRepositoryInterface $repository;

    public User $player;

    public string $message = '';

    public function mount(UserRepositoryInterface $repository, int $playerId)
    {
        $this->repository = $repository;
        $this->player = $this->repository->getPlayerWithNotes($playerId);
    }

    #[On('player-note-created')]
    public function refreshPlayerNotes()
    {
       Flux::modals()->close('create-note');
       $this->message = 'Note created successfully';
    }
};
