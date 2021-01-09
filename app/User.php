<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ["lastname", "firstname", "mail", "password" ,"birthday", "balance"];
}
