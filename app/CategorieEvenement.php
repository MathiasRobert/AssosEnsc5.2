<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorieEvenement extends Model
{
    public  $timestamps = false;

    /**
     * Get the articles for the categorie.
     */
    public function evenements()
    {
        return $this->hasMany('App\Evenement');
    }
}
