  <?php include("top.php"); ?>
  <?php include("header.php"); ?>
  <?php include("aside.php"); ?>

  <!-- Debut du main -->
    <main id="main" class="main">
      <div class="pagetitle">
          <h1>Nouvelle tontine individuelle</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
              <li class="breadcrumb-item">Tontine individuelle</li>
              <li class="breadcrumb-item active">Ajout</li>
            </ol>
          </nav>
      </div>

            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                  <!-- Partie de l'ajout -->
                  <div class="card rounded-4">
                    <h1 class="card-title rounded-4 text-center text-black fs-3 fw-3 bg-warning-light">Nouvelle tontine individuelle</h1>
                    <div class="card-body">
                      
                      <!-- General Form Elements -->
                      <form method="post" action="">
                        <div class="row">
                          <div class="col">
                            <?php 
                              include("php/Agence.php");
                              InsertTontineInd();
                            ?>
                          </div>
                        </div>
                        <div class="row mb-4">
                          <label class="col-sm-3  text-center fs-5">Agent</label>
                          <div class="col-sm-7">
                            <select name="agent" id="agentSelect" class="form-select border-secondary" aria-label="Default select example">
                               <option value="">Sélectionner un agent</option>
                                <?php
                                  // Ajoutez l'ID de l'agent en tant qu'attribut data
                                  $agents = listAgent();
                                  foreach ($agents as $agent) {
                                    echo '<option value="' . $agent['idAgent'] . '" data-id="' . $agent['idAgent'] . '">' . $agent['nomAgent'] . '</option>';
                                  }
                                ?>
                            </select>
                            
                          </div>
                          
                          <div class="col-sm-2"></div>
                        </div>
                          
                        <div class="row mb-4 mt-4">
                          <label class="col-sm-3  text-center fs-5">Membre</label>
                          <div class="col-sm-7">
                            <select name="membre" id="membreSelect" class="form-select border-secondary" aria-label="Default select example">
                              <?php
                                if(isset($_POST['idAgent'])){
                                  $selectedIdAgent = $_POST['idAgent'];
                                  listMembre($selectedIdAgent);
                                }
                                
                              ?>
                            </select>
                            
                          </div>
                          
                          <div class="col-sm-2"></div>
                        </div>

                          <div class="form-group">
                            <div class="row mb-4">
                              <label class="col-sm-3  text-center fs-5">Nom</label>
                              <div class="col-sm-7">
                                <input name="nom" type="text" class="form-control border-secondary">
                                
                              </div>
                            </div>
                            <div class="col-sm-2"></div>
                          </div>

                          <div class="form-group">
                            <div class="row mb-4">
                              <label class="col-sm-3  text-center fs-5">Debut</label>
                              <div class="col-sm-7">
                                <input name="debut" type="date" class="form-control border-secondary">
                                
                              </div>
                            </div>
                            <div class="col-sm-2"></div>
                          </div>
                      
                          <div class="form-group">
                            <div class="row mb-4">
                              <label class="col-sm-3  text-center fs-5">Montant</label>
                              <div class="col-sm-7">
                                <input name="montant" type="number" class="form-control border-secondary">
                                
                              </div>
                            </div>
                            <div class="col-sm-2"></div>
                          </div>

                          <div class="row mb-4">
                              <div class="col"></div>
                              <div class="col">
                                <button name="btnValider" type="submit" class="btn btn-success form-control">Valider</button>
                              </div>
                              <div class="col">
                                <button name="btnAnulle" id="bntAnnulee" type="button" class="btn btn-danger form-control">Annulée</button>
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
      $('#bntAnnulee').click(function (e) { 
        e.preventDefault();
        alert("jkejw");
      });
        $('#agentSelect').change(function (e) { 
          e.preventDefault();
          var selectedIdAgent = $(this).find(':selected').data('id');
              $.ajax({
                type: "POST",
                url: "php/Agence.php",
                data:{ idAgent: selectedIdAgent},
                dataType: "html",
                success: function (response) {
                  $('#membreSelect').html(response);
                }
              });
        });

    });
  </script>
  <!-- End #main -->


