@extends('master.layout')
@section('content')
<!-- Debut du main -->
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Historique des tontines individuelles</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="../../index.php">Acceuil</a>
          </li>
          <li class="breadcrumb-item active">Historique</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <!-- Contenue de la page -->
    <div class="container">
        <form action="{{ route('searchHistoriqueTontineInd') }}" method="post">
            @csrf
            <div class="row mb-2">
                <div class="col">
                    <select name="periode" id="" class="form-select border-secondary">
                        <option value="">Choisir une periode</option>
                        <option value="date_unique">Une date</option>
                        <option value="plage_dates">Plages de date</option>
                        <option value="annee">Annee</option>
                        <option value="mois">Mois</option>
                    </select>
                </div>
                <div class="col">
                    <input type="date" name="date1" id="" class="form-control border-secondary">
                </div>
                <div class="col">
                    <input type="date" name="date2" id="" class="form-control border-secondary">
                </div>
                <div class="col">
                    <select name="mois" id="mois" class="form-select border-secondary">
                        <option value="">Choisissez le mois</option>
                        <option value="01">Janvier</option>
                        <option value="02">Fevrier</option>
                        <option value="03">Mars</option>
                        <option value="04">Avril</option>
                        <option value="05">Mai</option>
                        <option value="06">Juin</option>
                        <option value="07">Juillet</option>
                        <option value="08">Aout</option>
                        <option value="09">Septembre</option>
                        <option value="10">Octobre</option>
                        <option value="11">Novembre</option>
                        <option value="12">Decembre</option>
                    </select>
                </div>
                <div class="col">
                    <input type="text" name="annee" class="form-control border-secondary" placeholder="Saisissez l'annee">
                </div>

            </div>
            <div class="row">

                <div class="col">
                  <select name="choix" id="sldTontineCours" class="form-select border-secondary">
                      <option value="" selected>Choisir une option</option>
                      <option value="identifiant">Identifiant</option>
                      <option value="nom">nom</option>
                      <option value="montant">Montant</option>
                      <option value="membre">Membre</option>
                      <option value="agent">Agent</option>
                      <option value="statut">Statut</option>
                  </select>
                </div>
                <div class="col">
                  <input type="text" name="txtRecherche" class="form-control border-secondary" placeholder="Saisissez votre text de recherche">
                </div>
                <div class="col">
                  <button type="submit" class="form-control border-secondary bg-warning-light">
                    <i class="bi bi-filter"></i>Filtrer
                  </button>
                </div>
                <div class="col">
                  <button type="submit" class="form-control border-secondary bg-warning-light">
                    <i class="bi bi-arrow-repeat"></i>Actualiser
                  </button>
                </div>

                <div class="col">
                  <button type="button" class="form-control border-secondary bg-warning-light">
                    <i class="bi bi-printer"></i>Imprimer
                  </button>
                </div>
              </div>

              <!-- Partie du tableau -->
              <div class="row mt-3">
                <table id="tableAffichageCoti" class="text-center table table-bordered table-responsive table-compressed table-hover table-striped">
                  <thead class="bg-success">
                     <tr class="bg-success">
                           <th class="text-center bg-success text-white">N°</th>
                           <th class="text-center bg-success text-white">Identifiant</th>
                           <th class="text-center bg-success text-white">Nom</th>
                           <th class="text-center bg-success text-white">Date de debut</th>
                           <th class="text-center bg-success text-white">Montant</th>
                           <th class="text-center bg-success text-white">Membre</th>
                           <th class="text-center bg-success text-white">Agent</th>
                           <th class="text-center bg-success text-white">Cotisations</th>
                           <th class="text-center bg-success text-white">Total</th>
                           <th class="text-center bg-success text-white">Statut</th>
                           <th class="text-center bg-success text-white">Voir</th>
                     </tr>
                  </thead>
                  <tbody>
                    @foreach ($tontines as $tontine)
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>{{ $tontine->codeTontineI }}</td>
                            <td>{{ $tontine->nomTontineI }}</td>
                            <td>{{ $tontine->debutTontineI }}</td>
                            <td>{{ $tontine->montantTontineI }}</td>
                            <td>{{ $tontine->membres->nomMembre.' '.$tontine->membres->prenomMembre }}</td>
                            <td>{{ $tontine->agents->nomAgent.' '.$tontine->agents->prenomAgent }}</td>
                            <td>{{ count($tontine->cotisations) }}</td>
                            <td>{{ $tontine->cotisations->sum('montantCotisation') }}</td>
                            <td>
                                @if ($tontine->statutTontinteI === null)
                                    Non debuté
                                    @elseif ($tontine->statutTontinteI === 1)
                                    En cours
                                    @elseif ($tontine->statutTontinteI === 0)
                                    Terminé
                                @endif
                            </td>
                            <td class="btnCoti">
                                <a href='#'  class='btn btn-transparent voirTontineI'  data-bs-toggle='modal' data-bs-target='#modalvoirTontineI' data-bs-placement='bottom' title='Voir'><i class='bi bi-eye'></i></a>
                            </td>
                        </tr>
                    @endforeach

                  </tbody>
              </table>
              </div>
        </form>
    </div>



  <!-- Debut Modal pour Voir le suivi -->
  <div class="modal fade" id="modalvoirTontineI" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <h3 class="text-center">Suivie de cette tontine</h3>
                      <p><span class="fw-bold ms-3">Nom et Prenom: </span> <span id="afficheNomPrenomSuiviCoti">Diallo Ibrahima</span></p>
                      <p><span class="fw-bold ms-3">Telephone: </span> <span id="afficheTelSuiviCoti">61378198371/641176176</span></p>
                      <p><span class="fw-bold ms-3">Adresse: </span> <span id="afficheAdresseSuiviCoti">Bambeto</span></p>

                      <section id="cld">
                        <p><span class="fw-bold ms-3 ">Mois: </span> <span id="cldt">Janvier</span></p>
                        <section id="cldBoite" class="container text-center">
                          <div class="row bg-success text-white fw-blod m-1" id="jours">
                            <div class="col jour">lun</div>
                            <div class="col jour">mar</div>
                            <div class="col jour">mer</div>
                            <div class="col jour">jeu</div>
                            <div class="col jour">ven</div>
                            <div class="col jour">sam</div>
                            <div class="col jour">dim</div>
                          </div>

                          <div id="semaine1" class="row bg-light m-1 border-secondary semaine">
                            <div class="col case">1</div>
                            <div class="col case">1</div>
                            <div class="col case">1</div>
                            <div class="col case">1</div>
                            <div class="col case">1</div>
                            <div class="col case">1</div>
                            <div class="col case">1</div>
                          </div>
                          <div id="semaine2" class="row bg-light m-1 border-secondary semaine">
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                          </div>
                          <div id="semaine3" class="row bg-light m-1 border-secondary semaine">
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                          </div>
                          <div id="semaine4" class="row bg-light m-1 border-secondary semaine">
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                          </div>
                          <div id="semaine5" class="row bg-light m-1 border-secondary semaine">
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                          </div>
                          <div id="semaine6" class="row bg-light m-1 border-secondary semaine">
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                          </div>
                          <div id="semaine7" class="row bg-light m-1 border-secondary semaine">
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                            <div class="col case"></div>
                          </div>
                        </section>
                      </section>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-success boutton">Valider</button>
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fermer</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Fin modal pour voir suivi -->
</main>
<!-- Fin du main -->
@endsection



