@extends('master.layout')
@section('content')
<!-- Debut du main -->
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Tontine En cours</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{route('acceuil')}}">Acceuil</a>
          </li>
          <li class="breadcrumb-item active">Tontines en cours</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <!-- Contenue de la page -->
    <div class="container">
        <form action="{{ route('searchTontineC') }}" method="post">
            @csrf
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
        <div class="row">
          <div class="col">
            <select name="choix" id="sldTontineCours" class="form-select border-secondary">
                <option value="" selected>Choisissez l'option</option>
                <option value="identifiant">Identifiant</option>
                <option value="nom">nom</option>
                <option value="montant">Montant</option>
            </select>
          </div>
          <div class="col">
            <input name="txtRecherche" type="text" class="form-control border-secondary" placeholder="Saisissez votre text de recherche">
          </div>
          <div class="col">
            <button name="filtrer" type="submit" class="form-control border-secondary bg-warning-light">
              <i class="bi bi-filter"></i>Filtrer
            </button>
          </div>
          <div class="col">
            <a href="{{ route('listeTontine') }}">
                <button name="actualiser" type="submit" class="form-control border-secondary bg-warning-light">
                    <i class="bi bi-arrow-repeat"></i>Actualiser
                </button>
            </a>
          </div>
          <div class="col">
            <button  type="button" class="form-control border-secondary bg-warning-light"data-bs-toggle="modal" data-bs-target="#modalAjoutTontine">
              <i class="bi bi-plus"></i>Nouveau
            </button>
          </div>
          <div class="col">
            <button type="button" class="form-control border-secondary bg-warning-light">
              <i class="bi bi-printer"></i>Imprimer
            </button>
          </div>
        </div>

        <!-- Partie du tableau -->
        <div class="row mt-5">
          <table id="tableAffichageCoti" class="table text-center table-bordered table-responsive table-compressed table-hover table-striped">
            <thead class="bg-success">
               <tr class="bg-success">
                     <th class="text-center bg-success text-white">N°</th>
                     <th class="text-center bg-success text-white">Identifiant</th>
                     <th class="text-center bg-success text-white">Nom</th>
                     <th class="text-center bg-success text-white">Date de debut</th>
                     <th class="text-center bg-success text-white">Montant</th>
                     <th class="text-center bg-success text-white">Frequence</th>
                     <th class="text-center bg-success text-white">Participants</th>
                     <th class="text-center bg-success text-white">Agent</th>
                     <th class="text-center bg-success text-white" colspan="2">Action</th>
               </tr>
            </thead>
            <tbody id="tbodyAfficheTontine">

                @foreach ($tontines as $tontineC)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tontineC->codeTontineC }}</td>
                        <td>{{ $tontineC->nomTontineC }}</td>
                        <td>{{ $tontineC->debutTontineC }}</td>
                        <td>{{ $tontineC->montant }}</td>
                        <td>
                            @if ($tontineC->frequence == 1)
                                Jours
                                @elseif ($tontineC->frequence == 7)
                                Semaine
                                @elseif ($tontineC->frequence == 30)
                                Mois
                                @else
                                Annee
                            @endif
                        </td>
                        <td>{{ $tontineC->nombreParticipant }}</td>
                        <td>{{ $tontineC->agents->nomAgent.' '.$tontineC->agents->prenomAgent }}</td>
                        <td class='btnCoti'><a  class='btn btn-transparent editTontineInd' data-bs-toggle='modal' data-bs-target='#modalModifTontine' data-bs-placement='bottom' title='Modifier'><i class='bi bi-pen'></i></a></td>
                        <td class='btnCoti'><button type='button' class='btn btn-transparent' data-bs-toggle='modal' data-bs-target='#modalSuiviTontine' data-bs-placement='bottom' title='Voir'><i class='bi bi-eye'></i></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        </form>
    </div>

    <div class="modal fade" id="modalAjoutTontine" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="d-flex justify-content-center py-4">
                        <a href="#" class="logo d-flex align-items-center w-auto">
                            <img src="{{ asset('assets/img/yetemali.jpg') }}" alt="">
                            <span class="d-none d-lg-block text-success">Yete</span>
                            <span class="d-none d-lg-block text-warning">mali</span>
                        </a>
                    </div>
                    <!-- General Form Elements -->
                    <div class="card rounded-4 mb-5">
                        <h1 class="card-title rounded-4 text-center text-black fs-1 fw-3 bg-warning-light">Nouvelle Tontine Collective</h1>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                      @if (Session::has('success'))
                                           <div class="alert alert-success text-center fw-bold">{{Session::get("success")}}</div>
                                      @endif
                                </div>
                            </div>
                          <!-- General Form Elements -->
                          <form method="post" action="{{ route('ajoutTontine') }}">
                            @csrf
                              <div class="form-group">
                                <div class="row">
                                  <div class="col"></div>
                                  <div class="col">

                                  </div>
                                  <div class="col"></div>
                                </div>
                                <div class="row mb-4">

                                 <div class="row mb-3">
                                    <div class="col">
                                        <label class="fs-5">Nom</label>
                                        <input name="nom" id="nom" type="text" class="form-control border-secondary" placeholder="Nom de la tontine">
                                        @error('nom')
                                            <span class="text-center text-danger">{{ $message }}</span>
                                        @enderror
                                      </div>
                                 </div>


                                  <div class="row mb-3">
                                    <div class="col">
                                        <label for="inputDate" class="fs-5">Debut</label>
                                        <input name="debut" id="debut"  type="date" class="form-control border-secondary">
                                        @error('debut')
                                            <span class="text-center text-danger">{{ $message }}</span>
                                        @enderror
                                      </div>
                                  </div>

                                  <div class="row mb-3">
                                    <div class="col">
                                        <label class="fs-5">Montant</label>
                                        <input name="montant" id="montant" type="number" class="form-control border-secondary" placeholder="Montant de la tontine">
                                        @error('montant')
                                            <span class="text-center text-danger">{{ $message }}</span>
                                        @enderror
                                      </div>
                                  </div>


                                  <div class="row mb-3">
                                    <div class="col">
                                        <label for="" class="fs-5">Frequence</label>
                                        <select name="frequence" id="frequence" class="form-select border-secondary">
                                          <option value="1" selected>Jours</option>
                                          <option value="7">Semaines</option>
                                          <option value="30">Mois</option>
                                          <option value="12">Annee</option>
                                        </select>
                                        @error('frequence')
                                            <span class="text-center text-danger">{{ $message }}</span>
                                        @enderror
                                      </div>
                                  </div>

                              <div class="row">
                                <div class="col"></div>
                                <div class="col">
                                <button name="ajouter" type="submit" class="btn btn-success form-control">Ajouter</button>
                                </div>
                                <div class="col">
                                <button name="annuler" id="annuller" type="button" class="btn btn-secondary form-control">Annuler</button>
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
    </div>
    <!-- Fin Modal pour ajouter -->


  <!-- Debut Modal pour Voir le suivi -->
  <div class="modal fade" id="modalSuiviTontine" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <h3 class="text-center">Suivie de cette Tontine</h3>
        <div class="container">
          <div class="row">
            <div class="col">
              <span class="fw-bold">Identifiant: </span> <span id="afficheIdTontine">2389</span>
            </div>
            <div class="col">
              <span class="fw-bold">Nom: </span> <span id="afficheNomTontine">Tontine2</span>
            </div>
        </div>
        <div class="row">
          <div class="col">
            <span class="fw-bold">Date de Creation: </span> <span id="afficheDateTontine">09/02/2023</span>
          </div>
          <div class="col">
            <span class="fw-bold">Montant a deposer: </span> <span id="afficheMontantTontine">4000000</span>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <span class="fw-bold">Frequence: </span> <span id="afficheFrequenceTontine">semaine</span>
          </div>
          <div class="col">
            <span class="fw-bold">Participants: </span> <span id="afficheParticipantTontine">12</span>
          </div>
        </div>
        <h4 class="text-center">Rapport</h4>
        <div class="row">
          <div class="col">
            <span class="fw-bold">Ont pris: </span> <span id="afficheOntPrisTontine">5</span>
          </div>
          <div class="col">
            <span class="fw-bold">Restant: </span> <span id="afficheRestantTontine">7</span>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <span class="fw-bold">Membre qui doit prendre: </span> <span id="afficheTourPrendreTontine">Ibrahima Diallo</span>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <span class="fw-bold">Tour restant: </span> <span id="afficheTempsRestantTontine">10 Semaine</span>
          </div>
        </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Fin modal pour voir suivi -->
