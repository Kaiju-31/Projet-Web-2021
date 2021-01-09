<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ["comment", "note", "id_user", "id_game"];

    public function games() {
        return $this->belongsToMany(Comment::class);
    }

    public function users() {
        return $this->belongsToMany(Comment::class);
    }
}
