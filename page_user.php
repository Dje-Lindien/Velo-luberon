<?php
session_start();
require_once('libraries/utils.php');
// Secure the co
secureUser();
$idUser = $_SESSION['idUser'];

if(isset($idUser) != 1) {

    header('Location : deconnexion.php');

}elseif(isset($_SESSION['idAdmin']) === 1) {

    header('Location : deconnexion.php');

}


$pdo = getPdo();

if(!isset($_SESSION['idUser']))
{
    header("Location: ../deconnexion.php") ;

}else{
    //Display data
    $query = $pdo->prepare("SELECT * FROM user WHERE id = ?");
    $query->execute([$idUser]);
    // Get ALL the results
    $infos = $query->fetchAll();
    // Get a result 
    $info = $query->fetch();

    // MODIFICATION
    if(isset($_POST['modifSubmit'])) {
        //securisation
        $nom     = htmlspecialchars($_POST['modifNom']);
        $prenom  = htmlspecialchars($_POST['modifPrenom']);
        $mail   = htmlspecialchars($_POST['modifMail']);
        $mdp   = htmlspecialchars($_POST['modifMdp']);
        $confMdp = htmlspecialchars($_POST['confMdp']);


        if(!empty($nom) AND !empty($prenom) AND !empty($mail) AND !empty($mdp) AND !empty($confMdp)) {


            if($confMdp == $mdp) {

                $mdp = password_hash($mdp, PASSWORD_DEFAULT);
                // envoyer la requête
                $update = $pdo->prepare("UPDATE user SET nom = ?, prenom = ?, mail = ?, mdp = ? WHERE id = ?");
                $update->execute([$nom, $prenom, $mail, $mdp, $idUser]);

                echo "<script>alert('Le changement est effectué !')</script>";
                echo "<script>window.location = 'page_user.html.php?id=" . $idUser . "'</script>";

            }else{
                echo "Les mots de passe ne correspondent pas !";
            }

        }else{
            $erreur = "Veuillez remplir correctement les champs";
        }

    }else{
        $erreur = "";
    }

}

?>