<?php

namespace App\Http\Controllers;

use App\Association;
use App\Http\Requests\StoreAssociationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


use Auth;

use Validator;
use Illuminate\Support\Facades\Input;

use App\Couleur;


class AssociationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request, $diminutif)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
//        $association = Association::where('email', Auth::user()->email)->first();
//        $categories = CategorieArticle::all();
//        return view('admin.articles.create', compact('association', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreAssociationRequest $request)
    {
//        $article = new Article($request->all());
//        $association = Association::where('email', Auth::user()->email)->first();
//        $article->association_id = $association->id;
//        $article->image = '/images/image_placeholder.jpg';
//        $article->save();
//        if (isset($request->image) && $request->file('image')->isValid()) {
//            $article->image = $request->image->store('public/images/'.$article->association_id.'/articles/'.$article->id);
//            $article->image = '/storage/'.substr($article->image, 7);
//        }
//        $article->save();
//        return redirect('admin/articles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($tab)
    {
        $association = Association::where('email', Auth::user()->email)->first();
        $couleurs = Couleur::all();
        $membres = $association->membres->all();
        return view('admin.associations.edit', compact('association', 'couleurs', 'membres'));
    }


    public function getCurrentAssociation(Request $request){
        return Association::where('email', Auth::user()->email)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAssociationRequest $request, $id)
    {
        $association = Association::find($id);
        $association->fill($request->all());
        if (isset($request->logo) && $request->file('logo')->isValid()) {
            $association->logo = $request->logo->store('public/images/'.$association->id.'/logo');
            $association->logo = '/storage/'.substr($association->logo, 7);
        }
        $association->save();
        return redirect('admin/associations/infos/edit');
    }

}
