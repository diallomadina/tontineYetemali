@extends('master.layout')
@section('content')
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
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <!-- Partie de l'ajout -->
          <div class="card rounded-4">
            <h1 class="card-title rounded-4 text-center text-black fs-1 fw-3 bg-warning-light">Nouveau Agent</h1>
            <div class="card-body">
                <div class="row">
                  <div class="col">
                        @if (Session::has('success'))
                             <div class="alert alert-success text-center fw-bold">{{Session::get("success")}}</div>
                        @endif
                  </div>
                </div>
              <!-- General Form Elements -->
              <form method="post" action="{{ route('storeAgent') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                  <div class="col">
                      <label class=" text-center fs-5">Agence</label>

                      <select name="agence" id="agence" class="form-select border-secondary" aria-label="Default select example">
                        @foreach ($agences as $agence)
                            <option value="{{ $agence->id }}">{{ $agence->nomAgence }}</option>
                        @endforeach
                      </select>
                      @error('agence')
                        <span class="text-center text-danger">{{ $message }}</span>
                      @enderror
                  </div>

                  <div class="col">
                      <label class=" text-center fs-5">Nom</label>
                      <div class="col">
                        <input name="nom" id="nom" type="text" class="form-control border-secondary">
                      </div>
                      @error('nom')
                        <span class="text-center text-danger">{{ $message }}</span>
                      @enderror
                  </div>


                </div>


                <div class="row mb-3">
                    <div class="col">
                      <label class=" text-center fs-5">Prenom</label>
                      <input name="prenom" id="prenom" type="text" class="form-control border-secondary">
                      @error('prenom')
                        <span class="text-center text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="col">
                      <label class="  text-center fs-5">Adresse</label>
                      <input name="adresse" id="adresse" type="text" class="form-control border-secondary">
                      @error('adresse')
                        <span class="text-center text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                </div>



                <div class="row mb-3">
                    <div class="col">
                      <label class=" text-center fs-5">Telephone</label>
                      <input name="telephone" id="telephone" type="tel" class="form-control border-secondary">
                      @error('telephone')
                        <span class="text-center text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="col">
                      <label class=" text-center fs-5">Date d'inscription</label>
                      <input name="date" id="date" type="date" class="form-control border-secondary">
                      @error('date')
                        <span class="text-center text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                </div>

                <div class="row mb-3">
                  <div class="col">
                    <label class=" fs-5">Email</label>
                    <input name="mail" id="mail" type="mail" class="form-control border-secondary">
                    @error('mail')
                        <span class="text-center text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col">
                    <label for="" class=" text-center fs-5">Photo</label>
                      <input type="file" id="photo" name="photo"  accept=".jpg, .png" class="form-control border-secondary">
                      @error('photo')
                        <span class="text-center text-danger">{{ $message }}</span>
                      @enderror
                  </div>
                </div>

                  <div class="row mb-3">
                      <div class="col"></div>
                      <div class="col">
                        <button name="ajouter" type="submit" class="btn btn-success" style="width: 100%;">Valider</button>
                      </div>
                      <div class="col">
                        <button id="annuller" type="button" class="btn btn-secondary" style="width: 100%;">Annuler</button>
                      </div>
                      <div class="col"></div>
                  </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

        <div class="col-sm-2">
        </div>
      </div>
</main>
<!-- Fin du main -->
@endsection
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#annuller').click(function (e) {
            e.preventDefault();
            $('#nom').val("");
            $('#prenom').val("");
            $('#adresse').val("");
            $('#telephone').val("");
            $('#mail').val("");
            $('#photo').val("");
            $('#date').val("");

        });
    });
</script>



