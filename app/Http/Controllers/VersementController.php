<?php

namespace App\Http\Controllers;

use App\Models\Membre;
use App\Models\Participation;
use App\Models\TontineCollective;
use App\Models\Versement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VersementController extends Controller
{



    public function createVersement()
    {
        $tontinesC = TontineCollective::where('statutTontineC', null)->orWhere('statutTontineC', true)->get();
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
            'tontine'=>'required|numeric',
            'membre'=>'required|numeric',
            'date'=>'required|date',

        ]);

        if($validation->fails()){
            if ($request->ajax()) {
                return response()->json(['errors' => $validation->errors()], 422);
            } else {
                return redirect()->back()->withErrors($validation)->withInput();
            }
        }else{
            $nomMembre = Membre::all()->where('id', $request->membre)->first();
            $code = Versement::OrderBy('id', 'desc')->first();
            if($code == null){
                $codeVersement = 'YMVTC1';
            }else {
                $codeVersement = 'YMVTC'.($code->id+1);
            }
            $idTonitne = $request->tontine;
            $tontine = TontineCollective::find($idTonitne);

            $montant = $tontine->montant;
            $versements = new Versement;
            $versements->codeVersement = $codeVersement;
            $versements->montantVersement = $montant;
            $versements->dateVersement = $request->date;
            $versements->tontine = $idTonitne;
            $versements->membre = $request->membre;
            $versements->save();
            $firstVersement = Versement::where('tontine', $idTonitne);
            if($firstVersement){
                $tontine->statutTontineC = true;
                $tontine->save();
            }
            return redirect()->back()->with('success','Versement effectuer avec succes');


        }
    }

    public function getMembreTontine(Request $request){
        $tontineId = $request->input('tontine');
        $participations = Participation::where('tontine', $tontineId)->with('membres')->get();

        $membres = $participations->toArray();

        return response()->json(['participations' => $membres]);
    }

    public function search(Request $request){
        $choix = $request->input('choix');
        $recherche = $request->input('txtRecherche');
        $periode = $request->input('periode');
        $date1 = $request->input('date1');
        $date2 = $request->input('date2');
        $annee = $request->input('annee');
        $mois = $request->input('mois');
        $versements = Versement::query();
        $versements->with('tontinesC', 'membres');
        if(!empty($choix) && $choix !== null && !empty($recherche)){
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
        }

        if(!empty($periode) && $periode !== null){
            if($periode === 'date_unique'){
                $versements->whereDate('dateVersement', '=', $date1);
            }elseif($periode === 'plage_dates'){
                $versements->whereBetween('dateVersement', [$date1, $date2]);
            }elseif($periode=== 'annee'){
                $versements->whereYear('dateVersement', $annee);
            }elseif($periode === 'mois'){
                if(!empty($annee) && $annee !== null){
                    $versements->whereYear('dateVersement', $annee)->whereMonth('dateVersement', $mois);
                }
                $versements->whereMonth('dateVersement', $mois);
            }
        }
        $versements = $versements->get();
        $tontinesC = TontineCollective::all();
        $membres = Membre::all();
        return view('versements.listePayement', compact('versements','tontinesC','membres'));
    }


}
