<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorieArticle extends Model
{
    public $timestamps = false;

    /**
     * Get the articles for the categorie.
     */
    public function articles()
    {
        return $this->hasMany('App\Article');
    }
}
