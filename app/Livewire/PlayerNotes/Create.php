<?php

namespace App\Livewire\PlayerNotes;

use App\Repositories\Contracts\PlayerNoteRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    protected UserRepositoryInterface $userRepository;

    protected PlayerNoteRepositoryInterface $playerNoteRepository;

    #[Validate('required|max:255')]
    public string $note = '';

    #[Validate('required|exists:users,id')]
    public int $playerId = 0;

    protected bool $fromPlayerInfo = false;

    public function boot(
        UserRepositoryInterface $userRepository,
        PlayerNoteRepositoryInterface $playerNoteRepository
    ): void {
        $this->userRepository = $userRepository;
        $this->playerNoteRepository = $playerNoteRepository;
    }

    public function mount(?int $playerId = null): void
    {
        if ($playerId) {
            $this->playerId = $playerId;
            $this->fromPlayerInfo = true;
        }
    }

    #[Computed]
    public function players(): Collection
    {
        return $this->userRepository->getPlayers();
    }

    public function save(): void
    {
        $this->authorize('create', PlayerNote::class);
        $this->validate();

        $this->playerNoteRepository->create([
            'player_id' => $this->playerId,
            'note' => $this->note,
            'author_id' => auth()->id(),
        ]);
        $this->dispatch('player-note-created');
    }

    public function render()
    {
        return view('livewire.player-notes.create');
    }
}
