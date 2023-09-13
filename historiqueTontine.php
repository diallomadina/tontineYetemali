<?php include("top.php"); ?>
<?php include("header.php"); ?>
<?php include("aside.php"); ?>

<!-- Debut du main -->
      <main class="main" id="main">
        <div class="pagetitle">
          <h1>Historique des Tontines</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
              <li class="breadcrumb-item">Tontine</li>
              <li class="breadcrumb-item active">Historique</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->
           <div class="container mt-5">
            <div class="row">
                   
              <form action="" class="form-inline bg-light">
                  <div class="row mt-3">
                        <div class="col">
                          <input type="date" name="" id="dtHistoriqueUn" class="form-control">
                        </div>
                        <div class="col">
                          <input type="date" name="" id="dtHistoriqueDeux" class="form-control">
                        </div>
                        <div class="col">
                          <select name="" id="" class="form-select">
                            <option value="" selected>Choisissez</option>
                            <option value="identifiant">Identifiant</option>
                            <option value="nom">Nom</option>
                            <option value="statut">Statut</option>
                          </select>
                        </div>
                        <div class="col">
                          <input type="text" class="form-control border-secondary" placeholder="Saisissez">
                        </div>
                        <div class="col">
                            <button id="btnSearchCoti" type="button" class=" bg-warning-light form-control">
                                <i class="bi bi-filter"></i> Filtrer
                            </button>
                        </div>
                        <div class="col">
                          <button id="btnSearchCoti" type="button" class=" bg-warning-light form-control">
                              <i class="bi bi-repeat"></i> Acutaliser
                          </button>
                        </div>
                        <div class="col">
                          <button id="btnPrintCotiHistorique" type="button" class=" form-control bg-warning-light text-center">
                             <i class="bi bi-printer"></i> Imprimer
                          </button>
                        </div>
                  </div>    
                  
              </form>

                  
          </div>
          <div class="row mt-3">  
               <!-- Table -->
               <table id="tableHistoriqueCoti" class="table table-bordered table-responsive table-compressed table-hover table-striped">
                  <thead class="bg-success">
                     <tr class="bg-success">
                          <th class="text-center bg-success text-white">N°</th>
                          <th class="text-center bg-success text-white">Identifiant</th>
                          <th class="text-center bg-success text-white">Nom</th>
                          <th class="text-center bg-success text-white">Date de debut</th>
                          <th class="text-center bg-success text-white">Montant</th>
                          <th class="text-center bg-success text-white">Frequence</th>
                          <th class="text-center bg-success text-white">Participants</th>
                           <th class="text-center bg-success text-white">Statut</th>
                           <th class="text-center bg-success text-white">Voir</th>
                     </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>En Cours</td>
                          <td class="btnCoti"><button type="button" class="btn btn-transparent"  data-bs-toggle="modal" data-bs-target="#modalVoirTontine" data-bs-placement="bottom" title="Modifier"><i class="bi bi-eye"></i></button></td>
                      </tr>
                  </tbody>
              </table>
                    <!-- End Table  -->
               
                  

                  <!-- Debut modal pour Modification -->
                  <div class="modal fade" id="modalModifCotisation" tabindex="-1">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header text-center">
                              <h3 class="title">Modification d'une cotisation</h3>
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
                                <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label">Membre</label>
                                    <div class="col-sm-10">
                                      <select class="form-select" aria-label="Default select example">
                                        <option selected>Selectionner le membre</option>
                                        <option value="1">Membre 1</option>
                                        <option value="2">Membre 2</option>
                                        <option value="3">Membre 3</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label">Tontine</label>
                                    <div class="col-sm-10">
                                      <select class="form-select" aria-label="Default select example">
                                        <option selected>Selectionner la tontine</option>
                                        <option value="1">Tontine 1</option>
                                        <option value="2">Tontine 2</option>
                                        <option value="3">Tontine 3</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                  <label for="inputDate" class="col-sm-2 col-form-label">Montant</label>
                                  <div class="col-sm-10">
                                    <input type="number" class="form-control">
                                  </div>
                                </div>
                                <div class="row mb-4">
                                  <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                                  <div class="col-sm-10">
                                    <input type="date" class="form-control">
                                  </div>
                                </div>
        
                                <div class="row mb-4">
                                    <div class="col-sm-5"></div>
                                  <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary">Valider</button>
                                  </div>
                                  <div class="col-sm-3"></div>
                                </div>
              
                            </form><!-- End General Form Elements -->
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success boutton">Save</button>
                          </div>
                        </div>
                      </div>
                  </div>
          </div>
           </div>
      </main>
<!-- Fin du main -->

<?php include("footer.php"); ?>
<?php include("script.php"); ?>
<!-- End #main -->


