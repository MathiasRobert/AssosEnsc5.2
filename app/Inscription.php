<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $fillable = [
        "user_id",
        "evenement_id",
        "aPaye",
        "valide",
    ];
}
