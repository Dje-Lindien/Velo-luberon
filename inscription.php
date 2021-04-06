<?php

    $bdd = new PDO('mysql:host=localhost;dbname=veloluberon', 'root', '');
                    

    if(isset($_POST['forminscription'])) {
        $mail       = htmlspecialchars($_POST['mail']);
        $nom        = htmlspecialchars($_POST['nom']);
        $prenom     = htmlspecialchars($_POST['prenom']);
        $mdp        = htmlspecialchars($_POST['mdp']);
        $confirmmdp = htmlspecialchars($_POST['confirmmdp']);

        if(!empty($_POST['mail']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mdp']) AND !empty($_POST['confirmmdp'])) {
            //LIMIT the lenght
            $nomlength    = strlen($nom);
            $prenomlength = strlen($prenom);

            if($nomlength && $prenomlength <= 50) {
                //SECURE the input
                if(preg_match("/^[a-zA-Z-' ]*$/",$nom)) {
                
                    if(preg_match("/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/", $mail)) {
                                                        
                        if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {   
                            $reqmail = $bdd->prepare("SELECT * FROM user WHERE mail=?");
                            $reqmail->execute(array($mail));
                            $mailexist = $reqmail->rowCount();
                        
                            if($mailexist === 0) {

                                if($mdp == $confirmmdp) {
                                    $passwhash = password_hash($mdp, PASSWORD_DEFAULT);
                                    $insertbdd = $bdd->prepare("INSERT INTO user(mail, nom, prenom, mdp, role) VALUES(?, ?, ?, ?, ?)");
                                    $insertbdd->execute(array($mail, $nom, $prenom, $passwhash, 0));             
                                    $erreur = "Votre compte a est créé <a href=\"connexion.php\"> Me connecter </a>";
                                    
                                }else{
                                    $erreur = "Vos mots de passe ne correspondent pas !";
                                }

                            }else{
                                $erreur = "Cette adresse mail est déjà utilisée";
                            } 
                            
                        }else{
                            $erreur = "Votre adresse mail ne correspond pas";
                        }  

                    }else{
                        $erreur = "merci de vérifier l'orthographe de votre adresse email !";
                    }

                }else{
                    $erreur = "Seulement lettres et espaces autorisés";
                }           

            }else{
                $erreur = "50 caractères maximum";
            }
                
        }else{
            $erreur = "Veuillez remplir tous les champs";
        }

    }else{
        $erreur = "";
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    
</head>
<body>


<?php require ('header_back.php'); ?> 


    <div class="container" style="padding-top:18vh;">
        <div class="row justify-content-md-center">

            <div class="col-lg-8">
                <div class="border-bottom rounded shadow-lg p-3 mb-5">
                    <div class="text-center texte">
                        <h1 class="titre">INSCRIPTION</h1>
                        <h6><a href="connexion.php">Déjà un compte ?</a></h6>
                    </div>

                    <form id="form_connexion" action="" method="POST">
                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nom" name="nom">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Prénom" name="prenom">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" name="mail">
                            </div>               
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Mot de passe" name="mdp">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Confirmer votre mot de passe" name="confirmmdp">
                            </div>
                        </div>
                            <button type="submit" name="forminscription" class="btn btn-warning w-100 mt-4 pt-1" style="font-size: 1.4rem"><span class="align-middle">M'inscrire</span></button>
                    </form>

                    <h6 class="text-center" style="color:red"><?= $erreur ?></h6>
                </div>
            </div>
            
        </div>        
    </div>
    

<?php require ('footer.php') ?>  


</body>
</html>