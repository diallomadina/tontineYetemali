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
                    <form>
                      <div class="row mb-4 mt-4">
                        <label class="col-sm-3  text-center fs-5">Agent</label>
                        <div class="col-sm-7">
                          <select id="selectAgent" class="form-select border-secondary" aria-label="Default select example">
                            <option selected >Selectionnez l'Agent</option>
                            <option value="1">Agent 1</option>
                            <option value="2">Agent 2</option>
                            <option value="3">Agent 3</option>
                          </select>
                          <p id="pErAgentAgent" class="text-danger d-none">Veuillez selectionner une Agent</p>
                        </div>
                        
                        <div class="col-sm-2"></div>
                      </div>
                        
                      <div class="row mb-4 mt-4">
                        <label class="col-sm-3  text-center fs-5">Membre</label>
                        <div class="col-sm-7">
                          <select id="selectAgent" class="form-select border-secondary" aria-label="Default select example">
                            <option selected >Selectionnez le membre</option>
                            <option value="1">Membre 1</option>
                            <option value="2">Membre 2</option>
                            <option value="3">Membre 3</option>
                          </select>
                          <p id="pErAgentAgent" class="text-danger d-none">Veuillez selectionner un membre</p>
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
                            <label class="col-sm-3  text-center fs-5">Debut</label>
                            <div class="col-sm-7">
                              <input id="txtPrenomAgent" type="date" class="form-control border-secondary">
                              <p id="pErPrenomAgent" class="text-danger d-none">Veuillez saisir un nom</p>
                            </div>
                          </div>
                          <div class="col-sm-2"></div>
                        </div>
                    
                        <div class="form-group">
                          <div class="row mb-4">
                            <label class="col-sm-3  text-center fs-5">Montant</label>
                            <div class="col-sm-7">
                              <input id="txtAdresseAgent" type="number" class="form-control border-secondary">
                              <p id="pErAdresseAgent" class="text-danger d-none">Veuillez saisir un montant</p>
                            </div>
                          </div>
                          <div class="col-sm-2"></div>
                        </div>

                        <div class="row mb-4">
                            <div class="col"></div>
                            <div class="col">
                              <button id="btnValiderAjoutAgent" type="button" class="btn btn-success form-control">Valider</button>
                            </div>
                            <div class="col">
                              <button id="btnValiderAjoutAgent" type="button" class="btn btn-danger form-control">Annulée</button>
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


