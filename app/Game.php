<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ["image", "name", "description", "quantity", "price", "note"];

    public function comments() {
        return $this->belongsToMany(Comment::class);
    }
}
