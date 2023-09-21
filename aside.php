<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar barAccueil">
  
  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="index.php">
        <i class="bi bi-grid"></i>
        <span>Tableau de bord</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#Agence-nav" data-bs-toggle="collapse" href="#">
        <i class="bx bx-cabinet"></i><span>Gestion des Agence</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="Agence-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="ajoutAgence.php">
            <i class="bi bi-circle"></i><span>Nouvelle</span>
          </a>
        </li>
        <li>
          <a href="afficherAgence.php">
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
          <a href="ajoutAgent.php">
            <i class="bi bi-circle"></i><span>Nouveau</span>
          </a>
        </li>
        <li>
          <a href="listeAgent.php">
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
          <a href="modifMembre.php">
            <i class="bi bi-circle"></i><span>Nouveau</span>
          </a>
        </li>
        <li>
          <a href="membres.php">
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
          <a href="ajoutTontine.php">
            <i class="bi bi-circle"></i><span>Organiser</span>
          </a>
        </li>
        <li>
          <a href="ListeTontineEncours.php">
            <i class="bi bi-circle"></i><span>En Cours</span>
          </a>
        </li>
        <li>
          <a href="historiqueTontine.php">
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
          <a href="ajoutTontineInd.php">
            <i class="bi bi-circle"></i><span>Organiser</span>
          </a>
        </li>
        <li>
          <a href="ListeTontineInd.php">
            <i class="bi bi-circle"></i><span>Liste</span>
          </a>
        </li>
        <li>
          <a href="historiqueTontineInd.php">
            <i class="bi bi-circle"></i><span>Historique</span>
          </a>
        </li>
       
      </ul>
    </li><!-- End Tontine Collective Nav -->
    
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Payement </span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="ajoutPayement.php">
            <i class="bi bi-circle"></i><span>Effectuer</span>
          </a>
        </li>
        <li>
          <a href="listePayement.php">
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
          <a href="cotisation.php">
            <i class="bi bi-circle"></i><span>Nouvelle</span>
          </a>
        </li>
        <li>
          <a href="affichCotisation.php">
            <i class="bi bi-circle"></i><span>Liste</span>
          </a>
        </li>
        <li>
          <a href="historiqueCotisation.php">
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