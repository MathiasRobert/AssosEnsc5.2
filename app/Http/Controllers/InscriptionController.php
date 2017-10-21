<?php

namespace App\Http\Controllers;

use App\Inscription;
use Illuminate\Http\Request;
use Auth;

class InscriptionController extends Controller
{
    public function inscription(Request $request)
    {
        $inscription = Inscription::Create([
            'user_id' => $request->user_id,
            'evenement_id' => $request->evenement_id,
            'aPaye' => false,
            'valide' => false,
        ]);

        if ($inscription->save()){
            return response()->json(['status' => 'success']);
        }

        return response()->json(['status' => 'failed']);
    }

    public function desinscription(Request $request)
    {
        $inscription = Inscription::where([
            ['user_id', '=', $request->user_id],
            ['evenement_id', '=', $request->evenement_id]
        ]);
        if($inscription->delete()) {
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'failed']);
    }
}
