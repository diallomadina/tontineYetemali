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
                <div class="row">
                    <div class="col">
                      <div class="col messages">
                          @if(Session::has('success'))
                              <div class="alert alert-success text-center fw-bold fs-24">
                                  {{ Session::get('success') }}
                              </div>
                          @endif

                          @if(Session::has('error'))
                              <div class="alert alert-danger">
                                  {{ Session::get('error') }}
                              </div>
                          @endif

                          @if($errors->any())
                              <div class="alert alert-danger">
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                          @endif
                      </div>
                    </div>
                  </div>
                    <form action="{{ route('searchVersement') }}" method="post" class="form-inline bg-light">
                        @csrf
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
                                <option value="membre">Membre</option>
                                <option value="montant">Montant</option>
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
                    @foreach ($versements as $versement )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $versement->codeVersement }}</td>
                            <td>{{ $versement->tontinesC->nomTontineC.' ('.$versement->tontinesC->codeTontineC.')' }}</td>
                            <td>{{ $versement->membres->nomMembre.' '.$versement->membres->prenomMembre }}</td>
                            <td>{{ $versement->montantVersement }}</td>
                            <td>{{ $versement->dateVersement }}</td>
                        </tr>
                    @endforeach
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

                        <form method="post" action="{{ route('ajoutPayement') }}">
                            @csrf

                            <div class="row mb-4">
                              <label class="col fs-5 ms-3">Tontine</label>
                              <div class="row">
                                <div class="input-group ms-3">
                                    <input type="text" id="searchTontine" class="form-control border-secondary " placeholder="Rechercher une tontine">
                                    <select name="tontine" class="form-select border-secondary" aria-label="Default select example">
                                        <option value="">Cliquez pour choisir</option>
                                        @foreach ($tontinesC as $tontines )
                                            <option value="{{ $tontines->id }}">{{ $tontines->nomTontineC.' ('.$tontines->codeTontineC.')' }}</option>
                                        @endforeach

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
                                                <option value="" selected>Cliquez pour choisir</option>
                                                @foreach ($membres as  $membre)
                                                    <option value="{{ $membre->id }}">{{ $membre->nomMembre.' '.$membre->prenomMembre.' ('.$membre->codeMembre.')' }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                  </div>
                              </div>

                                <div class="row mb-4">
                                  <div class="col">
                                    <label class="text-center fs-5">Montant</label>
                                      <input  name="montant" id="montant" class="form-control border-secondary">

                                  </div>
                                  <div class="col">
                                    <label for="inputDate" class="  text-center fs-5">Date</label>
                                    <input name="date" id="date"  type="date" class="form-control border-secondary">

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

            </div>
          </div>
        </div>
                            <!-- Fin Modal pour ajouter -->
</main>
<!-- <! Fin du main -- -->
@endsection
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script>
    $(document).ready(function () {
      $('#btnPrintCoti').click(function (e) {
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


