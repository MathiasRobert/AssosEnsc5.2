<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'poste',
        'surnom',
        'email',
        'description',
        'lien_facebook'
    ];
}
