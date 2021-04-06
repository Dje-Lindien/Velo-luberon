<?php
session_start();

require_once('../../libraries/database.php');
require_once('../../libraries/utils.php');

secureAdmin();
//We don't know the id yet, then...
$blog_id = null;
//If there is one and if this one is a number so thaat's cool !
if(!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $blog_id = $_GET['id'];
}
//Let's decide, error or not ?
if(!$blog_id) {
    die("Vous devez préciser une paramètre 'id' dans l'URL !");
}


//Db connection
$pdo = getPdo();


if(isset($_POST['modifBlog'])) {
    $titre = htmlspecialchars($_POST['modifTitre']);
    $texte = htmlspecialchars($_POST['modifTexte']);
    $photo = $_FILES['modifPhoto']['name'];
    $target_dir ='../../libraries/img/';
    $target_file_modifblog = $target_dir . basename($_FILES['modifPhoto']['name']);

    //Select file type
    $imageFileType = strtolower(pathinfo($target_file_modifblog,PATHINFO_EXTENSION));

    //Valid extensions
    $extension_arr = array("jpg","jpeg","png","gif");

    if(in_array($imageFileType, $extension_arr))
    {

        if(!empty($titre) AND !empty($texte) AND !empty($photo))
        {
            $modif = $pdo->prepare("UPDATE blog SET titre = ?, texte = ?, photo = '".$photo."' WHERE blog_id = ?");
            $modif->execute([$titre, $texte, $blog_id]);

            if($modif !== 0)
            {
                //Uploading picture...
                move_uploaded_file($_FILES['modifPhoto']['tmp_name'], $target_dir.$photo);

                echo "<script>alert('Félicitations ! l'article n°$blog_id a été correctement modifié !')</script>";

            }

        }else{
            $erreur = "Veuillez remplir les champs vides svp";
        }
    }else{
        $erreur = "Le fichier n'est pas valide ! Essayez-en un autre";
    }
}else{
    $erreur = "";

}


//On va chercher l'article sélectionné en question
$select = $pdo->prepare("SELECT * FROM blog WHERE blog_id = ?");
$select->execute([$blog_id]);

$resultat = $select->fetch();

?>
