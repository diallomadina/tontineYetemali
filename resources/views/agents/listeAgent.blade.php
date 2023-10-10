@extends('master.layout')
@section('content')
<!-- Debut du main -->
<main class="main" id="main">
  <div class="pagetitle">
    <h1>Liste des Agents</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
        <li class="breadcrumb-item">Agents</li>
        <li class="breadcrumb-item active">Liste</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
      <div class="row">
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
                <form action="{{ route('searchAgent') }}" method="GET" form-inline bg-light">
                    @csrf
                      <div class="row">
                        <div class="col-sm"><label for="txtRechercheAgentIdentifiant" class="form-label">Effectuez une recherche</label></div>
                        <div class="col-sm"></div>
                        <div class="col-sm"></div>
                        <div class="col-sm"></div>
                      </div>
                      <div class="row">
                          <div class="col-sm">
                          <div class="form-group">
                              <div class="col">
                                  <select name="choix" id="selectRechercheAgentsation" class="form-select">
                                    <option value="" selected>Choissisez une option</option>
                                    <option value="identifiant">Identifiant</option>
                                    <option value="nom">Nom</option>
                                    <option value="prenom">Prenom</option>
                                    <option value="adresse">Adresse</option>
                                    <option value="agence">Agence</option>
                                  </select>
                              </div>
                          </div>
                          </div>
                          <div class="col-sm">
                              <div class="form-group">

                              <input name="txtRecherche" type="text" class="form-control bi bi-search" id="txtRechercheAgent">
                              </div>
                          </div>
                          <div class="col-sm">
                            <div class="form-group">
                              <div class="col-sm">
                                <button name="filtrer" id="btnSearchAgent" type="submit" class="form-control bg-warning-light text-center">
                                    <i class="bi bi-filter"></i>Filtrer
                                </button>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm">
                          <div class="form-group">
                            <div class="col-sm">
                              <a href="{{ route('listeAgent') }}">
                                <button name="actualiser" type="submit" class="btn form-control bg-warning-light text-center">
                                    <i class="bi bi-repeat"></i>Actualiser
                                </button>
                              </a>
                            </div>
                          </div>
                        </div>
                          <!-- Colonne pour bouton ajouter -->
                          <div class="col-sm ">
                            <div class="form-group">
                                <button id="btnNewAgent" type="button" class="bg-warning-light text-center form-control"  data-bs-toggle="modal" data-bs-target="#modalAjoutAgentsation">
                                  <i class="bi bi-plus"></i> Nouveau
                                  </button>
                            </div>

                          </div>
                          <!-- Fin pour ajouter  -->
                          <div class="col-sm ">
                            <button id="btnPrintAgent" type="button" class="form-control bg-warning-light text-center">
                                <i class="bi bi-printer"></i>Imprimer
                            </button>
                          </div>
                      </div>

                      <div class="row mt-4">
                          <!-- Table -->
                        <table id="tableAffichageAgent" class="table text-center table-bordered table-responsive table-compressed table-hover table-striped">
                            <thead class="bg-success">
                              <tr class="bg-success">
                                    <th class="text-center bg-success text-white">#</th>
                                    <th class="text-center bg-success text-white">Code</th>
                                    <th class="text-center bg-success text-white">Photo</th>
                                    <th class="text-center bg-success text-white">Nom</th>
                                    <th class="text-center bg-success text-white">Prenom</th>
                                    <th class="text-center bg-success text-white">Adreese</th>
                                    <th class="text-center bg-success text-white">Contact</th>
                                    <th class="text-center bg-success text-white">Mail</th>
                                    <th class="text-center bg-success text-white">Date</th>
                                    <th class="text-center bg-success text-white">Agence</th>
                                    <th class="text-center bg-success text-white">Action</th>
                              </tr>
                            </thead>
                            <tbody id="tbodyAfficheIdentifiant">
                                <?php $i=1; ?>
                                @foreach ($agents as $agent)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $agent->codeAgent }}</td>
                                        <td><img src="{{asset('app/public/'. $agent->photoAgent)}}" height="50" width="50" alt="" class="fa-photo"></td>
                                        <td>{{ $agent->nomAgent }}</td>
                                        <td>{{ $agent->prenomAgent }}</td>
                                        <td>{{ $agent->adresseAgent }}</td>
                                        <td>{{ $agent->telAgent }}</td>
                                        <td>{{ $agent->mailAgent }}</td>
                                        <td>{{ $agent->dateAdhesion }}</td>
                                        <td>{{ $agent->Agences->nomAgence }}</td>
                                        <td class='btnCoti'><a  class='btn btn-transparent editAgent'  data-bs-toggle='modal' data-bs-target='#modalModifAgent' data-bs-placement='bottom' title='Modifier'><i class='bi bi-pen'></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                              <!-- End Table  -->
                      </div>

              </form>


      </div>
      <div class="row mt-5">


                  <!-- Le modal pour ajouter -->
                  <div class="modal fade" id="modalAjoutAgentsation" tabindex="-1">
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
                                  <form method="post" action="{{ route('storeAgent') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                      <div class="col">
                                          <label class=" text-center fs-5">Agence</label>

                                          <select name="agence" class="form-select border-secondary" aria-label="Default select example">
                                            @foreach ($agences as $agence)
                                                <option value="{{ $agence->id }}">{{ $agence->nomAgence }}</option>
                                             @endforeach
                                          </select>
                                      </div>

                                      <div class="col">
                                          <label class=" text-center fs-5">Nom</label>
                                          <div class="col">
                                            <input name="nom" type="text" class="form-control border-secondary">
                                          </div>
                                      </div>


                                    </div>


                                    <div class="row mb-3">
                                        <div class="col">
                                          <label class=" text-center fs-5">Prenom</label>
                                          <input name="prenom" type="text" class="form-control border-secondary">
                                        </div>
                                        <div class="col">
                                          <label class="  text-center fs-5">Adresse</label>
                                          <input name="adresse" type="text" class="form-control border-secondary">
                                        </div>

                                    </div>



                                        <div class="row mb-3">
                                            <div class="col">
                                            <label class=" text-center fs-5">Telephone</label>
                                            <input name="telephone" type="number" class="form-control border-secondary">
                                            </div>
                                            <div class="col">
                                                <label class=" text-center fs-5">Date d'inscription</label>
                                                <input name="date"  type="date" class="form-control border-secondary">

                                            </div>


                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label class=" fs-5">Mail</label>
                                                <input name="mail" type="mail" class="form-control border-secondary">
                                            </div>
                                            <div class="col">
                                            <label for="" class=" text-center fs-5">Photo</label>
                                            <input type="file" name="photo" id="" accept=".jpg, .png" class="form-control border-secondary">
                                            </div>
                                        </div>

                                    <div class="modal-footer">
                                      <button name ="ajouter" type="submit" class="btn btn-success boutton">Valider</button>
                                      <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fermer</button>
                                      </div>

                                  </form><!-- End General Form Elements -->
                                </div>

                              </div>
                            </div>
                          </div>
                          <!-- Fin Modal pour ajouter -->


              <!-- Debut modal pour Modification -->
              <div class="modal fade" id="modalModifAgent" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header text-center">

                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                      <div class="d-flex justify-content-center">
                        <a href="#" class="logo d-flex align-items-center w-auto">
                          <img src="assets/img/yetemali.jpg" alt="">
                          <span class="d-none d-lg-block text-success">Yete</span>
                          <span class="d-none d-lg-block text-warning">mali</span>
                        </a>
                      </div>
                      <!-- General Form Elements -->

                            <!-- Partie de l'ajout -->
                          <div class="card rounded-4">
                            <h1 class="card-title rounded-4 text-center text-black fs-1 fw-3 bg-warning-light">Modification</h1>
                            <div class="card-body">

                            <form method="post" action="{{ route('updateAgent') }}" enctype="multipart/form-data">
                                @csrf
                                    <input type="hidden" id="code" name="code">
                                    <div class="row mb-3">
                                      <div class="col">
                                          <label class=" text-center fs-5">Agence</label>

                                          <select name="agence" id="agence" class="form-select border-secondary" aria-label="Default select example">
                                            @foreach ($agences as $agence)
                                                <option value="{{ $agence->id }}">{{ $agence->nomAgence }}</option>
                                             @endforeach
                                          </select>
                                      </div>

                                      <div class="col">
                                          <label class=" text-center fs-5">Nom</label>
                                          <div class="col">
                                            <input name="nom" id="nom" type="text" class="form-control border-secondary">
                                          </div>
                                      </div>


                                    </div>


                                    <div class="row mb-3">
                                        <div class="col">
                                          <label class=" text-center fs-5">Prenom</label>
                                          <input name="prenom" id="prenom" type="text" class="form-control border-secondary">
                                        </div>
                                        <div class="col">
                                          <label class="  text-center fs-5">Adresse</label>
                                          <input name="adresse" id="adresse" type="text" class="form-control border-secondary">
                                        </div>

                                    </div>



                                    <div class="row mb-3">
                                        <div class="col">
                                            <label class=" text-center fs-5">Telephone</label>
                                            <input name="telephone" id="telephone" type="number" class="form-control border-secondary">
                                        </div>
                                        <div class="col">
                                            <label class=" text-center fs-5">Date d'inscription</label>
                                            <input name="date" id="date" type="date" class="form-control border-secondary">

                                        </div>


                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <label class=" fs-5">Email</label>
                                            <input name="mail" id="mail" type="mail" class="form-control border-secondary">
                                        </div>
                                        <div class="col">
                                            <label for="" class=" text-center fs-5">Photo</label>
                                            <input type="file" name="photo" accept=".jpg, .png" class="form-control border-secondary">
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                      <button name ="modifier" type="submit" class="btn btn-success boutton">Modifier</button>
                                      <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fermer</button>
                                    </div>

                                  </form><!-- End General Form Elements -->

                            </div>
                          </div>


                    </div>

                </div>
              </div>

          <!-- modal de confirmation de suppression -->
          <div class="modal fade" id="modalSuppressionAgent" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title fw-bold">Confirmation</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center fw-bold">
                  Voulez-vous vraiment supprimer l'agence?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                  <button type="button" class="btn btn-danger">Supprimer</button>
                </div>
              </div>
            </div>
          </div>
            <!--Fin modal de confirmation de suppression -->
      </div>
