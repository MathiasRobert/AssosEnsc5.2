<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        "categorie_id",
        "titre",
        "texte"
    ];

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable')->orderBy('created_at','desc');
    }
    /**
     * Get the association that owns the article.
     */
    public function association()
    {
        return $this->belongsTo('App\Association');
    }

    /**
     * Get the categorie associated with the article.
     */
    public function categorie()
    {
        return $this->belongsTo('App\CategorieArticle');
    }
}
