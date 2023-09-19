<?php include("top.php"); ?>
<?php include("header.php"); ?>
<?php include("aside.php"); ?>

<!-- Debut du main -->
      <main class="main" id="main">
        <div class="pagetitle">
          <h1>Nouvelle Tontine Collective</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
              <li class="breadcrumb-item">Tontine Collective/li>
              <li class="breadcrumb-item active">Ajout</li>
            </ol>
          </nav>
        </div>
            <div class="row">
              <div class="col-sm-1"></div>
              <div class="col-sm-10">
                <!-- Partie de l'ajout -->
                <div class="card rounded-4">
                  <h1 class="card-title rounded-4 text-center text-black fs-1 fw-3 bg-warning-light">Nouvelle Tontine Collective</h1>
                  <div class="card-body">
                    
                    <!-- General Form Elements -->
                    <form method="post" action="">
                        <div class="form-group">
                          <div class="row">
                            <div class="col"></div>
                            <div class="col">
                              <?php 
                                include("php/Agence.php");
                                InsertTontineCollective();
                              ?>
                            </div>
                            <div class="col"></div>
                          </div>
                          <div class="row mb-4">
                            
                            <div class="col">
                              <label class="fs-5">Agent</label>
                              <select name="agent" id="" class="form-select border-secondary">
                                  <?php
                                    include("php/connection.php");
                                    $request = "SELECT idAgent, nomAgent, prenomAgent from Agent";
                                    $result = $con->query($request);
                                    while($agent= Mysqli_fetch_array($result)){
                                      $idAgent = $agent['idAgent'];
                                      echo "<option value='$idAgent'>".$agent['nomAgent']." ".$agent['prenomAgent']."</option>";
                                    }
                                  ?>
                              </select>
                            </div>

                            <div class="col">
                              <label class="fs-5">Nom</label>
                              <input name="nom" type="text" class="form-control border-secondary" placeholder="Nom de la tontine">
                            </div>
                            
                          </div>
 
                          <div class="row mb-4">
                            
                            <div class="col">
                              <label for="inputDate" class="fs-5">Debut</label>
                              <input name="debut"  type="date" class="form-control border-secondary">
                            </div>
                            
                            <div class="col">
                              <label class="fs-5">Montant</label>
                              <input name="montant" type="number" class="form-control border-secondary" placeholder="Montant de la tontine">
                            </div>
                          </div>

                        <div class="row mb-4">
                            
                            <div class="col">
                              <label for="" class="fs-5">Frequence</label>
                              <select name="frequence" id="freqTontine" class="form-select border-secondary">
                                <option value="1" selected>Jours</option>
                                <option value="7">Semaines</option>
                                <option value="30">Mois</option>
                                <option value="12">Annee</option>
                              </select>
                            </div>
                            
                            <div class="col">
                              <label for="inputDate" class="fs-5">Participant</label>
                              <input name="participant"  type="number" class="form-control border-secondary" placeholder="Nombre de participants">
                            </div>
                        </div>
                        <div class="row">
                          <div class="col"></div>
                          <div class="col">
                          <button name="ajouter" type="submit" class="btn btn-success form-control">Ajouter</button>
                          </div>
                          <div class="col"></div>
                        </div>
                        
                        <div class="row mb-4">
                          <?php AddParticipation(); ?>
                            <div class="col">
                              <label>Tontine</label>
                              <select name="tontine" id="" class="form-select border-secondary">
                                  <?php
                                    include("php/connection.php");
                                    $request = "SELECT idTontineCollectif, nomTontineCollective, codeTontineCollective from tontineCollective";
                                    $result = $con->query($request);
                                    while($agent= mysqli_fetch_array($result)){
                                      $idAgent = $agent['idTontineCollectif'];
                                      echo "<option value='$idAgent'>"."(".$agent['codeTontineCollective'].") ".$agent['nomTontineCollective']."</option>";
                                    }
                                  ?>
                              </select>
                            </div>
                            <div class="col">
                              <label class="">Membre</label>
                              <select name="membre" id="" class="form-select border-secondary">
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
                            <div class="col">
                              <label for="" class=" fs-5"></label>
                              <button name="associer" type="submit" class="btn btn-success form-control">Associer</button>
                            </div>

                            <div class="col">
                              <label for=""></label>
                              <button id="btnValiderAjoutCoti" type="button" class="btn btn-success form-control">Inviter</button>
                            </div>
                            
                           
                            
                        </div>
      
                    </form><!-- End General Form Elements -->
      
                  </div>
                </div>
      
              </div>
      
              <div class="col-sm-1">
              </div>
            </div>
      </main>
<!-- Fin du main -->

<?php include("footer.php"); ?>
<?php include("script.php"); ?>
<!-- End #main -->
  

     