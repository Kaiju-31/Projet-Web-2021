<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function users() {
        return $this->belongsTo(User::class);
    }

    public function games() {
        return $this->belongsToMany(Game::class);
    }
}
