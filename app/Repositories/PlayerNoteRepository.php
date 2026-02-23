<?php

namespace App\Repositories;

use App\Repositories\Contracts\PlayerNoteRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Models\PlayerNote;

class PlayerNoteRepository implements PlayerNoteRepositoryInterface
{
    public function __construct() {}

    public function getAll(): Collection
    {
        return PlayerNote::all();
    }

    public function query(): \Illuminate\Database\Eloquent\Builder
    {
        return PlayerNote::query();
    }

    public function paginate(int $perPage = 15)
    {
        return PlayerNote::with('player', 'author')->paginate($perPage);
    }

    public function create(array $data): PlayerNote
    {
        return PlayerNote::create($data);
    }

    public function delete(PlayerNote $note): void
    {
        $note->delete();
    }

    public function findById(int $id): ?PlayerNote
    {
        return PlayerNote::find($id);
    }
}