</main>
<!-- Fin du main -->

  <!-- Debut modal pour Modification -->
  <div class="modal fade" id="modalModifTontine" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
                <div class="modal-header text-center">
                <h1 class="text-center text-black fs-1 fw-3 bg-warning-light-light">Modification</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="d-flex justify-content-center py-4">
                        <a href="#" class="logo d-flex align-items-center w-auto">
                        <img src="{{ asset('assets/img/yetemali.jpg') }}" alt="">
                        <span class="d-none d-lg-block text-success">Yete</span>
                        <span class="d-none d-lg-block text-warning">mali</span>
                        </a>
                    </div>
                    <!-- General Form Elements -->
                    <!-- Partie de l'ajout -->
                    <div class="card rounded-4">

                    <div class="card-body">

                        <!-- General Form Elements -->
                        <form method="post" action="{{ route('updateTontineC') }}">
                            @csrf
                            <div class="form-group">

                                <div class="row mb-4">
                                    <input type="hidden" name="code" id="code">

                                    <div class="col">
                                    <label class="fs-5">Nom</label>
                                    <input name="nom" id="mNom" type="text" class="form-control border-secondary" placeholder="Nom de la tontine">
                                    </div>

                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="inputDate" class="fs-5">Debut</label>
                                        <input name="debut" id="mDebut"  type="date" class="form-control border-secondary">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                    <label class="fs-5">Montant</label>
                                    <input name="montant" id="mMontant" type="number" class="form-control border-secondary" placeholder="Montant de la tontine">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="" class="fs-5">Frequence</label>
                                        <select name="frequence" id="mfrequence" class="form-select border-secondary">
                                            <option value="1" selected>Jours</option>
                                            <option value="7">Semaines</option>
                                            <option value="30">Mois</option>
                                            <option value="12">Annee</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-warning boutton">Valider</button>
                                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->

                    </div>
                    </div>

                </div>

        </div>
    </div>
  </div>
  <!-- Fin modal pour modification -->
