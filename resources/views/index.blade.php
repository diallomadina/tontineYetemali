@extends('master.layout')
@section('content')
  <main class="main" id="main">
      <div class="pagetitle">
          <h1>Tableau de bord</h1>
          <nav>
              <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                      <a href="index.html">Accueil</a>
                  </li>
                  <li class="breadcrumb-item active">Tableau de Bord</li>
              </ol>
          </nav>
      </div>
      <!-- End Page Title -->
      <div class="container">

        <form action="" method="post">
            <div class="row">
                <div class="col ms-2 contenuTb">
                    <div class="row">
                        <div class="col mt-4 ms-2">
                            <img src="{{ asset('agence.png') }}" height="150" width="150" alt="">
                        </div>
                        <div class="col">
                            <h2 class="fw-bold text-success text-end fw-bold mt-1"><a href="{{ route('afficherAgence') }}" class="fw-bold text-success">Agences</a></h2>
                            <span class="nombre">{{ $nombreAgences }}</span>
                        </div>
                    </div>
                </div>
                <div class="col ms-5 contenuTb">
                  <div class="row">
                    <div class="col mt-4 ms-2">
                        <img src="{{ asset('agent.png') }}" height="150" width="160" alt="">
                    </div>
                    <div class="col">
                        <h2 class=" text-end fw-bold mt-1"><a href="{{ route('listeAgent') }}" class="fw-bold text-success">Agents</a></h2>
                    </div>
                </div>
              </div>

                <div class="col ms-5 contenuTb">
                   <div class="row">
                        <div class="col mt-4 ms-2">
                            <img src="{{ asset('membres.jpg') }}" height="150" width="160" alt="">
                        </div>
                        <div class="col">
                            <h3 class="text-end "><a href="{{ route('membre') }}" class="fw-bold text-success  mt-1">Membres</a></h3>
                        </div>
                   </div>
                </div>

          </div>


          <div class="row mt-4">
                <div class="col ms-3 contenuTb">
                  <div class="row mt-2">
                    <div class="col ms-2 mt-4">
                        <img src="{{ asset('tontine2.jpg') }}" height="140" width="120" alt="">
                     </div>
                    <div class="col">
                        <h3 class="fw-bold text-success text-end mt-3"><a href="{{ route('listeTontine') }}" class="fw-bold text-success "></a>T Collectives</h3>
                    </div>
                  </div>
              </div>

              <div class="col ms-5 contenuTb">
                <div class="row mt-2">
                  <div class="col-4 mt-4 ms-2">
                    <img src="{{ asset('tontine2.jpg') }}" height="140" width="120" alt="">
                </div>
                  <div class="col">
                        <h3 class="fw-bold text-success text-end mt-3"><a href="{{ route('listeTontineInd') }}" class="fw-bold text-success "></a>T Individuelles</h3>
                  </div>
                </div>
            </div>

            <div class="col ms-5 contenuTb">
                <div class="row">
                    <div class="col mt-4 ms-2">
                    <img src="{{ asset('moneypng.png') }}" height="140" width="140" alt="">
                    </div>
                    <div class="col">
                        <h3 class="fw-bold text-success text-end mt-3"><a href="{{ route('listeTontineInd') }}" class="fw-bold text-success "></a>Montant Collectés</h3>
                    </div>
                </div>

            </div>


          </div>
        </form>


          <div class="row mt-3">
            <div class="col">
              <div class="card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filtrer</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Aujourd'hui</a></li>
                    <li><a class="dropdown-item" href="#">Ce Mois</a></li>
                    <li><a class="dropdown-item" href="#">Cette Année</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Rapport <span>/Aujourd'hui</span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Payement',
                          data: [31, 40, 28, 51, 42, 82, 56],
                        }, {
                          name: 'Montant Rassemblé',
                          data: [11, 32, 45, 32, 34, 52, 41]
                        }, {
                          name: 'Nombre de participant',
                          data: [15, 11, 32, 18, 9, 24, 11]
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'datetime',
                          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div>
            <div class="col">

              <div class="card">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filtrer</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Aujourd'hui</a></li>
                    <li><a class="dropdown-item" href="#">Cet Mois</a></li>
                    <li><a class="dropdown-item" href="#">Cette Année</a></li>
                  </ul>
                </div>

                <div class="card-body pb-0 bg">
                  <h5 class="card-title">Website Traffic <span>| Aujourd'hui</span></h5>

                  <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      echarts.init(document.querySelector("#trafficChart")).setOption({
                        tooltip: {
                          trigger: 'item'
                        },
                        legend: {
                          top: '5%',
                          left: 'center'
                        },
                        series: [{

                          type: 'pie',
                          radius: ['40%', '70%'],
                          avoidLabelOverlap: false,
                          label: {
                            show: false,
                            position: 'center'
                          },
                          emphasis: {
                            label: {
                              show: true,
                              fontSize: '18',
                              fontWeight: 'bold'
                            }
                          },
                          labelLine: {
                            show: false
                          },
                          data: [{
                              value: 1048,
                              name: 'Membres'
                            },
                            {
                              value: 735,
                              name: 'Tontines terminés'
                            },
                            {
                              value: 580,
                              name: 'Tontines en cours'
                            },
                            {
                              value: 484,
                              name: 'Montant rassemblé'
                            }

                          ]
                        }]
                      });
                    });
                  </script>

                </div>
              </div>

            </div>
          </div>


      </div>
  </main>
@endsection




<!-- End #main -->






