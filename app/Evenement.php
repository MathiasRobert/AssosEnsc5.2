<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    protected $fillable = [
        "categorie_id",
        "titre",
        "lieu",
        "dateDeb",
        "dateFin",
        "prix",
        "tarifs",
        "description",
        "nbMaxParticipants"
    ];

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable')->orderBy('created_at','desc');
    }
    /**
     * Get the association that owns the evenement.
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
        return $this->belongsTo('App\CategorieEvenement');
    }
}
