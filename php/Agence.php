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
                    $date = date('Y');
                    $i=1;
                    $code = 'YM'.substr($nomAgence,0,2).$date.rand(100,999).$i++;
                    $request = "INSERT INTO Agence(codeAgence, adresseAgence, telAgence, nomAgence) VALUES('$code','$adresseAgence', '$telAgence', '$nomAgence' )";
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
                    $date = 'Y';
                    $i=0;
                    $code = 'YM'.substr($nomAgence,0,2).$date.rand(100,999).$i++;
                    $request = "INSERT INTO Agence(codeAgence,adresseAgence, telAgence, nomAgence) VALUES('$code','$adresseAgence', '$telAgence', '$nomAgence' )";
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
                    echo"<td>".$Ag['codeAgence']."</td>";
                    echo"<td>".$Ag['nomAgence']."</td>";
                    echo"<td>".$Ag['telAgence']."</td>"; 
                    echo"<td>".$Ag['adresseAgence']."</td>";
                    echo"<td class='btnCoti'><a href='$id' data-id='1' class='btn btn-transparent editAgence'  data-bs-toggle='modal' data-bs-target='#modalModifAgence' data-bs-placement='bottom' title='Modifier'><i class='bi bi-pen'></i></a></td>";
                    echo"<td class='btnCoti'><a class='btn btn-transparent  ' data-bs-toggle='modal' data-bs-target='#modalSuppressionAgence' data-bs-placement='bottom' title='Supprimer'><i class='bi bi-trash'></i></a> </td>";
                echo "</tr>";
            }
        }

        // Afficher les Agence par code
        function displayAgenceWithCode(){
            include("connection.php");
            $text = $_POST['txtRecherche'];
            $i=1;
            $request = "SELECT * FROM Agence where codeAgence like '%$text%'";
            $Agence = $con->query($request);
            while($Ag = mysqli_fetch_array($Agence)){
                $id=$Ag["idAgence"];
            
                echo "<tr>";
                    echo"<td>".$i++."</td>";
                    echo"<td>".$Ag['codeAgence']."</td>";
                    echo"<td>".$Ag['nomAgence']."</td>";
                    echo"<td>".$Ag['telAgence']."</td>"; 
                    echo"<td>".$Ag['adresseAgence']."</td>";
                    echo"<td class='btnCoti'><a href='$id' data-id='1' class='btn btn-transparent editAgence'  data-bs-toggle='modal' data-bs-target='#modalModifAgence' data-bs-placement='bottom' title='Modifier'><i class='bi bi-pen'></i></a></td>";
                    echo"<td class='btnCoti'><a class='btn btn-transparent  ' data-bs-toggle='modal' data-bs-target='#modalSuppressionAgence' data-bs-placement='bottom' title='Supprimer'><i class='bi bi-trash'></i></a> </td>";
                echo "</tr>";
            }
        }

              // Afficher les Agence nom
              function displayAgenceWithName(){
                include("connection.php");
                $text = $_POST['txtRecherche'];
                $i=1;
                $request = "SELECT * FROM Agence where nomAgence like '%$text%'";
                $Agence = $con->query($request);
                while($Ag = mysqli_fetch_array($Agence)){
                    $id=$Ag["idAgence"];
                
                    echo "<tr>";
                        echo"<td>".$i++."</td>";
                        echo"<td>".$Ag['codeAgence']."</td>";
                        echo"<td>".$Ag['nomAgence']."</td>";
                        echo"<td>".$Ag['telAgence']."</td>"; 
                        echo"<td>".$Ag['adresseAgence']."</td>";
                        echo"<td class='btnCoti'><a href='$id' data-id='1' class='btn btn-transparent editAgence'  data-bs-toggle='modal' data-bs-target='#modalModifAgence' data-bs-placement='bottom' title='Modifier'><i class='bi bi-pen'></i></a></td>";
                        echo"<td class='btnCoti'><a class='btn btn-transparent  ' data-bs-toggle='modal' data-bs-target='#modalSuppressionAgence' data-bs-placement='bottom' title='Supprimer'><i class='bi bi-trash'></i></a> </td>";
                    echo "</tr>";
                }
            }

             // Afficher les Agence nom
             function displayAgenceWithAdresse(){
                include("connection.php");
                $text = $_POST['txtRecherche'];
                $i=1;
                $request = "SELECT * FROM Agence where adresseAgence like '%$text%'";
                $Agence = $con->query($request);
                while($Ag = mysqli_fetch_array($Agence)){
                    $id=$Ag["idAgence"];
                
                    echo "<tr>";
                        echo"<td>".$i++."</td>";
                        echo"<td>".$Ag['codeAgence']."</td>";
                        echo"<td>".$Ag['nomAgence']."</td>";
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
                    $request = "UPDATE Agence Set adresseAgence='$adresseAgence', telAgence='$telAgence', nomAgence='$nomAgence' where codeAgence='$id'";
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
        // Afficher la tontine individuelle par identifiant
        function dispalyTontineIndWithId(){
            include("connection.php");
            $text = $_POST['txtRecherche'];
            $i=1;
            $request = "SELECT codeTontineIndividuelle, nomTontineIndividuelle, debut, montant, nomMembre, prenomMembre FROM TontineIndividuelle T, Membre M where T.idMembre = M.idMembre and codeTontineIndividuelle= '%$text%'";
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

          // Afficher la tontine individuelle par nom
          function dispalyTontineIndWithName(){
            include("connection.php");
            $text = $_POST['txtRecherche'];
            $i=1;
            $request = "SELECT codeTontineIndividuelle, nomTontineIndividuelle, debut, montant, nomMembre, prenomMembre FROM TontineIndividuelle T, Membre M where T.idMembre = M.idMembre and nomTontineIndividuelle= '%$text%'";
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

         // Afficher la tontine individuelle par Montant
         function dispalyTontineIndWithMontant(){
            include("connection.php");
            $text = $_POST['txtRecherche'];
            $i=1;
            $request = "SELECT codeTontineIndividuelle, nomTontineIndividuelle, debut, montant, nomMembre, prenomMembre FROM TontineIndividuelle T, Membre M where T.idMembre = M.idMembre and nomTontineIndividuelle= '%$text%'";
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

    ////// Pour la table Tontine Individuelle
    function InsertTontineCollective(){
        include("connection.php");
        if(isset($_POST['nom']) && isset($_POST['agent']) && isset($_POST['frequence']) && isset($_POST['debut']) && isset($_POST['montant']) && isset($_POST['participant']) && isset($_POST['ajouter'])){

            if(empty($_POST['agent']) || empty($_POST['nom']) || empty($_POST['debut']) || empty($_POST['montant']) || empty($_POST['frequence']) || empty($_POST['participant'])){
                echo "<p class='alert alert-danger text-center'>L'un des champ ne doit pas etre vide</p>";
            }else {
                $date = date('Y');
                $nom = $_POST['nom'];
                $frequence = $_POST['frequence'];
                $debut = $_POST['debut'];
                $montant = $_POST['montant'];
                $code = 'YMTC'.$date.rand(000,999);
                $agent = $_POST['agent'];
                $participant = $_POST['participant'];
                $request = "INSERT INTO TontineCollective(codeTontineCollective, nomTontineCollective, debut, montant, idAgent, nombreparticipant, frequence) Values('$code', '$nom', '$debut', $montant, $agent, $participant, $frequence) ";
                $result = $con->query($request);
                if($result){
                    echo "<p class='alert alert-success text-center'>Enregistrer effectué avec succes</p>";
                }else{
                    echo "<p class='alert alert-danger text-center'>Echec d'enregistrement</p>";
                }
            }
        }
    }

    // Ajouter une participation
    function AddParticipation(){
        include("connection.php");
        if(isset($_POST['tontine'])&&isset($_POST['membre'])&&isset($_POST['associer'])){
            $tontine = $_POST['tontine'];
            $membre = $_POST['membre'];
            $request = "INSERT INTO paticipation(tontine, membre) values ($tontine, $membre)";
            $result = $con->query($request);
            if($result){
                echo "<p class='alert alert-success text-center'>Association effectué avec succes</p>";
            }else{
                echo "<p class='alert alert-danger text-center'>Echec de l'association</p>";
            }
        }
    }

    function dispalyTontineCollective(){
        include("connection.php");
        $i=1;
        $request = "SELECT codeTontineCollective, nomTontineCollective, debut, montant, frequence, nombreparticipant FROM TontineCollective";
        $TontineInd = $con->query($request);
        while($Ti = mysqli_fetch_array($TontineInd)){
            $Code=$Ti["codeTontineCollective"];
        
            echo "<tr>";
                echo"<td>".$i++."</td>";
                echo"<td>".$Ti['codeTontineCollective']."</td>";
                echo"<td>".$Ti['nomTontineCollective']."</td>";
                echo"<td>".$Ti['debut']."</td>"; 
                echo"<td>".$Ti['montant']."</td>";
                echo"<td>".$Ti['frequence']."</td>";
                echo"<td>".$Ti['nombreparticipant']."</td>";
                echo"<td class='btnCoti'><a  class='btn btn-transparent editTontineInd'  data-bs-toggle='modal' data-bs-target='#modalModifTontine' data-bs-placement='bottom' title='Modifier'><i class='bi bi-pen'></i></a></td>";
                echo"<td class='btnCoti'><button type='button' class='btn btn-transparent' data-bs-toggle='modal' data-bs-target='#modalSuiviTontine' data-bs-placement='bottom' title='Voir'><i class='bi bi-eye'></i></button></td>";
            echo "</tr>";
        }
    }
    /// Rechercher par code
    function dispalyTontineCollectiveWithCode(){

        include("connection.php");
        $text = $_POST['txtRecherche'];
        $i=1;
        $request = "SELECT codeTontineCollective, nomTontineCollective, debut, montant, frequence, nombreparticipant FROM TontineCollective where codeTontineCollective like '%$text%'";
        $TontineInd = $con->query($request);
        while($Ti = mysqli_fetch_array($TontineInd)){
            $Code=$Ti["codeTontineCollective"];
        
            echo "<tr>";
                echo"<td>".$i++."</td>";
                echo"<td>".$Ti['codeTontineCollective']."</td>";
                echo"<td>".$Ti['nomTontineCollective']."</td>";
                echo"<td>".$Ti['debut']."</td>"; 
                echo"<td>".$Ti['montant']."</td>";
                echo"<td>".$Ti['frequence']."</td>";
                echo"<td>".$Ti['nombreparticipant']."</td>";
                echo"<td class='btnCoti'><a  class='btn btn-transparent editTontineInd'  data-bs-toggle='modal' data-bs-target='#modalModifTontine' data-bs-placement='bottom' title='Modifier'><i class='bi bi-pen'></i></a></td>";
                echo"<td class='btnCoti'><button type='button' class='btn btn-transparent' data-bs-toggle='modal' data-bs-target='#modalSuiviTontine' data-bs-placement='bottom' title='Voir'><i class='bi bi-eye'></i></button></td>";
            echo "</tr>";
        }
    }
    // Rechercher par nom
    function dispalyTontineCollectiveWithName(){

        include("connection.php");
        $text = $_POST['txtRecherche'];
        $i=1;
        $request = "SELECT codeTontineCollective, nomTontineCollective, debut, montant, frequence, nombreparticipant FROM TontineCollective where nomTontineCollective like '%$text%'";
        $TontineInd = $con->query($request);
        while($Ti = mysqli_fetch_array($TontineInd)){
            $Code=$Ti["codeTontineCollective"];
        
            echo "<tr>";
                echo"<td>".$i++."</td>";
                echo"<td>".$Ti['codeTontineCollective']."</td>";
                echo"<td>".$Ti['nomTontineCollective']."</td>";
                echo"<td>".$Ti['debut']."</td>"; 
                echo"<td>".$Ti['montant']."</td>";
                echo"<td>".$Ti['frequence']."</td>";
                echo"<td>".$Ti['nombreparticipant']."</td>";
                echo"<td class='btnCoti'><a  class='btn btn-transparent editTontineInd'  data-bs-toggle='modal' data-bs-target='#modalModifTontine' data-bs-placement='bottom' title='Modifier'><i class='bi bi-pen'></i></a></td>";
                echo"<td class='btnCoti'><button type='button' class='btn btn-transparent' data-bs-toggle='modal' data-bs-target='#modalSuiviTontine' data-bs-placement='bottom' title='Voir'><i class='bi bi-eye'></i></button></td>";
            echo "</tr>";
        }
    }

    // Recherche par montnat
    function dispalyTontineCollectiveMontant(){

        include("connection.php");
        $text = $_POST['txtRecherche'];
        $i=1;
        $request = "SELECT codeTontineCollective, nomTontineCollective, debut, montant, frequence, nombreparticipant FROM TontineCollective where montant = '%$text%'";
        $TontineInd = $con->query($request);
        while($Ti = mysqli_fetch_array($TontineInd)){
            $Code=$Ti["codeTontineCollective"];
        
            echo "<tr>";
                echo"<td>".$i++."</td>";
                echo"<td>".$Ti['codeTontineCollective']."</td>";
                echo"<td>".$Ti['nomTontineCollective']."</td>";
                echo"<td>".$Ti['debut']."</td>"; 
                echo"<td>".$Ti['montant']."</td>";
                echo"<td>".$Ti['frequence']."</td>";
                echo"<td>".$Ti['nombreparticipant']."</td>";
                echo"<td class='btnCoti'><a  class='btn btn-transparent editTontineInd'  data-bs-toggle='modal' data-bs-target='#modalModifTontine' data-bs-placement='bottom' title='Modifier'><i class='bi bi-pen'></i></a></td>";
                echo"<td class='btnCoti'><button type='button' class='btn btn-transparent' data-bs-toggle='modal' data-bs-target='#modalSuiviTontine' data-bs-placement='bottom' title='Voir'><i class='bi bi-eye'></i></button></td>";
            echo "</tr>";
        }
    }

    ////////////////////////////////////////////////////////

    //Pour Payement
    function insertPayement(){
        include("connection.php");
        if( isset($_POST['tontine']) && isset($_POST['membre']) && isset($_POST['debut']) && isset($_POST['montant']) && isset($_POST['btnValider'])){
            if(empty($_POST['tontine']) || empty($_POST['membre']) || empty($_POST['debut']) || empty($_POST['montant'])){
                echo "<p class='alert alert-danger text-center'>L'un des champ ne doit pas etre vide</p>";
            }else {
                $date = date('Y');
                
                $membre = $_POST['membre'];
                $debut = $_POST['debut'];
                $montant = $_POST['montant'];
                $code = 'YMPC'.$date.rand(000,999);
                $tontine = $_POST['tontine'];
               
                $request = "INSERT INTO payement(codepayement, datepayement, montantpayement, idTontineCollectif, idMembre) Values('$code', '$debut', $montant, $tontine, $membre) ";
                
                $result = $con->query($request);
                if($result){
                    echo "<p class='alert alert-success text-center'>Enregistrer effectué avec succes</p>";
                }else{
                    echo "<p class='alert alert-danger text-center'>Echec d'enregistrement</p>";
                }
            }
        }
    }

    // Pour Afficher les payement
    function displayPayement(){
        include("connection.php");
        $i=1;
        $request = "SELECT codePayement, nomTontineCollective, datePayement, montantPayement, nomMembre, prenomMembre FROM Payement C, TontineCollective T, Membre M where C.idMembre = M.idMembre and C.idTontineCollectif = T.idTontineCollectif";
        $TontineInd = $con->query($request);
        while($Ti = mysqli_fetch_array($TontineInd)){
            
        
            echo "<tr>";
                echo"<td>".$i++."</td>";
                echo"<td>".$Ti['codePayement']."</td>";
                echo"<td>".$Ti['nomTontineCollective']."</td>";
                echo"<td>".$Ti['nomMembre']." ".$Ti['prenomMembre']."</td>";
                echo"<td>".$Ti['montantPayement']."</td>";
                echo"<td>".$Ti['datePayement']."</td>";
            echo "</tr>";
        }
    }

    // Afficher avec le payement par identifiant
    function displayPayementWithCode(){
        include("connection.php");
        $text = $_POST['txtRecherche'];
        $i=1;
        $request = "SELECT codePayement, nomTontineCollective, datePayement, montantPayement, nomMembre, prenomMembre FROM Payement C, TontineCollective T, Membre M where C.idMembre = M.idMembre and C.idTontineCollectif = T.idTontineCollectif and codePayement like '%$text%'";
        $TontineInd = $con->query($request);
        while($Ti = mysqli_fetch_array($TontineInd)){
            
        
            echo "<tr>";
                echo"<td>".$i++."</td>";
                echo"<td>".$Ti['codePayement']."</td>";
                echo"<td>".$Ti['nomTontineCollective']."</td>";
                echo"<td>".$Ti['nomMembre']." ".$Ti['prenomMembre']."</td>";
                echo"<td>".$Ti['montantPayement']."</td>";
                echo"<td>".$Ti['datePayement']."</td>";
            echo "</tr>";
        }
    }

       // Afficher avec le payement par Tontine
       function displayPayementWithTontine(){
        include("connection.php");
        $text = $_POST['txtRecherche'];
        $i=1;
        $request = "SELECT codePayement, nomTontineCollective, datePayement, montantPayement, nomMembre, prenomMembre FROM Payement C, TontineCollective T, Membre M where C.idMembre = M.idMembre and C.idTontineCollectif = T.idTontineCollectif and nomTontineCollective like '%$text%'";
        $TontineInd = $con->query($request);
        while($Ti = mysqli_fetch_array($TontineInd)){
            
        
            echo "<tr>";
                echo"<td>".$i++."</td>";
                echo"<td>".$Ti['codePayement']."</td>";
                echo"<td>".$Ti['nomTontineCollective']."</td>";
                echo"<td>".$Ti['nomMembre']." ".$Ti['prenomMembre']."</td>";
                echo"<td>".$Ti['montantPayement']."</td>";
                echo"<td>".$Ti['datePayement']."</td>";
            echo "</tr>";
        }
    }

       // Afficher avec le payement par Membre
       function displayPayementWithMembre(){
        include("connection.php");
        $text = $_POST['txtRecherche'];
        $i=1;
        $request = "SELECT codePayement, nomTontineCollective, datePayement, montantPayement, nomMembre, prenomMembre FROM Payement C, TontineCollective T, Membre M where C.idMembre = M.idMembre and C.idTontineCollectif = T.idTontineCollectif and nomMembre like '%$text%'  or prenomMembre like '%$text%'";
        $TontineInd = $con->query($request);
        while($Ti = mysqli_fetch_array($TontineInd)){
            
        
            echo "<tr>";
                echo"<td>".$i++."</td>";
                echo"<td>".$Ti['codePayement']."</td>";
                echo"<td>".$Ti['nomTontineCollective']."</td>";
                echo"<td>".$Ti['nomMembre']." ".$Ti['prenomMembre']."</td>";
                echo"<td>".$Ti['montantPayement']."</td>";
                echo"<td>".$Ti['datePayement']."</td>";
            echo "</tr>";
        }
    }

    // Afficher avec le payement par Montant
    function displayPayementWithMontant(){
        include("connection.php");
        $text = $_POST['txtRecherche'];
        $i=1;
        $request = "SELECT codePayement, nomTontineCollective, datePayement, montantPayement, nomMembre, prenomMembre FROM Payement C, TontineCollective T, Membre M where C.idMembre = M.idMembre and C.idTontineCollectif = T.idTontineCollectif and montantPayement like '%$text%'";
        $TontineInd = $con->query($request);
        while($Ti = mysqli_fetch_array($TontineInd)){
            
        
            echo "<tr>";
                echo"<td>".$i++."</td>";
                echo"<td>".$Ti['codePayement']."</td>";
                echo"<td>".$Ti['nomTontineCollective']."</td>";
                echo"<td>".$Ti['nomMembre']." ".$Ti['prenomMembre']."</td>";
                echo"<td>".$Ti['montantPayement']."</td>";
                echo"<td>".$Ti['datePayement']."</td>";
            echo "</tr>";
        }
    }

    // Afficher avec le payement par Montant
    function displayPayementWithDate(){
        include("connection.php");
        $date1 = $_POST['date1'];
        $date2 = $_POST['date2'];
        $i=1;
        $request = "SELECT codePayement, nomTontineCollective, datePayement, montantPayement, nomMembre, prenomMembre FROM Payement C, TontineCollective T, Membre M where C.idMembre = M.idMembre and C.idTontineCollectif = T.idTontineCollectif Between '$date1' AND '$date2'";
        $TontineInd = $con->query($request);
        while($Ti = mysqli_fetch_array($TontineInd)){

            echo "<tr>";
                echo"<td>".$i++."</td>";
                echo"<td>".$Ti['codePayement']."</td>";
                echo"<td>".$Ti['nomTontineCollective']."</td>";
                echo"<td>".$Ti['nomMembre']." ".$Ti['prenomMembre']."</td>";
                echo"<td>".$Ti['montantPayement']."</td>";
                echo"<td>".$Ti['datePayement']."</td>";
            echo "</tr>";
        }
    }
    

    //////////////////////////////////////////////////////
    // Pour les Agents
    function InsertAgent(){
        include("connection.php");
        if(isset($_POST['agence']) && isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['prenom']) && isset($_POST['telephone']) && isset($_POST['mail']) && isset($_POST['ajouter']) ){
            if(empty($_POST['agence']) || empty($_POST['nom']) || empty($_POST['adresse']) || empty($_POST['prenom']) || empty($_POST['telephone']) || empty($_POST['mail'])){
                echo "<p class='alert alert-danger text-center'>L'un des champs ne doit pas etre vide</p>";
            }else {
                $agence = $_POST['agence'];
                $nom = $_POST['nom'];
                $mail = $_POST['mail'];
                $adresse = $_POST['adresse'];
                $prenom = $_POST['prenom'];
                $telephone = $_POST['telephone'];
                $photo = $_FILES['photo']['name']; 
                $chemin = $_FILES['photo']['tmp_name'];
                $date = date('Y');
                $code ='YM'.substr($nom,0,1).substr($prenom,0,1).$date. round(000,999);
                move_uploaded_file($chemin, "./photo/$photo");
                $request = "INSERT INTO agent (matriculeAgent, nomAgent, prenomAgent, adresseAgent, telAgent, mailAgent, photoAgent, idAgence) VALUES ('$code', '$nom', '$prenom', '$adresse', '$telephone', '$mail', '$photo', $agence)";
                $result = $con->query($request);
                if($result){
                    echo "<p class='alert alert-success text-center'>Enregistrer effectué avec succes</p>";
                }else{
                    echo "<p class='alert alert-danger text-center'>Echec d'enregistrement</p>";
                }
            }
           
        }
    }

    //Fonction pour afficher les agennts
    function displayAgent(){
        include("connection.php");
        $i=1;
        $request = "SELECT photoAgent, matriculeAgent, nomAgent, prenomAgent, adresseAgent, telAgent, mailAgent, nomAgence FROM Agent A, Agence C where C.idAgence = A.idAgence";
        $Agent = $con->query($request);
        while($Ag = mysqli_fetch_array($Agent)){
            
            $photo = $Ag['photoAgent'];
            echo "<tr>";
                echo"<td>".$i++."</td>";
                echo"<td> <img src='photo/$photo'/ width=40 height=40 class='rounded-2'></td>";
                echo"<td>".$Ag['matriculeAgent']."</td>";
                echo"<td>".$Ag['nomAgent']."</td>";
                echo"<td>".$Ag['prenomAgent']."</td>";
                echo"<td>".$Ag['adresseAgent']."</td>";
                echo"<td>".$Ag['telAgent']."</td>";
                echo"<td>".$Ag['mailAgent']."</td>";
                echo"<td>".$Ag['nomAgence']."</td>";
                echo"<td class='btnCoti'><a  class='btn btn-transparent editAgent'  data-bs-toggle='modal' data-bs-target='#modalModifAgent' data-bs-placement='bottom' title='Modifier'><i class='bi bi-pen'></i></a></td>";
                echo"<td class='btnCoti'><button type='button' class='btn btn-transparent' data-bs-toggle='modal' data-bs-target='#modalSuiviTontine' data-bs-placement='bottom' title='Voir'><i class='bi bi-danger'></i></button></td>";
            echo "</tr>";
        }
    }

    //Afficher par identifiant
    function displayAgentWithId(){
        include("connection.php");
        $text = $_POST['txtRecherche'];
        $i=1;
        $request = "SELECT photoAgent, matriculeAgent, nomAgent, prenomAgent, adresseAgent, telAgent, mailAgent, nomAgence FROM Agent A, Agence C where C.idAgence = A.idAgence and matriculeAgent LIKE '%$text%'";
        $Agent = $con->query($request);
        while($Ag = mysqli_fetch_array($Agent)){
            
            $photo = $Ag['photoAgent'];
            echo "<tr>";
                echo"<td>".$i++."</td>";
                echo"<td> <img src='photo/$photo'/ width=40 height=40 class='rounded-2'></td>";
                echo"<td>".$Ag['matriculeAgent']."</td>";
                echo"<td>".$Ag['nomAgent']."</td>";
                echo"<td>".$Ag['prenomAgent']."</td>";
                echo"<td>".$Ag['adresseAgent']."</td>";
                echo"<td>".$Ag['telAgent']."</td>";
                echo"<td>".$Ag['mailAgent']."</td>";
                echo"<td>".$Ag['nomAgence']."</td>";
                echo"<td class='btnCoti'><a  class='btn btn-transparent editAgent'  data-bs-toggle='modal' data-bs-target='#modalModifAgent' data-bs-placement='bottom' title='Modifier'><i class='bi bi-pen'></i></a></td>";
                echo"<td class='btnCoti'><button type='button' class='btn btn-transparent' data-bs-toggle='modal' data-bs-target='#modalSuiviTontine' data-bs-placement='bottom' title='Voir'><i class='bi bi-danger'></i></button></td>";
            echo "</tr>";
        }
    }

    //Afficher par nom
    function displayAgentWithName(){
        include("connection.php");
        $text = $_POST['txtRecherche'];
        $i=1;
        $request = "SELECT photoAgent, matriculeAgent, nomAgent, prenomAgent, adresseAgent, telAgent, mailAgent, nomAgence FROM Agent A, Agence C where C.idAgence = A.idAgence and nomAgent LIKE '%$text%'";
        $Agent = $con->query($request);
        while($Ag = mysqli_fetch_array($Agent)){
            
            $photo = $Ag['photoAgent'];
            echo "<tr>";
                echo"<td>".$i++."</td>";
                echo"<td> <img src='photo/$photo'/ width=40 height=40 class='rounded-2'></td>";
                echo"<td>".$Ag['matriculeAgent']."</td>";
                echo"<td>".$Ag['nomAgent']."</td>";
                echo"<td>".$Ag['prenomAgent']."</td>";
                echo"<td>".$Ag['adresseAgent']."</td>";
                echo"<td>".$Ag['telAgent']."</td>";
                echo"<td>".$Ag['mailAgent']."</td>";
                echo"<td>".$Ag['nomAgence']."</td>";
                echo"<td class='btnCoti'><a  class='btn btn-transparent editAgent'  data-bs-toggle='modal' data-bs-target='#modalModifAgent' data-bs-placement='bottom' title='Modifier'><i class='bi bi-pen'></i></a></td>";
                echo"<td class='btnCoti'><button type='button' class='btn btn-transparent' data-bs-toggle='modal' data-bs-target='#modalSuiviTontine' data-bs-placement='bottom' title='Voir'><i class='bi bi-danger'></i></button></td>";
            echo "</tr>";
        }
    }

      //Afficher par prenom
      function displayAgentWithPrenom(){
        include("connection.php");
        $text = $_POST['txtRecherche'];
        $i=1;
        $request = "SELECT photoAgent, matriculeAgent, nomAgent, prenomAgent, adresseAgent, telAgent, mailAgent, nomAgence FROM Agent A, Agence C where C.idAgence = A.idAgence and prenomAgent LIKE '%$text%'";
        $Agent = $con->query($request);
        while($Ag = mysqli_fetch_array($Agent)){
            
            $photo = $Ag['photoAgent'];
            echo "<tr>";
                echo"<td>".$i++."</td>";
                echo"<td> <img src='photo/$photo'/ width=40 height=40 class='rounded-2'></td>";
                echo"<td>".$Ag['matriculeAgent']."</td>";
                echo"<td>".$Ag['nomAgent']."</td>";
                echo"<td>".$Ag['prenomAgent']."</td>";
                echo"<td>".$Ag['adresseAgent']."</td>";
                echo"<td>".$Ag['telAgent']."</td>";
                echo"<td>".$Ag['mailAgent']."</td>";
                echo"<td>".$Ag['nomAgence']."</td>";
                echo"<td class='btnCoti'><a  class='btn btn-transparent editAgent'  data-bs-toggle='modal' data-bs-target='#modalModifAgent' data-bs-placement='bottom' title='Modifier'><i class='bi bi-pen'></i></a></td>";
                echo"<td class='btnCoti'><button type='button' class='btn btn-transparent' data-bs-toggle='modal' data-bs-target='#modalSuiviTontine' data-bs-placement='bottom' title='Voir'><i class='bi bi-danger'></i></button></td>";
            echo "</tr>";
        }
    }

      //Afficher par adresse
      function displayAgentWithAdresse(){
        include("connection.php");
        $text = $_POST['txtRecherche'];
        $i=1;
        $request = "SELECT photoAgent, matriculeAgent, nomAgent, prenomAgent, adresseAgent, telAgent, mailAgent, nomAgence FROM Agent A, Agence C where C.idAgence = A.idAgence and adresseAgent LIKE '%$text%'";
        $Agent = $con->query($request);
        while($Ag = mysqli_fetch_array($Agent)){
            
            $photo = $Ag['photoAgent'];
            echo "<tr>";
                echo"<td>".$i++."</td>";
                echo"<td> <img src='photo/$photo'/ width=40 height=40 class='rounded-2'></td>";
                echo"<td>".$Ag['matriculeAgent']."</td>";
                echo"<td>".$Ag['nomAgent']."</td>";
                echo"<td>".$Ag['prenomAgent']."</td>";
                echo"<td>".$Ag['adresseAgent']."</td>";
                echo"<td>".$Ag['telAgent']."</td>";
                echo"<td>".$Ag['mailAgent']."</td>";
                echo"<td>".$Ag['nomAgence']."</td>";
                echo"<td class='btnCoti'><a  class='btn btn-transparent editAgent'  data-bs-toggle='modal' data-bs-target='#modalModifAgent' data-bs-placement='bottom' title='Modifier'><i class='bi bi-pen'></i></a></td>";
                echo"<td class='btnCoti'><button type='button' class='btn btn-transparent' data-bs-toggle='modal' data-bs-target='#modalSuiviTontine' data-bs-placement='bottom' title='Voir'><i class='bi bi-danger'></i></button></td>";
            echo "</tr>";
        }
    }

      //Afficher par agence
      function displayAgentWithAgence(){
        include("connection.php");
        $text = $_POST['txtRecherche'];
        $i=1;
        $request = "SELECT photoAgent, matriculeAgent, nomAgent, prenomAgent, adresseAgent, telAgent, mailAgent, nomAgence FROM Agent A, Agence C where C.idAgence = A.idAgence and nomAgence LIKE '%$text%'";
        $Agent = $con->query($request);
        while($Ag = mysqli_fetch_array($Agent)){
            
            $photo = $Ag['photoAgent'];
            echo "<tr>";
                echo"<td>".$i++."</td>";
                echo"<td> <img src='photo/$photo'/ width=40 height=40 class='rounded-2'></td>";
                echo"<td>".$Ag['matriculeAgent']."</td>";
                echo"<td>".$Ag['nomAgent']."</td>";
                echo"<td>".$Ag['prenomAgent']."</td>";
                echo"<td>".$Ag['adresseAgent']."</td>";
                echo"<td>".$Ag['telAgent']."</td>";
                echo"<td>".$Ag['mailAgent']."</td>";
                echo"<td>".$Ag['nomAgence']."</td>";
                echo"<td class='btnCoti'><a  class='btn btn-transparent editAgent'  data-bs-toggle='modal' data-bs-target='#modalModifAgent' data-bs-placement='bottom' title='Modifier'><i class='bi bi-pen'></i></a></td>";
                echo"<td class='btnCoti'><button type='button' class='btn btn-transparent' data-bs-toggle='modal' data-bs-target='#modalSuiviTontine' data-bs-placement='bottom' title='Voir'><i class='bi bi-danger'></i></button></td>";
            echo "</tr>";
        }
    }

    // Modifier les agents
    function UpdateAgent(){
        include("connection.php");
        if(isset($_POST['Magence']) && isset($_POST['Mcode']) && isset($_POST['Mnom']) && isset($_POST['Madresse']) && isset($_POST['Mprenom']) && isset($_POST['Mtelephone']) && isset($_POST['Mmail']) && isset($_POST['Majouter']) ){
            if(empty($_POST['Magence']) || empty($_POST['Mnom']) || empty($_POST['Madresse']) || empty($_POST['Mprenom']) || empty($_POST['Mtelephone']) || empty($_POST['Mmail'])){
                echo "<p class='alert alert-danger text-center'>L'un des champs ne doit pas etre vide</p>";
            }else {
                $code = $_POST['Mcode'];
                $agence = $_POST['Magence'];
                $nom = $_POST['Mnom'];
                $mail = $_POST['Mmail'];
                $adresse = $_POST['Madresse'];
                $prenom = $_POST['Mprenom'];
                $telephone = $_POST['Mtelephone'];
                $photo = $_FILES['Mphoto']['name']; 
                $chemin = $_FILES['Mphoto']['tmp_name'];
                move_uploaded_file($chemin, "./photo/$photo");
                $request = "UPDATE agent SET  nomAgent='$nom', prenomAgent='$prenom', adresseAgent='$adresse', telAgent='$telephone', mailAgent='$mail', photoAgent='$photo', idAgence= $agence where matriculeAgent = '$code'";
                $result = $con->query($request);
                if($result){
                    echo "<p class='alert alert-success text-center'>Enregistrer effectué avec succes</p>";
                }else{
                    echo "<p class='alert alert-danger text-center'>Echec d'enregistrement</p>";
                }
            }
           
        }
    }
?>