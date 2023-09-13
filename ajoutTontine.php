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
                    <form>
                        <div class="form-group">
                          <div class="row mb-4">
                            
                            <div class="col">
                              <label class="fs-5">Agent</label>
                              <select name="" id="" class="form-select border-secondary">
                                <option value="" selected>Selectionnez l'agent</option>
                                <option value="">Agent 1</option>
                                <option value="">Agent 2</option>
                                <option value="">Agent 3</option>
                              </select>
                              <p id="pErNomTontine" class="text-danger d-none">Veuillez saisir un nom</p>
                            </div>

                            <div class="col">
                              <label class="fs-5">Nom</label>
                              <input id="txtNomTontine" type="text" class="form-control border-secondary" placeholder="Nom de la tontine">
                              <p id="pErNomTontine" class="text-danger d-none">Veuillez saisir un nom</p>
                            </div>
                            
                          </div>
 
                          <div class="row mb-4">
                            
                            <div class="col">
                              <label for="inputDate" class="fs-5">Debut</label>
                              <input id="dtdateDebut"  type="date" class="form-control border-secondary">
                              <p id="pErDate" class="text-danger d-none">La date ne doit pas contenir des lettres</p>
                            </div>
                            
                            <div class="col">
                              <label class="fs-5">Montant</label>
                              <input id="txtMontantTontine" type="number" class="form-control border-secondary" placeholder="Montant de la tontine">
                              <p id="pErMontantTontine" class="text-danger d-none">Veuillez saisir un montant</p>
                            </div>
                          </div>

                        <div class="row mb-4">
                            
                            <div class="col">
                              <label for="inputDate" class="fs-5">Frequence</label>
                              <select name="" id="freqTontine" class="form-select border-secondary">
                                <option value="jour" selected>Jours</option>
                                <option value="semaine">Semaines</option>
                                <option value="mois">Mois</option>
                                <option value="annee">Annee</option>
                              </select>
                              <p id="pErFreqTontine" class="text-danger d-none">Veuillez definir une frequence</p>
                            </div>
                            
                            <div class="col">
                              <label for="inputDate" class="fs-5">Participant</label>
                              <input id="dtPaticipantTontine"  type="number" class="form-control border-secondary" placeholder="Nombre de participants">
                              <p id="pErParticipantTontine" class="text-danger d-none">Veuillez definir le nombre de Participants</p>
                            </div>
                        </div>
                        <h3 class="text-center">Assoier les membres a la tontine collective</h3>
                        <div class="row mb-4">
                            <div class="col-5">
                              <label class="">Membre</label>
                              <select name="" id="" class="form-select border-secondary">
                                <option value="" selected>Choisir un membre</option>
                                <option value="">Membre 1</option>
                                <option value="">Membre 2</option>
                                <option value="">Membre 3</option>
                              </select>
                              <p id="pErNomTontine" class="text-danger d-none">Veuillez saisir un nom</p>
                            </div>
                            <div class="col">
                              <label for="" class=" fs-5"></label>
                              <button id="btnValiderAjoutCoti" type="button" class="btn btn-success form-control">Associer</button>
                            </div>

                            <div class="col">
                              <label for=""></label>
                              <button id="btnValiderAjoutCoti" type="button" class="btn btn-success form-control">Inviter</button>
                            </div>
                            
                            <div class="col">
                              <label for=""></label>
                              <button id="btnValiderAjoutCoti" type="button" class="btn btn-success form-control">Valider</button>
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
  

     