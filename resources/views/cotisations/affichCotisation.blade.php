@extends('master.layout')
@section('content')
<!-- Debut du main -->
<main class="main" id="main">
  <div class="pagetitle">
    <h1>Liste des Cotisations</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
        <li class="breadcrumb-item">Cotisations</li>
        <li class="breadcrumb-item active">Liste</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="container">
                        <div class="row">
                          <div class="col">

                          </div>
                        </div>
        <div class="row acacher">
            <form action="" class="form-inline bg-light">
                  <div class="row">

                    <div class="col-sm">
                          <div class="col">
                            <label for="">Selectionner la tontine</label>
                            <div class="input-group">
                                <input type="text" class="form-control border-secondary">
                                <select name="tontine"  class="form-select border-secondary">

                                </select>
                            </div>
                          </div>
                    </div>

                    <div class="col-sm-2 ">
                        <label for=""></label>
                        <button id="btnAfficheCoti" type="button" class="form-control bg-warning-light text-center">
                            <i class="bi bi-list"></i>Afficher
                        </button>
                    </div>
                    <div class="col-sm"></div>
                  </div>


                  <div class="row mt-3">

                      <div class="col-sm">
                          <div class="form-group">
                          <label for="">Rechercher une date</label>
                          <input type="date" class="form-control" id="txtRechercheCoti">
                          </div>
                      </div>
                      <div class="col-sm">
                        <div class="form-group">
                            <label for="form-label"></label>
                            <button id="btnSearchCoti" type="button" class="form-control bg-warning-light text-center">
                                <i class="bi bi-filter"></i>Filtrer
                            </button>
                        </div>
                      </div>
                      <div class="col-sm ">
                        <label for=""></label>
                        <button id="btnActualiseCoti" type="button" class="form-control bg-warning-light text-center">
                            <i class="bi bi-repeat"> </i>Actualiser
                        </button>
                      </div>
                      <!-- Colonne pour bouton ajouter -->
                      <div class="col-sm ">
                        <div class="form-group">
                            <label for=""></label>
                            <button id="btnNewCoti" type="button" class=" bg-warning-light text-center form-control"  data-bs-toggle="modal" data-bs-target="#modalAjoutCotisation">
                              <i class="bi bi-plus"></i>Nouveau
                              </button>
                        </div>
                      </div>
                      <!-- Fin pour ajouter  -->
                      <div class="col-sm ">
                        <label for=""></label>
                        <button id="btnPrintCoti" type="button" class=" form-control bg-warning-light text-center">
                            <i class="bi bi-printer"></i>Imprimer
                        </button>
                      </div>
                  </div>

      </form>
  </div>
  <div id="blocTable" class="row mt-5 ">
      <!-- Table -->
        <table id="tableAffichageCoti" class="table text-center table-bordered table-responsive table-compressed table-hover table-striped">
          <thead class="bg-success">
              <tr class="bg-success">
                    <th class="text-center bg-success text-white">N°</th>
                    <th class="text-center bg-success text-white">Code</th>
                    <th class="text-center bg-success text-white">Tontine</th>
                    <th class="text-center bg-success text-white">Membre</th>
                    <th class="text-center bg-success text-white">Montant</th>
                    <th class="text-center bg-success text-white">Date</th>

              </tr>
          </thead>
          <tbody id="tbodyAfficheTontine">
               
          </tbody>
      </table>
            <!-- End Table  -->


            <!-- Le modal pour ajouter -->
         <div class="modal fade" id="modalAjoutCotisation" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h2 class="text-center">Ajout d'une cotisation</h2>
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
                    <form method="post" action="{{ route('cotisation') }}">
                        @csrf
                        <div class="row">
                          <div class="col">

                          </div>
                        </div>
                        <div class="row mb-4">
                          <label class="col fs-5 ms-3">Tontine</label>
                          <div class="row">
                            <div class="input-group ms-3">
                                <input type="text" id="searchTontine" class="form-control border-secondary " placeholder="Rechercher une tontine">
                                <select name="tontine" class="form-select border-secondary" aria-label="Default select example">
                                    <option value="0" selected>Cliquez pour choisir</option>

                                </select>
                            </div>
                          </div>

                        </div>
                          <div class="row mb-4">
                              <label class="col fs-5 ms-3">Membre</label>
                              <div class="row">
                                    <div class="ms-3 input-group">
                                    <input type="text" id="searchMembre" class="form-control border-secondary" placeholder="Rechercher un menbre" >
                                    <select name="membre" class="form-select border-secondary" aria-label="Default select example">
                                      <option value="0" selected>Cliquez pour choisir</option>

                                      </select>
                                    </div>
                              </div>
                          </div>

                            <div class="row mb-4">
                              <div class="col">
                                <label class="text-center fs-5">Montant</label>
                                  <input  name="montant" id="montant" class="form-control border-secondary">
                                  @error('montant')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <div class="col">
                                <label for="inputDate" class="  text-center fs-5">Date</label>
                                <input name="debut" id="debut"  type="date" class="form-control border-secondary">
                                @error('debut')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                            </div>



                          <div class="row mb-4">
                              <div class="col"></div>
                              <div class="col">
                                <button name="btnValider" type="submit" class="btn btn-success form-control">Valider</button>
                              </div>
                              <div class="col">
                              <button id="annullee" type="button" class="btn btn-danger form-control">Annullée</button>
                              </div>
                              <div class="col"></div>
                          </div>

                    </form><!-- End General Form Elements -->


                    </div>
               </div>
            </div>
                    <!-- Fin Modal pour ajouter -->
                  <!-- Debut modal pour Modification -->
                  <div class="modal fade" id="modalModifCotisation" tabindex="-1">
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
                          <form>
                                <!-- Partie de l'ajout -->
                              <div class="card rounded-4">
                                <h1 class="card-title rounded-4 text-center text-black fs-1 fw-3 bg-warning-light">Modification</h1>
                                <div class="card-body">

                                  <!-- General Form Elements -->
                                  <form>
                                    <div class="row mb-4 mt-4">
                                      <label class="col-sm-3  text-center fs-5">Tontine</label>
                                      <div class="col-sm-7">
                                        <select class="form-select border-secondary" aria-label="Default select example">
                                          <option selected>Selectionner la tontine</option>
                                          <option value="1">Tontine 1</option>
                                          <option value="2">Tontine 2</option>
                                          <option value="3">Tontine 3</option>
                                        </select>
                                      </div>
                                      <div class="col-sm-2"></div>
                                    </div>
                                      <div class="row mb-4">
                                          <label class="col-sm-3  text-center fs-5">Membre</label>
                                          <div class="col-sm-7">
                                            <select class="form-select border-secondary" aria-label="Default select example">
                                              <option selected>Selectionnez le membre</option>
                                              <option value="1">Membre 1</option>
                                              <option value="2">Membre 2</option>
                                              <option value="3">Membre 3</option>
                                            </select>
                                          </div>
                                          <div class="col-sm-2"></div>
                                      </div>

                                      <div class="form-group">
                                        <div class="row mb-4">
                                          <label class="col-sm-3  text-center fs-5">Montant</label>
                                          <div class="col-sm-7">
                                            <input type="text" class="form-control border-secondary">
                                          </div>
                                        </div>
                                        <div class="col-sm-2"></div>
                                      </div>

                                      <div class="row">
                                        <label for="inputDate" class="col-sm-3  text-center fs-5">Date</label>
                                        <div class="col-sm-7">
                                          <input type="date" class="form-control border-secondary">
                                        </div>
                                        <div class="col-sm-2"></div>
                                      </div>


                                  </form><!-- End General Form Elements -->

                        </div>
                      </div>

                  </form><!-- End General Form Elements -->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success boutton">Valider</button>
                  <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fermer</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin modal pour modification -->

  </div>
  </div>

</main>
<!-- Fin du main -->
@endsection





