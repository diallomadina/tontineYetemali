<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Membre;
use App\Models\Participation;
use App\Models\PayementCollective;
use App\Models\TontineCollective;
use App\Models\Versement;
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


    // La fonction pour afficher la page d'ajout
    public function createTontine()
    {
        $agents = Agent::all();
        return view('tontineCollectifs.ajoutTontine', compact('agents'));
    }

    // La fonction pour afficher la liste des tontines
    public function createListeTontine()
    {
        $agents = Agent::all();
        $tontines = TontineCollective::with('agents')->get();
        return view('tontineCollectifs.listeTontine', compact('tontines', 'agents'));
    }

    // La fonction pour afficher la page d'historique de la tontine
    public function createHistoriqueTontine()
    {

        return view('tontineCollectifs.historiqueTontine');
    }

    // La fonction pour afficher la page de gestion de la tontine
    public function createGestionTontine()
    {
        $agents = Agent::all();
        $membres = Membre::all();
        $tontines = TontineCollective::with('agents')->get();
        return view('tontineCollectifs.gestionTontine', compact('tontines', 'agents', 'membres'));
    }


    // La fonction pour enregistrer les tontines
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'nom'=>'required',
            'debut'=>'required|date',
            'montant'=>'required',
            'frequence'=>'required',

        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }else{


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
            $tontines->agent = 1;
            $tontines->save();
            return redirect()->back()->with('success','Enregistrement effectuer avec succes');
        }
    }


    // La fonction pour modifier les tontines
    public function update(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'nom'=>'required',
            'debut'=>'required|date',
            'montant'=>'required',
            'frequence'=>'required',
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


    // La fonction pour associer les membres a la tontine
    public function associate(Request $request){

        $validation = Validator::make($request->all(),[
            'membre'=>'required',

        ]);

        if($validation->fails()){
            return response()->json([ 'error' => 'Veuillez choisir le membre concernee']);
        } else {
            $tontineId = $request->tontine;
            $tontine = TontineCollective::find($tontineId);

            $membreId = $request->membre;
            $membre = Membre::find($membreId);

            // Créez une nouvelle participation
            $participation = new Participation();

            // Associez la tontine au membre dans la participation
            $participation->tontinesC()->associate($tontine);
            $participation->membres()->associate($membre);

            // Enregistrez la participation
            $participation->save();

            // Assurez-vous que vous attribuez les dates aux objets Membre correctement si nécessaire
            $membre->created_at = now();
            $membre->updated_at = now();
            $membre->save();



            // Retournez la vue avec les données mises à jour
            return response()->json([
                'participation' => $participation,
            ]);
        }

    }

    public function displayMembre(Request $request){
        $tontine = $request->input('tontine');
        $versements = Versement::with('tontinesC', 'membres')->where('tontine', $tontine);
        $payements = PayementCollective::with('tontines', 'membres')->where('tontine', $tontine);
        $participations = Participation::with('tontinesC','membres')->where('tontine', $tontine);
    }

}
