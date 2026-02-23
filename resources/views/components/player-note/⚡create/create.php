<?php

use App\Models\PlayerNote;
use App\Repositories\Contracts\PlayerNoteRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Symfony\Component\HttpFoundation\Request;

new class extends Component
{
    protected UserRepositoryInterface $userRepository;
    protected PlayerNoteRepositoryInterface $playerNoterepository;

    #[Validate('required|max:255')]
    public string $note;

    #[Validate('required|exists:users,id')]
    public int $playerId;

    protected bool $fromPlayerInfo = false;


    public function boot(
        UserRepositoryInterface $userRepository,
        PlayerNoteRepositoryInterface $playerNoteRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->playerNoterepository = $playerNoteRepository;
    }

    public function mount(int $playerId = null)
    {
        if ($playerId) {
            $this->playerId = $playerId;
            $this->fromPlayerInfo = true;
        }
    }

    #[Computed]
    public function players(){
        return $this->userRepository->getPlayers();
    }

    public function save(Request $request)
    {
        $this->authorize('create', PlayerNote::class);
        $this->validate();

        $this->playerNoterepository->create([
            'player_id' => $this->playerId,
            'note' => $this->note,
            'author_id' => auth()->id(),
        ]);
        $this->dispatch('player-note-created');
    }
};
