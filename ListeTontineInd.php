<?php include("top.php"); ?>
<?php include("header.php"); ?>
<?php include("aside.php"); ?>

<!-- Debut du main -->
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Tontine Individuelle En cours</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="../../index.php">Acceuil</a>
          </li>
          <li class="breadcrumb-item active">Tontines individuelle en cours</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <!-- Contenue de la page -->
    <div class="container">
        <div class="row">
          <div class="col">
            <select name="" id="sldTontineCours" class="form-select border-secondary">
                <option value="" selected>Choisissez l'option</option>
                <option value="id">Identifiant</option>
                <option value="nom">nom</option>
                <option value="montant">Montant</option>
                <option value="membre">Membre</option>
            </select>
          </div>
          <div class="col">
            <input type="text" class="form-control border-secondary" placeholder="Saisissez votre text de recherche">
          </div>
          <div class="col">
            <button type="button" class="form-control border-secondary bg-warning-light">
              <i class="bi bi-filter"></i>Filtrer
            </button>
          </div>
          <div class="col">
            <button type="button" class="form-control border-secondary bg-warning-light">
              <i class="bi bi-arrow-repeat"></i>Actualiser
            </button>
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
          <table id="tableAffichageCoti" class="table table-bordered table-responsive table-compressed table-hover table-striped">
            <thead class="bg-success">
               <tr class="bg-success">
                     <th class="text-center bg-success text-white">N°</th>
                     <th class="text-center bg-success text-white">Identifiant</th>
                     <th class="text-center bg-success text-white">Nom</th>
                     <th class="text-center bg-success text-white">Date de debut</th>
                     <th class="text-center bg-success text-white">Montant</th>
                     <th class="text-center bg-success text-white">Membre</th>
                     <th class="text-center bg-success text-white" colspan="2">Action</th>
               </tr>
            </thead>
            <tbody id="tbodyAfficheTontine">
                <tr>
                    <td>1</td>
                    <td>235</td>
                    <td>Tontine N1</td>
                    <td>09/09/2012</td>
                    <td>24000</td>
                    <td>Camara Ibrahima</td>
                    <td class="btnCoti"><button type="button" class="btn btn-transparent"  data-bs-toggle="modal" data-bs-target="#modalModifTontine" data-bs-placement="bottom" title="Modifier"><i class="bi bi-pen"></i></button></td>
                    <td class="btnCoti"><button type="button" class="btn btn-transparent  " data-bs-toggle="modal" data-bs-target="#modalSuiviTontine" data-bs-placement="bottom" title="Voir"><i class="bi bi-eye"></i></button></td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>235</td>
                  <td>Tontine N2</td>
                  <td>18/09/2012</td>
                  <td>24000</td>
                  <td>Mariama Diallo</td>
                 
                  <td class="btnCoti"><button type="button" class="btn btn-transparent"  data-bs-toggle="modal" data-bs-target="#modalModifTontine" data-bs-placement="bottom" title="Modifier"><i class="bi bi-pen"></i></button></td>
                  <td class="btnCoti"><button type="button" class="btn btn-transparent  " data-bs-toggle="modal" data-bs-target="#modalSuiviTontine" data-bs-placement="bottom" title="Voir"><i class="bi bi-eye"></i></button></td>
              </tr>
              <tr>
                <td>3</td>
                    <td>235</td>
                    <td>Tontine N3</td>
                    <td>09/9/2002</td>
                    <td>24000</td>
                    <td>Sidibe</td>
                    
                <td class="btnCoti"><button type="button" class="btn btn-transparent"  data-bs-toggle="modal" data-bs-target="#modalModifTontine" data-bs-placement="bottom" title="Modifier"><i class="bi bi-pen"></i></button></td>
                <td class="btnCoti"><button type="button" class="btn btn-transparent  " data-bs-toggle="modal" data-bs-target="#modalSuiviTontine" data-bs-placement="bottom" title="Voir"><i class="bi bi-eye"></i></button></td>
              </tr>
            <tr>
              <td>1</td>
                    <td>235</td>
                    <td>Tontine N1</td>
                    <td>09/09/2012</td>
                    <td>24000</td>
                    <td>hajkd</td>
                    
              <td class="btnCoti"><button type="button" class="btn btn-transparent"  data-bs-toggle="modal" data-bs-target="#modalModifTontine" data-bs-placement="bottom" title="Modifier"><i class="bi bi-pen"></i></button></td>
              <td class="btnCoti"><button type="button" class="btn btn-transparent  " data-bs-toggle="modal" data-bs-target="#modalSuiviTontine" data-bs-placement="bottom" title="Voir"><i class="bi bi-eye"></i></button></td>
          </tr>
            </tbody>
        </table>
        </div>
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
            <form>
                      <div class="row mb-4 mt-4">
                        <label class="col-sm-3  text-center fs-5">Agent</label>
                        <div class="col-sm-7">
                          <select id="selectAgent" class="form-select border-secondary" aria-label="Default select example">
                            <option selected >Selectionnez l'Agent</option>
                            <option value="1">Agent 1</option>
                            <option value="2">Agent 2</option>
                            <option value="3">Agent 3</option>
                          </select>
                          <p id="pErAgentAgent" class="text-danger d-none">Veuillez selectionner une Agent</p>
                        </div>
                        
                        <div class="col-sm-2"></div>
                      </div>
                        
                      <div class="row mb-4 mt-4">
                        <label class="col-sm-3  text-center fs-5">Membre</label>
                        <div class="col-sm-7">
                          <select id="selectAgent" class="form-select border-secondary" aria-label="Default select example">
                            <option selected >Selectionnez le membre</option>
                            <option value="1">Membre 1</option>
                            <option value="2">Membre 2</option>
                            <option value="3">Membre 3</option>
                          </select>
                          <p id="pErAgentAgent" class="text-danger d-none">Veuillez selectionner un membre</p>
                        </div>
                        
                        <div class="col-sm-2"></div>
                      </div>

                        <div class="form-group">
                          <div class="row mb-4">
                            <label class="col-sm-3  text-center fs-5">Nom</label>
                            <div class="col-sm-7">
                              <input id="txtNomAgent" type="number" class="form-control border-secondary">
                              <p id="pErNomAgent" class="text-danger d-none">Veuillez saisir un Nom</p>
                            </div>
                          </div>
                          <div class="col-sm-2"></div>
                        </div>

                        <div class="form-group">
                          <div class="row mb-4">
                            <label class="col-sm-3  text-center fs-5">Debut</label>
                            <div class="col-sm-7">
                              <input id="txtPrenomAgent" type="date" class="form-control border-secondary">
                              <p id="pErPrenomAgent" class="text-danger d-none">Veuillez saisir un nom</p>
                            </div>
                          </div>
                          <div class="col-sm-2"></div>
                        </div>
                    
                        <div class="form-group">
                          <div class="row mb-4">
                            <label class="col-sm-3  text-center fs-5">Montant</label>
                            <div class="col-sm-7">
                              <input id="txtAdresseAgent" type="number" class="form-control border-secondary">
                              <p id="pErAdresseAgent" class="text-danger d-none">Veuillez saisir un montant</p>
                            </div>
                          </div>
                          <div class="col-sm-2"></div>
                        </div>

                    </form><!-- End General Form Elements -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning boutton">Valider</button>
            <button id="btnValiderAjoutAgent" type="button" class="btn btn-danger">Annulée</button>
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>  
  </div>
    <!-- Fin Modal pour ajouter -->
  <!-- Debut modal pour Modification -->
  <div class="modal fade" id="modalModifTontine" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h1 class="text-center text-black fs-1 fw-3 bg-warning-light-light">Modification</h1>                        
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
                      <div class="row mb-4 mt-4">
                        <label class="col-sm-3  text-center fs-5">Agent</label>
                        <div class="col-sm-7">
                          <select id="selectAgent" class="form-select border-secondary" aria-label="Default select example">
                            <option selected >Selectionnez l'Agent</option>
                            <option value="1">Agent 1</option>
                            <option value="2">Agent 2</option>
                            <option value="3">Agent 3</option>
                          </select>
                          <p id="pErAgentAgent" class="text-danger d-none">Veuillez selectionner une Agent</p>
                        </div>
                        
                        <div class="col-sm-2"></div>
                      </div>
                        
                      <div class="row mb-4 mt-4">
                        <label class="col-sm-3  text-center fs-5">Membre</label>
                        <div class="col-sm-7">
                          <select id="selectAgent" class="form-select border-secondary" aria-label="Default select example">
                            <option selected >Selectionnez le membre</option>
                            <option value="1">Membre 1</option>
                            <option value="2">Membre 2</option>
                            <option value="3">Membre 3</option>
                          </select>
                          <p id="pErAgentAgent" class="text-danger d-none">Veuillez selectionner un membre</p>
                        </div>
                        
                        <div class="col-sm-2"></div>
                      </div>

                        <div class="form-group">
                          <div class="row mb-4">
                            <label class="col-sm-3  text-center fs-5">Nom</label>
                            <div class="col-sm-7">
                              <input id="txtNomAgent" type="number" class="form-control border-secondary">
                              <p id="pErNomAgent" class="text-danger d-none">Veuillez saisir un Nom</p>
                            </div>
                          </div>
                          <div class="col-sm-2"></div>
                        </div>

                        <div class="form-group">
                          <div class="row mb-4">
                            <label class="col-sm-3  text-center fs-5">Debut</label>
                            <div class="col-sm-7">
                              <input id="txtPrenomAgent" type="date" class="form-control border-secondary">
                              <p id="pErPrenomAgent" class="text-danger d-none">Veuillez saisir un nom</p>
                            </div>
                          </div>
                          <div class="col-sm-2"></div>
                        </div>
                    
                        <div class="form-group">
                          <div class="row mb-4">
                            <label class="col-sm-3  text-center fs-5">Montant</label>
                            <div class="col-sm-7">
                              <input id="txtAdresseAgent" type="number" class="form-control border-secondary">
                              <p id="pErAdresseAgent" class="text-danger d-none">Veuillez saisir un montant</p>
                            </div>
                          </div>
                          <div class="col-sm-2"></div>
                        </div>
      
                    </form><!-- End General Form Elements -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success boutton">Valider</button>
          <button id="btnValiderAjoutAgent" type="button" class="btn btn-danger">Annulée</button>
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>  
  </div>
  <!-- Fin modal pour modification -->
  
  <!-- Debut Modal pour Voir le suivi -->
  <div class="modal fade" id="modalSuiviTontine" tabindex="-1">
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

<?php include("footer.php"); ?>
<?php include("script.php"); ?>


