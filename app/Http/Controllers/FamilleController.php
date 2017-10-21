<?php

namespace App\Http\Controllers;

use App\ActionFamille;
use App\Famille;
use Illuminate\Http\Request;

class FamilleController extends Controller
{
    /**
     *
     */
    public function index()
    {
        $familles = Famille::all();
        $actions = ActionFamille::orderBy('quand', 'desc');
        $familles = Famille::orderBy('points','desc')->get();
        $max = Famille::max('points');
        foreach ($familles as $f)
        {
            $f->pourcentage = round((float)($f->points/$max) * 100 );
        }
        return view('pages.famille', compact('familles', 'actions'));
    }

}
