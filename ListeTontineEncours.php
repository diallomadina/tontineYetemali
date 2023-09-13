<?php include("top.php"); ?>
<?php include("header.php"); ?>
<?php include("aside.php"); ?>

<!-- Debut du main -->
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Tontine En cours</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="../../index.html">Acceuil</a>
          </li>
          <li class="breadcrumb-item active">Tontines en cours</li>
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
                     <th class="text-center bg-success text-white">Frequence</th>
                     <th class="text-center bg-success text-white">Participants</th>
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
                    <td>Semaine</td>
                    <td>4</td>
                    <td class="btnCoti"><button type="button" class="btn btn-transparent"  data-bs-toggle="modal" data-bs-target="#modalModifTontine" data-bs-placement="bottom" title="Modifier"><i class="bi bi-pen"></i></button></td>
                    <td class="btnCoti"><button type="button" class="btn btn-transparent  " data-bs-toggle="modal" data-bs-target="#modalSuiviTontine" data-bs-placement="bottom" title="Voir"><i class="bi bi-eye"></i></button></td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>235</td>
                  <td>Tontine N2</td>
                  <td>18/09/2012</td>
                  <td>24000</td>
                  <td>Mois</td>
                  <td>7</td>
                  <td class="btnCoti"><button type="button" class="btn btn-transparent"  data-bs-toggle="modal" data-bs-target="#modalModifTontine" data-bs-placement="bottom" title="Modifier"><i class="bi bi-pen"></i></button></td>
                  <td class="btnCoti"><button type="button" class="btn btn-transparent  " data-bs-toggle="modal" data-bs-target="#modalSuiviTontine" data-bs-placement="bottom" title="Voir"><i class="bi bi-eye"></i></button></td>
              </tr>
              <tr>
                <td>3</td>
                    <td>235</td>
                    <td>Tontine N3</td>
                    <td>09/9/2002</td>
                    <td>24000</td>
                    <td>Annee</td>
                    <td>4</td>
                <td class="btnCoti"><button type="button" class="btn btn-transparent"  data-bs-toggle="modal" data-bs-target="#modalModifTontine" data-bs-placement="bottom" title="Modifier"><i class="bi bi-pen"></i></button></td>
                <td class="btnCoti"><button type="button" class="btn btn-transparent  " data-bs-toggle="modal" data-bs-target="#modalSuiviTontine" data-bs-placement="bottom" title="Voir"><i class="bi bi-eye"></i></button></td>
              </tr>
            <tr>
              <td>1</td>
                    <td>235</td>
                    <td>Tontine N1</td>
                    <td>09/09/2012</td>
                    <td>24000</td>
                    <td>Semaine</td>
                    <td>4</td>
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
              <div class="card rounded-4">
                <h1 class="card-title rounded-4 text-center text-black fs-1 fw-3 bg-warning-light-light">Nouvelle Tontine</h1>
                <div class="card-body">
                  
                  <!-- General Form Elements -->
                  <form>
                      <div class="form-group">
                        <div class="row mb-4">
                          <label class="col-sm-5  text-center fs-5">Agent</label>
                          <div class="col-sm-6">
                            <select name="" id="" class="form-select">
                              <option value="" selected>Selectionnez l'agent</option>
                              <option value="">Agent 1</option>
                              <option value="">Agent 2</option>
                              <option value="">Agent 3</option>
                            </select>
                            <p id="pErNomTontine" class="text-danger d-none">Veuillez saisir un nom</p>
                          </div>
                          <div class="col-sm-1"></div>
                        </div>
  
                        <div class="row mb-4">
                          <label class="col-sm-5  text-center fs-5">Nom</label>
                          <div class="col-sm-6">
                            <input id="txtNomTontine" type="text" class="form-control border-secondary" placeholder="Nom de la tontine">
                            <p id="pErNomTontine" class="text-danger d-none">Veuillez saisir un nom</p>
                          </div>
                          <div class="col-sm-2"></div>
                        </div>
                        
                        </div>
                        <div class="row mb-4">
                          <label for="inputDate" class="col-sm-5  text-center fs-5">Debut</label>
                          <div class="col-sm-6">
                            <input id="dtdateDebut"  type="date" class="form-control border-secondary">
                            <p id="pErDate" class="text-danger d-none">La date ne doit pas contenir des lettres</p>
                          </div>
                          <div class="col-sm-2"></div>
                        </div>
                     
                      <div class="form-group">
                        <div class="row mb-4">
                          <label class="col-sm-5  text-center fs-5">Montant</label>
                          <div class="col-sm-6">
                            <input id="txtMontantTontine" type="number" class="form-control border-secondary" placeholder="Montant de la tontine">
                            <p id="pErMontantTontine" class="text-danger d-none">Veuillez saisir un montant</p>
                          </div>
                        </div>
                        <div class="col-sm-2"></div>
                      </div>
                      <div class="row mb-4">
                          <label for="inputDate" class="col-sm-5  text-center fs-5">Frequence</label>
                          <div class="col-sm-6">
                            <select name="" id="freqTontine" class="form-select border-secondary">
                              <option value="jour" selected>Jours</option>
                              <option value="semaine">Semaines</option>
                              <option value="mois">Mois</option>
                              <option value="annee">Annee</option>
                            </select>
                            <p id="pErFreqTontine" class="text-danger d-none">Veuillez definir une frequence</p>
                          </div>
                          <div class="col-sm-2"></div>
                      </div>
                      
                      <div class="row">
                          <label for="inputDate" class="col-sm-5  text-center fs-5">Participant</label>
                          <div class="col-sm-6">
                            <input id="dtPaticipantTontine"  type="number" class="form-control border-secondary" placeholder="Nombre de participants">
                            <p id="pErParticipantTontine" class="text-danger d-none">Veuillez definir le nombre de Participants</p>
                          </div>
                          <div class="col-sm-2"></div>
                      </div>
    
                  </form><!-- End General Form Elements -->
    
                </div>
              </div>
  
            </form><!-- End General Form Elements -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning boutton">Valider</button>
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
                <!-- Partie de l'ajout -->
                <div class="card rounded-4">
                  
                  <div class="card-body">
                    
                    <!-- General Form Elements -->
                    <form>
                        <div class="form-group">
                          <div class="row mb-4 mt-2">
                            <label class="col-sm-5  text-center fs-5">Agent</label>
                            <div class="col-sm-6">
                              <select name="" id="" class="form-select">
                                <option value="" selected>Selectionnez l'agent</option>
                                <option value="">Agent 1</option>
                                <option value="">Agent 2</option>
                                <option value="">Agent 3</option>
                              </select>
                              <p id="pErNomTontine" class="text-danger d-none">Veuillez saisir un nom</p>
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
  
                          <div class="row mb-4">
                            <label class="col-sm-5 text-center fs-5">Nom</label>
                            <div class="col-sm-6">
                              <input id="txtNomTontine" type="text" class="form-control border-secondary" placeholder="Nom de la tontine">
                              <p id="pErNomTontine" class="text-danger d-none">Veuillez saisir un nom</p>
                            </div>
                            <div class="col-sm-1"></div>
                          </div>
                            
                          </div>
                          <div class="row mb-4">
                            <label for="inputDate" class="col-sm-5  text-center fs-5">Debut</label>
                            <div class="col-sm-6">
                              <input id="dtdateDebut"  type="date" class="form-control border-secondary">
                              <p id="pErDate" class="text-danger d-none">La date ne doit pas contenir des lettres</p>
                            </div>
                            <div class="col-sm-2"></div>
                          </div>
                       
                        <div class="form-group">
                          <div class="row mb-4">
                            <label class="col-sm-5  text-center fs-5">Montant</label>
                            <div class="col-sm-6">
                              <input id="txtMontantTontine" type="number" class="form-control border-secondary" placeholder="Montant de la tontine">
                              <p id="pErMontantTontine" class="text-danger d-none">Veuillez saisir un montant</p>
                            </div>
                          </div>
                          <div class="col-sm-2"></div>
                        </div>
                        <div class="row mb-4">
                            <label for="inputDate" class="col-sm-5 text-center fs-5">Frequence</label>
                            <div class="col-sm-6">
                              <select name="" id="freqTontine" class="form-select border-secondary">
                                <option value="jour" selected>Jours</option>
                                <option value="semaine">Semaines</option>
                                <option value="mois">Mois</option>
                                <option value="annee">Annee</option>
                              </select>
                              <p id="pErFreqTontine" class="text-danger d-none">Veuillez definir une frequence</p>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                        
                        <div class="row">
                            <label for="inputDate" class="col-sm-5  text-center fs-5">Participant</label>
                            <div class="col-sm-6">
                              <input id="dtPaticipantTontine"  type="number" class="form-control border-secondary" placeholder="Nombre de participants">
                              <p id="pErParticipantTontine" class="text-danger d-none">Veuillez definir le nombre de Participants</p>
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
  
  <!-- Debut Modal pour Voir le suivi -->
  <div class="modal fade" id="modalSuiviTontine" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <h3 class="text-center">Suivie de cette Tontine</h3>
        <div class="container">
          <div class="row">
            <div class="col">
              <span class="fw-bold">Identifiant: </span> <span id="afficheIdTontine">2389</span>
            </div>
            <div class="col">
              <span class="fw-bold">Nom: </span> <span id="afficheNomTontine">Tontine2</span>
            </div>
        </div>
        <div class="row">
          <div class="col">
            <span class="fw-bold">Date de Creation: </span> <span id="afficheDateTontine">09/02/2023</span>
          </div>
          <div class="col">
            <span class="fw-bold">Montant a deposer: </span> <span id="afficheMontantTontine">4000000</span>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <span class="fw-bold">Frequence: </span> <span id="afficheFrequenceTontine">semaine</span>
          </div>
          <div class="col">
            <span class="fw-bold">Participants: </span> <span id="afficheParticipantTontine">12</span>
          </div>
        </div>
        <h4 class="text-center">Rapport</h4>
        <div class="row">
          <div class="col">
            <span class="fw-bold">Ont pris: </span> <span id="afficheOntPrisTontine">5</span>
          </div>
          <div class="col">
            <span class="fw-bold">Restant: </span> <span id="afficheRestantTontine">7</span>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <span class="fw-bold">Membre qui doit prendre: </span> <span id="afficheTourPrendreTontine">Ibrahima Diallo</span>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <span class="fw-bold">Temps restant: </span> <span id="afficheTempsRestantTontine">10 Semaine</span>
          </div>
        </div>
        </div>
  
        <div class="modal-footer">
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
<!-- End #main -->






  <!-- End #main -->

