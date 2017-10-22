<?php

namespace App\Http\Controllers;

use App\Biere;
use Illuminate\Http\Request;
use App\Association;
use Auth;
use App\Http\Requests\StoreBiereRequest;
use Illuminate\Session\Store;

class BiereController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminBDE');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $association = Association::where('email', Auth::user()->email)->first();
        $bieres = Biere::all();
        return view('admin.bieres.index', compact('bieres', 'association'));
    }

    public function show($id)
    {
        $biere = Biere::find($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $association = Association::where('email', Auth::user()->email)->first();
        return view('admin.bieres.create', compact('association'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreBiereRequest $request)
    {
        $biere = new Biere($request->all());
        $biere->image = '/images/image_placeholder.jpg';
        $biere->save();
        if (isset($request->image) && $request->file('image')->isValid()) {
            $imageName = $biere->id .'.'.$request->file('image')->getClientOriginalExtension();
            $biere->image = $request->image->move('uploads/bieres', $imageName);
        }
        $biere->save();
        return redirect('admin/bieres');
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
        $biere = Biere::find($id);
        return view('admin.bieres.edit', compact('biere', 'association'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(StoreBiereRequest $request, $id)
    {
        $biere = Biere::find($id);
        $biere->fill($request->all());

        if (isset($request->image) && $request->file('image')->isValid()) {
            $imageName = $biere->id .'.'.$request->file('image')->getClientOriginalExtension();
            $biere->image = $request->image->move('uploads/bieres', $imageName);
        }

        $biere->save();
        return redirect('admin/bieres');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        Biere::destroy($id);

        if ( $request->ajax() ) {
            Biere::destroy($request->all());

            return response(['status' => 'success']);
        }
        return response(['status' => 'failed']);
    }
}
