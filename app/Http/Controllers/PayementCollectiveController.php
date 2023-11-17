<?php

namespace App\Http\Controllers;

use App\Models\Membre;
use App\Models\PayementCollective;
use App\Models\TontineCollective;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PayementCollectiveController extends Controller
{
    public function store(Request $request){
        $validation = Validator::make($request->all(), [
            'tontine' => 'required',
            'membre2' => 'required',
            'date'=>['required','date'],
        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }else {
            $tontineId = $request->input("tontine");
            $membreId = $request->input("membre2");

            $tontine = TontineCollective::find($tontineId);
            $membre = Membre::find($membreId);
            $montant = $tontine->montant;
            $code = PayementCollective::OrderBy('id', 'desc')->first();
            if($code === null){
                $codePayement = 'YMPC1';
            }else{
                $codePayement = 'YMPCI'.($code->id+1);
            }

            $payements = new PayementCollective();
            $payements->codePayementC = $codePayement;
            $payements->membres()->associate($membre);
            $payements->tontines()->associate($tontine);
            $payements->montantPayementC = $montant;
            $payements->datePayementC = $request->date;
            $payements->save();

            return redirect()->back()->with('success','Enregistrement effectuer avec succes');

        }


    }
}
