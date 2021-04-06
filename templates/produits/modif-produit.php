<?php
session_start();
require_once('../../libraries/database.php');
require_once('../../libraries/utils.php');

secureAdmin();
//ID Null when arrive on page
$prod_id = null;

if(!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $prod_id = $_GET['id'];
}
if(!$prod_id) {
    die("Ce produit n'a pas d'ID précisé mec !");
}


//Connexion bdd
$pdo = getPdo();


if(isset($_POST['modifProd'])) {
    $libelle  = htmlspecialchars($_POST['modifLibelle']);
    $descript = htmlspecialchars($_POST['modifDescr']);
    $prix     = htmlspecialchars($_POST['modifPrix']);
    $photoP   = $_FILES['modifPhotoP']['name'];
    $target_dir = "../../libraries/img/";
    $target_file = $target_dir . basename($_FILES["modifPhotoP"]["name"]);

    //Select type of file
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    //Extensions valid
    $extension_arr = array("jpg","jpeg","png","gif");

    //CHeck extension
    if(in_array($imageFileType,$extension_arr))
    {

        if(!empty($libelle) AND !empty($descript) AND !empty($prix) AND !empty($photoP)) {
            $modifP = $pdo->prepare("UPDATE produits SET libelle = ?, descr_produit = ?, prix_produit = ?, photoP = ? WHERE prod_id = ?");
            $modifP->execute([$libelle, $descript, $prix, $photoP, $prod_id]);

            if($modifP !== 0) {

            move_uploaded_file($_FILES['modifPhotoP']['tmp_name'],$target_file);

            echo "Votre produit n°$prod_id été correctement était modifié !";
            }

        } else {
            echo "Merci de compléter correctement (attention au prix)";
        }
    
    }else{
        echo "Le fichier n'est pas valide ! Essayez-en un autre";
    }
    
}


require('modif-produit.html.php');


//Updating table
$selectP = $pdo->prepare("SELECT * FROM produits WHERE prod_id = ?");
$selectP->execute([$prod_id]);

$resultatP = $selectP->fetch();

?>
