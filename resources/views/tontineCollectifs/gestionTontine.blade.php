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
        <form action="" method="post">
            <!-- Choix d'action a faire -->
            <div class="row">
                <div class="col">
                    <label for="tontine">Choisissez la tontine a gerer</label>
                    <input type="text" name="tontine" class="form-control border-secondary">
                </div>
                <div class="col">
                    <label for="">Ajouter un membre</label>
                    <button type="button" id="btnAjouter" class="form-control bg-warning-light border-secondary">
                        <i class="bi bi-plus"></i>Ajouter
                    </button>
                </div>
                <div class="col">
                    <label for="">Liste des Membres</label>
                    <button type="button"  id="btnListe" class="form-control bg-warning-light border-secondary ">
                        <i class="bi bi-list"></i>Liste
                    </button>
                </div>
                <div class="col">
                    <label for="">Payer Un membre</label>
                    <button type="button"  id="btnPayement" class="form-control bg-warning-light border-secondary ">
                        <i class="bi bi-list"></i>Payer
                    </button>
                </div>
            </div>

            <!-- Action pour ajouter un membre -->
            <div class="row mt-5" id="AjoutMembre">

                <div class="col-4">
                    <label for="">Choisissez le membre</label>
                    <select name="membre" id="" class="form-select border-secondary"></select>
                </div>
                <div class="col">
                    <label for=""></label>
                    <button type="button" class="form-control bg-warning-light border-secondary ">
                        Associer
                    </button>
                </div>
                <div class="col">
                    <label for=""></label>
                    <button type="button" class="form-control bg-warning-light border-secondary ">
                        Inviter
                    </button>
                </div>
                <div class="col">
                    <label for=""></label>
                    <button type="button" class="form-control bg-warning-light border-secondary ">
                        Valider
                    </button>
                </div>

            </div>

             <!-- Action pour Payer un membre -->
             <div class="row mt-5" id="PayementMembre">
                <div class="col"></div>
                <div class="col-4">
                    <label for="">Choisissez le membre</label>
                    <select name="membre" id="" class="form-select border-secondary"></select>
                </div>
                <div class="col">
                    <label for="">Numero de OM/MTN</label>
                    <input type="tel"  class="form-control border-secondary">
                </div>
                <div class="col">
                    <label for="">Valider le payement</label>
                    <button type="button" class="form-control bg-warning-light border-secondary ">
                        Payer
                    </button>
                </div>
                <div class="col"></div>

            </div>

            <!-- Action sur l'affichage des membres -->
            <section id="listMembre">
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
                            <button name="filtrer" type="submit" class=" bg-warning-light text-center form-control" id="btn-filtrer-agence">
                              <i class="bi bi-search"></i> <span class="">Filtrer</span>
                            </button>
                        </div>
                    </div>
                    <div class="col mt-4">
                        <div class="form-group">
                            <button name="actualiser" type="submit" class=" bg-warning-light text-center form-control" id=" btn-actualiser-agence">
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
                                <th class="text-center bg-success text-white">Payement</th>
                                <th class="text-center bg-success text-white">Montant Payer</th>
                                <th class="text-center bg-success text-white">Reste a Payer</th>
                                <th class="text-center bg-success text-white">Tour de prise</th>
                                <th class="text-center bg-success text-white">Payer</th>

                        </tr>
                        </thead>
                        <tbody class="text-center">

                        </tbody>
                    </table>
                  </div>
            </section>
        </form>

    </div>

  </main>
<!-- Fin du main -->
@endsection

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#AjoutMembre').hide();
        $('#listMembre').hide();
        $('#PayementMembre').hide();

        $('#btnAjouter').click(function (e) {
            e.preventDefault();
            $('#AjoutMembre').show();
            $('#listMembre').hide();
            $('#PayementMembre').hide();
        });

        $('#btnListe').click(function (e) {
            e.preventDefault();
            $('#AjoutMembre').hide();
            $('#listMembre').show();
            $('#PayementMembre').hide();
        });

        $('#btnPayement').click(function (e) {
            e.preventDefault();
            $('#AjoutMembre').hide();
            $('#listMembre').hide();
            $('#PayementMembre').show();
        });
    });
</script>

<!-- End #main -->

