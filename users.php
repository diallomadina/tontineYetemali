<?php include("top.php"); ?>
<?php include("header.php"); ?>
<?php include("aside.php"); ?>

<!-- Debut du main -->
<main class="main" id="main">
    <div class="pagetitle">
      <h1>Gestion des utilisateurs</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
          <li class="breadcrumb-item">Utilisateurs</li>
          <li class="breadcrumb-item active">Liste</li>
        </ol>
      </nav>
    </div>
        <div class="container">
         
            
              <div class="row">
                <div class="col">
                    <?php 
                        include("php/Agence.php");
                        InsertUser();
                    ?>
                </div>
              </div>
              <div class="row">
                   <form action="" class="form-inline bg-light">
                      <div class="row">
                        <div class="col-sm">
                          <select name="" id="" class="form-select border-secondary">
                              <option value="id" selected>Identifiant</option>
                              <option value="username">Username</option>
                              <option value="type">Type</option>
                          </select>
                        </div>
                        <div class="col-sm">
                          <input type="text" class="form-control border-secondary" placeholder="Saisissez">
                        </div>
                        <div class="col-sm">
                          <button type="button" class="bg-warning-light form-control border-secondary">
                            <i class="bi bi-filter"></i> Filtrer
                          </button>
                        </div>
                        <div class="col-sm">
                          <button type="button" class="bg-warning-light form-control border-secondary">
                            <i class="bi bi-repeat"></i> Actualiser
                          </button>
                        </div>
                        <div class="col-sm">
                          <button type="button" class="bg-warning-light form-control border-secondary"  data-bs-toggle="modal" data-bs-target="#modalAjoutUtilisateur">
                            <i class="bi bi-plus"></i> Ajouter
                          </button>
                        </div>
                        <div class="col-sm">
                          <button type="button" class="bg-warning-light form-control border-secondary">
                            <i class="bi bi-printer"></i> Imprimer
                          </button>
                        </div>
                      </div>
                    </form> 
             </div>
              <div class="row mt-5">     
                    <!-- Table -->
                    <table id="tableUser" class="table table-bordered table-responsive table-compressed table-hover table-striped">
                        <thead class="bg-success">
                        <tr class="bg-success">
                                <th class="text-center bg-success text-white">N°</th>
                                <th class="text-center bg-success text-white">Identifiant</th>
                                <th class="text-center bg-success text-white">Username</th>
                                <th class="text-center bg-success text-white">Password</th>
                                <th class="text-center bg-success text-white">Type</th>
                                <th class="text-center bg-success text-white" colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                           <?php DisplayUser(); ?>
                        </tbody>
                    </table>
                        <!-- End Table  -->

                         <!-- Le modal pour ajouter -->
                         <div class="modal fade" id="modalAjoutUtilisateur" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                              <div class="modal-header text-center">
                                  
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                              <div class="d-flex justify-content-center py-4">
                                  <a href="#" class="logo d-flex align-items-center w-auto">
                                  <img src="assets/img/yetemali.jpg" alt="">
                                  <span class="d-none d-lg-block text-success">Yete</span>
                                  <span class="d-none d-lg-block text-warning">mali</span>
                                  </a>
                              </div>
                              <div class="card mt-2 rounded-4">
                                <h1 class="card-title rounded-4 text-center text-black fs-1 fw-3 bg-warning-light">Nouveau Utilisateur</h1>
                                <div class="card-body">
                                  
                                  <!-- General Form Elements -->
                                  <form method="post" action="">
                                    <div class="row mb-4 mt2">
                                      <label class="col-sm-5  text-center fs-5">Username</label>
                                      <div class="col-sm-6">
                                        <input type="text" name="username" class="form-control border-secondary">
                                      </div>
                                      <div class="col-sm-1"></div>
                                    </div>
                                      <div class="row mb-4">
                                          <label class="col-sm-5  text-center fs-5">Mot de Passe</label>
                                          <div class="col-sm-6">
                                           <input name="passwrd" type="text" class="form-control border-secondary">
                                          </div>
                                          <div class="col-sm-1"></div>
                                      </div>
                                      <div class="row mb-4">
                                        <label class="col-sm-5  text-center fs-5">Type</label>
                                        <div class="col-sm-6">
                                         <select name="typeUtilisateur" id="" class="form-select">
                                            <option value="admin" selected>Admin</option>
                                            <option value="agent">Agent</option>
                                            <option value="membre">Membre</option>
                                         </select>
                                        </div>
                                        <div class="col-sm-1"></div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fermer</button>
                                        <button type="submit" name="Valider" class="btn btn-success boutton">Valider</button>
                                      </div>
                                  </form><!-- End General Form Elements -->
                                  
              
                                </div>
                              </div>
                              </div>
                              
                          </div>
                          </div>
                      </div>
                      <!-- Fin Modal pour ajouter -->
                       <!-- Le modal pour modifier -->
                       <div class="modal fade" id="modalModifAgence" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <div class="d-flex justify-content-center py-4">
                                <a href="#" class="logo d-flex align-items-center w-auto">
                                <img src="assets/img/yetemali.jpg" alt="">
                                <span class="d-none d-lg-block text-success">Yete</span>
                                <span class="d-none d-lg-block text-warning">mali</span>
                                </a>
                            </div>
                            <div class="card mt-2 rounded-4">
                              <h1 class="card-title rounded-4 text-center text-black fs-1 fw-3 bg-warning-light">Modification de l'agence</h1>
                              <div class="card-body">
                                
                              <form method="post" action="">
                                <input type="hidden" name="CodeUser" id="CodeUser">
                                    <div class="row mb-4 mt2">
                                      <label class="col-sm-5  text-center fs-5">Username</label>
                                      <div class="col-sm-6">
                                        <input type="text" name="mUsername" id="mUserName" class="form-control border-secondary">
                                      </div>
                                      <div class="col-sm-1"></div>
                                    </div>
                                      <div class="row mb-4">
                                          <label class="col-sm-5  text-center fs-5">Mot de Passe</label>
                                          <div class="col-sm-6">
                                           <input name="mPasswrd" id="mPasswrd" type="text" class="form-control border-secondary">
                                          </div>
                                          <div class="col-sm-1"></div>
                                      </div>
                                      <div class="row mb-4">
                                        <label class="col-sm-5  text-center fs-5">Type</label>
                                        <div class="col-sm-6">
                                         <select name="mTypeUtilisateur" id="mTypeUtilisateur" class="form-select">
                                            <option value="admin" selected>Admin</option>
                                            <option value="agent">Agent</option>
                                            <option value="membre">Membre</option>
                                         </select>
                                        </div>
                                        <div class="col-sm-1"></div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fermer</button>
                                        <button type="submit" name="Valider" class="btn btn-success boutton">Valider</button>
                                      </div>
                                  </form><!-- End General Form Elements -->
                                
            
                              </div>
                            </div>
                            </div>
                           
                        </div>
                        </div>
                    </div>
                    <!-- Fin Modal pour modifier l'agence -->

                 
                 <!--Fin modal de confirmation de suppression -->
                </div>
           
          </div>
        </div>
  </main>
<!-- Fin du main -->
<script src="assets/js/jquery.min.js"></script>
<script>
  $(document).ready(function () {

// Pour récupérer les données de l'agence
var tableUser = document.getElementById('tableUser');

function editerInfoUser() {
    for (var i = 0; i < tableUser.rows.length; i++) {
        tableUser.rows[i].onclick = function () {
            document.getElementById("CodeUser").value = this.cells[1].innerHTML;
            document.getElementById("mUserName").value = this.cells[2].innerHTML;
            document.getElementById("mPasswrd").value = this.cells[3].innerHTML;
            document.getElementById("mTypeUtilisateur").value = this.cells[4].innerHTML;
        };
    }
}

$('.editUser').click(function (e) {
    e.preventDefault();
    editerInfoUser();
});

// Pour récupérer les données de la tontine individuelle


});
</script>
<?php include("footer.php"); ?>
<?php include("script.php"); ?>
<!-- End #main -->


