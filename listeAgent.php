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
                      <div class="row">
                        <div class="col">
                          <?php
                            include("php/Agence.php");
                            InsertAgent();
                            UpdateAgent();
                          ?>
                        </div>
                      </div>
                      <form action="" method="post" class="form-inline bg-light">
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
                                    <button name="actualiser" id="btnSearchAgent" type="submit" class="btn form-control bg-warning-light text-center">
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
                                          <th class="text-center bg-success text-white">N°</th>
                                          <th class="text-center bg-success text-white">Photo</th>
                                          <th class="text-center bg-success text-white">Identifiant</th>
                                          <th class="text-center bg-success text-white">Nom</th>
                                          <th class="text-center bg-success text-white">Prenom</th>
                                          <th class="text-center bg-success text-white">Adreese</th>
                                          <th class="text-center bg-success text-white">Contact</th>
                                          <th class="text-center bg-success text-white">Mail</th>
                                          <th class="text-center bg-success text-white">Agence</th>
                                          <th class="text-center bg-success text-white" colspan="2">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody id="tbodyAfficheIdentifiant">
                                          <?php
                                            
                                            if(empty($_POST['txtRecherche']) || isset($_POST['actualiser'])){
                                              displayAgent();
                                            } else if (isset($_POST['txtRecherche']) && isset($_POST['filtrer']) && isset($_POST['choix'])){
                                              $choix = $_POST['choix'];
                                              switch($choix){
                                                case 'identifiant':{
                                                  displayAgentWithId();
                                                } break;
                                                case 'nom':{
                                                  displayAgentWithName();
                                                } break;
                                                case 'prenom':{
                                                  displayAgentWithPrenom();
                                                } break;
                                                case 'adresse':{
                                                  displayAgentWithAdresse();
                                                } break;
                                                case 'agence':{
                                                  displayAgentWithAgence();
                                                } break;
                                                default : {
                                                  displayAgent();
                                                }
                                              }
                                            }
                                            
                                          ?>
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
                                        <form method="post" action="" enctype="multipart/form-data">
                                         
                                          <div class="row mb-3">
                                            <div class="col">
                                                <label class=" text-center fs-5">Agence</label>
                                                
                                                <select name="agence" class="form-select border-secondary" aria-label="Default select example">
                                                <?php
                                                include("php/connection.php");
                                                $request = "SELECT idAgence, nomAgence from Agence";
                                                $result = $con -> query($request);
                                                while($membre = Mysqli_fetch_array($result)){
                                                  $idMembre = $membre['idAgence'];
                                                  echo "<option value='$idMembre'>".$membre['nomAgence']."</option>";
                                                }
                                          
                                                ?>
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
                                                <label for="" class=" text-center fs-5">Photo</label>
                                                <input type="file" name="photo" id="" accept=".jpg, .png" class="form-control border-secondary">
                                              </div> 
                                              
                                          </div>
                                          
                                          <div class="row mb-3">
                                            <label class=" fs-5">Mail</label>
                                                <input name="mail" type="mail" class="form-control border-secondary">
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

                                  <form method="post" action="" enctype="multipart/form-data">
                                         <input type="hidden" id="Mcode" name="Mcode">
                                         <div class="row mb-3">
                                           <div class="col">
                                               <label class=" text-center fs-5">Agence</label>
                                               
                                               <select name="Magence" id="Magence" class="form-select border-secondary" aria-label="Default select example">
                                               <?php
                                               
                                               $request = "SELECT idAgence, nomAgence from Agence";
                                               $result = $con -> query($request);
                                               while($membre = Mysqli_fetch_array($result)){
                                                 $idMembre = $membre['idAgence'];
                                                 echo "<option value='$idMembre'>".$membre['nomAgence']."</option>";
                                               }
                                         
                                               ?>
                                               </select>
                                           </div>
                                           
                                           <div class="col">
                                               <label class=" text-center fs-5">Nom</label>
                                               <div class="col">
                                                 <input name="Mnom" id="Mnom" type="text" class="form-control border-secondary">
                                               </div>
                                           </div>
                                           
                                           
                                         </div>

                                           
                                         <div class="row mb-3">
                                             <div class="col">
                                               <label class=" text-center fs-5">Prenom</label>
                                               <input name="Mprenom" id="Mprenom" type="text" class="form-control border-secondary">
                                             </div>
                                             <div class="col">
                                               <label class="  text-center fs-5">Adresse</label>
                                               <input name="Madresse" id="Madresse" type="text" class="form-control border-secondary">
                                             </div>
                                             
                                         </div>
                                       

                                           
                                         <div class="row mb-3">
                                             <div class="col">
                                               <label class=" text-center fs-5">Telephone</label>
                                               <input name="Mtelephone" id="Mtelephone" type="number" class="form-control border-secondary">
                                             </div>
                                             <div class="col">
                                               <label for="" class=" text-center fs-5">Photo</label>
                                               <input type="file" name="Mphoto" id="Mphoto" accept=".jpg, .png" class="form-control border-secondary">
                                             </div> 
                                             
                                         </div>
                                         
                                         <div class="row mb-3">
                                           <label class=" fs-5">Mail</label>
                                               <input name="Mmail" id="Mmail" type="mail" class="form-control border-secondary">
                                         </div>

                                         <div class="modal-footer">
                                           <button name ="Majouter" type="submit" class="btn btn-success boutton">Valider</button>
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

<?php include("footer.php"); ?>
<?php include("script.php"); ?>
<script>
    $(document).ready(function () {
    var tableAffichageAgent = document.getElementById('tableAffichageAgent');

      function editerAgent() {
          for (var i = 0; i < tableAffichageAgent.rows.length; i++) {
              tableAffichageAgent.rows[i].onclick = function () {
                  document.getElementById("Mcode").value = this.cells[2].innerHTML;
                  document.getElementById("Mnom").value = this.cells[3].innerHTML;
                  document.getElementById("Mprenom").value = this.cells[4].innerHTML;
                  document.getElementById("Madresse").value = this.cells[5].innerHTML;
                  document.getElementById("Mtelephone").value = this.cells[6].innerHTML;
                  document.getElementById("Mmail").value = this.cells[7].innerHTML;


                  // Sélectionner la valeur dans le champ de sélection "mMembre"
            var membreText = this.cells[8].innerHTML; // Contenu de la cellule "Membre"
            var selectMembre = document.getElementById("Magence");
            
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


