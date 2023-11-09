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
        $agents = Agent::all();
        $membres = Membre::all();
        $tontines = TontineIndividuelle::with('agents', 'membres')->get();
        return view('tontineIndividuelles.historiqueTontineInd', compact('tontines','agents', 'membres'));
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
        $recherche = $request->input('txtRecherche');

        $tontinesI = TontineIndividuelle::query();
        $tontinesI->with('agents', 'membres');

        if($choix == 'identifiant'){
            $tontinesI = TontineIndividuelle::where('codeTontineI', 'like', '%' .$recherche . '%');
        }elseif($choix==='nom'){
            $tontinesI = TontineIndividuelle::where('nomTontineI', 'like', '%' . $recherche . '%');
        }elseif($choix === 'montant'){
            $tontinesI = TontineIndividuelle::where('montantTontineI', 'like', '%' . $recherche . '%');
        }elseif($choix === 'membre'){
            $tontinesI = TontineIndividuelle::whereHas('membres', function ($query) use ($recherche){
                $query->where('nomMembre', 'like', '%' . $recherche . '%')
                ->orWhere('prenomMembre', 'like', '%' . $recherche . '%');
            });
        } elseif($choix === 'agent'){
            $tontinesI = TontineIndividuelle::whereHas('agents', function ($query) use ($recherche){
                $query->where('nomAgent', 'like', '%' . $recherche . '%')
                ->orWhere('prenomAgent', 'like', '%' . $recherche . '%');
            });
        }else {
            $tontinesI = TontineIndividuelle::with('agents', 'membres');
        }

        $tontinesI = $tontinesI->get();
        $agents = Agent::all();
        $membres = Membre::all();
        return view('tontineIndividuelles.listeTontineInd', compact('tontinesI', 'agents', 'membres'));
    }

    public function searchHistorique(Request $request) {
        $choix = $request->input('choix');
        $recherche = $request->input('txtRecherche');

        $periode = $request->input('periode');
        $date1 = $request->input('date1');
        $date2 = $request->input('date2');
        $annee = $request->input('annee');
        $mois = $request->input('mois');

        $tontines = TontineIndividuelle::with('agents', 'membres');

        if (!empty($choix) && $choix !== 'null' && !empty($recherche)) {
            // Si le choix est sélectionné et une recherche est effectuée
            if ($choix === 'identifiant') {
                $tontines->where('codeTontineI', 'like', '%' . $recherche . '%');
            } elseif ($choix === 'nom') {
                $tontines->where('nomTontineI', 'like', '%' . $recherche . '%');
            } elseif ($choix === 'montant') {
                $tontines->where('montantTontineI', 'like', '%' . $recherche . '%');
            } elseif ($choix === 'membre') {
                $tontines->whereHas('membres', function ($query) use ($recherche) {
                    $query->where('nomMembre', 'like', '%' . $recherche . '%')
                        ->orWhere('prenomMembre', 'like', '%' . $recherche . '%');
                });
            }elseif($choix === 'agent'){
                $tontines->WhereHas('agents', function ($query) use ($recherche) {
                    $query->where('nomAgent', 'like', '%' . $recherche . '%')
                        ->orWhere('prenomAgent', 'like', '%' . $recherche . '%');
                });
            }
        }

        if (!empty($periode) && $periode !== 'null') {
            // Si la période est sélectionnée
            if ($periode === 'date_unique') {
                $tontines->whereDate('debutTontineI', '=', $date1);
            } elseif ($periode === 'plage_dates') {
                $tontines->whereBetween('debutTontineI', [$date1, $date2]);
            } elseif ($periode === 'annee') {
                $tontines->whereYear('debutTontineI', $annee);
            } elseif ($periode === 'mois') {
                if (!empty($annee) && $annee !== 'null') {
                    $tontines->whereYear('debutTontineI', $annee)
                         ->whereMonth('debutTontineI', $mois);
                }
                $tontines->whereMonth('debutTontineI', $mois);

            }
        }

        // Exécutez la requête et récupérez les résultats
        $tontines = $tontines->get();

        $agents = Agent::all();
        $membres = Membre::all();

        return view('tontineIndividuelles.historiqueTontineInd', compact('tontines', 'agents', 'membres'));
    }








}
