<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'avatar', 'google_id', 'famille_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token'
    ];

    /**
     * Get the famille that owns the usser.
     */
    public function famille()
    {
        return $this->belongsTo('App\Famille');
    }

    public function isAdmin(){
        return (Auth::check() && Association::where('email', '=', Auth::user()->email)->first());
    }

    public function isBDE() {
        return (Auth::check() && Auth::user()->email == "bde@ensc.fr");
    }

    public function isBDF() {
        return (Auth::check() && BureauDesFamilles::where('email', '=', Auth::user()->email)->first());
    }

    public function estInscrit($evenement_id){
        return Inscription::where([
            ['user_id', '=', Auth::user()->id],
            ['evenement_id', '=', $evenement_id]
        ])->first();
    }
}
