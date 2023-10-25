<?php

namespace App\Http\Controllers;

use App\Models\Membre;
use App\Models\TontineCollective;
use App\Models\Versement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VersementController extends Controller
{



    public function createVersement()
    {
        $tontinesC = TontineCollective::all();
        $membres = Membre::all();
        return view('versements.ajoutPayement', compact('tontinesC', 'membres'));
    }

    public function createListeVersement()
    {
        $versements = Versement::with('tontinesC', 'membres')->get();
        $tontinesC = TontineCollective::all();
        $membres = Membre::all();
        return view('versements.listePayement', compact('versements','tontinesC','membres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'tontine'=>'numeric',
            'membre'=>'numeric',
            'date'=>'required|date',
            'montant'=>'required|numeric',

        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }else{
            $nomMembre = Membre::all()->where('id', $request->membre)->first();
            $code = Versement::OrderBy('id', 'desc')->first();
            if($code == null){
                $codeVersement = 'YMVTC1';
            }else {
                $codeVersement = 'YMVTC'.($code->id+1);
            }
            $versements = new Versement;
            $versements->codeVersement = $codeVersement;
            $versements->montantVersement = $request->montant;
            $versements->dateVersement = $request->date;
            $versements->tontine = $request->tontine;
            $versements->membre = $request->membre;
            $versements->save();
            return redirect()->back()->with('success', 'Enregistrement effectuer avec success');
        }
    }

    public function search(Request $request){
        $choix = $request->input('choix');
        $recherche = $request->input('txtRecherche');
        $versements = Versement::query();
        $versements->with('tontinesC', 'membres');
        if($choix == 'identifiant'){
            $versements = Versement::where('codeVersement', 'like', '%'. $recherche .'%');
        }else if( $choix == 'tontine'){

            $versements = Versement::whereHas('tontinesC', function ($query) use ($recherche){
                $query->where('nomTontineC', 'like', '%' . $recherche . '%')
                ->orWhere('codeTontineC', 'like', '%'. $recherche .'%');
            });
        }else if( $choix == 'membre'){
            $versements = Versement::whereHas('membres', function ($query) use ($recherche){
                $query->where('nomMembre', 'like', '%' . $recherche . '%');
            });
        }else if( $choix == 'montant'){
            $versements = Versement::where('montant', 'like', '%'. $recherche .'%');
        }else {
            $versements = Versement::with('tontinesC', 'membres');
        }
        $versements = $versements->get();
        $tontinesC = TontineCollective::all();
        $membres = Membre::all();
        return view('versements.listePayement', compact('versements','tontinesC','membres'));
    }
}
