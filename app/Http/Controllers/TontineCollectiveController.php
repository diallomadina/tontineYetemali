<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\TontineCollective;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TontineCollectiveController extends Controller
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
        return view('tontineCollectifs.ajoutTontine', compact('agents'));
    }

    public function createListeTontine()
    {
        $agents = Agent::all();
        $tontines = TontineCollective::with('agents')->get();
        return view('tontineCollectifs.listeTontine', compact('tontines', 'agents'));
    }

    public function createHistoriqueTontine()
    {
        return view('tontineCollectifs.historiqueTontine');
    }
    public function createGestionTontine()
    {
        return view('tontineCollectifs.gestionTontine');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'nom'=>'required',
            'debut'=>'required|date',
            'montant'=>'required',
            'frequence'=>'required',
            'participant'=>'required',
        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }else{
            $agent = new Agent();
            $tontines = new TontineCollective();
            $code = TontineCollective::OrderBy('id', 'desc')->first();
            if($code == null){
                $codeTontineC = 'YMTC1';
            }else{
                $codeTontineC='YMTC'.($code->id+1);
            }
            $tontines->codeTontineC = $codeTontineC;
            $tontines->nomTontineC = $request->nom;
            $tontines->debutTontineC = $request->debut;
            $tontines->montant = $request->montant;
            $tontines->frequence = $request->frequence;
            $tontines->nombreParticipant = $request->participant;
            $tontines->agent = $request->agent;
            $tontines->save();
            return redirect()->back()->with('success','Enregistrement effectuer avec succes');
        }
    }


    public function update(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'nom'=>'required',
            'debut'=>'required|date',
            'montant'=>'required',
            'frequence'=>'required',
            'participant'=>'required',
        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }else{

            $code = $request->input('code');
            $tontines = TontineCollective::where('codeTontineC',$code)->first();
            if(!$tontines){
                return redirect()->back()->with('error', "La tontine avec le code donné n'existe pas.");
            }
            $tontines->nomTontineC = $request->nom;
            $tontines->debutTontineC = $request->debut;
            $tontines->montant = $request->montant;
            $tontines->frequence = $request->frequence;
            $tontines->nombreParticipant = $request->participant;
            $tontines->agent = $request->agent;
            $tontines->save();
            return redirect()->back()->with('success','Modification effectuer avec succes');
        }
    }

    // La fonction pour recherher les tontines
    public function search(Request $request){
        $choix = $request->input('choix');

        $recherche = $request->input('txtRecherche');

        $tontines = TontineCollective::query();

        if($choix == 'identifiant'){
            $tontines = TontineCollective::where('codeTontineC', 'like', '%' . $recherche .'%');
        }else if($choix == 'nom'){
            $tontines = TontineCollective::where('nomTontineC', 'like', '%' . $recherche .'%');
        }else if($choix == 'montant'){
            $tontines = TontineCollective::where('montant', 'like', '%' . $recherche .'%');
        }else{
             $tontines = TontineCollective::with('agents');
        }
        $tontines = $tontines->get();
        $agents = Agent::all();
        return view('tontineCollectifs.listeTontine', compact('tontines', 'agents'));
    }
}
