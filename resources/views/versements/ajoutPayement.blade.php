@extends('master.layout')
@section('content')
<!-- Debut du main -->
<main class="main" id="main">
  <div class="pagetitle">
    <h1>Nouveau Versement</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
        <li class="breadcrumb-item">Versement</li>
        <li class="breadcrumb-item active">Ajout</li>
      </ol>
    </nav>
  </div>
      <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
          <!-- Partie de l'ajout -->
          <div class="card rounded-4">
            <h1 class="card-title rounded-4 text-center text-black fs-1 fw-3 bg-warning-light">Effectuer un Versement</h1>
            <div class="card-body">

            <form method="post" action="{{ route('ajoutPayement') }}">
                @csrf
                <div class="row">
                  <div class="col">

                  </div>
                </div>
                <div class="row mb-4">
                  <label class="col fs-5 ms-3">Tontine</label>
                  <div class="row">
                    <div class="input-group ms-3">
                        <input type="text" id="searchTontine" class="form-control border-secondary " placeholder="Rechercher une tontine">
                        <select name="tontine" class="form-select border-secondary" aria-label="Default select example">
                            <option value="0" selected>Cliquez pour choisir</option>

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

                              </select>
                            </div>
                      </div>
                  </div>

                    <div class="row mb-4">
                      <div class="col">
                        <label class="text-center fs-5">Montant</label>
                          <input  name="montant" id="montant" class="form-control border-secondary">
                          @error('montant')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="col">
                        <label for="inputDate" class="  text-center fs-5">Date</label>
                        <input name="debut" id="debut"  type="date" class="form-control border-secondary">
                        @error('debut')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
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

        <div class="col-lg-3">
        </div>
      </div>
</main>
<!-- Fin du main -->
@endsection
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script>
  $(document).ready(function () {
    $('#annullee').click(function (e) {
      $('#debut').val("");
      $('#montant').val("");

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
