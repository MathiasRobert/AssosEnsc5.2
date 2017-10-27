<?php

namespace App\Http\Controllers;

use App\Couleur;
use Auth;
use App\Association;

class AdminController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard()
    {
        $association = Association::where('email', Auth::user()->email)->first();
        $couleurs = Couleur::all();
        $membres = $association->membres->all();
        return view('admin.dashboard', compact( 'association', 'couleurs', 'membres'));
    }
}
