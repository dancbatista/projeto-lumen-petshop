<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    public $timestamps = false;
    protected $fillable = [
        "petName",
        "petAge",
        "petKind",
        "petRace",
        "ownerName",
        "ownerPhone",
    ];
}
