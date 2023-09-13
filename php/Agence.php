<?php

    // Enregistrement de l'agence
    function InsertAgence(){
        include("connection.php");
        if(isset($_POST['nomAgence']) && isset($_POST['adresseAgence']) && isset($_POST['telAgence'])  && isset($_POST['MbtnValiderAgence'])){
            
            if(empty($_POST['nomAgence']) || empty($_POST['adresseAgence']) || empty($_POST['telAgence'])){
                echo "<p class='alert alert-danger text-center'>L'un des champ ne doit pas etre vide</p>";

            } else{
                $nomAgence = $_POST['nomAgence'];
                $adresseAgence = $_POST['adresseAgence'];
                $telAgence = $_POST['telAgence'];
                $request = "INSERT INTO Agence(adresseAgence, telAgence, nomAgence) VALUES('$adresseAgence', '$telAgence', '$nomAgence' )";
                $result = $con->query($request);
                if($result){
                    echo "<p class='alert alert-success text-center'>Enregistrement effectué avec succes</p>";
                }else{
                    echo "<p class='alert alert-danger text-center'>Echec d'enregistrement</p>";
                }
            }
        }
    }

    // Afficher les Agence
    function displayAgence(){
        include("connection.php");
        $i=1;
        $request = "SELECT * FROM Agence";
        $Agence = $con->query($request);
        while($Ag = mysqli_fetch_array($Agence)){
            $id=$Ag["idAgence"];
            echo "<tr>";
                echo"<td>".$i++."</td>";
                echo"<td>".$Ag['idAgence']."</td>";
                echo"<td>".$Ag['NomAgence']."</td>";
                echo"<td>".$Ag['telAgence']."</td>"; 
                echo"<td>".$Ag['adresseAgence']."</td>";
                echo"<td class='btnCoti'><a href='afficherAgence.php?idAgence=$id' class='btn btn-transparent'  data-bs-toggle='modal' data-bs-target='#modalModifAgence' data-bs-placement='bottom' title='Modifier'><i class='bi bi-pen'></i></a></td>";
                echo"<td class='btnCoti'><a class='btn btn-transparent  ' data-bs-toggle='modal' data-bs-target='#modalSuppressionAgence' data-bs-placement='bottom' title='Supprimer'><i class='bi bi-trash'></i></a> </td>";
            echo "</tr>";
        }
    }

    // Edit Agence
    function editAgence($id){
        include("connection.php");
        $request = "SELECT * FROM Agence where idAgence=$id";
        $result = $con->query($request);
        $Agence = mysqli_fecth_assoc($result);
        return $Agence;
    }

    function UpdateAgence(){
        include("connection.php");
        if(isset($_POST['MnomAgence']) && isset($_POST['idAgence']) && isset($_POST['MadresseAgence']) && isset($_POST['MtelAgence']) && isset($_POST['MbtnValiderAgence'])){
            
            if(empty($_POST['MnomAgence']) || empty($_POST['MadresseAgence']) || empty($_POST['MtelAgence'])){
                echo "<p class='alert alert-danger text-center'>L'un des champ ne doit pas etre vide</p>";

            } else{
                $id = $_POST['idAgence'];
                $nomAgence = $_POST['MnomAgence'];
                $adresseAgence = $_POST['MadresseAgence'];
                $telAgence = $_POST['MtelAgence'];
                $request = "UPDATE Agence Set adresseAgence='$adresseAgence', telAgence='$telAgence', nomAgence='$nomAgence' where idAgence=$id";
                $result = $con->query($request);
                if($result){
                    echo "<p class='alert alert-success text-center'>Modification effectué avec succes</p>";
                }else{
                    echo "<p class='alert alert-danger text-center'>Echec de Modification</p>";
                }
            }
        }
    }
    
?>