<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ["image", "name", "description", "quantity", "price", "plateform", "note", "code"];

    public function comments() {
        return $this->belongsToMany(Comment::class);
    }

    public function purchases() {
        return $this->belongsToMany(Purchase::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
