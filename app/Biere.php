<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biere extends Model
{
    public $timestamps = false;

    protected $fillable = [
        "nom",
        "degre",
        "contenance",
        "description",
        "prix",
        "couleur",
        "origine",
        "image"
    ];
}
