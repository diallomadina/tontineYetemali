<?php include("top.php"); ?>
<?php include("header.php"); ?>
<?php include("aside.php"); ?>

<!-- Debut du main -->
      <main class="main" id="main">
        <div class="pagetitle">
          <h1>Nouveau Agent</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
              <li class="breadcrumb-item">Agents</li>
              <li class="breadcrumb-item active">Ajout</li>
            </ol>
          </nav>
        </div>
            <div class="row">
              <div class="col-sm-3"></div>
              <div class="col-sm-6">
                <!-- Partie de l'ajout -->
                <div class="card rounded-4">
                  <h1 class="card-title rounded-4 text-center text-black fs-1 fw-3 bg-warning-light">Nouveau Agent</h1>
                  <div class="card-body">
                    
                    <!-- General Form Elements -->
                    <form method="post" action="" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col">
                          <?php
                            include("php/Agence.php");
                            InsertAgent();
                          ?>
                        </div>
                      </div>
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

                        <div class="row mb-3">
                            <div class="col"></div>
                            <div class="col">
                              <button name="ajouter" type="submit" class="btn btn-success" style="width: 100%;">Valider</button>
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
  

      