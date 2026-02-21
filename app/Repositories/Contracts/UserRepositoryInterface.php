<?php

namespace App\Repositories\Contracts;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function findById(int $id): ?User;
    public function getByRole(string $role): Collection;
    public function getPlayers(): Collection;
    public function create(array $data): User;
    public function delete(User $user): void;
}