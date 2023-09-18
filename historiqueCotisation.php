<?php include("top.php"); ?>
<?php include("header.php"); ?>
<?php include("aside.php"); ?>

<!-- Debut du main -->
      <main class="main" id="main">
        <div class="pagetitle">
          <h1>Historique des Cotisation</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
              <li class="breadcrumb-item">Cotisations</li>
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
                            <option value="" selected>Choisir l'option</option>
                            <option value="Identifiant">Identifiant</option>
                            <option value="tontine">Tontine</option>
                            <option value="membre">Membre</option>
                            <option value="montant">Montant</option>
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
               <table id="tableHistoriqueCoti" class="table text-center table-bordered table-responsive table-compressed table-hover table-striped">
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
                  <tbody>
                      <?php
                        include("php/Agence.php");
                        displayCotisation();
                      ?>
                  </tbody>
              </table>
                    <!-- End Table  -->
               

          </div>
           </div>
      </main>
<!-- Fin du main -->

<?php include("footer.php"); ?>
<?php include("script.php"); ?>
<!-- End #main -->



 