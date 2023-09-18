<?php include("top.php"); ?>
<?php include("header.php"); ?>
<?php include("aside.php"); ?>

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
                                  <?php 
                                    include("php/Agence.php");
                                    insertCotisation();
                                  ?>
                                </div>
                              </div>
              <div class="row acacher">  
                  <form action="" class="form-inline bg-light">
                        <div class="row">
                          <div class="col-sm"></div>
                          <div class="col-sm">
                            <div class="form-group">
                                <div class="col">
                                  <label for="">Selectionner la tontine</label>
                                    <select name="tontine"  class="form-select">
                                      <?php
                                        include("php/connection.php");
                                        $request = "SELECT idTontineIndividuelle, nomTontineIndividuelle, codeTontineIndividuelle from tontineIndividuelle";
                                        $result = $con->query($request);
                                        while($agent= Mysqli_fetch_array($result)){
                                          $idAgent = $agent['idTontineIndividuelle'];
                                          echo "<option value='$idAgent'>"."(".$agent['codeTontineIndividuelle'].") ".$agent['nomTontineIndividuelle']."</option>";
                                        }
                                      ?>
                                    </select>
                                </div>
                            </div>
                         </div>
                         <div class="col-sm">
                              <div class="form-group">
                                  <div class="col">
                                    <label for="">Selectionner le membre</label>
                                      <select name="membre" class="form-select">
                                         <?php

                                           $request = "SELECT idMembre, nomMembre, prenomMembre from Membre";
                                           $result = $con -> query($request);
                                           while($membre = Mysqli_fetch_array($result)){
                                             $idMembre = $membre['idMembre'];
                                             echo "<option value='$idMembre'>".$membre['nomMembre']." ".$membre['prenomMembre']."</option>";
                                           }
                                         
                                        ?>
                                      </select>
                                  </div>
                              </div>
                           </div>
                           <div class="col-sm ">
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
                    <?php
                      
                      displayCotisation();
                    ?>
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
                          <!-- General Form Elements -->
                            <form method="post" action="">
        
                              <div class="row mb-4">
                                <label class="col-sm-3  text-center fs-5">Tontine</label>
                                <div class="col-sm-7">
                                  <select name="tontine" class="form-select border-secondary" aria-label="Default select example">
                                      <?php
                                        include("php/connection.php");
                                        $request = "SELECT idTontineIndividuelle, nomTontineIndividuelle, codeTontineIndividuelle from tontineIndividuelle";
                                        $result = $con->query($request);
                                        while($agent= Mysqli_fetch_array($result)){
                                          $idAgent = $agent['idTontineIndividuelle'];
                                          echo "<option value='$idAgent'>"."(".$agent['codeTontineIndividuelle'].") ".$agent['nomTontineIndividuelle']."</option>";
                                        }
                                      ?>
                                  </select>
                                </div>
                                
                                <div class="col-sm-2"></div>
                              </div>
                                <div class="row mb-4">
                                    <label class="col-sm-3  text-center fs-5">Membre</label>
                                    <div class="col-sm-7">
                                      <select name="membre" class="form-select border-secondary" aria-label="Default select example">
                                      <?php
                                  
                                          $request = "SELECT idMembre, nomMembre, prenomMembre from Membre";
                                          $result = $con -> query($request);
                                          while($membre = Mysqli_fetch_array($result)){
                                            $idMembre = $membre['idMembre'];
                                            echo "<option value='$idMembre'>".$membre['nomMembre']." ".$membre['prenomMembre']."</option>";
                                          }
                                  
                                      ?>
                                      </select>
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>
                              
                                <div class="form-group">
                                  <div class="row mb-4">
                                    <label class="col-sm-3  text-center fs-5">Montant</label>
                                    <div class="col-sm-7">
                                      <input  name="montant" class="form-control border-secondary">
                                    </div>
                                  </div>
                                  <div class="col-sm-2"></div>
                                </div>
                            
                                <div class="row mb-4">
                                  <label for="inputDate" class="col-sm-3  text-center fs-5">Date</label>
                                  <div class="col-sm-7">
                                    <input name="debut"  type="date" class="form-control border-secondary">
                                  </div>
                                  <div class="col-sm-2"></div>
                                </div>

                                <div class="modal-footer">
                                  <button name="btnValider" type="submit" class="btn btn-success">Valider</button>
                                  <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fermer</button>
                                </div>
              
                            </form><!-- End General Form Elements -->
                                </div>
                                
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

<?php include("footer.php"); ?>
<?php include("script.php"); ?>
<!-- End #main -->

      
     

