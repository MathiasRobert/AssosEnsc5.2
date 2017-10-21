<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreEvenementRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Jenssegers\Date\Date;
use Validator;
use Illuminate\Support\Facades\Input;

use App\CategorieEvenement;
use App\Evenement;
use App\Association;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

//        if($request->filter)
//        {
//            return Evenement::orderBy('dateDeb','desc')->with('categorie')->where('categorie_id',$request->filter)->get();
//        }
//        else
//        {
//            return Evenement::orderBy('dateDeb','desc')->with('categorie')->get();
//        }

        $association = Association::where('email', Auth::user()->email)->first();
        $evenements = $association->evenements()->with('categorie')->get();

        if ($request->ajax()) {
            return $evenements;
        } else {
            return view('admin.evenements.index', compact('evenements', 'association'));
        }
        // return $evenements;
        $evenements = $association->evenements->all();
        return view('admin.evenements.index', compact('evenements', 'association'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $association = Association::where('email', Auth::user()->email)->first();
        $categories = CategorieEvenement::all();
        return view('admin.evenements.create', compact('association', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        if ($request->ajax()) {
            $evenement = Evenement::with('categorie')->find($id);
            $evenement->commentable_type = get_class($evenement);
            return $evenement;
        } else {
            $evenement = Evenement::find($id);
            $evenement->dateDeb = Date::parse($evenement->dateDeb)->format('l j F Y - h:i');
        }
        $association = Association::find($evenement->association_id);
        $association->couleur = $association->couleur->code;

        return view('pages.asso.evenements.show', compact('evenement', 'association'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEvenementRequest $request)
    {
        $association = Association::where('email', Auth::user()->email)->first();
        $evenement = new Evenement($request->all());
        $evenement->association_id = $association->id;
        $evenement->affiche = '/images/image_placeholder.jpg';
        $evenement->save();
        if (isset($request->affiche) && $request->file('affiche')->isValid()) {
            $evenement->affiche = '/storage/' . $request->affiche->store('images/evenements/' . $evenement->id);
            // $evenement->affiche = '/storage/'.substr($evenement->affiche, 7);
        }
        $evenement->save();

        return redirect('admin/evenements');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $association = Association::where('email', Auth::user()->email)->first();
        $categories = CategorieEvenement::all();
        $evenement = Evenement::find($id);
        return view('admin.evenements.edit', compact('evenement', 'association', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, StoreEvenementRequest $request)
    {
        $evenement = Evenement::find($id);
        $evenement->fill($request->all());

        // return $request->all();

        if (isset($request->affiche) && $request->file('affiche')->isValid()) {
            $evenement->affiche = '/storage/' . $request->affiche->store('images/evenements/' . $evenement->id);
            // $evenement->affiche = '/storage/'.substr($evenement->affiche, 7);
        }
        $evenement->save();

        if ($request->ajax()) {
            return $evenement;
        } else {
            return redirect('admin/evenements');
            // return view('admin.evenements.index', compact('evenements', 'association'));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // return All();
        Evenement::destroy($id);
        // var deroro;
        // if ($request->ajax()) {
        //     Evenement::destroy($request->all());

        //     return response(['status' => 'success']);
        // }
        // return Evenement::all()->getEl();
        return response(['status' => 'success', 'id_deleted' => $id]);
    }

    public function getAllCategoriesEvenement(Request $request)
    {
        return CategorieEvenement::all();
    }

    public function getComments(Request $request, $id)
    {
        return Evenement::find($id)->comments()->with('user', 'comments.user')->get();
    }
}
