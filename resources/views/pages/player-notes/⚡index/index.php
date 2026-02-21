<?php

use App\Repositories\Contracts\PlayerNoteRepositoryInterface;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;

new class extends Component
{
    use WithPagination;
    protected PlayerNoteRepositoryInterface $repository;

    public function mount(PlayerNoteRepositoryInterface $playerNoteRepository)
    {
        $this->repository = $playerNoteRepository;
    }

    #[Computed]
    public function playerNotes()
    {
        return $this->repository->paginate(15);
    }
};