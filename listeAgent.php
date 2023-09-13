<?php include("top.php"); ?>
<?php include("header.php"); ?>
<?php include("aside.php"); ?>

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
                   
                      <form action="" class="form-inline bg-light">
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
                                        <select name="" id="selectRechercheAgentsation" class="form-select">
                                          <option value="" selected>Choissisez une option</option>
                                          <option value="parNumero">Identifiant</option>
                                          <option value="parIdentifiant">Nom</option>
                                          <option value="parMembre">Prenom</option>
                                          <option value="parMontant">Adresse</option>
                                        </select>
                                    </div>
                                </div>
                               </div>
                               <div class="col-sm">
                                   <div class="form-group">
                                    
                                    <input type="text" class="form-control bi bi-search" id="txtRechercheAgent">
                                   </div>
                                </div>
                               <div class="col-sm">
                                  <div class="form-group">
                                    <div class="col-sm">
                                      <button id="btnSearchAgent" type="button" class="form-control bg-warning-light text-center">
                                         <i class="bi bi-filter"></i>Filtrer
                                      </button>
                                   </div>
                                  </div>
                               </div>
                               <div class="col-sm">
                                <div class="form-group">
                                  <div class="col-sm">
                                    <button id="btnSearchAgent" type="button" class="btn form-control bg-warning-light text-center">
                                       <i class="bi bi-repeat"></i>Actualiser
                                    </button>
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
                                        <form>
                                          <h1 class="card-title rounded-4 text-center text-black fs-1 fw-3 bg-warning-light">Nouveau Agent</h1>
                                          <div class="row mb-4 mt-4">
                                            <label class="col-sm-3  text-center fs-5">Agence</label>
                                            <div class="col-sm-7">
                                              <select id="selectAgenceAgent" class="form-select border-secondary" aria-label="Default select example">
                                                <option selected >Selectionnez l'Agence</option>
                                                <option value="1">Agence 1</option>
                                                <option value="2">Agence 2</option>
                                                <option value="3">Agence 3</option>
                                              </select>
                                              <p id="pErAgenceAgent" class="text-danger d-none">Veuillez selectionner une Agence</p>
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
                                                <label class="col-sm-3  text-center fs-5">Prenom</label>
                                                <div class="col-sm-7">
                                                  <input id="txtPrenomAgent" type="number" class="form-control border-secondary">
                                                  <p id="pErPrenomAgent" class="text-danger d-none">Veuillez saisir un prenom</p>
                                                </div>
                                              </div>
                                              <div class="col-sm-2"></div>
                                            </div>
                                        
                                            <div class="form-group">
                                              <div class="row mb-4">
                                                <label class="col-sm-3  text-center fs-5">Adresse</label>
                                                <div class="col-sm-7">
                                                  <input id="txtAdresseAgent" type="number" class="form-control border-secondary">
                                                  <p id="pErAdresseAgent" class="text-danger d-none">Veuillez saisir une adresse</p>
                                                </div>
                                              </div>
                                              <div class="col-sm-2"></div>
                                            </div>
                    
                                            <div class="form-group">
                                              <div class="row mb-1">
                                                <label class="col-sm-3  text-center fs-5">Telephone</label>
                                                <div class="col-sm-7">
                                                  <input id="txtTelAgent" type="number" class="form-control border-secondary">
                                                  <p id="pErTelAgent" class="text-danger d-none">Veuillez saisir une adresse</p>
                                                </div>
                                              </div>
                                              <div class="col-sm-2"></div>
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
                                <!-- Fin Modal pour ajouter -->
                               </div>
                               <!-- Fin pour ajouter  -->
                               <div class="col-sm ">
                                  <button id="btnPrintAgent" type="button" class="form-control bg-warning-light text-center">
                                     <i class="bi bi-printer"></i>Imprimer
                                  </button>
                               </div>
                            </div>
                           
                    </form>

                    
            </div>
            <div class="row mt-5">
                    
                    
                 <!-- Table -->
                 <table id="tableAffichageAgent" class="table table-bordered table-responsive table-compressed table-hover table-striped">
                    <thead class="bg-success">
                       <tr class="bg-success">
                             <th class="text-center bg-success text-white">N°</th>
                             <th class="text-center bg-success text-white">Identifiant</th>
                             <th class="text-center bg-success text-white">Nom</th>
                             <th class="text-center bg-success text-white">Prenom</th>
                             <th class="text-center bg-success text-white">Adreese</th>
                             <th class="text-center bg-success text-white">Contact</th>
                             <th class="text-center bg-success text-white" colspan="2">Action</th>
                       </tr>
                    </thead>
                    <tbody id="tbodyAfficheIdentifiant">
                        <tr>
                            <td>1</td>
                            <td>Identifiant N1</td>
                            <td>Ibrahima</td>
                            <td>24000</td>
                            <td>09/09/2012</td>
                            <td></td>
                            <td class="btnAgent"><button type="button" class="btn btn-transparent"  data-bs-toggle="modal" data-bs-target="#modalModifAgent" data-bs-placement="bottom" title="Modifier"><i class="bi bi-pen"></i></button></td>
                            <td class="btnAgent"><button type="button" class="btn btn-transparent  "  data-bs-toggle="modal" data-bs-target="#modalSuppressionAgent" data-bs-placement="bottom" title="Supprimer"><i class="bi bi-trash"></i></button></td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Identifiant N2</td>
                          <td>Hamidou</td>
                          <td>27000</td>
                          <td>08/09/2012</td>
                          <td></td>
                          <td class="btnAgent"><button type="button" class="btn btn-transparent"  data-bs-toggle="modal" data-bs-target="#modalModifAgent" data-bs-placement="bottom" title="Modifier"><i class="bi bi-pen"></i></button></td>
                          <td class="btnAgent"><button type="button" class="btn btn-transparent  "  data-bs-toggle="modal" data-bs-target="#modalSuppressionAgent" data-bs-placement="bottom" title="Supprimer"><i class="bi bi-trash"></i></button></td>
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>Identifiant N3</td>
                        <td>Salimatou</td>
                        <td>24000</td>
                        <td>09/09/2015</td>
                        <td></td>
                        <td class="btnAgent"><button type="button" class="btn btn-transparent"  data-bs-toggle="modal" data-bs-target="#modalModifAgent" data-bs-placement="bottom" title="Modifier"><i class="bi bi-pen"></i></button></td>
                        <td class="btnAgent"><button type="button" class="btn btn-transparent  "  data-bs-toggle="modal" data-bs-target="#modalSuppressionAgent" data-bs-placement="bottom" title="Supprimer"><i class="bi bi-trash"></i></button></td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Identifiant N1</td>
                      <td>Ibrahima</td>
                      <td>24000</td>
                      <td>09/09/2012</td>
                      <td></td>
                      <td class="btnAgent"><button type="button" class="btn btn-transparent"  data-bs-toggle="modal" data-bs-target="#modalModifAgent" data-bs-placement="bottom" title="Modifier"><i class="bi bi-pen"></i></button></td>
                      <td class="btnAgent"><button type="button" class="btn btn-transparent  " data-bs-toggle="modal" data-bs-target="#modalSuppressionAgent" data-bs-placement="bottom" title="Supprimer"><i class="bi bi-trash"></i></button></td>
                  </tr>
                    </tbody>
                </table>
                      <!-- End Table  -->
                 
                    

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
                            <form>
                                  <!-- Partie de l'ajout -->
                                <div class="card rounded-4">
                                  <h1 class="card-title rounded-4 text-center text-black fs-1 fw-3 bg-warning-light">Modification</h1>
                                  <div class="card-body">

                                    <form>
                                      <div class="row mb-4">
                                        <label class="col-sm-5  text-center fs-5">Agence</label>
                                        <div class="col-sm-6">
                                          <select id="selectAgenceAgent" class="form-select border-secondary" aria-label="Default select example">
                                            <option selected >Selectionnez l'Agence</option>
                                            <option value="1">Agence 1</option>
                                            <option value="2">Agence 2</option>
                                            <option value="3">Agence 3</option>
                                          </select>
                                          <p id="pErAgenceAgent" class="text-danger d-none">Veuillez selectionner une Agence</p>
                                        </div>
                                        
                                        <div class="col-sm-1"></div>
                                      </div>
                                        
                                       
                                        <div class="form-group">
                                          <div class="row mb-4">
                                            <label class="col-sm-5  text-center fs-5">Nom</label>
                                            <div class="col-sm-6">
                                              <input id="txtNomAgent" type="number" class="form-control border-secondary">
                                              <p id="pErNomAgent" class="text-danger d-none">Veuillez saisir un Nom</p>
                                            </div>
                                          </div>
                                          <div class="col-sm-1"></div>
                                        </div>
                
                                        <div class="form-group">
                                          <div class="row mb-4">
                                            <label class="col-sm-5  text-center fs-5">Prenom</label>
                                            <div class="col-sm-6">
                                              <input id="txtPrenomAgent" type="number" class="form-control border-secondary">
                                              <p id="pErPrenomAgent" class="text-danger d-none">Veuillez saisir un prenom</p>
                                            </div>
                                          </div>
                                          <div class="col-sm-1"></div>
                                        </div>
                                    
                                        <div class="form-group">
                                          <div class="row mb-4">
                                            <label class="col-sm-5  text-center fs-5">Adresse</label>
                                            <div class="col-sm-6">
                                              <input id="txtAdresseAgent" type="number" class="form-control border-secondary">
                                              <p id="pErAdresseAgent" class="text-danger d-none">Veuillez saisir une adresse</p>
                                            </div>
                                          </div>
                                          <div class="col-sm-1"></div>
                                        </div>
                
                                        <div class="form-group">
                                          <div class="row">
                                            <label class="col-sm-5  text-center fs-5">Telephone</label>
                                            <div class="col-sm-6">
                                              <input id="txtTelAgent" type="number" class="form-control border-secondary">
                                              <p id="pErTelAgent" class="text-danger d-none">Veuillez saisir une adresse</p>
                                            </div>
                                          </div>
                                          <div class="col-sm-1  "></div>
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

<?php include("footer.php"); ?>
<?php include("script.php"); ?>
<!-- End #main -->


