<?php

namespace App\Http\Controllers;

use App\Famille;
use App\Http\Requests\StoreActionFamilleRequest;
use Illuminate\Http\Request;
use Auth;

use App\Association;
use App\ActionFamille;

class ActionFamilleController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminBDF');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actions = ActionFamille::all();
        return view('admin.actionsFamilles.index', compact('actions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $familles = Famille::all();
        return view('admin.actionsFamilles.create', compact( 'familles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActionFamilleRequest $request)
    {
        $action = new ActionFamille($request->all());
        $action->save();
        $famille = Famille::find($action->famille_id);
        $famille->points = $famille->points + $action->points;
        $famille->save();
        return redirect('admin/actionsFamilles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action = ActionFamille::find($id);
        $familles = Famille::all();
        return view('admin.actionsFamilles.edit', compact('action', 'familles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreActionFamilleRequest $request, $id)
    {
        $action = ActionFamille::find($id);
        $famille = Famille::find($action->famille_id);
        $famille->points = $famille->points - $action->points;
        $action->fill($request->all());
        $action->save();
        $famille->save();
        $famille = Famille::find($action->famille_id);
        $famille->points = $famille->points + $action->points;
        $famille->save();
        return redirect('admin/actionsFamilles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // delete
        $action = ActionFamille::find($id);
        $famille = Famille::find($action->famille_id);
        $famille->points = $famille->points - $action->points;
        $famille->save();

        ActionFamille::destroy($id);

        if ( $request->ajax() ) {
            ActionFamille::destroy( $request->all() );

            return response(['status' => 'success']);
        }
        return response(['status' => 'failed']);
    }
}
