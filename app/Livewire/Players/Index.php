<?php

namespace App\Livewire\Players;

use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{
    protected UserRepositoryInterface $repository;

    public function boot(UserRepositoryInterface $userRepository): void
    {
        $this->repository = $userRepository;
    }

    #[Computed]
    public function players(): Collection
    {
        return $this->repository->getPlayers();
    }

    public function render()
    {
        return view('livewire.players.index');
    }
}
