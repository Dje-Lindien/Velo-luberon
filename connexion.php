<?php
session_start();

require_once('libraries/database.php');

//CONNEXION
$pdo = getPdo();

// If session exists, redirection to the good page
if(isset($_SESSION["idAdmin"])) {
    header("Location: pageadmin.html.php?id=" . $_SESSION["idAdmin"]);
    session_destroy();

}elseif(isset($_SESSION["idUser"])) {
    header("Location: page_user.html.php?id=" . $_SESSION["idUser"]);

}else{

}
    //If click
    if(isset($_POST['submit'])) {
        // GET the data and SECURE
        $mail = htmlspecialchars($_POST['mail']);
        $mdp = htmlspecialchars($_POST['mdp']);
    
        if(!empty($mail) AND !empty($mdp)) {

            if(preg_match("/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/", $mail)) {

                $select = $pdo->prepare("SELECT * FROM user WHERE mail = ?");
                $select->execute([$mail]);
                //CHECK if it exists
                $compte = $select->rowCount();
                $resultat = $select->fetch();
        
                if($compte === 1) {
        
                    if(password_verify($mdp, $resultat['mdp'])) {
                        
                        if($resultat['role'] === "admin")
                        {
                            $_SESSION["idAdmin"] = $resultat["id"];
                            header("Location: pageadmin.html.php?id=" . $resultat['id']);
        
                        } else {
        
                            $_SESSION["idUser"] = $resultat["id"];
                            header("Location: page_user.html.php?id=" . $resultat['id']);
                        }
                                                    
                    }else{
                        $erreur = "Votre mdp est incorrect !";
                    }

                }else{
                    $erreur = "Vous n'êtes pas inscrit ?!" . '<a href="inscription.php"> M\'inscrire </a>';
                }

            }else{
                $erreur = "Merci de vérifier l'orthographe de votre adresse email !";
            }
    
        }else{
            $erreur = "Veuillez remplir les champs !";
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
<body class="inscript">

<div class="bg_connexion">

<?php require ('header_back.php'); ?> 

    <div class="container" style="padding-top:18vh;">
        <div class="row justify-content-md-center">

            <div class="col-lg-8">
                <div class="border-bottom rounded shadow-lg p-3 mb-5">
                    <div class="text-center texte">
                        <h1 class="titre">CONNEXION</h1>
                        <h6><a href="#" style="text-decoration:none">Mot de passe oublié ?</a></h6>
                        <h6><a href="inscription.php" style="text-decoration:none">Pas encore inscrit ?</a></h6>
                    </div>

                    <form id="form_connexion" action="" method="POST">
                        <div class="form-row">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email" name="mail">
                            </div>               
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Mot de passe" name="mdp">
                            </div>
                        </div>
                            <button type="submit" name="submit" class="btn btn-warning w-100 mt-5" style="font-size: 1.4rem"><span class="align-middle">Me connecter</span></button>
                    </form>

                    <h6 class="text-center" style="color:red"><?= $erreur ?></h6>
                </div>

            </div>
        </div>        
    </div>
    
</div>

<?php require ('footer.php') ?>   

</body>
</html>