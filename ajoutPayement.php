<?php include("top.php"); ?>
<?php include("header.php"); ?>
<?php include("aside.php"); ?>

<!-- Debut du main -->
      <main class="main" id="main">
        <div class="pagetitle">
          <h1>Nouveau Payement</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
              <li class="breadcrumb-item">Payement</li>
              <li class="breadcrumb-item active">Ajout</li>
            </ol>
          </nav>
        </div>
            <div class="row">
              <div class="col-sm-3"></div>
              <div class="col-sm-6">
                <!-- Partie de l'ajout -->
                <div class="card rounded-4">
                  <h1 class="card-title rounded-4 text-center text-black fs-1 fw-3 bg-warning-light">Effectuer un payement</h1>
                  <div class="card-body">
                    
                  <form method="post" action="">
                      <div class="row">
                        <div class="col">
                          <?php 
                            include("php/Agence.php");
                            insertPayement();
                          ?>
                        </div>
                      </div>
                      <div class="row mb-4">
                        <label class="col fs-5 ms-3">Tontine</label>
                        <div class="row">
                          <div class="input-group ms-3">
                              <input type="text" id="searchTontine" class="form-control border-secondary " placeholder="Rechercher une tontine">
                              <select name="tontine" class="form-select border-secondary" aria-label="Default select example">
                                  <option value="0" selected>Cliquez pour choisir</option>  
                                  <?php
                                    include("php/connection.php");
                                    $request = "SELECT idTontineCollectif, nomTontineCollective, codeTontineCollective from tontineCollective";
                                    $result = $con->query($request);
                                    while($agent= Mysqli_fetch_array($result)){
                                      $idAgent = $agent['idTontineCollectif'];
                                      echo "<option value='$idAgent'>"."(".$agent['codeTontineCollective'].") ".$agent['nomTontineCollective']."</option>";
                                    }
                                  ?>
                              </select>
                          </div>
                        </div>
                        
                      </div>
                        <div class="row mb-4">
                            <label class="col fs-5 ms-3">Membre</label>
                            <div class="row">
                                  <div class="ms-3 input-group">
                                  <input type="text" id="searchMembre" class="form-control border-secondary" placeholder="Rechercher un menbre" >
                                  <select name="membre" class="form-select border-secondary" aria-label="Default select example">
                                    <option value="0" selected>Cliquez pour choisir</option>  
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
                       
                          <div class="row mb-4">
                            <div class="col">
                              <label class="text-center fs-5">Montant</label>
                                <input  name="montant" class="form-control border-secondary">
                            </div>
                            <div class="col">
                              <label for="inputDate" class="  text-center fs-5">Date</label>
                              <input name="debut"  type="date" class="form-control border-secondary">
                            </div>
                          </div>
                    
                        

                        <div class="row mb-4">
                            <div class="col"></div>
                            <div class="col">
                              <button name="btnValider" type="submit" class="btn btn-success form-control">Valider</button>
                            </div>
                            <div class="col">
                            <button id="annullee" type="button" class="btn btn-danger form-control">Annullee</button>
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
<script>
  $(document).ready(function () {
    $('#annullee').click(function (e) { 
      e.preventDefault();
      
    });

    function updateSelectOptions(searchInput, selectElement) {
            var searchTerm = searchInput.val().toLowerCase();
            selectElement.find('option').each(function () {
                var optionText = $(this).text().toLowerCase();
                if (optionText.includes(searchTerm)) {
                    $(this).show();
                   
                } else {
                    $(this).hide();
                }
            });
        }

        // Écouteurs d'événements pour les champs de recherche
        $('#searchTontine').on('input', function () {
            updateSelectOptions($(this), $('select[name="tontine"]'));
        });

        $('#searchMembre').on('input', function () {
            updateSelectOptions($(this), $('select[name="membre"]'));
        });
  });

</script>

<!-- End #main -->
