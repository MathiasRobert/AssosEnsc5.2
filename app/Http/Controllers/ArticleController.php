<?php

namespace App\Http\Controllers;

use App\Article;
use App\CategorieArticle;
use Illuminate\Http\Request;
use Auth;
use App\Association;
use Jenssegers\Date\Date;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\StoreArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $association = Association::where('email', Auth::user()->email)->first();
        $articles = $association->articles->all();
        return view('admin.articles.index', compact('articles', 'association'));
    }

    public function show($id)
    {
        $article = Article::find($id);
        $commentaires = $article->comments;
        $association = Association::find($article->association_id);
        $association->couleur = $association->couleur->code;
        return view('pages.asso.articles.show', compact('article', 'association', 'commentaires'));
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
        if (isset($request->image) && $request->file('image')->isValid()) {
            $article->image = $request->image->store('public/images/'.$article->association_id.'/articles/'.$article->id);
            $article->image = '/storage/'.substr($article->image, 7);
        }
        $article->save();
        return redirect('admin/articles');
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
    public function update(StoreArticleRequest $request, $id)
    {
        $article = Article::find($id);
        $article->fill($request->all());
        if (isset($request->image) && $request->file('image')->isValid()) {
            $article->image = $request->image->store('public/images/'.$article->association_id.'/articles/'.$article->id);
            $article->image = '/storage/'.substr($article->image, 7);
        }
        $article->save();
        return redirect('admin/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        Article::destroy($id);

        if ( $request->ajax() ) {
            Article::destroy($request->all());

            return response(['status' => 'success']);
        }
        return response(['status' => 'failed']);
    }
}
