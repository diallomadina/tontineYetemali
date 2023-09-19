<?php include("top.php"); ?>
<?php include("header.php"); ?>
<?php include("aside.php"); ?>

<!-- Debut du main -->
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
                    <div class="col ms-3 contenuTb">
                      <h3 class="fw-bold text-white text-center fw-bold mt-3">Nombre Agences</h3>
                        <?php 
                          include("php/connection.php");
                          $request = "SELECT count(*) as totalAgence from agence";
                          $result = $con -> query($request);
                          if($result){
                            $row = mysqli_fetch_assoc($result);
                            $nombreAgence = $row['totalAgence'];
                            echo "<p class='fw-bold text-white text-center fw-bolder fs-1'>$nombreAgence</p>";
                          }else {
                            echo "Erreur lors de l'exécution de la requête : " . $con->error;
                          }
                        ?>
                        
                           
                      
                    </div>
                      <div class="col ms-3 contenuTb">
                        <h3 class="fw-bold text-white text-center fw-bold mt-3">Nombre Agent</h3>
                        
                          <p class="fw-bold text-white text-center fw-bold fs-3">100</p>
                    
                    </div>
                        
                      <div class="col ms-3 contenuTb">
                          <h3 class="fw-bold text-white text-center  mt-3">Membres</h3>
                          <div class="col">
                            <p class="fw-bold text-white text-center fs-4">1000</p>
                        </div>
                      </div>
                    
                </div>
   
       
                <div class="row mt-4">
                      <div class="col ms-3 contenuTb">
                        <h3 class="fw-bold text-white text-center mt-3">Nombre de tontine</h3>
                        <div class="row mt-2">
                          <div class="col">
                              <p class="fw-bold text-white text-center fs-4">Total</p>
                              <p class="fw-bold text-white text-center fs-4" >50</p>
                        </div>
                          <div class="col">
                              <p class="fw-bold text-white text-center fs-4">En Cours</p>
                              <p class="fw-bold text-white text-center fs-4" >20</p>
                          </div>
                        </div>
                    </div>
                    <div class="col ms-3 contenuTb">
                      <h3 class="fw-bold text-white text-center mt-3 ">Montant Rassemblé</h3>
                            <p class="fw-bold text-white text-center fs-4" >800000</p>
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
<!-- Fin du main -->

<?php include("footer.php"); ?>
<?php include("script.php"); ?>
<!-- End #main -->

        

       

   
