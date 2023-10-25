<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Membre;
use App\Models\TontineIndividuelle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TontineIndividuelleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createTontine()
    {
        $agents = Agent::all();
        $membres = Membre::all();
        return view('tontineIndividuelles.ajoutTontineInd', compact('agents', 'membres'));
    }

    public function createHistoriqueTontine()
    {
        return view('tontineIndividuelles.historiqueTontineInd');
    }

    public function createListeTontine()
    {
        $agents = Agent::all();
        $membres = Membre::all();
        $tontinesI = TontineIndividuelle::with('agents', 'membres')->get();
        return view('tontineIndividuelles.listeTontineInd', compact('tontinesI', 'agents', 'membres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'agent'=> 'required',
            'membre'=> 'required',
            'nom'=>'required',
            'debut'=>'required|date',
            'montant'=>'required|numeric',

        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }else {
            $code = TontineIndividuelle::OrderBy('id', 'desc')->first();
            if($code == null){
                $codeTontineI = 'YMTI1';
            }else{
                $codeTontineI = 'YMTI'.($code->id+1);
            }
            $tontineI = new TontineIndividuelle;
            $tontineI->codeTontineI = $codeTontineI;
            $tontineI->nomTontineI = $request->nom;
            $tontineI->montantTontineI = $request->montant;
            $tontineI->debutTontineI = $request->debut;
            $tontineI->agent = $request->agent;
            $tontineI->membre = $request->membre;
            $tontineI->save();
            return redirect()->back()->with('success', 'Enregistrement effectuer avec success');
        }
    }

    public function search(Request $request){
        $choix = $request->input('choix');
        $recherche = $request->input('txtRecherhce');
    }
}
