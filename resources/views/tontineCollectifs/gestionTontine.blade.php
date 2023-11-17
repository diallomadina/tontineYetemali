@extends('master.layout')
@section('content')
    <!-- Debut du main -->
<main class="main" id="main">
    <div class="pagetitle">
      <h1>Gestion des tontines collectif</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('acceuil')}}">Accueil</a></li>
          <li class="breadcrumb-item">Tontine Collectif</li>
          <li class="breadcrumb-item active">Gestion</li>
        </ol>
      </nav>
    </div>
    <div class="container mt-5">
            <div class="row">
                <div class="col">
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center fw-bold">{{Session::get("success")}}</div>
                    @endif
                </div>
            </div>
            <!-- Choix d'action a faire -->
            <div class="row">
                <div class="col-4">
                    <label for="tontine">Choisissez la tontine a gerer</label>
                    <div class="input-group">
                        <input type="text" id="txtTontine" class="form-control border-secondary" placeholder="Saisissez le nom">
                        <select name="tontine" id="choixTontine" class="form-select border-secondary">
                            <option value="">Cliquer pour choisir</option>
                            @foreach ($tontines as $tontine )
                                <option value="{{ $tontine->id }}">{{ $tontine->nomTontineC }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('tontine')
                        <span class="text-center text-danger">{{ $message }}</span>
                    @enderror
                    <span class="text-danger d-none" id="erreurTontine">Veuillez choisir la tontine</span>
                </div>
                <div class="col">
                    <label for="">Ajouter un membre</label>
                    <button type="button" id="btnAjouter" class="form-control bg-warning-light border-secondary">
                        <i class="bi bi-plus"></i>Ajouter
                    </button>
                </div>
                <div class="col">
                    <label for="">Payer Un membre</label>
                    <button type="button"  id="btnPayement" class="form-control bg-warning-light border-secondary ">
                        <i class="bi bi-list"></i>Payer
                    </button>
                </div>
                <div class="col">
                    <label for="">Liste des Membres</label>
                    <button type="button"  id="btnListe" class="form-control bg-warning-light border-secondary ">
                        <i class="bi bi-list"></i>Liste
                    </button>
                </div>

            </div>

            <div class="row mt-5" id="AjoutMembre">

                    <div class="col-6">
                        <label for="">Choisissez le membre</label>
                        <div class="input-group">
                            <input type="text" id="txtMembre" class="form-control border-secondary" placeholder="Saisissez le nom">
                            <select name="membre" id="choixMembre" class="form-select border-secondary">
                                <option value=" ">Cliquer pour choisir</option>
                                @foreach ($membres as $membre)
                                    <option value="{{ $membre->id }}">{{ $membre->nomMembre.' '.$membre->prenomMembre. ' ('.$membre->codeMembre.')' }}</option>
                                @endforeach
                            </select>
                        </div>
                        <span class="text-danger d-none erreurMembre">Veuillez choisir le membre</span>
                    </div>
                    <div class="col-3">
                        <label for="" class="text-white">Assosier</label>
                        <button type="button" id="btnAssocier" class="form-control bg-warning-light border-secondary">
                            Associer
                        </button>
                    </div>
                    <div class="col-3">
                        <label for="" class="text-white">Inviter</label>
                        <button type="button" id="btnInviter" class="form-control bg-warning-light border-secondary">
                            Inviter
                        </button>
                    </div>
            </div>


             <!-- Action pour Payer un membre -->


            <form action="{{ route('payementCollectif') }}" method="post">
                @csrf
                <div class="row mt-5" id="PayementMembre">
                    <input type="hidden" name="tontine" id="tontinePayer" value="">
                    <div class="col-md-6">
                        <label for="" class="form-label">Choisissez le membre</label>
                        <div class="input-group">
                            <input type="text" id="txtMembre" class="form-control border-secondary" placeholder="Saisissez le nom">
                            <select name="membre2" id="choixMembre2" class="form-select border-secondary">
                                <option value="">Cliquer pour choisir</option>
                                @foreach ($membres as $membre)
                                    <option value="{{ $membre->id }}">{{ $membre->nomMembre.' '.$membre->prenomMembre. ' ('.$membre->codeMembre.')' }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('membre2')
                            <span class="text-center text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="date" class="form-label">Date de Paiement</label>
                        <input type="date" name="date" id="date" class="form-control border-secondary">
                        @error('date')
                            <span class="text-center text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="validation" class="form-label">Valider le paiement</label>
                        <button type="submit" id="btnPayer" class="form-control bg-warning-light border-secondary">
                            Payer
                        </button>
                    </div>
                </div>
            </form>


            <!-- Action sur l'affichage des membres -->
            <section id="listMembre">
                <form action="" method="post">
                    <div class="row mt-2">
                        <div class="col mt-4">
                          <select name="choix" id="" class="form-select">
                            <option value="" selected>Option de Filtre</option>
                            <option value="nom">Payé</option>
                            <option value="code">Nom payé</option>

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
                                <button name="filtrer" type="button" class=" bg-warning-light text-center form-control" id="btn-filtrer-agence">
                                  <i class="bi bi-search"></i> <span class="">Filtrer</span>
                                </button>
                            </div>
                        </div>
                        <div class="col mt-4">
                            <div class="form-group">
                                <button name="actualiser" type="button" class=" bg-warning-light text-center form-control" id=" btn-actualiser-agence">
                                <i class="bi bi-repeat"></i> <span class="">Actualiser</span>
                                </button>
                            </div>
                        </div>
                        <div class="col mt-4">
                            <div class="form-group">
                                <button type="button" class=" bg-warning-light text-center form-control">
                                  <i class="bi bi-printer inprimer"></i> <span class="inprimer" id="btn-inprimer-agence">Imprimer</span>
                                </button>
                            </div>
                        </div>

                    </div>

                    <div class="row mt-2">
                        <table id="tableAgence" class="table table-bordered table-responsive table-compressed table-hover table-striped">
                            <thead class="bg-success">
                            <tr class="bg-success">
                                    <th class="text-center bg-success text-white">N°</th>
                                    <th class="text-center bg-success text-white">Code Membre</th>
                                    <th class="text-center bg-success text-white">Nom et Prenom</th>
                                    <th class="text-center bg-success text-white">Versements</th>
                                    <th class="text-center bg-success text-white">Montant Verser</th>
                                    <th class="text-center bg-success text-white">Reste a Verser</th>
                                    <th class="text-center bg-success text-white">Tour de prise</th>
                                    <th class="text-center bg-success text-white">Payer</th>

                            </tr>
                            </thead>
                            <tbody class="text-center">

                            </tbody>
                        </table>
                      </div>
                </form>
            </section>

    </div>

  </main>
<!-- Fin du main -->
@endsection

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script>
    $(document).ready(function () {
        // $('#AjoutMembre').hide();
        // $('#listMembre').hide();
        // $('#PayementMembre').hide();

        // $('#btnAjouter').click(function (e) {
        //     e.preventDefault();
        //     $('#AjoutMembre').show();
        //     $('#listMembre').hide();
        //     $('#PayementMembre').hide();
        // });

        // $('#btnListe').click(function (e) {
        //     e.preventDefault();
        //     $('#AjoutMembre').hide();
        //     $('#listMembre').show();
        //     $('#PayementMembre').hide();
        // });

        $('#btnPayement').click(function (e) {
            e.preventDefault();
            $('#AjoutMembre').hide();
            $('#listMembre').hide();
            $('#PayementMembre').show();
            var tontineId = $('#choixTontine').val();
            $('#tontinePayer').val(tontineId);
            alert(tontineId)
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
        $('#txtTontine').on('input', function () {
            updateSelectOptions($(this), $('select[name="tontine"]'));
        });

        $('#txtMembre').on('input', function () {
            updateSelectOptions($(this), $('select[name="membre"]'));
        });
        $('#txtMembre2').on('input', function () {
            updateSelectOptions($(this), $('select[name="membre"]'));
        });



        ////////////// Partie de la gestion des evenement lies a la base de donnees

        $('#btnAssocier').click(function (e) {
            e.preventDefault();
            var tontineId = $('#choixTontine').val();
            var membreId = $('#choixMembre').val();

            if (tontineId === "") {
                $('#erreurTontine').removeClass('d-none').addClass('d-block');
                return; // Arrêter l'exécution du code si la tontine n'est pas sélectionnée
            } else {
                $('#erreurTontine').addClass('d-none').removeClass('d-block');
            }

            if (membreId === " ") {
                $('.erreurMembre').removeClass('d-none').addClass('d-block');
                return; // Arrêter l'exécution du code si le membre n'est pas sélectionné
            } else {
                $('.erreurMembre').addClass('d-none').removeClass('d-block');
            }

            $.ajax({
                type: "POST",
                url: '{{ route('associationTontine') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    tontine: tontineId,
                    membre: membreId,
                },
                success: function (response) {
                    alert('Membre associé avec succès');
                    // Si vous avez besoin de réaliser d'autres actions après avoir associé le membre, vous pouvez les placer ici.
                },
                error: function (xhr, status, error) {
                    // En cas d'échec de la requête Ajax, vous pouvez gérer les erreurs ici
                    alert(error);
                }
            });
        });


        // // La partie pour inviter les membres a rejoindre la tontine
        // $('#btnInviter').click(function (e) {
        //     e.preventDefault();
        //     // var tontineId = $('#choixTontine').val();
        //     // alert(tontineId)
        // });




    });
</script>

<!-- End #main -->


