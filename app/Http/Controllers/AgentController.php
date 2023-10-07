<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgentController extends Controller
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
    public function createAjout()
    {
        return view('agents.ajoutAgent');
    }

    public function create()
    {

        return view('agents.listeAgent');
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
            'mail'=>'required|mail',
            'photo'=>'required|image',
        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }else{
            
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
