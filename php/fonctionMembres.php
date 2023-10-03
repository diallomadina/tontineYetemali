<?php
    function enregistrer(){
        include("connection.php");
       
        if(isset($_POST['nomMembre']) && isset($_POST['prenomMembre']) && isset($_POST['adresseMembre']) && isset($_POST['dateAdhesion']) && isset($_POST['telMembre']) && isset($_POST['mailMembre']) && isset($_POST['enregistrer'])){
            $nom = $_POST['nomMembre'];

            $Prenom = $_POST['prenomMembre'];
            $adresse = $_POST['adresseMembre'];
            $date = $_POST['dateAdhesion'];
            $tel = $_POST['telMembre'];
            $mail = $_POST['mailMembre'];
            $requete = "insert into membre(nomMembre,prenomMembre,adresseMembre,dateAdhesion,telMembre,mailMembre) values('$nom', '$Prenom','$adresse','$date','$tel','$mail')";
            $result = $con->query($requete);
            if($result){
                echo "<span class='alert alert-success'> Enregistrement effectués avec succés</span>";
            }
            else{
                echo "<span class='alert alert-danger'>Error</span>";
            }
        } 
    }
    function afficher(){
        include("connection.php");
        $i = 1;
        $requete = "select * from membre";
        $membres = $con->query($requete);
        while($memb = mysqli_fetch_array($membres)){
            $id = $memb['idMembre'];
            echo "<tr>";
                    echo "<td>".$i."</td>";
                    echo "<td>".$memb['matriculeMembre']."</td>";
                    echo "<td>".$memb['photoMembre']."</td>";
                    echo "<td>".$memb['nomMembre']."</td>";
                    echo "<td>".$memb['prenomMembre']."</td>";
                    echo "<td>".$memb['adresseMembre']."</td>";
                    echo "<td>".$memb['telMembre']."</td>";
                    echo "<td>".$memb['dateAdhesion']."</td>";
                    echo "<td>".$memb['mailMembre']."</td>";
                    echo "<td>
                            <a class='btn btn-warning btn-sm editer' data-bs-toggle='modal' data-bs-target='#modalmodif'><i class='bi bi-pen'></i></a>
                            <a href='membres.php?code=$id' id='supp' class='btn btn-danger btn-sm'><i class='bi bi-trash'></i></a>
                        </td>";
            echo "</tr>";
            $i++;
        }
    }
    function edit($id){
        include("connection.php");
        $requete = "select * from membre where idMembre=$id";
        $resultat = $con->query($requete);
        $membre= mysqli_fetch_assoc($resultat);
        return $membre;
    }
    function modifier(){
        include("connection.php");
       
        if(isset($_POST['mIdMembre'])&& isset($_POST['mNomMembre']) && isset($_POST['mPrenomMembre']) && isset($_POST['mAdresseMembre']) && isset($_POST['mDateMembre']) && isset($_POST['mTelMembre']) && isset($_POST['mMailMembre']) && isset($_POST['btnEnregistrer'])){
            $id = $_POST['mIdMembre'];
            $nom = $_POST['mNomMembre'];
            $Prenom = $_POST['mPrenomMembre'];
            $adresse = $_POST['mAdresseMembre'];
            $date = $_POST['mDateMembre'];
            $tel = $_POST['mTelMembre'];
            $mail = $_POST['mMailMembre'];
            $requete = "update  membre set nomMembre='$nom', prenomMembre='$prenom', adresseMembre='$adresse', dateAdhesion='$date', telMembre='$tel', mailMembre='$mail', where IdMembre=$id";
            $result = $con->query($requete);
            if($result){
                echo "<span class='alert alert-success'>Modification effectué avec succés</span>";
            }
            else{
                echo "<span class='alert alert-danger'>Error</span>";
            }
        } 
    }
?>