</main>
<!-- Fin du main -->
@endsection

<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script>
    $(document).ready(function () {
    var tableAffichageAgent = document.getElementById('tableAffichageAgent');

      function editerAgent() {
          for (var i = 0; i < tableAffichageAgent.rows.length; i++) {
              tableAffichageAgent.rows[i].onclick = function () {
                  document.getElementById("code").value = this.cells[1].innerHTML;
                  document.getElementById("nom").value = this.cells[3].innerHTML;
                  document.getElementById("prenom").value = this.cells[4].innerHTML;
                  document.getElementById("adresse").value = this.cells[5].innerHTML;
                  document.getElementById("telephone").value = this.cells[6].innerHTML;
                  document.getElementById("mail").value = this.cells[7].innerHTML;
                  document.getElementById("date").value = this.cells[8].innerHTML;
                  document.getElementById("photo").value = ''; // Réinitialiser le champ de fichier
                var photoPath = this.cells[2].getElementsByTagName("img")[0].src;
                document.getElementById("photo").value = photoPath;

                  // Sélectionner la valeur dans le champ de sélection "mMembre"
            var membreText = this.cells[9].innerHTML; // Contenu de la cellule "Membre"
            var selectMembre = document.getElementById("agence");

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

      $('.editAgent').click(function (e) {
          e.preventDefault();
          editerAgent();
      });
  });
</script>
<!-- End #main -->


