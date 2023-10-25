<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Agent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $nombreAgence = Agence::count();

        $nombreAgent = Agent::count();
        return view('index', compact('nombreAgent', 'nombreAgence'));
    }
}
