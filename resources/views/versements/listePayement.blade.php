@extends('master.layout')
@section('content')
<!-- Debut du main -->
<main class="main" id="main">
    <div class="pagetitle">
      <h1>Historique des Versement</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
          <li class="breadcrumb-item">Versement</li>
          <li class="breadcrumb-item active">Historique</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

            <div class="row">
              <div class="col">

              </div>
            </div>
            <div class="row">
                    <form action="" method="post" class="form-inline bg-light">

                        <div class="row mt-3">
                          <div class="col-sm">
                            <label for=""></label>
                            <input type="date" name="date1" id="dtHistoriqueUn" class="form-control">
                          </div>
                          <div class="col-sm">
                            <label for=""></label>
                            <input type="date" name="date2" id="dtHistoriqueDeux" class="form-control">
                          </div>
                          <div class="col-sm">
                            <div class="form-group">
                             <label for=""></label>
                             <select name="choix" id="" class="form-select">
                                <option value="" selected>Choisissez l'option</option>
                                <option value="identifiant">Identifiant</option>
                                <option value="tontine">Tontine</option>
                                <option value="Membre">Membre</option>
                                <option value="Montant">Montant</option>
                             </select>
                            </div>
                           </div>
                           <div class="col-sm">
                               <div class="form-group">
                                <label for=""></label>
                                <input name="txtRecherche" type="text" class="form-control bi bi-search" id="txtRechercheCoti">
                               </div>
                            </div>
                           <div class="col-sm">
                              <div class="form-group">
                                  <label for="form-label"></label>
                                  <button name="filtrer" type="submit" class="form-control bg-warning-light text-center">
                                     <i class="bi bi-filter"></i>Filtrer
                                  </button>
                              </div>
                           </div>
                           <div class="col-sm ">
                              <label for=""></label>
                              <button name="actualiser" type="submit" class="form-control bg-warning-light text-center">
                                 <i class="bi bi-repeat">Actualiser</i>
                              </button>
                            </div>
                           <!-- Colonne pour bouton ajouter -->
                           <div class="col-sm ">
                              <div class="form-group">
                                  <label for=""></label>
                                  <button id="btnNewCoti" type="button" class="bg-warning-light text-center form-control"  data-bs-toggle="modal" data-bs-target="#modalAjoutPayement">
                                    <i class="bi bi-plus"></i>Nouveau
                                   </button>
                              </div>

                           </div>
                           <!-- Fin pour ajouter  -->
                           <div class="col-sm ">
                              <label for=""></label>
                              <button id="btnPrintCoti" type="button" class="btn  form-control bg-warning-light text-center">
                                 <i class="bi bi-printer"></i>Imprimer
                              </button>
                           </div>
                        </div>
                   </div>
        <div class="row mt-5">


             <!-- Table -->
             <table id="tableAffichageCoti" class=" text-center table table-bordered table-responsive table-compressed table-hover table-striped">
                <thead class="bg-success">
                   <tr class="bg-success">
                         <th class="text-center bg-success text-white">N°</th>
                         <th class="text-center bg-success text-white">Identifiant</th>
                         <th class="text-center bg-success text-white">Tontine</th>
                         <th class="text-center bg-success text-white">Membre</th>
                         <th class="text-center bg-success text-white">Montant</th>
                         <th class="text-center bg-success text-white">Date</th>

                   </tr>
                </thead>
                <tbody id="tbodyAfficheTontine">

                </tbody>
            </table>
                  <!-- End Table  -->
        </div>
            </form>


         <!-- Le modal pour ajouter -->
        <div class="modal fade" id="modalAjoutPayement" tabindex="-1">
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
                <!-- General Form Elements -->

                      <!-- Partie de l'ajout -->
                    <div class="card rounded-4">
                      <h1 class="card-title rounded-4 text-center text-black fs-1 fw-3 bg-warning-light">Nouveau Payement</h1>
                      <div class="card-body">

                      <form method="post" action="">

                        <div class="row mb-4">
                          <label class="col-sm-3  text-center fs-5">Tontine</label>
                          <div class="col-sm-7">
                            <select name="tontine" class="form-select border-secondary" aria-label="Default select example">

                            </select>
                          </div>

                          <div class="col-sm-2"></div>
                        </div>
                          <div class="row mb-4">
                              <label class="col-sm-3  text-center fs-5">Membre</label>
                              <div class="col-sm-7">
                                <select name="membre" class="form-select border-secondary" aria-label="Default select example">

                                </select>
                              </div>
                              <div class="col-sm-2"></div>
                          </div>

                          <div class="form-group">
                            <div class="row mb-4">
                              <label class="col-sm-3  text-center fs-5">Montant</label>
                              <div class="col-sm-7">
                                <input  name="montant" class="form-control border-secondary">
                              </div>
                            </div>
                            <div class="col-sm-2"></div>
                          </div>

                          <div class="row mb-4">
                            <label for="inputDate" class="col-sm-3  text-center fs-5">Date</label>
                            <div class="col-sm-7">
                              <input name="debut"  type="date" class="form-control border-secondary">
                            </div>
                            <div class="col-sm-2"></div>
                          </div>

                          <div class="modal-footer">
                            <button type="submit" name="btnValider" class="btn bg-warning-light boutton">Valider</button>
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fermer</button>
                          </div>

                      </form><!-- End General Form Elements -->

                      </div>
                    </div>


              </div>

            </div>
          </div>
        </div>
                            <!-- Fin Modal pour ajouter -->
</main>
<!-- <! Fin du main -- -->
@endsection

<script>
    $(document).ready(function () {
      $('#btnPrintCoti').click(function (e) {
        e.preventDefault();
        Alert("dakj")
      });
 });

</script>
<!-- End #main -->

