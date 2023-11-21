<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\CotisationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MembreController;
use App\Http\Controllers\PayementCollectiveController;
use App\Http\Controllers\PayementIndividuelleController;
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

Route::post('/tontineCollectifs/historiqueTontine',[TontineCollectiveController::class, 'searchHistoriqueTontineC'])->name('searchHistoriqueTontineC');

Route::get('/tontineCollectifs/listeTontine',[TontineCollectiveController::class, 'createListeTontine'])->name('listeTontine');

Route::get('/tontineCollectifs/gestionTontine',[TontineCollectiveController::class, 'createGestionTontine'])->name('gestionTontine');

Route::post('/tontineCollectifs/gestionTontine/association',[TontineCollectiveController::class, 'associate'])->name('associationTontine');

Route::post('/tontineCollectifs/gestionTontine/payement',[PayementCollectiveController::class, 'store'])->name('payementCollectif');

Route::post('/tontineCollectifs/gestionTontine/list',[TontineCollectiveController::class, 'displayMembre'])->name('displayMembreTontineCollective');


// Les routes pour le versement
Route::get('/payements/ajoutPayement',[VersementController::class, 'createVersement'])->name('ajoutPayement.create');

Route::post('/payements/ajoutPayement/store',[VersementController::class, 'store'])->name('ajoutPayement');

Route::post('/payements/ajoutPayement',[VersementController::class, 'getMembreTontine'])->name('membreTontine');

Route::get('/payements/listePayement',[VersementController::class, 'createListeVersement'])->name('listePayement');

Route::post('/payements/listePayement',[VersementController::class, 'search'])->name('searchVersement');


// Les routes pour cotisations
Route::get('/cotisations/affichCotisation',[CotisationController::class, 'createListe'])->name('afficheCotisation');

Route::get('/cotisations/cotisation',[CotisationController::class, 'createAjout'])->name('cotisation');

Route::post('/cotisations/cotisation/store',[CotisationController::class, 'store'])->name('StoreCotisation');

Route::post('/cotisations/cotisation',[CotisationController::class, 'getTontineIndividuelle'])->name('getTontineIndividuelle');

Route::post('/cotisations/affichCotisation/tontine',[CotisationController::class, 'CotisationByTontine'])->name('cotisationByTontine');

Route::post('/cotisations/affichCotisation/search',[CotisationController::class, 'searchDate'])->name('searchDate');

Route::get('/cotisations/historiqueCotisation',[CotisationController::class, 'createHistorique'])->name('historiqueCotisation');

Route::post('/cotisations/historiqueCotisation',[CotisationController::class, 'searchHistorique'])->name('searchHistorique');

Route::post('/cotisations/info/{id}',[CotisationController::class, 'getCotisationsInfo'])->name('cotisation.info');




// Route pour retourner les tontines dans membres


// Les routes pour les membres
Route::get('/membres/membres',[MembreController::class, 'create'])->name('membre');

Route::get('/membres/modifMembre',[MembreController::class, 'createModif'])->name('modifMembre');


// Pour tontine Individuelle
Route::get('/tontineIndividuelles/ajoutTontineInd',[TontineIndividuelleController::class, 'createTontine'])->name('ajoutTontineInd');

Route::post('/tontineIndividuelles/ajoutTontineInd',[TontineIndividuelleController::class, 'store'])->name('ajoutTontineInd');

Route::post('/tontineIndividuelles/listeTontineInd',[TontineIndividuelleController::class, 'search'])->name('searchTontine');

Route::get('/tontineIndividuelles/historiqueTontineInd',[TontineIndividuelleController::class, 'createHistoriqueTontine'])->name('historiqueTontineInd');

Route::post('/tontineIndividuelles/historiqueTontineInd',[TontineIndividuelleController::class, 'searchHistorique'])->name('searchHistoriqueTontineInd');

Route::get('/tontineIndividuelles/listeTontineInd',[TontineIndividuelleController::class, 'createListeTontine'])->name('listeTontineInd');

Route::get('/TontineIndividuelles/info/{id}',[TontineIndividuelleController::class, 'getInfoTontineIndividuelle'])->name('TontineIndividuelle.info');


Route::post('/TontineIndividuelles/Payement',[PayementIndividuelleController::class, 'payementTontineIndividuelle'])->name('TontineIndividuelle.payement');









