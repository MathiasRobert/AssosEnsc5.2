<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;


use App\Article;
use App\CategorieArticle;
use App\Association;
use App\Http\Requests\StoreArticleRequest;


class ArticleControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
    	// return Auth::user();
        $association = Association::where('email', Auth::user()->email)->first();
        return $association->articles()->with('categorie')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $association = Association::where('email', Auth::user()->email)->first();
        $categories = CategorieArticle::all();
        return view('admin.articles.create', compact('association', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreArticleRequest $request)
    {
        
        $article = new Article($request->all());

        $association = Association::where('email', Auth::user()->email)->first();
        $article->association_id = $association->id;
        $article->image = '/images/image_placeholder.jpg';

        $article->save();

        if(isset($request->image))
        {
            $destinationPath = public_path().'/storage/images/articles/'.$article->id;
            $extension       = Input::file('image')->getClientOriginalExtension(); // getting image extension
            $fileName        = time().'.'.$extension; // renameing image
            Input::file('image')->move($destinationPath, $fileName);
            $article->image = '/storage/images/articles/'.$article->id.'/'.$fileName;
        }

        $article->save();

        return $article;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $association = Association::where('email', Auth::user()->email)->first();
        $categories = CategorieArticle::all();
        $article = Article::find($id);
        return view('admin.articles.edit', compact('article', 'association', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'titre'       => 'required',
            'texte'      => 'required',
            'image' => 'required',
            'categorie' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('admin/articles/create')
                ->withErrors($validator);
        } else {
            // store
            $association = Association::where('email', Auth::user()->email)->first();

            $article = Article::find($id);
            $article->titre     = $request->get('titre');
            $article->texte     = $request->get('texte');
            $article->image     = $request->get('image');
            $article->categorie_id     = $request->get('categorie');
            $article->association_id = $association->id;
            $article->save();

            // redirect
            //Session::flash('message', 'Successfully created nerd!');
            return redirect('admin/articles');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // delete
        $article = Article::find($id);
        $article->delete();

        // redirect
        //Session::flash('message', 'Successfully deleted the nerd!');
        return redirect('admin/articles');
    }

    public function show($id, Request $request)
    {
        if ($request->ajax()) {
            $article = Article::with('categorie')->find($id);
            $article->commentable_type = get_class($article);
            return $article;
        } else {
            $article = Article::find($id);
        }
        $association = Association::find($article->association_id);
        $association->couleur = $association->couleur->code;

        return view('pages.asso.articles.show', compact('article', 'association'));

    }

    public function getAllCategoriesArticle()
    {
        return CategorieArticle::all();
    }

    public function getComments(Request $request, $id)
    {
        return Article::find($id)->comments()->with('user', 'comments.user')->get();
    }

}
