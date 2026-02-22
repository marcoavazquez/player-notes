<?php

namespace App\Models;

use App\Policies\PlayerNotePolicy;
use Illuminate\Database\Eloquent\Model;

#[UserPolicy(PlayerNotePolicy::class)]
class PlayerNote extends Model
{
    protected $fillable = [
        'player_id',
        'author_id',
        'note',
    ];

    public function player()
    {
        return $this->belongsTo(User::class, 'player_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
