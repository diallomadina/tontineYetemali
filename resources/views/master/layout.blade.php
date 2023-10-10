<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />

        <title>Tontine YeteMali</title>
        <meta content="" name="description" />
        <meta content="" name="keywords" />

        <!-- Favicons -->
        <link href="{{asset('assets/img/yetemalip.png')}}" rel="icon" />
        <link href="{{asset('assets/img/yetemali.jpg')}}" rel="apple-touch-icon" />

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect" />
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet" />

        <!-- Vendor CSS Files -->
        <link
            href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}"
            rel="stylesheet" />
        <link
            href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}"
            rel="stylesheet" />
        <link
            href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}"
            rel="stylesheet" />
        <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet" />
        <link
            href="{{asset('assets/vendor/simple-datatables/style.css')}}"
            rel="stylesheet" />

        <!-- Template Main CSS File -->
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
    </head>
    <body>  <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top d-flex align-items-center">

            <div class="d-flex align-items-center justify-content-between">
                <a href="{{route('acceuil')}}" class="logo d-flex align-items-center">
                    <img src="{{asset('assets/img/yetemali.jpg')}}" alt="">
                    <span class="d-none d-lg-block textAccueil" style="color: white;
                    font-weight: bold;">Yete Mali</span>
                </a>
                <i class="bi bi-list toggle-sidebar-"></i>
            </div><!-- End Logo -->

        </header><!-- End Header -->
        <!-- ======= Sidebar ======= -->
        <aside id="sidebar" class="sidebar barAccueil">

            <ul class="sidebar-nav" id="sidebar-nav">

                <li class="nav-item">
                    <a class="nav-link " href="{{route('acceuil')}}">
                        <i class="bi bi-grid"></i>
                        <span>Tableau de bord</span>
                    </a>
                </li><!-- End Dashboard Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#Agence-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-house"></i><span>Gestion des Agence</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                <ul id="Agence-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('ajoutAgence')}}">
                            <i class="bi bi-circle"></i><span>Nouvelle</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('afficherAgence')}}">
                            <i class="bi bi-circle"></i><span>Liste</span>
                        </a>
                    </li>

                </ul>
                </li><!-- End Agence Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#Agent-nav" data-bs-toggle="collapse" href="#">
                        <i class="bx bx-street-view"></i><span>Gestion des Agents</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="Agent-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{route('ajoutAgent')}}">
                                <i class="bi bi-circle"></i><span>Nouveau</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('listeAgent')}}">
                                <i class="bi bi-circle"></i><span>Liste</span>
                            </a>
                        </li>

                    </ul>
                </li><!-- End Agent Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#membre-nav" data-bs-toggle="collapse" href="#">
                        <i class="bx bxs-group"></i><span>Membres</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="membre-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{route('modifMembre')}}">
                                <i class="bi bi-circle"></i><span>Nouveau</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('membre')}}">
                                <i class="bi bi-circle"></i><span>Liste</span>
                            </a>
                        </li>

                    </ul>
                </li><!-- End Membre Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#tontine-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-journal-text"></i><span>Tontine Collective</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="tontine-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{route('ajoutTontine')}}">
                                <i class="bi bi-circle"></i><span>Organiser</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('gestionTontine')}}">
                                <i class="bi bi-circle"></i><span>Gerer</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('listeTontine')}}">
                                <i class="bi bi-circle"></i><span>Liste</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('historiqueTontine')}}">
                                <i class="bi bi-circle"></i><span>Historique</span>
                            </a>
                        </li>

                    </ul>
                </li><!-- End Tontine Individuelle Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#tontineIndividuelle-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-journal-text"></i><span>Tontine Individuelle</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="tontineIndividuelle-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                        <a href="{{route('ajoutTontineInd')}}">
                            <i class="bi bi-circle"></i><span>Organiser</span>
                        </a>
                        </li>
                        <li>
                        <a href="{{route('listeTontineInd')}}">
                            <i class="bi bi-circle"></i><span>Liste</span>
                        </a>
                        </li>
                        <li>
                        <a href="{{route('historiqueTontineInd')}}">
                            <i class="bi bi-circle"></i><span>Historique</span>
                        </a>
                        </li>

                    </ul>
                </li><!-- End Tontine Collective Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-journal-text"></i><span>Versement </span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                        <a href="{{route('ajoutPayement')}}">
                            <i class="bi bi-circle"></i><span>Effectuer</span>
                        </a>
                        </li>
                        <li>
                        <a href="{{route('listePayement')}}">
                            <i class="bi bi-circle"></i><span>Historique</span>
                        </a>
                        </li>
                    </ul>
                </li><!-- End Forms Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#cotisation-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-layout-text-window-reverse"></i><span>Cotisations</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="cotisation-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                        <a href="{{route('cotisation')}}">
                            <i class="bi bi-circle"></i><span>Nouvelle</span>
                        </a>
                        </li>
                        <li>
                        <a href="{{route('afficheCotisation')}}">
                            <i class="bi bi-circle"></i><span>Liste</span>
                        </a>
                        </li>
                        <li>
                        <a href="{{route('historiqueCotisation')}}">
                            <i class="bi bi-circle"></i><span>Historique</span>
                        </a>
                        </li>
                    </ul>
                </li><!-- End Tables Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="users.php">
                        <i class="bx bxs-user"></i>
                        <span>Utlisateurs</span>
                    </a>
                </li><!-- End Profile Page Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="users-profile.php">
                        <i class="bi bi-person"></i>
                        <span>Profile</span>
                    </a>
                </li><!-- End Profile Page Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="authentification.php">
                        <i class="bx bx-exit"></i>
                        <span>Deconnexion</span>
                    </a>
                </li>

            </ul>

        </aside><!-- End Sidebar-->

            @yield('content')
        <div
            href="#"
            class="back-to-top d-flex align-items-center justify-content-center"
            ><i class="bi bi-arrow-up-short text-center">CopyRigt 2023 Conçu par Digital Learning Center</i>
    </div>
             <!-- Vendor JS Files -->

        <script src="{{asset('assets/js/EditMem.js')}}"></script>
        <script src="{{asset('assets/js/membres.js')}}"></script>
        <script src="{{asset('assets/js/editAgent.js')}}"></script>
        <script src="{{asset('assets/js/scriptIb.js')}}"></script>
        <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
        <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
        <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
        <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
        <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
        <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

        <!-- Template Main JS File -->
    </body>
</html>
