<?php

namespace App\Http\Controllers;

use App\ActionFamille;
use App\Biere;
use App\Evenement;
use App\Article;
use App\Famille;
use DateTime;
use Illuminate\Http\Request;
use App\Association;
use Carbon\Carbon;
use Jenssegers\Date\Date;
use DB;
use Auth;

class PagesController extends Controller
{
    public function index(Request $request, $diminutif)
    {
        $association = Association::where('diminutif', $diminutif)->first();
        if($association == null)
            abort(404);
        $association->couleur = $association->couleur->code;

        $articles = $association->articles;
        foreach($articles as $entries){
            $entries->categorie = $entries->categorie->nom;
            $entries->texte = substr($entries->texte, 0, 250);
        }

        $evenements = $association->evenements;
        foreach($evenements as $entries){
            Date::setLocale('fr');
            $entries->dateNumJour = Date::parse($entries->dateDeb)->format('j');
            $entries->dateMois = Date::parse($entries->dateDeb)->format('F');
            $entries->dateJour = Date::parse($entries->dateDeb)->format('l');
            $entries->dateAnnee = Date::parse($entries->dateDeb)->format('Y');
            $entries->heureDeb = Date::parse($entries->dateDeb)->format('H:i');
            $dateEvenement = Carbon::parse($entries->dateDeb);
            $dateActuelle = Carbon::now();
            if($dateEvenement->gte($dateActuelle))
                $entries->estPasse = false;
            else
                $entries->estPasse = true;
        }
        $evenements = collect($evenements)->sortByDesc(function ($obj, $key) {
            return $obj->dateDeb;
        });

        $membres = $association->membres;
        return view('pages.asso.index', compact('membres', 'articles', 'evenements', 'association'));
    }

    public function home()
    {
        $associations = Association::all();
        $evenements = Evenement::where('dateDeb','>=',new DateTime('today'))
            ->orderBy(DB::raw('ABS(DATEDIFF(evenements.dateDeb, NOW()))'))->take(3)->get();
        foreach($evenements as $entries){
            Date::setLocale('fr');
            $entries->dateNumJour = Date::parse($entries->dateDeb)->format('j');
            $entries->dateMois = substr(Date::parse($entries->dateDeb)->format('F'), 0, 4);
            $entries->dateJour = Date::parse($entries->dateDeb)->format('l');
            $entries->dateAnnee = Date::parse($entries->dateDeb)->format('Y');
            $entries->heureDeb = Date::parse($entries->dateDeb)->format('H:i');
            $dateEvenement = Carbon::parse($entries->dateDeb);
            $dateActuelle = Carbon::now();
            if($dateEvenement->gte($dateActuelle))
                $entries->estPasse = false;
            else
                $entries->estPasse = true;
        }
        $articles = Article::orderBy('created_at', 'desc')->take(3)->get();
        foreach($articles as $entries){
            $entries->categorie = $entries->categorie->nom;
            $entries->texte = substr($entries->texte, 0, 100);
        }
        $familles = Famille::orderBy('points','desc')->get();
        $max = Famille::max('points');
        if($max == 0)
            $max = 1;
        foreach ($familles as $f)
        {
            $f->pourcentage = round((float)($f->points/$max) * 100 );
        }
        $bieres = Biere::all();
        return view('pages.home', compact( 'associations', 'evenements', 'articles', 'familles', 'bieres'));
    }

    public function calabar()
    {
        $bieres = Biere::all();
        return view('pages.calabar', compact('bieres'));
    }

    public function famille()
    {
        $actions = ActionFamille::orderBy('quand', 'desc')->take(10)->get();
        Date::setLocale('fr');
        foreach ($actions as $a)
        {
            $a->quand = Carbon::parse($a->quand)->format('d/m/Y');
        }
        $familles = Famille::orderBy('points','desc')->get();
        $max = Famille::max('points');
        if($max == 0)
            $max = 1;
        $cpt = 1;
        foreach ($familles as $f)
        {
            $f->classement = $cpt;
            $cpt++;
            $f->pourcentage = round((float)($f->points/$max) * 100 );
        }
        return view('pages.famille', compact('familles', 'actions'));
    }

    public function monCompte()
    {
        $user = Auth::user();
        $famille = $user->famille;
        return view('pages.monCompte', compact('user', 'famille'));
    }
}
