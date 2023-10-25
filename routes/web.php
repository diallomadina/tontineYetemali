<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\CotisationController;
use App\Http\Controllers\HomeController;
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


Route::get('/',[HomeController::class, 'index'])->name('acceuil');


// Les Routes pour les agences
Route::get('/agences/afficherAgence',[AgenceController::class, 'create'])->name('afficherAgence');

Route::post('/agences/afficherAgence',[AgenceController::class, 'search'])->name('searchAgence');

Route::post('/agences/afficherAgence/Arret',[AgenceController::class, 'arretAgence'])->name('arretAgence');

Route::post('/agences/afficherAgence/Activation',[AgenceController::class, 'actifAgence'])->name('actifAgence');

Route::get('/agences/ajoutAgence', [AgenceController::class, 'createAjout'])->name('ajoutAgence');

Route::post('/agences/ajoutAgence', [AgenceController::class, 'store'])->name('storeAgence');

Route::post('/agences/updateAgence', [AgenceController::class, 'update'])->name('updateAgence');

// Les Routes pour les agents
Route::get('/agents/ajoutAgent',[AgentController::class, 'createAjout'])->name('ajoutAgent');

Route::get('/agents/listeAgent',[AgentController::class, 'create'])->name('listeAgent');

Route::post('/agents/listeAgent/Suspendu',[AgentController::class, 'suspendAgent'])->name('suspendAgent');

Route::post('/agents/listeAgent/Reintegre',[AgentController::class, 'reintgrerAgent'])->name('reintgrerAgent');

Route::post('/agents/ajoutAgent',[AgentController::class, 'store'])->name('storeAgent');

Route::post('/agents/listeAgent/Modification',[AgentController::class, 'update'])->name('updateAgent');

Route::post('/agents/listeAgent',[AgentController::class, 'search'])->name('searchAgent');


// Pour Tontine Collectifs
Route::get('/tontineCollectifs/ajoutTontine',[TontineCollectiveController::class, 'createTontine'])->name('ajoutTontine');

Route::post('/tontineCollectifs/ajoutTontine',[TontineCollectiveController::class, 'store'])->name('ajoutTontine');

Route::post('/tontineCollectifs/modification',[TontineCollectiveController::class, 'update'])->name('updateTontineC');

Route::post('/tontineCollectifs/listeTontine',[TontineCollectiveController::class, 'search'])->name('searchTontineC');

Route::get('/tontineCollectifs/historiqueTontine',[TontineCollectiveController::class, 'createHistoriqueTontine'])->name('historiqueTontine');

Route::get('/tontineCollectifs/listeTontine',[TontineCollectiveController::class, 'createListeTontine'])->name('listeTontine');

Route::get('/tontineCollectifs/gestionTontine',[TontineCollectiveController::class, 'createGestionTontine'])->name('gestionTontine');

// Les routes pour le versement
Route::get('/payements/ajoutPayement',[VersementController::class, 'createVersement'])->name('ajoutPayement');

Route::post('/payements/ajoutPayement',[VersementController::class, 'store'])->name('ajoutPayement');

Route::get('/payements/listePayement',[VersementController::class, 'createListeVersement'])->name('listePayement');

Route::post('/payements/listePayement',[VersementController::class, 'search'])->name('searchVersement');


// Les routes pour cotisations
Route::get('/cotisations/affichCotisation',[CotisationController::class, 'createListe'])->name('afficheCotisation');

Route::get('/cotisations/cotisation',[CotisationController::class, 'createAjout'])->name('cotisation');

Route::post('/cotisations/cotisation',[CotisationController::class, 'store'])->name('cotisation');

Route::get('/cotisations/historiqueCotisation',[CotisationController::class, 'createHistorique'])->name('historiqueCotisation');

// Les routes pour les membres
Route::get('/membres/membres',[MembreController::class, 'create'])->name('membre');

Route::get('/membres/modifMembre',[MembreController::class, 'createModif'])->name('modifMembre');


// Pour tontine Individuelle
Route::get('/tontineIndividuelles/ajoutTontineInd',[TontineIndividuelleController::class, 'createTontine'])->name('ajoutTontineInd');

Route::post('/tontineIndividuelles/ajoutTontineInd',[TontineIndividuelleController::class, 'store'])->name('ajoutTontineInd');

Route::get('/tontineIndividuelles/historiqueTontineInd',[TontineIndividuelleController::class, 'createHistoriqueTontine'])->name('historiqueTontineInd');

Route::get('/tontineIndividuelles/listeTontineInd',[TontineIndividuelleController::class, 'createListeTontine'])->name('listeTontineInd');

