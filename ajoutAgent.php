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
                    <form>
                      <div class="row mb-4 mt-4">
                        <label class="col-sm-3  text-center fs-5">Agence</label>
                        <div class="col-sm-7">
                          <select id="selectAgenceAgent" class="form-select border-secondary" aria-label="Default select example">
                            <option selected >Selectionnez l'Agence</option>
                            <option value="1">Agence 1</option>
                            <option value="2">Agence 2</option>
                            <option value="3">Agence 3</option>
                          </select>
                          <p id="pErAgenceAgent" class="text-danger d-none">Veuillez selectionner une Agence</p>
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
                            <label class="col-sm-3  text-center fs-5">Prenom</label>
                            <div class="col-sm-7">
                              <input id="txtPrenomAgent" type="number" class="form-control border-secondary">
                              <p id="pErPrenomAgent" class="text-danger d-none">Veuillez saisir un prenom</p>
                            </div>
                          </div>
                          <div class="col-sm-2"></div>
                        </div>
                    
                        <div class="form-group">
                          <div class="row mb-4">
                            <label class="col-sm-3  text-center fs-5">Adresse</label>
                            <div class="col-sm-7">
                              <input id="txtAdresseAgent" type="number" class="form-control border-secondary">
                              <p id="pErAdresseAgent" class="text-danger d-none">Veuillez saisir une adresse</p>
                            </div>
                          </div>
                          <div class="col-sm-2"></div>
                        </div>

                        <div class="form-group">
                          <div class="row mb-4">
                            <label class="col-sm-3  text-center fs-5">Telephone</label>
                            <div class="col-sm-7">
                              <input id="txtTelAgent" type="number" class="form-control border-secondary">
                              <p id="pErTelAgent" class="text-danger d-none">Veuillez saisir une adresse</p>
                            </div>
                          </div>
                          <div class="col-sm-2"></div>
                        </div>

                        <div class="row mb-4">
                            <div class="col"></div>
                            <div class="col">
                              <button id="btnValiderAjoutAgent" type="button" class="btn btn-success" style="width: 100%;">Valider</button>
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
  

      