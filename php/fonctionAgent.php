<?php
     function valider(){
        include("connection.php");
       
        if(isset($_POST['matriculeAgent']) && isset($_POST['nomAgent']) && isset($_POST['prenomAgent']) && isset($_POST['adresseAgent']) && isset($_POST['telAgent']) && isset($_POST['mailAgent']) && isset($_POST['validerAjout'])){
            $matricule = $_POST['matriculeAgent'];
            $nom = $_POST['nomAgent'];
            $Prenom = $_POST['prenomAgent'];
            $adresse = $_POST['adresseAgent'];
            $tel = $_POST['telAgent'];
            $mail = $_POST['mailAgent'];
            $requete = "insert into agent(matriculeAgent,nomAgent,prenomAgent,adresseAgent,telAgent,mailAgent) values('$matricule','$nom', '$Prenom','$adresse','$tel','$mail')";
            $result = $con->query($requete);
            if($result){
                echo "<span class='alert alert-success'> Enregistrement effectués avec succés</span>";
            }
            else{
                echo "<span class='alert alert-danger'>Error</span>";
            }
        } 
    }
    function show(){
        include("connection.php");
        $i = 1;
        $requete = "select * from agent";
        $agents = $con->query($requete);
        while($agen = mysqli_fetch_array($agents)){
            $id = $agen['idAgent'];
            echo "<tr>";
                    echo "<td>".$i."</td>";
                    echo "<td>".$agen['idAgent']."</td>";
                    echo "<td>".$agen['matriculeAgent']."</td>";
                    echo "<td>".$agen['nomAgent']."</td>";
                    echo "<td>".$agen['prenomAgent']."</td>";
                    echo "<td>".$agen['adresseAgent']."</td>";
                    echo "<td>".$agen['telAgent']."</td>";
                    echo "<td>".$agen['mailAgent']."</td>";
                    echo "<td>
                            <a class='btn btn-warning btn-sm edit' data-bs-toggle='modal' data-bs-target='#modalAjoutAgent'><i class='bi bi-pen'></i></a>
                            <a href='listeAgent.php?code=$id' id='supp' class='btn btn-danger btn-sm'><i class='bi bi-trash'></i></a>
                        </td>";
            echo "</tr>";
            $i++;
        }
    }
    function editAgent($id){
        include("connection.php");
        $request = "SELECT * FROM agent where idAgent=$id";
        $result = $con->query($request);
        $Agent = mysqli_fecth_assoc($result);
        return $Agent;
    }
?>