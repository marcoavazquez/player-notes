<?php

use App\Repositories\Contracts\UserRepositoryInterface;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Illuminate\Database\Eloquent\Collection;

new class extends Component
{
    protected UserRepositoryInterface $repository;

    public function boot(UserRepositoryInterface $userRepository)
    {
        $this->repository = $userRepository;
    }

    #[Computed]
    public function players(): Collection
    {
        return $this->repository->getPlayers();
    }
};
