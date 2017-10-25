<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMembreRequest;
use Illuminate\Http\Request;
use App\Association;
use App\Membre;
use Auth;

class MembreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $association = Association::where('email', Auth::user()->email)->first();
        return view('admin.membres.create', compact('association'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMembreRequest $request)
    {
        $membre = new Membre($request->all());
        $association = Association::where('email', Auth::user()->email)->first();
        $membre->association_id = $association->id;
        $membre->photo = '/images/default-avatar.png';
        $membre->save();
        if (isset($request->photo) && $request->file('photo')->isValid()) {
            $imageName = $membre->id .'.'.$request->file('photo')->getClientOriginalExtension();
            $membre->photo = $request->photo->move('uploads/membres', $imageName);
//            $img = Image::make(asset($membre->photo));
//            $img->fit(50);
        }
        $membre->save();
        return redirect('admin/association');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $association = Association::where('email', Auth::user()->email)->first();
        $membre = Membre::find($id);
        return view('admin.membres.edit', compact('membre', 'association'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMembreRequest $request, $id)
    {
        $membre = Membre::find($id);
        $membre->fill($request->all());
        if (isset($request->photo) && $request->file('photo')->isValid()) {
            $imageName = $membre->id .'.'.$request->file('photo')->getClientOriginalExtension();
            $membre->photo = $request->photo->move('uploads/membres', $imageName);
//            $img = Image::make(asset($membre->photo));
//            $img->fit(50);
        }
        $membre->save();
        return redirect('admin/association');
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
        Membre::destroy($id);

        if ( $request->ajax() ) {
            Membre::destroy( $request->all() );

            return response(['status' => 'success']);
        }
        return response(['status' => 'failed']);
    }
}
