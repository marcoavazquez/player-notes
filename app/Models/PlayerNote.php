<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerNote extends Model
{
    protected $fillable = [
        'player_id',
        'support_id',
        'note',
    ];

    public function player()
    {
        return $this->belongsTo(User::class, 'player_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'support_id');
    }
}
