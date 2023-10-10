@extends('master.layout')
@section('content')
<!-- Debut du main -->
<main class="main" id="main">
  <div class="pagetitle">
    <h1>Liste des agences</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('acceuil')}}">Accueil</a></li>
        <li class="breadcrumb-item">Gestion des Agences</li>
        <li class="breadcrumb-item active">Liste</li>
      </ol>
    </nav>
  </div>
      <div class="row">
        <div class=""></div>


            <div class="row">


                    <form action="" method="post">
                        <div class="row">
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
                      <div class="row">
                              <div class="col mt-4">
                                <select name="choix" id="" class="form-select">
                                  <option value="" selected>Option de Filtre</option>
                                  <option value="nom">Nom</option>
                                  <option value="code">Code</option>
                                  <option value="adresse">Adresse</option>
                                </select>
                              </div>
                              <div class="col mt-4">
                                  <div class="form-group">
                                      <div class="col">
                                          <input name="txtRecherche" type="text" class="form-control bi bi-chevron-compact-down"  id="champ_text_agence">
                                      </div>
                                  </div>
                              </div>
                              <div class="col mt-4">
                                  <div class="form-group">
                                      <button name="filtrer" type="submit" class="btn btn-warning text-center form-control" id="btn-filtrer-agence">
                                        <i class="bi bi-search"></i> <span class="">Filtrer</span>
                                      </button>
                                  </div>
                              </div>
                              <div class="col mt-4">
                                  <div class="form-group">
                                      <button name="actualiser" type="submit" class="btn btn-warning text-center form-control" id=" btn-actualiser-agence">
                                      <i class="bi bi-repeat"></i> <span class="">Actualiser</span>
                                      </button>
                                  </div>
                              </div>
                              <div class="col mt-4">
                                  <div class="form-group">
                                      <button type="button" class="btn btn-warning text-center form-control">
                                        <i class="bi bi-printer inprimer"></i> <span class="inprimer" id="btn-inprimer-agence">Imprimer</span>
                                      </button>
                                  </div>
                              </div>
                              <div class="col mt-4">
                                  <div class="form-group">
                                      <button type="button" class="btn btn-warning text-center form-control"  data-bs-toggle="modal" data-bs-target="#modalAjoutAgence">
                                          <i class="bi bi-plus nouveau"></i> <span class=" nouveau" id="btn-nouveau-agence">Nouveau</span>
                                      </button>
                                  </div>

                          </div>
                      </div>
                      <div class="row mt-4">
                          <table id="tableAgence" class="table text-center table-bordered table-responsive table-compressed table-hover table-striped">
                            <thead class="bg-success">
                            <tr class="bg-success">
                                    <th class="text-center bg-success text-white">N°</th>
                                    <th class="text-center bg-success text-white">Code</th>
                                    <th class="text-center bg-success text-white">Nom Agence</th>
                                    <th class="text-center bg-success text-white">Telephone</th>
                                    <th class="text-center bg-success text-white">Adresse</th>
                                    <th class="text-center bg-success text-white">Email</th>
                                    <th class="text-center bg-success text-white">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                @foreach ( $agences as $agence )

                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $agence->codeAgence }}</td>
                                        <td>{{ $agence->nomAgence }}</td>
                                        <td>{{ $agence->telAgence }}</td>
                                        <td>{{ $agence->adresseAgence }}</td>
                                        <td>{{ $agence->mailAgence }}</td>
                                        <td class='btnCoti'><a href='$id' data-id='1' class='btn btn-transparent editAgence'  data-bs-toggle='modal' data-bs-target='#modalModifAgence' data-bs-placement='bottom' title='Modifier'><i class='bi bi-pen'></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                          </table>
                      </div>
                    </form>


            </div>
            <div class="row mt-5">
                  <!-- Table -->




                      <!-- End Table  -->

                        <!-- Le modal pour ajouter -->
                                    <div class="modal fade" id="modalAjoutAgence" tabindex="-1">
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
                                            <h1 class="card-title rounded-4 text-center text-black fs-1 fw-3 bg-warning-light">Nouvelle agence</h1>
                                            <div class="card-body">

                                              <!-- General Form Elements -->
                                              <form method="post" action="{{ route('storeAgence') }}" id="formAjoutAgence">
                                                @csrf
                                                <div class="row mb-4">
                                                  <label class="col-sm-4  text-center fs-5">Agence</label>
                                                  <div class="col-sm-6">
                                                    <input type="text" name="nomAgence" class="form-control border-secondary">
                                                  </div>
                                                  <div class="col-sm-2"></div>

                                                </div>
                                                  <div class="row mb-4">
                                                      <label class="col-sm-4  text-center fs-5">Adresse</label>
                                                      <div class="col-sm-6">
                                                        <input type="text" name="adresseAgence" class="form-control border-secondary">
                                                      </div>
                                                      <div class="col-sm-2"></div>

                                                  </div>
                                                  <div class="row mb-4">
                                                    <label class="col-sm-4  text-center fs-5">Telephone</label>
                                                    <div class="col-sm-6">
                                                      <input type="tel" name="telAgence" class="form-control border-secondary">
                                                    </div>
                                                    <div class="col-sm-2"></div>

                                                  </div>
                                                  <div class="row mb-4">
                                                    <label class="col-sm-4  text-center fs-5">Mail</label>
                                                    <div class="col-sm-6">
                                                     <input name="mailAgence" id="mailAgence" type="mail" class="form-control border-secondary">
                                                    </div>
                                                    <div class="col-sm-2"></div>

                                                  </div>
                                                  <div class="modal-footer">
                                                      <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fermer</button>
                                                      <button type="submit" name="btnValiderAgence" class="btn btn-success ">Valider</button>
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
                              <h1 class="card-title text-center text-black fs-3 fw-3">Modification de l'agence</h1>

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
                            <div class="card-body">

                              <!-- General Form Elements -->
                              <form method="post" action="{{ route('updateAgence') }}">
                                @csrf
                                <div class="row mb-4 mt-4">
                                  <div class="col-sm-6">
                                    <input name="idAgence" id="idAgence" type="hidden" class="form-control border-secondary" readonly>
                                  </div>
                                  <div class="col-sm-2"></div>
                                </div>
                                <div class="row mb-4 mt-4">
                                  <label class="col-sm-4  text-center fs-5">Agence</label>
                                  <div class="col-sm-6">
                                    <input name="MnomAgence" id="nomAgence" type="text" class="form-control border-secondary">

                                  </div>
                                  <div class="col-sm-2"></div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-sm-4  text-center fs-5">Telephone</label>
                                    <div class="col-sm-6">
                                      <input name="MtelAgence" id="telAgence" type="tel" class="form-control border-secondary">

                                    </div>
                                    <div class="col-sm-2"></div>
                                  </div>
                                  <div class="row mb-4">
                                      <label class="col-sm-4  text-center fs-5">Adresse</label>
                                      <div class="col-sm-6">
                                        <input name="MadresseAgence" id="adresseAgence" type="text" class="form-control border-secondary">

                                      </div>
                                      <div class="col-sm-2"></div>
                                  </div>
                                  <div class="row mb-4">
                                    <label class="col-sm-4  text-center fs-5">Email</label>
                                    <div class="col-sm-6">
                                      <input name="MmailAgence" id="mailAgence" type="mail" class="form-control border-secondary">

                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>

                                  <div class="modal-footer">
                                    <button  type="button" class="btn btn-dark" data-bs-dismiss="modal">Fermer</button>
                                    <button type="submit" name="MbtnValiderAgence" class="btn btn-success boutton">Valider</button>
                                  </div>

                              </form><!-- End General Form Elements -->


                            </div>
                          </div>
                          </div>

                      </div>
                      </div>
                  </div>
                  <!-- Fin Modal pour modifier l'agence -->
                          <!-- modal de confirmation de suppression -->


              </div>

        </div>
      </div>
</main>
<!-- Fin du main -->
@endsection
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script>
    $(document).ready(function () {

// Pour récupérer les données de l'agence
var tableAgence = document.getElementById('tableAgence');

function editerInfoAgence() {
    for (var i = 1; i < tableAgence.rows.length; i++) {
        tableAgence.rows[i].onclick = function () {
            document.getElementById("idAgence").value = this.cells[1].innerHTML;
            document.getElementById("nomAgence").value = this.cells[2].innerHTML;
            document.getElementById("telAgence").value = this.cells[3].innerHTML;
            document.getElementById("adresseAgence").value = this.cells[4].innerHTML;
            document.getElementById("mailAgence").value = this.cells[5].content;
        };
    }
}

$('.editAgence').click(function (e) {
    e.preventDefault();
    editerInfoAgence();
});


// Pour récupérer les données de la tontine individuelle


});

</script>



