<?php

namespace App\Http\Controllers;

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
        return view('tontineIndividuelles.ajoutTontineInd');
    }

    public function createHistoriqueTontine()
    {
        return view('tontineIndividuelles.historiqueTontineInd');
    }

    public function createListeTontine()
    {
        return view('tontineIndividuelles.listeTontineInd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'nom'=>'required',
            'debut'=>'required|date',
            'montant'=>'required|numeric',
           
        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
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
