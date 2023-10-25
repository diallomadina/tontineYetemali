<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function createAjout()
    {
        $agences = Agence::where('statut', true)->get();
        return view('agents.ajoutAgent',compact('agences'));
    }



    public function create()
    {
        $agences = Agence::all();
       $agents = Agent::with('agences')->orderBy('statutAgent', 'desc')->get();

        return view('agents.listeAgent', compact('agents', 'agences'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'nom'=>'required|min:2|max:20|alpha',
            'prenom'=>'required|min:3|max:50',
            'adresse'=>'required|min:3|max:50',
            'telephone'=>'required|min:9|max:20',
            'date'=>'required|date',
            'mail'=>'required|email',
            'photo'=>'required|image',
            'agence' => 'required|exists:agences,id',
        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }else{
            $nomAgent = $request->input('nom');
            $prenomAgent = $request->input('prenom');
            $nomUn = substr($nomAgent,0,1);
            $prenomUn = substr($prenomAgent,0,1);
            $code = Agent::OrderBy('id', 'desc')->first();
            if($code == null){
                $codeAgent='YM'.$prenomUn.$nomUn.'1';
            } else {
                $codeAgent= 'YM'.$prenomUn.$nomUn.($code->id+1);
            }
            $agent = new Agent;
            $agent->codeAgent = $codeAgent;
            $agent->agence = $request->agence;
            $agent->nomAgent = $request->nom;
            $agent->prenomAgent=$request->prenom;
            $agent->adresseAgent=$request->adresse;
            $agent->telAgent=$request->telephone;
            $agent->dateAdhesion=$request->date;
            $agent->mailAgent=$request->mail;
            $agent->statutAgent= true;
            $agent->photoAgent=$request->photo->store(config("photo.path"), "public");
            $agent->save();
            return redirect()->back()->with('success', 'Enregistrement effectuer avec success');
        }
    }


    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'nom'=>'required|min:2|max:20|alpha',
            'prenom'=>'required|min:3|max:50',
            'adresse'=>'required|min:3|max:50',
            'telephone'=>'required|min:9|max:20',
            'date'=>'required|date',
            'mail'=>'required|email',
            'photo' => 'nullable|mimes:jpg,png',
            'agence' => 'required|exists:agences,id',
        ]);
        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }else{
            $code = $request->input('code');
            $agent = Agent::where('codeAgent', $code)->first();
            if(!$agent){
                return redirect()->back()->with('error', "L'agent avec le code donné n'existe pas.");
            }

            $agent->agence = $request->agence;
            $agent->nomAgent = $request->nom;
            $agent->prenomAgent=$request->prenom;
            $agent->adresseAgent=$request->adresse;
            $agent->telAgent=$request->telephone;
            $agent->dateAdhesion=$request->date;
            $agent->mailAgent=$request->mail;
            if ($request->hasFile('photo')) {
                // Si un fichier a été téléchargé, enregistrez-le
                $agent->photoAgent = $request->photo->store(config("photo.path"), "public");
            }
            $agent->save();
            return redirect()->back()->with('success', 'Modification effectuer avec success');
        }
    }

    // La fonction pour suspendre l'agent
    public function suspendAgent(Request $request){
        $code = $request->input('codeAgentSuspend');
        $agents = Agent::where('codeAgent', $code)->first();
        if (!$agents) {
            return redirect()->back()->with('error', "L'agence avec le code donné n'existe pas.");
        }
        $agents->statutAgent = false;
        $agents->save();
        return redirect()->back()->with('success', "Agent suspendu avec succes");
    }

    // Fonction pour reintegrer l'agent
    public function reintgrerAgent(Request $request){
        $code = $request->input('codeReintegreAgent');
        $agents = Agent::where('codeAgent', $code)->first();
        if (!$agents) {
            return redirect()->back()->with('error', "L'agence avec le code donné n'existe pas.");
        }
        $agents->statutAgent = true;
        $agents->save();
        return redirect()->back()->with('success', "Agent reintegrer avec succes");
    }

    public function search(Request $request){
        // Je recupere la valeur choisi dans le champs select
        $choix = $request->input('choix');

        // Je recupere la valeur qui sera saisi dans le champ filtrer
        $recherche = $request->input('recherche_element');

        $agents = Agent::query();
        $agents->with('agences');
        //Effectuer la recherche en fonction du choix de l'utilisateur
        if($choix === 'identifiant'){
            $agents = Agent::where('codeAgent', 'like', '%' . $recherche .'%');
        }else if($choix==='nom'){
            $agents = Agent::where('nomAgent', 'like', '%' . $recherche . '%');
        }else if($choix === 'prenom'){
            $agents = Agent::where('prenomAgent', 'like', '%' . $recherche . '%');
        }else if($choix === 'adresse'){
            $agents = Agent::where('adresseAgent', 'like', '%' . $recherche . '%');
        }else if($choix === 'agence'){
            $agents = Agent::whereHas('agences', function ($query) use ($recherche){
                $query->where('nomAgence', 'like', '%' . $recherche . '%');
            });
        }else if($choix=='statut'){
            if($recherche == 'En service'){
                $agents->where('statutAgent', true);
            }else if($recherche == 'Suspendu'){
                $agents->where('statutAgent', false);
            }
        }
        else {
             $agents = Agent::with('Agences');
        }

        $agents = $agents->get();
         $agences = Agence::all();

        return view('agents.listeAgent', compact('agents','agences'));
    }
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
