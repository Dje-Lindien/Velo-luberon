<?php
session_start();
require_once('libraries/utils.php');

secureAdmin();
$idAdmin = $_SESSION['idAdmin'];

if(isset($idAdmin) != 1) {

    header('Location : deconnexion.php');

}elseif(isset($_SESSION['idUser']) === 1) {

    header('Location : deconnexion.php');

}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contenu de l'admin</title>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@500&display=swap" rel="stylesheet"> 
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">

  </head>

<body>


<!-- NAVBAR HEADER -->
<?php require ('header_back.php') ?>
<div class="taille_page" style="min-height: 90%">

    <!-- BOUTON RETOUR  -->
  <div class="sous-le-header">
        <div class="d-flex align-items-start flex-column bd-highlight mb-5"
            style="height: auto">
            <button class="btn mb-auto p-1 align-items-center m-2"
                    style="font-size:1.1rem ; background-color:white ; color:#e6232b ; border:solid 3px #1d2f39"
                    id="bouton_retour">
                <i class="fas fa-backward"></i>
                <a style="text-decoration:none ; color:#e6232b" 
                    href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Retour
                </a>
            </button>
        </div>
    </div>

    <!-- Blocs de la page admin  -->
    <div id="page_admin_bloc" class="container page_admin">
        <div class="col-lg-12 d-inline-block">
            <div class="row justify-content-around">

                <div class="col-10 col-md-8 col-lg-4 border rounded mt-2 pb-3" style="background-color: rgba(68, 68, 83, 0.05);">
                    <div id="bloc_txt" class="column p-3 text-center">
                        <h1 class="mt-4">Blog</h1>
                        <button type="input" class="col-8 btn btn-dark mt-5"><a class="text-decoration-none" href="templates/blog/lesblogs.php">Afficher tous les articles</a></button>
                        <button type="input" class="col-8 btn btn-dark mt-5"><a class="text-decoration-none" href="templates/blog/new-blog.php"> Ajouter un article de blog</a></button>
                    </div>
                </div>

                <div class="col-10 col-md-8 col-lg-4 border rounded mt-2 pb-3" style="background-color: rgba(68, 68, 83, 0.05);">
                    <div id="bloc_txt" class="column p-3 text-center">
                        <h1 class="mt-4">Produits</h1>
                        <button type="input" class="col-8 btn btn-dark mt-5"><a class="text-decoration-none" href="templates/produits/lesproduits.php?id=<?= $idAdmin ?>">Voir les produits</a></button>
                        <button type="input" class="col-8 btn btn-dark mt-5"><a class="text-decoration-none" href="templates/produits/new-produit.php">Ajouter un produit</a></button>  
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>    


<!-- FOOTER -->
<?php require('footer.php') ?>


<!-- FIN DE PAGE -->

  <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <!-- <script src="js/bootstrap.min.js"></script> -->
  <!-- <script src="js/custom.js"></script> -->

</body>
</html>