<?php
session_start();
require_once('../../libraries/database.php');
require_once('../../libraries/utils.php');

secureAdmin();


$pdo = getPdo();

if(isset($_POST['newProduit']))
{
    $newlibelle = htmlspecialchars($_POST['newLibelle']);
    $newdescript = htmlspecialchars($_POST['newDescript']);
    $newprix = htmlspecialchars($_POST['newPrix']);
    $newPhoto = $_FILES['newPhoto']['name'];
    $target_dir = "../../libraries/img/";
    $target_file = $target_dir . basename($_FILES["newPhoto"]["name"]);


    //Select type of file
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    //Extensions valid
    $extension_arr = array("jpg","jpeg","png","gif");

    //CHeck extension
    if(in_array($imageFileType,$extension_arr))
    {
        if(!empty($newlibelle) AND !empty($newdescript) AND !empty($newprix) AND !empty($newPhoto))
        {
            $addP = $pdo->prepare("INSERT INTO produits(libelle, descr_produit, prix_produit, photoP) VALUES (?, ?, ?, ?)");

            //We execute to get informations
            $addP->execute([$newlibelle, $newdescript, $newprix, $newPhoto]);

            if($addP !== 0)
            {
                //Then upload the picture in the same time
                move_uploaded_file($_FILES['newPhoto']['tmp_name'],$target_dir.$newPhoto);

            $erreur = "Yepa ! nouveau produit a bien été ajouté";
            }

        }else{
            $erreur = "Veuillez remplir correctement les champs svp !";
        }

    }else{
        $erreur = "Le fichier n'est pas valide ! Essayez-en un autre";
    }

}else{
    $erreur = "";
}


//We mix
$query = $pdo->prepare("SELECT * FROM produits");
$query->execute();

$result = $query->fetchAll();

require('new-produit.html.php');


?>