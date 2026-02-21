<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface
{
    public function findById(int $id): ?User
    {
        return User::find($id);
    }

    public function getByRole(string $role): Collection
    {
        return User::where('role', $role)->get();
    }

    public function getPlayers(): Collection
    {
        return User::role('player')->get();
    }

    public function getPlayerWithNotes(int $id): ?User
    {
        return User::role('player')->with('playerNotes', 'playerNotes.author:id,name')->findOrFail($id);
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function delete(User $user): void
    {
        $user->delete();
    }
}
