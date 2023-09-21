<?php include("top.php"); ?>
<?php include("header.php"); ?>
<?php include("aside.php"); ?>

<!-- Debut du main -->
      <main class="main" id="main">
        <div class="pagetitle">
          <h1>Nouvelle Cotisation</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
              <li class="breadcrumb-item">Cotisations</li>
              <li class="breadcrumb-item active">Ajout</li>
            </ol>
          </nav>
        </div>
            <div class="row">
              <div class="col-sm-3"></div>
              <div class="col-sm-6">
                <!-- Partie de l'ajout -->
                <div class="card rounded-4">
                  <h1 class="card-title rounded-4 text-center text-black fs-1 fw-3 bg-warning-light">Nouvelle cotisation</h1>
                  <div class="card-body">
                    
                    <!-- General Form Elements -->
                    <form method="post" action="">
                      <div class="row">
                        <div class="col">
                          <?php 
                            include("php/Agence.php");
                            insertCotisation();
                          ?>
                        </div>
                      </div>
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

                        <div class="row mb-4">
                            <div class="col"></div>
                            <div class="col">
                              <button name="btnValider" type="submit" class="btn btn-success form-control">Valider</button>
                            </div>
                            <div class="col">
                            <button id="btnValiderAjoutCoti" type="boutton" class="btn btn-danger form-control">Annullee</button>
                            </div>
                            <div class="col"></div>
                        </div>
      
                    </form><!-- End General Form Elements -->
      
                  </div>
                </div>
      
              </div>
      
              <div class="col-sm-3">
              </div>
            </div>
      </main>
<!-- Fin du main -->

<?php include("footer.php"); ?>
<?php include("script.php"); ?>
<!-- End #main -->
  

      