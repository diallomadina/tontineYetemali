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
            <input type="date" name="" id="" class="form-control">
          </div>
          <div class="col">
            <input type="date" name="" id="" class="form-control">
          </div>
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
                     <th class="text-center bg-success text-white">Statut</th>
                     <th class="text-center bg-success text-white">Action</th>
               </tr>
            </thead>
            <tbody> 
              
              <?php 
                include("php/Agence.php");
                dispalyTontineIndHis();
              ?>
                
            </tbody>
        </table>
        </div>
    </div>


  
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


