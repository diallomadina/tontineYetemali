@extends('master.layout')
@section('content')
<!-- Debut du main -->
<main class="main" id="main">
  <div class="pagetitle">
    <h1>Historique des Tontines</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('acceuil')}}">Accueil</a></li>
        <li class="breadcrumb-item">Tontine</li>
        <li class="breadcrumb-item active">Historique</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
      <div class="container mt-5">
      <div class="row">

        <form action="{{ route('searchHistoriqueTontineC') }}" method="POST" class="form-inline bg-light">
            @csrf
            <div class="row mb-2">
                <div class="col">
                    <select name="periode" id="" class="form-select border-secondary">
                        <option value="">Choisir une periode</option>
                        <option value="date_unique">Une date</option>
                        <option value="plage_dates">Plages de date</option>
                        <option value="annee">Annee</option>
                        <option value="mois">Mois</option>
                    </select>
                </div>
                <div class="col">
                    <input type="date" name="date1" id="" class="form-control border-secondary">
                </div>
                <div class="col">
                    <input type="date" name="date2" id="" class="form-control border-secondary">
                </div>
                <div class="col">
                    <select name="mois" id="mois" class="form-select border-secondary">
                        <option value="">Choisissez le mois</option>
                        <option value="01">Janvier</option>
                        <option value="02">Fevrier</option>
                        <option value="03">Mars</option>
                        <option value="04">Avril</option>
                        <option value="05">Mai</option>
                        <option value="06">Juin</option>
                        <option value="07">Juillet</option>
                        <option value="08">Aout</option>
                        <option value="09">Septembre</option>
                        <option value="10">Octobre</option>
                        <option value="11">Novembre</option>
                        <option value="12">Decembre</option>
                    </select>
                </div>
                <div class="col">
                    <input type="text" name="annee" class="form-control border-secondary" placeholder="Saisissez l'annee">
                </div>

            </div>
            <div class="row mt-3">

                  <div class="col">
                    <select name="choix" id="" class="form-select border-secondary">
                      <option value="" selected>Choisissez</option>
                      <option value="identifiant">Identifiant</option>
                      <option value="nom">Nom</option>
                      <option value="agent">Agent</option>
                      <option value="statut">Statut</option>

                    </select>
                  </div>
                  <div class="col">
                    <input type="text" name="txtRecherche" class="form-control border-secondary" placeholder="Saisissez">
                  </div>
                  <div class="col">
                      <button id="btnSearchCoti" type="submit" class=" bg-warning-light form-control">
                          <i class="bi bi-filter"></i> Filtrer
                      </button>
                  </div>
                  <div class="col">
                    <button id="btnSearchCoti" type="submit" class=" bg-warning-light form-control">
                        <i class="bi bi-repeat"></i> Acutaliser
                    </button>
                  </div>
                  <div class="col">
                    <button id="btnPrintCotiHistorique" type="button" class=" form-control bg-warning-light text-center">
                        <i class="bi bi-printer"></i> Imprimer
                    </button>
                  </div>
            </div>
            <div class="row mt-3">
                <table id="tableHisotoriqueTontine" class="table text-center table-bordered table-responsive table-compressed table-hover table-striped">
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
                             <th class="text-center bg-success text-white">Statut</th>
                             <th class="text-center bg-success text-white">Voir</th>
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
                                <td>
                                    @if ($tontineC->statutTontineC === null)
                                            Non debuté
                                            @elseif ($tontineC->statutTontineC === 1)
                                            En cours
                                            @elseif ($tontineC->statutTontineC === 0)
                                            Terminé
                                     @endif
                                </td>
                                <td class='btnCoti'><button type='button' class='btn btn-transparent' data-bs-toggle='modal' data-bs-target='#modalSuiviTontine' data-bs-placement='bottom' title='Voir'><i class='bi bi-eye'></i></button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>


    </div>

      </div>
</main>
<!-- Fin du main -->
@endsection



