<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ["lastname", "firstname", "mail", "password" ,"birthday", "balance"];

    public function comments() {
        return $this->belongsToMany(Comment::class);
    }

    public function purchases() {
        return $this->belongsToMany(Purchase::class);
    }
}
