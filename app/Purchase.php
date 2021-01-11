<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ["date_purchase", "game_id", "user_id"];

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function games() {
        return $this->belongsToMany(Game::class);
    }
}
