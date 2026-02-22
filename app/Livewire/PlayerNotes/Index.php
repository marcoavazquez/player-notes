<?php

namespace App\Livewire\PlayerNotes;

use App\Repositories\Contracts\PlayerNoteRepositoryInterface;
use Flux\Flux;
use Illuminate\Contracts\Pagination\Paginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected PlayerNoteRepositoryInterface $repository;

    public string $message = '';

    public function boot(PlayerNoteRepositoryInterface $playerNoteRepository): void
    {
        $this->repository = $playerNoteRepository;
    }

    #[On('player-note-created')]
    public function refreshPlayerNotes(): void
    {
        Flux::modals()->close('create-note');
        $this->message = 'Note created successfully';
    }

    #[Computed]
    public function playerNotes(): Paginator
    {
        return $this->repository->paginate(10);
    }

    public function render()
    {
        return view('livewire.player-notes.index');
    }
}
