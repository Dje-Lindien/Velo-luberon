<?php
session_start();
require_once('../../libraries/database.php');
require_once('../../libraries/utils.php');
//Secure connexion
secureAdmin();
//Get data
$pdo = getPdo();

if(isset($_POST['newBlog']))
{
    $newtitre = htmlspecialchars($_POST['newtitre']);
    $newtexte = htmlspecialchars($_POST['newtexte']);
    $newphoto = $_FILES['newphoto']['name'];
    $target_dir = '../../libraries/img/';
    $target_file_blog = $target_dir . basename($_FILES['newphoto']['name']);

    //Select file type
    $imageFileType = strtolower(pathinfo($target_file_blog,PATHINFO_EXTENSION));

    //Valid extensions
    $extension_arr = array("jpg","jpeg","png","gif");

    //CHecking if extension exists
    if(in_array($imageFileType,$extension_arr))
    {
        if(!empty($newtitre) AND !empty($newtexte) AND !empty($newphoto))
        {
            $add = $pdo->prepare("INSERT INTO blog(titre, texte, photo) VALUES (?, ?, ?)");
            
            //Execute query
            $add->execute([$newtitre, $newtexte, $newphoto]);

            if($add !== 0)
            {
                //Then uploading picture
                move_uploaded_file($_FILES['newphoto']['tmp_name'],$target_dir.$newphoto);
            
                $erreur = "Votre article a bien été rajouté";

            }

        } else {
            $erreur = "Veuillez remplir les champs vides svp !";
        }

    }else{
        $erreur = "Le fichier n'est pas valide ! Essayez-en un autre";
    }

}else{
    $erreur = "";
}


//Brassage des nouveaux articles de blog
$query = $pdo->prepare("SELECT * FROM blog");
$query->execute();

$result = $query->fetchAll();

//This file to display on web
require('new-blog.html.php');

?>