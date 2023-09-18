    <?php
            /// Pour la table Agence

        // Enregistrement de l'agence
        function InsertAgence(){
            include("connection.php");
            if(isset($_POST['nomAgence']) && isset($_POST['adresseAgence']) && isset($_POST['telAgence'])  && isset($_POST['btnValiderAgence'])){
                
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

        function InsertAgenceModal(){
            include("connection.php");
            if(isset($_POST['nomAgence']) && isset($_POST['adresseAgence']) && isset($_POST['telAgence'])  && isset($_POST['btnValiderAgence'])){
                
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
                    echo"<td class='btnCoti'><a href='$id' data-id='1' class='btn btn-transparent editAgence'  data-bs-toggle='modal' data-bs-target='#modalModifAgence' data-bs-placement='bottom' title='Modifier'><i class='bi bi-pen'></i></a></td>";
                    echo"<td class='btnCoti'><a class='btn btn-transparent  ' data-bs-toggle='modal' data-bs-target='#modalSuppressionAgence' data-bs-placement='bottom' title='Supprimer'><i class='bi bi-trash'></i></a> </td>";
                echo "</tr>";
            }
        }

        // Edit Agence
        // function editAgence($id){
        //     include("connection.php");
        //     $request = "SELECT * FROM Agence where idAgence=$id";
        //     $result = $con->query($request);
        //     $Agence = mysqli_fecth_assoc($result);
        //     return response()->json($Agence);
        // }

        function UpdateAgence(){
            include("connection.php");
            if(isset($_POST['MnomAgence']) && isset($_POST['MidAgence']) && isset($_POST['MadresseAgence']) && isset($_POST['MtelAgence']) && isset($_POST['MbtnValiderAgence'])){
                
                if(empty($_POST['MnomAgence']) || empty($_POST['MadresseAgence']) || empty($_POST['MtelAgence'])){
                    echo "<p class='alert alert-danger text-center'>L'un des champ ne doit pas etre vide</p>";

                } else{
                    $id = $_POST['MidAgence'];
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


        /// Pour la table Tontine Individuelle

        function InsertTontineInd(){
            include("connection.php");
            if(isset($_POST['nom']) && isset($_POST['agent']) && isset($_POST['membre']) && isset($_POST['debut']) && isset($_POST['montant']) && isset($_POST['btnValider'])){

                if(empty($_POST['agent']) || empty($_POST['membre']) || empty($_POST['debut']) || empty($_POST['montant'])){
                    echo "<p class='alert alert-danger text-center'>L'un des champ ne doit pas etre vide</p>";
                }else {
                    $date = date('Y');
                    $nom = $_POST['nom'];
                    $membre = $_POST['membre'];
                    $debut = $_POST['debut'];
                    $montant = $_POST['montant'];
                    $code = 'YMTI'.$date.rand(000,999);
                    $agent = $_POST['agent'];
                    $membre = $_POST['membre'];
                    $request = "INSERT INTO TontineIndividuelle(codeTontineIndividuelle, nomTontineIndividuelle, debut, montant, idAgent, idMembre) Values('$code', '$nom', '$debut', $montant, $agent, $membre) ";
                     $result = $con->query($request);
                    if($result){
                        echo "<p class='alert alert-success text-center'>Enregistrer effectué avec succes</p>";
                    }else{
                        echo "<p class='alert alert-danger text-center'>Echec d'enregistrement</p>";
                    }
                }
            }
        }

        function dispalyTontineInd(){
            include("connection.php");
            $i=1;
            $request = "SELECT codeTontineIndividuelle, nomTontineIndividuelle, debut, montant, nomMembre, prenomMembre FROM TontineIndividuelle T, Membre M where T.idMembre = M.idMembre";
            $TontineInd = $con->query($request);
            while($Ti = mysqli_fetch_array($TontineInd)){
                $Code=$Ti["codeTontineIndividuelle"];
            
                echo "<tr>";
                    echo"<td>".$i++."</td>";
                    echo"<td>".$Ti['codeTontineIndividuelle']."</td>";
                    echo"<td>".$Ti['nomTontineIndividuelle']."</td>";
                    echo"<td>".$Ti['debut']."</td>"; 
                    echo"<td>".$Ti['montant']."</td>";
                    echo"<td>".$Ti['nomMembre']." ".$Ti['prenomMembre']."</td>";
                    echo"<td class='btnCoti'><a  class='btn btn-transparent editTontineInd' data-id='2'  data-bs-toggle='modal' data-bs-target='#modalModifTontine' data-bs-placement='bottom' title='Modifier'><i class='bi bi-pen'></i></a></td>";
                    echo"<td class='btnCoti'><button type='button' class='btn btn-transparent' data-bs-toggle='modal' data-bs-target='#modalSuiviTontine' data-bs-placement='bottom' title='Voir'><i class='bi bi-eye'></i></button></td>";
                echo "</tr>";
            }
        }

        // Ajouter une tontine individuelle avec le modal
        function InsertTontineIndModal(){
            include("connection.php");
            if(isset($_POST['nom']) && isset($_POST['agent']) && isset($_POST['membre']) && isset($_POST['debut']) && isset($_POST['montant']) && isset($_POST['btnValider'])){

                if(empty($_POST['agent']) || empty($_POST['membre']) || empty($_POST['debut']) || empty($_POST['montant'])){
                    echo "<p class='alert alert-danger text-center'>L'un des champ ne doit pas etre vide</p>";
                }else {
                    $date = date('Y');
                    $nom = $_POST['nom'];
                    $membre = $_POST['membre'];
                    $debut = $_POST['debut'];
                    $montant = $_POST['montant'];
                    $code = 'YMTI'.$date.rand(000,999);
                    $agent = $_POST['agent'];
                    $membre = $_POST['membre'];
                    $request = "INSERT INTO TontineIndividuelle(codeTontineIndividuelle, nomTontineIndividuelle, debut, montant, idAgent, idMembre) Values('$code', '$nom', '$debut', $montant, $agent, $membre) ";
                    
                    $result = $con->query($request);
                    if($result){
                        echo "<p class='alert alert-success text-center'>Enregistrer effectué avec succes</p>";
                    }else{
                        echo "<p class='alert alert-danger text-center'>Echec d'enregistrement</p>";
                    }
                }
            }
        }

        // Modification de la tontine individuelle
        function updateTontineInd(){
            include("connection.php");
            if(isset($_POST['idTontineInd']) && isset($_POST['mNom']) && isset($_POST['mMembre']) && isset($_POST['mDebut']) && isset($_POST['mMontant']) && isset($_POST['mBtnValider'])){

                if( empty($_POST['mMembre']) || empty($_POST['mDebut']) || empty($_POST['mMontant'])){
                    echo "<p class='alert alert-danger text-center'>L'un des champ ne doit pas etre vide</p>";
                }else {
                   $code =  $_POST['idTontineInd'];
                    $nom = $_POST['mNom'];
                    $membre = $_POST['mMembre'];
                    $debut = $_POST['mDebut'];
                    $montant = $_POST['mMontant'];
                    $request = "UPDATE TontineIndividuelle set idmembre=$membre, nomTontineIndividuelle = '$nom', debut='$debut', montant = $montant where codeTontineIndividuelle = '$code'";                    
                    $result = $con->query($request);
                    if($result){
                        echo "<p class='alert alert-success text-center'>Modification effectué avec succes</p>";
                    }else{
                        echo "<p class='alert alert-danger text-center'>Echec de Modification</p>";
                    }
                }
            }
        }


        //////// Pour l'historique des tontine individuelle
        function dispalyTontineIndHis(){
            include("connection.php");
            $i=1;
            $request = "SELECT codeTontineIndividuelle, nomTontineIndividuelle, debut, montant, nomMembre, prenomMembre FROM TontineIndividuelle T, Membre M where T.idMembre = M.idMembre";
            $TontineInd = $con->query($request);
            while($Ti = mysqli_fetch_array($TontineInd)){
                $Code=$Ti["codeTontineIndividuelle"];
            
                echo "<tr>";
                    echo"<td>".$i++."</td>";
                    echo"<td>".$Ti['codeTontineIndividuelle']."</td>";
                    echo"<td>".$Ti['nomTontineIndividuelle']."</td>";
                    echo"<td>".$Ti['debut']."</td>"; 
                    echo"<td>".$Ti['montant']."</td>";
                    echo"<td>".$Ti['nomMembre']." ".$Ti['prenomMembre']."</td>";
                    echo"<td></td>";
                    echo"<td class='btnCoti'><button type='button' class='btn btn-transparent' data-bs-toggle='modal' data-bs-target='#modalSuiviTontine' data-bs-placement='bottom' title='Voir'><i class='bi bi-eye'></i></button></td>";
                echo "</tr>";
            }
        }

        ////Pour la table cotisation

        function insertCotisation(){
            include("connection.php");
            if( isset($_POST['tontine']) && isset($_POST['membre']) && isset($_POST['debut']) && isset($_POST['montant']) && isset($_POST['btnValider'])){
                if(empty($_POST['tontine']) || empty($_POST['membre']) || empty($_POST['debut']) || empty($_POST['montant'])){
                    echo "<p class='alert alert-danger text-center'>L'un des champ ne doit pas etre vide</p>";
                }else {
                    $date = date('Y');
                    
                    $membre = $_POST['membre'];
                    $debut = $_POST['debut'];
                    $montant = $_POST['montant'];
                    $code = 'YMCI'.$date.rand(000,999);
                    $tontine = $_POST['tontine'];
                   
                    $request = "INSERT INTO cotisation(codeCotisation, dateCotisation, montantCotisation, idTontineIndividuelle, idMembre) Values('$code', '$debut', $montant, $tontine, $membre) ";
                    
                    $result = $con->query($request);
                    if($result){
                        echo "<p class='alert alert-success text-center'>Enregistrer effectué avec succes</p>";
                    }else{
                        echo "<p class='alert alert-danger text-center'>Echec d'enregistrement</p>";
                    }
                }
            }
        }

        // Afficher la liste des cotisations
        function displayCotisation(){
            include("connection.php");
            $i=1;
            $request = "SELECT codeCotisation,nomTontineIndividuelle, dateCotisation, montantCotisation, nomMembre, prenomMembre FROM Cotisation C, TontineIndividuelle T, Membre M where C.idMembre = M.idMembre and C.idTontineIndividuelle = T.idTontineIndividuelle";
            $TontineInd = $con->query($request);
            while($Ti = mysqli_fetch_array($TontineInd)){
                
            
                echo "<tr>";
                    echo"<td>".$i++."</td>";
                    echo"<td>".$Ti['codeCotisation']."</td>";
                    echo"<td>".$Ti['nomTontineIndividuelle']."</td>";
                    echo"<td>".$Ti['nomMembre']." ".$Ti['prenomMembre']."</td>";
                    echo"<td>".$Ti['montantCotisation']."</td>";
                    echo"<td>".$Ti['dateCotisation']."</td>";
                echo "</tr>";
            }
        }
        

        //// Pour la gestion des utilisateurs

        //Ajout utilisateurs///
    function InsertUser(){
        include("connection.php");
        if (isset($_POST['username']) && isset($_POST['passwrd']) &&isset($_POST['typeUtilisateur'])&&isset($_POST['Valider'])){
           if(empty($_POST['username']) || empty($_POST['passwrd']) || empty($_POST['typeUtilisateur'])){
            echo "<p class='alert text-center alert-danger'>Les champs ne doit pas etre vide</p>";
            
           }else if (strlen($_POST['passwrd']) <5 || strlen($_POST['passwrd']) > 20){
             echo "<p class='alert text-center alert-danger'>Le mot de passe doit etre compris entre 5 et 20 caracteres</p>";

           } else {
            $username = $_POST['username'];
            $date = date('Y');
            $code = 'YMUS'.$date.substr($username, 0,1).rand(000,999);
            $passwrd = password_hash($_POST['passwrd'], PASSWORD_DEFAULT) ;
            $typeUtilisateur = $_POST['typeUtilisateur'];
            $requete  = "INSERT INTO utilisateurs(codeUser, username,passwrd,typeUtilisateur) VALUES('$code', '$username','$passwrd','$typeUtilisateur')";
            
            $result = $con->query($requete);
            if($result){
               echo "<p class='alert text-center alert-success'>Ajout effectuer avec success</p>";
            }else{
               echo "<p class='alert text-center alert-danger'>Erreur</p>";
            }
           }

           
        }
    }
     //afficher//
     function DisplayUser(){
        include("connection.php");
        $i = 1;
        $requete = "SELECT * FROM utilisateurs";
       
        $utilisateurs = $con->query($requete);
        while($serv = mysqli_fetch_array($utilisateurs)){
            $id = $serv['CodeUser'];
            echo "<tr>";
                echo "<td>".$i."</td>";
                echo "<td>".$serv['CodeUser']."</td>";
                echo "<td>".$serv['username']."</td>";
                echo "<td>".$serv['passwrd']."</td>";
                echo "<td>".$serv['typeUtilisateur']."</td>";
                echo"<td class='btnCoti'><a  class='btn btn-transparent editUser'   data-bs-toggle='modal' data-bs-target='#modalAjoutUtilisateur' data-bs-placement='bottom' title='Modifier'><i class='bi bi-pen'></i></a></td>";
                echo"<td class='btnCoti'><button type='button' class='btn btn-transparent' data-bs-toggle='modal' data-bs-target='#modalSuiviTontine' data-bs-placement='bottom' title='Voir'><i class='bi bi-eye'></i></button></td>";
            echo "</tr>";
            $i++;
        }
    }

    ?>