<?php include("top.php"); ?>
<?php include("header.php"); ?>
<?php include("aside.php"); ?>

<!-- Debut du main -->
<main class="main" id="main">
  <div class="pagetitle">
    <h1>Nouvelle Agence</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
        <li class="breadcrumb-item">Agence</li>
        <li class="breadcrumb-item active">Nouvelle</li>
      </ol>
    </nav>
  </div>
      <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 mt-3">

          <div class="card mt-2 rounded-4">
            <h1 class="card-title rounded-4 text-center text-black fs-1 fw-3 bg-warning-light">Nouvelle agence</h1>
            <div class="card-body">
              
              <!-- General Form Elements -->
              <form method="Post" action="">
                <div class="row mt-1">
                   
                    <div class="col">
                        <?php
                            include("php/Agence.php");
                            InsertAgence();
                        ?>
                    </div>
                    
                </div>
                <div class="row mb-4">
                  <label class="col-sm-4  text-center fs-5">Agence</label>
                  <div class="col-sm-6">
                    <input name="nomAgence" type="text" class="form-control border-secondary">
                  </div>
                  <div class="col-sm-2"></div>
                </div>
                  <div class="row mb-4">
                      <label class="col-sm-4  text-center fs-5">Adresse</label>
                      <div class="col-sm-6">
                       <input name="adresseAgence" type="text" class="form-control border-secondary">
                      </div>
                      <div class="col-sm-2"></div>
                  </div>
                  <div class="row mb-4">
                    <label class="col-sm-4  text-center fs-5">Telephone</label>
                    <div class="col-sm-6">
                     <input name="telAgence" type="tel" class="form-control border-secondary">
                    </div>
                    <div class="col-sm-2"></div>
                  </div>

              
                  <div class="row mb-4">
                    <div class="col"></div>
                    <div class="col">
                      <button type="submit" name="btnValiderAgence" class="btn btn-success form-control">Valider</button>
                    </div>
                    <div class="col">
                      <button type="submit" name="btnAnnulerAgence" class="btn btn-secondary form-control">Annuler</button>
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
  

<span class='alert alert-danger'>L'un des champ ne doit pas etre vide</span>