<?php

use App\Repositories\Contracts\PlayerNoteRepositoryInterface;
use Flux\Flux;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\WithPagination;

new class extends Component
{
    use WithPagination;

    protected PlayerNoteRepositoryInterface $repository;

    public string $message = '';

    public function boot(PlayerNoteRepositoryInterface $playerNoteRepository)
    {
        $this->repository = $playerNoteRepository;
    }

    #[On('player-note-created')]
    public function refreshPlayerNotes()
    {
        Flux::modals()->close('create-note');
        $this->message = 'Note created successfully';
    }

    #[Computed]
    public function playerNotes(): Paginator
    {
        return $this->repository->paginate(10);
    }
};
