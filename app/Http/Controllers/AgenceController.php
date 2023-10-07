<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Agence;
class AgenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nombreAgence = Agence::count();
        
        return view('index', ['nombreAgences' =>$nombreAgence]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agences = Agence::all();
        return view('agences.afficherAgence',compact('agences'));
    }

    public function createAjout()
    {
        return view('agences.ajoutAgence');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'nomAgence'=>'required|min:3|max:70',
            'adresseAgence'=>'required|min:3|max:40',
            'telAgence'=>'required|min:9|max:20|',
            'mailAgence'=>'required|email',
        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }else {
            $code = Agence::OrderBy('id', 'desc')->first();
            $codeAgence = 'YMAG'.$code->id+1;

            $Agence = new Agence;
            $Agence->codeAgence = $codeAgence;
            $Agence->nomAgence = $request->input('nomAgence');
            $Agence->adresseAgence = $request->input('adresseAgence');
            $Agence->telAgence = $request->input('telAgence');
            $Agence->mailAgence= $request->input('mailAgence');
            $Agence->save();
            return redirect()->back()->with('message', "Enregistrement effectuee avec success");
        }
    }

    /**
     * Display the specified resource.
     */
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
