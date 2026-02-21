<?php

use App\Repositories\Contracts\PlayerNoteRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;

new class extends Component
{
    protected UserRepositoryInterface $userRepository;
    protected PlayerNoteRepositoryInterface $playerNoterepository;

    #[Validate('required|max:255')]
    public string $note;

    #[Validate('required|exists:users,id')]
    public int $playerId;

    public function boot(
        UserRepositoryInterface $userRepository,
        PlayerNoteRepositoryInterface $playerNoteRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->playerNoterepository = $playerNoteRepository;
    }

    #[Computed]
    public function players(){
        return $this->userRepository->getPlayers();
    }

    public function save()
    {
        $this->validate();

        $this->playerNoterepository->create([
            'player_id' => $this->playerId,
            'note' => $this->note,
            'support_id' => auth()->id(),
        ]);
    }
};