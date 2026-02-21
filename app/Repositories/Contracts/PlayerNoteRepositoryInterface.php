<?php

namespace App\Repositories\Contracts;

use App\Models\PlayerNote;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

interface PlayerNoteRepositoryInterface
{
    public function getAll(): Collection;
    public function query(): Builder;
    public function paginate(int $perPage = 15);
    public function findById(int $id): ?PlayerNote;
    public function create(array $data): PlayerNote;
    public function delete(PlayerNote $note): void;

}