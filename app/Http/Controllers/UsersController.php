<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\User;

class UsersController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        User::create($request->all());
        return 'success';
    }

    // public function current(Request $request){
    //     return Auth::user();
    // }

}
