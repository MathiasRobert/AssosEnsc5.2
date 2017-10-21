<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActionFamille extends Model
{
    protected $fillable = [
        'qui',
        'quoi',
        'quand',
        'points',
        'famille_id'
    ];

    public function famille()
    {
        return $this->belongsTo('App\Famille');
    }
}
