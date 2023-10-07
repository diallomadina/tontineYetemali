@extends('master.layout')
@section('content')
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
                <h1 class="card-title rounded-4 text-black fs-3 fw-3 bg-warning-light">Nouvelle tontine individuelle</h1>
                <div class="card-body">

                  <!-- General Form Elements -->
                  <form method="post" action="{{ route('ajoutTontineInd') }}">
                    @csrf
                    <div class="row">
                      <div class="col">

                      </div>
                    </div>
                    <div class="row mb-3">
                        <label class="ms-3 fs-5">Agent</label>
                        <div class="input-group">
                              <input type="text" class="form-control border-secondary ms-3">
                              <select name="agent" id="agentSelect" class="form-select border-secondary" aria-label="Default select example">
                                  <option value="">Sélectionner un agent</option>

                              </select>

                        </div>
                    </div>

                    <div class="row mb-3 mt-4">
                      <label class="fs-5 ms-3">Membre</label>
                      <div class="input-group">
                        <input type="text" class="form-control border-secondary ms-3 mr-3">
                        <select name="membre" id="membreSelect" class="form-select border-secondary" aria-label="Default select example">

                        </select>

                      </div>

                    </div>

                      <div class="form-group">
                        <div class="row mb-3">
                          <label class=" fs-5 ms-3">Nom</label>
                            <div class="row">
                                <div class="col-12">
                                    <input name="nom" id="nom" type="text" class="form-control border-secondary ms-3">
                                </div>
                            </div>
                          @error('nom')
                            <span class= "text-danger">{{ $message }}</span>
                          @enderror
                        </div>


                      </div>

                      <div class="form-group">
                        <div class="row mb-3">
                          <label class="ms-3 fs-5">Debut</label>
                          <div class="row">
                                <div class="col-12">
                                    <input name="debut" id="debut" type="date" class="form-control border-secondary ms-3">
                                </div>
                          </div>
                          @error('debut')
                            <span class= "text-danger">{{ $message }}</span>
                          @enderror
                        </div>


                      </div>

                      <div class="form-group">
                        <div class="row mb-3">
                          <label class="ms-3 fs-5">Montant</label>
                          <div class="row">
                            <div class="col-12">
                                <input name="montant" id="montant" type="number" class="form-control border-secondary ms-3">
                            </div>
                          </div>
                          @error('montant')
                            <span class= "text-danger">{{ $message }}</span>
                          @enderror
                        </div>


                      </div>

                      <div class="row mb-3">
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
@endsection
  <!-- Debut du main -->

  <script src="{{asset('assets/js/jquery.min.js')}}"></script>
  <script>
    $(document).ready(function () {
      $('#bntAnnulee').click(function (e) {
        e.preventDefault();
            $('#nom').val("");
            $('#montant').val("");
            $('#debut').val("");

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


