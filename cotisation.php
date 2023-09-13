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
                    <form>
                      <div class="row mb-4 mt-4">
                        <label class="col-sm-3  text-center fs-5">Tontine</label>
                        <div class="col-sm-7">
                          <select id="selectTontineCoti" class="form-select border-secondary" aria-label="Default select example">
                            <option selected >Selectionnez la tontine</option>
                            <option value="1">Tontine 1</option>
                            <option value="2">Tontine 2</option>
                            <option value="3">Tontine 3</option>
                          </select>
                          <p id="pErTontineCoti" class="text-danger d-none">Veuillez selectionner une tontine</p>
                        </div>
                        
                        <div class="col-sm-2"></div>
                      </div>
                        <div class="row mb-4">
                            <label class="col-sm-3  text-center fs-5">Membre</label>
                            <div class="col-sm-7">
                              <select id="selectMembreCoti" class="form-select border-secondary" aria-label="Default select example">
                                <option selected >Selectionnez le membre</option>
                                <option value="1">Membre 1</option>
                                <option value="2">Membre 2</option>
                                <option value="3">Membre 3</option>
                              </select>
                              <p id="pErMembre" class="text-danger d-none">Veuillez selectionner un menbre</p>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                       
                        <div class="form-group">
                          <div class="row mb-4">
                            <label class="col-sm-3  text-center fs-5">Montant</label>
                            <div class="col-sm-7">
                              <input id="txtMontantCoti" type="number" class="form-control border-secondary">
                              <p id="pErMontant" class="text-danger d-none">Veuillez saisir un montant</p>
                            </div>
                          </div>
                          <div class="col-sm-2"></div>
                        </div>
                    
                        <div class="row mb-4">
                          <label for="inputDate" class="col-sm-3  text-center fs-5">Date</label>
                          <div class="col-sm-7">
                            <input id="dtCoti"  type="date" class="form-control border-secondary">
                            <p id="pErDate" class="text-danger d-none">La date ne doit pas contenir des lettres</p>
                          </div>
                          <div class="col-sm-2"></div>
                        </div>

                        <div class="row mb-4">
                            <div class="col"></div>
                            <div class="col">
                              <button id="btnValiderAjoutCoti" type="button" class="btn btn-success" style="width: 100%;">Valider</button>
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
  

      