@endsection
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script>
    $(document).ready(function () {
        var tableAffichageCoti = document.getElementById('tableAffichageCoti');

        function editerTontineI() {
            for (var i = 0; i < tableAffichageCoti.rows.length; i++) {
              tableAffichageCoti.rows[i].onclick = function () {
                    document.getElementById("code").value = this.cells[1].innerHTML;
                    document.getElementById("mNom").value = this.cells[2].innerHTML;
                    document.getElementById("mDebut").value = this.cells[3].innerHTML;
                    document.getElementById("mMontant").value = this.cells[4].innerHTML;
                    document.getElementById("mfrequence").value = this.cells[5].innerHTML;



                    // Sélectionnez la valeur de la cellule "Frequence"
                    var frequenceText = this.cells[5].innerHTML.trim();

                    // Sélectionnez le champ de sélection "mfrequence"
                    var selectFrequence = document.getElementById("mfrequence");

                    // Parcourez les options du champ de sélection
                    for (var j = 0; j < selectFrequence.options.length; j++) {
                        var optionValue = selectFrequence.options[j].value;
                        if (optionValue.toLowerCase() === frequenceText.toLowerCase()) {
                            // Si la valeur de l'option correspond à la cellule "Frequence", définissez cette option comme sélectionnée
                            selectFrequence.value = optionValue;
                            break; // Sortez de la boucle dès que la correspondance est trouvée
                        }
                    }
                };
            }
        }


      $('.editTontineInd').click(function (e) {
          e.preventDefault();
          editerTontineI();
      });






        $('#btnPrintAgent').click(function () {
            // Créez un clone de la table pour l'impression
            var printTable = document.getElementById('tableAffichageAgent').cloneNode(true);

            // Créez un élément pour le titre
            var tableTitle = document.createElement('caption');
            tableTitle.innerHTML = 'Liste des Agents'; // Titre personnalisé

            // Créez un élément pour le logo de l'entreprise
            var companyLogo = document.createElement('img');
            companyLogo.src = '{{ asset('assets/img/yetemali.jpg') }}'; // Remplacez par l'URL de votre logo
            companyLogo.alt = 'Logo de l\'entreprise';

            // Créez un élément pour la date
            var currentDate = document.createElement('p');
            currentDate.innerText = 'Date: ' + new Date().toLocaleDateString(); // Remplacez par la date souhaitée

            // Créez un conteneur pour ces éléments
            var header = document.createElement('div');
            header.appendChild(companyLogo);
            header.appendChild(tableTitle);
            header.appendChild(currentDate);

            // Ajoutez le conteneur au clone de la table
            printTable.insertBefore(header, printTable.firstChild);

            // Masquez les boutons d'action et d'autres éléments non pertinents pour l'impression
            var elementsToHide = document.querySelectorAll('.btnCoti');
            for (var i = 0; i < elementsToHide.length; i++) {
                elementsToHide[i].style.display = 'none';
            }

            // Créez une nouvelle fenêtre d'impression et imprimez le tableau
            var printWindow = window.open('', '', 'width=600,height=600');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Liste des Agents</title></head><body>');
            printWindow.document.write(printTable.outerHTML);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
            printWindow.close();

            // Réaffichez les éléments masqués après l'impression
            for (var i = 0; i < elementsToHide.length; i++) {
                elementsToHide[i].style.display = 'table-cell';
            }
        });
    });


</script>


