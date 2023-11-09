@extends('master.layout')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Tontine Individuelle</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="../../index.php">Acceuil</a>
          </li>
          <li class="breadcrumb-item active"> Liste des tontines individuelle</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <!-- Contenue de la page -->
    <div class="container">
        <div class="row">
            <div class="col">
              <div class="col messages">
                  @if(Session::has('success'))
                      <div class="alert alert-success text-center fw-bold fs-24">
                          {{ Session::get('success') }}
                      </div>
                  @endif

                  @if(Session::has('error'))
                      <div class="alert alert-danger">
                          {{ Session::get('error') }}
                      </div>
                  @endif

                  @if($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
              </div>
            </div>
          </div>
        <form action="{{ route('searchTontine') }}" method="post">
            @csrf
        <div class="row">
          <div class="col">
            <select name="choix" id="sldTontineCours" class="form-select border-secondary">
                <option value="" selected>Choisissez l'option</option>
                <option value="identifiant">Identifiant</option>
                <option value="nom">nom</option>
                <option value="montant">Montant</option>
                <option value="membre">Membre</option>
                <option value="agent">Agent</option>
            </select>
          </div>
          <div class="col">
            <input type="text" name="txtRecherhce" class="form-control border-secondary">
          </div>
          <div class="col">
            <button type="submit" class="form-control border-secondary bg-warning-light">
              <i class="bi bi-filter"></i>Filtrer
            </button>
          </div>
          <div class="col">
            <a href="{{ route('listeTontineInd') }}">
                <button type="submit" class="form-control border-secondary bg-warning-light">
                    <i class="bi bi-arrow-repeat"></i>Actualiser
                  </button>
            </a>
          </div>
          <div class="col">
            <button type="button" class="form-control border-secondary bg-warning-light"data-bs-toggle="modal" data-bs-target="#modalAjoutTontine">
              <i class="bi bi-plus"></i>Nouveau
            </button>
          </div>
          <div class="col">
            <button type="button" class="form-control border-secondary bg-warning-light">
              <i class="bi bi-printer"></i>Imprimer
            </button>
          </div>
        </div>

        <!-- Partie du tableau -->
        <div class="row mt-5">
          <table id="tableTontineInd" class="table table-bordered table-responsive table-compressed table-hover table-striped">
            <thead class="bg-success">
               <tr class="bg-success">
                     <th class="text-center bg-success text-white">N°</th>
                     <th class="text-center bg-success text-white">Identifiant</th>
                     <th class="text-center bg-success text-white">Nom</th>
                     <th class="text-center bg-success text-white">Date de debut</th>
                     <th class="text-center bg-success text-white">Montant</th>
                     <th class="text-center bg-success text-white">Membre</th>
                     <th class="text-center bg-success text-white">Agent</th>
                     <th class="text-center bg-success text-white">Voir</th>
                     <th class="text-center bg-success text-white">Payer</th>
               </tr>
            </thead>
            <tbody>
                @foreach ($tontinesI as $tontine)
                    <tr>
                        <td>{{ $loop->iteration  }}</td>
                        <td>{{ $tontine->codeTontineI }}</td>
                        <td>{{ $tontine->nomTontineI }}</td>
                        <td>{{ $tontine->debutTontineI }}</td>
                        <td>{{ $tontine->montantTontineI }}</td>
                        <td>{{ $tontine->membres->nomMembre.' '.$tontine->membres->prenomMembre }}</td>
                        <td>{{ $tontine->agents->nomAgent.' '.$tontine->agents->prenomAgent }}</td>
                        <td class="btnCoti">
                            <a href='#'  class='btn btn-transparent voirTontineI'  data-bs-toggle='modal' data-bs-target='#modalvoirTontineI' data-bs-placement='bottom' title='Voir'><i class='bi bi-eye'></i></a>
                        </td>
                        <td style="width: 50px">
                            <a href="" class="btn btn-success">Payer</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        </form>
    </div>

    <div class="modal fade" id="modalAjoutTontine" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header text-center">

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body">

            <div class="d-flex justify-content-center py-4">
              <a href="#" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/yetemali.jpg" alt="">
                <span class="d-none d-lg-block text-success">Yete</span>
                <span class="d-none d-lg-block text-warning">mali</span>
              </a>
            </div>
            <!-- General Form Elements -->
             <!-- General Form Elements -->
             <form method="post" action="{{ route('ajoutTontineInd') }}">
                @csrf

                <div class="row mb-3">
                    <label class="ms-3 fs-5">Agent</label>
                    <div class="input-group">
                          <input type="text" id="searchAgent" class="form-control border-secondary ms-3" placeholder="Recherher l'agent">
                          <select name="agent" id="agent" class="form-select border-secondary" aria-label="Default select example">
                                <option value="">Cliquez pour choisir</option>
                                @foreach ($agents as $agent)
                                    <option value="{{ $agent->id }}">{{ $agent->nomAgent.' '.$agent->prenomAgent }}</option>
                                @endforeach
                          </select>

                    </div>

                </div>

                <div class="row mb-3 mt-4">
                  <label class="fs-5 ms-3">Membre</label>
                  <div class="input-group">
                    <input type="text" id="searchMembre" class="form-control border-secondary ms-3 mr-3" placeholder="Recherhcher le membre">
                    <select name="membre" id="membre" class="form-select border-secondary" aria-label="Default select example">
                        <option value="">Cliquez pour choisir</option>
                        @foreach ($membres as $membre)
                            <option value="{{ $membre->id }}">{{ $membre->nomMembre.' '.$membre->prenomMembre.' ('.$membre->codeMembre.')' }}</option>
                        @endforeach
                    </select>

                  </div>

                </div>

                  <div class="form-group">
                    <div class="row mb-3">
                      <label class=" fs-5 ms-3">Nom</label>
                        <div class="row">
                            <div class="col-12">
                                <input name="nom" id="nom" type="text" class="form-control border-secondary ms-3">
                            </div>

                        </div>

                    </div>


                  </div>

                  <div class="form-group">
                    <div class="row mb-3">
                      <label class="ms-3 fs-5">Debut</label>
                      <div class="row">
                            <div class="col-12">
                                <input name="debut" id="debut" type="date" class="form-control border-secondary ms-3">
                            </div>
                      </div>

                    </div>


                  </div>

                  <div class="form-group">
                    <div class="row mb-3">
                      <label class="ms-3 fs-5">Montant</label>
                      <div class="row">
                        <div class="col-12">
                            <input name="montant" id="montant" type="number" class="form-control border-secondary ms-3">
                        </div>
                      </div>
                    </div>


                  </div>

                  <div class="row mb-3">
                      <div class="col"></div>
                      <div class="col">
                        <button name="btnValider" type="submit" class="btn btn-success form-control">Valider</button>
                      </div>
                      <div class="col">
                        <button name="btnAnulle" id="bntAnnulee" type="button" class="btn btn-danger form-control">Annulée</button>
                      </div>
                      <div class="col"></div>
                  </div>

              </form><!-- End General Form Elements -->
          </div>

        </div>
      </div>
  </div>
    <!-- Fin Modal pour ajouter -->


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
@endsection


<script>
  $(document).ready(function () {
    var tableTontineInd = document.getElementById('tableTontineInd');

      function editerInfoTontineInd() {
          for (var i = 0; i < tableTontineInd.rows.length; i++) {
              tableTontineInd.rows[i].onclick = function () {
                  document.getElementById("idTontineInd").value = this.cells[1].innerHTML;
                  document.getElementById("mNom").value = this.cells[2].innerHTML;
                  document.getElementById("mDebut").value = this.cells[3].innerHTML;
                  document.getElementById("mMontant").value = this.cells[4].innerHTML;
                  // Sélectionner la valeur dans le champ de sélection "mMembre"
            var membreText = this.cells[5].innerHTML; // Contenu de la cellule "Membre"
            var selectMembre = document.getElementById("mMembre");

            // Parcourir les options du champ de sélection et sélectionner la correspondante
            for (var j = 0; j < selectMembre.options.length; j++) {
                if (selectMembre.options[j].text === membreText) {
                    selectMembre.selectedIndex = j;
                    break; // Sortir de la boucle dès que la correspondance est trouvée
                }
               }
            };
          }
      }

      $('.editTontineInd').click(function (e) {
          e.preventDefault();
         editerInfoTontineInd();
      });
  });
</script>



