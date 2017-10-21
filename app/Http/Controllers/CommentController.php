<?php

namespace App\Http\Controllers;

// use App\Http\Requests\StoreCommentRequest;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Illuminate\Support\Facades\Input;

use App\Association;
use App\Comment;
use App\CategorieComment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        // if($request->filter){
        //     return Comment::orderBy('dateDeb','desc')->with('categorie')->where('categorie_id',$request->filter)->get();
        // }else
        // {
        //     return Comment::orderBy('dateDeb','desc')->with('categorie')->get();
        // }

        // $association = Association::where('email', Auth::user()->email)->first();
        // $Comments = $association->Comments()->with('categorie')->get();

        // if($request->ajax()){
        //     return $Comments;
        // }else{
        //     return view('admin.Comments.index', compact('Comments', 'association'));
        // }
        // return $Comments;
    }

    // public function show($id)
    // {
    //     $Comment = Comment::find($id);
    //     $association = Association::find($Comment->association_id);
    //     $association->couleur = $association->couleur->code;
    //     return view('pages.asso.Comments.show', compact('Comment', 'association'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     $association = Association::where('email', Auth::user()->email)->first();
    //     $categories = CategorieComment::all();
    //     return view('admin.Comments.create', compact('association', 'categories'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        if($request->ajax()){
            return Comment::with('categorie')->find($id);
        }
        $Comment = Comment::find($id);
        $association = Association::find($Comment->association_id);
        $association->couleur = $association->couleur->code;
        return view('pages.asso.Comments.show', compact('Comment', 'association'));
   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()){
            $user = Auth::user();
            $comment = new Comment($request->all());
            $comment->user_id = $user->id;
            $comment->save();
            return $comment;
        }
        else{
            return 'Not authorized';
        }
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
        $categories = CategorieComment::all();
        $Comment = Comment::find($id);
        return view('admin.Comments.edit', compact('Comment', 'association', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,StoreCommentRequest $request)
    {
        $Comment = Comment::find($id);
        $Comment->fill($request->all());

        // return $request->all();

        if (isset($request->affiche) && $request->file('affiche')->isValid()) {
            $Comment->affiche = '/storage/'.$request->affiche->store('images/Comments/'.$Comment->id);
            // $Comment->affiche = '/storage/'.substr($Comment->affiche, 7);
        }
        $Comment->save();

        if($request->ajax()){
            return $Comment;
        }else{
            return redirect('admin/Comments');
            // return view('admin.Comments.index', compact('Comments', 'association'));
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
        Comment::destroy($id);
        // var deroro;
        // if ($request->ajax()) {
        //     Comment::destroy($request->all());

        //     return response(['status' => 'success']);
        // }
        // return Comment::all()->getEl();
        return response(['status' => 'success','id_deleted' => $id]);
    }

    public function getAllCategoriesComment(Request $request){
        return CategorieComment::all();
    }

    public function getComments(Request $request,$id){
        return Comment::find($id)->comments()->with('user','comments.user')->get();
    }


    
}
