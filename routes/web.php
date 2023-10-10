<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\CotisationController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\TontineCollectiveController;
use App\Http\Controllers\TontineIndividuelleController;
use App\Http\Controllers\VersementController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('acceuil');
Route::get('/',[AgenceController::class, 'index'])->name('acceuil');


// Les Routes pour les agences
Route::get('/agences/afficherAgence',[AgenceController::class, 'create'])->name('afficherAgence');

Route::get('/agences/ajoutAgence', [AgenceController::class, 'createAjout'])->name('ajoutAgence');

Route::post('/agences/ajoutAgence', [AgenceController::class, 'store'])->name('storeAgence');
Route::post('/agences/updateAgence', [AgenceController::class, 'update'])->name('updateAgence');

// Les Routes pour les agents
Route::get('/agents/ajoutAgent',[AgentController::class, 'createAjout'])->name('ajoutAgent');

Route::get('/agents/listeAgent',[AgentController::class, 'create'])->name('listeAgent');

Route::post('/agents/ajoutAgent',[AgentController::class, 'store'])->name('storeAgent');

Route::post('/agents/listeAgent/Modification',[AgentController::class, 'update'])->name('updateAgent');

Route::get('/agents/listeAgent/search',[AgentController::class, 'search'])->name('searchAgent');




// Les routes pour cotisations
Route::get('/cotisations/affichCotisation',[CotisationController::class, 'createListe'])->name('afficheCotisation');

Route::get('/cotisations/cotisation',[CotisationController::class, 'createAjout'])->name('cotisation');

Route::post('/cotisations/cotisation',[CotisationController::class, 'store'])->name('cotisation');

Route::get('/cotisations/historiqueCotisation',[CotisationController::class, 'createHistorique'])->name('historiqueCotisation');

// Les routes pour les membres
Route::get('/membres/membres',[MembreController::class, 'create'])->name('membre');

Route::get('/membres/modifMembre',[MembreController::class, 'createModif'])->name('modifMembre');

// Les routes pour le versement
Route::get('/payements/ajoutPayement',[VersementController::class, 'createVersement'])->name('ajoutPayement');

Route::post('/payements/ajoutPayement',[VersementController::class, 'store'])->name('ajoutPayement');

Route::get('/payements/listePayement',[VersementController::class, 'createListeVersement'])->name('listePayement');

// Pour Tontine Collectifs
Route::get('/tontineCollectifs/ajoutTontine',[TontineCollectiveController::class, 'createTontine'])->name('ajoutTontine');

Route::post('/tontineCollectifs/ajoutTontine',[TontineCollectiveController::class, 'store'])->name('ajoutTontine');

Route::get('/tontineCollectifs/historiqueTontine',[TontineCollectiveController::class, 'createHistoriqueTontine'])->name('historiqueTontine');

Route::get('/tontineCollectifs/listeTontine',[TontineCollectiveController::class, 'createListeTontine'])->name('listeTontine');

Route::get('/tontineCollectifs/gestionTontine',[TontineCollectiveController::class, 'createGestionTontine'])->name('gestionTontine');

// Pour tontine Individuelle
Route::get('/tontineIndividuelles/ajoutTontineInd',[TontineIndividuelleController::class, 'createTontine'])->name('ajoutTontineInd');

Route::post('/tontineIndividuelles/ajoutTontineInd',[TontineIndividuelleController::class, 'store'])->name('ajoutTontineInd');

Route::get('/tontineIndividuelles/historiqueTontineInd',[TontineIndividuelleController::class, 'createHistoriqueTontine'])->name('historiqueTontineInd');

Route::get('/tontineIndividuelles/listeTontineInd',[TontineIndividuelleController::class, 'createListeTontine'])->name('listeTontineInd');

